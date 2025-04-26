<?php

namespace App\Http\Controllers;

use App\Models\AboutMeCategory;
use App\Models\GetInvolvedCategory;
use App\Models\Support;
use App\Models\SupportCategory;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function manageSupport()
    {
        $data['supports'] = Support::join('support_categories','supports.support_category_id','=','support_categories.id')->select('supports.*','support_categories.name')->get();
        return view('backend.support.manage-support',$data);
    }

    public function editSupport($id)
    {
        $data['support_categories'] = SupportCategory::all();
        $data['support'] = Support::find($id);
        return view('backend.support.edit-support',$data);
    }

    public function updateSupport(Request $request,$id)
    {
        $support_category_id = $request->input('support_category_id');
        $description = $request->input('description');

        $count = Support::where('support_category_id',$support_category_id)->whereNotIn('id',[$id])->count();
        if($count > 0){
            $notification = array(
                'message' => 'You have already used the support category in another support !',
                'alert-type' => 'error'
            );
            return redirect()->route('edit.support',$id)->with($notification);
        }

        $support = Support::find($id);
        $support->support_category_id = $support_category_id;
        $support->description = $description;
        $support->save();

        $notification = array(
            'message' => 'Support updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.support',$id)->with($notification);

    }

    public function loadContent($category_id)
    {
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['our_support_categories'] = SupportCategory::all();
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['content'] = Support::join('support_categories','supports.support_category_id','=','support_categories.id')->select('supports.*','support_categories.name')->where('supports.support_category_id',$category_id)->first();
        return view('frontend.common-content',$data);
    }

}
