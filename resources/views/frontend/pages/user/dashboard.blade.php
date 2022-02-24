@extends('frontend.layouts.master')
@section('title') User Dashboard @endsection

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

                        <li class="trail-end">
                            <a href="#" title="">User Dashboard</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')
    <section class="flat-checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="cart-totals style2">
                        <h3>Your Dashboard Details</h3>
                        <form action="#" method="get" accept-charset="utf-8">
                            <table class="product">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Apple iPad Mini<br>G2356</td>
                                    <td>$99.00</td>
                                </tr>
                                <tr>
                                    <td>Beats Pill + Portable<br>Speaker</td>
                                    <td>$100.00</td>
                                </tr>
                                </tbody>
                            </table><!-- /.product -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Total</td>
                                    <td class="subtotal">$1,999.00</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="btn-radio">
                                        <div class="radio-info">
                                            <input type="radio" checked="" id="flat-rate" name="radio-flat-rate">
                                            <label for="flat-rate">Flat Rate: <span>$3.00</span></label>
                                        </div>
                                        <div class="radio-info">
                                            <input type="radio" id="free-shipping" name="radio-flat-rate">
                                            <label for="free-shipping">Free Shipping</label>
                                        </div>
                                        <div class="btn-shipping">
                                            <a href="#" title="">Calculate Shipping</a>
                                        </div>
                                    </td><!-- /.btn-radio -->
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="price-total">$1,999.00</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="btn-radio style2">
                                <div class="radio-info">
                                    <input type="radio" id="flat-payment" checked="" name="radio-cash-2">
                                    <label for="flat-payment">Check Payments</label>
                                    <p>Please send a check to Store Name, Store Street, Store <br>Town, Store State / County, Store Postcode.</p>
                                </div>
                                <div class="radio-info">
                                    <input type="radio" id="bank-transfer" name="radio-cash-2">
                                    <label for="bank-transfer">Direct Bank Transfer</label>
                                </div>
                                <div class="radio-info">
                                    <input type="radio" id="cash-delivery" name="radio-cash-2">
                                    <label for="cash-delivery">Cash on Delivery</label>
                                </div>
                                <div class="radio-info">
                                    <input type="radio" id="paypal" name="radio-cash-2">
                                    <label for="paypal">Paypal</label>
                                </div>
                            </div><!-- /.btn-radio style2 -->
                            <div class="checkbox">
                                <input type="checkbox" id="checked-order" name="checked-order" checked="">
                                <label for="checked-order">I’ve read and accept the terms &amp; conditions *</label>
                            </div><!-- /.checkbox -->
                            <div class="btn-order">
                                <a href="#" class="order" title="">Place Order</a>
                            </div><!-- /.btn-order -->
                        </form>
                    </div><!-- /.cart-totals style2 -->
                </div><!-- /.col-md-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
