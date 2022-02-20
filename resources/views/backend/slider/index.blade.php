@extends('backend.layouts.master')
@section('title') Sliders @endsection
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

        #blog-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
            width: 200px;
            height: 200px;
        }

        /*end for image*/


    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Sliders
                            </h4>
                                <a href="javascript:void(0)" class="float-right add-doc text-primary" data-toggle="modal" data-target="#addSlider">Add Slider
                                </a>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="slider-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Slider Image</th>
                                            <th>heading</th>
                                            <th>Sub heading</th>
                                            <th>Button Link</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$sliders)
                                            @foreach($sliders as  $slider)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="blog-img" src="{{asset('/images/uploads/sliders/'.$slider->image)}}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$slider->heading}}</td>
                                                    <td>{{$slider->subheading}}</td>
                                                    <td>{{$slider->button_link}}</td>
                                                    <td><div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> {{(($slider->status == 'active') ? "Active":"De-active")}}
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                @if($slider->status == 'active')

                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('sliders-status.update',$slider->id)}}" href="#" id="deactive"> De-active </a>
                                                                @else
                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('sliders-status.update',$slider->id)}}" href="#" id="active"> Active </a>
                                                                @endif
                                                            </div>
                                                        </div></td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('sliders.update',$slider->id)}}" hrm-edit-action="{{route('sliders.edit',$slider->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('sliders.destroy',$slider->id)}}"> Delete </a>
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



    <div class="modal fade bd-example-modal-lg" id="addSlider">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['route' => 'sliders.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}


                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Add Slider</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        General Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                        <input type="text" maxlength="30" class="form-control" name="heading" required />
                                        <div class="invalid-feedback">
                                            Please enter the slider heading.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Heading  <span class="text-muted text-danger">*</span></label>
                                        <input type="text" maxlength="60"  class="form-control" name="subheading" required/>
                                        <div class="invalid-feedback">
                                            Please enter the slider subheading.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Description <span class="text-muted text-danger">*</span></label>
                                        <textarea type="text" maxlength="255" rows="4" class="form-control" name="description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the slider product description.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price  <span class="text-muted text-danger">*</span></label>
                                        <input type="number"  min="1" class="form-control" name="price" required />
                                        <div class="invalid-feedback">
                                            Please enter the price.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount Price </label>
                                        <input type="number"  class="form-control" name="discount_price"/>
                                        <div class="invalid-feedback">
                                            Please enter the discount price.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Button link <span class="text-muted text-danger">*</span></label>
                                        <input type="url" class="form-control" name="button_link" required />
                                        <div class="invalid-feedback">
                                            Please enter the button link.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Slider Image <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-6 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image" onchange="loadbasicFile('image','current-img',event)" name="image" required>
                                                        <label for="image"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="slider image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 460 x 430px for slider</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" value="active">Active</button>
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" value="deactive">De-Active</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="editSlider">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateslider','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Update Slider</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        General Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                        <input type="text" maxlength="30" class="form-control" name="heading" id="heading" required>
                                        <div class="invalid-feedback">
                                            Please enter the slider heading.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Heading  <span class="text-muted text-danger">*</span></label>
                                        <input type="text" maxlength="60" class="form-control" name="subheading" id="subheading" required />
                                        <div class="invalid-feedback">
                                            Please enter the slider subheading.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description<span class="text-muted text-danger">*</span></label>
                                        <textarea maxlength="255" type="text" rows="4" class="form-control" name="description" id="description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the description of the product.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price  <span class="text-muted text-danger">*</span></label>
                                        <input type="number"  min="1" class="form-control" name="price" id="price" required />
                                        <div class="invalid-feedback">
                                            Please enter the price.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Discount Price </label>
                                        <input type="number"  class="form-control" name="discount_price" id="discount_price"/>
                                        <div class="invalid-feedback">
                                            Please enter the discount price.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Button link <span class="text-muted text-danger">*</span></label>
                                        <input type="url" class="form-control" name="button_link" id="button_link" required>
                                        <div class="invalid-feedback">
                                            Please enter the button link.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Slider Image <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-6 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image-edit" onchange="loadbasicFile('image-edit','current-edit-img',event)" name="image">
                                                        <label for="image-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="slider image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 460 x 430px for slider front</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" value="active">Active</button>
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" value="deactive">De-Active</button>
                    </div>
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
            $('#slider-index').DataTable({
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
                    $("#editSlider").modal("toggle");
                    $('#heading').attr('value',dataResult.heading);
                    $('#subheading').attr('value',dataResult.subheading);
                    $('#discount_price').attr('value',dataResult.discount_price);
                    $('#price').attr('value',dataResult.price);
                    
                    $('#status').attr('value',dataResult.status);
                    $('#current-edit-img').attr("src",'/images/uploads/sliders/'+dataResult.image);
                    $('#description').text(dataResult.description);
                    $('#button_link').attr('value',dataResult.button_link);
                    $('.updateslider').attr('action',action);
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
                        swal("Deleted!", "Slider Deleted Successfully", "success");
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

        $(document).on('click','.status-update', function (e) {
            e.preventDefault();
            var status = $(this).attr('id');
            var url = $(this).attr('hrm-update-action');
            if(status == 'deactive'){
                swal({
                    title: "Are You Sure?",
                    text: "Setting the slider status to de-active will prevent them from displaying. \n \n Set their status to Publish to enable the displaying feature!",
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

        //end of blog

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
                        swal("Success!", "Slider Status has been updated", "success");
                        $(dataResult).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal({
                            title: "Error!",
                            text: "Failed to update slider status",
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
                        text: "Error. Could not confirm the status of the slider.",
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



