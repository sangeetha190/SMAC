<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SDM Admin - Orders-Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('admin-dashboard.layouts.navbar')
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        @include('admin-dashboard.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title">Orders</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="active">Order Management</li>
                                    <li class="active">All Orders</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            {{-- <a href="{{ route('shipping-price-details.create') }}" style="margin-bottom: 10px"
                            class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-plus"></i>
                            Create Shipping</a> --}}
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Orders Details</h3>
                                </div>


                                <div class="panel-body">

                                    <div class="row">
                                        <form action="{{route('order.search')}}" method="get">

                                            <div class="col-sm-4 col-xs-12">

                                                <div class="m-t-20">
                                                    {{-- <form class="" action="#"> --}}
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control" id="">
                                                            <option value="">Choose Status</option>
                                                            <option value="pending" @if(!empty($status)) @selected($status=='pending' ) @endif>Pending</option>
                                                            <option value="cancelled" @if(!empty($status)) @selected($status=='cancelled' ) @endif>Cancelled</option>
                                                            <option value="completed" @if(!empty($status)) @selected($status=='completed' ) @endif>Completed</option>
                                                            <option value="shipped" @if(!empty($status)) @selected($status=='shipped' ) @endif>Shipped</option>
                                                            <option value="delivered" @if(!empty($status)) @selected($status=='delivered' ) @endif>Delivered</option>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Order No</label>
                                                        <div>
                                                            <input type="text" name="order_no" @if(!empty($orderNo)) value="{{$orderNo}}" @endif class="form-control" placeholder="Order No " />
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-4 col-xs-12">
                                                <div class="m-t-20">
                                                    {{-- <form action="#"> --}}

                                                    <div class="form-group">
                                                        <label>Min Amount</label>
                                                        <div>
                                                            <input type="number" class="form-control" @if(!empty($minAmount)) value="{{$minAmount}}" @endif name="min_amount" placeholder="Min Amount" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <div>
                                                            <input type="date" @if(!empty($startDate)) value="{{$startDate}}" @endif class="form-control" name="start_date" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-4 col-xs-12">


                                                <div class="m-t-20">


                                                    <div class="form-group">
                                                        <label>Max Amount</label>
                                                        <div>
                                                            <input type="number" class="form-control" name="max_amount" @if(!empty($maxAmount)) value="{{$maxAmount}}" @endif placeholder="Max Amount" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Date</label>
                                                        <div>
                                                            <input type="date" class="form-control" name="end_date" @if(!empty($endDate)) value="{{$endDate}}" @endif placeholder="End Dtae" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group m-b-0" style="padding-left: 10px">
                                                {{-- <div> --}}
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Filter
                                                </button>
                                                {{-- <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                        Cancel
                                                    </button> --}}
                                                {{-- </div> --}}
                                            </div>
                                        </form>

                                    </div>
                                    <br>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Order No</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Product</th>
                                                <th>Shipping</th>
                                                <th>Transaction</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $si_no = 1;
                                            @endphp

                                            @if (!empty($allOrders))
                                            @foreach ($allOrders as $key => $value)
                                            <tr>
                                                <td>{{ $si_no++ }}</td>
                                                <td>{{ $value->order_no }}</td>
                                                <td>{{ $value->total_amount }}</td>
                                                <td class="text-center"><span class="badge bg-success">{{ $value->status }}</span>
                                                    @if (!empty($value->cancelOrderRequest))
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalReason{{ $value->id }}"><i class="fa fa-sticky-note"></i></button>

                                                    <!-- sample modal content -->
                                                    <div id="myModalReason{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Order Cancel Request
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">

                                                                            <p><b>Reason
                                                                                    :</b>
                                                                                {{ $value->cancelOrderRequest->reason }}
                                                                            </p>
                                                                            <div class="m-t-20">

                                                                            </div>

                                                                        </div>



                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                            class="btn btn-primary waves-effect waves-light">Save
                                                                            changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    @endif


                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalProduct{{ $value->id }}">Show
                                                        All
                                                    </button>
                                                    <div id="myModalProduct{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Product Details
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body" style="white-space: normal">
                                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            @php $total = 0 @endphp
                                                                            @foreach ($value->orderItems as $key => $item)
                                                                            @php
                                                                            $total += $item->total_price;
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $item->product->product_name }}
                                                                                </td>
                                                                                <td>{{ $item->unit_price }}
                                                                                </td>
                                                                                <td>x {{ $item->quantity }}
                                                                                </td>
                                                                                <td>{{ $item->total_price }}
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td>Sub Total</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>{{ $total }}.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Shipping Price</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>{{ $value->total_amount - $total }}.00
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Total</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>{{ $value->total_amount }}
                                                                                </td>
                                                                            </tr>

                                                                        </tbody>

                                                                    </table>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                                    class="btn btn-primary waves-effect waves-light">Save
                                                                                    changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalShipping{{ $value->id }}">Show
                                                        All</button>
                                                    <!-- sample modal content -->
                                                    <div id="myModalShipping{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Shipping Address
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body" style="white-space: normal">
                                                                    <p>{{ $value->firstname }}
                                                                        {{ $value->lastname }},
                                                                        {{ $value->address_line1 }},
                                                                        {{ $value->address_line2 }},
                                                                        {{ $value->city }},
                                                                        {{ $value->state }},
                                                                        {{ $value->postal_code }},
                                                                        {{ $value->country }},
                                                                        {{ $value->phone }},
                                                                        {{ $value->email }}
                                                                    </p>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                                class="btn btn-primary waves-effect waves-light">Save
                                                                                changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalPayment{{ $value->id }}">Show
                                                        All</button>

                                                    <!-- sample modal content -->
                                                    <div id="myModalPayment{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Payment Details
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p><b>Payment Id :</b>
                                                                        {{ $value->payment->transaction_id }}
                                                                    </p>
                                                                    <p><b>Payment Method :</b>
                                                                        {{ $value->payment->payment_method }}
                                                                    </p>
                                                                    <p><b>Payment Amount :</b>
                                                                        {{ $value->payment->amount }}
                                                                    </p>
                                                                    <p><b>Payment Status :</b>
                                                                        {{ $value->payment->status }}
                                                                    </p>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                                class="btn btn-primary waves-effect waves-light">Save
                                                                                changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td class="text-center">
                                                    {{-- <a href="{{ route('shipping-price-details.edit', $value->id) }}"
                                                    class="btn btn-info btn-xs waves-effect waves-light"><i class="fa fa-edit"></i></a> --}}

                                                    @if ($value->status === 'delivered' ||$value->status === 'cancelled')
                                                    @if($value->status === 'delivered')
                                                    <span class="badge bg-success">Success</span>
                                                    @else
                                                    <span class="badge bg-danger">Cancelled</span>
                                                    @endif

                                                    @else
                                                    <button class="btn btn-info btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalAction{{ $value->id }}"><i class="fa fa-edit"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalCancel{{ $value->id }}">Cancel
                                                        Order
                                                    </button>
                                                    @endif



                                                    <!-- sample modal content -->
                                                    <div id="myModalAction{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Change Order Status
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">


                                                                            <div class="m-t-20">
                                                                                <form action="{{ route('update.order.status') }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="order_id" value="{{ $value->id }}">
                                                                                    <div class="form-group">
                                                                                        {{-- <label>Status</label> --}}
                                                                                        <div>
                                                                                            <select class="form-control" required name="status">
                                                                                                <option value="">
                                                                                                    Choose
                                                                                                    status
                                                                                                </option>
                                                                                                <option value="pending">
                                                                                                    pending
                                                                                                </option>
                                                                                                <option value="completed">
                                                                                                    completed
                                                                                                </option>
                                                                                                <option value="shipped">
                                                                                                    shipped
                                                                                                </option>
                                                                                                <option value="delivered">
                                                                                                    delivered
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <div>
                                                                                            <button type="submit" id="changeStatus" class="btn btn-primary waves-effect waves-light">
                                                                                                Change Status
                                                                                            </button>
                                                                                            {{-- <a href="{{ route('Alignment.index') }}"
                                                                                            class="btn btn-dark waves-effect m-l-5">
                                                                                            Cancel
                                                                                            </a> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>



                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                            class="btn btn-primary waves-effect waves-light">Save
                                                                            changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->

                                                    <!-- sample modal content -->
                                                    <div id="myModalCancel{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Order Cancel
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">


                                                                            <div class="m-t-20">
                                                                                <form action="{{ route('order.cancel') }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="order_id" value="{{ $value->id }}">
                                                                                    <div class="form-group">
                                                                                        <label>Short Description
                                                                                            <span class="text-danger">*</span></label>
                                                                                        <div>
                                                                                            <textarea required class="form-control" name="reason" required rows="3"></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <div>
                                                                                            <button type="submit" id="changeStatus" class="btn btn-primary waves-effect waves-light">
                                                                                                Order Cancel
                                                                                            </button>
                                                                                            {{-- <a href="{{ route('Alignment.index') }}"
                                                                                            class="btn btn-dark waves-effect m-l-5">
                                                                                            Cancel
                                                                                            </a> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                        </div>



                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    {{-- <button type="button"
                                                                            class="btn btn-primary waves-effect waves-light">Save
                                                                            changes</button> --}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row -->
                </div> <!-- container -->

            </div> <!-- content -->


        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if ($message = Session::get('success'))
    <script>
        swal({
            title: "Success!",
            text: "{!! Session::get('success') !!}",
            imageUrl: "assets/admin/plugins/bootstrap-sweetalert/thumbs-up.jpg",
            timer: 5000, // 3 seconds
            buttons: false
        });
    </script>
    @endif
    @if ($message = Session::get('danger'))
    <script>
        swal({
            title: "Success!",
            text: "{!! Session::get('danger') !!}",
            type: "error",
            timer: 5000, // 3 seconds
            buttons: false
        });
    </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Deleting...').attr('disabled', true);

                $('#changeStatus').html('<i class="fas fa-spinner fa-spin"></i> Process...').attr(
                    'disabled', true);
            });
        });
    </script>

</body>

</html>