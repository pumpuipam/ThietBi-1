<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        // dd(1);
        $username = $request->get('username');
        $phone = $request->get('phone');
        $email = $request->get('email');
        if ($username) {
            $customers = User::where('username', 'like', '%' . $username . '%')->where('role_id','!=',User::ADMIN)
                ->paginate(10);
        } elseif ($phone) {
            $customers = User::where('phone', 'like', '%' . $phone . '%')->where('role_id','!=',User::ADMIN)
                ->paginate(10);
        } elseif ($email) {
            $customers = User::where('email', 'like', '%' . $email . '%')->where('role_id','!=',User::ADMIN)
                ->paginate(10);
        } else {
            $customers = DB::table('users')->orderBy('id', 'desc')->where('role_id','!=',User::ADMIN)
                ->paginate(10);
        }

        return view('admin.customer.list', compact('customers'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Customers_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|min:10',
                'password' => 'required|min:6',
                'images' =>
                [
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ], [
                'username.required' => 'Tên bắt buộc nhập!',
                'username.min' => 'Tên tối thiểu 3 ký tự!',
                'email.required' => 'Email bắt buộc nhập!',
                'email.unique' => 'Email đã tồn tại!',
                'email.email' => 'Email không đúng định dạng!',
                'password.required' => 'Mật khẩu bắt buộc nhập!',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
                'phone.required' => 'Số điện thoại bắt buộc nhập!',
                'phone.numeric' => 'Số điện thoại phải là số!',
                'phone.min' => 'Số điện thoại tối thiểu 10 số!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
            }

            $modelTes = new User();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm người dùng thành công!');
                return redirect()->route('route_BackEnd_Customers_List');
            } else {
                Session::flash('error', 'Thêm người dùng không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.customer.create');
    }

    public function edit($id)
    {
        $modelCustomer = new User();
        $customer = $modelCustomer->loadOne($id);
        $this->v['customer'] = $customer;
        return view('admin.customer.edit', $this->v);
    }

    public function update($id, CustomerRequest $request)
    {

        $method_route = 'route_BackEnd_Customers_Edit';
        $params = [];
    
        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
        }

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        if (!is_null($params['cols']['password'])) {
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        }

        $modelCustomer = new User();
        $res = $modelCustomer->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Customers_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('customers', $fileName, 'public');
    }

    public function status($id,$status){
        $User = User::find($id);
        $User->update([
            'status' => $status == 1 ? 2 : 1
        ]);
        if($status == 1){
            Session::flash('success', 'Mở khóa tài khoản thành công!');
            return redirect()->back();
        }else{
            Session::flash('success', 'Khóa tài khoản thành công!');
            return redirect()->back();
        }

    }

    public function permissions(Request $request){
       

        $User = User::find($request->id);
      
            $User->update([
                'role_id' => $request->rold_id,
            ]);
      
        
        // dd($id,$role_id);
        Session::flash('success', 'Cấp quyền tài khoản thành công!');
        return redirect()->back();

    }
}
