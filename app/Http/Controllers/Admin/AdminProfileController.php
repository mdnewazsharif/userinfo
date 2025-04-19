<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function Profile(){

        $adminData = Admin::find(Auth::guard('admin')->user()->id)->first();

        return view('admin.profile.profile_view', compact('adminData'));
    }

    public function phpInfo(){

        dd(phpinfo());

        
    }

    public function EditProfile(){

        $adminData = Admin::find(Auth::guard('admin')->user()->id)->first();

        return view('admin.profile.profile_edit', compact('adminData'));
    }

    public function Store(Request $request){
        $data = Admin::find(Auth::guard('admin')->user()->id)->first();

        $data->name = $request->name;
        // $data->email = $request->email;

        if ($request->file('profile_img')) {
            $file = $request->file('profile_img');

            if ($request->has('old_image')) {
                $oldImage = $request->old_image;
                if ($oldImage != null) {
                    unlink(public_path('upload/admin_images/'.$oldImage));

                }

            }
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['profile_img'] = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $adminData = $data = Admin::find(Auth::guard('admin')->user()->id)->first();
        $currentPassword = $request->current_password;
        if (Hash::check($currentPassword, $adminData->password) ) {
            

            $adminData->password = Hash::make($request->password);

            $adminData->save();
            $notification = array(
                'message' => 'Password updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);

        } else{
            $notification = array(
                'message' => 'Current Password not matched',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
