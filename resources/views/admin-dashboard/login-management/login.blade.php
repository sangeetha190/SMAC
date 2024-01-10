<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Login</title>
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
                    <span class=""><img src="{{ asset('assets/userview/images/logos/logo.jpg') }}" alt="logo"
                            height="32"></span>
                </h3>
                <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

                <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required=""
                                placeholder="E-mail">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required=""
                                placeholder="Password">
                        </div>
                    </div>

                    {{-- <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button id="submitBtn" class="btn btn-primary w-md waves-effect waves-light"
                                type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="{{ route('forget.password.get') }}" class="text-muted"><i
                                    class="fa fa-lock m-r-5"></i> Forgot
                                your password?</a>
                        </div>
                        {{-- <div class="col-sm-5 text-right">
                                <a href="pages-register.html" class="text-muted">Create an account</a>
                            </div> --}}
                    </div>
                </form>
            </div>

        </div>
    </div>



    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')

    <!-- Parsleyjs -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('form').parsley();
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Signing...').attr('disabled',
                    true);
            });
        });
    </script>

</body>

</html>
