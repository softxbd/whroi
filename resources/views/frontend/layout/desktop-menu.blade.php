<nav class="bg-primary text-gray-light fixed w-full top-0 z-50">
    <div class="max-w-[1440px] mx-auto px-2 flex items-center justify-between font-inter gap-4 z-40">
        <!-- logo  -->
        <div>
            <a href="{{ route('homepage') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
        </div>
        <!-- responsive menu  bar  -->
        <div id="menu" class="lg:hidden cursor-pointer">
            <i class="fa-solid fa-bars text-[20px] mr-1"></i>
        </div>
        <!-- navbar  features  -->
        <div class="hidden lg:block">
            <ul class="flex items-center">
                <li class="group py-8">
                    <a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white  hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="#">
                        <span>About Me</span>
                        <!-- <i class="fa-solid fa-chevron-down text-white"></i> -->
                    </a>
                    <!-- submenu  -->
                    <ul class="group-hover:block hidden absolute top-[88px] z-50 bg-[#185bb4]/60">
                        @foreach($about_me_categories as $about_me_category)
                            <li class="px-4 py-2 hover:bg-[#928d8d5d]">
                                <a class="text-sm font-medium" href="{{ route('load.about.me.content',$about_me_category->id) }}">{{ $about_me_category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="group py-8 pl-4">
                    <a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="#">
                        <span>Our Support</span>
                    </a>
                    <!-- submenu  -->
                    <ul class="group-hover:block hidden absolute top-[88px] z-50 bg-[#185bb4]/60">
                        @foreach($our_support_categories as $our_support_category)
                            <li class="px-4 py-2 hover:bg-[#928d8d5d]">
                                <a class="text-sm font-medium" href="{{ route('load.support.content',$our_support_category->id) }}">{{ $our_support_category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="py-8 pl-4"><a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="/src/gallery.html">Emergency Appeals</a></li>
                <li class="py-8 pl-4"><a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="/src/contact-us.html">WHRO Patient</a></li>
                <li class="group py-8 pl-4">
                    <a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="#">
                        <span>Get Involved</span>
                    </a>
                    <!-- submenu  -->
                    <ul class="group-hover:block hidden absolute top-[88px] font-roboto z-50 bg-[#185bb4]/60 min-w-52">
                        @foreach($get_involved_categories as $get_involved_category)
                            <li class="px-4 py-2 hover:bg-[#928d8d5d]">
                                <a class="text-sm font-medium" href="{{ route('load.get.involved.content',$get_involved_category->id) }}">{{ $get_involved_category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="py-8 pl-4"><a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="/src/contact-us.html">Ways to Give</a></li>
                <li class="py-8 pl-4"><a class="text-base font-medium duration-300 p-3 rounded-[25px] border border-primary group-hover:bg-[#185bb4]  group-hover:border-[1.5] group-hover:border-white   hover:border-white hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)]" href="#">Blog</a></li>
                <!-- Donate Button  -->
                <li class="py-6 pl-4"><button class="font-medium bg-[#EE0000] text-[#E6E9F2] rounded py-2 px-4 ml-2">Donate</button></li>
            </ul>
        </div>
</nav>
