<?php

namespace App\Http\Controllers;
use App\Models\OurStory;
use Illuminate\Http\Request;
use Str;

class OurStoryController extends Controller
{
    public function editOurStory()
    {
        $data['story'] = OurStory::find(1);
        return view('backend.our-story.edit-our-story',$data);
    }


    public function updateOurStory(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');
        $description = $request->input('description');

        $story = OurStory::find(1);
        $story->title = $title;
        $story->caption = $caption;
        $story->description = $description;

        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $file->move(public_path('backend/images'),"one.jpg");
            $story['banner'] = "one.jpg";
        }

        if($request->hasFile('banner2')){
            $file = $request->file('banner2');
            $file->move(public_path('backend/images'),"two.jpg");
            $story['banner2'] = "two.jpg";
        }

        if($request->hasFile('banner3')){
            $file                   = $request->file('banner3');
            $file->move(public_path('backend/images'),"three.jpg");
            $story['banner3'] = "three.jpg";
        }

        $story->save();

        $notification = array(
            'message' => 'Our story updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.our.story')->with($notification);

    }
}
