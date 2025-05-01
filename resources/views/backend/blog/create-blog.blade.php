@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">CREATE BLOG</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="#" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CHOOSE BLOG CATEGORY<span class="text-danger">*</span></label>
                                        <select name="brand_id" class="form-control select2" required>
                                            <option value="">SELECT BLOG CATEGORY</option>
                                            <option value="1">CATEGORY-1</option>
                                            <option value="1">CATEGORY-2</option>
                                            <option value="1">CATEGORY-3</option>
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">BLOG TITLE<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="bank_name" required>
                                        @error('blog_title')
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
