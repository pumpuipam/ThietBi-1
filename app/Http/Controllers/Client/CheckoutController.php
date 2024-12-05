<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;
use Carbon\Carbon;
use App\Models\Promotion;
use App\Models\provinces;




class CheckoutController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    //checkout
    public function index(Request $request)
    {
        // dd(1);
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }
        // dd(1);
        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart', []);

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $User = User::find(auth()->user()->id);
        // dd($User);
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $vouchers = $request->session()->get('vouchers', []);
        // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
        $provinces = provinces::get();
        return view('client.checkout', $this->v, compact('cart', 
        'vouchers',
        'name', 'numberOfItemsInCart','User','numberOfItemsInCartLike','provinces'));
    }

    public function indexAdmin(Request $request)
    {
       
        // dd(1);
        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart_admin', []);
     
      
        $User = User::find(auth()->user()->id);
        // dd($User);
       
        // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
        return view('admin.checkout', $this->v, compact('cart','User'));
    }
    public function checkout(CheckoutRequest $request)
    {
       
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    
        if($request->payment_type == 'redirect'){
            $firstName = $request->firstName;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $note = $request->note;
            $cart = $request->session()->get('cart', []);
            $vouchers = $request->session()->get('vouchers', []);

            $user_profile = DB::table('users')->where('email', '=', $email)->first();
            
            $code_voucer = '';
            $total = 0;
            if($vouchers){
                $code_voucer = $vouchers['id'];
                $total = $vouchers['total'];
                $promotion = Promotion::find($code_voucer);
                $promotion->update(['quantity'=>$promotion->quantity-1]);
            }
          
                $order = Order::create([
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'note' => $request->note,
                    'payment_type' => 1,
                    'status' => 0,
                    'lastname' => $lastName,
                    'firstName' => $request->firstName,
                    'user_id' => auth()->user()->id,
                    'created_at' => Carbon::now(),
                    'code_discount' => $code_voucer,
                    'cityid' => $request->cityid,
                    'wardid' => $request->wardid,
                    'provinceid' => $request->provinceid,
    
                ]);
                $sum_vip = 0;
                foreach ($cart as $index => $item) {
                    $orderDetail = OrderDetail::create([
                        'product_id' => $item[0],
                        'user_id' => auth()->user()->id,
                        'order_id' => $order->id,
                        'quantity' => $item[4],
                        'price' => $item[6],
                        'total_payment' => $item[7],
                        'discount' => (int)$item[5],
                    ]);
    
             
                    $orderDetails[] = $orderDetail;
                    DB::table('products')
                    ->where('id', $item[0])
                    ->update([
                        'quantity' => DB::raw('quantity - ' . (int)$item[4])
                    ]);
                    $plus = DB::table('products')->select('points')->where('id',$item[0])->first();
                    $sum_vip +=  $plus->points;
                }
                $user_plus = User::find(auth()->user()->id);
                $user_plus_1 = $user_plus->vip ?? 0;
                $user_plus->update([
                    'vip' => (int)$user_plus_1 + (int)$sum_vip,
                ]);
    
                $this->v['totalPayment'] = 0;
                $this->v['paymentType'] = $request->payment_type;
                $this->v['order'] = $order;
    
                foreach ($orderDetails as $orderDetail) {
                    $this->v['totalPayment'] += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
                }
                $end = $this->v['totalPayment'] - $total;
                $update = Order::find($order->id)->update([
                    'total' => $end+(int) $request->tienship
                ]);     
                $this->v['products'] = DB::table('products')->get();
    
                $this->v['detailOrder'] = $orderDetails;
    
                $this->v['user'] = User::find(auth()->user()->id);
    
                $this->v['email'] = $request->email;
                try{
                    Mail::send('email.order', $this->v, function ($email) {
                        $email->subject('Đơn đặt hàng của bạn!');
                        $email->to($this->v['email'], 'Sell');
                    });
                   
                    
                   
                }catch (\Exception  $e) {
             
                }
                $request->session()->put('vouchers', []);
                
            
            
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://127.0.0.1:8000/view-tkanks-you";
                $vnp_TmnCode = "MFENM4DN";//Mã website tại VNPAY 
                $vnp_HashSecret = "VX6FW9JPBUAK5JVKOB8Z88SQDJOAJ4JF"; //Chuỗi bí mật
                
                $vnp_TxnRef = 'OR000'.$order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
               
                $vnp_OrderInfo = 'THANH TOÁN TOÁN CHUYỂN KHOẢN';
                $vnp_OrderType = 'KITCHEN';
                $vnp_Amount = (int)$end * 100;
                $vnp_Locale = 'VN';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                    
                );
                
                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }
                
                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
                
                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array('code' => '00'
                    , 'message' => 'success'
                    , 'data' => $vnp_Url);
                    if ($request->payment_type == 'redirect') {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
           
        }else{
            
            $firstName = $request->firstName;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $note = $request->note;
            $cart = $request->session()->get('cart', []);
            $vouchers = $request->session()->get('vouchers', []);

            $user_profile = DB::table('users')->where('email', '=', $email)->first();
            
            $code_voucer = '';
            $total = 0;
            if($vouchers){
                $code_voucer = $vouchers['id'];
                $total = $vouchers['total'];
                $promotion = Promotion::find($code_voucer);
                $promotion->update(['quantity'=>$promotion->quantity-1]);
            }
                $order = Order::create([
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'note' => $request->note,
                    'payment_type' => 1,
                    'status' => 0,
                    'lastname' => $lastName,
                    'firstName' => $request->firstName,
                    'user_id' => auth()->user()->id,
                    'created_at' => Carbon::now(),
                    'code_discount' => $code_voucer,
                    'cityid' => $request->cityid,
                    'wardid' => $request->wardid,
                    'provinceid' => $request->provinceid,
    
                ]);
                $sum_vip =0;
    
                foreach ($cart as $index => $item) {
                    $orderDetail = OrderDetail::create([
                        'product_id' => $item[0],
                        'user_id' => auth()->user()->id,
                        'order_id' => $order->id,
                        'quantity' => $item[4],
                        'price' => $item[6],
                        'total_payment' => $item[7],
                        'discount' => (int)$item[5],
                    ]);
    
             
                    $orderDetails[] = $orderDetail;
                    DB::table('products')
                    ->where('id', $item[0])
                    ->update([
                        'quantity' => DB::raw('quantity - ' . (int)$item[4])
                    ]);
                    $plus = DB::table('products')->select('points')->where('id',$item[0])->first();
                    $sum_vip +=  $plus->points ?? 0;
                   
                }
                
             

                $user_plus = User::find(auth()->user()->id);
                $user_plus_1 = $user_plus->vip;
                $user_plus->update([
                    'vip' => (int)$user_plus_1 + (int)$sum_vip,
                ]);
                $this->v['totalPayment'] = 0;
                $this->v['paymentType'] = $request->payment_type;
                $this->v['order'] = $order;
    
                foreach ($orderDetails as $orderDetail) {
                    $this->v['totalPayment'] += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
                }
                $end = $this->v['totalPayment'] - $total;
           
                $update = Order::find($order->id)->update([
                    'total' => $end+(int) $request->tienship
                ]);     
                $this->v['products'] = DB::table('products')->get();
    
                $this->v['detailOrder'] = $orderDetails;
    
                $this->v['user'] = User::find(auth()->user()->id);
    
                $this->v['email'] = $request->email;
                try{
                    Mail::send('email.order', $this->v, function ($email) {
                        $email->subject('Đơn đặt hàng của bạn!');
                        $email->to($this->v['email'], 'Sell');
                    });
                    $request->session()->put('vouchers', []);
                    return view('client.thank_you');
                }catch (\Exception  $e) {
                    
                    return view('client.thank_you');
                }
               
    
                
            // }
            

            $request->session()->put('vouchers', []);
    
            // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
            return view('client.checkout', $this->v, compact('name', 'user_profile'));
        }
    }
    public function Returnview(Request $request){
        return view('client.thank_you');
    }

    public function checkoutAdmin(CheckoutRequest $request)
    {
      
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $firstName = $request->firstName;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $note = $request->note;
            // dd($lastName);
            $cart = $request->session()->get('cart_admin', []);
    
          
    
        
             
    
                $order = Order::create([
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'note' => $request->note,
                    'payment_type' => 1,
                    'status' => 1,
                    'lastname' => $lastName,
                    'firstName' => $request->firstName,
                    'user_id' => auth()->user()->id,
                    'created_at' => Carbon::now(),
    
                ]);
              
                foreach ($cart as $index => $item) {
                    $orderDetail = OrderDetail::create([
                        'product_id' => $item[0],
                        'user_id' =>   auth()->user()->id,
                        'order_id' => $order->id,
                        'quantity' => $item[4],
                        'price' => $item[6],
                        'total_payment' => $item[7],
                        'discount' => $item[5],
                    ]);
    
                   
                    $orderDetails[] = $orderDetail;
                }
    
                $this->v['totalPayment'] = 0;
                $this->v['paymentType'] = $request->payment_type;
    
                foreach ($orderDetails as $orderDetail) {
                    $this->v['totalPayment'] += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
                }
    
                $this->v['products'] = DB::table('products')->get();
    
                $this->v['detailOrder'] = $orderDetails;
    
                $this->v['user'] = User::find(auth()->user()->id);
    
                $this->v['email'] = $request->email;
                try{
                    Mail::send('email.order', $this->v, function ($email) {
                        $email->subject('Đơn đặt hàng của bạn!');
                        $email->to($this->v['email'], 'Sell');
                    });
                    session()->forget('cart_admin');
                    toastr()->success('Đã thanh toán thanh công!');
                    return redirect()->route('pos.index');
                }catch (\Exception  $e) {
                    session()->forget('cart_admin');
                    toastr()->success('Đã thanh toán thanh công!');
                    return redirect()->route('pos.index');
                }
               
    
                
            
           
    
            // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
            // return view('client.checkout', $this->v, compact('name', 'user_profile'));
     
       

    }
}
