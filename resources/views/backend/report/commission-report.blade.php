@extends('backend.app.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <!-- Website Analytics-->
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">COMMISSION REPORT</h5>
                    </div>
                    <div class="card-body pb-2">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="date-mask">From Date<span class="text-danger">*</span></label>
                                    <input type="text" name="from_date" id="date-mask" class="form-control date-mask dob-picker" placeholder="DD-MM-YYYY" />
                                    @error('from_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="date-mask">To Date<span class="text-danger">*</span></label>
                                    <input type="text" name="to_date" id="date-mask" class="form-control date-mask dob-picker" placeholder="DD-MM-YYYY" />
                                    @error('to_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mt-4">
                                    <button type="submit" id="search" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3" id="load_content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $("#search").on('click',function(e){
                e.preventDefault();

                let from_date = $('[name="from_date"]').val();
                let to_date = $('[name="to_date"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    'url':"{{ route('get.commission.report') }}",
                    'type':'post',
                    'dataType':'text',
                    data:{from_date:from_date,to_date:to_date},
                    success:function(data)
                    {
                        //console.log(data);
                        $("#load_content").empty();
                        $("#load_content").html(data);
                    }
                });

            })

        });
    </script>
@endsection
