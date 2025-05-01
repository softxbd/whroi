<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
class AuthenticationController extends Controller
{
    // Sign out
    public function signOut()
    {
        Auth::guard('web')->logout();
        return Redirect()->route('login');
    }

    public function guid()
    {
        return  date('Y-m-d-H-i-s') . '-' . Str::random(12) . '-' . rand(1111, 9999) . '-' . Str::random(16);
    }

    public function getProfile()
    {
        $profile = auth()->user();
        return view('backend.profile.index', compact('profile',));
    }

    // change user profile
    public function updateProfile(request $request)
    {
         $user = User::where('id', auth()->id())->first();

         if($request->hasFile('profile_photo_path')){
            $file                   = $request->file('profile_photo_path');
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
            $user['profile_photo_path'] = $filename;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');

    }
}
