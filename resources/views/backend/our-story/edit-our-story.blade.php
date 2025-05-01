@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">UPDATE OUR STORY</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('update.our.story') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TITLE<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $story->title }}" class="form-control" name="title" required>
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">CAPTION<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $story->caption }}" class="form-control" name="caption" required>
                                        @error('caption')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">DESCRIPTION<span class="text-danger">*</span></label>
                                        <textarea type="text" rows="7" class="form-control" name="description" required>{{ $story->description }}</textarea>
                                        @error('caption')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <img class="img-banner" width="400" height="300" src="{{ asset('backend/images/'.$story->banner) }}" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">UPLOAD BACKGROUND - 1<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="banner">
                                        @error('banner')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <img class="img-banner" width="400" height="300" src="{{ asset('backend/images/'.$story->banner2) }}" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">UPLOAD BACKGROUND - 2<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="banner2">
                                        @error('banner2')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <img class="img-banner" width="400" height="300" src="{{ asset('backend/images/'.$story->banner3) }}" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">UPLOAD BACKGROUND - 3<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="banner3">
                                        @error('banner3')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
