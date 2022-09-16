<div class="card-header">
    <h4 class="text-info">Profile {{ auth()->user()->first_name }}</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="pt-4 pb-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <button type="button" class="btn" data-toggle="modal" data-target="#modalProfileUpdate">
                <div class="text-center">
                    @if (auth()->user()->avatar == '-')
                        <img style="height: 260px; cursor: pointer;" src="{{ 'template' }}/assets/img/avatar/avatar-1.png" class="img-thumbnail custom-scale" alt="PP">
                    @else
                        <img style="height: 260px; cursor: pointer;" src="{{ auth()->user()->avatar }}" class="img-thumbnail custom-scale" alt="PP">
                    @endif
                </div>
            </button>

        </div>
        <div class="pt-4 pb-4 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <form method="post" action="{{ route('update.profile-user', auth()->user()->id) }}" class="needs-validation" novalidate="">

                @csrf
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" value="{{ auth()->user()->first_name }}" autocomplete="on" class="form-control" name="first_name" tabindex="1">
                        <div class="invalid-feedback">
                            Input Your First Name Correctly !
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" value="{{ auth()->user()->last_name }}" autocomplete="on" class="form-control" name="last_name" tabindex="2">
                        <div class="invalid-feedback">
                            Input Your Last Name Correctly !
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <input id="email" type="email" value="{{ auth()->user()->email }}" autocomplete="on" class="form-control" name="email" tabindex="3">
                    <div class="invalid-feedback">
                        Input Your Email Correctly !
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


