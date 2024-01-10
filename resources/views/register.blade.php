<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Register</title>
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
                            <h3 class="section-title" style="font-size: 26px">REGISTER</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="account-login-inner">
                            <form id="needs-validation" action="{{ route('customer.register') }}" method="post" class="ltn__form-box contact-form-box">
                                @csrf
                                @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" required name="firstname" placeholder="First Name*" />
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="lastname" placeholder="Last Name" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" required name="email" placeholder="Email*" />
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <span id="mobileErrorMessage" style="color: red; display: none;">Invalid mobile number</span>
                                <input type="text" required name="mobile" id="mobile" placeholder="Mobile Number*" />

                                <div id="passwordErrorMessage" style="color: red; display: none;">
                                </div>
                                <input type="password" required name="password" id="password" placeholder="Password*" />

                                <input type="password" required name="confirmpassword" id="confirmpassword" placeholder="Confirm Password*" />

                                <div class="btn-wrapper mt-0">
                                    <button class="theme-btn-1 btn reverse-color btn-block" type="submit">
                                        CREATE ACCOUNT
                                    </button>
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

            var mobileNumber = $("#mobile").val();

            if (/^\d{10}$/.test(mobileNumber)) {
                $("#mobileErrorMessage").hide();
                return true;
            } else {
                $("#mobileErrorMessage").show();
                return false;
            }
        }

        $(document).ready(function() {
            $("form#needs-validation").submit(function(event) {

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
