@extends('backend.layouts.master')
@section('title') Ads @endsection
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
            width: 400px;
            height: 150px;
        }
    </style>
@endsection
@section('content')


    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="col-xl-12 col-lg-12 col-md-12">
            {!! Form::open(['route' => 'ad.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <div class="card ctm-border-radius shadow-sm flex-fill">
                        <div class="card-header">
                            <h4 class="card-title mb-0">
                                Ad Details
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label>Ads Type <span class="text-muted text-danger">*</span></label>
                                        <select class="form-control" name="type" id="ad_type" required>
                                            <option value disabled selected>Select Ads Type</option>
                                            <option value="single" >Single</option>
                                            <option value="double" >Double</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a ads type.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group mb-3">
                                        <label>Display Position <span class="text-muted text-danger">*</span></label>
                                        <select class="form-control" name="position" required>
                                            <option value disabled selected>Select Position</option>
   
                                         
                                                    <option value="first" {{(@$checkfirst !=null) ? "disabled" : "";}} >First</option>
                                                    <option value="second" {{(@$checksecond !=null) ? "disabled" : "";}}>Second</option>
                                                    <option value="third" {{(@$checkthird != null) ? "disabled" : "";}}>Third</option>
                                                    <option value="four" {{(@$checkfour != null) ? "disabled" : "";}}>Four</option>
                                                    
                                                
                                           
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a position.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ad-container">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label>Url for First Image <span class="text-muted text-danger">*</span></label>
                                        <input type="url" class="form-control" name="first_url"  required>
                                        <div class="invalid-feedback">
                                            Please enter the first url.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 double-url" >
                                    <div class="form-group mb-3">
                                        <label> Url for Second Image <span class="text-muted text-danger">*</span></label>
                                        <input type="url" class="form-control" name="second_url"  id="second_url"  required>
                                        <div class="invalid-feedback">
                                            Please enter the second url.
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 d-flex">
                                    <div class="row ">
                                        <div class="col-7">
                                            <label>First Image  <span class="text-muted text-danger">*</span></label>

                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="firstimageUpload" onchange="loadbasicFile('firstimageUpload','first-img',event)" name="first_image" required>
                                                        <label for="firstimageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="first-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="first_image" class="w-100 current-img">
                                            </div>
                                        <span class="ctm-text-sm" id="first-image-label">*use image of 620 x 200px </span>

                                        </div>

                                    </div>
                                  
                                </div>
                                <div class="col-sm-6  double-url">
                                    <div class="row ">
                                        <div class="col-7">
                                             <label>Second Image  <span class="text-muted text-danger">*</span></label>

                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="secondimageUpload" onchange="loadbasicFile('secondimageUpload','second-img',event)" name="second_image" required>
                                                        <label for="secondimageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="second-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                            </div>
                                        <span class="ctm-text-sm">*use image of 620 x 200px </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" {{(@$checkfirst !=null && @$checksecond !=null && @$checkthird !=null && @$checkfour !=null ) ? "disabled" : "";}}  >Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
             
                
            </div>



            {!! Form::close() !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="company-doc">
                        <div class="card ctm-border-radius shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block mb-0">
                                    Ads List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="ad-index-table" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>First Image</th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allads as  $ad)
                                                    <tr>
                                                        <td class="align-middle pt-6 pb-4 px-6">
                                                            <div class="avatar-upload">
                                                                <div class="blog-preview">
                                                                    <img id="blog-img" src="{{asset('/images/uploads/ad/'.@$ad->first_image)}}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ucfirst($ad->position)}}</td>
                                                        <td>{{ucfirst($ad->type)}}</td>
              
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item " href="{{route('ad.edit',$ad->id)}}"  > Edit </a>
                                                                    <a class="dropdown-item action-ad-delete" href="#" hrm-delete-per-action="{{route('ad.destroy',$ad->id)}}"> Delete </a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
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

    <form action="#" method="post" id="deleted-form" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
    </form>



@endsection

@section('js')
    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('.ad-container').hide();

            $('#ad-index-table').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

        });

  

    //ad

    $(document).on('change','#ad_type', function (e) {
        e.preventDefault();
        var type=$(this).val();
        $('.ad-container').show();

        if( $(this).val() == 'single'){
            $('.double-url').hide();
            $('#second_url').removeAttr('required','required');
            $('#second_url').attr('value','');
            $('#secondimageUpload').attr('value','');
            $('#secondimageUpload').removeAttr('required','required');
            $("#first-image-label").text("*use image of 1140 x 200px");
            
        }else{
            $('.double-url').show();
            $('#discount_price').attr('required','required');
            $('#secondimageUpload').attr('required','required');
            $("#first-image-label").text("*use image of 620 x 200px");

        }

    });

   
    $(document).on('click','.action-ad-delete', function (e) {
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


                    swal("Deleted!", "Ads Deleted Successfully", "success");
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

   
    </script>
@endsection
