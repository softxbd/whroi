<?php

namespace App\Http\Controllers;

use App\Models\WhroImpact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class WHROImpactController extends Controller
{
    public function addWHROImpact()
    {
        return view('backend.whro-impact.add-whro-impact');
    }

    public function storeWHROImpact(Request $request)
    {
        $title = $request->input('title');
        $video_url = $request->input('video_url');

        $stay = new WhroImpact();
        $stay->title = $title;
        $stay->video_url = $video_url;

        if($request->hasFile('thumbnail')){
            $file                   = $request->file('thumbnail');
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
            $stay['thumbnail'] = $filename;
        }

        $stay->logged_in_id = Auth::user()->id;
        $stay->save();

        $notification = array(
            'message' => 'WHRO impact added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add.whro.impact')->with($notification);
    }

    public function manageWHROImpact()
    {
        $data['sections'] = WhroImpact::all();
        return view('backend.whro-impact.manage-whro-impact',$data);
    }

    public function editWHROImpact($id)
    {
        $data['section'] = WhroImpact::find($id);
        return view('backend.whro-impact.edit-whro-impact',$data);
    }

    public function updateWHROImpact(Request $request,$id)
    {
        $title = $request->input('title');
        $video_url = $request->input('video_url');

        $stay = WhroImpact::find($id);
        $stay->title = $title;
        $stay->video_url = $video_url;

        if($request->hasFile('thumbnail')){
            $file                   = $request->file('thumbnail');
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
            $stay['thumbnail'] = $filename;
        }

        $stay->logged_in_id = Auth::user()->id;
        $stay->save();

        $notification = array(
            'message' => 'WHRO impact updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.whro.impact',$id)->with($notification);
    }

}
