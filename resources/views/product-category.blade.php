<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Shop-Category</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- HEADER AREA START (header-5) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
            data-bg="{{ asset('assets/user/img/bg/5.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <!-- <h6 class="section-subtitle ltn__secondary-color">
               // Welcome to our company
             </h6> -->
                                <h1 class="section-title white-color">Shop | {{ $category->name }}</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li>Shop</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- PRODUCT DETAILS AREA START -->
        <div class="ltn__product-area ltn__product-gutter mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ltn__shop-options">
                            <ul>
                                <li>
                                    <div class="ltn__grid-list-tab-menu">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i
                                                    class="fas fa-th-large"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_product_list"><i
                                                    class="fas fa-list"></i></a>
                                        </div>
                                    </div>
                                </li>

                                {{ $allProducts->links('vendor.pagination.show-count') }}
                                {{-- <li>
                                    <div class="showing-product-number text-right text-end">
                                        <span>Showing 1–12 of 18 results</span>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="short-by text-center">
                                        <select id="sort-selector">
                                            <option>Default Sorting</option>
                                            <option value="price-low-to-high" @selected($sort == 'price-low-to-high')>Sort by
                                                price: low to
                                                high</option>
                                            <option value="price-high-to-low" @selected($sort == 'price-high-to-low')> Sort by
                                                price: high
                                                to
                                                low</option>

                                            <option value="newest" @selected($sort == 'newest')>Sort by new arrivals
                                            </option>
                                            <option value="popular" @selected($sort == 'popular')>Sort by popularity
                                            </option>
                                        </select>

                                        {{-- <a href="{{ URL::current() . '?sort=popular' }}">Sort by popularity</a>
                                        <a href="{{ URL::current() . '?sort=newest' }}">Sort by new arrivals</a>
                                        <a href="{{ URL::current() . '?sort=price-low-to-high' }}">Sort by price: low to
                                            high</a>
                                        <a href="{{ URL::current() . '?sort=price-high-to-low' }}">Sort by price: high
                                            to
                                            low</a> --}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_product_grid">
                                <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                    <div class="row">

                                        <!-- ltn__product-item -->
                                        {{-- @if (empty($allProducts)) --}}
                                        @foreach ($allProducts as $key => $value)
                                            <div class="col-xl-4 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img
                                                                src="{{ asset('storage/' . $value->image) }}"
                                                                alt="#" /></a>
                                                        @if ($value->offer != null)
                                                            <div class="product-badge">
                                                                <ul>
                                                                    <li class="sale-badge">{{ $value->offer }}%</li>
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}" >
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('add.to.cart', $value->id) }}"
                                                                        title="Add to Cart">
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
                                                                @if (Auth::user())
                                                                    <li>
                                                                        <a href="{{ route('add.to.wishlist', $value->id) }}"
                                                                            title="Wishlist">
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
                                                                    <a href="#"><i
                                                                            class="fas fa-star-half-alt"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="far fa-star"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h2 class="product-title">
                                                            <a
                                                                href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{ $value->product_name }}</a>
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
                                        @endforeach
                                        {{-- @else
                                            <P>NO PRODUCT FOUND</P>
                                        @endif --}}

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_product_list">
                                <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                    <div class="row">
                                        <!-- ltn__product-item -->
                                        {{-- @if (!empty($allProducts)) --}}
                                        @foreach ($allProducts as $key => $value)
                                            <div class="col-lg-12">
                                                <div class="ltn__product-item ltn__product-item-3">
                                                    <div class="product-img">
                                                        <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img
                                                                src="{{ asset('storage/' . $value->image) }}"
                                                                alt="#" /></a>
                                                        @if ($value->offer != null)
                                                            <div class="product-badge">
                                                                <ul>
                                                                    <li class="sale-badge">{{ $value->offer }}%</li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product-title">
                                                            <a
                                                                href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{ $value->product_name }}</a>
                                                        </h2>
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
                                                                    <a href="#"><i
                                                                            class="fas fa-star-half-alt"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="far fa-star"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-price">
                                                            @if ($value->offer != null)
                                                                <span>₹{{ round($value->price - $value->price * ($value->offer / 100)) }}.00</span>
                                                                <del>₹{{ $value->price }}</del>
                                                            @else
                                                                <span>₹{{ $value->price }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="product-brief">
                                                            <p>
                                                                {{ $value->short_info }}
                                                            </p>
                                                        </div>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}" >
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('add.to.cart', $value->id) }}"
                                                                        title="Add to Cart">
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
                                                                @if (Auth::user())
                                                                    <li>
                                                                        <a href="{{ route('add.to.wishlist', $value->id) }}"
                                                                            title="Wishlist">
                                                                            <i class="far fa-heart"></i></a>
                                                                    </li>
                                                                @endif

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- @else
                                            <P>NO PRODUCT FOUND</P>

                                        @endif --}}




                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li>
                                        <a href="#"><i class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                        {{ $allProducts->appends(['sort' => Request::get('sort')])->links('vendor.pagination.custom-pagination') }}
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                            <!-- Category Widget -->
                            <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Product categories
                                </h4>
                                <ul>
                                    @foreach ($allCategory as $key => $category)
                                        <li>
                                            <a href="{{ route('product.category', $category->slug) }}">{{ $category->name }}
                                                <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>

                            <!-- Type Widget -->
                            {{-- <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Product types
                                </h4>
                                <ul>
                                    @foreach ($allType as $key => $type)
                                        <li>
                                            <a href="#">{{ $type->name }}
                                                <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                                        </li>
                                    @endforeach




                                </ul>
                            </div> --}}
                            <!-- Alignment Widget -->
                            {{-- <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Product Alignment
                                </h4>
                                <ul>
                                    @foreach ($allAlignment as $key => $alignment)
                                        <li>
                                            <a href="#">{{ $alignment->name }}
                                                <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div> --}}

                            <!-- Price Filter Widget -->
                            {{-- <div class="widget ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Filter by price
                                </h4>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit" value="Your range:" />
                                        <input type="text" class="amount" name="price"
                                            placeholder="Add Your Price" />
                                    </div>
                                    <div class="slider-range"></div>
                                </div>
                            </div> --}}
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
                                                    <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img
                                                            src="{{ asset('storage/' . $value->image) }}"
                                                            alt="#" /></a>
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
                                                        <a
                                                            href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{ $value->product_name }}</a>
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
                            <!-- Search Widget -->
                            {{-- <div class="widget ltn__search-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Search Objects
                                </h4>
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search your keyword..." />
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div> --}}
                            <!-- Tagcloud Widget -->
                            <div class="widget ltn__tagcloud-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Popular Tags
                                </h4>
                                <ul>
                                    @foreach ($allTag as $key => $tag)
                                        <li><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- Size Widget -->
                            {{-- <div class="widget ltn__tagcloud-widget ltn__size-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Product Size
                                </h4>
                                <ul>
                                    <li><a href="#">S</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div> --}}
                            <!-- Color Widget -->
                            {{-- <div class="widget ltn__color-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">
                                    Product Color
                                </h4>
                                <ul>
                                    <li class="black"><a href="#"></a></li>
                                    <li class="white"><a href="#"></a></li>
                                    <li class="red"><a href="#"></a></li>
                                    <li class="silver"><a href="#"></a></li>
                                    <li class="gray"><a href="#"></a></li>
                                    <li class="maroon"><a href="#"></a></li>
                                    <li class="yellow"><a href="#"></a></li>
                                    <li class="olive"><a href="#"></a></li>
                                    <li class="lime"><a href="#"></a></li>
                                    <li class="green"><a href="#"></a></li>
                                    <li class="aqua"><a href="#"></a></li>
                                    <li class="teal"><a href="#"></a></li>
                                    <li class="blue"><a href="#"></a></li>
                                    <li class="navy"><a href="#"></a></li>
                                    <li class="fuchsia"><a href="#"></a></li>
                                    <li class="purple"><a href="#"></a></li>
                                    <li class="pink"><a href="#"></a></li>
                                    <li class="nude"><a href="#"></a></li>
                                    <li class="orange"><a href="#"></a></li>

                                    <li><a href="#" class="orange"></a></li>
                                    <li><a href="#" class="orange"></a></li>
                                </ul>
                            </div> --}}
                            <!-- Banner Widget -->
                            {{-- <div class="widget ltn__banner-widget">
                                <a href="shop.html"><img src="{{ asset('assets/user/img/banner/banner-2.jpg') }}"
                                        alt="#" /></a>
                            </div> --}}
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS AREA END -->

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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sort-selector').on('change', function() {
                var selectedValue = $(this).val();
                var currentUrl = "{{ URL::current() }}";
                window.location.href = currentUrl + '?sort=' + selectedValue;
            });
        });
    </script>
    @include('layouts.scripts')


</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:44:58 GMT -->

</html>
