<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin()
    {
      
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        
      
        $method_route = 'getLogin';
       
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            if(auth()->user()->id != User::ADMIN){
                $request->session()->flush();
              
       
                toastr()->error('Không có quyền truy cập.');
            
                return redirect()->route($method_route);
            }
            toastr()->success('Đăng nhập thành công!');
            return redirect()->route('route_BackEnd_Dashboard');
        }else {
            // Session::flash('error', 'Sai email hoặc mật khẩu');

            toastr()->error('Sai email hoặc mật khẩu.');
            return redirect()->route($method_route);
        }
      
        return redirect()->route('getLogin');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }
}
