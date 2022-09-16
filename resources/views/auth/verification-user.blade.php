@extends('layouts.auth',[
	'title' => 'Data User',
])

@section('auth')

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ 'template' }}/assets/img/logo.jpg" alt="logo" width="125" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data user {{ $user->username }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('update.data-user', $user->id ) }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" autocomplete="on" class="form-control" name="first_name" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Input Your First Name Correctly !
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" autocomplete="on" class="form-control" name="last_name" tabindex="2" required autofocus>
                                        <div class="invalid-feedback">
                                            Input Your Last Name Correctly !
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                        <input id="email" type="email" autocomplete="on" class="form-control" name="email" tabindex="3" required autofocus>
                                        <div class="invalid-feedback">
                                            Input Your Email Correctly !
                                        </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        SUMBMIT
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
