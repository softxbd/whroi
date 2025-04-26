<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\AboutMeCategory;
use App\Models\GetInvolvedCategory;
use App\Models\SupportCategory;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function manageAboutMe()
    {
        $data['about_mes'] = AboutMe::join('about_me_categories','about_mes.about_me_category_id','=','about_me_categories.id')->select('about_mes.*','about_me_categories.name')->get();
        return view('backend.about-me.manage-about-me',$data);
    }

    public function editAboutMe($id)
    {
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['about_me'] = AboutMe::find($id);
        return view('backend.about-me.edit-about-me',$data);
    }

    public function updateAboutMe(Request $request,$id)
    {
        $about_me_category_id = $request->input('about_me_category_id');
        $description = $request->input('description');

        $count = AboutMe::where('about_me_category_id',$about_me_category_id)->whereNotIn('id',[$id])->count();
        if($count > 0){
            $notification = array(
                'message' => 'You have already used the about me category in another topics of *About Me* !',
                'alert-type' => 'error'
            );
            return redirect()->route('edit.about.me',$id)->with($notification);
        }

        $support = AboutMe::find($id);
        $support->about_me_category_id = $about_me_category_id;
        $support->description = $description;
        $support->save();

        $notification = array(
            'message' => 'About me updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.about.me',$id)->with($notification);

    }

    public function loadContent($category_id)
    {
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['our_support_categories'] = SupportCategory::all();
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['content'] = AboutMe::join('about_me_categories','about_mes.about_me_category_id','=','about_me_categories.id')->select('about_mes.*','about_me_categories.name')->where('about_mes.about_me_category_id',$category_id)->first();
        return view('frontend.common-content',$data);
    }

}
