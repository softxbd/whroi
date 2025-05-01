@extends('backend.layout.app')
@section('content')
    <div class="col app-emails-list">

        <div class="card mb-6">
            <!-- Account -->
            <form id="formAccountSettings" action="{{ route('update.profile') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                        @if($profile->profile_photo_path)
                            <img
                                src="{{ asset('storage/images/' . $profile->profile_photo_path) }}"
                                alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded"
                                id="uploadedAvatar"/>
                        @endif
                        @if(!$profile->profile_photo_path)
                            <img
                                src="assets/img/avatars/1.png"
                                alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded"
                                id="uploadedAvatar"/>
                        @endif

                        <div class="button-wrapper">
                            <label for="profile_photo_path" class="btn btn-primary me-3 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input
                                    type="file"
                                    id="profile_photo_path"
                                    name="profile_photo_path"
                                    class="account-file-input"
                                    hidden
                                    accept="image/png, image/jpeg"/>
                            </label>
                            <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">

                    <div class="row">
                        <div class="mb-4 col-md-6">
                            <label for="name" class="form-label">First Name</label>
                            <input
                                class="form-control"
                                type="text"
                                id="name"
                                name="Full name"
                                value="{{ old('name', $profile->name) }}"
                                autofocus/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                                class="form-control"
                                type="text"
                                id="email"
                                name="email"
                                readonly
                                value="{{$profile->email}}"
                                placeholder="john.doe@example.com"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">US (+1)</span>
                                <input
                                    type="text"
                                    id="phoneNumber"
                                    name="mobile"
                                    value="{{ old('mobile', $profile->mobile) }}"
                                    class="form-control"
                                    placeholder="202 555 0111"/>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address"
                                   value="{{ old('address', $profile->address) }}" name="address"
                                   placeholder="Address"/>
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-3">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>

                </div>
            </form>
            <!-- /Account -->
        </div>
        <div class="app-overlay"></div>
    </div>
    <script>
        document.getElementById('profile_photo_path').addEventListener('change', function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                document.getElementById('uploadedAvatar').src = reader.result;
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>

@endsection
