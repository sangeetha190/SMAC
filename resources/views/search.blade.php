<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC | Search</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
    <style>
        .ltn__top-rated-product-widget>ul>li {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .dropdown-menu {
            width: 90%;
        }

        .top-rated-product-img {
            max-width: 59px;
            margin-right: 15px;
        }

        .top-rated-product-info {
            overflow: hidden;
            margin-top: 9px;
        }

        input[type="text"],
        input[type="email"] {
            margin: 0;
       border-radius: 0;
        }

        .hidden {
            display: none;
            background-color: red;
            margin: 0;
            background: white;
            position: relative;
        }

        .widget.ltn__top-rated-product-widget ul li:hover {
            background-color: rgba(109, 109, 109, 0);
        }

    </style>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-3) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <div class="ltn__utilize-overlay"></div>

        <!-- Search AREA START -->
        <div class="ltn__login-area mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center mb-0">
                            <h3 class="section-title" style="font-size: 26px">
                                {{count($results)}} RESULTS FOR "{{$searchName}}"
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mx-auto col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="account-login-inner">
                            <form id="searchpage-form" action="{{route('product.search')}}" method="get">
                                {{-- @csrf --}}
                                <div class="input-container">
                                    <input type="text" id="inputBox" name="search" value="{{$searchName}}" autocomplete="off" placeholder="Search Here..." />

                                    <button type="submit" class="position-absolute" style="height: 49px;
                                           border-radius: 2px;width: 50px;background: #292626;
                                          color: white;">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                    <ul id="dropdown" class="hidden shadow p-0">
                                        <!-- Top Rated Product Widget -->
                                        <div class="widget ltn__top-rated-product-widget p-0 m-0">
                                            <ul class="searchpage-results  shadow mb-2" style="position: absolute;background: rgb(255, 255, 255);
                                                    width: 100%; z-index: 22;padding-left:10px;padding-bottom:8px;">

                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                                <!-- <button type="submit">
                        <span><i class="icon-search"></i></span>
                      </button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search AREA END -->

        <!-- Card container Starts-->
        <div class="container mb-5">
            <div class="row">
                <div class="mx-auto col-11 col-sm-12 col-md-11 col-lg-10 my-2">
                    <!-- Top Rated Product Widget -->
                    <h4 class="ltn__widget-title ltn__widget-title-border m-0">
                        Search Related Product
                    </h4>
                </div>

                <!-- Card 1 starts -->
                @if(count($results) === 0)
                <div class="mx-auto col-11 col-sm-12 col-md-11 col-lg-10 my-2">
                    <div class="card">
                        <div class="card-body">
                            No Results Found
                        </div>
                    </div>
                </div>
                @else
                @foreach($results as $key => $value)
                <div class="mx-auto col-11 col-sm-12 col-md-11 col-lg-10 my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="top-rated-product-item clearfix p-2">
                                <div class="top-rated-product-img">
                                    <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}"><img src="{{asset('storage/'.$value->image)}}" alt="#" /></a>
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
                                        <a href="{{ route('product.details', ['slug1' => $value->productCategory->slug, 'slug2' => $value->slug]) }}">{{$value->product_name}}</a>
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
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


                <!-- Card 1 Ends -->

            </div>
        </div>
        <!-- Card container Ends-->

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
</html>
