<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                @if (!empty(Auth::user()->profile_photo_path))
                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user-img" class="img-circle">
                @else
                <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="ddf-img" class="img-circle">
                @endif
                {{-- <img src="assets/admin/images/users/avatar-1.jpg" alt="" class="img-circle"> --}}
            </div>
            <div class="user-info">
                <div class="dropdown">
                    {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->first_name}}
                    {{Auth::user()->last_name}}</a> --}}
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"> Profile</a></li>
                        <li><a href="javascript:void(0)"> Settings</a></li>
                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard
                        </span></a>
                </li>

                <li>
                    <a href="{{ route('index') }}" class="waves-effect"><i class="fa fa-home"></i><span>
                            Go to Website <span class="badge badge-primary pull-right"></a>
                </li>
                {{-- @can('User Management') --}}
                <li class="has_sub">
                    @can('User Management')
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> User
                            Management
                        </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    @endcan
                    <ul class="list-unstyled">
                        @can('Roles')
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        @endcan
                        @can('Users')
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                        <li><a href="{{ route('all.customer') }}">Customer Users</a></li>
                        @endcan
                        {{-- <li><a href="{{ route('permissions.index') }}">Permissions</a></li> --}}

                    </ul>
                </li>

                <li class="has_sub">
                    @can('Product Management')
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-image"></i> <span> Product
                            Management
                        </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    @endcan
                    <ul class="list-unstyled">
                        @can('Product Category')
                        <li><a href="{{ route('product-category.index') }}">Product Category</a></li>
                        @endcan
                        @can('Product Type')
                        <li><a href="{{ route('product-type.index') }}">Product Type</a></li>
                        @endcan
                        {{-- <li><a href="{{ route('product-tag.index') }}">Product Tage</a>
                </li> --}}
                @can('Product Alignment')
                <li><a href="{{ route('alignment.index') }}">Product Alignment</a></li>
                @endcan
                @can('Product')
                <li><a href="{{ route('product.index') }}">Product</a></li>
                @endcan
            </ul>
            </li>
            {{-- @endcan --}}

            <li class="has_sub">
                @can('Order Management')
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-image"></i> <span> Order
                        Management
                    </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                @endcan
                <ul class="list-unstyled">
                    @can('Shipping Amount')
                    <li><a href="{{ route('shipping-price-details.index') }}">Shipping Amount</a></li>
                    @endcan
                    @can('Orders')
                    <li><a href="{{ route('orders.index') }}">Orders</a></li>
                    @endcan
                    @can('Cancelled Request Orders')
                    <li><a href="{{ route('cancel.request.orders') }}">Cancelled Request Orders</a></li>
                    @endcan
                    @can('Cancelled Orders')
                    <li><a href="{{ route('cancelled.orders') }}">Cancelled Orders</a></li>
                    @endcan


                    {{-- <li><a href="{{ route('product-type.index') }}">Product Type</a>
            </li>
            <li><a href="{{ route('product-tag.index') }}">Product Tage</a></li>
            <li><a href="{{ route('alignment.index') }}">Product Alignment</a></li>
            <li><a href="{{ route('product.index') }}">Product</a></li> --}}
            </ul>
            </li>

            {{-- <li>
                    <a href="typography.html" class="waves-effect"><i class="ti-ruler-pencil"></i><span>
                            Typography <span class="badge badge-primary pull-right">6</span></span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> UI
                            Elements </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-panels.html">Panels</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-components.html">Components</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wand"></i> <span> Icons
                        </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="icons-material.html">Material Design</a></li>
                        <li><a href="icons-ion.html">Ion Icons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome</a></li>
                        <li><a href="icons-themify.html">Themify Icons</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i><span> Forms
                        </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="form-elements.html">General Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Advanced Form</a></li>
                        <li><a href="form-wysiwyg.html">WYSIWYG Editor</a></li>
                        <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Tables
                        </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-pie-chart"></i><span> Charts
                        </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="charts-morris.html">Morris Chart</a></li>
                        <li><a href="charts-chartjs.html">Chartjs</a></li>
                        <li><a href="charts-flot.html">Flot Chart</a></li>
                        <li><a href="charts-other.html">Other Chart</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-map-alt"></i><span> Maps
                        </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="maps-google.html"> Google Map</a></li>
                        <li><a href="maps-vector.html"> Vector Map</a></li>
                    </ul>
                </li>

                <li>
                    <a href="calendar.html" class="waves-effect"><i class="ti-calendar"></i><span> Calendar
                            <span class="badge badge-primary pull-right">NEW</span></span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Pages
                        </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-login.html">Login</a></li>
                        <li><a href="pages-register.html">Register</a></li>
                        <li><a href="pages-recoverpw.html">Recover Password</a></li>
                        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                        <li><a href="pages-blank.html">Blank Page</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li> --}}

            <!--<li class="has_sub">-->
            <!--<a href="javascript:void(0);" class="waves-effect"><i class="ti-share"></i><span>Multi Menu </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
            <!--<ul>-->
            <!--<li class="has_sub">-->
            <!--<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
            <!--<ul style="">-->
            <!--<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>-->
            <!--<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>-->
            <!--</ul>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
