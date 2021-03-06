@extends('frontend.layouts.master')
@section('title') User Dashboard @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script src="{{asset('assets/frontend/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/jquery-ui.min.css')}}">
<link href="{{asset('assets/backend/css/sweetalert.css')}}" rel="stylesheet">
<style>
    .select-gender{
        appearance: none;
        text-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        color: #727272;
        position: relative;
        display: block;
        font-family: 'Open Sans';
        width: 100%;
        padding: 8px 15px 8px 30px;
        border: 2px solid #e5e5e5;
        height: 40px !important;
        border-radius: 30px;
        background-color: transparent;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .customer-image{
        position: relative;
        display: block;
        font-family: 'Open Sans';
        width: 100%;
        line-height: 24px;
        padding: 8px 15px 8px 30px;
        color: #222222;
        border: 2px solid #e5e5e5;
        height: 48px !important;
        border-radius: 30px;
        background-color: transparent;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .owl-carousel .owl-stage{
        display: flex !important;
        flex-wrap: wrap !important;
    }
    .owl-carousel .owl-item{
        display: flex;
    }
    .sweet-alert button {
        padding: 5px 32px!important;
    }

    td.details-controls {
        text-align:center;
        cursor: pointer;
    }
    tr.shown td.details-controls {
        text-align:center;
    }
</style>
@endsection

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

<section class="py-5 header flat-tab">

    <div class="container py-3">

        <div class="row">
            <div class="col-md-3">
                <div class="card customer-detail">
                    <div class="card-body text-center">
                    <img class="avatar rounded-circle" src="<?php if(@Auth::user()->image && str_contains(@Auth::user()->image, 'https')){?>
                    {{@Auth::user()->image}}<?php }else{ if(@Auth::user()->image){?>{{asset('/images/uploads/profiles/'.@Auth::user()->image)}}<?php }else{?>{{asset('/img/dummy.jpg')}}<?php }}?>" alt="{{ @Auth::user()->name }}">
                    <h4 class="card-title">{{ ucwords(@Auth::user()->name) }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{ @Auth::user()->email }}</h6>

                    </div>
                </div>
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow {{(@$active == 'personal') ? "active":""}} " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="{{(@$active == 'personal') ? "true":"false"}}">
                        <i class="fas fa-user-circle mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Personal information</span></a>


                    <a class="nav-link mb-3 p-3 shadow {{(@$active == 'order') ? "active":""}}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="{{(@$active == 'order') ? "true":"false"}}">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">My Order</span></a>

                    <a class="nav-link mb-3 p-3 shadow customer-remove" href="#" hrm-delete-per-action="{{route('customer.destroy')}}" aria-selected="false">
                        <i class="fas fa-user-slash mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Delete Account</span></a>


                   <a class="nav-link mb-3 p-3 shadow"  href="#"   onclick="event.preventDefault();
                                                     document.getElementById('customer-logout-form').submit();" id="v-pills-settings-tab" aria-selected="false">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                       <form id="customer-logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                           @csrf
                       </form>
                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                    </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong class="sent-success">{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong class="error-sent">{{ $message }} </strong>
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <strong class="error-sent">{{ $message }} </strong>
                    </div>
                @endif
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white {{(@$active == 'personal') ? "show active":""}} p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="font-italic mb-4">Personal information</h4>
                        <div class="form-contact-content">
                            <form id="form-contact" action="{{route('update_user',@Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PATCH">
                                @csrf

                                <div class="form-box one-half name-contact">
                                    <label for="fullname">Full Name*</label>
                                    <input type="text" placeholder="Joe Doey" name="name" value="{{ @Auth::user()->name }}" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" value="{{ @Auth::user()->email }}" placeholder="joe@gmail.com"  required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')" readonly>
                                </div>

                                <div class="form-box one-half name-contact">
                                    <label for="subject">Gender*</label>
                                    <select name="gender" class="form-control select-gender">
                                        <option value="male" @if( @Auth::user()->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if( @Auth::user()->gender == 'female') selected @endif>Female</option>
                                        <option value="others" @if( @Auth::user()->gender == 'others') selected @endif>Other</option>
                                    </select>
                                </div>
                                <div class="form-box one-half password-contact">
                                    <label for="phone">Phone*</label>
                                    <input type="text"  name="contact" value="{{ @Auth::user()->contact }}" placeholder="Phone *"  required oninvalid="this.setCustomValidity('Enter a phone number')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-box one-half password-contact">
                                    <label for="address">Address*</label>
                                    <input type="text"  name="address" value="{{ @Auth::user()->address }}" placeholder="Address *"  required oninvalid="this.setCustomValidity('Enter a address')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-box one-half password-contact">
                                    <label for="image">Photo</label>
                                    <input type="file"  name="image" class="form-control customer-image">
                                </div>

                                <div class="form-box">
                                    <button type="submit" class="contact">Update</button>
                                </div>
                            </form><!-- /#form-contact -->

                        </div><!-- /.form-contact-content -->
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white {{(@$active == 'order') ? "show active":""}} p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">My Order List</h4>

                            <div class="table-responsive">
                                <table id="all-orders" class="table table-striped table-bordered  responsive" role="grid" aria-describedby="basic-col-reorder_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th>User Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($orders)>0)
                                        @foreach($orders as  $order)
                                            <tr data-child-value="{{$order}}">
                                                <td class="details-control"><i class="fa fa-plus-square" aria-hidden="true"></i></td>
                                                <td>{{@$order->order_number}}</td>
                                                <td>NPR. {{number_format(@$order->total_amount)}}</td>
                                                <td>{{\Carbon\Carbon::parse(@$order->created_at)->isoFormat('MMM Do, YYYY')}}</td>
                                                <td>{{@$order->user->email}}</td>
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-warning action-delete" href="#" hrm-delete-per-action="{{route('orders.destroy',$order->id)}}"> <i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align: center">You do not have order(s) place yet. Look through our <a href="{{route('product.frontend')}}" style="color: #0a90eb">products</a> to place your order.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        <form action="#" method="post" id="deleted-form" >
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="{{asset("assets/jquery-ui.js")}}" ></script>
    <script src="{{asset('assets/backend/js/sweetalert.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        function format(mainvalue) {
            console.log(mainvalue);
            var inner_table = '<table class="child_row-verified table-responsive table table-striped table-bordered nowrap">' +
                '<thead>' +
                '<tr>' +
                '<th>Image</th>' +
                '<th>Product</th>' +
                '<th>Brand </th>' +
                '<th>Type</th>' +
                '<th>Quantity</th>' +
                '<th>Item Price</th>' +
                '<th>Discount Price</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';

            $.each(mainvalue.products, function( index, value ) {
                imagename = '<img src="/images/uploads/products/' + value.thumbnail + '" class="current-img" style="max-width:120px;" alt=""/>';
                inner_table += '<td style=" text-align: center;">' +
                    imagename + '</td>' +
                    '<td><a class="product-name" href="/product/' + value.slug +'" target="_blank">' +  value.name + '</a></td>' +
                    '<td>' + value.brand.name +'</td>' +
                    '<td>' + value.type + '</td>' +
                    '<td>' + value.pivot.quantity + '</td>' +
                    '<td> NPR. '
                    + value.pivot.price + '</td>' +
                    '<td> NPR. ' + value.pivot.discount + '</td></tr>';
            });
            return inner_table;
        }

        all_orders();
        function all_orders(){
            var table = $('#all-orders').DataTable({
                "orderable": false,
                "bSort" : false,
                "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
            });

            // for all orders
            $('#all-orders tbody').off('click', 'td.details-control');
            $('#all-orders tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(format(tr.data('child-value'))).show();
                    tr.addClass('shown');
                }
            } );
        }
    });

    $(document).on('click','.action-delete', function (e) {
        e.preventDefault();
        var form = $('#deleted-form');
        var action = $(this).attr('hrm-delete-per-action');
        form.attr('action',$(this).attr('hrm-delete-per-action'));
        $url = form.attr('action');
        var form_data = form.serialize();
        // $('.deleterole').attr('action',action);
        swal({
            title: "Are You Sure?",
            text: "Your order will be removed permanently !",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function(){
            $.post( $url, form_data)
                .done(function(response) {

                    swal("Deleted!", "Order was removed successfully", "success");
                    $(response).remove();
                    setTimeout(function() {
                        window.location.reload();
                    }, 2500);


                })
                .fail(function(response){
                    console.log(response)

                });
        });
    });

    $(document).on('click','.customer-remove', function (e) {
        e.preventDefault();
        var action = $(this).attr('hrm-delete-per-action');
            swal({
                title: "Are You Sure?",
                text: "Your login credentials including order details will be removed permanently!",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.get( action )
                    .done(function(response) {
                        swal("Deleted!", "Your credential was removed successfully", "success");
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);


                    })
                    .fail(function(response){
                        console.log(response)

                });
            });
        });
</script>
@endsection
