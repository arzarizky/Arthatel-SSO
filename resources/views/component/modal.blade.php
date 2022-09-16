<div class="modal fade" id="modalProfileUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticProfileBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateProfileLabel">Update Foto Profile {{ auth()->user()->first_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pt-4 pb-4">
                    <div>
                        <div class="input-group mb-3" id="gambar-banner">
                            <div class="custom-file">
                                <form id="logout-form" method="post" action="{{ route('update.profile-avatar-user', auth()->user()->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input style="cursor: pointer;" type="file" name="avatar" class="custom-file-input" id="img-banner"/>
                                    <label class="custom-file-label" for="img-banner">Pilih Gambar Banner</label>
                                </form>
                            </div>
                        </div>
                        <div>
                            @if (auth()->user()->avatar == '-')
                                <img src="{{ 'template' }}/assets/img/avatar/avatar-1.png" class="img-thumbnail" alt="PP" id='preview-img-banner'>
                            @else
                                <img src="{{ auth()->user()->avatar }}" class="img-thumbnail" alt="PP" id='preview-img-banner'>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-secondary btn-shadow" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-shadow" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Save changes</button>
            </div>
        </div>
    </div>
</div>
