@extends('backend.layouts.master')
@section('title') Teams @endsection
@section('css')

    <style>

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        #team-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        .image-size {
            width: 150px;
            height: 150px;
        }
        /*end for image*/

    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['route' => 'teams.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Team Details
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Name <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">
                                Please enter the name.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Post  <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="post" required>
                            <div class="invalid-feedback">
                                Please enter the post.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Description <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" rows="6" maxlength="50" name="description" required></textarea>
                            <div class="invalid-feedback">
                                Please write the short description about service category.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>FB link </label>
                            <input type="url" class="form-control" name="fb">
                            <div class="invalid-feedback">
                                Please enter the fb link.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Twitter link </label>
                            <input type="url" class="form-control" name="twitter">
                            <div class="invalid-feedback">
                                Please enter the twitter link.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Instagram link </label>
                            <input type="url" class="form-control" name="insta">
                            <div class="invalid-feedback">
                                Please enter the Instagram link.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Linkedin </label>
                            <input type="url" class="form-control" name="linkedin">
                            <div class="invalid-feedback">
                                Please enter the Linkedin link.
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Team Image
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="image">
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 600 x 600px for Team</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Team Details</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}


        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Team List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="team-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Team Image</th>
                                            <th>Name</th>
                                            <th>Post</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$teams)
                                            @foreach($teams as  $team)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="team-img" src="<?php if(!empty($team->image)){ echo '/images/uploads/teams/'.$team->image; } else{  echo '/images/uploads/profiles/default-profile.png'; } ?>" alt="{{$team->name}}" class="image-size">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$team->name}}</td>
                                                    <td>{{(!empty($team->post) ? $team->post:"")}}</td>
                                                    <td>{{$team->description}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('teams.update',$team->id)}}" hrm-edit-action="{{route('teams.edit',$team->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('teams.destroy',$team->id)}}"> Delete </a>
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

    <div class="modal fade bd-example-modal-lg" id="editTeam">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateteams','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Team details</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Team Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Name <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <div class="invalid-feedback">
                                            Please enter the name.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Post  <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="post" id="post" required>
                                        <div class="invalid-feedback">
                                            Please enter the post.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="6" maxlength="50" name="description" id="description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please write the description.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>FB link </label>
                                        <input type="url" class="form-control" name="fb" id="fb">
                                        <div class="invalid-feedback">
                                            Please enter the fb link.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Twitter link </label>
                                        <input type="url" class="form-control" name="twitter" id="twitter">
                                        <div class="invalid-feedback">
                                            Please enter the twitter link.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Instagram link </label>
                                        <input type="url" class="form-control" name="insta" id="insta">
                                        <div class="invalid-feedback">
                                            Please enter the Instagram link.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Linkedin </label>
                                        <input type="url" class="form-control" name="linkedin" id="linkedin">
                                        <div class="invalid-feedback">
                                            Please enter the Linkedin link.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Team Image
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-9 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image-edit" onchange="loadeditFile(event)" name="image">
                                                        <label for="image-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="teams_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of  600 x 600px for team</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Update</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">

        var loadFile = function(event) {
            var image = document.getElementById('imageUpload');
            var replacement = document.getElementById('current-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadeditFile = function(event) {
            var image = document.getElementById('image-edit');
            var replacement = document.getElementById('current-edit-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#team-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });
        });



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
                    $("#editTeam").modal("toggle");
                    $('#name').attr('value',dataResult.name);
                    if(dataResult.post !== null){
                        $('#post').attr('value',dataResult.post);
                    }
                    $('#description').text(dataResult.description);
                    if(dataResult.fb !== null){
                        $('#fb').attr('value',dataResult.fb);
                    }
                    if(dataResult.insta !== null){
                        $('#insta').attr('value',dataResult.insta);
                    }
                    if(dataResult.twitter !== null){
                        $('#twitter').attr('value',dataResult.twitter);
                    }
                    if(dataResult.linkedin !== null){
                        $('#linkedin').attr('value',dataResult.linkedin);
                    }
                    if(dataResult.image !== null) {
                        $('#current-edit-img').attr("src", '/images/uploads/teams/' + dataResult.image);
                    }
                    $('.updateteams').attr('action',action);

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
                        swal("Deleted!", "Team details removed Successfully", "success");
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



