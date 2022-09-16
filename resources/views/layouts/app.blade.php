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
        <link rel="stylesheet" href="{{ asset('template') }}/node_modules/chocolat/dist/css/chocolat.css">


        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('template') }}/assets/css/sso.css">
        <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('template') }}/assets/css/components.css">
    </head>

    <body>
        <div id="app">
            <section class="section mr-3 ml-3 mb-4">
                <div class="container-fluid">
                    <div class="card custom-shadow">
                        <div class="mt-2 pt-2">
                            <div class="p-3">
                                @include('layouts.topbar')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    @yield('app')
                </div>
            </section>
            @include('component.modal')
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
        <script src="{{ asset('template') }}/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
        <script src="{{ asset('template') }}/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>

        <!-- Template JS File -->
        <script src="{{ asset('template') }}/assets/js/scripts.js"></script>
        <script src="{{ asset('template') }}/assets/js/custom.js"></script>

        <!-- Page Specific JS File -->
        @stack('app-js')
        @if (Session::has('error'))
            <script>
                iziToast.error({
                    title: 'Error',
                    message: '{{ Session::get('error') }}',
                    position: 'topRight',
                });
            </script>
        @endif
        @if (Session::has('info'))
            <script>
                iziToast.info({
                    title: 'Info',
                    message: '{{ Session::get('info') }}',
                    position: 'topRight',
                });
            </script>
        @endif
        @if (Session::has('warning'))
            <script>
                iziToast.warning({
                    title: 'Warning',
                    message: '{{ Session::get('warning') }}',
                    position: 'topRight',
                });
            </script>
        @endif
        @if (Session::has('success'))
            <script>
                iziToast.success({
                    title: 'Success',
                    message: '{{ Session::get('success') }}',
                    position: 'topRight',
                });
            </script>
        @endif

    </body>
</html>
