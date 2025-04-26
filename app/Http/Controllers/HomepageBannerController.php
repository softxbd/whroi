<?php

namespace App\Http\Controllers;

use App\Models\HomepageBanner;
use Illuminate\Http\Request;
use Str;

class HomepageBannerController extends Controller
{
    // Create Homepage Banner
    public function editHomepageBanner()
    {
        $data['banner'] = HomepageBanner::find(1);
        return view('backend.homepage-banner.edit-homepage-banner',$data);
    }

    // Updating Homepage Banner
    public function updateHomepageBanner(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');

        $banner = HomepageBanner::find(1);
        $banner->title = $title;
        $banner->caption = $caption;

        if($request->hasFile('banner')){
            $file                   = $request->file('banner');
            $image_original_name    = $file->getClientOriginalName();

            $explode = explode(" ",$image_original_name);
            $count = count($explode);

            if($count > 0){
                $final_name = strtolower(implode("-",$explode));
            }else{
                $final_name = strtolower($image_original_name);
            }

            $filename = date('YmdHi').'-'.time().'-'.Str::random(12).'-'.$final_name;
            $file->move(public_path('backend/images'),$filename);
            $banner['banner'] = $filename;
            @unlink(public_path('backend/images/'.HomepageBanner::where('id',1)->first()->banner));
        }

        $banner->save();

        $notification = array(
            'message' => 'Homepage banner updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.homepage.banner')->with($notification);

    }

}
