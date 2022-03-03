<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
//        $user_id = Auth::user()->id;
//        $orders        = Order::with('products','user')->where('user_id', $user_id)->get();
        return redirect('/user-dashboard');
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
            $data2=[
                'order_id'      => $order_id,
                'product_id'    => $row->id,
                'price'         => $row->price,
                'discount'      => 0,
                'status'        => 'sold',
                'quantity'      => $row->quantity,
                'created_by'    => Auth::user()->id,
            ];
            $productorder = ProductOrder::create($data2);
        }

        if($order && $productorder){
            Session::flash('success','Your order was placed successfully');
            \Cart::clear();
        }
        else{
            Session::flash('error','Your order was not placed. Please Try Again');
        }
        return redirect()->route('front-user.dashboard');
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
