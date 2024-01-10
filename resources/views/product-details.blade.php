<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Product Details</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
    
</head>

<body>
    <!-- Add your site or application content here -->

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
                                <h1 class="section-title white-color">Product Details</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Product Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- SHOP DETAILS AREA START -->
        <div class="ltn__shop-details-area pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="ltn__shop-details-inner mb-60">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="ltn__shop-details-img-gallery">
                                        <div class="ltn__shop-details-large-img">
                                            <div class="single-large-img">
                                                <a href=" {{ asset('storage/' . $productDetails->image) }}" >
                                                    <img src="{{ asset('storage/' . $productDetails->image) }}" alt="Image" />
                                                </a>
                                            </div>
                                           @foreach ($productDetails->productImages as $key => $test)
                                            <div class="single-large-img">
                                                <a href="{{ asset('storage/' . $test->image_path) }}">
                                                    <img src="{{ asset('storage/' . $test->image_path) }}" alt="Image" />
                                                </a>
                                            </div>
                                            @endforeach 
                                        </div>
                                        <div class="ltn__shop-details-small-img slick-arrow-2">
                                            <div class="single-small-img">
                                                <img src="{{ asset('storage/' . $productDetails->image) }}" alt="Image" />
                                            </div>
                                            @foreach ($productDetails->productImages as $key => $test)
                                            <div class="single-small-img">
                                                <img src="{{ asset('storage/' . $test->image_path) }}" alt="Image" />
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-product-info shop-details-info pl-0">
                                        <div class="product-ratting">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                                <li class="review-total">
                                                    <a href="#"> ( {{count($productDetails->reviews)}} Reviews )</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3>{{ $productDetails->product_name }}</h3>
                                        <div class="product-price">
                                            @if ($productDetails->offer != null)
                                            <span>₹{{ round($productDetails->price - $productDetails->price * ($productDetails->offer / 100)) }}.00</span>
                                            <del>₹{{ $productDetails->price }}</del>
                                            @else
                                            <span>₹{{ $productDetails->price }}</span>
                                            @endif
                                        </div>
                                         {{-- <div class="modal-product-meta ltn__product-details-menu-1">
                                            <ul>
                                                <li>
                                                    <strong>Alignments:</strong>
                                                    <span>
                                                        @foreach($productDetails->productAlignments as $key => $Alignment)
                                                        <a href="#">{{$Alignment->name}}</a>
                                                        @endforeach

                                                    </span>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <div class="ltn__product-details-menu-2">
                                            <form action="{{ route('add.cart') }}" method="post">
                                                @csrf
                                                <ul>
                                                    <li>
                                                        <input type="hidden" name='product_id' value="{{ $productDetails->id }}">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1" name="qty" class="cart-plus-minus-box" />

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button type="submit" class="theme-btn-2 btn btn-effect-1" title="Add to Cart">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                        {{-- <div class="ltn__product-details-menu-3">
                                            <ul>
                                                <li>
                                                    <a href="#" class="" title="Wishlist"
                                                        data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                        <i class="far fa-heart"></i>
                                                        <span>Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="" title="Compare"
                                                        data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                        <i class="fas fa-exchange-alt"></i>
                                                        <span>Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <hr />
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li>Share:</li>
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
                                                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="ltn__safe-checkout">
                                            <h5>Guaranteed Safe Checkout</h5>
                                            <img src="{{ asset('assets/user/img/icons/payment-2.png') }}" alt="Payment Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Tab Start -->
                        <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                            <div class="ltn__shop-details-tab-menu">
                                <div class="nav">
                                    <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                                    <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                                    <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">Shipping & Returns</a>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                    <div class="ltn__shop-details-tab-content-inner">
                                        <h4 class="title-2"></h4>
                                        <p>
                                            {{ $productDetails->short_info }}
                                        </p>
                                        <p>
                                            {!! $productDetails->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_details_1_2">
                                    <div class="ltn__shop-details-tab-content-inner">
                                        <h4 class="title-2">Customer Reviews</h4>
                                        <div class="product-ratting">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                                <li class="review-total">
                                                    <a href="#"> ( {{count($productDetails->reviews)}} Reviews )</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <!-- comment-area -->
                                        <div class="ltn__comment-area mb-30">
                                            <div class="ltn__comment-inner">
                                                <ul>
                                                    @foreach ($reviews as $key => $value)
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="{{ asset('assets/user/img/avatar.jpg') }}" alt="Image" />
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">{{ $value->user->first_name }}
                                                                        {{ $value->user->last_name }}</a></h6>
                                                                <div class="product-ratting">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="far fa-star"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <p>
                                                                    {{ $value->content }}
                                                                </p>
                                                                <span class="ltn__comment-reply-btn">{{ \Carbon\Carbon::parse($value->created_at)->format('F j, Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- comment-reply -->
                                        @if (Auth::user())
                                        <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                            <form action="{{ route('store.review') }}" method="post">
                                                @csrf
                                                <h4 class="title-2">Add a Review</h4>
                                                <div class="mb-30">
                                                    <div class="add-a-review">
                                                        <h6>Your Ratings:</h6>
                                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li>
                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="far fa-star"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <textarea required placeholder="Type your comments...." name="content"></textarea>
                                                </div>
                                                {{-- <div class="input-item input-item-name ltn__custom-icon">
                                                        <input type="text" placeholder="Type your name...." />
                                                    </div>
                                                    <div class="input-item input-item-email ltn__custom-icon">
                                                        <input type="email" placeholder="Type your email...." />
                                                    </div>
                                                    <div class="input-item input-item-website ltn__custom-icon">
                                                        <input type="text" name="website"
                                                            placeholder="Type your website...." />
                                                    </div>
                                                    <label class="mb-0"><input type="checkbox" name="agree" />
                                                        Save
                                                        my
                                                        name, email, and website in this browser for the
                                                        next time I comment.
                                                    </label> --}}
                                                <div class="btn-wrapper">
                                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <a href="{{ route('user.login') }}">Please click go to LOGIN</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_details_1_3">
                                    <div class="ltn__shop-details-tab-content-inner">
                                        {{-- <h4 class="title-2">Customer Reviews</h4> --}}
                                        <h6>Please check our <a href="{{route('return.refund')}}" style="color:orange; text-decoration:underline;" target="_blank">Returns & Refund Policy</a></h6>
                                        <h6>Please check our <a href="{{route('shipping.delivery')}}" style="color:orange; text-decoration:underline;" target="_blank">Shippling & Delivery Method</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Tab End -->
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                            <!-- Top Rated Product Widget -->
                            <div class="widget ltn__top-rated-product-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Top Rated Product
                                </h4>
                                <ul>
                                    @foreach ($topRatedProducts->sortByDesc('view_count') as $key => $value)
                                    <li>
                                        <div class="top-rated-product-item clearfix">
                                            <div class="top-rated-product-img">
                                                <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img src="{{ asset('storage/' . $value->image) }}" alt="#" /></a>
                                            </div>
                                            <div class="top-rated-product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h6>
                                                    <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{ $value->product_name }}</a>
                                                </h6>
                                                <div class="product-price">
                                                    @if ($value->offer != null)
                                                    <span>₹{{ round($value->price - $value->price * ($value->offer / 100)) }}.00</span>
                                                    <del>₹{{ $value->price }}</del>
                                                    @else
                                                    <span>₹{{ $value->price }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Banner Widget -->
                            {{-- <div class="widget ltn__banner-widget">
                                <a href="shop.html"><img src="{{ asset('assets/user/img/banner/2.jpg') }}"
                            alt="#" /></a>
                    </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//
                            {{ $productDetails->productCategory->name }}
                        </h6>
                        <h1 class="section-title">Related Products<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-one-active slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach ($productDetails->productCategory->products as $key => $value)
                @if ($productDetails->id != $value->id)
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="{{ route('product.details',['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img src="{{ asset('storage/' . $value->image) }}" alt="image" /></a>
                            @if ($value->offer != null)
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">{{ $value->offer }}%</li>
                                </ul>
                            </div>
                            @endif
                            <div class="product-hover-action">
                                <ul>
                                    {{-- <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('add.to.cart', $value->id) }}" title="Add to Cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    @if (Auth::user())
                                    <li>
                                        <a href="{{ route('add.to.wishlist', $value->id) }}" title="Wishlist">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-star"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="product-title">
                                <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{ $value->product_name }}</a>
                            </h2>
                            <div class="product-price">
                                @if ($value->offer != null)
                                <span>₹{{ round($value->price - $value->price * ($value->offer / 100)) }}.00</span>
                                <del>₹{{ $value->price }}</del>
                                @else
                                <span>₹{{ $value->price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach


            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    {{-- <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
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
    </div> --}}
    <!-- FEATURE AREA END -->

    <!-- FOOTER AREA START -->
    @include('layouts.footer')
    <!-- FOOTER AREA END -->

    <!-- MODAL AREA START (Quick View Modal) -->
    @include('layouts.models')
    <!-- MODAL AREA END -->
    </div>
    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    @include('layouts.scripts')
    <script>
        $(document).ready(function() {
            $('form').on('submit', function() {
                $(".theme-btn-1").prop("disabled", true);
                $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');

                $(".theme-btn-2").prop("disabled", true);
                $(".theme-btn-2").html('<i class="fa fa-spinner fa-spin"></i> Adding...');
            });
        });
    </script>
</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:44:59 GMT -->

</html>