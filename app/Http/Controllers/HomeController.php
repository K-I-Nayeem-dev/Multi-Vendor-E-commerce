<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard_home()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator'){
            return view('layouts.dashboard.index');
        }
        // else if(Auth::user()->role == 'seller'){
        //     return view('layouts.frontend.customerDashboard');
        // }
        else{
            return redirect('/seller/dashboard');
        }
    }

    // Profile view retrun
    public function dashboard_profile()
    {
        return view('layouts.dashboard.profile.profile');
    } 
    
    // Users Page return
    public function users(){
        $users = User::all();
        return view('layouts.dashboard.users', compact('users'));
    }

    // Add Admin Function
    public function add_users(Request $request){

        // $password = Str::random(10);
        // return $password;

        // return $request;
        $request->validate([
            'admin_name'=> 'required',
            'admin_email'=> 'required'
        ]);

        User::insert([
            'name'=> $request->admin_name,
            'email'=> $request->admin_email,
            'password'=> Str::random(8),
            'created_at'=> Carbon::now()
        ]);

        return back();

    }

    //users Details 
    public function user_details(User $user, $id){
        $users = $user->find($id);
        return view('layouts.dashboard.user_details',[
            'user'=> $users,
        ]);
    }

    //Edit Users
    public function edit_user(User $user, $id){
        $users = $user->find($id);
        return view('layouts.dashboard.edit_users',[
            'user'=> $users,
        ]);
    }

    //Update Users 
    public function update_user(Request $request, $id){

        // return $request;

        User::find($id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone_number"=>$request->phone_number,
            "role"=>$request->role,
        ]);

        return redirect('/user/details/'.$id)->with('user_update', 'User Details Update Successfully');
    }

}
