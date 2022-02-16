@extends('backend.layouts.master')
@section('title') Products @endsection
@section('css')

    <style>
        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        #product-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        .hide-overflow{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
            max-width: 170px;
        }


        /*end for image*/


    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="card shadow-sm ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product Banners</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="company-doc">
                            <div class="card ctm-border-radius shadow-sm">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block mb-0">
                                        Products
                                    </h4>
                                    <a href="{{route('products.create')}}" class="float-right add-doc text-primary">Add Product
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="employee-office-table">
                                        <div class="table-responsive">
                                            <table id="product-index" class="table custom-table">
                                                <thead>
                                                <tr>
                                                    <th>Thumbnail</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Primary Category</th>
                                                    <th>Brand</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(@$products)
                                                    @foreach($products as  $product)
                                                        <tr>
                                                            <td class="align-middle pt-6 pb-4 px-6">
                                                                <div class="avatar-upload">
                                                                    <div class="blog-preview">
                                                                        <img id="product-img" src="{{asset('/images/uploads/products/'.$product->thumbnail)}}" />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="hide-overflow">{{$product->name}}</td>
                                                            <td  class="hide-overflow">{{$product->slug}}</td>
                                                            <td>{{ucfirst($product->primaryCategory->name)}}</td>
                                                            <td>{{ucfirst($product->brand->name)}}</td>
                                                            <td><div class="dropdown action-label drop-active">
                                                                    <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> {{(($product->status == 'active') ? "Active":"De-active")}}
                                                                    </a>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                        @if($product->status == 'active')

                                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('products-status.update',$product->id)}}" href="#" id="deactive"> De-active </a>
                                                                        @else
                                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('products-status.update',$product->id)}}" href="#" id="active"> Active </a>
                                                                        @endif
                                                                    </div>
                                                                </div></td>
                                                            <td class="text-right">
                                                                <div class="dropdown action-label drop-active">
                                                                    <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                        <a class="dropdown-item action-edit" href="{{route('products.edit',$product->id)}}"> Edit </a>
                                                                        <a class="dropdown-item action-gallery" href="{{route('products.galleryindex',$product->id)}}"> Gallery </a>
                                                                        <a class="dropdown-item action-seo" href="{{route('product-seo.edit',$product->id)}}"> SEO </a>
                                                                        <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('products.destroy',$product->id)}}"> Delete </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if(@$productbanner !== null)
                    {!! Form::open(['method'=>'PUT','url'=>route('banner.update', $productbanner->id),'class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                @else
                    {!! Form::open(['route' => 'banner.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                @endif
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Product List Page Image <span class="text-muted text-danger">*</span>
                                        </h4>
                                    </div>
                                    <input type="hidden" value="product" name="name"/>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-8 mb-4">
                                                <div class="custom-file h-auto">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file" accept="image/png, image/jpeg" class="custom-file-input" hidden="" id="imageUpload" onchange="loadbasicFile('imageUpload','current-img',event)" name="image" {{(@$productbanner == null) ? "required":""}}>
                                                            <label for="imageUpload"></label>
                                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                Please select a banner image.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(@$productbanner !== null)
                                                        <img id="current-img" src="{{asset('/images/uploads/banners/'.@$productbanner->image)}}" alt="{{$productbanner->name}}" class="w-100 current-img">
                                                    @else
                                                        <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="product_banner_image" class="w-100 current-img">
                                                    @endif
                                                </div>
                                                <span class="ctm-text-sm">*use image minimum of 1479 x 311px for product banner</span>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">{{(@$productbanner->image !== null) ? "Update":"Add"}}</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <form action="#" method="post" id="deleted-form" >
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
            </form>
        </div>



    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#product-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

        });


        $(document).on('click','.status-update', function (e) {
            e.preventDefault();
            var status = $(this).attr('id');
            var url = $(this).attr('hrm-update-action');
            if(status == 'deactive'){
                swal({
                    title: "Are You Sure?",
                    text: "Setting the Product status to de-active will prevent them from displaying. \n \n Set their status to Publish to enable the displaying feature!",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function(){
                    statusupdate(url,status);
                });
            }else{
                statusupdate(url,status);
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
                text: "You will not be able to recover this Product",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {

                        swal("Deleted!", "Product Removed Successfully", "success");
                        // toastr.success('file deleted Successfully');
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);


                    })
                    .fail(function(response){
                        console.log(response)

                    });
            })

        })


        function statusupdate(url,status){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: url,
                type: "PATCH",
                cache: false,
                data:{
                    status: status,
                },
                success: function(dataResult){
                    if(dataResult == "yes"){
                        swal("Success!", "Product Status has been updated", "success");
                        $(dataResult).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal({
                            title: "Error!",
                            text: "Failed to update Product status",
                            type: "error",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        }, function(){
                            //window.location.href = ""
                            swal.close();
                        })
                    }
                },
                error: function() {
                    swal({
                        title: 'Blog Warning',
                        text: "Error. Could not confirm the status of the Product.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    });
                }
            });
        }




    </script>
@endsection



