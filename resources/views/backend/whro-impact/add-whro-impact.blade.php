@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">ADD WHRO IMPACT</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('store.whro.impact') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TITLE<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title">
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">VIDEO URL<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="video_url">
                                        @error('video_url')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">UPLOAD THUMBNAIL<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="thumbnail">
                                        @error('thumbnail')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ADD WHRO IMPACT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
