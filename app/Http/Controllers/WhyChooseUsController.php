<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class WhyChooseUsController extends Controller
{
    public function createWhyChooseUs()
    {
        return view('backend.why-choose-us.create-why-choose-us');
    }

    public function manageWhyChooseUs()
    {
        $data['values'] = WhyChooseUs::all();
        return view('backend.why-choose-us.manage-why-choose-us',$data);
    }

    public function storeWhyChooseUs(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');
        $thumbnail = $request->file('thumbnail');

        if($title == ""){
            return redirect()->route('create.why.choose.us')->with(['message' => 'You can not leave the title text box empty!', 'alert-type' => 'error']);
        }

        if($caption == ""){
            return redirect()->route('create.why.choose.us')->with(['message' => 'You can not leave the caption text box empty!', 'alert-type' => 'error']);
        }

        if($thumbnail == ""){
            return redirect()->route('create.why.choose.us')->with(['message' => 'You can not leave the thumbnail empty!', 'alert-type' => 'error']);
        }

        $data = new WhyChooseUs();
        $data->title = $title;
        $data->caption = $caption;
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
            'message' => 'Why choose us created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.why.choose.us')->with($notification);

    }

    public function editWhyChooseUs(Request $request, $id)
    {
        $data['whyChoose'] = WhyChooseUs::find($id);
        return view('backend.why-choose-us.edit-why-choose-us',$data);
    }
    public function updateWhyChooseUs(Request $request, $id)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');
        $whyChoose = WhyChooseUs::find($id);
        $whyChoose->title = $title;
        $whyChoose->caption = $caption;
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
            $whyChoose['thumbnail'] = $filename;
        }

        $whyChoose->logged_in_id = Auth::user()->id;
        $whyChoose->save();

        $notification = array(
            'message' => 'Stay health section updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.why.choose.us',$id)->with($notification);
    }

    public function deleteWhyChooseUs(Request $request, $id)
    {
        $whyChoose = WhyChooseUs::find($id);

        if (!$whyChoose) {
            return redirect()->route('manage.stay.healthy.point')->with([
                'message' => 'Why choose us not found',
                'alert-type' => 'error'
            ]);
        }

        // Delete thumbnail file if it exists
        if ($whyChoose->thumbnail && file_exists(public_path('backend/images/' . $whyChoose->thumbnail))) {
            unlink(public_path('backend/images/' . $whyChoose->thumbnail));
        }

        // Delete the database record
        $whyChoose->delete();

        $notification = [
            'message' => 'Why choose us deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.why.choose.us')->with($notification);
    }


}
