@extends('backend.layouts.master')
@section('title') User Management @endsection
@section('content')

    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="false">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-customer-tab" data-toggle="pill" href="#pills-customer" role="tab" aria-controls="pills-customer" aria-selected="false">Customer</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">

            <div class="card shadow-sm ctm-border-radius grow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0 d-inline-block">Total Users: {{@$all_user->count()}}  </h4>
                    <a href="{{route('user.create')}}" class="btn btn-theme button-1 ctm-border-radius text-white float-right"><span></span><i class="fa fa-plus"></i> Create User</a>
                </div>
                <div class="card-body align-center">
                    <div class="tab-content" id="v-pills-tabContent">

                        <form action="#" method="post" id="deleted-form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                        </form>
                            {{--All tab--}}
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="alluser-index" class="table custom-table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>User Type</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(@$all_user)
                                                @foreach($all_user as  $user)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('user.edit',$user->id)}}" class="avatar">

                                                                @if($user->user_type == 'customer')
                                                                    <img class="img-fluid"  src="<?php if(!empty(@$user->image)){ echo @$user->image; } else { if(@$user->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$user->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$user->gender=="others") {echo '/images/uploads/profiles/others.png'; } } ?>" alt="{{@$user->name}}">
                                                                @else
                                                                    <img class="img-fluid"  src="<?php if(!empty(@$user->image)){ echo '/images/uploads/profiles/'.@$user->image; } else { if(@$user->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$user->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$user->gender=="others") {echo '/images/uploads/profiles/others.png'; } } ?>" alt="{{@$user->name}}">

                                                                @endif


                                                            </a>


                                                            <h2>

                                                                <a href="{{route('user.edit',$user->id)}}"> {{ucwords(@$user->name)}}</a></h2>
                                                        </td>
                                                        <td>{{@$user->email}}</td>
                                                        <td>{{@$user->contact}}</td>
                                                        <td>{{ucwords(@$user->user_type)}}</td>
                                                        <td>
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> {{(($user->status == 0) ? "Deactive":"Active")}} <i class="caret"></i></a>
                                                                <div class="dropdown-menu">
                                                                    @if($user->status == 0)
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="1">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="0">Deactive</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-action">
                                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-outline-success">
                                                                    <span class="lnr lnr-pencil"></span> Edit
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger action-per-delete"  aurum-delete-per-action="{{route('user.destroy',$user->id)}}">
                                                                    <span class="lnr lnr-trash"></span> Delete
                                                                </a>
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

                            {{--Admin tab--}}
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="admin-index" class="table custom-table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Join Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(@$admin)
                                                @foreach($admin as  $user)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('user.edit',$user->id)}}" class="avatar"><img class="img-fluid"  src="<?php if(!empty(@$user->image)){ echo '/images/uploads/profiles/'.@$user->image; } else { if(@$user->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$user->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$user->gender=="others") {echo '/images/uploads/profiles/others.png'; } } ?>" alt="{{@$user->name}}"></a>
                                                            <h2><a href="{{route('user.edit',$user->id)}}"> {{ucwords(@$user->name)}}</a></h2>
                                                        </td>
                                                        <td>{{@$user->email}}</td>
                                                        <td>{{@$user->contact}}</td>
                                                        <td>{{date('j F, Y',strtotime(@$user->created_at))}}</td>
                                                        <td>
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> {{(($user->status == 0) ? "Deactive":"Active")}} <i class="caret"></i></a>
                                                                <div class="dropdown-menu">
                                                                    @if($user->status == 0)
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="1">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="0">Deactive</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-action">
                                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-outline-success">
                                                                    <span class="lnr lnr-pencil"></span> Edit
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger action-per-delete"  aurum-delete-per-action="{{route('user.destroy',$user->id)}}">
                                                                    <span class="lnr lnr-trash"></span> Delete
                                                                </a>
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

                            {{--general tab--}}
                            <div class="tab-pane fade" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="general-index" class="table custom-table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Join Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(@$general)
                                                @foreach($general as  $user)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('user.edit',$user->id)}}" class="avatar"><img class="img-fluid"  src="<?php if(!empty(@$user->image)){ echo '/images/uploads/profiles/'.@$user->image; } else { if(@$user->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$user->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$user->gender=="others") {echo '/images/uploads/profiles/others.png'; } } ?>" alt="{{@$user->name}}"></a>
                                                            <h2><a href="{{route('user.edit',$user->id)}}"> {{ucwords(@$user->name)}}</a></h2>
                                                        </td>
                                                        <td>{{@$user->email}}</td>
                                                        <td>{{@$user->contact}}</td>
                                                        <td>{{date('j F, Y',strtotime(@$user->created_at))}}</td>
                                                        <td>
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> {{(($user->status == 0) ? "Deactive":"Active")}} <i class="caret"></i></a>
                                                                <div class="dropdown-menu">
                                                                    @if($user->status == 0)
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="1">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="0">Deactive</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-action">
                                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-outline-success">
                                                                    <span class="lnr lnr-pencil"></span> Edit
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger action-per-delete"  aurum-delete-per-action="{{route('user.destroy',$user->id)}}">
                                                                    <span class="lnr lnr-trash"></span> Delete
                                                                </a>
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

                            {{--customer tab--}}
                            <div class="tab-pane fade" id="pills-customer" role="tabpanel" aria-labelledby="pills-customer-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="general-index" class="table custom-table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Join Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(@$customer)
                                                @foreach($customer as  $user)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('user.edit',$user->id)}}" class="avatar">
                                                                <img class="img-fluid"  src="<?php if(!empty(@$user->image)){ echo @$user->image; } else { if(@$user->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$user->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$user->gender=="others") {echo '/images/uploads/profiles/others.png'; } } ?>" alt="{{@$user->name}}"></a>
                                                            <h2><a href="{{route('user.edit',$user->id)}}"> {{ucwords(@$user->name)}}</a></h2>
                                                        </td>
                                                        <td>{{@$user->email}}</td>
                                                        <td>{{@$user->contact}}</td>
                                                        <td>{{date('j F, Y',strtotime(@$user->created_at))}}</td>
                                                        <td>
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> {{(($user->status == 0) ? "Deactive":"Active")}} <i class="caret"></i></a>
                                                                <div class="dropdown-menu">
                                                                    @if($user->status == 0)
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="1">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item status-update" aurum-update-action="{{route('user-status.update',$user->id)}}" href="#" id="0">Deactive</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-action">
                                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-outline-success">
                                                                    <span class="lnr lnr-pencil"></span> Edit
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger action-per-delete"  aurum-delete-per-action="{{route('user.destroy',$user->id)}}">
                                                                    <span class="lnr lnr-trash"></span> Delete
                                                                </a>
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

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#alluser-index, #admin-index , #general-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

        });


    $(document).on('click','.status-update', function (e) {
        e.preventDefault();
        var status = $(this).attr('id');
        var url = $(this).attr('aurum-update-action');
        if(status == '0'){
            swal({
                title: "Are You Sure?",
                text: "Setting the user status to De-active will prevent them from logging in. \n \n Set their status to active to enable the login feature!",
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
                    swal("Success!", "User Status has been updated", "success");
                    $(dataResult).remove();
                    setTimeout(function() {
                        window.location.reload();
                    }, 2500);
                }else{
                    swal({
                        title: "Error!",
                        text: "Failed to update user status",
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
                    title: 'User Warning',
                    text: "Error. Could not confirm the status of the user.",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                });
            }
        });
    }

    $(document).on('click','.action-per-delete', function (e) {
        e.preventDefault();
        var form = $('#deleted-form');
        var action = $(this).attr('aurum-delete-per-action');
        form.attr('action',$(this).attr('aurum-delete-per-action'));
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
                        swal("Deleted!", "Deleted Successfully", "success");
                        // toastr.success('file deleted Successfully');
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                })
                .fail(function(response){
                    // console.log(response)
                });
        })
    })

    </script>
@endsection
