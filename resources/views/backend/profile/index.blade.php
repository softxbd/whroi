@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card mb-6" class="row">
            <!-- Account -->
            <form id="formAccountSettings" action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-4">
                    <div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="name">Full Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="name"
                                    name="Full name"
                                    value="{{ old('name', $profile->name) }}"
                                    autofocus/>
                            </div>
                            <div class="mb-4">
                                <label for="email">E-mail (N.B: Contact with technical team for changing admin email, please)</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    readonly
                                    value="{{$profile->email}}"/>
                            </div>
                            <div class="mb-4">
                                <label for="email">Recent photo</label>
                                @if($profile->profile_photo_path)
                                    <img style=""
                                         width="80px"
                                         height="80px"
                                         src="{{ asset('/backend/images/' . $profile->profile_photo_path) }}"
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
                            </div>
                            <div class="mb-4">
                                <label for="email">Upload photo</label>
                                <input type="file" class="form-control" name="profile_photo_path">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /Account -->
        </div>
        <div class="app-overlay"></div>
    </div>
    <script>
        document.getElementById('profile_photo_path').addEventListener('change', function (event) {
            let reader = new FileReader();
            reader.onload = function () {
                document.getElementById('uploadedAvatar').src = reader.result;
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>

@endsection
