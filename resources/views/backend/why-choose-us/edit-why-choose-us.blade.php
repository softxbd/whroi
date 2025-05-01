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
                        <form class="mb-3" action="{{ route('update.why.choose.us',$whyChoose->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TITLE<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $whyChoose->title }}" class="form-control" name="title" required>
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">CAPTION<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $whyChoose->caption }}" class="form-control" name="caption" required>
                                        @error('caption')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <img class="img-banner" width="120" height="120" src="{{ asset('backend/images/'.$whyChoose->thumbnail) }}" alt="">
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
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
