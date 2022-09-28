@extends('layouts.app',[
	'title' => 'Portal',
])

@section('app')

    <div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card custom-shadow author-box card-warning">
                    <div class="card-header">
                      <h4 class="text-warning">User</h4>
                      <div class="card-header-action">
                        <a data-collapse="#collapse-user" class="btn btn-icon btn-warning" href="#"><i class="fas fa-plus"></i></a>
                      </div>
                    </div>
                    <div class="collapse" id="collapse-user" style="">
                        <div class="card-body">
                            <div class="author-box-left pb-4">
                                @if (auth()->user()->avatar == "-")
                                    <img alt="image" src="{{ 'template' }}/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                                @else
                                    <img alt="image" src="{{ auth()->user()->avatar }}" width="100" height="100" class="rounded-circle author-box-picture">
                                @endif

                            </div>
                            <div class="author-box-details pt-4">
                                <div class="author-box-name">
                                    <h5 class="text-warning">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                                </div>
                                <div class="author-box-job">Web Developer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card custom-shadow card-primary">
                    <div class="card-header">
                      <h4>Menu</h4>
                      <div class="card-header-action">
                        <a data-collapse="#collapse-menu" class="btn btn-icon btn-primary" href="#"><i class="fas fa-plus"></i></a>
                      </div>
                    </div>
                    <div class="collapse" id="collapse-menu" style="">
                      <div class="card-body">
                        <ul class="nav nav-pills flex-column" id="myAplikasi" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="aplikasi-tab1" data-toggle="tab" href="#aplikasi1" role="tab" aria-controls="aplikasi" aria-selected="false">Aplikasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tim-tab1" data-toggle="tab" href="#tim1" role="tab" aria-controls="tim" aria-selected="false">Tim</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" id="logout1" class=" nav-link has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content no-padding" id="myTab2Content">
            <div class="tab-pane fade" id="aplikasi1" role="tabpanel" aria-labelledby="aplikasi-tab1">
                <div>
                    @include('portal.aplikasi')
                </div>
            </div>
            <div class="tab-pane card card-info fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
                @include('portal.profile')
            </div>
            <div class="tab-pane fade" id="tim1" role="tabpanel" aria-labelledby="tim-tab1">
                @include('portal.tim')
            </div>
        </div>
    </div>

@endsection

@push('app-js')
    <script>
        $('#img-banner').on('change',function(){
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        function readURLAdd(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#preview-img-banner').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#img-banner").change(function(){
                    readURLAdd(this);
                });
    </script>

@endpush
