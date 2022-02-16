@extends('backend.layouts.master')
@section('title') Product Categories @endsection
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
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Primary Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Secondary Category</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            {{--Primary category tab--}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Product Primary Category
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'proprimarycat.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Category Name <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" onclick="slugMaker('name','slug')" required>
                                    <div class="invalid-feedback">
                                        Please enter the category name.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                    <div class="invalid-feedback">
                                        Please enter the category Slug.
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
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Product Primary Category List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="primary-category-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($primary_categories))
                                                @foreach($primary_categories as  $categoryList)
                                                    <tr>
                                                        <td>{{ ucwords(@$categoryList->name) }}</td>
                                                        <td>{{ @$categoryList->slug }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('proprimarycat.update',$categoryList->id)}}" hrm-edit-action="{{route('proprimarycat.edit',$categoryList->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('proprimarycat.destroy',$categoryList->id)}}"> Delete </a>
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

            {{--Secondary category tab--}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Product Primary Category
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'secondarycat.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <select class="form-control" name="primary_category_id" required>
                                        <option value selected disabled>Select Primary Category</option>
                                        @if(!empty(@$primary_categories))
                                            @foreach(@$primary_categories as $primaryList)
                                                <option value="{{ @$primaryList->id }}" >{{ ucwords(@$primaryList->name) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Category Name <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="secondary-name" onclick="slugMaker('secondary-name','secondary-slug')" required />
                                    <div class="invalid-feedback">
                                        Please enter the Secondary category name.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="secondary-slug" required />
                                    <div class="invalid-feedback">
                                        Please enter the Secondary category Slug.
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
                                    Product Secondary Category List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="secondary-category-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Primary Category</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($secondary_categories))
                                                @foreach($secondary_categories as  $secondaryList)
                                                    <tr>
                                                        <td>
                                                           {{ucwords($secondaryList->primary->name)}}
                                                        </td>
                                                        <td>{{ ucwords(@$secondaryList->name) }}</td>
                                                        <td>{{ @$secondaryList->slug }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-secondary-edit" href="#" hrm-update-action="{{route('secondarycat.update',$secondaryList->id)}}" hrm-edit-action="{{route('secondarycat.edit',$secondaryList->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-secondary-delete" href="#" hrm-delete-per-action="{{route('secondarycat.destroy',$secondaryList->id)}}"> Delete </a>
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

    <div class="modal fade" id="edit_primary_category">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pb-4">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateprimarycategory','novalidate'=>'']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Primary Category</h4>
                    <div class="form-group mb-3">
                        <label>Category Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="update-name" onclick="slugMaker('update-name','update-slug')" required>
                        <div class="invalid-feedback">
                            Please enter the category name.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slug <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" id="update-slug" required>
                        <div class="invalid-feedback">
                            Please enter the category Slug.
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_secondary_category">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pb-4">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatesecondarycategory','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Secondary Category</h4>

                    <div class="form-group mb-3">
                        <select class="form-control" name="primary_category_id" id="primary_category_id_edit" required>
                            <option value disabled>Select Primary Category</option>
                            @if(!empty(@$primary_categories))
                                @foreach(@$primary_categories as $primaryList)
                                    <option value="{{ @$primaryList->id }}" >{{ ucwords(@$primaryList->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="secondary-name-edit" onclick="slugMaker('secondary-name-edit','secondary-slug-edit')" required>
                        <div class="invalid-feedback">
                            Please enter the Secondary category name.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slug <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" id="secondary-slug-edit" required>
                        <div class="invalid-feedback">
                            Please enter the Secondary category Slug.
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
                </div>

                {!! Form::close() !!}


            </div>
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
            $('#primary-category-index, #secondary-category-index').DataTable({
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

        //Primary category
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
                    $("#edit_primary_category").modal("toggle");
                    $('#update-name').attr('value',dataResult.name);
                    $('#update-slug').attr('value',dataResult.slug);
                    if(dataResult.image !== null){
                        $('#current-edit-img').attr("src",'/images/uploads/product_primary/'+dataResult.image );
                    }
                    if(dataResult.banner !== null){
                        $('#current-imageeditbannerUpload-img').attr("src",'/images/uploads/product_primary/banners/'+dataResult.banner );
                    }
                    $('.updateprimarycategory').attr('action',action);
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
                                text: "Cannot Delete ! This primary category has attached Secondary Category values currently in use. You need to remove them first.",
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

        //end of primary category

        //secondary category
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
                    $("#edit_secondary_category").modal("toggle");
                    $('#primary_category_id_edit option[value="'+dataResult.primary_category_id+'"]').prop('selected', true);
                    $('#secondary-name-edit').val(dataResult.name);
                    $('#secondary-slug-edit').val(dataResult.slug);
                    $('.updatesecondarycategory').attr('action',action);
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


    </script>
@endsection




