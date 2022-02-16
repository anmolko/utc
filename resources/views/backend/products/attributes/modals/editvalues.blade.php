<div class="modal fade" id="edit_values">
    <form action="#" method="post" id="deleted-form" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
    </form>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatevalues','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Edit Attribute's Value</h4>

                <div class="form-group mb-3">
                    <select class="form-control" name="product_attribute_id" id="product_attribute_id_edit" required>
                        <option value disabled>Select Attribute</option>
                        @if(!empty(@$attributes))
                            @foreach(@$attributes as $attribute)
                                <option value="{{ @$attribute->id }}" >{{ ucwords(@$attribute->name) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Value Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="value-name-edit" onclick="slugMaker('value-name-edit','value-slug-edit')" required />
                    <div class="invalid-feedback">
                        Please enter the value name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="value-slug-edit" required>
                    <div class="invalid-feedback">
                        Please enter the value Slug.
                    </div>
                </div>
                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
