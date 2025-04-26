@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">EDIT ABOUT ME</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('update.about.me',$about_me->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CHOOSE ABOUT ME CATEGORY<span class="text-danger">*</span></label>
                                        <select name="about_me_category_id" class="form-control select2">
                                            @foreach($about_me_categories as $about_me_category)
                                            <option value="{{ $about_me_category->id }}" @if($about_me_category->id == $about_me->about_me_category_id) selected @endif>{{ $about_me_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('about_me_category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ABOUT ME DESCRIPTION<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" cols="30" rows="15">{{ $about_me->description }}</textarea>
                                        @error('description')
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
