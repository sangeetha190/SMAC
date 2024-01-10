<!DOCTYPE html>
<html class="no-js" lang="zxx">
<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:44:59 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SMAC - My Account</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    @include('layouts.links')
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <!-- HEADER AREA START (header-3) -->
        @include('layouts.header')
        <!-- HEADER AREA END -->



        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="{{ asset('assets/user/img/bg/5.jpg') }}" style="background-image: url('{{ asset('assets/user/img/bg/5.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <!-- <h6 class="section-subtitle ltn__secondary-color">
                    // Welcome to our company
                  </h6> -->
                                <h1 class="section-title white-color">My Account</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li>My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- WISHLIST AREA START -->
        <div class="liton__wishlist-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- PRODUCT TAB AREA START -->
                        <div class="ltn__product-tab-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="ltn__tab-menu-list mb-50">
                                            <div class="nav">
                                                <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Dashboard <i class="fas fa-home"></i></a>
                                                <a data-bs-toggle="tab" href="#liton_tab_1_2">Orders <i class="fas fa-file-alt"></i></a>
                                                {{-- <a data-bs-toggle="tab" href="#liton_tab_1_3">Downloads <i
                                                        class="fas fa-arrow-down"></i></a> --}}
                                                <a data-bs-toggle="tab" href="#liton_tab_1_4">address <i class="fas fa-map-marker-alt"></i></a>
                                                <a data-bs-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a>
                                                <a href="" title="Logout"
                                                data-bs-toggle="modal"
                                                data-bs-target="#logoutModal">Logout <i class="fas fa-sign-out-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="liton_tab_1_1">
                                                <div class="ltn__myaccount-tab-content-inner">
                                                    <p>
                                                        Hi <strong>{{ Auth::user()->first_name }}
                                                            {{ Auth::user()->last_name }}</strong> (
                                                        <small><a href="" title="Logout"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#logoutModal">Log out</a></small>
                                                        )
                                                    </p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status </th>
                                                                    <th>Total</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $si_no = 1;
                                                                @endphp
                                                                @if (Auth::user()->orders)
                                                                @foreach (Auth::user()->orders->sortByDesc('created_at') as $key => $order)
                                                                <tr>
                                                                    <td>{{ $si_no++ }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($order->status == 'cancelled')
                                                                        <span class="badge badge-danger" style="background-color: red">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'delivered')
                                                                        <span class="badge badge-danger" style="background-color: #4cae4c">{{ $order->status }}</span>
                                                                        @else
                                                                        <span class="badge badge-danger" style="background-color: #0398db">{{ $order->status }}</span>
                                                                        @endif


                                                                    </td>
                                                                    <td>₹{{ $order->total_amount }}</td>
                                                                    <!-- MODAL AREA START (Quick View Request) -->
                                                                    <div class="ltn__modal-area ltn__quick-view-modal-area">
                                                                        <div class="modal fade" id="quick_view_request{{ $order->id }}" tabindex="-1">
                                                                            <div class="modal-dialog " role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                            <!-- <i class="fas fa-times"></i> -->
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="ltn__quick-view-modal-inner">
                                                                                            <div class="modal-product-item">
                                                                                                <div class="row">

                                                                                                    <div class=" col-12">
                                                                                                        <div class="modal-product-info">
                                                                                                            <br>
                                                                                                            <br>
                                                                                                            @if (!empty($order->cancelOrderRequest->reason))
                                                                                                            <p><b>Reason
                                                                                                                    :</b>
                                                                                                                {{ $order->cancelOrderRequest->reason }}
                                                                                                            </p>
                                                                                                            @endif

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
                                                                    <!-- MODAL AREA END -->

                                                                </tr>
                                                                @endforeach
                                                                @endif

                                                                {{-- <tr>
                                                                    <td>2</td>
                                                                    <td>Nov 22, 2019</td>
                                                                    <td>Approved</td>
                                                                    <td>$200</td>
                                                                    <td><a href="cart.html">View</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Jan 12, 2020</td>
                                                                    <td>On Hold</td>
                                                                    <td>$990</td>
                                                                    <td><a href="cart.html">View</a></td>
                                                                </tr> --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="liton_tab_1_2">
                                                <div class="ltn__myaccount-tab-content-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status </th>
                                                                    <th>Total</th>
                                                                    <th>Show All</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $si_no = 1;
                                                                @endphp
                                                                @if (Auth::user()->orders)
                                                                @foreach (Auth::user()->orders->sortByDesc('created_at') as $key => $order)
                                                                <tr>
                                                                    <td>{{ $si_no++ }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($order->status == 'cancelled')
                                                                        <span class="badge badge-danger" style="background-color: red">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'delivered')
                                                                        <span class="badge badge-danger" style="background-color: #4cae4c">{{ $order->status }}</span>
                                                                        @else
                                                                        <span class="badge badge-danger" style="background-color: #0398db">{{ $order->status }}</span>
                                                                        @endif

                                                                        @if ($order->status == 'pending')
                                                                        @if (empty($order->cancelOrderRequest))
                                                                        <a href="#" class="badge badge-danger" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal{{ $order->id }}" style="background-color: red">

                                                                            <span>Cancel Order</span>
                                                                        </a>
                                                                        @else
                                                                        <a href="#" class="badge badge-dark" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_request_orderr{{ $order->id }}" style="background-color: black">

                                                                            <span>View Request</span>
                                                                        </a>
                                                                        @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>₹{{ $order->total_amount }}</td>
                                                                    <td>
                                                                        <a href="#" class="badge badge-dark" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_order{{ $order->id }}" style="background-color: orange">

                                                                            <span>View</span>
                                                                        </a>

                                                                        <!-- MODAL AREA START (Quick View Order) -->
                                                                        <div class="ltn__modal-area ltn__quick-view-modal-area">
                                                                            <div class="modal fade" id="quick_view_order{{ $order->id }}" tabindex="-1">
                                                                                <div class="modal-dialog modal-lg" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                <!-- <i class="fas fa-times"></i> -->
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="ltn__quick-view-modal-inner">
                                                                                                <div class="modal-product-item">
                                                                                                    <div class="row">

                                                                                                        <div class=" col-12">
                                                                                                            <div class="modal-product-info">
                                                                                                                <br>
                                                                                                                <br>
                                                                                                                <h4>Order
                                                                                                                    shipping
                                                                                                                    address
                                                                                                                </h4>

                                                                                                                <p>{{ $order->firstname }}
                                                                                                                    {{ $order->lastname }},
                                                                                                                    {{ $order->address_line1 }},
                                                                                                                    {{ $order->address_line2 }},
                                                                                                                    {{ $order->city }},
                                                                                                                    {{ $order->state }},
                                                                                                                    {{ $order->postal_code }},
                                                                                                                    {{ $order->country }},
                                                                                                                    {{ $order->phone }},
                                                                                                                    {{ $order->email }}
                                                                                                                </p>
                                                                                                                <h4>Order
                                                                                                                    product
                                                                                                                    details
                                                                                                                </h4>
                                                                                                                <table class="table">
                                                                                                                    <tbody>
                                                                                                                        @php $total = 0 @endphp
                                                                                                                        @foreach ($order->orderItems as $key => $item)
                                                                                                                        @php
                                                                                                                        $total += $item->total_price;
                                                                                                                        @endphp
                                                                                                                        <tr>
                                                                                                                            <td>{{ $item->product->product_name }}
                                                                                                                                <strong>
                                                                                                                                    ₹{{ $item->unit_price }}
                                                                                                                                    ×
                                                                                                                                    {{ $item->quantity }}
                                                                                                                                </strong>
                                                                                                                            </td>
                                                                                                                            <td>

                                                                                                                                ₹{{ $item->total_price }}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        @endforeach


                                                                                                                        <tr>
                                                                                                                            <td>Shipping
                                                                                                                                and
                                                                                                                                Handing
                                                                                                                            </td>
                                                                                                                            <td>₹{{ $order->total_amount - $total }}.00
                                                                                                                            </td>
                                                                                                                        </tr>

                                                                                                                        <tr>
                                                                                                                            <td><strong>Order
                                                                                                                                    Total</strong>
                                                                                                                            </td>
                                                                                                                            <td><strong>₹{{ $order->total_amount }}</strong>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>

                                                                                                                {{-- <form
                                                                                                                    action="{{ route('store.cancel.request') }}"
                                                                                                                method="post">

                                                                                                                @csrf
                                                                                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                                                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                                                                                    <textarea name="reason" required placeholder="Reason for Cancellation"></textarea>
                                                                                                                </div>

                                                                                                                <div class="btn-wrapper mt-0">
                                                                                                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                                                                                                        Cancel
                                                                                                                        Request
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <p class="form-messege mb-0 mt-20">
                                                                                                                </p>
                                                                                                                </form> --}}


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
                                                                        <!-- MODAL AREA END -->
                                                                    </td>




                                                                    <!-- MODAL AREA START (Quick View Modal) -->
                                                                    <div class="ltn__modal-area ltn__quick-view-modal-area">
                                                                        <div class="modal fade" id="quick_view_modal{{ $order->id }}" tabindex="-1">
                                                                            <div class="modal-dialog " role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                            <!-- <i class="fas fa-times"></i> -->
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="ltn__quick-view-modal-inner">
                                                                                            <div class="modal-product-item">
                                                                                                <div class="row">

                                                                                                    <div class=" col-12">
                                                                                                        <div class="modal-product-info">
                                                                                                            <br>
                                                                                                            <br>
                                                                                                            <form action="{{ route('store.cancel.request') }}" method="post">
                                                                                                                @csrf
                                                                                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                                                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                                                                                    <textarea name="reason" required placeholder="Reason for Cancellation"></textarea>
                                                                                                                </div>

                                                                                                                <div class="btn-wrapper mt-0">
                                                                                                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                                                                                                        Cancel
                                                                                                                        Request
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <p class="form-messege mb-0 mt-20">
                                                                                                                </p>
                                                                                                            </form>
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
                                                                    <!-- MODAL AREA END -->

                                                                    <!-- MODAL AREA START (Quick View Request) -->
                                                                    <div class="ltn__modal-area ltn__quick-view-modal-area">
                                                                        <div class="modal fade" id="quick_view_request_orderr{{ $order->id }}" tabindex="-1">
                                                                            <div class="modal-dialog " role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                            <!-- <i class="fas fa-times"></i> -->
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="ltn__quick-view-modal-inner">
                                                                                            <div class="modal-product-item">
                                                                                                <div class="row">

                                                                                                    <div class=" col-12">
                                                                                                        <div class="modal-product-info">
                                                                                                            <br>
                                                                                                            <br>
                                                                                                            @if (!empty($order->cancelOrderRequest->reason))
                                                                                                            <p><b>Reason
                                                                                                                    :</b>
                                                                                                                {{ $order->cancelOrderRequest->reason }}
                                                                                                            </p>
                                                                                                            @endif

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
                                                                    <!-- MODAL AREA END -->

                                                                </tr>
                                                                @endforeach
                                                                @endif

                                                                {{-- <tr>
                                                                    <td>2</td>
                                                                    <td>Nov 22, 2019</td>
                                                                    <td>Approved</td>
                                                                    <td>$200</td>
                                                                    <td><a href="cart.html">View</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Jan 12, 2020</td>
                                                                    <td>On Hold</td>
                                                                    <td>$990</td>
                                                                    <td><a href="cart.html">View</a></td>
                                                                </tr> --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="liton_tab_1_3">
                                                <div class="ltn__myaccount-tab-content-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Date</th>
                                                                    <th>Expire</th>
                                                                    <th>Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Carsafe - Car Service PSD Template</td>
                                                                    <td>Nov 22, 2020</td>
                                                                    <td>Yes</td>
                                                                    <td>
                                                                        <a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                                            Download File</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Carsafe - Car Service HTML Template</td>
                                                                    <td>Nov 10, 2020</td>
                                                                    <td>Yes</td>
                                                                    <td>
                                                                        <a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                                            Download File</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Carsafe - Car Service WordPress Theme
                                                                    </td>
                                                                    <td>Nov 12, 2020</td>
                                                                    <td>Yes</td>
                                                                    <td>
                                                                        <a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                                            Download File</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="liton_tab_1_4">
                                                <div class="ltn__myaccount-tab-content-inner">
                                                    <p>
                                                        The following addresses will be used on the
                                                        checkout page by default.
                                                    </p>
                                                    <div class="row">
                                                        @if (!empty(Auth::user()->address))
                                                        <div class="col-md-6 col-12 learts-mb-30">
                                                            <h4>
                                                                Address
                                                                {{-- <small><a href="#">edit</a></small> --}}
                                                            </h4>
                                                            <address>
                                                                <p><strong>{{ Auth::user()->address->firstname }}
                                                                        {{ Auth::user()->address->lastname }}</strong>
                                                                </p>
                                                                <p>
                                                                    {{ Auth::user()->address->address_line1 }},
                                                                    {{ Auth::user()->address->address_line2 }},
                                                                    {{ Auth::user()->address->city }} <br />
                                                                    {{ Auth::user()->address->state }},
                                                                    {{ Auth::user()->address->country }}
                                                                    {{ Auth::user()->address->postal_code }}
                                                                </p>
                                                                <p>Mobile: {{ Auth::user()->address->phone }}</p>
                                                            </address>
                                                        </div>
                                                        @endif

                                                        {{-- <div class="col-md-6 col-12 learts-mb-30">
                                                            <h4>
                                                                Shipping Address
                                                                <small><a href="#">edit</a></small>
                                                            </h4>
                                                            <address>
                                                                <p><strong>Alex Tuntuni</strong></p>
                                                                <p>
                                                                    1355 Market St, Suite 900 <br />
                                                                    San Francisco, CA 94103
                                                                </p>
                                                                <p>Mobile: (123) 456-7890</p>
                                                            </address>
                                                        </div> --}}

                                                        <form id="store-validation" action="{{ route('create.address') }}" method="post">
                                                            @csrf
                                                            <div class="row mb-50">
                                                                <div class="col-md-6">
                                                                    <label>First name:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->firstname)) value="{{ Auth::user()->address->firstname }}" @endif
                                                                    name="firstname" required
                                                                    placeholder="First name" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Last name:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->lastname)) value="{{ Auth::user()->address->lastname }}" @endif
                                                                    name="lastname" required
                                                                    placeholder="Last name" />
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <label>Mobile:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->phone)) value="{{ Auth::user()->address->phone }}" @endif
                                                                    name="phone" id="mobile" required
                                                                    placeholder="Phone number" />
                                                                    <span id="mobileErrorMessage" style="color: red; display: none;">Invalid mobile number</span>


                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label> Email:</label>
                                                                    <input type="email" @if (!empty(Auth::user()->address->email)) value="{{ Auth::user()->address->email }}" @endif
                                                                    name="email" required
                                                                    placeholder="example@example.com" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Address Line 1:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->address_line1)) value="{{ Auth::user()->address->address_line1 }}" @endif
                                                                    name="address_line1" required
                                                                    placeholder="Flat, House no., Building, Company, Apartment" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Address Line 2:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->address_line2)) value="{{ Auth::user()->address->address_line2 }}" @endif
                                                                    name="address_line2" required
                                                                    placeholder="Area, Street, Sector, Village" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>City:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->city)) value="{{ Auth::user()->address->city }}" @endif
                                                                    name="city" required placeholder="City" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label> State:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->state)) value="{{ Auth::user()->address->state }}" @endif
                                                                    name="state" required placeholder="State" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>country:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->country)) value="{{ Auth::user()->address->country }}" @endif
                                                                    name="country" required
                                                                    placeholder="Country" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label> Postal Code:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->postal_code)) value="{{ Auth::user()->address->postal_code }}" @endif
                                                                    name="postal_code" required
                                                                    placeholder="Postal code" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>landmark:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->landmark)) value="{{ Auth::user()->address->landmark }}" @endif
                                                                    name="landmark" required
                                                                    placeholder="Landmark" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label> Notes:</label>
                                                                    <input type="text" @if (!empty(Auth::user()->address->note)) value="{{ Auth::user()->address->note }}" @endif
                                                                    name="note" placeholder="note" />
                                                                </div>
                                                            </div>
                                                            <div class="btn-wrapper">
                                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">
                                                                    Store Address
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="liton_tab_1_5">
                                                <div class="ltn__myaccount-tab-content-inner">
                                                    <p>
                                                        The following addresses will be used on the
                                                        checkout page by default.
                                                    </p>
                                                    <div class="ltn__form-box">
                                                        <form action="#">
                                                            <div class="row mb-50">
                                                                <div class="col-md-6">
                                                                    <label>First name:</label>
                                                                    <input type="text" value="{{ Auth::user()->first_name }}" name="first_name" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Last name:</label>
                                                                    <input type="text" value="{{ Auth::user()->last_name }}" name="last_name" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Mobile:</label>
                                                                    <input type="text" value="{{ Auth::user()->mobile }}" name="mobile" placeholder="Mobile" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label> Email:</label>
                                                                    <input type="email" value="{{ Auth::user()->email }}" name="email" placeholder="example@example.com" />
                                                                </div>
                                                            </div>
                                                            {{-- <div class="btn-wrapper">
                                                                <button type="submit"
                                                                    class="btn theme-btn-1 btn-effect-1 text-uppercase">
                                                                    Save Changes
                                                                </button>
                                                            </div> --}}
                                                        </form>
                                                        <br>
                                                        <form id="needs-validation" action="{{ route('change.password') }}" method="post">
                                                            @csrf
                                                            <fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Current password (leave blank to leave
                                                                            unchanged):</label>
                                                                        <input type="password" required name="old_password" />
                                                                        <label>New password (leave blank to leave
                                                                            unchanged):</label>
                                                                        <input type="password" required name="password" id="password" />
                                                                        <label>Confirm new password:</label>
                                                                        <input type="password" required name="confirmpassword" id="confirmpassword" />
                                                                    </div>
                                                                </div>
                                                                <div id="passwordErrorMessage" style="color: red; display: none;">
                                                                </div>
                                                            </fieldset>
                                                            <div class="btn-wrapper">
                                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">
                                                                    Save Changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT TAB AREA END -->
                    </div>
                </div>
            </div>
        </div>
        <!-- WISHLIST AREA START -->





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


      <!-- MODAL AREA START (Add To Cart Modal) -->
      <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="logoutModal" tabindex="-1">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button
                  type="button"
                  class="close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="ltn__quick-view-modal-inner">
                  <div class="modal-product-item">
                    <div class="row">
                      <div class="col-12">
                        {{-- <div class="modal-product-img">
                          <img src="img/product/logo (2).jpg" alt="#" />
                        </div> --}}
                        <div class="modal-product-info">
                          <h5>
                            <a href="product-details.html">Logout Confirmation</a>
                          </h5>
                          <p class="added-cart">
                            <i class="fa fa-check-circle"></i> Are you sure you want to Logout?
                          </p>
                          <div class="btn-wrapper">
                            <a
                              href="{{route('logout')}}"
                              class="theme-btn-1 btn btn-effect-1"
                              >Yes</a
                            >
                            <a
                              href=""
                              class="theme-btn-2 btn btn-effect-2" data-bs-dismiss="modal"
                              aria-label="Close"
                              >Cancel</a
                            >
                          </div>
                        </div>
                        <!-- additional-info -->

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL AREA END -->


    <!-- FOOTER AREA START -->
    @include('layouts.footer')
    <!-- FOOTER AREA END -->
    </div>
    <!-- Body main wrapper end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function validatePhone() {
            var mobileNumber = $("#mobile").val();
            if (/^\d{10}$/.test(mobileNumber)) {
                $("#mobileErrorMessage").hide();
                return true;
            } else {
                $("#mobileErrorMessage").show();
                return false;
            }
        }

        function validatePassword() {

            var password = $("#password").val();
            var confirmPassword = $("#confirmpassword").val();

            if (password === "" && confirmPassword === "") {
                $("#passwordErrorMessage").hide();
                return true;
            } else {

                if (password !== confirmPassword) {
                    $("#passwordErrorMessage").text("Passwords do not match").show();
                    return false;
                } else if (password.length < 8) {
                    $("#passwordErrorMessage").text("Password must be at least 8 characters long").show();
                    return false;
                } else if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/.test(password)) {
                    $("#passwordErrorMessage").text("Password must contain at least one special character").show();
                    return false;
                } else if (!/[A-Z]+/.test(password)) {
                    $("#passwordErrorMessage").text("Password must contain at least one uppercase letter").show();
                    return false;
                } else {
                    $("#passwordErrorMessage").hide();
                    return true;
                }
            }
        }

        $(document).ready(function() {
            $("form#store-validation").submit(function(event) {
                // alert('store-validation');
                if (!validatePhone()) {
                    event.preventDefault();
                } else {
                    $(".theme-btn-1").prop("disabled", true);
                    $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
                }
            });


            $("form#needs-validation").submit(function(event) {
// alert('needs-validation');
                if (!validatePassword()) {
                    event.preventDefault();
                } else {
                    $(".theme-btn-1").prop("disabled", true);
                    $(".theme-btn-1").html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
                }
            });

        });

    </script>
    <!-- All JS Plugins -->
    @include('layouts.scripts')
</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 08:45:00 GMT -->

</html>
