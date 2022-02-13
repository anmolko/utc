@extends('backend.layouts.master')
@section('title') {{ucwords(@$product->name)}} - SEO  @endsection
@section('content')

<div class="col-xl-9 col-lg-8 col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                    <h4 class="card-title d-inline-block mb-0">
                         Add product seo for :: <strong>{{ucwords(@$product->name)}}</strong>
                    </h4>
                    <a href="{{route('products.index')}}" class="float-right add-doc text-primary">Go Back
                    </a>
            </div>
        </div>
        {!! Form::open(['route' => 'product-seo.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

        <div class="row">
            <div class="col-lg-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block mb-0">
                                    Product SEO details
                                </h4>
                            </div>
                         <div class="card-body">  
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title" class="text-heading">Title *</label>
                                        <input class="form-control" type="hidden" value="{{@$product->id}}" name="product_id" >
                                        <input type="text" class="form-control "
                                            id="title" name="title"  required>
                                        <div class="invalid-feedback">
                                            Please enter page SEO title.
                                        </div>
                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('title')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="description" class="text-heading">Description *</label>
                                        <textarea class="form-control "
                                                name="description" rows="5"
                                                required></textarea>

                                        <div class="invalid-feedback">
                                            Please enter a description.
                                        </div>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('description')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="keywords" class="text-heading">Keywords *</label>
                                        <textarea class="form-control "
                                                name="keywords" rows="5"
                                                required></textarea>
                                        <p class="mb-0 mt-2">
                                            *use comma(,) to separate the words.<br/> *Eg: Property1, on-sale etc.
                                        </p>
                                        <div class="invalid-feedback">
                                            Please enter a SEO keywords.
                                        </div>
                                        @if($errors->has('keywords'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('keywords')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-space-around flex-wrap ">
                                <button type="submit" class="btn btn-lg btn-block btn btn-theme button-1 text-white ctm-border-radius" >Add Product SEO</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {!! Form::close() !!}
   
</div>
@endsection
