<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SDM Admin - Cancell Request Orders</title>
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
                                <h4 class="pull-left page-title">Cancel Request</h4>
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
                                    <h3 class="panel-title">Cancel request orders</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Order No</th>
                                                <th>Amount</th>
                                                <th>Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $si_no = 1;
                                            @endphp

                                            @if (!empty($cancelRequestOrders))
                                                @foreach ($cancelRequestOrders as $key => $value)
                                                    <tr>
                                                        <td>{{ $si_no++ }}</td>
                                                        <td>{{ $value->order->order_no }}</td>
                                                        <td>{{ $value->order->total_amount }}</td>
                                                        <td>{{ $value->reason }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
        integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Deleting...').attr('disabled',
                    true);
            });
        });
    </script>

</body>

</html>
