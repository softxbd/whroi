<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\AboutMeCategory;
use App\Models\GetInvolvedCategory;
use App\Models\HomepageBanner;
use App\Models\HowWeUseFunds;
use App\Models\MeetWhroPatient;
use App\Models\OurStory;
use App\Models\StayHealthy;
use App\Models\StayHealthyPoint;
use App\Models\SupportCategory;
use App\Models\WhroImpact;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // index
    public function index()
    {
        $data['HomepageBanner'] = HomepageBanner::find(1);
        $data['StayHealthy'] = StayHealthy::find(1);
        $data['StayHealthyPoints'] = StayHealthyPoint::all();
        $data['OurStory'] = OurStory::find(1);
        $data['fund'] = HowWeUseFunds::find(1);
        $data['why_choose_us_items'] = WhyChooseUs::all();
        $data['patients'] = MeetWhroPatient::all();
        $data['impacts'] = WhroImpact::all();
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['our_support_categories'] = SupportCategory::all();
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['default_video_url'] = WhroImpact::orderBy('id','ASC')->first()->video_url;
        return view('frontend.index',$data);
    }
}
