@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <!-- Website Analytics-->
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">MANAGE WHRO IMPACT</h5>
                        <a href="{{ route('add.whro.impact') }}" class="btn btn-danger">+ ADD WHRO IMPACT</a>
                    </div>
                    <div class="card-body pb-2">
                        <div class="table-responsive text-nowrap table-min-height">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>TITLE</th>
                                    <th>VIDEO URL</th>
                                    <th>THUMBNAIL</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($sections as $index => $section)
                                    <tr>
                                        <td>1</td>
                                        <td> {{ $section->title }} </td>
                                        <td>{{ $section->video_url }}</td>
                                        <td>
                                            <div class="mb-3">
                                                <img class="img-banner" width="80" height="80" src="{{ asset('backend/images/'.$section->thumbnail) }}" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown"><button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('edit.whro.impact',$section->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                    <form action="{{ route('delete.whro.impact', $section->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="bx bx-trash me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
