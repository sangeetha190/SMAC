<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Forgot Password</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-3) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <!-- LOGIN AREA START (Register) -->
        <div class="ltn__login-area mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center mb-0">
                            <h3 class="section-title" style="font-size: 26px">Forgot Password</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="account-login-inner">
                            <form id="needs-validation" action="{{ route('forget.password.post') }}" method="POST" class="ltn__form-box contact-form-box">
                                @csrf
                                <input type="text" name="email" required placeholder="Email*" autocomplete="off" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="btn-wrapper mt-0">
                                    <button class="theme-btn-1 btn btn-block" type="submit">
                                        Send Mail
                                    </button>
                                    <a href="{{route('user.login')}}">Back to Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->

        <!-- FOOTER AREA START -->
        @include('layouts.footer')
        <!-- FOOTER AREA END -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Add this in the <head> section of your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            $("form#needs-validation").submit(function(event) {
                // alert('testing');
                if (!validatePassword()) {
                    event.preventDefault();
                } else {
                    $(".theme-btn-1").prop("disabled", true);
                    $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
                }
            });

        });

    </script>
    <!-- All JS Plugins -->
    @include('layouts.scripts')
</body>

</html>
