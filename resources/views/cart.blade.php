<!DOCTYPE html>
<html>

<head>
    <title>SMAC CART</title>
    @include('layouts.links')

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}

    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-5) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="{{ asset('assets/user/img/bg/9.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <!-- <h6 class="section-subtitle ltn__secondary-color">
                    // Welcome to our company
                  </h6> -->
                                <h1 class="section-title white-color">Cart</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- SHOPING CART AREA START -->
        <div class="liton__shoping-cart-area mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive">
                                <table id="cart" class="table table-hover table-condensed">
                                    {{-- <thead>
                                        <tr>
                                            <th style="width:50%">Product</th>
                                            <th style="width:10%">Price</th>
                                            <th style="width:8%">Quantity</th>
                                            <th style="width:22%" class="text-center">Subtotal</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead> --}}
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="cart-product-remove remove-from-cart">x</td>
                                            <td class="cart-product-image">
                                                <a href="{{route('product.details',['slug1' => $details['product']->productCategory->slug, 'slug2' => $details['product']->slug])}}"><img src="{{ asset('storage/' . $details['image']) }}" alt="#" /></a>
                                            </td>
                                            <td class="cart-product-info">
                                                <h4>
                                                    <a href="{{route('product.details',['slug1' => $details['product']->productCategory->slug, 'slug2' => $details['product']->slug])}}">{{ $details['product']->product_name }}</a>
                                                </h4>
                                            </td>
                                            <td>
                                                @if ($details['product']->stock >= 1)
                                                <span class="badge badge-danger" style="background-color:#4cae4c">In Stock</span>
                                                @else
                                                <span class="badge badge-danger" style="background-color: red">Out of Stock</span>
                                                @endif
                                            </td>
                                            <td class="cart-product-price">₹
                                                @if ($details['product']->offer != null)
                                                {{ round($details['price'] - $details['price'] * ($details['product']->offer / 100)) }}.00
                                                @else
                                                {{ $details['price'] }}
                                                @endif
                                            </td>
                                            <td data-th="Quantity" class="cart-product-quantity">
                                                {{-- <div class="cart-plus-minus"> --}}
                                                <input type="number" value="{{ $details['quantity'] }}" class=" quantity update-cart" style="width: 100px" />
                                                {{-- </div> --}}
                                            </td>
                                            <td data-th="Subtotal" class="text-center">

                                                @if ($details['product']->offer != null)
                                                ₹
                                                {{ round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) * $details['quantity'] }}.00
                                                @else
                                                ₹{{ $details['product']->price * $details['quantity'] }}.00
                                                @endif

                                            </td>
                                            {{-- <td class="actions" data-th="">
                                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </td> --}}
                                        </tr>
                                        @endforeach
                                        @endif
                                        {{-- <tr class="cart-coupon-row">
                                            <td colspan="6">
                                                <div class="cart-coupon">
                                                    <input type="text" name="cart-coupon"
                                                        placeholder="Coupon code" />
                                                    <button type="submit" class="btn theme-btn-2 btn-effect-2">
                                                        Apply Coupon
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn theme-btn-2 btn-effect-2-- disabled">
                                                    Update Cart
                                                </button>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                <h3><strong>Total ${{ $total }}</strong></h3>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                                                Shopping</a>
                                            <button class="btn btn-success">Checkout</button>
                                        </td>
                                    </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                            <form id="needs-validation" action="{{ route('store.address') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        @if (Auth::user())
                                        <div class="ltn__checkout-single-content mt-50">
                                            <h4 class="title-2">Shipping Details</h4>
                                            <div class="ltn__checkout-single-content-info">
                                                <form action="#">
                                                    <h6>Personal Information</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-item input-item-name ltn__custom-icon">
                                                                <div id="firstnameErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" name="firstname" id="firstname" value="{{ auth::user()->first_name }}" placeholder="First name" />

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-item input-item-name ltn__custom-icon">
                                                                <input type="text" id="lastname" name="lastname" value="{{ auth::user()->last_name }}" placeholder="Last name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-item input-item-email ltn__custom-icon">
                                                                <div id="emailErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="email" id="email" name="email" value="{{ auth::user()->email }}" placeholder="email address" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                                <div id="phoneErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" id="phone" name="phone" value="{{ auth::user()->mobile }}" placeholder="phone number" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <h6>Country</h6>
                                                            <div class="input-item">
                                                                <div id="countryErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <select class="nice-select" id="country" name="country">
                                                                    <option value="">Select Country</option>
                                                                    <option value="India" @if(!empty(Auth::user()->address->country))
                                                                        @selected(Auth::user()->address->country == 'India') @endif>India</option>
                                                                    {{-- <option value="Canada" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'Canada')  @endif>Canada</option>
                                                                        <option value="China" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'China')  @endif>China</option>
                                                                        <option value="Morocco" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'Morocco')  @endif>Morocco</option>
                                                                        <option value="Saudi Arabia" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'Saudi Arabia')  @endif>Saudi Arabia
                                                                        </option>
                                                                        <option value="United Kingdom (UK)" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'United
                                                                            Kingdom
                                                                            (UK)')  @endif>United
                                                                            Kingdom
                                                                            (UK)</option>
                                                                        <option value="United States (US)" @if(Auth::user()->address->country)
                                                                            @selected(Auth::user()->address->country == 'United States (US)')  @endif>United States
                                                                            (US)</option> --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <h6>Address</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="input-item">
                                                                        <div id="addressoneErrorMessage" style="color: red; display: none;">
                                                                        </div>
                                                                        <input type="text" name="address_line1" id="addressone" @if (!empty(Auth::user()->address->address_line1)) value="{{ Auth::user()->address->address_line1 }}" @endif
                                                                        placeholder="Flat, House no., Building, Company, Apartment" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-item">
                                                                        <div id="addresstwoErrorMessage" style="color: red; display: none;">
                                                                        </div>
                                                                        <input type="text" id="addresstwo" name="address_line2" @if (!empty(Auth::user()->address->address_line2)) value="{{ Auth::user()->address->address_line2 }}" @endif
                                                                        placeholder="Area, Street, Sector, Village" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <h6>Town / City</h6>
                                                            <div class="input-item">
                                                                <div id="cityErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" id="city" name="city" @if (!empty(Auth::user()->address->city)) value="{{ Auth::user()->address->city }}" @endif placeholder="City" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <h6>State</h6>
                                                            <div class="input-item">
                                                                <div id="stateErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" id="state" name="state" @if (!empty(Auth::user()->address->state)) value="{{ Auth::user()->address->state }}" @endif placeholder="State" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <h6>Zip</h6>
                                                            <div class="input-item">
                                                                <div id="postalcodeErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" id="postalcode" name="postal_code" @if (!empty(Auth::user()->address->postal_code)) value="{{ Auth::user()->address->postal_code }}" @endif placeholder="Zip" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h6>Landmark</h6>
                                                            <div class="input-item">
                                                                <div id="landmarkErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                                <input type="text" id="landmark" name="landmark" @if (!empty(Auth::user()->address->landmark)) value="{{ Auth::user()->address->landmark }}" @endif
                                                                placeholder="E.g Apollo Hospital" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <h6>Order Notes (optional)</h6>
                                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                                        <textarea name="note" @if (!empty(Auth::user()->address->note)) value="{{ Auth::user()->address->note }}" @endif placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @else
                                        <a href="{{ route('user.login') }}">Please Login</a>
                                        @endif

                                    </div>
                                    <div class="col-md-4">
                                        <div class="shoping-cart-total mt-50">
                                            <h4>Cart Totals</h4>
                                            <table class="table">
                                                @php $total = 0 @endphp
                                                @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                if ($details['product']->offer != null) {
                                                $price = round($details['price'] - $details['price'] * ($details['product']->offer / 100));
                                                } else {
                                                $price = $details['price'];
                                                }
                                                $total += $price * $details['quantity'];
                                                @endphp
                                                @endforeach
                                                <tbody>
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td>₹ {{ $total }}.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping and Handing</td>
                                                        <td>
                                                            <div id="shippingErrorMessage" style="color: red; display: none;">
                                                            </div>
                                                            <select name="shipping_price" id="shipping">
                                                                <option value="">Choose</option>
                                                                @foreach ($shippingDetails as $key => $value)
                                                                <option value="{{ $value->id }}">
                                                                    {{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Vat</td>
                                                        <td>$00.00</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td><strong>Order Total</strong></td>
                                                        <td><strong>₹ {{ $total }}.00</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="btn-wrapper text-right text-end">
                                                @if (Auth::user())
                                                <button type="submit" class="theme-btn-1 btn btn-effect-1">Proceed
                                                    to
                                                    checkout</button>
                                                @else
                                                <a href="{{ route('user.login') }}" class="theme-btn-1 btn btn-effect-1">Proceed
                                                    to
                                                    checkout</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOPING CART AREA END -->

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
                                            <img src="{{ asset('assets/user/img/icons/icon-img/11.png') }}" alt="#" />
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
                                            <img src="{{ asset('assets/user/img/icons/icon-img/12.png') }}" alt="#" />
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
                                            <img src="{{ asset('assets/user/img/icons/icon-img/13.png') }}" alt="#" />
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
                                            <img src="{{ asset('assets/user/img/icons/icon-img/14.png') }}" alt="#" />
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



    <br />

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);
            // alert(ele.parents("tr").find(".quantity").val());
            $.ajax({
                url: '{{ route('update.cart') }}'
                , method: "post"
                , data: {
                    _token: '{{ csrf_token() }}'
                    , id: ele.parents("tr").attr("data-id")
                    , quantity: ele.parents("tr").find(".quantity").val()
                }
                , success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}'
                    , method: "DELETE"
                    , data: {
                        _token: '{{ csrf_token() }}'
                        , id: ele.parents("tr").attr("data-id")
                    }
                    , success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

    @include('layouts.scripts')

    {{-- <script>
        function validatePassword() {
            var firstname = $("#firstname").val();

            var email = $("#email").val();
            var phone = $("#phone").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var postcode = $("#postalcode").val();
            var country = $("#country").val();
            var addressone = $("#addressone").val();
            var addresstwo = $("#addresstwo").val();
            var landmark = $("#landmark").val();


            // alert(firstname);



            // if (firstname === "") {
            //     $("#firstnameErrorMessage").text("firstname required").show();
            //     return false;
            // } else {
            //     $("#firstnameErrorMessage").hide();
            //     return true;
            // }
            if (email === "") {
                $("#emailErrorMessage").text("email required").show();
                return false;
            } else {
                $("#emailErrorMessage").hide();
                return true;
            }
            if (phone === "") {
                $("#phoneErrorMessage").text("phone number required").show();
                return false;
            } else {
                $("#phoneErrorMessage").hide();
                return true;
            }
            if (country === "") {
                $("#countryErrorMessage").text("Please select country").show();
                return false;
            } else {
                $("#countryErrorMessage").hide();
                return true;
            }
            if (city === "") {
                $("#cityErrorMessage").text("city required").show();
                return false;
            } else {
                $("#cityErrorMessage").hide();
                return true;
            }
            if (state === "") {
                $("#stateErrorMessage").text("state required").show();
                return false;
            } else {
                $("#stateErrorMessage").hide();
                return true;
            }
            if (postcode === "") {
                $("#postcodeErrorMessage").text("postal code required").show();
                return false;
            } else {
                $("#postcodeErrorMessage").hide();
                return true;
            }
            if (landmark === "") {
                $("#landmarkErrorMessage").text("please enter landmark").show();
                return false;
            } else {
                $("#landmarkErrorMessage").hide();
                return true;
            }
            if (addressone === "") {
                $("#addressoneErrorMessage").text("please enter address 1").show();
                return false;
            } else {
                $("#addressoneErrorMessage").hide();
                return true;
            }
            if (addresstwo === "") {
                $("#addresstwoErrorMessage").text("please enter address 2").show();
                return false;
            } else {
                $("#addresstwoErrorMessage").hide();
                return true;
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
    </script> --}}

    <script>
        function validateForm() {
            var fields = [{
                    id: "firstname"
                    , errorMessage: "required"
                }
                , {
                    id: "email"
                    , errorMessage: "required"
                }
                , {
                    id: "phone"
                    , errorMessage: "required"
                }
                , {
                    id: "city"
                    , errorMessage: "required"
                }
                , {
                    id: "state"
                    , errorMessage: "required"
                }
                , {
                    id: "postalcode"
                    , errorMessage: "required"
                }
                , {
                    id: "country"
                    , errorMessage: "required"
                }
                , {
                    id: "addressone"
                    , errorMessage: "required"
                }
                , {
                    id: "addresstwo"
                    , errorMessage: "required"
                }
                , {
                    id: "landmark"
                    , errorMessage: "required"
                }
                , {
                    id: "shipping"
                    , errorMessage: "required"
                }
                // Add more fields here if needed
            ];

            var hasErrors = false;

            fields.forEach(function(field) {
                var value = $("#" + field.id).val();
                if ($.trim(value) === "") {
                    $("#" + field.id + "ErrorMessage").text(field.errorMessage).show();
                    hasErrors = true;
                } else {
                    $("#" + field.id + "ErrorMessage").hide();
                }

                if (field.id === "phone") {
                    if (!/^\d{10}$/.test(value)) {
                        $("#" + field.id + "ErrorMessage").text("Please enter a valid 10-digit phone number.").show();
                        hasErrors = true;
                    }
                }
            });

            return !hasErrors;
        }

        $(document).ready(function() {
            $("form#needs-validation").submit(function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                } else {
                    $(".theme-btn-1").prop("disabled", true);
                    $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
                }
            });
        });

    </script>




</body>

</html>
