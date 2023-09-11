<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\Verification;

use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{


    //phone Status Check

    public function profile()
    {
        if (Verification::where('user_id', auth()->user()->id)->exists()) {

            if (Verification::where('user_id', auth()->user()->id)->first()->status) {
                $verification_status = true;
            }
            else{
                $verification_status = false;
            }

        }
        else{
            $verification_status = false;
        }

        return view('layouts.dashboard.profile.profile', compact('verification_status'));

    }


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
        else{
            return back()->with('password_err', 'Pass do not match our records.');
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

        return back()->with('Phone_add', 'Phone Number Added Successfully');
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

    public function verify_otp_send()
    {
        $random = rand(1000, 9999);
        // $url = "http://66.45.237.70/api.php";
        $number = auth()->user()->phone_number;
        // $text = "Hello " . auth()->user()->name . ' This is Testing Message & Your OTP is ' . $random . ' Plz Enter OTP to Verify Your Account. !!!! Thank You For Registration ';
        // $data = array(
        //     'username' => "01834833973",
        //     'password' => "TE47RSDM",
        //     'number' => "$number",
        //     'message' => "$text"
        // );

        // $ch = curl_init(); // Initialize cURL
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $smsresult = curl_exec($ch);
        // $p = explode("|", $smsresult);
        // $sendstatus = $p[0];

        Verification::insert([
            'user_id' => auth()->user()->id,
            'phone_number' => $number,
            'code' => $random,
            'created_at' => Carbon::now(),
        ]);

        User::find(auth()->id())->update(
            [
                'otp_send_status' => true,
            ]
        );

        return back()->with('OTP_send', ' OTP Send!');
    }


    public function verify_otp_confirm(Request $request){


        $request->validate([
            'code'=> 'required',
        ]);

        if($request->code == Verification::where('user_id', auth()->user()->id)->first()->code){

            Verification::where('user_id', auth()->user()->id)->update([
                    'status'=>true,
            ]);

            User::find(auth()->id())->update(
                [
                    'otp_send_status' => false,
                ]
            );

            return back()->with('OTP_success', 'Phone Number Verified');

        }
        else{
            return back()->with('OTP_Fail', 'Worng OTP');
        }
    }

    public function update_number_add(){
        
        Verification::where('user_id', auth()->user()->id)->delete();

        User::find(auth()->id())->update(
            [
                'otp_send_status' => false,
                'phone_number'=> null,
                'phone_number_update'=> true,
            ]
        );

        return back()->with('phone_number', 'Update your Phone number');

    }


}
