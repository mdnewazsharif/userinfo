<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function allUser(){
        $users = User::where('is_deleted', 0)->orderBy('id', 'ASC')->get();

        return view('admin.manage-user.all-user', compact('users'));
    }

  
    public function deletedUsers(){
        $users = User::where('is_deleted', 1)->orderBy('id', 'ASC')->get();
        return view('admin.manage-user.deleted-users', compact('users'));
    }

    public function userDetails($id){
        $user = User::findOrFail($id);
 
        return view('admin.manage-user.user-details', compact('user'));
    }

    public function resetUserPasswordView(){

        $users = User::orderBy('id', 'DESC')->get();

        return view('admin.manage-user.reset-user-password-view', compact('users'));
    }

    public function resetUserPassword($id){

        $user = User::findOrFail($id);

        return view('admin.manage-user.reset_single_user_password', compact('user'));
    }

    public function createUser(){

        return view('admin.manage-user.create-user');
    }


    public function updateUserPassword(Request $request){
        $data = $request->validate([

            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::findOrFail($request->id)->update([
            'password' => Hash::make($request->password) ,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'User Password Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function storeUser(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

             
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);



        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.all')->with($notification);
    }

    public function updateUser(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        User::find($request->id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        

        $notification = array(
            'message' => 'User Details Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editUser($id){
        $user = User::findOrFail($id);

        return view('admin.manage-user.edit-user', compact('user'));
    }


    public function deleteUser($id){
        User::findOrFail($id)->update([
            'is_deleted'=> 1
        ]);

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function restoreDeletedUser($id){
        User::findOrFail($id)->update([
            'is_deleted'=> 0
        ]);

        $notification = array(
            'message' => 'User Restored Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function GetUserAjax(){
        $users = User::where('is_deleted',0)->get();
        return json_encode($users);
    }

    public function deleteUserPermanently($id){

        $notifications = Notification::where('user_id',$id)->get();

        foreach ($notifications as  $notification) {
            $notification->delete();
        }

        // $notices = NoticeBoard::where('user_id',$id)->get();

        // foreach ($notices as  $notice) {
        //     $notice->delete();
        // }

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Permanently Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
