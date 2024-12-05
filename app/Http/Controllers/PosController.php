<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    //

    public function index(Request $request)
    {
        $category =    CategoryProduct::with('product')->get();
        $a = $request->session()->get('cart_admin');
        $products = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        
        return view('admin.pos.index',compact('category','a','products'));
    }
}
