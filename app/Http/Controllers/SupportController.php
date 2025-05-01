<?php

namespace App\Http\Controllers;

use App\Models\AboutMeCategory;
use App\Models\GetInvolvedCategory;
use App\Models\Support;
use App\Models\SupportCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function manageSupport()
    {
        $data['supports'] = Support::join('support_categories', 'supports.support_category_id', '=', 'support_categories.id')->select('supports.*', 'support_categories.name')->get();
        return view('backend.support.manage-support', $data);
    }

    public function addSupport()
    {
        $data['support_categories'] = SupportCategory::all();
        return view('backend.support.add-support', $data);
    }

    public function storeSupport(Request $request)
    {
        $count = Support::where('support_category_id', $request->support_category_id)->count();
        if ($count > 0) {
            $notification = array('message' => 'Support Add Fail, this category already exists !', 'alert-type' => 'error');
            return redirect()->route('add.support')->with($notification);
        }

        $support = new Support();
        $support->description = $request->description;
        $support->support_category_id = $request->support_category_id;
        $support->logged_in_id = Auth::user()->id;
        $support->save();
        $notification = array('message' => 'Support added successfully', 'alert-type' => 'success');
        return redirect()->route('manage.support')->with($notification);
    }


    public function editSupport($id)
    {
        $data['support_categories'] = SupportCategory::all();
        $data['support'] = Support::find($id);
        return view('backend.support.edit-support', $data);
    }

    public function updateSupport(Request $request, $id)
    {
        $support_category_id = $request->input('support_category_id');
        $description = $request->input('description');

        $count = Support::where('support_category_id', $support_category_id)->whereNotIn('id', [$id])->count();

        if ($count > 0) {
            $notification = array('message' => 'You have already used the support category in another support !', 'alert-type' => 'error');
            return redirect()->route('edit.support', $id)->with($notification);
        }

        $support = Support::find($id);
        $support->support_category_id = $support_category_id;
        $support->description = $description;
        $support->save();

        $notification = array('message' => 'Support updated successfully', 'alert-type' => 'success');

        return redirect()->route('edit.support', $id)->with($notification);

    }


    // delete support
    public function deleteSupport($id)
    {
        $support = Support::find($id);
        if ($support) {
            $support->delete();
            $notification = array('message' => 'Support delete successfully', 'alert-type' => 'success');
            return redirect()->route('manage.support')->with($notification);
        } else {
            $notification = array('message' => 'Support not found', 'alert-type' => 'error');
            return redirect()->route('manage.support')->with($notification);
        }
    }


    public function loadContent($category_id)
    {
        $data['about_me_categories'] = AboutMeCategory::all();
        $data['our_support_categories'] = SupportCategory::all();
        $data['get_involved_categories'] = GetInvolvedCategory::all();
        $data['content'] = Support::join('support_categories', 'supports.support_category_id', '=', 'support_categories.id')->select('supports.*', 'support_categories.name')->where('supports.support_category_id', $category_id)->first();
        return view('frontend.common-content', $data);
    }

}
