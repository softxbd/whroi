@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">EDIT GET INVOLVED</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('update.get.involved',$get_involveds->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CHOOSE GET INVOLVED CATEGORY<span class="text-danger">*</span></label>
                                        <select name="get_involved_category_id" class="form-control select2">
                                            @foreach($get_involved_categories as $get_involved_category)
                                            <option value="{{ $get_involved_category->id }}" @if($get_involved_category->id == $get_involveds->get_involved_category_id) selected @endif>{{ $get_involved_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('get_involved_category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">GET INVOLVED DESCRIPTION<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" cols="30" rows="15">{{ $get_involveds->description }}</textarea>
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
