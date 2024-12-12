<?php

namespace App\Http\Controllers\API;
use App\Models\OrderUser;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //

 


    public function remove(Request $request){
        if(!$request->user_id && !$request->product_id){
            return response()->json([
                'success' => false,
                'message' => 'Tên người dùng, giá,  sản phẩm không được bỏ trống'
             ]);
        if($request->type == 2){
            $check_cart = OrderUser::where('product_id',$request->product_id)->where('user_id',$request->user_id)->where('type_id',2)->first();
            
        }else{
            $check_cart = OrderUser::where('product_id',$request->product_id)->where('user_id',$request->user_id)->where('type_id',1)->first();

        }
        if($check_cart){
            $check_cart->delete();
            return response()->json([
               'success' => true,
               'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
            ]);
        }else{
            return response()->json([
               'success' => false,
               'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
            ]);

        }
    }
    }


    public function change(Request $request){
        $type = $request->type;
        if(!$request->user_id && !$request->product_id){
            return response()->json([
                'success' => false,
                'message' => 'Tên người dùng, sản phẩm không được bỏ trống'
            ]);
        }
        $product = Product::find($request->product_id);
        if($type == 1){
            $check_cart = OrderUser::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
           
            if($check_cart){
                $quantity = $check_cart->quantity + 1;
                if($quantity > $product->quantity ){
                    return response()->json([
                       'success' => false,
                       'message' => 'Sản phẩm không đủ số lượg'
                    ]);
                }
                $check_cart->update([
                    'quantity' => $quantity,
                    'total_payment' => ($check_cart->price * $quantity) - (($check_cart->discount?? 0) * $quantity),
                ]);
                return response()->json([
                   'data' => $check_cart,
                   'success' => true,
                   'message' => 'Cập nhật giỏ hàng thành công'
                ]);
            }
        }elseif($type == 2){
            $check_cart = OrderUser::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
           
            if($check_cart){
                $quantity = $check_cart->quantity - 1;
                if($quantity <= 0){
                    return response()->json([
                       'success' => false,
                       'message' => 'Số lượng giảm không được về 0'
                    ]);
                }
                $check_cart->update([
                    'quantity' => $quantity,
                    'total_payment' => ($check_cart->price * $quantity) - (($check_cart->discount?? 0) * $quantity),
                ]);
                return response()->json([
                   'data' => $check_cart,
                   'success' => true,
                   'message' => 'Cập nhật giỏ hàng thành công'
                ]);
            }
        }else{
            if($type && $request->quantity > 0){
                if($request->quantity > $product->quantity ){
                    return response()->json([
                       'success' => false,
                       'message' => 'Sản phẩm không đủ số lượg'
                    ]);
                }
                $check_cart = OrderUser::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
                if($check_cart){
                    $quantity = $request->quantity;
                    $check_cart->update([
                        'quantity' => $quantity,
                        'total_payment' => ($check_cart->price * $quantity) - (($check_cart->discount?? 0) * $quantity),
                    ]);
                    return response()->json([
                       'data' => $check_cart,
                       'success' => true,
                       'message' => 'Cập nhật giỏ hàng thành công'
                    ]);
                }
            }else{
                return response()->json([
                   'success' => false,
                   'message' => 'Loại thay đổi không hợp lệ'
                ]);
            }
        }

    }

    
    public function productToCard($id,Request $request){
        $order = OrderUser::with('product.type_Product','product.supplier','product.category_product')
        ->where('user_id',$id)->where('type_id',1)->get();
        return response()->json([
           'success' => true,
            'data' => $order,
           'message' => 'Lấy thông tin giỏ hàng thành công'
        ]);
    }

    public function productToCardLike($id,Request $request){
        $order = OrderUser::with('product.type_Product','product.supplier','product.category_product')
        ->where('user_id',$id)->where('type_id',2)->get();
        return response()->json([
           'success' => true,
            'data' => $order,
           'message' => 'Lấy thông tin giỏ hàng yêu thích thành công'
        ]);
    }
    
    public function createOrder(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if($request->payment_type == 2){
            $firstName = $request->firstname;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $note = $request->note;
            $vouchers = $request->vouchers;
            $cart = $request->cart ?? array(13); 
                $code_voucer = '';
                $total = 0;
                if($vouchers){
                    $code_voucer = $vouchers['id'];
                    $total = $vouchers['total'];
                    $promotion = Promotion::find($code_voucer);
                    $promotion->update(['quantity'=>$promotion->quantity-1]);
                }
                $order = Order::create([
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                    'payment_type' => 2,
                    'status' => 0,
                    'lastname' => $lastName,
                    'firstName' => $firstName,
                    'user_id' => $request->user_id,
                    'created_at' => Carbon::now(),
                    'code_discount' => $code_voucer,
                    'cityid' => $request->cityid,
                    'wardid' => $request->wardid,
                    'provinceid' => $request->provinceid,
                ]);
           
                $sum_vip =0;
    
                foreach ($cart as $index => $item) {
                    $user_order_find = OrderUser::find($item);
                 
                    $orderDetail = OrderDetail::create([
                        'product_id' => $user_order_find->product_id,
                        'user_id' => $request->user_id,
                        'order_id' => $order->id,
                        'quantity' => $user_order_find->quantity,
                        'price' => $user_order_find->price,
                        'total_payment' => $user_order_find->total_payment,
                        'discount' => (int)$user_order_find->discount,
                    ]);
    
             
                    $orderDetails[] = $orderDetail;
                    DB::table('products')
                    ->where('id', $user_order_find->product_id)
                    ->update([
                        'quantity' => DB::raw('quantity - ' . (int)$user_order_find->quantity)
                    ]);
                    $plus = DB::table('products')->select('points')->where('id',$user_order_find->product_id)->first();
                    $sum_vip +=  $plus->points ?? 0;
                   
                }
                
             

                $user_plus = User::find($request->user_id);
                $user_plus_1 = $user_plus->vip;
                $user_plus->update([
                    'vip' => (int)$user_plus_1 + (int)$sum_vip,
                ]);
               
                $totalPayment = 0;
                $paymentType = $request->payment_type;
                $orderData = $order;

                foreach ($orderDetails as $orderDetail) {
                    $totalPayment += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
                }
                $end =   $totalPayment - $total;
           
                $update = Order::find($order->id)->update([
                    'total' => $end+(int) $request->tienship
                ]);     
                $products= DB::table('products')->get();
    
                $detailOrder = $orderDetails;
    
                $user = User::find($request->user_id);
    
                $email = $request->email;
                foreach ($cart as $index => $item) {
                    $user_order_find = OrderUser::find($item)->delete();   
                }
                try{
                    Mail::send('email.order', [
                        'totalPayment' => $totalPayment,
                        'paymentType' => $paymentType == 1 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản',
                        'order' => $order,
                        'orderData' => $orderData,
                        'products' => $products,
                        'detailOrder' => $detailOrder,
                        'user' => $user,
                        'email' => $email
                    ], function ($mail) use ($email) {
                        $mail->subject('Đơn đặt hàng của bạn!');
                        $mail->to($email, 'Sell');
                    }); 
                }catch (\Exception  $e) {   
                }
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
                    if ($request->payment_type == 2) {
                        return response()->json([
                            'data' => $vnp_Url,
                            'success' => true,
                            'message' => 'Đặt hàng thành công'
                        ]);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
           
        }else{
            $firstName = $request->firstname;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $note = $request->note;
            $vouchers = $request->vouchers;
            $cart = $request->cart ?? array(13); 
                $code_voucer = '';
                $total = 0;
                if($vouchers){
                    $code_voucer = $vouchers['id'];
                    $total = $vouchers['total'];
                    $promotion = Promotion::find($code_voucer);
                    $promotion->update(['quantity'=>$promotion->quantity-1]);
                }
                $order = Order::create([
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                    'payment_type' => 1,
                    'status' => 0,
                    'lastname' => $lastName,
                    'firstName' => $firstName,
                    'user_id' => $request->user_id,
                    'created_at' => Carbon::now(),
                    'code_discount' => $code_voucer,
                    'cityid' => $request->cityid,
                    'wardid' => $request->wardid,
                    'provinceid' => $request->provinceid,
                ]);
             
              
    
                foreach ($cart as $index => $item) {
                    $user_order_find = OrderUser::find($item);    
                    $sum_vip =0;
                    $orderDetail = OrderDetail::create([
                        'product_id' => $user_order_find->product_id,
                        'user_id' => $request->user_id,
                        'order_id' => $order->id,
                        'quantity' => $user_order_find->quantity,
                        'price' => $user_order_find->price,
                        'total_payment' => $user_order_find->total_payment,
                        'discount' => (int)$user_order_find->discount,
                    ]);
                    
             
                    $orderDetails[] = $orderDetail;
                    DB::table('products')
                    ->where('id', $user_order_find->product_id)
                    ->update([
                        'quantity' => DB::raw('quantity - ' . (int)$user_order_find->quantity)
                    ]);
                    $plus = DB::table('products')->select('points')->where('id',$user_order_find->product_id)->first();
                    $sum_vip +=  $plus->points ?? 0;
                   
                }
                
             

                $user_plus = User::find($request->user_id);
                $user_plus_1 = $user_plus->vip;
                $user_plus->update([
                    'vip' => (int)$user_plus_1 + (int)$sum_vip,
                ]);
               
                $totalPayment = 0;
                $paymentType = $request->payment_type;
                $orderData = $order;

                foreach ($orderDetails as $orderDetail) {
                    $totalPayment += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
                }
                $end =   $totalPayment - $total;
           
                $update = Order::find($order->id)->update([
                    'total' => $end+(int) $request->tienship
                ]);     
                $products= DB::table('products')->get();
    
                $detailOrder = $orderDetails;
    
                $user = User::find($request->user_id);
    
                $email = $request->email;
                foreach ($cart as $index => $item) {
                    $user_order_find = OrderUser::find($item)->delete();   
                }
                try{
                    Mail::send('email.order', [
                        'totalPayment' => $totalPayment,
                        'paymentType' => $paymentType == 1 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản',
                        'order' => $order,
                        'orderData' => $orderData,
                        'products' => $products,
                        'detailOrder' => $detailOrder,
                        'user' => $user,
                        'email' => $email
                    ], function ($mail) use ($email) {
                        $mail->subject('Đơn đặt hàng của bạn!');
                        $mail->to($email, 'Sell');
                    }); 
                    return response()->json([
                        'data' => $order,
                        'success' => true,
                        'message' => 'Đặt hàng thành công'
                    ]);
                }catch (\Exception  $e) {
                    return response()->json([
                        'data' => $order,
                        'success' => true,
                        'message' => 'Đặt hàng thành công'
                    ]);
                }
            }
    }

    public function edit($id){
        $order = Order::with('orderDetail.product')->find($id);
        if($order){
            return response()->json([
                'data' => $order,
                'success' => true,
                'message' => 'Đặt hàng thành công'
            ]);
        }else{
            return response()->json([
                'data' => null,
                'success' => false,
                'message' => 'Đặt hàng không tồn tại'
            ]);
        }
        
    }


    public function  myOrder(Request $request,$id) {
        $page = $request->page ?? 1;
        $pageSize = $request->per_page ?? 100;
        $query  = Order::orderByDesc('created_at')
        ->with('Provinceid_AD','City_AD','Ward_AD')
        ->where('user_id', $id);
        
        if($request->status){
            $order = $query->where('status', $request->status);
        }
        if($request->code){
            $bill = $request->code;
            $check_bill = str_replace('OR000','',$bill);
            $order = $query->where('id',$check_bill);
            
        }
        if ($pageSize) {
            $order = $query->paginate($pageSize, ['*'], 'page', $page);
        } else {
            $order = $query->get();
        }
        return response()->json([
            'data' => $order,
            'success' => true,
            'message' => 'Đặt hàng thành công'
        ]);
    }
    public function addCart(Request $request){
        if(!$request->user_id && !$request->quantity && !$request->product_id){
            return response()->json([
                'success' => false,
                'message' => 'Tên người dùng, giá,  sản phẩm không được bỏ trống'
             ]);
        }
        if($request->quantity <= 0){
            return response()->json([
               'success' => false,
               'message' => 'Số lượng phải lớn hơn 0'
            ]);
        }
        $product = Product::find($request->product_id);
        if(!$product){
            return response()->json([
               'success' => false,
               'message' => 'Sản phẩm không tồn tại'
            ]);
        }
        if($request->quantity > $product->quantity ){
            return response()->json([
               'success' => false,
               'message' => 'Sản phẩm không đủ số lượg'
            ]);
        }
        $check_cart = OrderUser::where('product_id',$request->product_id)
        ->where('type_id',1)
        ->where('user_id',$request->user_id)->first();
        if($check_cart){
           
            $check_cart->update([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'discount' => $product->discount ?? 0,
                'total_payment' => ($product->price * $request->quantity) - (($product->discount ?? 0) * $request->quantity),
                'type_id' => 1
            
            ]);
            return response()->json([
               'data' => $check_cart,
               'success' => true,
               'message' => 'Thêm vào giỏ hàng thành công'
            ]);
        }else{
            $orderUser = OrderUser::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'discount' => $product->discount ?? 0,
                'total_payment' => ($product->price * $request->quantity) - (($product->discount ?? 0) * $request->quantity),
                'type_id' => 1
            
            ]);
            return response()->json([
               'data' => $orderUser,
               'success' => true,
               'message' => 'Thêm vào giỏ hàng thành công'
            ]);
        }
       
    }
    public function addCartLike(Request $request) {
        if(!$request->user_id && !$request->quantity && !$request->product_id){
            return response()->json([
                'success' => false,
                'message' => 'Tên người dùng, giá,  sản phẩm không được bỏ trống'
             ]);
        }
        if($request->quantity <= 0){
            return response()->json([
               'success' => false,
               'message' => 'Số lượng phải lớn hơn 0'
            ]);
        }
        $product = Product::find($request->product_id);
        if(!$product){
            return response()->json([
               'success' => false,
               'message' => 'Sản phẩm không tồn tại'
            ]);
        }
        if($request->quantity > $product->quantity ){
            return response()->json([
               'success' => false,
               'message' => 'Sản phẩm không đủ số lượg'
            ]);
        }
        $check_cart = OrderUser::where('product_id',$request->product_id)
        ->where('type_id',2)
        ->where('user_id',$request->user_id)->first();
        if($check_cart){
           
            $check_cart->update([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'discount' => $product->discount ?? 0,
                'total_payment' => ($product->price * $request->quantity) - (($product->discount ?? 0) * $request->quantity),
                'type_id' => 2
            
            ]);
            return response()->json([
               'data' => $check_cart,
               'success' => true,
               'message' => 'Thêm vào giỏ hàng thành công'
            ]);
        }else{
            $orderUser = OrderUser::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'discount' => $product->discount ?? 0,
                'total_payment' => ($product->price * $request->quantity) - (($product->discount ?? 0) * $request->quantity),
                'type_id' => 2
            
            ]);
            return response()->json([
               'data' => $orderUser,
               'success' => true,
               'message' => 'Thêm vào giỏ hàng thành công'
            ]);
        }
    }


    public function updateStatus(Request $request) {
        $order = Order::find($request->id);
        if($order){
            $order->update([
               'status' => $request->status
            ]);
            return response()->json([
                'data' => $order,
                'success' => true,
                'message' => 'Cập nhật trạng thái đơn hàng thành công'
            ]);
        } else{
            return response()->json([
                'data' => null,
                'success' => false,
                'message' => 'Đơn hàng không tồn tại'
            ]);
        }
    }

    public function productTransfer(Request $request) {
        
            $id = $request->id;
       
            $order = OrderUser::find($id);
            if($order){
                $order_user = OrderUser::where('product_id', $order->product_id)->where('user_id', $order->user_id)->first();
                if($order_user){
                    $quantity  = $order_user->quantity;
                 
                    $sum =   $quantity + $order->quantity;
                  
                    $product = Product::find($order->product_id);
            
                    if($sum > $product->quantity){
                        return response()->json([
                            'data' => null,
                           'success' => false,
                           'message' => 'Sản phẩm không đủ số lượng'
                        ]);
                    }
                    $order_user->update([
                        'quantity' => $sum,
                        'total_payment' => ($order_user->price*$sum) - ($order_user->discount*$sum)
                         
                    ]);
                    $order = OrderUser::find($id)->delete();
                }else{
                    $order->update([
                        'type_id' => 2,
                    ]);
                }
                
                return response()->json([
                    'data' => $order,
                    'success' => true,
                   'message' => 'Cập nhật trạng thái chuyển hàng thành công'
                ]);
            } else{
                return response()->json([
                    'data' => null,
                   'success' => false,
                   'message' => 'Đơn hàng không tồn tại'
                ]);
            }
    }
}
