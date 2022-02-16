<div class="modal fade" id="edit_attribute">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateattribute','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Edit Product Attribute</h4>
                <div class="form-group mb-3">
                    <label>Attribute Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="update-name" onclick="slugMaker('update-name','update-slug')" required>
                    <div class="invalid-feedback">
                        Please enter the attribute name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="update-slug" required>
                    <div class="invalid-feedback">
                        Please enter the attribute Slug.
                    </div>
                </div>

                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
