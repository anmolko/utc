<div class="modal fade" id="edit_brands">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatebrands','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Edit Brand</h4>
                <div class="form-group mb-3">
                    <label>Brand Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="update-brand-name" onclick="slugMaker('update-brand-name','update-brand-slug')" required>
                    <div class="invalid-feedback">
                        Please enter the brand name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="update-brand-slug" required>
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
                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="brandeditUpload" onchange="loadbasicFile('brandeditUpload','brand-edit-img',event)" name="image" />
                                        <label for="brandeditUpload"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a logo.
                                        </div>
                                    </div>
                                </div>
                                <img id="brand-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="brand_image" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 170 x 130px for Brand</span>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
