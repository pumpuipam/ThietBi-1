<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ContactController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
       
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        return view('client.contact', compact('name','numberOfItemsInCart','numberOfItemsInCartLike'));
    }

    public function indexPhone(Request $request){
  
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
       
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        return view('client.contact_phone', compact('name','numberOfItemsInCart','numberOfItemsInCartLike'));
    }
}
