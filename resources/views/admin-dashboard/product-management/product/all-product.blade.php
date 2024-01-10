<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('admin-dashboard.layouts.navbar')
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        @include('admin-dashboard.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title">Products</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="active">Product Management</li>
                                    <li class="active">All Products</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <a href="{{ route('product.create') }}" style="margin-bottom: 10px" class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-plus"></i>
                                Create Product</a>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Product deatails</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="{{route('product.filter')}}" method="get">

                                            <div class="col-sm-4 col-xs-12">

                                                <div class="m-t-20">
                                                    {{-- <form class="" action="#"> --}}
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <div>
                                                            <input type="text" name="product_name" @if(!empty($productName)) value="{{$productName}}" @endif class="form-control" placeholder="Product Name " />
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="">Choose Status</option>
                                                            <option value="1" @if(!empty($status)) {{ $status === '1' ? 'selected' : '' }} @endif>Active</option>
                                                            <option value="0" @if(!empty($status)) {{ $status === '0' ? 'selected' : '' }} @endif>Inactive</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Min Offer</label>
                                                        <div>
                                                            <input type="number" name="min_offer" @if(!empty($minOffer)) value="{{$minOffer}}" @endif class="form-control" placeholder="Min Offer " />
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Max Stock</label>
                                                        <div>
                                                            <input type="number" name="max_stock" @if(!empty($maxStock)) value="{{$maxStock}}" @endif class="form-control" placeholder="Max Stock " />
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-4 col-xs-12">
                                                <div class="m-t-20">
                                                    {{-- <form action="#"> --}}

                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select name="category" class="form-control" id="">
                                                            <option value="">Choose Category</option>
                                                            @foreach($allCategory as $key => $value)
                                                            <option value="{{$value->id}}" @if(!empty($category)) @selected($category==$value->id ) @endif>{{$value->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Min Price</label>
                                                        <div>
                                                            <input type="number" class="form-control" @if(!empty($minPrice)) value="{{$minPrice}}" @endif name="min_price" placeholder="Min Price" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Max Offer</label>
                                                        <div>
                                                            <input type="number" @if(!empty($maxOffer)) value="{{$maxOffer}}" @endif class="form-control" name="max_offer" placeholder="Max Offer" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-4 col-xs-12">


                                                <div class="m-t-20">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <select name="type" class="form-control" id="">
                                                            <option value="">Choose Type</option>
                                                            @foreach($allType as $key => $value)
                                                            <option value="{{$value->id}}" @if(!empty($type)) @selected($type==$value->id ) @endif>{{$value->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Max Price</label>
                                                        <div>
                                                            <input type="number" class="form-control" name="max_price" @if(!empty($maxPrice)) value="{{$maxPrice}}" @endif placeholder="Max Price" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Min Stock</label>
                                                        <div>
                                                            <input type="number" class="form-control" name="min_stock" @if(!empty($minStock)) value="{{$minStock}}" @endif placeholder="Min Stock" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group m-b-0 " style="padding-left: 10px;">
                                                {{-- <div> --}}
                                                <br>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Product Filter
                                                </button>
                                                {{-- <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                        Cancel
                                                    </button> --}}
                                                {{-- </div> --}}
                                            </div>
                                        </form>

                                    </div>
                                    <br>

                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Image</th>
                                                <th>name</th>
                                                <th>price</th>
                                                <th>Stock</th>
                                                <th>Created by</th>
                                                <th>Status</th>
                                                <th>Show</th>
                                                <th>Reviews</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $si_no = 1;
                                            @endphp

                                            @if (!empty($allProduct))
                                            @foreach ($allProduct as $key => $value)
                                            <tr>
                                                <td>{{ $si_no++ }}</td>
                                                <td class="text-center">

                                                    <img src="{{ asset('storage/' . $value->image) }}" style="width: 50px;height:50px" alt="image" />

                                                </td>
                                                <td>{{ $value->product_name }}</td>
                                                <td>{{ $value->price }}</td>
                                                <td>
                                                    @if ($value->stock >= 1)
                                                    <span class="badge badge-danger" style="background-color:#4cae4c">In Stock</span>
                                                    @else
                                                    <span class="badge badge-danger" style="background-color: red">Out of Stock</span>
                                                    @endif
                                                    {{ $value->stock }}
                                                </td>
                                                <td>{{ $value->created_by }}</td>
                                                <td class="text-center">
                                                    @if ($value->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                    @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModal{{ $value->id }}">Product
                                                        View</button>


                                                    <!-- sample modal content -->
                                                    <div id="myModal{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        Product Details
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body" style="white-space: normal">
                                                                    <h4>{{ $value->name }}
                                                                    </h4>
                                                                    <p>Created by :
                                                                        <b>{{ $value->created_by }}</b>
                                                                    </p>
                                                                    <img src="{{ asset('storage/' . $value->image) }}" alt=" blog image" style="width:100%;height:100%;float:left;border-radius:0px;">
                                                                    <hr>
                                                                    <h4>Short Description</h4>
                                                                    <p>{{ $value->short_description }}
                                                                    </p>
                                                                    <hr>
                                                                    <h4>Description</h4>
                                                                    <div>{!! $value->description !!}</div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="modal" data-target="#myModalComments{{ $value->id }}">
                                                        Show</button> {{count($value->reviews)}}


                                                    <!-- sample modal content -->
                                                    <div id="myModalComments{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        All Customer Reviews
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body" style="white-space: normal">
                                                                    @foreach($value->reviews->sortByDesc('created_at') as $key => $value)
                                                                    <p>{{$value->content}} -by <b>{{ $value->user->first_name }}
                                                                            {{ $value->user->last_name }}</b> | {{ \Carbon\Carbon::parse($value->created_at)->format('F j, Y') }}</p>
                                                                    @endforeach


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('product.edit', $value->id) }}" class="btn btn-info btn-xs waves-effect waves-light"><i class="fa fa-edit"></i></a>

                                                    <button class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal{{ $value->id }}"><i class="fa fa-trash"></i></button>
                                                    <!-- sample modal content -->
                                                    <div id="custom-width-modal{{ $value->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none">
                                                        <div class="modal-dialog" style="width:55%">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="custom-width-modalLabel">
                                                                        Delete Confirmation!</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>Are you sure you want to delete this
                                                                        record?
                                                                    </h4>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('product.destroy', $value->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                        <button type="submit" id="submitBtn" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->

                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row -->
                </div> <!-- container -->

            </div> <!-- content -->


        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Deleting...').attr('disabled'
                    , true);
            });
        });

    </script>

</body>

</html>
