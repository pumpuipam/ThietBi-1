<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use App\Models\address;

class UserController extends Controller
{
    //

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

    public function acceptCheckChangePassword(Request $request)
    {
    
        $id = $request->id;
        $user = User::find($id);
        

            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return $user;

    }

    public function changePassword(Request $request)
    {
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session
        // Get the user information from the request
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $name = '';
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        return view('user.change-password',compact('name','numberOfItemsInCart','numberOfItemsInCartLike'));
    }

    public function userInfo(Request $request){
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session
        // Get the user information from the request
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $id = $request->id;
        $User = User::find($id);
        // dd($User->level_user);
        $name = '';
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        if($User){
            return view('user.user_info',compact('User','name','numberOfItemsInCart','numberOfItemsInCartLike'));
        }else{
            // dd(2);
            return redirect()->back();
        }
    }

    public function updateUserInfo(Request $request){
        $id = auth()->user()->id;
        $request->merge([
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
        ]);
       
        $User = User::find($id);
        $User->update([
            'username' => $request->username,
            'phone' => $request->phone,
            'birthday' => $request->date,
            'apartment_number' => $request->apartment_number,
            'address' => $request->address,
        ]);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $this->uploadFile($request->file('avatar'));
            $User->update([
                'avatar' => $avatar
            ]);
        }
        back()->with('success', 'Đăng nhập thành công');
        return redirect()->back();
    
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('customers', $fileName, 'public');
    }

    public function userOrder(Request $request)
    {   
        // dd(1);
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session
        // Get the user information from the request
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $id = auth()->user()->id;
        $orders = Order::where('user_id', '=', $id)->orderBy('id', 'desc')
 
        ->with('orderDetail')->get();

        $name = '';
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        // dd(1);
        return view('user.user_order',compact('orders','name','numberOfItemsInCart','numberOfItemsInCartLike'));
    }

    public function OrdersEdit($id,Request $request){
        $orders = Order::where('id',$id)->with('Provinceid_AD','City_AD','Ward_AD')->first();
        $price_check = 0;
        $address = address::where('cityid', $orders->cityid)
        ->where('provinceid', $orders->provinceid)
        ->where('wardid', $orders->wardid)
        ->first();
        if($address){
            $price_check = $address->price;
        }
        
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ 
        // Get the user information from the request
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }  // dd($orders);
        $username = $orders->User_Order->email ?? '';
        //ds order detail
        $orderDetail = OrderDetail::with('user')->with('product')->with('order')
            ->where('order_id', '=', $orders->id)
            ->orderBy('id', 'desc')
            ->get();
          
            // dd($orderDetail);
        $name = '';
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        return view('user.user_order_detail', compact('orders', 
        'orderDetail','username','name','numberOfItemsInCart',
        'numberOfItemsInCartLike','price_check'));
    }

    public function addCode(Request $request){
      
        $id = $request->id;
       
        
        $name = '';
        $User = User::find($id);
               
        if($request->code == $User->code_password){
            Session::flash('success', 'Đặt lại mật khẩu thành công!');
             return view('client.auth.change_password',compact('name','id'));

        }else{
            Session::flash('error', 'Mã code không chính xác!');
            return redirect()->back();

        }
     
        
    }
}
