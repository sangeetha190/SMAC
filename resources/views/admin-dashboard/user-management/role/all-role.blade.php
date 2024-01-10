<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Roles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
        integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-***" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                                <h4 class="pull-left page-title">Roles</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="active">User Management</li>
                                    <li class="active">All Roles</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <a href="{{ route('roles.create') }}" style="margin-bottom: 10px"
                                class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-plus"></i>
                                Create Roles</a>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Roles deatails</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Roles name</th>
                                                <th>Permissions</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $si_no = 1;
                                            @endphp

                                            @if (!empty($allRoles))
                                                @foreach ($allRoles as $key => $value)
                                                    <tr>
                                                        <td>{{ $si_no++ }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td style="white-space: normal">
                                                            @foreach ($value->permissions as $permission)
                                                                {{ $permission->name }},
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('roles.edit', $value->id) }}"
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
                                                                                action="{{ route('roles.destroy', $value->id) }}"
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
