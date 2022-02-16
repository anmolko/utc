<div class="modal fade" id="add_specification_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['route' => 'specification.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Quick Add Specification </h4>
                <div class="form-group mb-3">
                    <label>Specification Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="add-specification-name" onclick="slugMaker('add-specification-name','add-specification-slug')" required>
                    <div class="invalid-feedback">
                        Please enter the specification name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="add-specification-slug" required>
                    <div class="invalid-feedback">
                        Please enter the specification Slug.
                    </div>
                </div>

                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
