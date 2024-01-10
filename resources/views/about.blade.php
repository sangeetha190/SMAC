<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | About</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-5) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->


        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
            data-bg="{{asset('assets/user/img/bg/5.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <!-- <h6 class="section-subtitle ltn__secondary-color">
                    // Welcome to our company
                  </h6> -->
                                <h1 class="section-title white-color">About Us</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>About Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- ABOUT US AREA START -->
        <div class="ltn__about-us-area pt-120--- pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="about-us-img-wrap about-img-left">
                            <img src="{{asset('assets/user/img/slider/about-img.jpg')}}" alt="About Us Image" />
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="about-us-info-wrap">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">
                                    Know More About Shop
                                </h6>
                                <h1 class="section-title">
                                    Trusted Organic <br class="d-none d-md-block" />
                                    Herbal Cosmetics
                                </h1>
                               
                            </div>
                            <p>
                            Welcome to SMAC, your trusted source for premium herbal cosmetics and natural beauty products. We're more than just an online store; we're your partners on the journey to healthier, more radiant skin.

our mission is to promote natural beauty through the power of herbal cosmetics. We believe in harnessing the incredible benefits of nature to enhance your skincare routine.

We take quality seriously. Every product in our collection is carefully chosen for its purity and effectiveness. Rest assured, you're receiving the best of the best.
                            </p>
                            <div class="about-author-info d-flex">
                                <div class="author-name-designation align-self-center">
                                    <h4 class="mb-0">Jerry Henson</h4>
                                    <small>/ Shop Director</small>
                                </div>
                                <div class="author-sign">
                                    <img src="{{asset('assets/user/img/icons/icon-img/author-sign.png')}}" alt="#" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT US AREA END -->

        <!-- FEATURE AREA START ( Feature - 6) -->
        <div class="ltn__feature-area section-bg-1 pt-115 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h6 class="section-subtitle ltn__secondary-color">
                                // features //
                            </h6>
                            <h1 class="section-title">Why Choose Us<span>.</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-7">
                            <div class="ltn__feature-icon-title">
                                <div class="ltn__feature-icon">
                                    <span><img src="{{asset('assets/user/img/icons/icon-img/21.png')}}" alt="#" /></span>
                                </div>
                                <h3><a href="">Natural Elegance:</a></h3>
                            </div>
                            <div class="ltn__feature-info">
                                <p>
                                We source only the finest botanical ingredients to create our herbal cosmetics. You can trust that every product you choose is packed with the pure goodness of nature, free from harmful chemicals. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-7">
                            <div class="ltn__feature-icon-title">
                                <div class="ltn__feature-icon">
                                    <span><img src="{{asset('assets/user/img/icons/icon-img/22.png')}}" alt="#" /></span>
                                </div>
                                <h3><a href="">Handcrafted Excellence:</a></h3>
                            </div>
                            <div class="ltn__feature-info">
                                <p>
                                Each product in our collection is handmade with precision and care. Our dedication to quality shines through in every jar and bottle, ensuring you receive the highest level of excellence in herbal skincare.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-7">
                            <div class="ltn__feature-icon-title">
                                <div class="ltn__feature-icon">
                                    <span><img src="{{asset('assets/user/img/icons/icon-img/23.png')}}" alt="#" /></span>
                                </div>
                                <h3>
                                    <a href="">Customer-Centric Approach:</a>
                                </h3>
                            </div>
                            <div class="ltn__feature-info">
                                <p>
                                Your satisfaction is at the heart of everything we do. We're not just a retailer; we're your skincare partner. Our customer-centric approach means you'll always receive the best in terms of product quality. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->

       

        <!-- CALL TO ACTION START (call-to-action-5) -->
        <div class="call-to-action-area call-to-action-5 bg-image bg-overlay-theme-90 pt-40 pb-25 d-none"
            data-bg="{{asset('assets/user/img/bg/13.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="call-to-action-inner call-to-action-inner-5 text-center">
                            <h2 class="white-color text-decoration">
                                24/7 Availability, Make
                                <a href="contact.html">An Appointment</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CALL TO ACTION END -->

        <!-- PROGRESS BAR AREA START -->
        <div class="ltn__progress-bar-area before-bg-right pt-115 pb-95 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ltn__progress-bar-wrap">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">
                                    // skills
                                </h6>
                                <h1 class="section-title">
                                    We Have A Skillest Team Ever<span>.</span>
                                </h1>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore
                                </p>
                            </div>
                            <div class="ltn__progress-bar-inner">
                                <div class="ltn__progress-bar-item">
                                    <p>Car Repair</p>
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s"
                                            data-wow-delay=".5s" role="progressbar" style="width: 72%">
                                            <span>72%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ltn__progress-bar-item">
                                    <p>Car Rental Service</p>
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s"
                                            data-wow-delay=".5s" role="progressbar" style="width: 74%">
                                            <span>74%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ltn__progress-bar-item">
                                    <p>Car Cleaning & Parts</p>
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s"
                                            data-wow-delay=".5s" role="progressbar" style="width: 81%">
                                            <span>81%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50-- bg-image ml-30"
                            data-bg="{{asset('assets/user/img/others/5.jpg')}}">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---"
                                href="https://www.youtube.com/embed/eWUxqVFBq74?autoplay=1&amp;showinfo=0"
                                data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PROGRESS BAR AREA END -->

        <!-- TESTIMONIAL AREA START (testimonial-4) -->
        <div class="ltn__testimonial-area section-bg-1 pt-115 pb-70">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h6 class="section-subtitle ltn__secondary-color">
                                // Testimonials
                            </h6>
                            <h1 class="section-title">Clients Feedbacks<span>.</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-4">
                            <div class="ltn__testimoni-img">
                                <img src="{{asset('assets/user/img/testimonial/6.jpg')}}" alt="#" />
                            </div>
                            <div class="ltn__testimoni-info">
                                <p>
                                "I'm amazed by the results! Your herbal cosmetics have transformed my skin. It feels healthier and looks more radiant. 
                                </p>
                                <h4>Mary L.</h4>
                                <h6>Founder</h6>
                            </div>
                            <div class="ltn__testimoni-bg-icon">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-4">
                            <div class="ltn__testimoni-img">
                                <img src="{{asset('assets/user/img/testimonial/7.jpg')}}" alt="#" />
                            </div>
                            <div class="ltn__testimoni-info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi sicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <h4>
