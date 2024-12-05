<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RateYo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ProductsController extends Controller
{
    //

    public function index(Request $request){
        $page = $request->page ?? 1;
        $pageSize = $request->per_page ?? 100;
        $query = Product::with('category_product','type_Product','supplier')->where('status', 1);

        if ($request->cate_id) {
            $query->where('cate_id', '=', $request->cate_id);
        }
        
        if ($request->supplier_id) {
            $query->where('supplier_id', '=', $request->supplier_id);
        }
        
        if ($request->name_product) {
            $query->where('name', 'like', '%' . $request->name_product . '%');
        }
        
        if ($request->type_id) {
            $query->where('type_id', $request->type_id);
        }
        
        if ($request->price_product == 1) {
            $query->orderBy('price', 'desc');
        } elseif ($request->price_product == 2) {
            $query->orderBy('price', 'asc');
        } else {
            $query->orderBy('id', 'desc');
        }
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if (isset($pageSize)) {
            $result = $query->paginate($pageSize, ['*'], 'page', $page ?? 1);
        } else {
            $result = $query->get();
        }
        
   
        
        return response()->json([
            'data' => $result,
            'success' => true,
            'message' => 'Lấy danh mục sản phảm'
        ]);
    }

    public function storeRateYo(Request $request){
        $check = RateYo::where('product_id',$request->id)
        ->where('user_id',$request->user_id)->where('status',2)
        ->get();
        if($check->count() > 0){
            return response()->json(['error' => 'Đánh giá đã được duyệt']);
        }
        $rate_yo = RateYo::create([
            'rate' => $request->rate,
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'product_id' => $request->id,
            'status' => RateYo::notApprovedYet,
        ]);
        return response()->json([
            'data' => $rate_yo,
            'success' => true,
            'message' => 'Đánh giá kháo học thành công'
        ]);
    }

    public function edit($id) {
        $product = Product::where('status', '=', 1)->with('category_product','type_Product','supplier')->find($id); 
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại'
                
            ]);
        }else{
            return response()->json([
                'data' => $product,
                'success' => true,
               'message' => 'Lấy thông tin sản phẩm'
            ]);
        }
       
    }

    public function rateYoProduct($id){
        $page = $request->page ?? 1;
        $pageSize = $request->per_page ?? 100;
        $query = RateYo::orderByDesc('id')->where('product_id',$id)->where('status',2)->with('User');
        if (isset($pageSize)) {
            $result = $query->paginate($pageSize, ['*'], 'page', $page ?? 1);
        } else {
            $result = $query->get();
        }
        return response()->json([
            'data' => $result,
            'success' => true,
           'message' => 'Lấy thông tin sản phẩm'
        ]);
    }

    public function productGroup($id){
        $product = Product::where('status', '=', 1)->find($id);   
        $product_comment = Product::where('cate_id',$product->cate_id)->where('id','!=',$product->id)->where('status',1)->get();
        return response()->json([
            'data' => $product_comment,
           'success' => true,
           'message' => 'Lấy danh sách sản phẩm cùng nhóm'
        ]);
    }


    public function indexCategories() {
        $categories = DB::table('category_product')->get();
        return response()->json([
            'data' => $categories,
           'success' => true,
           'message' => 'Lấy danh sách sản phẩm cùng nhóm'
        ]);
    }

    public function indexType() {
        $categories = DB::table('type_product')->get();
        return response()->json([
            'data' => $categories,
           'success' => true,
           'message' => 'Lấy danh sách sản phẩm cùng nhóm'
        ]);
    }
}
