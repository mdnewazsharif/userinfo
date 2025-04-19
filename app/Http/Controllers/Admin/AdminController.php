<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }



    public function Dashboard(){
        $total_user_count = User::count();
        $active_user_count = User::where("is_deleted", 0)->count();
        $blocked_user_count = User::where("is_deleted", 1)->count();
        
        return view('admin.index', compact('total_user_count', 'active_user_count', 'blocked_user_count') );
    }

    public function Login(Request $request){

        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {

            return redirect()->route('admin.dashboard')->with('success', 'Admin login successful');
        } else{
            return back()->with('error', 'Invalid email or password');
        }

    }

    public function register()
    {
        return view('admin.admin_register');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed|min:6',
        ]);
        Admin::insert([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_form')->with('error', 'Sign up successfully, now login');
    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Admin Logged out successfully');
    }

    public function redirectNotificationRoute($notification_id){
        $notification = AdminNotification::find($notification_id);

        if ($notification) {
            $notification->update([
                'is_read' => 1
            ]);
        }

        return redirect()->route($notification->route);

    }

}
