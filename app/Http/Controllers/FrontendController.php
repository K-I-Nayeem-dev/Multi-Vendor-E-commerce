<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function frontend_master()
    {
        return view('layouts.frontend.index',[
            'category'=> Category::all(),
        ]);
    }
    public function frontend_home()
    {
        return view('layouts.frontend.home');
    }
    public function frontend_about()
    {
        return view('layouts.frontend.about');
    }
    public function frontend_contact()
    {
        return view('layouts.frontend.contact');
    }
    public function account_registration()
    {
        return view('layouts.frontend.account_registration');
    }

    public function account_login()
    {
        return view('layouts.frontend.account_login');
    }

    public function accounts(Request $request){
        // echo $request->email . "<br>";
        // echo $request->password;
        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){

            if(Auth::user()->role == 'seller'){
                return redirect('/seller/dashboard');
            }
            // else if(Auth::user()->role == 'seller'){
            //     return view('layouts.frontend.sellerDashboard');
            // }
            else{
                return view('layouts.dashboard.index');
            }
        }
        else{
            return back()->with('login_err', 'These credentials do not match our records. ');
        }
    }

    public function seller_dashboard(){
        return view('layouts.frontend.sellerDashboard');
    }

    public function customer_dashboard(){
        return view('layouts.frontend.customerDashboard');
    }

    public function contact_message(Request $request){

        $request->validate([
            "name"=> 'required',
            "email"=> 'required',
            "subject"=> 'required',
            "message"=> 'required',
        ]);

        Contact::insert([
            'contact_name'=> $request->name,
            'contact_email'=> $request->email,
            'contact_subject'=> $request->subject,
            'contact_message'=> $request->message,
            'created_at' => Carbon::now(),
        ]);

        Mail::to($request->email)->send(new ContactMessage($request->except('_token')));

        return back()->with('message_sent', 'Email Send Successfully');

    }


}
