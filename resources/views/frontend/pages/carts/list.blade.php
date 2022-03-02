@extends('frontend.layouts.master')
@section('title') View Shopping Cart  @endsection
{{--@section('styles')--}}
{{--<style>--}}
{{--    --}}
{{--</style>--}}
{{--@endsection--}}

@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
        <section class="flat-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs">
                            <li class="trail-item">
                                <a href="/" title="">Home</a>
                                <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
                            </li>
                            <li class="trail-item">
								<a href="{{route('product.frontend')}}" title="">Products</a>
								<span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
							</li>

                            <li class="trail-end">
                                <a href="#" title="">View Cart</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')
<section class="flat-shop-cart">
    <div class="container">
    @if(count(@$cartItems) > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="flat-row-title style1">
                    <h3>Shopping Cart</h3>
                </div>
                <div class="table-cart">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <div class="img-product">
                                        <img src="/images/uploads/products/{{ $item->attributes->image }}" alt="{{$item->attributes->slug}}">
                                    </div>
                                    <div class="name-product">
                                        <a href="{{route('product.single',$item->attributes->slug)}}">{{ucwords(Str::limit(@$item->name,20,' ...'))}}</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </td>

                                <td>
                                    <div class="total">
                                     NPR {{ \Cart::get($item->id)->getPriceSum() }}
                                    </div>
                                </td>

                                <td>
                                    <div class="row">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            {{ csrf_field() }}
                                                <input type="hidden" value="{{$item->id}}" id="id" name="id">
                                                <div class="quanlity">
                                                    <input type="number"  id="quantity" name="quantity"  value="{{ $item->quantity }}" min="1" max="100" placeholder="Quanlity">
                                                    <button class="btn btn-secondary btn-sm edit-quantity" ><i class="fa fa-edit"></i></button>

                                                </div>
                                        </form>
                                        <form action="{{ route('cart.remove') }}" id="delete_{{$item->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">

                                            <button class="btn btn-secondary btn-sm trash-quantity" ><i class="fa fa-trash"></i></button>

                                        </form>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-coupon">

                        <span class="back-to-shop"><a href="{{ url('/product') }}">Back to Shop</a></span>
                        <span>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit">Clear Cart</button>
                            </form>
                        </span>
                    </div><!-- /.form-coupon -->

                </div><!-- /.table-cart -->
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <form id="checkout-form" action="{{route('orders.store')}}" id="checkout" method="post">
                        @csrf
                        <table>
                            <tbody>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="btn-radio">
                                        <div class="radio-info">
                                            <input type="radio" id="free-shipping" name="radio-flat-rate">
                                            <label for="free-shipping">Free Shipping</label>
                                        </div>

                                    </td><!-- /.btn-radio -->
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="price-total">NPR {{ number_format(Cart::getTotal()) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-cart-totals">
                            <a onclick="$('#checkout-form').submit();" class="checkout" title="">Proceed to Checkout</a>
                        </div><!-- /.btn-cart-totals -->
                    </form><!-- /form -->
                </div><!-- /.cart-totals -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    @else
    <div class="row">
    <div class="container">
        <div class="col-lg-12">
            <div class="row justify-content-center">
            <div class="">
                <img src="{{asset('/img/empty_product.png')}}" style="padding-left: 20px">
                <p><strong>Your shopping cart is empty</strong></p>
                <span class="back-to-shop"><a href="{{ url('/product') }}" class="ps-btn">Go shopping</a></span>
            </div>
            </div><br>
        </div>
    </div>
    </div>
    @endif
    </div><!-- /.container -->
</section><!-- /.flat-shop-cart -->

@endsection
