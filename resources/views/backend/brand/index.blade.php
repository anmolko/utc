@extends('backend.layouts.master')
@section('title') Brand and Series @endsection
@section('css')

    <style>
        /*for tab*/
        li.button-5 a{
            color: #FFFFFF;
        }

        li.button-6 a{
            color: #000000;
        }


        /*end for tab*/

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        #primary-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
            width: 200px;
        }

        /*end for image*/

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        .cat-preview{

        }




    </style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Brand Series</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            {{--Brand tab--}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Brand
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'brands.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Brand Name <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" onclick="slugMaker('name','slug')" required>
                                    <div class="invalid-feedback">
                                        Please enter the brand name.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                    <div class="invalid-feedback">
                                        Please enter the brand Slug.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Brand Logo Image <span class="text-muted text-danger">*</span></label>
                                    <div class="row justify-content-center">
                                        <div class="col-9 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="brandlogoUpload" onchange="loadbasicFile('brandlogoUpload','current-brand-img',event)" name="image" required />
                                                        <label for="brandlogoUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-brand-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="primary_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 170 x 130px for brand</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Brand List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="brands-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Brand Logo</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($brands))
                                                @foreach($brands as  $brand)
                                                    <tr>
                                                        <td class="align-middle pt-6 pb-4 px-6">
                                                            <div class="avatar-upload">
                                                                <div class="cat-preview">
                                                                    <img id="primary-img" src="{{asset('/images/uploads/brands/'.@$brand->image)}}" alt="{{@$brand->slug}}"/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ ucwords(@$brand->name) }}</td>
                                                        <td>{{ @$brand->slug }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('brands.update',$brand->id)}}" hrm-edit-action="{{route('brands.edit',$brand->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('brands.destroy',$brand->id)}}"> Delete </a>
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

            {{--Series tab--}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Series
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'brand-series.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <select class="form-control" name="brand_id" required>
                                        <option value selected disabled>Select brand</option>
                                        @if(!empty(@$brands))
                                            @foreach(@$brands as $brand)
                                                <option value="{{ @$brand->id }}" >{{ ucwords(@$brand->name) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Series Name <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="series-name" onclick="slugMaker('series-name','series-slug')" required />
                                    <div class="invalid-feedback">
                                        Please enter the series name.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="series-slug" required />
                                    <div class="invalid-feedback">
                                        Please enter the Series Slug.
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Series List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="series-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Brand</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($brand_series))
                                                @foreach($brand_series as  $series)
                                                    <tr>
                                                        <td>
                                                            {{ucwords($series->brand->name)}}
                                                        </td>
                                                        <td>{{ ucwords(@$series->name) }}</td>
                                                        <td>{{ @$series->slug }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-secondary-edit" href="#" hrm-update-action="{{route('brand-series.update',$series->id)}}" hrm-edit-action="{{route('brand-series.edit',$series->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-secondary-delete" href="#" hrm-delete-per-action="{{route('brand-series.destroy',$series->id)}}"> Delete </a>
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
    </div>

    <!-- edit brand Modal -->
    @include('backend.brand.modals.editbrand')
    <!-- /edit brand Modal -->

    <!-- edit brand series Modal -->
    @include('backend.brand.modals.editseries')
    <!-- /edit brand series Modal -->

@endsection

@section('js')

    <script type="text/javascript">
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#brands-index, #series-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

        });

        function slugMaker(title, slug){
            $("#"+ title).keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#"+slug).val(Text);
            });
        }

        //Brands
        $(document).on('click','.action-edit', function (e) {
            e.preventDefault();
            var url =  $(this).attr('hrm-edit-action');
            // console.log(action)
            var id=$(this).attr('id');
            var action = $(this).attr('hrm-update-action');
            $.ajax({
                url: $(this).attr('hrm-edit-action'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    // $('#id').val(data.id);
                    $("#edit_brands").modal("toggle");
                    $('#update-brand-name').attr('value',dataResult.name);
                    $('#update-brand-slug').attr('value',dataResult.slug);
                    if(dataResult.image !== null){
                        $('#brand-edit-img').attr("src",'/images/uploads/brands/'+dataResult.image );
                    }
                    $('.updatebrands').attr('action',action);
                },
                error: function(error){
                    console.log(error)
                }
            });
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
                text: "You will not be able to recover this",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        if(response == 0){
                            swal({
                                title: "Warning !",
                                text: "Cannot Delete ! This Brand has attached Series values currently in use. You need to remove them first.",
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            }, function(){
                                //window.location.href = ""
                                swal.close();
                            })

                        }else{

                            swal("Deleted!", "Brand Deleted Successfully", "success");
                            $(response).remove();
                            setTimeout(function() {
                                window.location.reload();
                            }, 2500);
                        }

                    })
                    .fail(function(response){
                        console.log(response)

                    });
            })

        })
        //end of brands

        //Series
        $(document).on('click','.action-secondary-edit', function (e) {
            e.preventDefault();
            var url =  $(this).attr('hrm-edit-action');
            // console.log(action)
            var id=$(this).attr('id');
            var action = $(this).attr('hrm-update-action');
            $.ajax({
                url: $(this).attr('hrm-edit-action'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult.name)
                    // $('#id').val(data.id);
                    $("#edit_series").modal("toggle");
                    $('#brand_id_edit option[value="'+dataResult.brand_id+'"]').prop('selected', true);
                    $('#series-name-edit').val(dataResult.name);
                    $('#series-slug-edit').val(dataResult.slug);
                    $('.updateseries').attr('action',action);
                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-secondary-delete', function (e) {
            e.preventDefault();
            var form = $('#deleted-form');
            var action = $(this).attr('hrm-delete-per-action');
            form.attr('action',$(this).attr('hrm-delete-per-action'));
            $url = form.attr('action');
            var form_data = form.serialize();
            // $('.deleterole').attr('action',action);
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover this",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        if(response == 0){
                            swal({
                                title: "Warning !",
                                text: "Cannot Delete ! This Secondary category has attached Products currently in use. You need to remove them first.",
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            }, function(){
                                //window.location.href = ""
                                swal.close();
                            })

                        }else{

                            swal("Deleted!", "Deleted Successfully", "success");
                            // toastr.success('file deleted Successfully');
                            $(response).remove();
                            setTimeout(function() {
                                window.location.reload();
                            }, 2500);
                        }

                    })
                    .fail(function(response){
                        console.log(response)

                    });
            })

        })
        //end of series


    </script>
@endsection




