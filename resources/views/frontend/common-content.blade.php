@extends('frontend.layout.app')
@section('content')
    <!-- main section  -->
    <div class="container">
        <!-- category direction  -->
        <div class="">
            <span class="text-primary font-medium ">Home</span>
            <i class="fa-solid fa-angle-right text-[#343436] pr-2 pl-1"></i>
            <span class="text-gray-darker font-medium ">Get Involved</span>
            <i class="fa-solid fa-angle-right text-[#343436] pr-2 pl-1"></i>
            <span class="text-gray-darker font-medium ">Press Releases</span>
        </div>

        <!-- main content  -->
        <h1 class="text-primary text-xl md:text-[32px] font-semibold py-8 md:py-10">{{ $content->name }}</h1>
        <div class="text-base font-normal text-black space-y-5 md:space-y-8">
            {!! $content->description !!}
        </div>

        </div>
    </div>
@endsection
