@extends('frontend.layouts.master')
@section('title') User Dashboard @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script src="{{asset('assets/frontend/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
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

                    <a class="nav-link mb-3 p-3 shadow" href="{{route('customer.destroy')}}" onclick="return confirm('Are you sure, you want to delete it?')" aria-selected="false">
                        <i class="fas fa-user-slash mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Delete Account</span></a>


                        <form id="customer-logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                                @csrf
                            </form>

                        <a class="nav-link mb-3 p-3 shadow"  href="#"   onclick="event.preventDefault();
                                                     document.getElementById('customer-logout-form').submit();" id="v-pills-settings-tab" aria-selected="false">
                        <i class="fas fa-sign-out-alt mr-2"></i>
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
                            <form id="form-contact" action="" id="form-contact" method="post" enctype="multipart/form-data">
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

                                <div class="form-box password-contact">
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
                        <h4 class="font-italic mb-4">My Orders</h4>

                        @if(count($orders)>0)
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
                                        @foreach($orders as  $order)
                                            <tr data-child-value="{{$order}}">
                                                <td class="details-control"><i class="fa fa-plus-square" aria-hidden="true"></i></td>
                                                <td>{{@$order->order_number}}</td>
                                                <td>NPR. {{number_format(@$order->total_amount)}}</td>
                                                <td>{{\Carbon\Carbon::parse(@$order->created_at)->isoFormat('MMM Do, YYYY')}}</td>
                                                <td>{{@$order->user->email}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            {{--                                                                        <a class="dropdown-item action-blog-edit" href="#" hrm-update-action="{{route('blog.update',$blog->id)}}" hrm-edit-action="{{route('blog.edit',$blog->id)}}"> Edit </a>--}}
                                                            <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('orders.destroy',$order->id)}}"> Delete </a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <section class="flat-imagebox style4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="flat-row-title">
                                                <h3>Latest Products</h3>
                                            </div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="owl-carousel-3">
                                                @foreach($latestProducts as $index => $latest)

                                                    <div class="imagebox style4">
                                                        @if($latest->state == "new_arrival")
                                                            <span class="item-new">NEW</span>
                                                        @elseif($latest->state == "sale")
                                                            <span class="item-sale">SALE</span>
                                                        @endif

                                                        <div class="box-image single-image">
                                                            <a href="{{route('product.single',@$latest->slug)}}" title="">
                                                                <img src="<?php if(@$latest->thumbnail){?>{{asset('/images/uploads/products/'.@$latest->thumbnail)}}<?php }?>" alt="{{@$latest->slug}}"/>
                                                            </a>
                                                        </div><!-- /.box-image -->
                                                        <div class="box-content">
                                                            <div class="cat-name">
                                                                <a href="#" title="">{{@ucwords($latest->type)}}</a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="{{route('product.single',@$latest->slug)}}" title="">{{ucwords(Str::limit(@$latest->name,100,' ...'))}}</a>
                                                            </div>
                                                            <div class="price">
                                                                @if($latest->state == "sale")
                                                                    <span class="sale">NPR {{number_format(@$latest->discount_price)}}</span>
                                                                    <span class="regular">NPR {{number_format(@$latest->price)}}</span>
                                                                @else
                                                                    <span class="sale">NPR {{number_format(@$latest->price)}}</span>
                                                                @endif
                                                            </div>
                                                        </div><!-- /.box-content -->
                                                    </div><!-- /.imagebox style4 -->
                                                @endforeach

                                            </div><!-- /.owl-carousel-3 -->
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </section><!-- /.flat-imagebox style4 -->

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#all-orders').DataTable();

    })
</script>
@endsection
