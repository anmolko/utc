@extends('backend.layouts.master')
@section('title') Customer Orders @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jquery-ui.min.css')}}">

    <style>
        /*for image*/
        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }
        /*end for image*/

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        td.details-controls {
            text-align:center;
            cursor: pointer;
        }
        tr.shown td.details-controls {
            text-align:center;
        }

        .thumbnail-order{
            position: relative;
            z-index: 0;
        }
        .thumbnail-order:hover{
            background-color: transparent;
            z-index: 50;
        }
        .thumbnail-order span{ /*CSS for enlarged image*/
            position: absolute;
            background-color: transparent;
            padding: 5px;
            left: -1000px;
            box-shadow: 1px 1px 3px rgba(0,0,0,.45);
            visibility: hidden;
            color: black;
            text-decoration: none;
        }

        .thumbnail-order span img{ /*CSS for enlarged image*/
            border-width: 0;
            padding: 2px;
        }

        .thumbnail-order:hover span{ /*CSS for enlarged image on hover*/
            visibility: visible;
            top: 15%;
            left: -230px; /*position where enlarged image should offset horizontally */
        }

        .product-name{
                color: #0c0c0c;
        }

        .product-name:hover{
            color: #41237c;
        }


    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Orders
                            </h4>
                            <a href="javascript:void(0)" class="float-right add-doc text-primary" data-toggle="modal" data-target="#addSlider">Add Slider
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="all-orders" class="table table-striped nowrap">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Order Number</th>
                                            <th>Order By</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$orders)
                                            @foreach($orders as  $order)
                                                <tr data-child-value="{{$order}}">
                                                    <td class="details-control"><i class="fa fa-plus-square" aria-hidden="true"></i></td>
                                                    <td>{{@$order->order_number}}</td>
                                                    <td>{{ucfirst(@$order->user->name)}}</td>
                                                    <td>{{@$order->user->contact}}</td>
                                                    <td>{{@$order->user->email}}</td>
                                                    <td>NPR. {{number_format(@$order->total_amount)}}</td>
                                                    <td>{{\Carbon\Carbon::parse(@$order->created_at)->isoFormat('MMM Do, YYYY')}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                {{--                                                                        <a class="dropdown-item action-blog-edit" href="#" hrm-update-action="{{route('blog.update',$blog->id)}}" hrm-edit-action="{{route('blog.edit',$blog->id)}}"> Edit </a>--}}
                                                                <a class="dropdown-item action-blog-delete" href="#" hrm-delete-per-action="{{route('orders.destroy',$order->id)}}"> Delete </a>
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
@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset("assets/jquery-ui.js")}}" ></script>

    <script type="text/javascript">

        $(document).ready(function () {

            function format(mainvalue) {
                console.log(mainvalue);
                var inner_table = '<table class="child_row-verified table-responsive table table-striped table-bordered nowrap">' +
                    '<thead>' +
                    '<tr>' +
                    '<th>Image</th>' +
                    '<th>Product</th>' +
                    '<th>Brand </th>' +
                    '<th>Type</th>' +
                    '<th>Quantity</th>' +
                    '<th>Item Price</th>' +
                    '<th>Discount Price</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                $.each(mainvalue.products, function( index, value ) {

                    imagename = '<img src="/images/uploads/products/' + value.thumbnail + '" class="current-img" style="max-width:120px;" alt=""/>';
                    inner_table += '<td style=" text-align: center;">' +
                        imagename + '</td>' +
                        '<td><a class="product-name" href="/product/' + value.slug +'" target="_blank">' +  value.name + '</a></td>' +
                        '<td>' + value.brand.name +'</td>' +
                        '<td>' + value.type + '</td>' +
                        '<td>' + value.pivot.quantity + '</td>' +
                        '<td> NPR. '
                        + value.pivot.price + '</td>' +
                        '<td> NPR. ' + value.pivot.discount + '</td></tr>';


                });




                    return inner_table;
            }



            all_orders();
            function all_orders(){
                var table = $('#all-orders').DataTable({
                    "orderable": false,
                    "bSort" : false,
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                });

                // for all orders
                $('#all-orders tbody').off('click', 'td.details-control');
                $('#all-orders tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row( tr );

                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child(format(tr.data('child-value'))).show();
                        tr.addClass('shown');
                    }
                } );
            }

        });





    </script>
@endsection
