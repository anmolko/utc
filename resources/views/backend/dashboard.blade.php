@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('css')
<style>
    .blog-list-image{
        width: 34px;
        height: 34px;
    }
    .dash-card-container {
        display: block;
    }
</style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Users</h4>
                            <p class="card-text">{{@$user_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-warning">
                            <i class="fa fa-th-list"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Blogs</h4>
                            <p class="card-text">{{@$blog_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Product</h4>
                            <p class="card-text">{{@$product_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-success">
                            <i class="fa fa-object-group" aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Categories</h4>
                            <p class="card-text">{{@$primary_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Products</h4>
                        <a href="{{route('products.index')}}" class="dash-card float-right mb-0 text-primary">Manage Products </a>

                    </div>
                    <div class="card-body recent-activ">
                        <div class="recent-comment">
                                <div class="dash-card-container">

                                @if(count(@$latestProduct) > 0)

                                    @foreach(@$latestProduct as $index => $latest)

                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Page Name" value="{{ucwords(@$latest->name)}}" readonly>
                                                <div class="input-group-append">
                                                    <a class="btn btn-theme text-white" href="{{route('products.edit',$latest->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <hr>

                                    @endforeach
                                @else

                                <p>There are no listed products found. You can start by add one from <a href="{{route('products.create')}}">here.</a></p>

                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 d-flex">

                <div class="card flex-fill team-lead shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Users </h4>
                        <a href="{{route('user.index')}}" class="dash-card float-right mb-0 text-primary">Manage Users </a>
                    </div>
                    <div class="card-body">
                        @if(count(@$latestUsers) > 0)
                            @foreach(@$latestUsers as $index => $latest)
                                <div class="media mb-3">
                                    <div class="e-avatar avatar-online mr-3">
                                        @if($latest->user_type == 'customer')
                                            <img src="<?php if(!empty(@$latest->image)){ echo @$latest->image; } else { if(@$latest->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$latest->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$latest->gender=="others") {echo '/images/uploads/profiles/other.png'; } } ?>" alt="{{@$user->name}}" class="img-fluid">
                                        @else
                                            <img src="<?php if(!empty(@$latest->image)){ echo '/images/uploads/profiles/'.@$latest->image; } else { if(@$latest->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$latest->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$latest->gender=="others") {echo '/images/uploads/profiles/other.png'; } } ?>" alt="{{@$user->name}}" class="img-fluid">

                                        @endif
                                    </div>

                                    <div class="media-body">
                                        <h6 class="m-0"><a href="{{route('user.edit',@$latest->id)}}">{{ucwords(@$latest->name)}}</a> <span>| {{ucwords(@$latest->user_type)}}</span></h6>
                                        <p class="mb-0 ctm-text-sm">{{@$latest->email}}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 d-flex">

                <div class="card flex-fill team-lead shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Product Primary Category </h4>
                        <a href="{{route('proprimarycat.index')}}" class="dash-card float-right mb-0 text-primary">Manage Categories </a>
                    </div>
                    <div class="card-body">
                        @if(count(@$latestcategory) > 0)
                            @foreach(@$latestcategory as $index => $latest)

                                <div class="media mb-3">
                                    <div class="media-body">
                                        <h6 class="m-0">{{ucwords($latest->name)}}</h6>
                                        <p class="mb-0 ctm-text-sm">{{'Has '. count($latest->secondary)." secondary Category"}} | {{ 'Used in ' .count($latest->products)." Product(s)"}} </p>
                                    </div>
                                </div>
                                <hr/>

                            @endforeach
                        @else

                            <p>There are no listed products primary found. You can start by add one from <a href="{{route('proprimarycat.index')}}">here.</a></p>

                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 d-flex">

                <div class="card recent-acti flex-fill shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Blogs</h4>
                        <a href="{{route('blogcategory.index')}}" class="dash-card float-right mb-0 text-primary">Manage Blogs </a>

                    </div>
                    <div class="card-body recent-activ admin-activ">
                        <div class="recent-comment">
                        @if(count(@$latestPosts) > 0)

                        @foreach(@$latestPosts as $index => $latest)

                        <?php
                            $created_by_id      = @$latest->created_by;
                            $user_name          = \App\Models\User::find($created_by_id)->name;
                            ?>
                            <div class="notice-board">
                                <div class="table-img">
                                    <div class="e-avatar mr-3"><img class="img-fluid blog-list-image" src="<?php if(@$latest->image){?>{{asset('/images/uploads/blog/'.@$latest->image)}}<?php }?>" alt="{{@$latest->title}}"></div>
                                </div>
                                <div class="notice-body">
                                    <h6 class="mb-0"><a href="{{route('blog.single',@$latest->slug)}}" target="_blank">{{ucwords(@$latest->title)}}</a></h6>
                                    <span class="ctm-text-sm">{{ucwords(@$user_name)}} | {{date('j F, Y',strtotime(@$latest->created_at))}}</span>
                                </div>
                            </div>
                            <hr>

                        @endforeach
                        @else

                        <p>There are no listed blog found. You can start by add one from <a href="{{route('blogcategory.index')}}">here.</a></p>
                        @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if($setting_data !== null)
    <!-- Edit Status Modal !-->
    <div class="modal fade" id="editStatus" role="document">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {!! Form::open(['url'=>route('status.update', @$setting_data->id),'method'=>'PUT','class'=>'needs-validation updatestatus','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body style-add-modal">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Company Status </h4>
                    <p class="text-danger mb-3">Minimum 100 on each field </p>
                    <div class="form-group">
                        <label>Customer Served <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="customer_served" value="{{@$setting_data->customer_served}}" required>
                            <div class="invalid-feedback">
                                Please enter the customer served.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Visa Approved <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="visa_approved" value="{{@$setting_data->visa_approved}}" required>
                            <div class="invalid-feedback">
                                Please enter the visa approved.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Success Stories <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="success_stories"  value="{{@$setting_data->success_stories}}" required>
                            <div class="invalid-feedback">
                                Please enter the success stories.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Happy Customers <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number"  min="100" name="happy_customers" value="{{@$setting_data->happy_customers}}" required>
                            <div class="invalid-feedback">
                                Please enter the happy customers.
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mb-3 btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="mb-3 btn btn-theme ctm-border-radius text-white float-right button-1">Update</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endif

@endsection

@section('js')
<script type="text/javascript">


</script>

@endsection
