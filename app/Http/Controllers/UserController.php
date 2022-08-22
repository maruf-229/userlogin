<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){

        $request->validate([
            'present_address' => 'required',
            'dob' => 'required',
            'profile_photo_path' => 'required',
        ]);

        $data = User::find(Auth::user()->id);
        $data->f_name = $request->f_name;
        $data->l_name = $request->l_name;
        $data->email = $request->email;
        $data->user_name  = $request->user_name ;
        $data->present_address = $request->present_address;
        $data->dob = $request->dob;
        $data->nid = $request->nid;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
}
