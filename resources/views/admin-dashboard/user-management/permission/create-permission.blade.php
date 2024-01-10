<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Create Permission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')
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
                                <h4 class="pull-left page-title">Create Permission</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="#">User Mangement</a></li>
                                    <li class="active">Create Permission</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Create Permission Form</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <div class="m-t-20">
                                                <form action="{{ route('permissions.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Permission Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            required placeholder="Type permission name" />
                                                    </div>

                                                    <div class="form-group">
                                                        <div>
                                                            <button type="submit" id="submitBtn"
                                                                class="btn btn-primary waves-effect waves-light">
                                                                Create
                                                            </button>
                                                            <a href="{{ route('permissions.index') }}"
                                                                class="btn btn-dark waves-effect m-l-5">
                                                                Cancel
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>



                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>



                </div> <!-- container -->

            </div> <!-- content -->



        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')
    <!-- Parsleyjs -->
    <script type="text/javascript" src="{{ asset('assets/adminview/plugins/parsleyjs/parsley.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('form').parsley();
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Storing...').attr('disabled',
                    true);
            });
        });
    </script>


</body>

</html>
