@extends('layouts.auth',[
	'title' => 'Login',
])

@section('auth')

    <section class="section">
        <div class="container mt-5">
            <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ asset('template') }}/assets/img/logo.jpg" alt="logo" width="125" class="shadow-light rounded-circle">
                </div>
                <div class="card card-primary">
                    <div class="card-header"><h4>Login</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" autocomplete="on" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Input Your Username Correctly !
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" autocomplete="on" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Input Your Password Correctly !
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; MS - Team 2022
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection


@push('auth-js')
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
@endpush
