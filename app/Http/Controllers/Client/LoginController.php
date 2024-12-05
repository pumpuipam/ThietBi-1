<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {

        // dd(1);
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $currentRouteName = Route::currentRouteName();

        return view('client.auth.login', $this->v, compact('name', 'numberOfItemsInCart','currentRouteName'));
    }

    public function post(LoginRequest $request)
    {
        
       
        $method_route = 'route_FrontEnd_Login';
    
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            if(auth()->user()->role_id == User::ADMIN || auth()->user()->role_id == User::STAFF || auth()->user()->role_id == 4){
                if(auth()->user()->role_id == 4){
                    return view('admin.shipper.index');
                }else{
                    
                    toastr()->success('Đăng nhập thành công!');
                    return redirect()->route('route_BackEnd_Dashboard');
                }
            }
            if(auth()->user()->status == 2){
                $request->session()->flush();
                toastr()->error('Tài khoản hiện đang khóa.');
                return redirect()->route($method_route);
            }else{
                toastr()->error('Tài khoản không có quyền truy cập.');
                return redirect()->back();
            }
            
        } else {
            
            toastr()->error('Sai email hoặc mật khẩu.');
            return redirect()->route($method_route);
        }

        return redirect()->route('route_FrontEnd_Login');
    }

    public function getLogout(Request $request)
    {


        $request->session()->flush();
        return redirect()->route('route_FrontEnd_Login');
    }

    public function getLoginGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function loginGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        if ($googleUser) {
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('route_FrontEnd_Home');
            }

            $newUser = new User();
            $newUser->fill($googleUser->user);
            $newUser->lastName = $googleUser->user['given_name'];
            $newUser->firstName = $googleUser->user['family_name'];
            $newUser->username = $googleUser->name;
            $newUser->avatar = $googleUser->avatar;
            $newUser->email = $googleUser->email;
            $newUser->password = Hash::make('123456');
            $newUser->role = 4;

            $newUser->status = 1;

            $newUser->save();
            return redirect()->route('route_FrontEnd_Home');
        }
    }
}
