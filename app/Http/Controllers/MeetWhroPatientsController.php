<?php

namespace App\Http\Controllers;

use App\Models\MeetWhroPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class MeetWhroPatientsController extends Controller
{
    public function createMeetWhroPatients()
    {
        return view('backend.meet-whro-patients.create-meet-whro-patients');
    }

    public function manageMeetWhroPatients()
    {
        $data['values'] = MeetWhroPatient::all();
        return view('backend.meet-whro-patients.manage-meet-whro-patients',$data);
    }

    public function storeMeetWhroPatients(Request $request)
    {
        $title = $request->input('title');
        $goal = $request->input('goal');
        $transplant_type = $request->input('transplant_type');
        $transplant_status = $request->input('transplant_status');
        $fayetteville = $request->input('fayetteville');

        $data = new MeetWhroPatient();
        $data->title = $title;
        $data->goal = $goal;
        $data->transplant_type = $transplant_type;
        $data->transplant_status = $transplant_status;
        $data->fayetteville = $fayetteville;
        $data->logged_in_id = Auth::id();

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
            $data['thumbnail'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Meet whro patient added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.stay.healthy')->with($notification);
    }

    public function editMeetWhroPatients($id)
    {
        $data['patient'] = MeetWhroPatient::find($id);
        return view('backend.meet-whro-patients.edit-meet-whro-patients',$data);
    }

    public function updateMeetWhroPatients(Request $request,$id)
    {
        $title = $request->input('title');
        $goal = $request->input('goal');
        $transplant_type = $request->input('transplant_type');
        $transplant_status = $request->input('transplant_status');
        $fayetteville = $request->input('fayetteville');

        $data = MeetWhroPatient::find($id);
        $data->title = $title;
        $data->goal = $goal;
        $data->transplant_type = $transplant_type;
        $data->transplant_status = $transplant_status;
        $data->fayetteville = $fayetteville;
        $data->logged_in_id = Auth::id();

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
            $data['thumbnail'] = $filename;
            @unlink(public_path('backend/images/'.MeetWhroPatient::where('id',1)->first()->thumbnail));
        }

        $data->save();

        return "Patient Successfully  Updated";

    }

}
