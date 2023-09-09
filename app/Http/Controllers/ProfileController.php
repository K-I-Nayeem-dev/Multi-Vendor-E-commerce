<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    // Profile Photo Change

    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . "." . $request->file('profile_photo')->getClientOriginalExtension();
        $img =Image::make($request->file('profile_photo'))->resize(300, 300);
        $img->save(base_path('public\uploads\profile_photo/' . $new_name), 80);
        User::find(auth()->id())->update(
            [
                'profile_photo'=> $new_name,
            ]);

            return back()->with('profile_photo_uploads', 'Profile Photo Upload Successfully');

    }


    // Cover Photo Change

    public function cover_photo_upload(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . "." . $request->file('cover_photo')->getClientOriginalExtension();
        $img =Image::make($request->file('cover_photo'))->resize(1600, 300);
        $img->save(base_path('public\uploads\cover_photo/' . $new_name), 80);
        User::find(auth()->id())->update(
            [
                'cover_photo'=> $new_name,
            ]);

            return back()->with('cover_photo_uploads', 'Cover Photo Upload Successfully');


    }

    // Password Check

    public function password_check(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
        ]);
        
        if(Hash::check($request->current_password, Auth::user()->password)){
            User::find(auth()->id())->update(
                [
                    'password_check_status' => true,
                ]
            );
            return back();
        }
    }

    // Password Check

    public function password_changed(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8|',
            'password_confirmation' => 'required|same:password'
        ]);
        

        if($request->password == $request->password_confirmation){
            User::find(auth()->id())->update(
                [
                    'password' => bcrypt($request->password),
                    'password_check_status' => false,

                ]
            );

            return back()->with('password_changed', 'Password Changed Successfully');
        }

    }

    //Phone Verify

    public function phone_number_add(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
        ]);
        
        User::find(auth()->id())->update(
            [
                'phone_number' => $request->phone_number,
            ]
        );

        return back()->with('password_changed', 'Password Changed Successfully');
        // if($request->password == $request->password_confirmation){
        //     User::find(auth()->id())->update(
        //         [
        //             'password' => bcrypt($request->password),
        //             'password_check_status' => false,

        //         ]
        //     );

        //     return back()->with('password_changed', 'Password Changed Successfully');
        // }

    }


}
