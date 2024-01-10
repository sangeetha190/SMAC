<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('admin-dashboard.layouts.links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-***" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                                <h4 class="pull-left page-title">Edit User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="#">User Mangement</a></li>
                                    <li class="active">Edit User</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit User Form</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <div class="m-t-20">
                                                <form class="needs-validation"
                                                    action="{{ route('users.update', $user->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" name="first_name"
                                                                    class="form-control" value="{{ $user->first_name }}"
                                                                    required placeholder="Type something" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" name="last_name"
                                                                    value="{{ $user->last_name }}" class="form-control"
                                                                    placeholder="Type something" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>E-Mail</label>
                                                                <div>
                                                                    <input type="email" name="email"
                                                                        class="form-control" readonly
                                                                        value="{{ $user->email }}" parsley-type="email"
                                                                        placeholder="Enter a valid e-mail" />
                                                                </div>
                                                                @error('email')
                                                                    <div class="text-danger">You Enterd Email Already Have
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <div>
                                                                    <input pattern="[0-9]{10,}"type="text"
                                                                        name="mobile" value="{{ $user->mobile }}"
                                                                        class="form-control" required
                                                                        placeholder="Enter only numbers" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Role</label>
                                                                <div>
                                                                    <select class="form-control" required
                                                                        name="roles">
                                                                        <option value="">Choose Role</option>
                                                                        @foreach ($roles as $key => $value)
                                                                            <option value="{{ $value }}"
                                                                                {{ in_array($value, $userRole) ? 'selected' : '' }}>
                                                                                {{ $value }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <div>
                                                                    <select class="form-control" required
                                                                        name="status">
                                                                        <option value="">Choose status</option>
                                                                        <option value="1"
                                                                            @selected($user->status == 1)>Active</option>
                                                                        <option value="0"
                                                                            @selected($user->status == 0)>Inactive.
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div>( Eight or more characters with at least one uppercase and
                                                            one
                                                            special
                                                            character )</div>
                                                        <div id="passwordErrorMessage"
                                                            style="color: red; display: none;">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" name="password"
                                                                    id="inputChoosePassword" class="form-control"
                                                                    placeholder="Password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Confirm Password</label>
                                                                <input type="password" name="confirmpassword"
                                                                    id="inputConfirmPassword" class="form-control"
                                                                    placeholder="Re-Type Password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profile Image</label>
                                                        <input type="file" name="image" id="imageUpload"
                                                            class="form-control" placeholder="Type something" />
                                                        <div class="row">
                                                            @if (!empty($user->profile_photo_path))
                                                                <div class="col-md-6">
                                                                    <p>Image</p>
                                                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                                                        alt="Image Preview"
                                                                        style=" max-width: 50%; height: 50%;">
                                                                </div>
                                                            @endif
                                                            <div class="col-md-6">
                                                                <img id="imagePreview" src="#"
                                                                    alt="Image Preview"
                                                                    style="display: none; max-width: 50%; height: 50%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div>
                                                            <button type="submit" id="submitBtn"
                                                                class="btn btn-primary waves-effect waves-light">
                                                                Update
                                                            </button>
                                                            <a href="{{ route('users.index') }}"
                                                                class="btn btn-dark waves-effect m-l-5">
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
        function validatePassword() {
            var password = $("#inputChoosePassword").val();
            var confirmPassword = $("#inputConfirmPassword").val();


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
            $("form.needs-validation").submit(function(event) {
                if (!validatePassword()) {

                    event.preventDefault();

                }
            });

        });
    </script>

    {{-- <script>
        $(document).ready(function() {

            $('form').parsley();


            $('form').on('submit', function() {
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin"></i> Updating...').attr('disabled',
                    true);
            });
        });
    </script> --}}



    <script type="text/javascript"></script>
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


</body>

</html>
