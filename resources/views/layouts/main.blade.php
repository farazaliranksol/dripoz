<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/assets/img/brand/Dripoz.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    <!-- Datatables-->
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/argon.css?v=1.1.0')}}" type="text/css">
    {{-- slick slider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <!-- Custom CSS -->
    {{--
    <link href="{{asset('public/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet"> --}}
    {{--
    <link href="{{asset('public/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet"> --}}
    {{--
    <link href="{{asset('public/assets/vendor/jvectormap-next/jquery-jvectormap.min.js')}}" rel="stylesheet" />
    --}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <style>
        .mt-100 {
            margin-top: 100px
        }

        body {
            color: #514B64;
            min-height: 100vh;
            position: relative;
        }

        .modal-dialog {
            max-width: 700px;
            margin: 1.75rem auto;
        }

        .loader {
            position: absolute;
            left: 50%;
            z-index: 111111;
            top: 50%;
        }

        .loader i {
            font-size: 40px;
        }

        .eventBoxes {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 10px;
        }

        .eventBoxes .mx-auto {
            min-width: 200px;
            width: 100%;
            overflow: hidden;
        }

        .eventBoxTitle {
            line-height: 60px;
            font-weight: bold;
            font-size: 13px !important;
        }

        .submit-btn {
            color: #fff;
            background: transparent;
            border: none;
            font-weight: bold;
        }
    </style>

</head>

<body id="bodyBlur">
    <div id="loader" class="loader" hidden><i class="fas fa-spinner fa-spin"></i></div>
    <!-- Sidenav -->
    @include('layouts.leftMenu')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('layouts.topNavBar')
        <!-- Header -->
        <!-- Page content -->
        @yield('content')
        <!-- Footer -->
        @include('layouts.footer')

    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script defer src="{{asset('public/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!--DataTables-->
    <script defer src="{{asset('public/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <!-- Optional JS -->
    <script defer src="{{asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script defer src="{{asset('public/assets/js/argon.js?v=1.1.0')}}"></script>
    <!-- Demo JS - remove this in your project -->
    <script defer src="{{asset('public/assets/js/demo.min.js')}}"></script>
    <!----------jvector------------>
    <script src="{{asset('public/assets/vendor/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- slick script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    @yield('scripts')
    <script>
        function toastify(message, type) {
            if (type == 'error') {
                var bgColor = "linear-gradient(to right, #8e0e00, #1f1c18)";
            } else {
                var bgColor = "linear-gradient(to right, #000000, #0f9b0f)";
            }
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: bgColor,
                },
                onClick: function () {} // Callback after click
            }).showToast();
        }
      
        @if(Session::has('error'))
        var message = "<?php echo session::get('error') ?>";
        
        Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #8e0e00, #1f1c18)",
                },
                onClick: function () {} // Callback after click
            }).showToast();
            <?php session()->forget('error'); ?>
        @endif

        @if(Session::has('success'))
        var message = "<?php echo session::get('success') ?>";
        Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #000000, #0f9b0f)",
                },
                onClick: function () {} // Callback after click
            }).showToast();
            <?php Session::forget('success'); ?>
        @endif
        
    </script>
</body>

</html>