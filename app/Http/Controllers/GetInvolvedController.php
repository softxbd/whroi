<?php

namespace App\Http\Controllers;

use App\Models\AboutMeCategory;
use App\Models\GetInvolved;
use App\Models\GetInvolvedCategory;
use App\Models\SupportCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetInvolvedController extends Controller
{
    public function manageGetInvolved()
    {
        $data['involveds'] = GetInvolved::join('get_involved_categories','get_involveds.get_involved_category_id','=','get_involved_categories.id')->select('get_involveds.*','get_involved_categories.name')->get();
        return view('backend.get-involved.manage-get-involve',$data);
    }

    public function addInvolved()
    {
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        return view('backend.get-involved.add-get-involve',$data);
    }

    public function storeInvolved(Request $request)
    {
        $count = GetInvolved::where('get_involved_category_id', $request->get_involved_category_id)->count();
        if ($count > 0) {
            $notification = array('message' => 'Involved Add Fail, this category already exists !', 'alert-type' => 'error');
            return redirect()->route('add.support')->with($notification);
        }

        $support = new GetInvolved();
        $support->description = $request->description;
        $support->get_involved_category_id = $request->get_involved_category_id;
        $support->logged_in_id = Auth::user()->id;
        $support->save();
        $notification = array('message' => 'Involved added successfully', 'alert-type' => 'success');
        return redirect()->route('manage.get.involved')->with($notification);
    }

    public function editGetInvolved($id)
    {
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['get_involveds'] = GetInvolved::find($id);
        return view('backend.get-involved.edit-get-involve',$data);
    }

    public function updateGetInvolved(Request $request,$id)
    {
        $get_involved_category_id = $request->input('get_involved_category_id');
        $description = $request->input('description');

        $count = GetInvolved::where('get_involved_category_id',$get_involved_category_id)->whereNotIn('id',[$id])->count();
        if($count > 0){
            $notification = array(
                'message' => 'You have already used the get involved category in another topics of *get Involved* !',
                'alert-type' => 'error'
            );
            return redirect()->route('edit.get.involved',$id)->with($notification);
        }

        $support = GetInvolved::find($id);
        $support->get_involved_category_id = $get_involved_category_id;
        $support->description = $description;
        $support->save();

        $notification = array(
            'message' => 'Get involved updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.get.involved',$id)->with($notification);

    }


    public function deleteInvolved($id)
    {
        $involved = GetInvolved::find($id);
        if ($involved) {
            $involved->delete();
            $notification = array('message' => 'Involved delete successfully', 'alert-type' => 'success');
            return redirect()->route('manage.get.involved')->with($notification);
        } else {
            $notification = array('message' => 'Involved not found', 'alert-type' => 'error');
            return redirect()->route('manage.get.involved')->with($notification);
        }
    }

    public function loadContent($category_id)
    {
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['our_support_categories'] = SupportCategory::all();
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['content'] = GetInvolved::join('get_involved_categories','get_involveds.get_involved_category_id','=','get_involved_categories.id')->select('get_involveds.*','get_involved_categories.name')->where('get_involveds.get_involved_category_id',$category_id)->first();
        return view('frontend.common-content',$data);
    }

}
