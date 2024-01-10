

<header class="ltn__header-area ltn__header-5 ltn__header-transparent-- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="#"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                            <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                {{-- <li>
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                <ul>
                                                    <li><a href="#">Arabic</a></li>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Hindi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white sticky-active-into-mobile ltn__logo-right-menu-option plr--9---">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                        <a href="{{route('index')}}"><img src="{{asset('assets/user/img/logo.png')}}" alt="Logo" /></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column menu-color-white---">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                <li><a href="{{ route('index') }}">HOME</a></li>
                                    <li><a href="{{ route('about') }}">ABOUT</a></li>
                                    <li><a href="{{ route('shop') }}">SHOP</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('contact') }}">CONTACT</a></li>
                                    
                                    <li class="special-link"><a href="{{route('contact')}}">GET A QUOTE</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    <div class="header-search-wrap">
                        <div class="header-search-1">
                            <div class="search-icon">
                                <i class="icon-search for-search-show"></i>
                                <i class="icon-cancel  for-search-close"></i>
                            </div>
                        </div>
                        <div class="header-search-1-form">
                            <form id="#" method="get" action="{{route('product.search')}}">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                @guest
                                            <li><a href="{{ route('user.login') }}">Sign in</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                            @else
                                            @if (Auth::user()->type == 'admin')
                                            <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>
                                            @else
                                            <li><a href="{{ route('my.account') }}">My Account</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                            @endif
                                            @endguest

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- mini-cart -->
                   
                    <div class="mini-cart-icon">
                                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                                
                                                    <i class="icon-shopping-cart"></i>
                                                    <sup>{{ collect((array) session('cart'))->sum('quantity') }}</sup>
                                            
                                                <!-- <h6><span>Your Cart</span> <span class="ltn__secondary-color">$89.25</span></h6> -->
                                            </a>
                     </div>
                    <!-- mini-cart -->
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>

<!-- Utilize Cart Menu Start -->
<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">
            @if (session('cart'))
            @foreach (session('cart') as $id => $details)
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('storage/' . $details['image']) }}" alt="Image"></a>
                    <span class="mini-cart-item-delete"><a href="{{ route('remove.cart', $details['product']->id) }}"><i class="icon-cancel"></i></a></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">{{ $details['name'] }}</a></h6>
                    <span class="mini-cart-quantity">{{ $details['quantity'] }} x ₹
                        @if ($details['product']->offer != null)
                        {{ round($details['price'] - $details['price'] * ($details['product']->offer / 100)) }}.00
                        @else
                        {{ $details['price'] }}
                        @endif
                    </span>
                </div>
            </div>
            @endforeach
            @endif
            {{-- <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('assets/user/img/product/logo (2).jpg') }}"
            alt="Image"></a>
            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
        </div>
        <div class="mini-cart-info">
            <h6><a href="#">Vegetables Juices</a></h6>
            <span class="mini-cart-quantity">1 x $85.00</span>
        </div>
    </div>
    <div class="mini-cart-item clearfix">
        <div class="mini-cart-img">
            <a href="#"><img src="{{ asset('assets/user/img/product/logo (3).jpg') }}" alt="Image"></a>
            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
        </div>
        <div class="mini-cart-info">
            <h6><a href="#">Orange Sliced Mix</a></h6>
            <span class="mini-cart-quantity">1 x $92.00</span>
        </div>
    </div>
    <div class="mini-cart-item clearfix">
        <div class="mini-cart-img">
            <a href="#"><img src="{{ asset('assets/user/img/product/logo (4).jpg') }}" alt="Image"></a>
            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
        </div>
        <div class="mini-cart-info">
            <h6><a href="#">Orange Fresh Juice</a></h6>
            <span class="mini-cart-quantity">1 x $68.00</span>
        </div>
    </div> --}}
</div>
<div class="mini-cart-footer">
    <div class="mini-cart-sub-total">
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
        <h5>Subtotal: <span>₹ {{ $total }}.00</span></h5>
    </div>
    <div class="btn-wrapper">
        <a href="{{ route('cart') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
        {{-- <a href="{{ route('checkout') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a> --}}
    </div>
    {{-- <p>Free Shipping on All Orders Over $100!</p> --}}
</div>

</div>
</div>
<!-- Utilize Cart Menu End -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="index.html"><img src="{{ asset('assets/user/img/logo.png') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu-search-form">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ route('index') }}">Home</a>
                    {{-- <ul class="sub-menu">
                        <li><a href="index.html">Home Pages 01</a></li>
                        <li><a href="index-2.html">Home Pages 02</a></li>
                        <li><a href="index-3.html">Home Pages 03</a></li>
                        <li><a href="index-4.html">Home Pages 04</a></li>
                        <li><a href="index-5.html">Home Pages 05 <span class="menu-item-badge">video</span></a></li>
                        <li><a href="index-6.html">Home Pages 06</a></li>
                        <li><a href="index-7.html">Home Pages 07</a></li>
                        <li><a href="index-8.html">Home Pages 08</a></li>
                        <li><a href="index-9.html">Home Pages 09</a></li>
                        <li><a href="index-10.html">Home Pages 10</a></li>
                        <li><a href="index-11.html">Home Pages 11 <span class="menu-item-badge">Service</span></a>
                        </li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('about') }}">About</a>
                    {{-- <ul class="sub-menu">
                        <li><a href="about.html">About</a></li>
                        <li><a href="service.html">Services</a></li>
                        <li><a href="service-details.html">Service Details</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="team-details.html">Team Details</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="locations.html">Google Map Locations</a></li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('shop') }}">Shop</a>
                    {{-- <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-grid.html">Shop Grid</a></li>
                        <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                        <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                        <li><a href="product-details.html">Shop details </a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="order-tracking.html">Order Tracking</a></li>
                        <li><a href="account.html">My Account</a></li>
                        <li><a href="login.html">Sign in</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul> --}}
                </li>
                <li><a href="#">News</a>
                    {{-- <ul class="sub-menu">
                        <li><a href="blog.html">News</a></li>
                        <li><a href="blog-grid.html">News Grid</a></li>
                        <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                        <li><a href="blog-details.html">News details</a></li>
                    </ul> --}}
                </li>
                <li><a href="#">Pages</a>
                    {{-- <ul class="sub-menu">
                        <li><a href="about.html">About</a></li>
                        <li><a href="service.html">Services</a></li>
                        <li><a href="service-details.html">Service Details</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="team-details.html">Team Details</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="history.html">History</a></li>
                        <li><a href="contact.html">Appointment</a></li>
                        <li><a href="locations.html">Google Map Locations</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="{{ route('my.account') }}" title="My Account">
                        <span class="utilize-btn-icon">
                            <i class="far fa-user"></i>
                        </span>
                        My Account
                    </a>
                </li>
                <li>
                    <a href="{{ route('wishlist') }}" title="Wishlist">
                        <span class="utilize-btn-icon">
                            <i class="far fa-heart"></i>
                            <sup>3</sup>
                        </span>
                        Wishlist
                    </a>
                </li>
                <li>
                    {{-- @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach --}}
                    <a href="{{ route('cart') }}" title="Shoping Cart">
                        <span class="utilize-btn-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <sup>5</sup>
                        </span>
                        Shoping Cart
                    </a>
                </li>
            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay">

</div>


<div class="mobile-header-menu-fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Mobile Menu Button -->
                <div class="mobile-menu-toggle d-lg-none">
                    <span>MENU</span>
                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                        <svg viewBox="0 0 800 600">
                            <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                            <path d="M300,320 L540,320" id="middle"></path>
                            <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ltn__utilize-overlay"></div>