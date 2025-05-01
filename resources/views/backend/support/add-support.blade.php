@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">ADD SUPPORT</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('store.support') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CHOOSE SUPPORT CATEGORY<span class="text-danger">*</span></label>
                                        <select name="support_category_id" class="form-control select2" required>
                                            @foreach($support_categories as $support_category)
                                            <option value="{{ $support_category->id }}" >{{ $support_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('support_category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">SUPPORT DESCRIPTION<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" cols="30" rows="15" required></textarea>
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
