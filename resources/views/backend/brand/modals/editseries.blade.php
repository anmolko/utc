<div class="modal fade" id="edit_series">
    <form action="#" method="post" id="deleted-form" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
    </form>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateseries','novalidate'=>'']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Edit Series</h4>

                <div class="form-group mb-3">
                    <select class="form-control" name="brand_id" id="brand_id_edit" required>
                        <option value disabled>Select brand</option>
                        @if(!empty(@$brands))
                            @foreach(@$brands as $brand)
                                <option value="{{ @$brand->id }}" >{{ ucwords(@$brand->name) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Series Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="series-name-edit" onclick="slugMaker('series-name-edit','series-slug-edit')" required>
                    <div class="invalid-feedback">
                        Please enter the series name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="series-slug-edit" required>
                    <div class="invalid-feedback">
                        Please enter the series Slug.
                    </div>
                </div>
                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Update</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
