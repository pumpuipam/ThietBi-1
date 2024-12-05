<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
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
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
       
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        $this->v['news'] = News::with('admin')->where('status', '=', 1)->get();

        return view('client.news', $this->v, compact('name', 'numberOfItemsInCart','numberOfItemsInCartLike'));
    }

    public function detail($id, Request $request)
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

        $this->v['new'] = News::where('status', '=', 1)->find($id);
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        return view('client.news_detail', $this->v, compact('name', 'numberOfItemsInCart','numberOfItemsInCartLike'));
    }
}
