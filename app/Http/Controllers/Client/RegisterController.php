<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function getRegister(Request $request)
    {
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

        return view('client.auth.register', $this->v, compact('name', 'numberOfItemsInCart'));
    }

    public function postRegister(Request $request)
    {
        $method_route = 'getRegister';
        // dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'username' => 'required|min:3|max:40',
                    'email' => 'required|email|max:50|unique:users',
                    'password' => 'required|min:6',
                    'address' => 'required',
                    'date' => 'required',


                ],
                [
                    'username.required' => 'Tên bắt buộc nhập!',
                    'username.min' => 'Tên tối thiểu 3 ký tự!',
                    'username.max' => 'Tên tối đa là 40 ký tự!',
                    'email.required' => 'Email bắt buộc nhập!',
                    'email.unique' => 'Email đã tồn tại!',
                    'email.email' => 'Email không đúng định dạng!',
                    'email.max' => 'Email tối đa 50 ký tự!',
                    'password.required' => 'Mật khẩu bắt buộc nhập!',
                    'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
                    'address' => 'Địa chỉ chưa nhập!',
                    'date' => 'Ngày sinh chưa nhập!',

                ],
                [],
            );
            $request->merge([
                'role_id' => 3
            ]);
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new User();
            $res = $modelTes->saveNewUser($params);

            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Đăng ký thành công');
                return redirect()->route('route_FrontEnd_Login');
            } else {
                Session::flash('error', 'Lỗi đăng ký tài khoản ');
                return redirect()->route($method_route);
            }
        }
        return view('route_FrontEnd_Login');
    }

    //fortget password
    public function forgetPassword(Request $request)
    {
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

        return view('client.auth.forget_password', $this->v, compact('name', 'numberOfItemsInCart'));
    }

    //gửi mail ve
    public function postforgetPassword(ForgetPasswordRequest $request)
    {
        $method_route = 'forgetPassword';
        $user_profile = DB::table('users')
            ->where('email', '=', $request->email)
            ->first();
        $this->v['email'] = $request->email;
        $this->v['user_profile'] = $user_profile;

        if (isset($this->v['user_profile'])) {
           
            $User = User::find($user_profile->id);
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
         
            for ($i = 0; $i < 6; $i++) {
               
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $User->update([
                'code_password'=> $randomString
            ]);
             Mail::send('email.forget_password', compact('randomString'), function ($email) {
                $email->subject('Đặt Lại Mật Khẩu Cho Tài Khoản Của Bạn');
                $email->to($this->v['email'], 'Sell');
            });
            Session::flash('success', 'Vui lòng kiểm tra email để đặt lại mật khẩu!');
            // return redirect()->route($method_route);
            $name = '';
            $User_id = $User->id;
      
            return view('client.auth.accept_code',compact('name','User_id'));
        } else {
            Session::flash('error', 'Email không tồn tại trên hệ thống!');
            return redirect()->route($method_route);
        }
    }

    //bấm link ơ mail nhảy qua đây
    public function getPassword($id, Request $request)
    {
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

        $user_profile = DB::table('users')->where('id', '=', $id)->first();
        $this->v['user_profile'] = $user_profile;
        if (isset($this->v['user_profile'])) {
            return view('client.auth.get_password', $this->v, compact('name', 'numberOfItemsInCart'));
        }
        // return view('error.404');
    }

    public function postPassword(Request $request)
    {
        $method_route = 'route_FrontEnd_Login';
        $user = User::findOrFail($request->id);

        $res = $user
            ->fill([
                'password' => Hash::make($request->new_password),
            ])
            ->save();
        if ($res == null) {
            return redirect()->route($method_route);
        } elseif ($res == 1) {
            Session::flash('success', 'Đặt lại mật khẩu thành công!');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', 'Đặt lại mật khẩu thất bại!');
            return redirect()->route($method_route);
        }
    }
}
