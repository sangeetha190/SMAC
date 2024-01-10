<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMAC | Checkout</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-5) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
            data-bg="{{ asset('assets/user/img/bg/9.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <!-- <h6 class="section-subtitle ltn__secondary-color">
                    // Welcome to our company
                  </h6> -->
                                <h1 class="section-title white-color">Checkout</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li>Checkout</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- WISHLIST AREA START -->
        <div class="ltn__checkout-area mb-105">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-12">
                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                                <h5>
                                    Returning customer?
                                    <a class="ltn__secondary-color" href="#ltn__returning-customer-login"
                                        data-bs-toggle="collapse">Click
                                        here to login</a>
                                </h5>
                                <div id="ltn__returning-customer-login"
                                    class="collapse ltn__checkout-single-content-info">
                                    <div class="ltn_coupon-code-form ltn__form-box">
                                        <p>Please login your accont.</p>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item input-item-name ltn__custom-icon">
                                                        <input type="text" name="ltn__name"
                                                            placeholder="Enter your name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item input-item-email ltn__custom-icon">
                                                        <input type="email" name="ltn__email"
                                                            placeholder="Enter email address" />
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase">
                                                Login
                                            </button>
                                            <label class="input-info-save mb-0"><input type="checkbox"
                                                    name="agree" /> Remember
                                                me</label>
                                            <p class="mt-30">
                                                <a href="register.html">Lost your password?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                                <h5>
                                    Have a coupon?
                                    <a class="ltn__secondary-color" href="#ltn__coupon-code"
                                        data-bs-toggle="collapse">Click here to enter
                                        your code</a>
                                </h5>
                                <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                    <div class="ltn__coupon-code-form">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <form action="#">
                                            <input type="text" name="coupon-code" placeholder="Coupon code" />
                                            <button class="btn theme-btn-2 btn-effect-2 text-uppercase">
                                                Apply Coupon
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">Billing Details</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <form action="#">
                                        <h6>Personal Information</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__name"
                                                        placeholder="First name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__lastname"
                                                        placeholder="Last name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="ltn__email"
                                                        placeholder="email address" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="text" name="ltn__phone"
                                                        placeholder="phone number" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-website ltn__custom-icon">
                                                    <input type="text" name="ltn__company"
                                                        placeholder="Company name (optional)" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-website ltn__custom-icon">
                                                    <input type="text" name="ltn__phone"
                                                        placeholder="Company address (optional)" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <h6>Country</h6>
                                                <div class="input-item">
                                                    <select class="nice-select">
                                                        <option>Select Country</option>
                                                        <option>Australia</option>
                                                        <option>Canada</option>
                                                        <option>China</option>
                                                        <option>Morocco</option>
                                                        <option>Saudi Arabia</option>
                                                        <option>United Kingdom (UK)</option>
                                                        <option>United States (US)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <h6>Address</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-item">
                                                            <input type="text"
                                                                placeholder="House number and street name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-item">
                                                            <input type="text"
                                                                placeholder="Apartment, suite, unit etc. (optional)" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <h6>Town / City</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="City" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <h6>State</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="State" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <h6>Zip</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="Zip" />
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <label class="input-info-save mb-0"><input type="checkbox"
                                                    name="agree" /> Create an
                                                account?</label>
                                        </p>
                                        <h6>Order Notes (optional)</h6>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="ltn__message" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="ltn__checkout-payment-method mt-50">
                            <h4 class="title-2">Payment </h4>
                            <div id="checkout_accordion_1">
                              
                                <div class="card">
                                    <h5 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-3" aria-expanded="false">
                                        Cash on Delivery
                                        {{-- <img src="{{ asset('assets/user/img/icons/applepay.png') }}"
                                            alt="#" /> --}}
                                    </h5>
                                    <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
                                        <div class="card-body">
                                            @php $total = 0 @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                    if ($details['product']->offer != null) {
                                                        $price = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100));
                                                    } else {
                                                        $price = $details['product']->price;
                                                    }
                                                    $total += $price * $details['quantity'];
                                                @endphp
                                            @endforeach
                                            @php
                                                $orderTotal = $total + session('shipping')[Auth::user()->id]['shipping_details']->price;
                                            @endphp
                                            <form action="{{route('cash.on.delivery')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="amount"  value="{{$orderTotal}}" >
                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                data-amount="{{ $orderTotal }}">
                                                Place order
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h5 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-4" aria-expanded="false">
                                        Razor Pay <img src="{{ asset('assets/user/img/icons/payment-3.png') }}"
                                            alt="#" />
                                    </h5>
                                    <div id="faq-item-2-4" class="collapse" data-parent="#checkout_accordion_1">
                                        <div class="card-body">
                                            <p>
                                                Pay via RazorPay; you can pay with all payment option.
                                            </p>
                                            @php $total = 0 @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                    if ($details['product']->offer != null) {
                                                        $price = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100));
                                                    } else {
                                                        $price = $details['product']->price;
                                                    }
                                                    $total += $price * $details['quantity'];
                                                @endphp
                                            @endforeach
                                            @php
                                                $orderTotal = $total + session('shipping')[Auth::user()->id]['shipping_details']->price;
                                            @endphp
                                            <a href="javascript:void(0)" class="btn theme-btn-1 btn-effect-1 text-uppercase order-btn"
                                                data-amount="{{ $orderTotal }}">
                                                Place order
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__payment-note mt-30 mb-30">
                                <p>
                                    Your personal data will be used to process your order,
                                    support your experience throughout this website, and for
                                    other purposes described in our privacy policy.
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <tr>
                                                <td>{{ $details['product']->product_name }} <strong>
                                                        @if ($details['product']->offer != null)
                                                            ₹{{ round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) }}.00
                                                        @else
                                                            ₹{{ $details['product']->price }}
                                                        @endif
                                                        × {{ $details['quantity'] }}
                                                    </strong></td>
                                                <td>
                                                    @if ($details['product']->offer != null)
                                                        ₹
                                                        {{ round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) * $details['quantity'] }}.00
                                                    @else
                                                        ₹{{ $details['product']->price * $details['quantity'] }}.00
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    {{-- <tr>
                                        <td>Orange Sliced Mix <strong>× 2</strong></td>
                                        <td>$170.00</td>
                                    </tr>
                                    <tr>
                                        <td>Red Hot Tomato <strong>× 2</strong></td>
                                        <td>$150.00</td>
                                    </tr> --}}
                                    <tr>
                                        <td>Shipping and Handing</td>
                                        <td>₹{{ session('shipping')[Auth::user()->id]['shipping_details']->price }}.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>₹{{ $orderTotal }}.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="card card-default">
                        <div class="card-header">
                            Laravel - Razorpay Payment Gateway Integration
                        </div>

                        <div class="card-body text-center">
                            <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="1000"
                                    data-buttontext="Pay 10 INR" data-name="ItSolutionStuff.com" data-description="Rozerpay"
                                    data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="name"
                                    data-prefill.email="email" data-theme.color="#ff7529"></script>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- WISHLIST AREA START -->

        <!-- FEATURE AREA START ( Feature - 3) -->
        <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="{{ asset('assets/user/img/icons/icon-img/11.png') }}"
                                                alt="#" />
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Curated Products</h4>
                                            <p>
                                                Provide Curated Products for all product over $100
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="{{ asset('assets/user/img/icons/icon-img/12.png') }}"
                                                alt="#" />
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Handmade</h4>
                                            <p>
                                                We ensure the product quality that is our main goal
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="{{ asset('assets/user/img/icons/icon-img/13.png') }}"
                                                alt="#" />
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Natural Food</h4>
                                            <p>
                                                Return product within 3 days for any product you buy
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="{{ asset('assets/user/img/icons/icon-img/14.png') }}"
                                                alt="#" />
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Free home delivery</h4>
                                            <p>
                                                We ensure the product quality that you can trust
                                                easily
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->

        <!-- FOOTER AREA START -->
        @include('layouts.footer')
        <!-- FOOTER AREA END -->
    </div>
    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    @include('layouts.scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var SITEURL = '{{ URL::to('') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.order-btn', function(e) {

            var totalAmount = $(this).attr("data-amount");

            // alert(totalAmount);

            var product_id = $(this).attr("data-id");
            var options = {
                "key": "rzp_test_kYWE8bFvDO9w30",
                "amount": (totalAmount * 100), // 2000 paise = INR 20
                "name": "SDM",
                "description": "Payment",
                "image": "assets/user/img/product/logo (1).jpg",
                "handler": function(response) {
                    // window.location.href = SITEURL +'/'+ 'paysuccess?payment_id='+response.razorpay_payment_id+'&product_id='+product_id+'&amount='+totalAmount;
                    window.location.href = SITEURL + '/' + 'paysuccess?payment_id=' + response
                        .razorpay_payment_id + '&amount=' + totalAmount;
                },
                "prefill": {
                    "contact": '+0123-456789',
                    "email": ' ambar@dietcode.tech',
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        });
        /*document.getElementsClass('buy_plan1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
        }*/
        
    </script>


</body>

</html>