David S.</h4>
                                <h6>Founder</h6>
                            </div>
                            <div class="ltn__testimoni-bg-icon">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-4">
                            <div class="ltn__testimoni-img">
                                <img src="{{asset('assets/user/img/testimonial/1.jpg')}}" alt="#" />
                            </div>
                            <div class="ltn__testimoni-info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi sicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <h4>Rosalina D. William</h4>
                                <h6>Founder</h6>
                            </div>
                            <div class="ltn__testimoni-bg-icon">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-4">
                            <div class="ltn__testimoni-img">
                                <img src="{{asset('assets/user/img/testimonial/2.jpg')}}" alt="#" />
                            </div>
                            <div class="ltn__testimoni-info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi sicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <h4>Rosalina D. William</h4>
                                <h6>Founder</h6>
                            </div>
                            <div class="ltn__testimoni-bg-icon">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__testimonial-item ltn__testimonial-item-4">
                            <div class="ltn__testimoni-img">
                                <img src="{{asset('assets/user/img/testimonial/5.jpg')}}" alt="#" />
                            </div>
                            <div class="ltn__testimoni-info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipi sicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <h4>Rosalina D. William</h4>
                                <h6>Founder</h6>
                            </div>
                            <div class="ltn__testimoni-bg-icon">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL AREA END -->

        <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
        {{-- <div class="ltn__faq-area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h1 class="section-title white-color---">Some Questions</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ltn__faq-inner ltn__faq-inner-2">
                            <div id="accordion_2">
                                <!-- card -->
                                <div class="card">
                                    <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-1" aria-expanded="false">
                                        How to buy a product?
                                    </h6>
                                    <div id="faq-item-2-1" class="collapse" data-parent="#accordion_2">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Scelerisque eleifend donec
                                                pretium vulputate sapien nec sagittis. Proin libero
                                                nunc consequat interdum. Condimentum lacinia quis vel
                                                eros donec ac.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h6 class="ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-2" aria-expanded="true">
                                        How can i make refund from your website?
                                    </h6>
                                    <div id="faq-item-2-2" class="collapse show" data-parent="#accordion_2">
                                        <div class="card-body">
                                            <div class="ltn__video-img alignleft">
                                                <img src="{{asset('assets/user/img/bg/17.jpg')}}" alt="video popup bg image" />
                                                <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----"
                                                    href="https://www.youtube.com/embed/LjCzPp-MK48?autoplay=1&amp;showinfo=0"
                                                    data-rel="lightcase:myCollection">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Scelerisque
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-3" aria-expanded="false">
                                        I am a new user. How should I start?
                                    </h6>
                                    <div id="faq-item-2-3" class="collapse" data-parent="#accordion_2">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Scelerisque eleifend donec
                                                pretium vulputate sapien nec sagittis. Proin libero
                                                nunc consequat interdum. Condimentum lacinia quis vel
                                                eros donec ac.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-4" aria-expanded="false">
                                        Returns and refunds
                                    </h6>
                                    <div id="faq-item-2-4" class="collapse" data-parent="#accordion_2">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Scelerisque eleifend donec
                                                pretium vulputate sapien nec sagittis. Proin libero
                                                nunc consequat interdum. Condimentum lacinia quis vel
                                                eros donec ac.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-5" aria-expanded="false">
                                        Are my details secured?
                                    </h6>
                                    <div id="faq-item-2-5" class="collapse" data-parent="#accordion_2">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Scelerisque eleifend donec
                                                pretium vulputate sapien nec sagittis. Proin libero
                                                nunc consequat interdum. Condimentum lacinia quis vel
                                                eros donec ac. Mauris sit amet massa vitae tortor.
                                                Quisque id diam vel quam elementum pulvinar. Gravida
                                                in fermentum et sollicitudin ac orci phasellus.
                                                Facilisis gravida neque convallis a cras semper. Non
                                                arcu risus quis varius quam quisque id.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <aside class="sidebar-area ltn__right-sidebar mt-60">
                            <!-- Banner Widget -->
                            <div class="widget ltn__banner-widget">
                                <a href="shop.html"><img src="{{asset('assets/user/img/bg/12.png')}}" alt="Banner Image" /></a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- FAQ AREA START -->

        <!-- NEWSLETTER AREA START -->
        <div class="ltn__newsletter-area section-bg-1 bg-overlay-black-90 pt-110 pb-90 bg-image"
            data-bg="{{asset('assets/user/img/bg/2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="ltn__newsletter-inner text-center">
                            <h1 class="white-color">We make your inbox better</h1>
                            <p class="white-color">
                                Sign up to our newsletter to receive grooming tips, style
                                inspiration, <br />
                                exclusive access to pre-launch product pricing and more.
                            </p>
                            {{-- <form action="#" class="ltn__form-box">
                                <input type="email" name="email" placeholder="Email*" />
                                <div class="btn-wrapper">
                                    <button class="theme-btn-1 btn btn-effect-1 text-uppercase" type="submit">
                                        Subscribe
                                    </button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- NEWSLETTER AREA END -->

        <!-- BLOG AREA START (blog-3) -->
        {{-- <div class="ltn__blog-area pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h1 class="section-title white-color---">Leatest Blog</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="{{asset('assets/user/img/blog/1.jpg')}}" alt="#" /></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title">
                                    <a href="blog-details.html">Common Engine Oil Problems and Solutions</a>
                                </h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>June 24, 2020
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="{{asset('assets/user/img/blog/2.jpg')}}" alt="#" /></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title">
                                    <a href="blog-details.html">How and when to replace brake rotors</a>
                                </h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>July 23, 2020
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="{{asset('assets/user/img/blog/3.jpg')}}" alt="#" /></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title">
                                    <a href="blog-details.html">Elenance, Servicing & Repairs</a>
                                </h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>August 22, 2020
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="{{asset('assets/user/img/blog/4.jpg')}}" alt="#" /></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title">
                                    <a href="blog-details.html">He for your First Track Day!</a>
                                </h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>June 24, 2020
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="{{asset('assets/user/img/blog/5.jpg')}}" alt="#" /></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title">
                                    <a href="blog-details.html">How te Your Tires Last Longer</a>
                                </h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>June 24, 2020
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div> --}}
        <!-- BLOG AREA END -->

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
                                            <img src="{{asset('assets/user/img/icons/icon-img/11.png')}}" alt="#" />
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
                                            <img src="{{asset('assets/user/img/icons/icon-img/12.png')}}" alt="#" />
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
                                            <img src="{{asset('assets/user/img/icons/icon-img/13.png')}}" alt="#" />
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
                                            <img src="{{asset('assets/user/img/icons/icon-img/14.png')}}" alt="#" />
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
</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:44:49 GMT -->

</html>
