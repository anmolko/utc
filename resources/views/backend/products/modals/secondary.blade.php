<div class="modal fade" id="add_secondary_details">
    <form action="#" method="post" id="deleted-form" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
    </form>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-4">
            {!! Form::open(['route' => 'secondarycat.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title mb-3">Quick Add Secondary Category</h4>

                <div class="form-group mb-3">
                    <select class="form-control" name="primary_category_id" id="primary_category_id_edit" required>
                        <option value selected disabled>Select Primary Category</option>
                        @if(!empty(@$primary))
                            @foreach(@$primary as $primaryList)
                                <option value="{{ @$primaryList->id }}">{{ ucwords(@$primaryList->name) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Category Name <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="secondary-name-edit" onclick="slugMaker('secondary-name-edit','secondary-slug-edit')" required>
                    <div class="invalid-feedback">
                        Please enter the secondary category name.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Slug <span class="text-muted text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="secondary-slug-edit" required>
                    <div class="invalid-feedback">
                        Please enter the secondary category Slug.
                    </div>
                </div>
                <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
