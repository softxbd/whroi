@extends('frontend.layout.app')
@section('content')
    <!-- hero section  -->
    <div class="mt-[74px] md:mt-[88px] bg-no-repeat bg-cover bg-center relative w-full md:h-[576px] pb-8 md:pb-0" style="background-image: url({{ asset('backend/images/'.$HomepageBanner->banner) }});" >
        <!-- Overlay  -->
        <div class="absolute inset-0 bg-[#000000] bg-opacity-5"></div>
        <div class="max-w-[1440px] w-full mx-auto flex flex-col md:flex-row md:justify-between items-center">

            <!-- hero content  -->
            <div class="md:w-3/5 relative py-10 pl-8 pr-2 md:pl-0  space-y-6 md:space-y-12">
                <h1 class="font-semibold text-3xl md:text-[48px] text-[#E9EBED] leading-tight">{!! $HomepageBanner->title !!}</h1>
                <h3 class="text-xl md:text-2xl font-medium text-[#E9EBED]">{{ $HomepageBanner->caption }}</h3>
                <button class="bg-primary text-white font-medium text-base rounded py-2 px-4">Support Our Mission</button>
            </div>

            <!-- donation container  -->
            <div class="w-[88%] md:w-fit py-5 px-4 rounded-lg bg-white md:mt-11 z-40">
                <div class="flex gap-4 items-center justify-center">
                    <img src="./images/secure.png" alt="">
                    <h2 class="text-2xl text-primary font-medium">Secure Donation</h2>
                </div>

                <!-- duration  -->
                <div class="flex gap-5 my-4">
                    <h1 class="w-full py-2 px-8 rounded border-[1.4px] border-primary text-primary text-base font-normal hover:bg-[#D9E2EE] hover:border-[#D9E2EE]  duration-200 hover:text-darker">One-Tiem</h1>
                    <h1 class="w-full py-2 px-8 rounded border-[1.4px] border-primary text-primary text-base font-normal hover:bg-[#D9E2EE] hover:border-[#D9E2EE]  duration-200 hover:text-darker">Monthly</h1>
                </div>

                <!-- payment amount -->
                <div class="grid grid-cols-3 gap-x-4 gap-y-[10px]">
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$1,000</h1>
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$500</h1>
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$250</h1>
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$100</h1>
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$50</h1>
                    <h1 class="bg-[#D9E2EE] py-2 px-6 rounded text-darker text-lg text-center hover:bg-primary hover:text-[#DEDEDF] duration-200">$25</h1>
                </div>

                <!-- enter own amount -->
                <div class="my-4 text-right">
                    <div class="flex gap-4 items-center justify-end ">
                        <span class="text-right">Enter Your Own <br> Amount</span>
                        <input class="w-[178px] font-medium rounded border-[1.4px] placeholder:text-primary text-primary border-primary p-2" type="number" name="amount" placeholder="$ 1200" id="amount">
                    </div>
                    <span class="text-[#EE0000] text-xs pt-4">* Contributions must be at least $5</span>
                </div>
                <div class="w-full bg-primary text-gray-light py-2 px-4 rounded flex gap-2 items-center justify-center">
                    <i class="fa-regular fa-credit-card size-6 mt-2"></i>
                    <span>Credit Card</span>
                </div>
                <!-- payment method  -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <img class="w-full" src="{{ asset('frontend/images/payment/Frame 125.png') }}" alt="">
                    <img class="w-full" src="{{ asset('frontend/images/payment/Frame 126.png') }}" alt="">
                    <img class="w-full" src="{{ asset('frontend/images/payment/Frame 127.png') }}" alt="">
                    <img class="w-full" src="{{ asset('frontend/images/payment/Frame 129.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>

    <!-- our services  -->
    <div class="max-w-[1550px] mx-auto pt-12 pb-11 bg-no-repeat bg-right-bottom" style="background-image: url({{ asset('backend/images/'.$StayHealthy->thumbnail) }});">
        <div class="max-w-[1440px] mx-auto px-3" >
            <div class="text-center mb-10">
                <h1 class="text-[#0E131A] text-4xl md:text-5xl font-medium mb-6">{{ $StayHealthy->title }}</h1>
                <p class="text-[#76777A] text-sm md:text-lg font-medium">{{ $StayHealthy->caption }}</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 z-50">
                @foreach($StayHealthyPoints as $StayHealthyPoint)
                    <!-- single service  -->
                    <div class="rounded-lg py-2 px-4 min-h-[225px] flex flex-col items-center shadow-custom w-full bg-white">
                        <img src="{{ asset('backend/images/'.$StayHealthyPoint->thumbnail) }}" alt="{{ $StayHealthyPoint->title }}">
                        <h3 class="text-lg md:text-[22px] font-medium text-center text-[#0E131A] hover:text-primary-mute duration-200 pt-3 pb-4">{{ $StayHealthyPoint->title }}</h3>
                        <p class="text-sm md:text-base text-[#76777A] text-center">{{ $StayHealthyPoint->caption }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- our story  -->
    <div id="bg-carousel" class="bg-no-repeat bg-cover object-fill animate-slide">
        <div class="container py-11">
            <div class="w-full md:w-[510px] space-y-3 md:space-y-8">
                <h1 class="text-[40px] text-primary font-semibold">{{ $OurStory->title }}</h1>
                <h1 class="text-[32px] text-primary-mute font-bubblegum">{{ $OurStory->caption }}</h1>
                <p class="text-gray-darker text-lg">{{ $OurStory->description }}</p>
                <button class="rounded py-2 px-4 bg-primary text-white">Learn More</button>
            </div>
        </div>
    </div>

    <!-- use funds  -->
    <div class="bg-[#F3F5F9] py-[5px]">
        <div class="container py-[75px] bg-no-repeat" style="background-image: url({{ asset('frontend/images/use\ Funds.png') }});">
            <div class="max-w-[1280px] mx-auto flex flex-col md:flex-row gap-14 md:gap-[153px]">

                <div class="w-full md:w-[364px]">
                    <h1 class="text-[40px] text-darker font-semibold">{{ $fund->title }}</h1>
                    <p class="text-darker text-sm font-medium pt-[23px] pb-6 leading-[]">{{ $fund->caption }}</p>
                    <button class="text-primary rounded py-2 font-medium">Learn More...</button>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between items-center md:items-start gap-8 md:gap-[122px]">
                    <!-- Programs -->
                    <div class="relative">
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle stroke-primary"
                                  stroke-dasharray="85, 100"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                        </svg>
                        <h1 class="absolute top-[50px] left-[48px] text-[32px] font-bold font-oswald text-primary">{{ $fund->programs_value }}%</h1>
                        <p class="mt-4 text-2xl text-darker text-center">{{ $fund->programs }}</p>
                    </div>
                    <!-- Fundraising -->
                    <div class="relative">
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle stroke-primary"
                                  stroke-dasharray="12, 100"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                        </svg>
                        <h1 class="absolute top-[50px] left-[55px] text-[32px] font-bold font-oswald text-primary">{{ $fund->fundraising_value }}%</h1>
                        <p class="mt-4 text-2xl text-darker text-center">{{ $fund->fundraising }}</p>
                    </div>
                    <!-- Management & General Admin -->
                    <div class="relative">
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle stroke-primary"
                                  stroke-dasharray="3, 100"
                                  d="M18 2.0845
                                  a 15.9155 15.9155 0 0 1 0 31.831
                                  a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                        </svg>
                        <h1 class="absolute top-[50px] left-[74px] text-[32px] font-bold font-oswald text-primary">{{ $fund->management_value }}%</h1>
                        <p class="mt-4 text-2xl text-darker text-center">{!! $fund->management !!}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Choosen section  -->
    <div class="max-w-[1440px] mx-auto my-0 py-14 px-3 bg-no-repeat">
        <div class="max-w-[1280px] mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-[40px] text-[#0E131A] font-semibold">Why Choose <span class="text-[#2C7AF6]">Us?</span></h1>
                <p class="text-sm md:text-lg text-[#76777A] mt-4 md:mt-6">We care about your well-being and provide essential healthcare support.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 z-40">
                @foreach($why_choose_us_items as $why_choose_us_item)
                    <div class="group bg-white hover:bg-primary duration-200 rounded-lg py-2 px-4 min-h-[225px] flex flex-col items-center shadow-custom-thin w-full">
                        <img src="{{ asset('backend/images/'.$why_choose_us_item->thumbnail) }}" alt="service image">
                        <h3 class="text-lg group-hover:text-gray-light duration-200 md:text-xl text-center font-medium text-[#2C7AF6] pt-3 pb-4 md:pb-6">{{ $why_choose_us_item->title }}</h3>
                        <p class="text-sm group-hover:text-gray-light duration-200 md:text-base text-[#76777A] text-center">{{ $why_choose_us_item->caption }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- our Patients -->
    <div class="bg-white md:bg-[#FDF5F5] w-full">
        <div class="max-w-[1440px] w-full mx-auto py-9 md:bg-our-patient-image md:bg-no-repeat">
            <div class="max-w-[1122px] mx-auto px-3">
                <div class="w-full md:w-1/2 mx-auto text-center mb-10">
                    <h1 class="text-[32px] text-[#0E131A] font-semibold">Meet WHRO Patients</h1>
                    <p class="text-base text-[#6F7073] mt-4">Support WHRO to provide essential medical care and resources to thousands in need worldwide,  ensuring no one is left without the care they deserve.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($patients as $patient)
                        <div class="rounded shadow-custom bg-white">
                            <img class="rounded-t w-full h-[250px]" src="{{ asset('backend/images/'.$patient->thumbnail) }}" alt="">
                            <div class="p-4 space-y-6">
                                <div class="flex justify-between items-center">
                                    <h1 class="w-[142px] font-medium text-base text-white rounded py-2 px-3 bg-[#FFAB00]">Goal: {{ $patient->goal }}</h1>
                                    <button class="text-[#EE0000] hover:text-gray-light hover:bg-[#EE0000] duration-200 font-medium border-2 border-[#EE0000] rounded py-2 px-8">Donate</button>
                                </div>
                                <h1 class="text-2xl font-semibold text-[#2C7AF6]">{{ $patient->title }}</h1>
                                <h5 class="text-[#0E131A] font-semibold">Transplant Type: <span class="font-medium">{{ $patient->transplant_type }}</span></h5>
                                <h5 class="text-[#0E131A] font-semibold">Transplant Status: <span class="font-medium">{{ $patient->transplant_status }}</span></h5>
                                <div>
                                    <span class="text-[#343436] border-r-2 border-r-[#2C7AF6]">Fayetteville,  </span> <span class="text-[#343436] pl-1">{{ $patient->fayetteville }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- impact  -->
    <div class="container my-2 bg-no-repeat bg-center" style="background-image: url({{ asset('backend/images/Vector/4.png')}});">
        <div class="mb-6 md:mb-10 text-[#0E131A]">
            <h1 class="text-[32px] font-semibold">WHRO Impact</h1>
            <p class="mt-4 md:mt-6">Your gifts to WHRO give hope. Learn how your support directly <br> impacts transplant families.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-16">
            <div class="flex-2 overflow-y-scroll custom-scrollbar scrollbar-left pl-1 h-[422px] bg-white">
                @foreach($impacts as $impact)
                    <div video_url="{{ $impact->video_url }}" class="flex items-center gap-4 hover:bg-[#2C7AF6] cursor-pointer duration-300 text-primary hover:text-white rounded-lg p-4 get_video_url">
                        <img class="rounded w-[180px] h-[100px] object-cover" src="{{ asset('backend/images/'.$impact->thumbnail) }}" alt="">
                        <h1 class="text-xl font-semibold">{{ $impact->title }}</h1>
                    </div>
                @endforeach
            </div>
            <div class="flex-grow md:w-[738px] md:h-[428px]">
                <iframe id="video_placeholder" class="w-full aspect-video" height="428px" src="{{ $default_video_url }}" title="impacts transplant families"></iframe>
            </div>
        </div>
    </div>
@endsection
