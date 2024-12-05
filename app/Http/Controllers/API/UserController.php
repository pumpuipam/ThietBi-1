<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserRequest;
use App\Models\districts;
use App\Models\provinces;
use App\Models\wards;

class UserController extends Controller
{
    
    public function login(Request $request){
        if(!$request->email ||!$request->password){
            return response()->json([
               'success' => false,
               'message' => 'Email hoặc mật khẩu không bỏ trống'
            ], 422);
        }
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            $user = Auth::user();
            return response()->json([
               'success' => true,
                'user' => $user,
               'message' => 'Đăng nhập thành công'
            ],200);
        }else{
            return response()->json([
               'success' => false,
               'message' => 'Đăng nhập thất bại'
            ], 401);
        }      
    }


    public function logout() {
        Auth::logout();
        return response()->json([
           'success' => true,
           'message' => 'Đăng xuất thành công'
        ]);
    }
    public function forget_password(Request $request){
      
        if(!$request->email){
            return response()->json([
               'success' => false,
               'message' => 'Email Không bỏ trống'
            ], 422);
        }else{
            $user_profile = User::where('email', '=', $request->email)->first();
            if($user_profile){
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
                Mail::send('email.forget_password', compact('randomString'), function ($email) use ($request)  {
                    $email->subject('Đặt Lại Mật Khẩu Cho Tài Khoản Của Bạn');
                    $email->to($request->email);
                });
                return response()->json([
                   'data' => $User,
                   'success' => true,
                   'message' => 'Mã được gửi đến email của bạn'
                ]);
            }else{
                return response()->json([
                   'success' => false,
                   'message' => 'Email này không tồn tại'
                ], 404);
            }
        }
    }


    public function addCode(Request $request){
        $id = $request->id;
        $User = User::find($id);
        if($request->code == $User->code_password){
            return response()->json([
                'data' => $User,
                'success' => true,
                'message' => 'Mã được gửi đến email của bạn'
             ]);
        }else{
            return response()->json([
               'success' => false,
               'message' => 'Mã xác nhận không đúng'
            ], 404);

        }
     
        
    }

    public function acceptCheckChangePassword(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        Auth::logout();
        return response()->json([
            'success' => true,
            'message' => 'Thay đổi mật khẩu thành công'
         ]);
    }

    public function checkChangePassword(Request $request){
        if(!$request->id && !$request->old_password && !$request->new_password){
            return response()->json([
               'success' => false,
               'message' => 'Thông tin không đầy đủ'
            ], 422);
        }
        $id = $request->id;
        $user = User::find($id);
        if($user && Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return response()->json([
               'success' => true,
               'message' => 'Thay đổi mật khẩu thành công'
            ]);
        }else{
            return response()->json([
               'success' => false,
               'message' => 'Thay đổi thất bại'
            ]);
        }
    }


    public function edit($id){
        $user = User::find($id);
        if($user){
            return response()->json([
                'data' => $user,
               'success' => true,
               'message' => 'User retrieved successfully'
            ]);
        }else{
            return response()->json([
               'success' => false,
               'message' => 'User not found'
            ], 404);
        }
    }

   

    public function store(StoreUserRequest $request){
        $check = User::where('email', $request->email)->first();
        if($check){
            return response()->json([
               'success' => false,
               'message' => 'Email đã tồn tại'
            ])->header('Content-Type', 'application/json');            ;
        }
        if(!$request->password || !$request->email){
            return response()->json([
                'success' => false,
                'message' => 'Email và Password không được bỏ trống'
             ])->header('Content-Type', 'application/json');
        }
        if(!$request->status){
            $request->merge([
                'status' => 1
            ]);
        }
        $params = [];
        $params['cols'] = $request->post();
        $images = null;
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
          $images =  $this->uploadFile($request->file('images'));
          $params['cols']['avatar'] = $images;
        }

        $modelTes = new User();
        $res = $modelTes->saveNew($params);
        if ($res == null) {
            return response()->json([
               'success' => false,
               'message' => 'Thêm người dùng thất bại'
            ])->header('Content-Type', 'application/json');
        } elseif ($res >= 0) {
            return response()->json([
                'data' => User::find($res),
               'success' => true,
               'message' => 'User retrieved successfully'
            ])->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'data' => $res,
               'success' => true,
               'message' => 'User retrieved successfully'
            ])->header('Content-Type', 'application/json');
        }
    }

    public function update($id,StoreUserRequest $request) {
    
        $params = [];
    
        $params['cols'] = $request->post();

       
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
       
  
        $modelCustomer = new User();
        $res = $modelCustomer->saveUpdate($params);
    
        if ($res == null) {
            return response()->json([
               'success' => false,
               'message' => 'Thêm người dùng thất bại'
            ])->header('Content-Type', 'application/json');
        } elseif ($res >= 0) {
            return response()->json([
                'data' => User::find($id),
               'success' => true,
               'message' => 'Cập nhật thanh công'
            ])->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'data' =>  User::find($id),
               'success' => true,
               'message' => 'Cập nhật thanh công'
            ])->header('Content-Type', 'application/json');
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('customers', $fileName, 'public');
    }





    public function getProvinceid(Request $request){
       $provinces = provinces::get();
       return response()->json([
        'data' => $provinces,
       'success' => true,
       'message' => 'Danh sách phưỡng xã'
    ]);
       
    }

    public function getCityid($id){ 
        $wards = wards::where('districtid',(int)$id)->get();
        return response()->json([
            'data' => $wards,
           'success' => true,
           'message' => 'Danh sách phưỡng xã'
        ]);
    }

    public function getDistrict($id) {
        $districts = districts::where('provinceid',$id)->get();
        return response()->json([
            'data' => $districts,
           'success' => true,
           'message' => 'Danh sách quận huyện'
        ]);
    }

}
