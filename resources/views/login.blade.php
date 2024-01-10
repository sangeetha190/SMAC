<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Login</title>
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



        <!-- LOGIN AREA START -->
        <div class="ltn__login-area mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center mb-0">
                            <h3 class="section-title" style="font-size: 26px">LOGIN</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mx-auto col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="account-login-inner">
                            <form action="{{ route('login') }}" method="post" class="ltn__form-box contact-form-box">
                                @csrf
                                <input type="text" name="email" required placeholder="Email*"  />
                                <input type="password" name="password" required placeholder="Password*" />
                                <div class="btn-wrapper mt-0">
                                    <button class="theme-btn-1 btn btn-block" type="submit">
                                        SIGN IN
                                    </button>
                                </div>
                                <div class="go-to-btn mt-20 text-center">
                                    <p>
                                        <a href="{{ route('forget.password.get') }}">Forgot your password?</a> Or
                                        <a href="{{ route('register') }}" class="ltn__secondary-color">
                                            <b>Create an account</b>
                                        </a>
                                    </p>
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

    <!-- All JS Plugins -->
    @include('layouts.scripts')
    <script>
        $(document).ready(function() {
            $('form').on('submit', function() {
                $(".theme-btn-1").prop("disabled", true);
                $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
            });
        });
    </script>

</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:45:00 GMT -->

</html>
