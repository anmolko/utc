@extends('backend.layouts.master')
@section('title') Products @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/dropzone/dropzone.css')}}">
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
                                                            <td>{{ucfirst(@$product->primaryCategory->name)}}</td>
                                                            <td>{{ucfirst(@$product->brand->name)}}</td>
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
                                                                        <a class="dropdown-item action-front" href="#"> Frontend View</a>
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



            {{-- product list page gallery--}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-body">
                                <h2 class="page-heading">Upload your Images <span id="counter"></span></h2>
                                <div class="invalid-feedback">    </div>
                                {!! Form::open(['url'=>route('banner-gallery.store'),'method'=>'post','class'=>'dropzone','id'=>'myDropzone','enctype'=>'multipart/form-data']) !!}
                                <div class="dz-message">
                                    <div class="col-xs-8">
                                        <div class="">
                                            <p>Drop files here or Click to Upload</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                {!! Form::close() !!}


                                Dropzone Preview Template
                                <div id="preview" style="display: none;">

                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-image"><img data-dz-thumbnail /></div>

                                        <div class="dz-details">
                                            <div class="dz-size"><span data-dz-size></span></div>
                                            <div class="dz-filename"><span data-dz-name></span></div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>


                                        <div class="dz-success-mark">

                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                <title>Check</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                                </g>
                                            </svg>

                                        </div>
                                        <div class="dz-error-mark">

                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                <title>error</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                    <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                End of Dropzone Preview Template

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <form action="#" method="post" id="deleted-form" >
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
            </form>
        </div>



    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone-product.config.js')}}"></script>
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



