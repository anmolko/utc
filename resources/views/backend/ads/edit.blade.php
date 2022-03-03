@extends('backend.layouts.master')
@section('title') Edit Ads @endsection
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
            {!! Form::open(['route' => ['ad.update', $edit->id],'method'=>'PUT','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
           
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <div class="card ctm-border-radius shadow-sm flex-fill">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                               Edit Ad Details
                            </h4>
                            <a href="{{route('ad.index')}}" class="float-right add-doc text-primary">Go Back</a>
                            
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label>Ads Type <span class="text-muted text-danger">*</span></label>
                                        <select class="form-control" name="type" id="ad_type" required>
                                            <option value disabled selected>Select Ads Type</option>
                                            <option value="single"  {{(@$edit->type =='single') ? "selected" : "";}} >Single</option>
                                            <option value="double" {{(@$edit->type == 'double') ? "selected" : "";}}  >Double</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a ads type.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group mb-3">
                                        <label>Display Position <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ucwords(@$edit->position)}}" name="position"  readonly>

                                    
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
                                        <input type="url" class="form-control" name="first_url" value="{{@$edit->first_url}}" required>
                                        <div class="invalid-feedback">
                                            Please enter the first url.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 double-url" >
                                    <div class="form-group mb-3">
                                        <label> Url for Second Image <span class="text-muted text-danger">*</span></label>
                                        <input type="url" class="form-control" name="second_url"  id="second_url" value="{{@$edit->second_url}}" required>
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
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="firstimageUpload" onchange="loadbasicFile('firstimageUpload','first-img',event)" name="first_image" {{(@$edit->first_image == null) ? "required" : "";}}>
                                                        <label for="firstimageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="first-img" src="{{(@$edit->first_image) ? asset('/images/uploads/offer/'.@$edit->first_image) : asset('/images/uploads/default-placeholder.png');}}" alt="first_image" class="w-100 current-img">
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
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="secondimageUpload" onchange="loadbasicFile('secondimageUpload','second-img',event)" name="second_image" {{(@$edit->second_image == null) ? "required" : "";}} >
                                                        <label for="secondimageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="second-img" src="{{(@$edit->second_image) ? asset('/images/uploads/offer/'.@$edit->second_image) : asset('/images/uploads/default-placeholder.png');}}" alt="second_image" class="w-100 current-img">
                                            </div>
                                        <span class="ctm-text-sm">*use image of 620 x 200px </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Update</button>
                            </div>
                        </div>

                    </div>
                </div>
             
                
            </div>



            {!! Form::close() !!}

           
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
            var type=$('#ad_type').val();
            $('.ad-container').show();

            if( $('#ad_type').val() == 'single'){
                $('.double-url').hide();
                $('#second_url').removeAttr('required','required');
                $('#second_url').val('');
                $('#secondimageUpload').val('');
                $('#secondimageUpload').removeAttr('required','required');
                $("#first-image-label").text("*use image of 1140 x 200px");
                
            }else{
                $('.double-url').show();
                $('#second_url').attr('required','required');

                var secondurl = '{{@$edit->second_url}}'
                if(secondurl){
                    $('#second_url').removeAttr('required','required');
                }else{
                    $('#second_url').attr('required','required');

                }

                var secondimg = '{{@$edit->second_image}}'
                if(secondimg){
                    $('#secondimageUpload').removeAttr('required','required');
                }else{
                    $('#secondimageUpload').attr('required','required');

                }
                $("#first-image-label").text("*use image of 620 x 200px");

            }

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
          
            var secondurl = '{{@$edit->second_url}}'
            console.log(secondurl);

                if(secondurl){
                    $('#second_url').removeAttr('required','required');

                }else{
                    $('#second_url').attr('required','required');

                }

                var secondimg = '{{@$edit->second_image}}'
                console.log(secondimg);
                if(secondimg){
                    $('#secondimageUpload').removeAttr('required','required');


                }else{
                    $('#secondimageUpload').attr('required','required');

                }
                $("#first-image-label").text("*use image of 620 x 200px");

        }

    });


   
    </script>
@endsection
