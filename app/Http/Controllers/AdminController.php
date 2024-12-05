<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function userInfo(Request $request){
      
        $id = auth()->user()->id;
        $User = User::find($id);
     
        if($User){
            return view('admin.admin.edit_info',compact('User'));
        }else{
            // dd(2);
            return redirect()->back();
        }
    }

    public function changePassword(Request $request){
     
        return view('admin.admin.change-password');
    }

    public function checkChangePassword(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
       
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return $user;
        } else {
            return null;
        }
    }
}
