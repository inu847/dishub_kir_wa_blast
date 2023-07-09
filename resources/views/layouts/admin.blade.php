<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dishub KIR Reminder | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- C3 Chart css -->
        <link href="{{ asset('assets/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />

        @stack('css')

        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

        <!-- DATA TABLE css -->
        <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <style>
        /* .navbar-custom, .navbar-custom .app-search .form-control, .navbar-custom .app-search .btn{
            background-color: #173067 !important;
        }
        .logo-box, .left-side-menu{
            background-color: #ffbb00 !important;
        } */
        .nav-second-level li.mm-active>a, .nav-third-level li.mm-active>a, .nav-second-level li a:focus, .nav-second-level li a:hover, .nav-thrid-level li a:focus, .nav-thrid-level li a:hover{
            color: #000 !important;
        }

    </style>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            @include('layouts.topbar')

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="slimscroll-menu">
                    @include('layouts.sidebar')
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                    <!-- end container-fluid -->
                </div> <!-- end content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                {{now()->year}} &copy; Sebi
                                {{-- <a href="">Coderthemes</a> --}}
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css"
                            data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css"
                            data-appStyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/y2YAD" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

        <!--C3 Chart-->
        <script src="{{ asset('assets/libs/d3/d3.min.js')}}"></script>
        <script src="{{ asset('assets/libs/c3/c3.min.js')}}"></script>

        <script src="{{ asset('assets/libs/echarts/echarts.min.js')}}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js')}}"></script>

        @stack('js')

        <!-- App jsssss -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.colVis.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
        <script>
             function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode != 45  && charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }

            function alertConfirmation(title, text, target, action, buttonConfirmasi = 'Hapus') {
                Swal.fire({
                    type: 'warning',
                    title: title,
                    text: text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: buttonConfirmasi
                }).then((result) => {
                    if (result.value == true) {
                        if(action == 'submit') $(target).submit();
                    }
                });
            }
        </script>
        @yield('scripts')
    </body>
</html>
