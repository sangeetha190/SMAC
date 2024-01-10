<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Wishlist</title>
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

        <!-- Utilize Cart Menu Start -->


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
                                <h1 class="section-title white-color">Wishlist</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Wishlist</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- WISHLIST AREA START -->
        <div class="liton__wishlist-area mb-105">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive">
                                <table class="table">
                                    <!-- <thead>
                                    <th class="cart-product-remove">X</th>
                                    <th class="cart-product-image">Image</th>
                                    <th class="cart-product-info">Title</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead> -->
                                    <tbody>
                                        @foreach ($wishlist as $key => $value)
                                        <tr>
                                            <td class="cart-product-remove"><a href="{{route('remove.from.wishlist',$value->id)}}">x</a></td>
                                            <td class="cart-product-image">
                                                <a href="{{route('product.details',['slug1' => $value->product->productCategory->slug, 'slug2' => $value->product->slug])}}"><img src="{{ asset('storage/' . $value->product->image) }}" alt="#" /></a>
                                            </td>
                                            <td class="cart-product-info">
                                                <h4>
                                                    <a href="{{route('product.details',['slug1' => $value->product->productCategory->slug, 'slug2' => $value->product->slug])}}">{{ $value->product->product_name }}</a>
                                                </h4>
                                            </td>
                                            <td class="cart-product-price">{{ $value->product->price }}</td>
                                            <td class="cart-product-stock">
                                                @if ($value->product->stock >= 1)
                                                <span class="badge badge-danger" style="background-color:#4cae4c">In Stock</span>
                                                @else
                                                <span class="badge badge-danger" style="background-color: red">Out of Stock</span>
                                                @endif

                                            </td>
                                            <td class="cart-product-add-cart">
                                                <a class="submit-button-1" href="{{route('add.to.cart',$value->product->id)}}" title="Add to Cart">Add
                                                    to
                                                    Cart</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    <!-- All JS Plugins -->
    @include('layouts.scripts')
</body>

</html>
