<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Dashboard</title>
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
                                <h4 class="pull-left page-title">Dashboard</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">SDM</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="panel panel-primary text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Total Customer</h4>
                                </div>
                                <div class="panel-body">
                                    <h3 class=""><b>{{count($customerCount)}}</b></h3>
                                    {{-- <p class="text-muted"><b>48%</b> From Last 24 Hours</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel panel-primary text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Total Order</h4>
                                </div>
                                <div class="panel-body">
                                    <h3 class=""><b>{{count($orderCount)}}</b></h3>
                                    {{-- <p class="text-muted"><b>15%</b> Orders in Last 10 months</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel panel-primary text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Today Order</h4>
                                </div>
                                <div class="panel-body">
                                    <h3 class=""><b>{{count($todayOrderCount)}}</b></h3>
                                    {{-- <p class="text-muted"><b>65%</b> From Last 24 Hours</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel panel-primary text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Total Earnings</h4>
                                </div>
                                <div class="panel-body">
                                    <h3 class=""><b>₹{{$totalEarnings->sum('total_amount')}}.00</b></h3>
                                    {{-- <p class="text-muted"><b>31%</b> From Last 1 month</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Revenue</h4>
                                    <ul class="list-inline m-t-30 widget-chart text-center">
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>5248</b></h4>
                                            <h5 class="text-muted m-b-0">Marketplace</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                            <h4 class=""><b>321</b></h4>
                                            <h5 class="text-muted m-b-0">Last week</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>964</b></h4>
                                            <h5 class="text-muted m-b-0">Last Month</h5>
                                        </li>
                                    </ul>
                                    <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Email Sent</h4>
                                    <ul class="list-inline m-t-30 widget-chart text-center">
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>3654</b></h4>
                                            <h5 class="text-muted m-b-0">Marketplace</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                            <h4 class=""><b>954</b></h4>
                                            <h5 class="text-muted m-b-0">Last week</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>8462</b></h4>
                                            <h5 class="text-muted m-b-0">Last Month</h5>
                                        </li>
                                    </ul>
                                    <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Monthly Subscriptions</h4>
                                    <ul class="list-inline m-t-30 widget-chart text-center">
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>3256</b></h4>
                                            <h5 class="text-muted m-b-0">Marketplace</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                            <h4 class=""><b>785</b></h4>
                                            <h5 class="text-muted m-b-0">Last week</h5>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                            <h4 class=""><b>1546</b></h4>
                                            <h5 class="text-muted m-b-0">Last Month</h5>
                                        </li>
                                    </ul>
                                    <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Tables</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>E-mail</th>
                                                <th>Service</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($totalContacts->sortByDesc('created_at') as $key => $value)
                                            <tr>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->service}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalShipping{{ $value->id }}">Show</button>
                                                    <!-- sample modal content -->
                                                    <div id="myModalShipping{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Message
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body" style="white-space: normal">
                                                                    <p>{{ $value->message }}</p>


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
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row -->



                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customers Tables</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>E-mail</th>
                                                <th>Phone</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customerCount as $key => $value)
                                            <tr>
                                                <td>{{$value->first_name}}</td>
                                                <td>{{$value->last_name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->mobile}}</td>
                                            </tr>
                                            @endforeach
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


    @include('admin-dashboard.layouts.scripts')

</body>

</html>
