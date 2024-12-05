<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Comment;
use App\Models\Product;
use App\Models\RateYo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
       
        $form = null;
        $to = null;
 
        $name = $request->get('name');

        $cate_id_pro = $request->id;
        $type_id = $request->type_product;
        $name_product = $request->name_product;
        $price_product = $request->price_product;
        $supplier_id = $request->supplier_id;
        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }


        $categoryProduct = DB::table('category_product')->get();
        $type_product = DB::table('type_product')->get();

 
        $products = Product::where('status', '=', 1)->with('type_Product');
       
        if($cate_id_pro){
            $products = $products->where('cate_id', '=', $cate_id_pro);

        }
        if($supplier_id){
            $products = $products->where('supplier_id', '=', $supplier_id);

        }
        if($name_product){
            $products = Product::where('name', 'like', '%' . $name_product . '%');
        }
        if($type_id){
            $products = $products->where('type_id',$type_id);
        }
        if($price_product == 1){
            //giam dan
            $products = $products->orderBy('price','desc');
        }
        else if($price_product == 2){

            //tang dan
            $products = $products->orderBy('price','asc');

        }else{
            $products = $products->orderBy('id', 'desc');
        }
        if($request->search_amount){
            $search_amount = $request->search_amount; 
            $search_array = explode(' /vnđ ', $search_amount);

            // Nếu bạn muốn loại bỏ khoảng trắng dư thừa:
            $search_array = array_map('trim', $search_array);
            $search_array[1] = ltrim($search_array[1], '-'); // Loại bỏ dấu -
            $search_array[1] = str_replace(' /vnđ', '', $search_array[1]);
            $form =  $search_array[0];
            $to =  $search_array[1];
            // dd();
            $products = $products->whereBetween('price', [str_replace(',', '', $form),str_replace(',', '', $to)]);
        }

        
        
        $products = $products->paginate(20);
       
        $cart_like = $request->session()->get('cart_like'); // Lấy giỏ hàng từ session
       
        if (is_array($cart_like)) {
            $numberOfItemsInCartLike = count($cart_like); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCartLike = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }
        // dd($id);

        $Supplier = DB::table('Supplier')->where('status',1)->get();
        return view('client.product', compact('name', 'categoryProduct', 
        'numberOfItemsInCart','products','cate_id_pro',
        'name_product','type_product','type_id','price_product','numberOfItemsInCartLike',
        'cart_like','form','to','Supplier','supplier_id'));
    }

    public function cate($id, Request $request)
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
        
 
        $categoryProduct = DB::table('category_product')->get();
        $products = Product::where('cate_id', $id)->where('status', 1)->paginate(12);

        return view('client.product', $this->v, compact('categoryProduct', 'products', 'categoryProduct', 'name', 'numberOfItemsInCart'));
    }

    public function detail($id, Request $request)
    {
        // dd(1);
       
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
        $product = Product::where('status', '=', 1)->find($id);   
        $product_comment = Product::where('cate_id',$product->cate_id)->where('id','!=',$product->id)->get();
        $start = 0;

        $count = 1;
        $RateYo = RateYo::orderByDesc('id')->where('product_id',$id)->where('status',2)->with('User')->paginate(5);
        $RateYo_get = RateYo::orderByDesc('id')->
        where('product_id',$id)->where('status',2)->with('User')->get();
        foreach($RateYo_get as $rate){
            $count = $count + 1;
            $start = $start + (int)$rate->rate;
        }
        $start = $start / $count;
        return view('client.product_detail', compact('name', 'numberOfItemsInCart','product',
        'product_comment','numberOfItemsInCartLike','cart_like','RateYo','start'));
    }

    public function see($id,Request $request){
        // dd($id);
        $product= Product::find($id);
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
        
        return view('client.see',compact('product','name','id','numberOfItemsInCartLike','numberOfItemsInCart'));
    }
}
