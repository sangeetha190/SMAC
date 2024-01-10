<!-- jQuery  -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/detect.js') }}"></script>
<script src="{{ asset('assets/admin/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/admin/js/waves.js') }}"></script>
<script src="{{ asset('assets/admin/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Datatables-->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/admin/pages/dashborad.js') }}"></script>

<script src="{{ asset('assets/admin/js/app.js') }}"></script>


<!-- Sweet-Alert  -->
<script src="{{ asset('assets/admin/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('assets/admin/pages/sweet-alert.init.js') }}"></script>


<!-- Wysihtml js -->
<script type="text/javascript" src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>

<!--Summernote js-->
    <script src="{{asset('assets/admin/plugins/summernote/summernote.min.js')}}"></script>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
        integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "Success!",
                text: "{!! Session::get('success') !!}",
                imageUrl: "assets/admin/plugins/bootstrap-sweetalert/thumbs-up.jpg",
                timer: 3000, // 3 seconds
                buttons: false
            });
        </script>
    @endif
    @if ($message = Session::get('danger'))
        <script>
            swal({
                title: "Success!",
                text: "{!! Session::get('danger') !!}",
                type: "error",
                timer: 3000, // 3 seconds
                buttons: false
            });
        </script>
    @endif

    @if ($message = Session::get('info'))
        <script>
            swal({
                title: "Sorry!",
                text: "{!! Session::get('info') !!}",
                type: "warning",
                timer: 3000, // 3 seconds
                buttons: false
            });
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            swal({
                title: "Sorry!",
                text: "{!! Session::get('error') !!}",
                type: "error",
                timer: 3000, // 3 seconds
                buttons: false
            });
        </script>
    @endif
