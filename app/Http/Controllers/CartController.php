<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartList()
    {
        if(empty(Auth::user())){
            return redirect()->route('front-user.index');
        } elseif(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'general'){
            Session::flash('warning','Please login as a customer to view your cart. Admin credentials are not valid.');
            return redirect()->back();
        }
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend.pages.carts.list', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => ($request->discount) ? $request->discount : $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'slug' => $request->slug,
                'discount' => $request->discount,
                'orginal_price' => $request->price,

            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->back();
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->back();
    }
}
