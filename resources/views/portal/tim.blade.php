<div class="card-body">
    <div class="card card-statistic-1 mb-0">
        <div class="card-icon bg-primary">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>Total Tim</h4>
            </div>
            <div class="card-body">
                {{ $data_user->count() }}
            </div>
        </div>
    </div>
</div>

<div class="row pt-4 pl-4 pr-4 pb-5">
    @foreach ($data_user as $user)
        <div class=" col-sm-4 col-md-4 col-lg-4 pt-5">
            <div class="card custom-scale custom-tag-a custom-shadow1">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @if ( $user->avatar == "-")
                            <div class="chocolat-parent" style="margin-top: -65px;">
                                <a href="{{ 'template' }}/assets/img/avatar/avatar-1.png" width="100" height="100" class="chocolat-image" title="{{ $user->first_name }}">
                                    <div data-crop-image="130" class="custom-show-img">
                                        <img alt="image" src="{{ 'template' }}/assets/img/avatar/avatar-1.png" width="100" height="100" class="rounded-circle">
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="chocolat-parent" style="margin-top: -65px;">
                                <a href="{{ $user->avatar }}" width="100" height="100" class="chocolat-image" title="{{ $user->first_name }}">
                                    <div data-crop-image="130" class="custom-show-img">
                                        <img alt="image" src="{{ $user->avatar }}" width="100" height="100" class="rounded-circle">
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="text-center text-dark mt-2">
                        <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                    </div>
                    <hr class="bg-secondary m-4">
                    <div class="text-center">
                        <h6>{{ $user->email }}</h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

