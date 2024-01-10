<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Reset Password Form</title>
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
                    <span class=""><img src="{{ asset('assets/user/img/logo.png') }}" alt="logo"
                            height="100"></span>
                </h3>
                <h4 class="text-muted text-center m-t-0"><b>Reset Password Form</b></h4>

                <form class="form-horizontal m-t-20 needs-validation" action="{{ route('reset.password.post') }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required=""
                                placeholder="E-mail">
                        </div>
                    </div>
                    <div id="passwordErrorMessage" style="color: red; display: none;">
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password" required=""
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="confirmpassword"
                                name="password_confirmation" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button id="submitBtn" class="btn btn-primary w-md waves-effect waves-light"
                                type="submit">Change Password</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="{{ route('login.register') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i>
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
    <script type="text/javascript" src="{{ asset('assets/adminview/plugins/parsleyjs/parsley.min.js') }}"></script>

    <script>
        function validatePassword() {
            var password = $("#password").val();
            var confirmPassword = $("#confirmpassword").val();


            if (password === "" && confirmPassword === "") {
                $("#passwordErrorMessage").hide();
                return true;
            } else {

                if (password !== confirmPassword) {
                    $("#passwordErrorMessage").text("Passwords do not match").show();
                    return false;
                } else if (password.length < 8) {
                    $("#passwordErrorMessage").text("Password must be at least 8 characters long").show();
                    return false;
                } else if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/.test(password)) {
                    $("#passwordErrorMessage").text("Password must contain at least one special character").show();
                    return false;
                } else if (!/[A-Z]+/.test(password)) {
                    $("#passwordErrorMessage").text("Password must contain at least one uppercase letter").show();
                    return false;
                } else {
                    $("#passwordErrorMessage").hide();
                    return true;
                }
            }
        }

        $(document).ready(function() {
            $("form.needs-validation").submit(function(event) {
                if (validatePassword()) {
                    $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Submitting...').attr('disabled',
                    true); // Show the loading spinner
                } else {
                    event.preventDefault();
                }
            });

        });
    </script>

</body>

</html>
