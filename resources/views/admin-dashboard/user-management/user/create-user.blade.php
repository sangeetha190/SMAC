<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Daati Divine - Create User</title>
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
                                <h4 class="pull-left page-title">Create User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="#">User Mangement</a></li>
                                    <li class="active">Create User</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Create User Form</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <div class="m-t-20">
                                                <form class="needs-validation" action="{{ route('users.store') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" name="first_name"
                                                                    class="form-control" required
                                                                    placeholder="Type something" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" name="last_name"
                                                                    class="form-control" placeholder="Type something" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>E-Mail</label>
                                                                <div>
                                                                    <input type="email" name="email"
                                                                        class="form-control" required
                                                                        parsley-type="email"
                                                                        placeholder="Enter a valid e-mail" />
                                                                    @error('email')
                                                                        <div class="text-danger">You enterd e-mail already
                                                                            used</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <div>
                                                                    <input pattern="[0-9]{10,}" type="text"
                                                                        name="mobile" class="form-control" required
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
                                                                            <option value="{{ $value }}">
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
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Inactive.</option>
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
                                                                <input type="password" name="password" id="password"
                                                                    class="form-control" required
                                                                    placeholder="Password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Confirm Password</label>
                                                                <input type="password" id="confirmpassword"
                                                                    class="form-control" required
                                                                    placeholder="Re-Type Password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profile Image</label>
                                                        <input type="file" name="image" id="imageUpload"
                                                            class="form-control" placeholder="Type something" />
                                                        <img id="imagePreview" src="#" alt="Image Preview"
                                                            style="display: none; max-width: 50%; height: auto;">
                                                    </div>

                                                    <div class="form-group">
                                                        <div>
                                                            <button type="submit" id="submitBtn"
                                                                class="btn btn-primary waves-effect waves-light">
                                                                Create
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
            $("form.needs-validation").submit(function(event) {
                if (!validatePassword()) {

                    event.preventDefault();

                }
            });

        });
    </script>



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
