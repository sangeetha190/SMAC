<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Permissions</title>
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
                                <h4 class="pull-left page-title">Permissions</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="active">User Management</li>
                                    <li class="active">All Permissions</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <a href="{{ route('permissions.create') }}" style="margin-bottom: 10px"
                                class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-plus"></i>
                                Create Permission</a>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Permission deatails</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Permission name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $si_no = 1;
                                            @endphp

                                            @if (!empty($allPermissions))
                                                @foreach ($allPermissions as $key => $value)
                                                    <tr>
                                                        <td>{{ $si_no++ }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>
                                                            <a href="{{ route('permissions.edit', $value->id) }}"
                                                                class="btn btn-info btn-xs waves-effect waves-light"><i
                                                                    class="fa fa-edit"></i></a>

                                                            <button
                                                                class="btn btn-danger btn-xs waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-target="#custom-width-modal{{ $value->id }}"><i
                                                                    class="fa fa-trash"></i></button>
                                                            <!-- sample modal content -->
                                                            <div id="custom-width-modal{{ $value->id }}"
                                                                class="modal fade" tabindex="-1" role="dialog"
                                                                aria-labelledby="custom-width-modalLabel"
                                                                aria-hidden="true" style="display: none">
                                                                <div class="modal-dialog" style="width:55%">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-hidden="true">×</button>
                                                                            <h4 class="modal-title"
                                                                                id="custom-width-modalLabel">
                                                                                Delete Confirmation!</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4>Are you sure you want to delete this
                                                                                record?
                                                                            </h4>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form
                                                                                action="{{ route('permissions.destroy', $value->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button"
                                                                                    class="btn btn-default waves-effect"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit" id="submitBtn"
                                                                                    class="btn btn-danger waves-effect waves-light">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->

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
</body>

</html>
