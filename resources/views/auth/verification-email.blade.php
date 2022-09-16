@extends('layouts.auth',[
	'title' => 'Email Verification',
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
                    <div class="card-header"><h4>Email Verification</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('verification.send') }}" class="needs-validation" novalidate="">
                            @csrf
                            <h6>
                                Hi, {{ auth()->user()->first_name }} If The Verification Email Has Not Been Sent, Please Click The Button Below
                            </h6>
                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                    RESEND EMAIL VERIFICATION
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
