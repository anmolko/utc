<div class="modal fade" id="add_brand_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['route' => 'brands.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Quick Add Brand</h4>
                <div class="form-group mb-3">
                    <label>Brand Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="add-brand-name" onclick="slugMaker('add-brand-name','add-brand-slug')" required>
                    <div class="invalid-feedback">
                        Please enter the brand name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="add-brand-slug" required>
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
                                        <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="brandaddUpload" onchange="loadbasicFile('brandaddUpload','brand-add-img',event)" name="image" required/>
                                        <label for="brandaddUpload"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a logo.
                                        </div>
                                    </div>
                                </div>
                                <img id="brand-add-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="brand_image" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 170 x 130px for Brand</span>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <span class="ctm-text-sm text-danger">* Add Series for newly created Brand to use with product</span>
                </div>

                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
