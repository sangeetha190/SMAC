<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')

</head>


<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">

            <div class="panel-body">
                <h3 class="text-center m-t-0 m-b-30">
                    <span class=""><img src="{{ asset('assets/user/img/logo.png') }}" alt="logo" height="100"></span>
                </h3>
                <h4 class="text-muted text-center m-t-0"><b>Reset Password</b></h4>

                <form class="form-horizontal m-t-20" action="{{ route('forget.password.post') }}" method="post">
                    @csrf
                    {{-- <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Enter your <b>Email</b> and instructions will be sent to you!
                    </div> --}}

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required=""
                                placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button id="submitBtn" class="btn btn-primary w-md waves-effect waves-light"
                                type="submit">Send
                                Mail</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="{{ route('user.login') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i>
                                Go to Login </a>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>



    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')

    <!-- Parsleyjs -->
    <script type="text/javascript" src="{{ asset('assets/admin-dashboard/plugins/parsleyjs/parsley.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('form').parsley();
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Sending...').attr('disabled',
                    true);
            });
        });
    </script>

</body>

</html>
