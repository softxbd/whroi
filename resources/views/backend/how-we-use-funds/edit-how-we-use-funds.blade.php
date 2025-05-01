@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"> HOW WE USE FUNDS</h5>
                    </div>
                    <div class="card-body pb-2">
                        <form class="mb-3" action="{{ route('update.how.we.use.funds') }}" enctype="multipart/form-data"
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TITLE<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->title }}" class="form-control"
                                               name="title" required>
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">CAPTION<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="caption" rows="4" required>{{ $funds->caption }}</textarea>

                                        @error('caption')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Programs<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->programs }}" class="form-control"
                                               name="programs" required>
                                        @error('programs')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Programs Value <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->programs_value }}" class="form-control"
                                               name="programs_value" required>
                                        @error('programs_value')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fundraising<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->fundraising }}" class="form-control"
                                               name="fundraising" required>
                                        @error('fundraising')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fundraising Value<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->fundraising_value }}" class="form-control"
                                               name="fundraising_value" required>
                                        @error('fundraising_value')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Management <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->management }}" class="form-control"
                                               name="management" required>
                                        @error('management')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Management Value<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $funds->management_value }}" class="form-control"
                                               name="management_value" required>
                                        @error('management_value')
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
