<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #imagePreviewContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            overflow: auto;
            margin-top: 10px;
        }

        #imagePreviewContainer img {
            max-width: 100%;
            height: auto;
        }
    </style>

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
                                <h4 class="pull-left page-title">Edit Product</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="#">Product Mangement</a></li>
                                    <li class="active">Edit Product</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit Product Form</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <div class="m-t-20">
                                                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label>Product Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" required placeholder="Type product name" />
                                                        @error('product_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Category Name <span class="text-danger">*</span></label>
                                                        <div>
                                                            <select class="form-control" required name="product_category_id">
                                                                <option value="">Choose Category</option>
                                                                @foreach ($productCategory as $key => $value)
                                                                <option value="{{ $value->id }}" @selected($product->product_category_id == $value->id)>{{ $value->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Product Type <span class="text-danger">*</span></label>
                                                        <div>
                                                            <select class="form-control" required name="product_type_id">
                                                                <option value="">Choose type</option>
                                                                @foreach ($productType as $key => $value)
                                                                <option value="{{ $value->id }}" @selected($product->product_type_id == $value->id)>{{ $value->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group">
                                                        <label>Alignment <span class="text-danger">*</span></label>
                                                        <div>
                                                            <select class="form-control" required name="Alignment_id">
                                                                <option value="">Choose Alignment</option>
                                                                @foreach ($productAlignment as $key => $value)
                                                                    <option value="{{ $value->id }}"
                                                    @selected($product->Alignment_id == $value->id)>{{ $value->name }}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Single Image </label>
                                            <input type="file" name="single_image" id="imageUpload" class="form-control" placeholder="Type something" />
                                            <div class="row">
                                                @if (!empty($product->image))
                                                <div class="col-md-6">
                                                    <p>Image</p>
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Image Preview" style="width: 200px; height: 200px;">
                                                </div>
                                                @endif
                                                <div class="col-md-6">
                                                    <p>Choose Image</p>
                                                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 200px; height: 200px;">
                                                </div>
                                            </div>
                                            {{-- <img id="imagePreview" src="#" alt="Image Preview"
                                                            style="display: none; width: 200px; height: 200px;"> --}}
                                        </div>

                                        <div class="form-group">
                                            <label>Multiple Image </label>
                                            <input type="file" name="multiple_image[]" id="multilpeimageUpload" multiple class="form-control" placeholder="Type something" />
                                            <div id="imagePreviewContainer"></div>
                                        </div>

                                        <div class="form-group">
                                            <label>Price <span class="text-danger">*</span></label>
                                            <input type="text" name="price" value="{{ $product->price }}" class="form-control" required placeholder="Type product price" />
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Stock <span class="text-danger">*</span></label>
                                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" required placeholder="Type product stock" />
                                            @error('stock')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Offer</label>
                                            <input type="number" name="offer" value="{{ $product->offer }}" class="form-control" placeholder="Type product offer" />
                                            @error('offer')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Status <span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" required name="status">
                                                    <option value="">Choose status</option>
                                                    <option value="1" @selected($product->status == 1)>
                                                        Active</option>
                                                    <option value="0" @selected($product->status == 0)>
                                                        Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Short Description <span class="text-danger">*</span></label>
                                            <div>
                                                <textarea required class="form-control" name="short_description" required rows="5">{{ $product->short_info }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <div>
                                                <textarea required id="summernote" class="form-control" name="description" required rows="5">{{ $product->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Alignment</label>
                                            <div>
                                                @foreach ($productAlignment as $key => $value)
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox{{ $value->id }}" type="checkbox" name="Alignment[]" value="{{ $value->id }}" {{ in_array($value->id, $product->Alignments->pluck('Alignment_id', 'Alignment_id')->all()) ? 'checked' : '' }}>
                                                    <label for="checkbox{{ $value->id }}">
                                                        {{ $value->name }} </label>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                    Update
                                                </button>
                                                <a href="{{ route('product.index') }}" class="btn btn-dark waves-effect m-l-5">
                                                    Cancel
                                                </a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>



                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>



        </div> <!-- container -->

    </div> <!-- content -->



    </div>
    <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    @include('admin-dashboard.layouts.scripts')
    <!-- Parsleyjs -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>


    <script>
        jQuery(document).ready(function() {
            $('.wysihtml5').wysihtml5();

            $('#summernote').summernote({
                height: 200, // set editor height

                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor

                focus: true // set focus to editable area after initializing summernote
            });

            $('form').parsley();
            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Updating...').attr('disabled',
                    true);
            });

        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {


        });
    </script> --}}

    <script>
        document.getElementById("imageUpload").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").setAttribute("src", e.target.result);
                document.getElementById("imagePreview").style.display = "block";
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>

    <script>
        document.getElementById('multilpeimageUpload').addEventListener('change', function(event) {
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            imagePreviewContainer.innerHTML = '';

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function() {
                    const image = document.createElement('img');
                    image.src = reader.result;
                    image.style.width = '200px';
                    image.style.height = '200px';
                    imagePreviewContainer.appendChild(image);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>


</body>

</html>