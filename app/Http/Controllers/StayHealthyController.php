<?php

namespace App\Http\Controllers;

use App\Models\StayHealthy;
use App\Models\StayHealthyPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class StayHealthyController extends Controller
{
    // Create Homepage Banner
    public function editStayHealthy()
    {
        $data['stay'] = StayHealthy::find(1);
        return view('backend.stay-healthy.edit-stay-healthy',$data);
    }

    // Updating Homepage Banner
    public function updateStayHealthy(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');

        $stay = StayHealthy::find(1);
        $stay->title = $title;
        $stay->caption = $caption;

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
            @unlink(public_path('backend/images/'.StayHealthy::where('id',1)->first()->thumbnail));
        }

        $stay->save();

        $notification = array(
            'message' => 'Stay health updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.stay.healthy')->with($notification);

    }

    public function addStayHealthyPoint()
    {
        return view('backend.stay-healthy.add-section');
    }

    public function storeStayHealthyPoint(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');

        $stay = new StayHealthyPoint();
        $stay->title = $title;
        $stay->caption = $caption;

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
            'message' => 'Stay health section added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add.stay.healthy.point')->with($notification);
    }

    public function manageStayHealthyPoint()
    {
        $data['sections'] = StayHealthyPoint::all();
        return view('backend.stay-healthy.manage-section',$data);
    }

    public function editStayHealthyPoint($id)
    {
        $data['section'] = StayHealthyPoint::find($id);
        return view('backend.stay-healthy.edit-section',$data);
    }

    public function updateStayHealthyPoint(Request $request,$id)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');

        $stay = StayHealthyPoint::find($id);
        $stay->title = $title;
        $stay->caption = $caption;

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
            'message' => 'Stay health section updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.stay.healthy.point',$id)->with($notification);
    }

    public function deleteStayHealthyPoint(Request $request, $id)
    {
        $stay = StayHealthyPoint::find($id);

        if (!$stay) {
            return redirect()->route('manage.stay.healthy.point')->with([
                'message' => 'Stay health section not found',
                'alert-type' => 'error'
            ]);
        }

        // Delete thumbnail file if it exists
        if ($stay->thumbnail && file_exists(public_path('backend/images/' . $stay->thumbnail))) {
            unlink(public_path('backend/images/' . $stay->thumbnail));
        }

        // Delete the database record
        $stay->delete();

        $notification = [
            'message' => 'Stay health section deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.stay.healthy.point')->with($notification);
    }

}
