<!-- MODAL AREA START (Add To Cart Modal) -->
@if (session('success'))
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        {{-- <div class="modal fade show" id="add_to_cart_modal" tabindex="-1" aria-modal="true" role="dialog"
        style="display: block;"> --}}
        <div class="modal fade " id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 22px 25px;">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            {{-- <img src="{{ asset('assets/user/img/success.png') }}" alt="#" /> --}}
                                            <p class="added-cart">
                                                <i class="fa fa-check-circle" style="font-size: 70px"></i>
                                            </p>
                                        </div>
                                        <div class="modal-product-info">
                                            <h5>
                                                <a href="product-details.html">Congrates !</a>
                                            </h5>
                                            <p class="added-cart">
                                                <i class="fa fa-check-circle"></i> {{ Session::get('success') }}
                                            </p>
                                            {{-- <div class="btn-wrapper">
                                            <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View
                                                Cart</a>
                                            <a href="checkout.html"
                                                class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                        </div> --}}
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>
                                                We want to give you <b>10% discount</b> for your
                                                first order, <br />
                                                Use discount code at checkout
                                            </p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif




@if (session('error'))
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        {{-- <div class="modal fade show" id="add_to_cart_modal" tabindex="-1" aria-modal="true" role="dialog"
        style="display: block;"> --}}
        <div class="modal fade " id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 22px 25px;">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="{{ asset('assets/user/img/error.png') }}" alt="#" width="53px"/>
                                        </div>
                                        <div class="modal-product-info">
                                            <h5>
                                                <a href="product-details.html">Sorry</a>
                                            </h5>
                                            <p class="added-cart m-0">
                                                <i class="fa fa-check-circle"></i> {{ Session::get('error') }}
                                            </p>
                                            {{-- <div class="btn-wrapper">
                                            <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View
                                                Cart</a>
                                            <a href="checkout.html"
                                                class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                        </div> --}}
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>
                                                We want to give you <b>10% discount</b> for your
                                                first order, <br />
                                                Use discount code at checkout
                                            </p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('add_to_cart'))
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        {{-- <div class="modal fade show" id="add_to_cart_modal" tabindex="-1" aria-modal="true" role="dialog"
        style="display: block;"> --}}
        <div class="modal fade " id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            {{-- <img src="{{ asset('assets/user/img/success.png') }}" alt="#" /> --}}

                                            <p class="added-cart">
                                                <i class="fa fa-check-circle" style="font-size: 70px"></i>
                                            </p>
                                        </div>
                                        <div class="modal-product-info">
                                            <h5 style="margin-bottom: 2px">
                                                <a href="product-details.html">Good job!</a>
                                            </h5>
                                            <p class="added-cart m-0">
                                                <i class="fa fa-check-circle"></i> {{ Session::get('add_to_cart') }}
                                            </p>
                                            <div class="btn-wrapper mt-2">
                                            <a href="{{route('cart')}}" class="theme-btn-1 btn btn-effect-1">View
                                                Cart</a>
                                            {{-- <a href="checkout.html"
                                                class="theme-btn-2 btn btn-effect-2">Checkout</a> --}}
                                        </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>
                                                We want to give you <b>10% discount</b> for your
                                                first order, <br />
                                                Use discount code at checkout
                                            </p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- MODAL AREA END -->



<!-- FOOTER AREA START -->
<footer class="ltn__footer-area">
    <div class="footer-top-area section-bg-2 plr--5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">INFORMATION</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('shop') }}">All Products</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                <li>
                                    <a href="{{ route('terms.conditions') }}">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">CUSTOMER SERVICES</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                                {{-- <li><a href="3">Promotional Offers</a></li> --}}
                                {{-- <li>
                    <a href="#">Returns & Refunds</a>
                  </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">QUICK SHOP</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('user.login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Create an Account</a></li>
                                @if (Auth::user())
                                    <li><a href="{{ route('my.account') }}">My Account</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wish List</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Address Starts-->
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <h4 class="footer-title">CONTACT US</h4>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>No:16,3rd Cross,Anna Nagar,Pondicherry-605005</p>
                                        <p>No:174,1st Floor,Nehruji Road,Villupuram-605602</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:+0123-456789">91+ 96290 3899</a></p>
                                        <p><a href="tel:+0123-456789">91+ 123456789</a></p>
                                        
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>
                                            <a href="mailto:example@example.com">example@example.com</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="ltn__social-media mt-20">
                            <h6 class="footer-title">STAY CONNECTED</h6>
                            <ul>
                                <li>
                                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Address Ends-->
            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-2 ltn__border-top-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="ltn__copyright-design clearfix">
                        <p>
                            All Rights Reserved @ SMAC
                            <span class="current-year"></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-right text-end">
                        <ul>
                            <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                            {{-- <li><a href="#">Claim</a></li> --}}
                            <li><a href="{{ route('privacy.policy') }}">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER AREA END -->
