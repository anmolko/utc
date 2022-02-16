@extends('backend.layouts.master')
@section('title') Specification @endsection
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
            width: 150px;
            height: 150px;
        }

        /*end for image*/

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

    </style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                             Specification
                        </h4>
                    </div>
                    {!! Form::open(['route' => 'specification.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Specification Name <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" onclick="slugMaker('name','slug')" required>
                            <div class="invalid-feedback">
                                Please enter the specification name.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                            <div class="invalid-feedback">
                                Please enter the specification Slug.
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
                            Specification List
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="specification-index" class="table custom-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($specifications))
                                        @foreach($specifications as  $specification)
                                            <tr>
                                                <td>{{ ucwords(@$specification->name) }}</td>
                                                <td>{{ @$specification->slug }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('specification.update',$specification->id)}}" hrm-edit-action="{{route('specification.edit',$specification->id)}}"> Edit </a>
                                                            <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('specification.destroy',$specification->id)}}"> Delete </a>
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

    <!-- edit brand Modal -->
    @include('backend.specification.modals.edit')
    <!-- /edit brand Modal -->


@endsection

@section('js')

    <script type="text/javascript">
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#specification-index').DataTable({
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

        //Specification
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
                    $("#edit_spec").modal("toggle");
                    $('#update-name').attr('value',dataResult.name);
                    $('#update-slug').attr('value',dataResult.slug);
                    $('.updatespecification').attr('action',action);
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
                                title: "Warning.",
                                text: " Cannot Delete ! This specification is currently in use with products. You need to remove them first.",
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            }, function(){
                                //window.location.href = ""
                                swal.close();
                            })

                        }else{

                            swal("Deleted!", "Specification Deleted Successfully", "success");
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

        //end of Specification


    </script>
@endsection




