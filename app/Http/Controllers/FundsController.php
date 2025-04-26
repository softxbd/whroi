<?php

namespace App\Http\Controllers;

use App\Models\HomepageBanner;
use App\Models\HowWeUseFunds;
use Illuminate\Http\Request;

class FundsController extends Controller
{

    public function editHowWeUseFunds()
    {
        $data['funds'] = HowWeUseFunds::find(1);
        return view('backend.how-we-use-funds.edit-how-we-use-funds',$data);
    }

    public function updateHowWeUseFunds(Request $request)
    {
        $title = $request->input('title');
        $caption = $request->input('caption');
        $fundraising = $request->input('fundraising');
        $fundraising_value = $request->input('fundraising_value');
        $management = $request->input('management');
        $management_value = $request->input('management_value');
        $programs = $request->input('programs');
        $programs_value = $request->input('programs_value');

        $founds = HowWeUseFunds::find(1);
        $founds->title = $title;
        $founds->caption = $caption;
        $founds->fundraising = $fundraising;
        $founds->fundraising_value = $fundraising_value;
        $founds->management = $management;
        $founds->management_value = $management_value;
        $founds->programs = $programs;
        $founds->programs_value = $programs_value;
        $founds->save();

        $notification = array(
            'message' => 'How we use fund updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.how.we.use.funds')->with($notification);

    }
}
