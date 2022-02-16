@extends('backend.layouts.master')
@section('title') Create Products @endsection
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
                        Product Create Form
                    </h4>

                <a href="{{route('products.index')}}" class="float-right add-doc text-primary">Go Back
                </a>
            </div>
        </div>
        {!! Form::open(['id'=>'productcreate-form','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                General Details
                            </h4>
                            <div class="float-right action-label dropdown btn-group dropleft">
                                <a href="javascript:void(0)" class="btn btn-theme text-white btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item action-primary-add small" data-toggle="modal" data-target="#add_primary_details"> Add Primary Category </a>
                                   <a class="dropdown-item action-secondary-add small" data-toggle="modal" data-target="#add_secondary_details"> Add Secondary Category </a>
                                   <a class="dropdown-item action-brand-add small" data-toggle="modal" data-target="#add_brand_details"> Add Brand</a>
                                   <a class="dropdown-item action-series-add small" data-toggle="modal" data-target="#add_series_details"> Add Brand Series </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Product Name <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Please enter the product name.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Product Code <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="slug" id="slug" required>
                                <div class="invalid-feedback">
                                    Please enter the product code.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Product Price <span class="text-muted text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" required>
                                <div class="invalid-feedback">
                                    Please enter the product price.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Primary Category <span class="text-muted text-danger">*</span></label>
                                <select class="form-control  shadow-none product-primary-cat" name="primary_category_id" required>
                                    <option value disabled selected> Select Primary Category</option>

                                        @foreach($primary as $primaryList)
                                        @if(count($primaryList->secondary)>0)
                                            <option value="{{$primaryList->id}}"> {{$primaryList->name}} </option>
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
{{--                                    @foreach($primary as $pri)--}}
{{--                                        <option value="{{$pri->id}}"> {{$pri->name}} </option>--}}
{{--                                    @endforeach--}}
                                </select>
                                <div class="invalid-feedback">
                                    Please select the product primary category.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Brands <span class="text-muted text-danger">*</span></label>
                                <select class="form-control  shadow-none product-brands" name="brand_id" required>
                                    <option value disabled selected> Select Brand</option>

                                    @foreach($brands as $brand)
                                        @if(count($brand->series)>0)
                                            <option value="{{$brand->id}}"> {{$brand->name}} </option>
                                        @endif
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Please select the brand.
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Brand Series <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none product-brand-series" name="brand_series_id" required>
                                    <option value disabled selected> Select Brand Series</option>
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
                            <div class="float-right action-label dropdown btn-group dropleft">
                                <a href="javascript:void(0)" class="btn btn-theme text-white btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item action-attribute-edit small" data-toggle="modal" data-target="#add_attribute_details"> Add Attribute  </a>
                                    <a class="dropdown-item action-value-edit small" data-toggle="modal" data-target="#add_value_details"> Add Attribute's Value </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div id="multi-field-wrapper">
                                <div id="multi-fields">
                                    <div class="multi-field custom-card">
                                        <div class="input-group mb-3">
                                            <select class="form-control shadow-none product-attribute" name="product_attribute_id[]" id="product_attribute_id_0" required>
                                                <option value disabled readonly selected> Select Attributes</option>
                                                @foreach($attributes as $attr)
                                                    <option value="{{$attr->id}}"> {{$attr->name}} </option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-theme text-white remove-field"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="row mb-3 attribute-values" id="addValues">
{{--                                                <div class="col-md-3 col-6 text-center">--}}
{{--                                                    <label class="select-label">--}}
{{--                                                        <input type="checkbox" value="1" name="attribute_value_id[]">--}}
{{--                                                        <span> Visa Approved </span>--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
                                        </div>
                                    </div>
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
                            <div class="float-right action-label btn-group">
                                <a class="btn btn-theme text-white btn-sm" data-toggle="modal" data-target="#add_specification_details">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div id="multi-field-wrapper-specific">
                                <div id="multi-fields-specific">
                                    <div class="multi-field-specific custom-card">
                                        <div class="input-group mb-3">
                                            <select class="form-control shadow-none product-specification" name="specification_id[]" id="specification_id_0" required>
                                                <option value disabled readonly selected> Select Specification</option>
                                                @foreach($specifications as $spec)
                                                    <option value="{{$spec->id}}"> {{$spec->name}} </option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-theme text-white remove-field-specific"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="specific-values" id="addValuesspecific">
                                            {{--                                            <div class="form-group mb-3">--}}
                                            {{--                                                <label>Specification Details </label>--}}
                                            {{--                                                <textarea class="form-control" rows="4" name="specification_details" id="specification_details"></textarea>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
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
                                Product Image Details
                            </h4>

                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Thumbnail <span class="text-muted text-danger">*</span></label>
                                <div class="row justify-content-center">
                                    <div class="col-4 mb-4">
                                        <div class="custom-file h-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="thumbnail" onchange="loadbasicFile('thumbnail','current-thumbnail-img',event)" name="thumbnail" required />
                                                    <label for="thumbnail"></label>
                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                        Please select a Product thumbnail image.
                                                    </div>
                                                </div>
                                            </div>
                                            <img id="current-thumbnail-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="primary_image" class="w-100 current-img">
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
                                <textarea maxlength="470" class="form-control" rows="4" name="summary" required></textarea>
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
            <input type="hidden" name="status" id="status"/>
            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status"  id="status1" value="active">Active</button>
            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="status"  id="status2" value="deactive">De-Active</button>
        </div>
        {!! Form::close() !!}
    </div>


    <!-- Add Primary Category Modal -->
    @include('backend.products.modals.primary')
    <!-- /Add Primary Category Modal -->

    <!-- Add Secondary Category Modal -->
    @include('backend.products.modals.secondary')
    <!-- /Add Secondary Category Modal -->

    <!-- Add Brand Modal -->
    @include('backend.products.modals.brand')
    <!-- /Add Brand Modal -->

    <!-- Add Brand Series Modal -->
    @include('backend.products.modals.series')
    <!-- /Add Brand Series Modal -->

    <!-- Add specification Modal -->
    @include('backend.products.modals.specification')
    <!-- /Add specification Modal -->
@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        var all_attribute_id = [];
        var all_specific_id = [];
        var selected_attribute_id = [];
        var selected_specification_id = [];
        <?php foreach($attributes as $key => $val){ ?>
        all_attribute_id.push('<?php echo $val->id; ?>');
        <?php } ?>
        <?php foreach($specifications as $key => $val){ ?>
        all_specific_id.push('<?php echo $val->id; ?>');
        <?php } ?>

        function slugMaker(title, slug){
            $("#"+ title).keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#"+slug).val(Text);
            });
        }

        $("#slug").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#slug").val(Text);
        });

        // function createEditor ( elementId ) {
        //     return ClassicEditor
        //         .create( document.querySelector( '#' + elementId ), {
        //             toolbar : {
        //                 items: [
        //                     'heading', '|',
        //                     'bold', 'italic', 'link', '|',
        //                     'outdent', 'indent', '|',
        //                     'bulletedList', 'numberedList', '|',
        //                     'insertTable', 'blockQuote', '|',
        //                     'undo', 'redo'
        //                 ],
        //             },
        //         } )
        //         .then( editor => {
        //             window.editor = editor;
        //             editor.model.document.on( 'change:data', () => {
        //                 $( '#' + elementId).text(editor.getData());
        //             } );
        //         } )
        //         .catch( err => {
        //             console.error( err.stack );
        //         } );
        // }

        // $(document).ready(function () {
        //
        //
        // });

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        //for attributes and values
        var counter = 0;
        $('#multi-field-wrapper').each(function() {
            var $wrapper = $('#multi-fields', this);

            $("#add-field", $(this)).click(function(e) {
                counter++;
                //clone the element and add the id to div to make select field unique and empty the attribute value div to bring in fresh data.
                var newElem = $('.multi-field:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-' + counter).find('div.attribute-values').html('');
                //remove the initial id from select and add new ID
                $('.multi-field').find('select').last().removeAttr('id').attr('id', 'product_attribute_id_' + counter).find('option').focus();

                //loop over the select with class product attribute and collect all selected ID
                //disable the selected ID from newly cloned select
                $('select.product-attribute').each(function() {
                    var id = this.value;
                    // console.log(id);
                    $('.multi-field').find('select').last().find('option').filter(function() {
                        return this.value === id;
                    }).prop('disabled', true);
                });
            });



            //getting the attributeValues based on the attribute changes from multiple select fields
            $('select.product-attribute').on('change', function(element) {
                var id       = this.value;
                var name     = this.name;
                var selectid = this.id;
                // var counterNum = selectid.replace('product_attribute_id_', '');

                //========= FOR DISABLING THE BUTTON=============
                //empty the arrary first
                selected_attribute_id.length =0;
                //upon selected, add the value in array
                $("select.product-attribute option:selected").each(function () {
                    selected_attribute_id.push(this.value);
                });
                //compare the unique values with array that contains all values of attributes
                //using custom function with jquery prototype compare
                if(selected_attribute_id.sort().compare(all_attribute_id.sort())) {
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
                        //empting the wrapper inorder to avoid duplication and attaching values accordingly.
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


            $('.multi-field .remove-field', $wrapper).click(function() {

                if ($('.multi-field', $wrapper).length > 1){
                    var id = $(this).prev().find('option:selected').val();

                    //========= FOR DISABLING THE BUTTON=============
                    //remove the recently deleted id from the array of unique ID
                    selected_attribute_id = jQuery.grep(selected_attribute_id, function(value) {
                        return value !== id;
                    });
                    //again compare the data and disable/enable accordingly
                    if(selected_attribute_id.sort().compare(all_attribute_id.sort())) {
                        //if all matches, disable button
                        $('#add-field').addClass('add-disabled');
                    } else {
                        //if all doesn't match, enable button
                        $('#add-field').removeClass('add-disabled');
                    }

                    //========= FOR DISABLING THE BUTTON=============

                    //get the value of closest selected option from the delete button.
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
        });

        //for specification and details
        var counterspec = 0;
        $('#multi-field-wrapper-specific').each(function() {
            var $wrapper = $('#multi-fields-specific', this);
            $("#add-field-specific", $(this)).click(function(e) {
                counterspec++;
                //clone the element and add the id to div to make select field unique and empty the attribute value div to bring in fresh data.
                var newElem = $('.multi-field-specific:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-specific-' + counterspec).find('div.specific-values').html('');
                //remove the initial id from select and add new ID
                $('.multi-field-specific').find('select').last().removeAttr('id').attr('id', 'specification_id_' + counterspec).find('option').focus();

                //loop over the select with class product attribute and collect all selected ID
                //disable the selected ID from newly cloned select
                $('select.product-specification').each(function() {
                    var id = this.value;
                    // console.log(id);
                    $('.multi-field-specific').find('select').last().find('option').filter(function() {
                        return this.value === id;
                    }).prop('disabled', true);
                });
            });

            $('select.product-specification').on('change', function(element) {
                var id       = this.value;
                var name     = this.name;
                var selectid = this.id;

                //========= FOR DISABLING THE BUTTON=============
                //empty the arrary first
                selected_attribute_id.length =0;
                //upon selected, add the value in array
                $("select.product-specification option:selected").each(function () {
                    selected_specification_id.push(this.value);
                });
                //compare the unique values with array that contains all values of attributes
                //using custom function with jquery prototype compare
                if(selected_specification_id.sort().compare(all_specific_id.sort())) {
                    //if all matches, disable button
                    $('#add-field-specific').addClass('add-disabled');
                } else {
                    //if all doesn't match, enable button
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
                wrapper.empty();
                //emptying the wrapper inorder to avoid duplication and attaching textfield accordingly.
                var attachment = ' <div class="form-group mb-3">' + '<label>Specification Details For ' + $(this).find("option:selected").text() + '</label> ' +
                    '<textarea class="form-control" rows="4" name="specification_details_'+id+'" id="specification_details_'+id+'" required></textarea> ' +
                    '</div>';
                wrapper.append(attachment);
            });

            $('.multi-field-specific .remove-field-specific', $wrapper).click(function() {

                if ($('.multi-field-specific', $wrapper).length > 1){
                    var id = $(this).prev().find('option:selected').val();

                    //========= FOR DISABLING THE BUTTON=============
                    //remove the recently deleted id from the array of unique ID
                    selected_specification_id = jQuery.grep(selected_specification_id, function(value) {
                        return value !== id;
                    });
                    //again compare the data and disable/enable accordingly
                    if(selected_specification_id.sort().compare(all_specific_id.sort())) {
                        //if all matches, disable button
                        $('#add-field-specific').addClass('add-disabled');
                    } else {
                        //if all doesn't match, enable button
                        $('#add-field-specific').removeClass('add-disabled');
                    }

                    //========= FOR DISABLING THE BUTTON=============

                    //get the value of closest selected option from the delete button.
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
            var form = $('#productcreate-form')[0];
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
                var post_url       = "{{route('products.store')}}"; //get form action url
                var request_method = 'POST'; //get form GET/POST method
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



