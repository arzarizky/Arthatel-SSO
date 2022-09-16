<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>SSO &mdash; {{ $title ?? 'Masih Kosong Titlenya' }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('template') }}/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap-social/bootstrap-social.css">
        <link rel="stylesheet" href="{{ asset('template') }}/node_modules/izitoast/dist/css/iziToast.min.css">


        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('template') }}/assets/css/components.css">
    </head>

    <body>
        <div id="app">
            @yield('auth')
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('template') }}/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('template') }}/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('template') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('template') }}/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="{{ asset('template') }}/node_modules/moment/min/moment.min.js"></script>
        <script src="{{ asset('template') }}/assets/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="{{ asset('template') }}/node_modules/izitoast/dist/js/iziToast.min.js"></script>
        <script src="{{ asset('template') }}/assets/js/page/modules-toastr.js"></script>

        <!-- Template JS File -->
        <script src="{{ asset('template') }}/assets/js/scripts.js"></script>
        <script src="{{ asset('template') }}/assets/js/custom.js"></script>

        <!-- Page Specific JS File -->
        @stack('auth-js')

    </body>
</html>
