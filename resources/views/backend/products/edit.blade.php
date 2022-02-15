@extends('backend.layouts.master')
@section('title') Edit Products @endsection
@section('css')
<style>
        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        .add-disabled{pointer-events: none; opacity: 0.7;}

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        /*end for image*/


        /*for custom select*/

        .select-label {
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: block;
        }
        .select-label span {
            position: relative;
            border: 1px solid #d4d4d4;
            border-radius: 10px;
            transition: 0.4s;
            padding: 0 15px;
            height: 46px;
            color: #414141;
            justify-content: center;
            display: flex;
            align-items: center;
            -moz-column-gap: 7px;
            column-gap: 7px;
        }
        .select-label span .icon {
            font-size: 1.1em;
        }
        .select-label input {
            pointer-events: none;
            display: none;
        }
        .select-label input:checked + span {
            border-color: #41237c;
            color: #41237c;
        }

        .custom-card{
            border: 1px solid #ededed;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
            padding: 1.25rem;
        }

        .custom-card:hover{
            box-shadow: 1px 0px 20px rgb(0 0 0 / 6%) !important;
        }
        /*end of custom select*/


    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <h4 class="card-title d-inline-block mb-0">
                    Product Update Form
                </h4>
                <a href="{{route('products.index')}}" class="float-right add-doc text-primary">Go Back
                </a>

            </div>
        </div>
        {!! Form::open(['id'=>'productedit-form','method'=>'PUT','url'=>route('products.update', $product->id),'class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                General Details
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Product Name <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
                                <div class="invalid-feedback">
                                    Please enter the product name.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Product Code <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="slug" id="slug" value="{{$product->slug}}" required>
                                <div class="invalid-feedback">
                                    Please enter the product code.
                                </div>
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('slug')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Product Price <span class="text-muted text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" id="price"  value="{{$product->price}}" required>
                                <div class="invalid-feedback">
                                    Please enter the product price.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Primary Category <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none product-primary-cat" name="primary_category_id" required>
                                    <option value disabled> Select Primary Category</option>
                                    @foreach($primary as $pri)
                                        @if(count($pri->secondary)>0)
                                            <option value="{{$pri->id}}" {{($product->primary_category_id == $pri->id) ? "selected" : ""}}> {{$pri->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select the product primary category.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Secondary Category <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none product-secondary-cat" name="secondary_category_id" required>
                                    <option value disabled selected> Select Secondary Category</option>
                                        @foreach($secondary as $sec)
                                            <option value="{{$sec->id}}" {{($product->secondary_category_id == $sec->id) ? "selected" : ""}}> {{$sec->name}} </option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select the product primary category.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Brands <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none product-brands" name="brand_id" required>
                                    <option value disabled> Select Primary Category</option>
                                    @foreach($brands as $brand)
                                        @if(count($brand->series)>0)
                                            <option value="{{$brand->id}}" {{($product->brand_id == $brand->id) ? "selected" : ""}}> {{$brand->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select the product brand.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Brand Series <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none product-brand-series" name="brand_series_id" required>
                                    <option value disabled selected> Select Brand Series</option>
                                    @foreach($brand_series as $series)
                                        <option value="{{$series->id}}" {{($product->brand_series_id == $series->id) ? "selected" : ""}}> {{$series->name}} </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select the brand series.
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Attribute and Values <span class="text-muted text-danger">*</span>
                            </h4>

                        </div>
                        <div class="card-body">

                            <div id="multi-field-wrapper">
                                <div id="multi-fields">

                                    @foreach($relatedAttr as $key=>$attrvalues)
                                        <div class="multi-field custom-card">
                                            <div class="input-group mb-3">
                                                <select class="form-control shadow-none product-attribute" name="product_attribute_id[]" id="product_attribute_id_0" required>
                                                    <option value disabled readonly selected> Select Attributes</option>
                                                    @foreach($attributes as $attr)
                                                        <option value="{{$attr->id}}" {{($attrvalues->id == $attr->id) ? "selected":""}}> {{$attr->name}} </option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-theme text-white remove-field"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="row mb-3 attribute-values" id="addValues">
                                                @foreach($attrvalues->values as $k=>$val)
                                                        <div class="col-md-3 col-6 text-center">
                                                            <label class="select-label">
                                                                <input type="checkbox" value="{{$val->id}}" name="attribute_value_id_{{$attrvalues->id}}[]" id="attribute_value_id[]">
                                                                <span> {{$val->name}} </span>
                                                            </label>
                                                        </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach



                                </div>

                                <a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" id="add-field"><i class="fa fa-copy"></i> Add Attribute </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Product Specification Mapping <span class="text-muted text-danger">*</span>
                            </h4>
                            <div class="float-right action-label dropdown btn-group dropleft">
                                <a href="javascript:void(0)" class="btn btn-theme text-white btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item action-value-edit small"> Add Specification  </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div id="multi-field-wrapper-specific">
                                <div id="multi-fields-specific">

                                    @foreach($pivotSpecification as $key=>$values)
                                        <div class="multi-field-specific custom-card">
                                            <div class="input-group mb-3">
                                                <select class="form-control shadow-none product-specification" name="specification_id[]" id="specification_id_0" required>
                                                    <option value disabled readonly selected> Select Attributes</option>
                                                    @foreach($allspecifications as $spec)
                                                        <option value="{{$spec->id}}" {{($key == $spec->id) ? "selected":""}}> {{$spec->name}} </option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-theme text-white remove-field-specific"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="specific-values" id="addValuesspecific">
                                                <div class="form-group mb-3">
                                                    <label><strong>Specification Details for {{\App\Models\Specification::find($key)->name}}</strong></label>
                                                    <textarea class="form-control" rows="4" name="specification_details_{{$key}}" id="specification_details_{{$key}}">{{ $values }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach



                                </div>

                                <a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" id="add-field-specific"><i class="fa fa-copy"></i> Add Specification </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Image Details
                            </h4>

                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Thumbnail </label>
                                <div class="row justify-content-center">
                                    <div class="col-4 mb-4">
                                        <div class="custom-file h-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="thumbnail" onchange="loadbasicFile('thumbnail','current-thumbnail-img',event)" name="thumbnail" {{($product->thumbnail !== null) ? "":"required"}} />
                                                    <label for="thumbnail"></label>
                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                        Please select a Product thumbnail image.
                                                    </div>
                                                </div>
                                            </div>
                                            @if($product->thumbnail !== null)
                                                <img id="current-thumbnail-img" src="{{asset('/images/uploads/products/'.$product->thumbnail)}}" alt="thumbnail_image" class="w-100 current-img">
                                            @else
                                                <img id="current-thumbnail-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="primary_image" class="w-100 current-img">
                                            @endif
                                        </div>
                                        <span class="ctm-text-sm">*use image minimum of 265 x 210px for product thumbnail</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Description Details
                            </h4>

                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Summary <span class="text-muted text-danger">*</span></label>
                                <textarea maxlength="470" class="form-control" rows="4" name="summary" required>{{$product->summary}}</textarea>
                                <div class="invalid-feedback">
                                    Please enter the product summary.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-4">
            <input type="hidden" name="status" id="status" value="{{$product->status}}"/>
            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" id="status1" value="active">Active</button>
            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status" id="status2" value="deactive">De-Active</button>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        var database_values = [];
        var attribute_values = [];
        var database_attribute = [];
        var database_specification = [];
        var all_attribute_id = [];
        var all_specific_id = [];
        <?php foreach($attributes as $key => $val){ ?>
        all_attribute_id.push('<?php echo $val->id; ?>');
        <?php } ?>
        <?php foreach($allspecifications as $key => $val){ ?>
        all_specific_id.push('<?php echo $val->id; ?>');
        <?php } ?>
        <?php foreach($selectedValues as $key => $val){ ?>
        database_values.push('<?php echo $val; ?>');
        <?php } ?>
        <?php foreach($relatedAttr as $key => $val){ ?>
        database_attribute.push('<?php echo $val->id; ?>');
        <?php } ?>
        <?php foreach($pivotSpecification as $key => $val){ ?>
        database_specification.push('<?php echo $key; ?>');
        <?php } ?>

        $("#slug").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#slug").val(Text);
        });

        function createEditor ( elementId ) {
            return ClassicEditor
                .create( document.querySelector( '#' + elementId ), {
                    toolbar : {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                    },
                } )
                .then( editor => {
                    window.editor = editor;
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + elementId).text(editor.getData());
                    } );
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        }

        $(document).ready(function () {
            //for attributes - to disable add attribute button
            if(database_attribute.sort().compare(all_attribute_id.sort())) {
                //if all matches, disable button
                $('#add-field').addClass('add-disabled');
            } else {
                //if all doesn't match, enable button
                $('#add-field').removeClass('add-disabled');
            }

            //for specifications - to disable add specification buttob
            if(database_specification.sort().compare(all_specific_id.sort())) {
                //if all matches, disable button
                $('#add-field-specific').addClass('add-disabled');
            } else {
                //if all doesn't match, enable button
                $('#add-field-specific').removeClass('add-disabled');
            }

            //disable already selected attribute values from all available select fields
            $('select.product-attribute').each(function() {
                var val = this.value;
                $('select.product-attribute').not(this).find('option').filter(function() {
                    return this.value === val;
                }).prop('disabled', true);
            });

            //disable already selected specification values from all available select fields
            $('select.product-specification').each(function() {
                var val = this.value;
                $('select.product-specification').not(this).find('option').filter(function() {
                    return this.value === val;
                }).prop('disabled', true);
            });

            //get all the values from listed select-box and compare and tick with database values
            $("input[id='attribute_value_id[]']").each(function(index, value) {
                if($.inArray(value.value, database_values) !== -1){
                    $(this).prop('checked', true);
                }
            });
        });

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var counter = 0;
        $('#multi-field-wrapper').each(function() {
            var $wrapper = $('#multi-fields', this);

            $("#add-field", $(this)).click(function(e) {
                counter++;
                //clone the element and add the id to div to make select field unique and empty the attribute value div to bring in fresh data.
                var newElem = $('.multi-field:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-' + counter).find('div.attribute-values').html('').find('option[value=""]').attr("selected", "selected");
                //remove the initial id from select and add new ID

                $('.multi-field').find('select').last().removeAttr('id').attr('id', 'product_attribute_id_' + counter).find('option').focus();
                //remove all the selected options from newly cloned select
                $('.multi-field').find('select').last().val('');
                //loop over the select with class product attribute and collect all selected ID. Disable the selected ID from newly cloned select
                $('select.product-attribute').each(function() {
                    var id = this.value;
                    $('.multi-field').find('select').last().find('option').filter(function() {
                        return this.value === id;
                    }).prop('disabled', true);
                });


            });

            $('.multi-field .remove-field', $wrapper).click(function() {
                if ($('.multi-field', $wrapper).length > 1){
                    var id = $(this).prev().find('option:selected').val();
                    //get the value of closest selected option from the delete button.

                    //========= FOR DISABLING THE BUTTON=============
                    //remove the recently deleted id from the array of unique ID
                    database_attribute = jQuery.grep(database_attribute, function(value) {
                        return value !== id;
                    });
                    //again compare the data and disable/enable accordingly
                    if(database_attribute.sort().compare(all_attribute_id.sort())) {
                        //if all matches, disable button
                        $('#add-field').addClass('add-disabled');
                    } else {
                        //if all doesn't match, enable button
                        $('#add-field').removeClass('add-disabled');
                    }

                    //========= FOR DISABLING THE BUTTON=============


                    $('select.product-attribute').each(function() {
                        var val = id;
                        $('select.product-attribute').find('option').filter(function() {
                            return this.value === val;
                        }).prop('disabled', false);
                    }); //use the value to remove the disable option from all others select field

                    //remove the cloned div after clicking on delete button.
                    $(this).parent('.input-group').parent('.multi-field').remove();
                }
            });

            //getting the attributeValues based on the attribute changes from multiple select fields
            $('select.product-attribute').on('change', function(element) {
                var id       = this.value;
                var name     = this.name;
                var selectid = this.id;
                var counterNum = selectid.replace('product_attribute_id_', '');

                //========= FOR DISABLING THE BUTTON=============
                //empty the arrary first
                database_attribute.length =0;
                //upon selected, add the value in array
                $("select.product-attribute option:selected").each(function () {
                    database_attribute.push(this.value);
                });
                //compare the unique values with array that contains all values of attributes
                //using custom function with jquery prototype compare
                if(database_attribute.sort().compare(all_attribute_id.sort())) {
                    //if all matches, disable button
                    $('#add-field').addClass('add-disabled');
                } else {
                    //if all doesn't matche, enable button
                    $('#add-field').removeClass('add-disabled');
                }

                //========= END OF DISABLING THE BUTTON=============

                //remove all the disable option except for the first one
                $('option[value!=""]').prop('disabled', false);
                //loop around product attribute select field and disable the recently selected option from other select.
                $('select.product-attribute').each(function() {
                    var val = this.value;
                    $('select.product-attribute').not(this).find('option').filter(function() {
                        return this.value === val;
                    }).prop('disabled', true);
                });

                //determining the parent div of the selected field inorder to target right div to attach the values to
                var wrapper = $(this).parent('.input-group').parent('.multi-field').find('.attribute-values');
                var url = "{{route('products-attribute.fetch')}}";
                //setting URL and fetching data with ajax request
                $.ajax({
                    url: url,
                    type: "Get",
                    data:{id:id},
                    success: function(response){
                        wrapper.empty();
                        //emptying the wrapper inorder to avoid duplication and attaching values accordingly.
                        jQuery.each(response, function(index, item) {
                            var attachment = ' <div class="col-md-3 col-6 text-center">' +
                                '<label class="select-label"> ' +
                                '<input type="checkbox" value="'+index+'" name="attribute_value_id_'+id+'[]" id="attribute_value_id_'+id+'[]"> ' +
                                '<span>'+item+'</span> ' +
                                '</label>' +
                                '</div>';
                            wrapper.append(attachment);
                        });

                    }
                });

            });
        });

        var counterspec = 0;
        $('#multi-field-wrapper-specific').each(function() {
            var $wrapper = $('#multi-fields-specific', this);

            $("#add-field-specific", $(this)).click(function(e) {
                counterspec++;
                //clone the element and add the id to div to make select field unique and empty the specification value div to bring in fresh data.
                var newElem = $('.multi-field-specific:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-specific-' + counterspec).find('div.specific-values').html('').find('option[value=""]').attr("selected", "selected");

                //remove the initial id from select and add new ID
                $('.multi-field-specific').find('select').last().removeAttr('id').attr('id', 'specification_id_' + counterspec).find('option').focus();
                //remove all the selected options from newly cloned select
                $('.multi-field-specific').find('select').last().val('');
                //loop over the select with class product specification and collect all selected ID. Disable the selected ID from newly cloned select
                $('select.product-specification').each(function() {
                    var id = this.value;
                    $('.multi-field-specific').find('select').last().find('option').filter(function() {
                        return this.value === id;
                    }).prop('disabled', true);
                });
            });

            $('.multi-field-specific .remove-field-specific', $wrapper).click(function() {
                if ($('.multi-field-specific', $wrapper).length > 1){
                    var id = $(this).prev().find('option:selected').val();
                    //get the value of closest selected option from the delete button.

                    //========= FOR DISABLING THE BUTTON=============
                    //remove the recently deleted id from the array of unique ID
                    database_specification = jQuery.grep(database_specification, function(value) {
                        return value !== id;
                    });
                    //again compare the data and disable/enable accordingly
                    if(database_specification.sort().compare(all_specific_id.sort())) {
                        //if all matches, disable button
                        $('#add-field-specific').addClass('add-disabled');
                    } else {
                        //if all doesn't match, enable button
                        $('#add-field-specific').removeClass('add-disabled');
                    }

                    //========= FOR DISABLING THE BUTTON=============


                    $('select.product-specification').each(function() {
                        var val = id;
                        $('select.product-specification').find('option').filter(function() {
                            return this.value === val;
                        }).prop('disabled', false);
                    }); //use the value to remove the disable option from all others select field

                    //remove the cloned div after clicking on delete button.
                    $(this).parent('.input-group').parent('.multi-field-specific').remove();
                }
            });

            //getting the attributeValues based on the attribute changes from multiple select fields
            $('select.product-specification').on('change', function(element) {
                var id       = this.value;
                var name     = this.name;
                var selectid = this.id;

                //========= FOR DISABLING THE BUTTON=============
                //empty the array first
                database_specification.length =0;
                //upon selected, add the value in array
                $("select.product-specification option:selected").each(function () {
                    database_specification.push(this.value);
                });
                //compare the unique values with array that contains all values of attributes
                //using custom function with jquery prototype compare
                if(database_specification.sort().compare(all_specific_id.sort())) {
                    //if all matches, disable button
                    $('#add-field-specific').addClass('add-disabled');
                } else {
                    //if all doesn't matche, enable button
                    $('#add-field-specific').removeClass('add-disabled');
                }

                //========= END OF DISABLING THE BUTTON=============

                //remove all the disable option except for the first one
                $('option[value!=""]').prop('disabled', false);
                //loop around product specification select field and disable the recently selected option from other select.
                $('select.product-specification').each(function() {
                    var val = this.value;
                    $('select.product-specification').not(this).find('option').filter(function() {
                        return this.value === val;
                    }).prop('disabled', true);
                });

                //determining the parent div of the selected field inorder to target right div to attach the values to
                var wrapper = $(this).parent('.input-group').parent('.multi-field-specific').find('.specific-values');
                //setting URL and fetching data with ajax request

                wrapper.empty();
                //emptying the wrapper inorder to avoid duplication and attaching text-field accordingly.
                var attachment = ' <div class="form-group mb-3">' + '<label>Specification Details For ' + $(this).find("option:selected").text() + '</label> ' +
                    '<textarea class="form-control" rows="4" name="specification_details_'+id+'" id="specification_details_'+id+'" required></textarea> ' +
                    '</div>';
               wrapper.append(attachment);
            });
        });

        //getting secondary category value based on primary category values selection
        $('.product-primary-cat').on('change', function(element) {
            var id = this.value;
            var name = this.name;
            var url = "{{route('products-secondary.fetch')}}";
            $.ajax({
                url: url,
                type: "Get",
                data:{id:id},
                success: function(response){
                    $('.product-secondary-cat').empty();
                    jQuery.each(response, function(index, item) {
                        $('.product-secondary-cat').append($('<option>', {
                            value: index,
                            text : item
                        }));
                    });

                }
            });
        });

        //getting series related tp brands selection
        $('.product-brands').on('change', function(element) {
            var id = this.value;
            var name = this.name;
            var url = "{{route('product-brand-series.fetch')}}";
            $.ajax({
                url: url,
                type: "Get",
                data:{id:id},
                success: function(response){
                    $('.product-brand-series').empty();
                    jQuery.each(response, function(index, item) {
                        $('.product-brand-series').append($('<option>', {
                            value: index,
                            text : item
                        }));
                    });

                }
            });
        });

        Array.prototype.compare = function(testArr) {
            if (this.length !== testArr.length) return false;
            for (var i = 0; i < testArr.length; i++) {
                if (this[i].compare) { //To test values in nested arrays
                    if (!this[i].compare(testArr[i])) return false;
                }
                else if (this[i] !== testArr[i]) return false;
            }
            return true;
        }

        $('#status1, #status2').click(function(event){
            event.preventDefault();
            var form = $('#productedit-form')[0];
            if (!form.reportValidity()) {return false;}
            var status         = $(this).val();
            $('#status').val(status);
            var clear = "";

            $("select[name='product_attribute_id[]']").each(function() {
                var attr_id = this.value;
                var id = this.id;
                var attr_name = $('#'+id).find('option:selected').text();
                if(!$("input[name='attribute_value_id_"+attr_id+"[]']").is(':checked'))
                {
                    clear = "not";
                    swal({
                        title: "Warning!",
                        text: 'Value(s) not selected for Dropdown Attribute: ' + attr_name +' \n \n Please select required value first.',
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function(){
                        //window.location.href = ""
                        swal.close();
                    });

                    return false;
                }else{
                    clear = "all_clear";
                }
            });

            if (clear === 'all_clear'){

                var post_url       = $('#productedit-form').attr("action"); //get form action url
                var request_method = $('#productedit-form').attr("method"); //get form GET/POST method
                var form_data      = new FormData(form); //Creates new FormData object
                $.ajax({
                    url : post_url,
                    type: request_method,
                    data : form_data,
                    contentType: false,
                    cache: false,
                    processData:false
                }).done(function(response){
                    if (response === 'duplicate'){
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.warning("The slug is already in use. Please write new one");
                    }else{
                        window.location.replace(response);
                        //when the response is received, it will redirect to the dynamic route sent from controller
                    }
                });
            }



        });


    </script>
@endsection



