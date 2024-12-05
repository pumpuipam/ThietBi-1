<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Session;
use App\Models\Promotion;
use Carbon\Carbon;

class CartController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }



    //thêm vào giỏ hàng

    public function addCart(Request $request)
    {
        
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []); // Nếu giỏ hàng chưa tồn tại thì tạo mới và ngược lại
        }
        
        $id = $request->input('id');
        $product = Product::find($id);
        //get () va all nó sẽ trả về cho mình 1 cái mảng
        //find object
        $name = $product->name;
        $amount = $request->input('amount');
        $price = $product->price;
        $quantity = $product->quantity;
        $discount = $product->discount;
        $image = $product->image;
        $total_price = $price - $discount;
        $total_payment = ($price - $discount) * $amount;
        $cc = 0; // kiểm tra sp có trong giỏ hàng hay không?

        $cart = $request->session()->get('cart');
       
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            if ($cart[$i][0] == $id) {
                $cc = 1;
                $soluongnew = $amount + $cart[$i][4];
                $cart[$i][4] = $soluongnew;
                $cart[$i][7] = ($price - $discount) * $soluongnew; // Cập nhật tổng giá mới
            }
        }

        // nếu không trùng sp trong giỏ hàng thì thêm mới
        if ($cc == 0) {
            // thêm mới sp vào giỏ hàng
            $sp = [$id, $image, $name, $price, $amount, $discount, $total_price, $total_payment,$quantity];
            $cart[] = $sp;
        }

        $card =  $request->session()->put('cart', $cart);
        $a = $request->session()->get('cart');
        return $a;
    }


    public function addCartLike(Request $request)
    {
        
        if (!$request->session()->has('cart_like')) {
            $request->session()->put('cart_like', []); // Nếu giỏ hàng chưa tồn tại thì tạo mới và ngược lại
        }
        
        $id = $request->input('id');
        $product = Product::find($id);
        //get () va all nó sẽ trả về cho mình 1 cái mảng
        //find object
        $name = $product->name;
        $amount = $request->input('amount');
        $price = $product->price;
        $quantity = $product->quantity;
        $discount = $product->discount;
        $image = $product->image;
        $total_price = $price - $discount;
        $total_payment = ($price - $discount) * $amount;
        $cc = 0; // kiểm tra sp có trong giỏ hàng hay không?

        $cart = $request->session()->get('cart_like');
       
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            if ($cart[$i][0] == $id) {
                $cc = 1;
                // $soluongnew = $amount + $cart[$i][4];
                // $cart[$i][4] = $soluongnew;
                // $cart[$i][7] = ($price - $discount) * $soluongnew; // Cập nhật tổng giá mới
            }
        }

        // nếu không trùng sp trong giỏ hàng thì thêm mới
        if ($cc == 0) {
            // thêm mới sp vào giỏ hàng
            $sp = [$id, $image, $name, $price, $amount, $discount, $total_price, $total_payment,$quantity];
            $cart[] = $sp;
        }

        $card =  $request->session()->put('cart_like', $cart);
        $a = $request->session()->get('cart_like');
        return $a;
    }

    public function addCartAdmin(Request $request)
    {
        
        if (!$request->session()->has('cart_admin')) {
            $request->session()->put('cart_admin', []); // Nếu giỏ hàng chưa tồn tại thì tạo mới và ngược lại
        }
    
        $id = $request->input('id');
        // dd($request->all());
        $product = Product::find($id);
      
        $name = $product->name;
        $amount = 1;
        $price = $product->price;
        $quantity = $product->quantity;
        $discount = $product->discount;
        $image = $product->image;
        $total_price = $price - $discount;
        $total_payment = ($price - $discount) * $amount;
        $cc = 0; // kiểm tra sp có trong giỏ hàng hay không?

        $cart = $request->session()->get('cart_admin');
     
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            if ($cart[$i][0] == $id) {
                $cc = 1;
                $soluongnew = $amount + $cart[$i][4];
                $cart[$i][4] = $soluongnew;
                $cart[$i][7] = ($price - $discount) * $soluongnew; // Cập nhật tổng giá mới
            }
        }

        // nếu không trùng sp trong giỏ hàng thì thêm mới
        if ($cc == 0) {
            // thêm mới sp vào giỏ hàng
            $sp = [$id, $image, $name, $price, $amount, $discount, $total_price, $total_payment,$quantity];
            $cart[] = $sp;
        }

        $card =  $request->session()->put('cart_admin', $cart);
        $a = $request->session()->get('cart_admin');
        return $a;
    }
    //Trang giỏ hàng
    public function cart(Request $request)
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

        if (isset($_SESSION['cart'])) {
            return view('client.cart', $this->v, [
                'cart' => $_SESSION['cart'],
                'name' => $name,
                'numberOfItemsInCart' => $numberOfItemsInCart,
            ]);
        }
    }

    //xoá 1 sp trong cart
    public function cartDelete($id,Request $request)
    {
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $cart = array_values($cart);

            $request->session()->put('cart', $cart);
        }
     
        return redirect()->back();
    }

    public function cartDeleteLikeOne($id,Request $request)
    {
        $cart = $request->session()->get('cart_like', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $cart = array_values($cart);

            $request->session()->put('cart_like', $cart);
        }
     
        return redirect()->back();
    }
    public function cartDeleteLike(Request $request)
    {
      
        $cart = $request->session()->get('cart_like', []);
        // dd($cart);
        foreach($cart as $key =>  $c){

            if($cart[$key][0] == (int)$request->id){
                unset($cart[$key]);
                $cart = array_values($cart);
                $request->session()->put('cart_like', $cart);
            }
          
        }
       
   
        return $cart;
    }
    public function cartDeleteAdmin(Request $request)
    {
        $cart = $request->session()->get('cart_admin', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            $cart = array_values($cart);

            $request->session()->put('cart_admin', $cart);
        }
     
        $a = $request->session()->get('cart_admin');
        return $a;
    }
 
    public function cartDeleteAll(Request $request)
    {
        $request->session()->put('cart', []);
        Session::flash('success', 'Xóa sản phẩm thành công!');

        return redirect()->back();
    }

    public function cartDeleteLikeAll(Request $request)
    {
        $request->session()->put('cart_like', []);
        
      
        Session::flash('success', 'Xóa yêu thích thành công!');
        return redirect()->back();
    }
    


    public function updateQuantity(Request $request){
        $id = $request->id;
        $value = $request->value;
        $cart = $request->session()->get('cart', []);
     
        if (isset($cart[$id])) {
           
            $cart[$id][4] = $value;
            $cart[$id][7] = $cart[$id][6]*$value;
        }
        $request->session()->put('cart', $cart);
        $total = 0;
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            $total = $total + $cart[$i][7];
        }
        return response()->json(['total' => $total]);
    }

    public function updateQuantityLike(Request $request){
        $id = $request->id;
        $value = $request->value;
        $cart = $request->session()->get('cart_like', []);
     
        if (isset($cart[$id])) {
           
            $cart[$id][4] = $value;
            $cart[$id][7] = $cart[$id][6]*$value;
        }
        $request->session()->put('cart_like', $cart);
        $total = 0;
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            $total = $total + $cart[$i][7];
        }
        return response()->json(['total' => $total]);
    }
    public function updateQuantityAdmin(Request $request){
       
        $id = $request->id;
        $value = $request->value;
        $cart = $request->session()->get('cart_admin', []);
     
        if (isset($cart[$id])) {
           
            $cart[$id][4] = $value;
            $cart[$id][7] = $cart[$id][6]*$value;
        }
        $request->session()->put('cart_admin', $cart);
        $total = 0;
        for ($i = 0; $i < sizeof($cart); $i++) {
            
            $total = $total + $cart[$i][7];
        }
        $a = $request->session()->get('cart_admin');
        return $a;
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
        // dd($cart);
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $Promotion = Promotion::where('quantity', '>', 0)
        ->where(function($query) {
            $query->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->orWhere('condition', 1);
        })
        ->orderBy('id', 'desc')
        ->get();
    

        $vouchers = $request->session()->get('vouchers');
        // dd($vouchers);
        return view('client.cart', $this->v, compact('name', 'numberOfItemsInCart'
        ,'numberOfItemsInCartLike','Promotion','vouchers'));
    }

    public function cartLike(Request $request){
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session
        // dd($cart);
        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        // dd($cart_like);
        return view('client.cart_like', $this->v, compact('name', 'numberOfItemsInCart','numberOfItemsInCartLike'));
    }

    public function cartLikeAdd(Request $request){
        $cart_like = $request->session()->get('cart_like', []);
        $cart = $request->session()->get('cart', []);

    // Duyệt qua tất cả sản phẩm trong 'cart_like'
    foreach ($cart_like as $like_item) {
        $exists = false;

        // Duyệt qua tất cả sản phẩm trong 'cart' để kiểm tra sự tồn tại
        foreach ($cart as &$cart_item) { // Dùng tham chiếu (&) để có thể cập nhật giá trị trong mảng
            
            if ($cart_item[0] == $like_item[0]) { // So sánh ID sản phẩm tại vị trí 0
                // dd($like_item);
                // Nếu sản phẩm đã tồn tại, cập nhật số lượng tại vị trí 4
                $cart_item[4] = (int)$cart_item[4] + (int)$like_item[4]; // Cộng thêm số lượng
                $cart_item[7] = (int)$cart_item[4]*$cart_item[6];
                $exists = true;
                break;
            }
        }

    // Nếu sản phẩm chưa có trong 'cart', thêm sản phẩm mới
    if (!$exists) {
        $cart[] = $like_item;
    }
    }

    // Cập nhật lại session 'cart'
    $request->session()->put('cart', $cart);

    // Xóa session 'cart_like' hoặc đặt nó thành mảng rỗng
    $request->session()->put('cart_like', []);
        Session::flash('success', 'Thêm vào giỏ hàng thành công!');
       
        return redirect()->back();
    }

    public function cartLikeAddOne(Request $request){
        $index = $request->index;
        $cart_like = $request->session()->get('cart_like', []);
        $cart = $request->session()->get('cart', []);
        $cart_item = $cart_like[$index]; 
        $cartLike[] =      $cart_item;
        
         // Duyệt qua tất cả sản phẩm trong 'cart_like'
        foreach ($cartLike as $like_item) {
            $exists = false;

            // Duyệt qua tất cả sản phẩm trong 'cart' để kiểm tra sự tồn tại
            foreach ($cart as &$cart_item) { // Dùng tham chiếu (&) để có thể cập nhật giá trị trong mảng
                
                if ($cart_item[0] == $like_item[0]) { // So sánh ID sản phẩm tại vị trí 0
                    // dd($like_item);
                    // Nếu sản phẩm đã tồn tại, cập nhật số lượng tại vị trí 4
                    $cart_item[4] = (int)$cart_item[4] + (int)$like_item[4]; // Cộng thêm số lượng
                    $cart_item[7] = (int)$cart_item[4]*$cart_item[6];
                    $exists = true;
                    break;
                }
            }

        // Nếu sản phẩm chưa có trong 'cart', thêm sản phẩm mới
        if (!$exists) {
            $cart[] = $like_item;
        }
        }

        // Cập nhật lại session 'cart'
            $request->session()->put('cart', $cart);

            // Xóa session 'cart_like' hoặc đặt nó thành mảng rỗng
            // // Xóa phần tử tại vị trí $index
            unset($cart_like[$index]);
            $cart_like = array_values($cart_like);

            $request->session()->put('cart_like', $cart_like);
            // $request->session()->put('cart_like', $cart_like); // Cập nhật lại dữ liệu trong session
            Session::flash('success', 'Thêm vào giỏ hàng thành công!');
        
            return redirect()->back();
        }


        public function addVoucher(Request $request) {
            // Lấy id từ request
            $request->session()->put('vouchers', []);
            $id = $request->id;
            $vouchers = $request->session()->get('vouchers', []);
     
            $vouchers['id'] = $id;
            $vouchers['total'] = $request->total;
            // dd($vouchers);
            $request->session()->put('vouchers', $vouchers);
        
            
            // Lưu id vào session với key là 'voucher_id'
            // $request->session()->put('vouchers', $id);
            // $vouchers = $request->session()->get('vouchers');
            return $vouchers;
        }

        public function removeVoucher(Request $request){
            $vouchers  = $request->session()->put('vouchers', []);
            return $vouchers;
        }
    }
