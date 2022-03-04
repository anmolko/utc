<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Setting;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(empty(Auth::user())){
            return redirect()->back();
        } elseif(!empty(Auth::user()) && Auth::user()->user_type == 'customer'){
            return redirect()->route('customer-orders.index');
        }else{
            $orders        = Order::with('products','user')->get();
            return view('backend.order.index',compact('orders'));
        }
    }

    public function customerindex()
    {
        $active = 'order';
        $user_id = Auth::user()->id;
        $orders        = Order::with('products','user')->where('user_id', $user_id)->get();
        $latestProducts = Product::with('primaryCategory','brand')->orderBy('created_at', 'DESC')->where('status','active')->take(4)->get();
        return view('frontend.pages.user.dashboard',compact('active','orders','latestProducts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'general'){
            Session::flash('warning','Please login as a customer to place an order. Admin credentials are not valid.');
            return redirect()->back();
        }elseif(Auth::user()->user_type == 'customer' && Auth::user()->contact == null){
            Session::flash('warning','Please update your contact information first.');
            Session::put('url.intended', '/cart');
            return redirect()->route('front-user.dashboard');

        }
        $data=[
            'total_amount'  => \Cart::getTotal(),
            'delivery_type' =>  'normal',
            'order_number'  => 'UNIVERSAL-'.str_pad(time() + 1, 8, "0", STR_PAD_LEFT),
            'status'        => 'no_action',
            'user_id'       => Auth::user()->id,
            'created_by'    => Auth::user()->id,
        ];
        $order              = Order::create($data);
        $order_id           = $order->id;

        foreach(\Cart::getContent() as $row){
            $discount = ($row->attributes->discount == null) ? 0 :$row->attributes->discount;
                $data2=[
                'order_id'      => $order_id,
                'product_id'    => $row->id,
                'price'         => $row->attributes->orginal_price,
                'discount'      => $discount,
                'status'        => 'sold',
                'quantity'      => $row->quantity,
                'created_by'    => Auth::user()->id,
            ];
            $productorder = ProductOrder::create($data2);

        }

        $theme_data = Setting::first();
        $alldata = array(
            'total_amount'        =>$order->total_amount,
            'address'        =>Auth::user()->address,
            'date'        =>date('M j, Y',strtotime(@$order->created_at)),
            'order_id'      => $order->order_number,
            'site_address'        =>ucwords($theme_data->address),
            'site_email'        =>ucwords($theme_data->email),
            'site_name'        =>ucwords($theme_data->website_name),
            'phone'        =>ucwords($theme_data->phone),
        );
//        Mail::to(Auth::user()->email)->send(new OrderPlaced($alldata));

        if($order && $productorder){
            Session::flash('success','Your order was placed successfully');
            \Cart::clear();
        }
        else{
            Session::flash('error','Your order was not placed. Please Try Again');
        }
        return redirect()->route('customer-orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Order::find($id);
        $delete->delete();
        return 'order_removed';
    }
}
