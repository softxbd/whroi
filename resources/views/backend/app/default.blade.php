@php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    if(Auth::id() == null){
        return Redirect::to('/')->send();
    }
@endphp
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('backend/assets/') }}" data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Dashboard - Education Management System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-semi-dark.css') }}" class="template-customizer-theme-css" />
    {{--    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />--}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Taken for from-validation -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

    <!-- Taken for pages-account-settings-account -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Taken for forms-editors -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/quill/editor.css') }}" />

    <!-- Taken for forms-file-upload -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/dropzone/dropzone.css') }}" />

    <!-- Taken for forms-pickers -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <!-- forms-selects No needed already taken of others pages -->

    <!-- Taken for forms-sliders -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/nouislider/nouislider.css') }}" />

    <!-- Taken for forms-extras -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />

    <!-- Taken for app-calendar -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/fullcalendar/fullcalendar.css') }}" />

    <!-- Taken for ui-toasts -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/toastr/toastr.css') }}" />

    <!-- Taken for ui-spinners -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/spinkit/spinkit.css') }}" />

    <!-- Taken for app-user-list -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    <!-- Taken for data-tables-basic -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

    <!-- Taken for pages-profile-user -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-profile.css') }}" />

    <!-- Taken for pages-account-settings-security -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-account-settings.css') }}" />



    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/app-calendar.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js') }} in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>

    <style>
        .table-min-height {
            min-height: 200px !important;
        }
        @yield('css')
    </style>

</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('backend.app.navbar')
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('backend.app.header')
            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->
                <!-- Footer -->
                @include('backend.app.footer')
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- build:js assets/vendor/js/core.js') }} -->
<script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js') }}"></script>


<script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/toastr/toastr.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('backend/assets/js/main.js') }}"></script>

<script src="{{ asset('backend/assets/js/ui-toasts.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('backend/assets/js/form-layouts.js') }}"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(function(){
        $(document).on('click','#delete', function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            //sweet alart start
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    });
</script>

<script>
    @if(Session::has('message'))
        toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
    }
    let type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}",'Success!');
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}",'Warning!');
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}",'Failed!');
            break;
    }
    @endif
</script>

<script>
    function setup() {
        this.addEventListener("mousemove", resetTimer, false);
        this.addEventListener("mousedown", resetTimer, false);
        this.addEventListener("keypress", resetTimer, false);
        this.addEventListener("DOMMouseScroll", resetTimer, false);
        this.addEventListener("mousewheel", resetTimer, false);
        this.addEventListener("touchmove", resetTimer, false);
        this.addEventListener("MSPointerMove", resetTimer, false);

        startTimer();
    }

    setup();

    function startTimer() {
        // wait 2 seconds before calling goInactive
        timeoutID = window.setTimeout(goInactive, (60000*10));
    }

    function resetTimer(e) {
        window.clearTimeout(timeoutID);
        goActive();
    }

    function goActive() {
        // do something
        startTimer();
    }

    function goInactive() {

        console.log('logout');

        $.ajax({
            type:'get',
            url:'{{ route('admin.logout') }}',
            success:function(){
                location.href = '{{ URL::to('/') }}';
            }
        })
    }
</script>

<script type="text/javascript">
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        let asiaDhaka = new Date().toLocaleString([], { timeZone: "Asia/Dhaka" });
        let today = new Date(asiaDhaka);

        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        // add a zero in front of numbers<10
        let isFormat12H = true;
        let ampm = "";
        if (isFormat12H) {
            ampm = h >= 12 ? " PM" : " AM";
            h = h % 12;
            h = h ? h : 12;
        }
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById("time").innerHTML = h + ":" + m + ":" + s + ampm;
        t = setTimeout(function () {
            startTime();
        }, 1000);
    }
    startTime();
</script>

@yield('js')

</body>
</html>
