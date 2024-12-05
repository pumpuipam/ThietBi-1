<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Design by Thang Developer" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <link href="{{ asset('admin/assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"  />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('layouts.admin.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.admin.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        @yield('content')

        @include('layouts.admin.footer')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Cấu hình</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center">Chọn layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail"
                        alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Màu sáng</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail"
                        alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="{{ asset('admin/assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('admin/assets/css/app-dark.min.css') }}" />
                    <label class="form-check-label" for="dark-mode-switch">Màu tối</label>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/pages/form-validation.init.js') }}"></script>

    <!-- Peity chart-->
    <script src="{{ asset('admin/assets/libs/peity/jquery.peity.min.js') }}"></script>

    <!-- Plugin Js-->
    <script src="{{ asset('admin/assets/libs/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

    {{-- Date --}}
    <script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/pages/form-advanced.init.js') }}"></script>

    {{-- end date --}}

    <!-- form mask -->
    <script src="{{ asset('admin/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>

    <!-- form mask init -->
    <script src="{{ asset('admin/assets/js/pages/form-mask.init.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('admin/assets/js/pages/form-editor.init.js') }}"></script>

    <!-- form wizard -->
    {{-- <script src="{{ asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script> --}}

    <!-- form wizard init -->
    <script src="{{ asset('admin/assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('admin/assets/js/pages/form-editor.init.js') }}"></script>

    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!--Morris Chart-->
    <script src="{{ asset('admin/assets/libs/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ asset('admin/assets/js/pages/morris.init.js') }}"></script>

    <!-- flot plugins -->
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot.curvedlines/curvedLines.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/flot-charts/jquery.flot.crosshair.js') }}"></script>

    <!-- flot init -->
    <script src="{{ asset('admin/assets/js/pages/flot.init.js') }}"></script>

    @yield('script')
    <script>
         $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
    {{-- toastr js --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>

</html>
