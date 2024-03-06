<?php

namespace App\Http\Controllers;

use App\Mail\NewAdminEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'moderator') {
            return view('layouts.dashboard.index');
        }
        // else if(Auth::user()->role == 'seller'){
        //     return view('layouts.frontend.customerDashboard');
        // }
        else {
            return redirect('/seller/dashboard');
        }
    }

    // Profile view retrun
    public function dashboard_profile()
    {
        return view('layouts.dashboard.profile.profile');
    }

    // Users Page return
    public function users()
    {
        $users = User::all();

        return view('layouts.dashboard.users', compact('users'));
    }

    // Add Admin Function
    public function add_users(Request $request)
    {

        // $password = Str::random(10);
        // return $password;

        // return $request;
        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|unique:users,email',
        ]);

        $password = Str::random(8);

        User::insert([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => bcrypt($password),
            'created_at' => Carbon::now(),
        ]);

        Mail::to($request->admin_email)->send(new NewAdminEmail(Auth::user()->name, $request->admin_email, $password));

        return back()->with('add_user', 'Admin User Successfully');

    }

    //users Details
    public function user_details(User $user, $id)
    {
        $users = $user->find($id);

        return view('layouts.dashboard.user_details', [
            'user' => $users,
        ]);
    }

    //Edit Users
    public function edit_user(User $user, $id)
    {
        $users = $user->find($id);

        return view('layouts.dashboard.edit_users', [
            'user' => $users,
        ]);
    }

    //Update Users
    public function update_user(Request $request, $id)
    {

        // return $request;

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect('/user/details/'.$id)->with('user_update', 'User Details Update Successfully');

    }

    // Remove Users
    public function user_remove($id)
    {
        User::find($id)->delete();

        return redirect('/users')->with('remove_user', 'User Remove Successfully');
    }

    // //filter moderator from database
    public function moderator()
    {
        $moderators = User::all()->where('role', '=', 'moderator');

        return view('layouts.dashboard.moderators', compact('moderators'));
    }

    // //filter admins from database
    public function filter_admin()
    {
        $admins = User::all()->where('role', '=', 'admin');

        return view('layouts.dashboard.admins', compact('admins'));
    }

    // //filter sellers from database
    public function filter_sellers()
    {
        $sellers = User::all()->where('role', '=', 'seller');

        return view('layouts.dashboard.sellers', compact('sellers'));
    }

    // //filter sellers from database
    public function filter_customers()
    {
        $customers = User::all()->where('role', '=', 'customer');

        return view('layouts.dashboard.customers', compact('customers'));
    }
}
