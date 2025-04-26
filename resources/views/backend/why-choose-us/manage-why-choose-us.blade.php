@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <!-- Website Analytics-->
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">MANAGE  WHY CHOOSE US </h5>
                    </div>
                    <div class="card-body pb-2">
                        <div class="table-responsive text-nowrap table-min-height">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Caption</th>
                                    <th>Thumbnail</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                 @foreach($values as $index => $value)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td> {{ $value->title }} </td>
                                        <td>
                                            <div class="mb-3">
                                                <img class="img-banner" width="80" height="80" src="{{ asset('backend/images/'.$value->thumbnail) }}" alt="">
                                            </div>
                                        </td>
                                        <td>{{$value->caption}}</td>

                                        <td>
                                            <div class="dropdown"><button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
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
