@extends('backend.layouts.master')
@section('title') Ads @endsection
@section('css')

    <style>

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
                                            <option value="first" >First</option>
                                            <option value="second" >Second</option>
                                            <option value="third" >Third</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a position.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 d-flex">
                                    <div class="row ">
                                        <div class="col-7">
                                            <label>Image One <span class="text-muted text-danger">*</span></label>

                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','first-img',event)" name="first_image" required>
                                                        <label for="imageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="first-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="first_image" class="w-100 first-img">
                                            </div>
                                        <span class="ctm-text-sm">*use image of 620 x 200px </span>

                                        </div>

                                    </div>
                                  
                                </div>
                                <div class="col-sm-6 d-flex">
                                    <div class="row ">
                                        <div class="col-7">
                                             <label>Image Two <span class="text-muted text-danger">*</span></label>

                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','second-img',event)" name="second_image" required>
                                                        <label for="imageUpload"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="second-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 second-img">
                                            </div>
                                        <span class="ctm-text-sm">*use image of 620 x 200px </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label>First Url Image <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="8" name="description" id="editor" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the post description.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label>First Url Image <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="8" name="description" id="editor" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the post description.
                                        </div>
                                    </div>
                                </div>
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
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(@$ads)
                                                @foreach($ads as  $ad)
                                                    <tr>
                                                      
                                                        <td>{{ucfirst($ad->title)}}</td>
                                                        <td>{{ucfirst($ad->slug)}}</td>
              
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-ad-edit" href="#" hrm-update-action="{{route('ad.update',$ad->id)}}" hrm-edit-action="{{route('ad.edit',$ad->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-ad-delete" href="#" hrm-delete-per-action="{{route('ad.destroy',$ad->id)}}"> Delete </a>
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

    <div class="modal fade" id="edit_blog_category">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pb-4">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateblogcategory','novalidate'=>'']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Blog Category</h4>
                    <div class="form-group mb-3">
                        <label>Category Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="update-name" required>
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

    <div class="modal fade bd-example-modal-lg" id="edit_blog">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateblog','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Blog Category</h4>

                    <div class="form-group mb-3">
                        <label>Category <span class="text-muted text-danger">*</span></label>
                        <select class="form-control" name="blog_category_id" id="edit-blog-cat" required>
                            <option value disabled>Select Blog Category</option>
                            @if(!empty(@$categories))
                                @foreach(@$categories as $categoryList)
                                    <option value="{{ @$categoryList->id }}" >{{ ucwords(@$categoryList->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            Please select a category.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Title <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="edit-title" required>
                        <div class="invalid-feedback">
                            Please enter the post title.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slug <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" id="blog-edit-slug" required>
                        <input type="hidden"  name="status" id="edit-status" required>
                        <div class="invalid-feedback">
                            Please enter the post Slug.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Summary <span class="text-muted text-danger">*</span></label>
                        <textarea class="form-control" rows="6" name="excerpt" id="edit-excerpt" required></textarea>
                        <div class="invalid-feedback">
                            Please enter the post summary.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description <span class="text-muted text-danger">*</span></label>
                        <textarea class="form-control update-descp" rows="6" name="description" id="edit-editor" required></textarea>
                        <div class="invalid-feedback">
                            Please enter the post description.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Blog Feature Image <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-9 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="images-edit" onchange="loadbasicFile('images-edit','current-edit-img',event)" name="image">
                                                        <label for="images-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 850 x 345px for blog</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Blog Thumbnail Image <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-8 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="images-thumb-edit" onchange="loadbasicFile('images-thumb-edit','current-editthumb-img',event)" name="thumb_image">
                                                        <label for="images-thumb-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-editthumb-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 258 x 230px for blog</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1 mb-4">Update</button>
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
        console.log(type)


    });

    $(document).on('click','.action-ad-edit', function (e) {
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
                $("#edit_blog").modal("toggle");
                $('#edit-title').attr('value',dataResult.title);
                $('#blog-edit-slug').attr('value',dataResult.slug);
                $('#edit-excerpt').text(dataResult.excerpt);
                $('#edit-status').attr('value',dataResult.status);
                editor.setData( dataResult.description );
                $('#current-edit-img').attr("src",'/images/uploads/blog/'+dataResult.image );
                $('#current-editthumb-img').attr("src",'/images/uploads/blog/thumb/'+dataResult.thumb_image );
                $('#edit-blog-cat option[value="'+dataResult.blog_category_id+'"]').prop('selected', true);
                $('.updateblog').attr('action',action);

            },
            error: function(error){
                console.log(error)
            }
        });
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


                    swal("Deleted!", "Blog Deleted Successfully", "success");
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
