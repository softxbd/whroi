@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">MEET WHRO PATIENTS CREATE</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('store.meet.whro.patients') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TITLE<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" required>
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">goal<span class="text-danger">*</span></label>
                                        <input type="number"  class="form-control" name="goal" required>
                                        @error('goal')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">transplant type<span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" name="transplant_type" required>
                                        @error('transplant_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">transplant status<span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" name="transplant_status" required
                                        @error('transplant_status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">fayetteville<span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" name="fayetteville" required>
                                        @error('fayetteville')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                  <div class="mb-3">
                                        <label class="form-label">UPLOAD THUMBNAIL<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="thumbnail" required>
                                        @error('thumbnail')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
