<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\TypeProduct;
use App\Models\Supplier;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }


    public function index(Request $request)
    {
       
        // dd(1);
        $products = Product::with('category_product')->orderBy('id', 'desc');
        if($request->out_of_stock){
            $products = Product::where('status',1)->where('quantity','<','10');
        }
        if($request->active == 1){
            $products = Product::where('status',1);
        }
        if($request->active == 2){
            $products = Product::where('status',2);
        }
        $products = $products->paginate(10);
   
        return view('admin.products.list', compact('products'));
    }

    public function create(Request $request)
    {
        //
        $method_route = "route_BackEnd_Products_Create";
        $category = DB::table('category_product')->get();
        $TypeProduct = TypeProduct::get();
  
        $request->merge([
            'price' => str_replace(',', '', $request->price),
            'quantity' => $request->quantity ? $request->quantity : 0,
            'discount' =>  str_replace(',', '', $request->discount ?? 0),
            'points' => $request->points ? str_replace(',', '', $request->points)  : 0
        ]);
        $Supplier = DB::table('supplier')->where('status',1)->get();
        // dd($Supplier);
        if((int)$request->discount > (int)$request->price){
            Session::flash('error', 'Giá giảm không được lớn hơn giá !');
            return redirect()->back();
        }
       
        if ($request->isMethod('post')) {
     
            $request->validate([
                'name' => 'required|min:3',
                'price' => 'required|gte:0',
                'type_id'=> 'required',
                'description' => 'required',
                'supplier_id' => 'required',
                'cate_id' => 'required',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
                'image_description' =>
                [
                    'required',
                ],
                
            ], [
                'name.required' => 'Tên sản phẩm bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'price.required' => 'Vui lòng nhập giá sản phẩm!',
                'price.gte' => 'Giá phải là số dương không âm',
                'type_id.required'=> 'Loại thương hiệu không được để trống',
                'description.required' => 'Vui lòng nhập mô tả!',
                'cate_id.required' => 'Vui lòng chọn danh mục!',
                'images.required' => 'Ảnh không được để trống!',
                'supplier_id.required' => 'Nhà cung cấp không được để trống!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
                'image_description.required' => 'Ảnh không được để trống!',
                // 'image_description.image' => 'Bắt buộc phải là ảnh!',
                // 'image_description.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $params['cols']['supplier_id'] = $request->supplier_id ??  Supplier::inRandomOrder()->value('id');;
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                // dd($request->file('images'));
                $params['cols']['image'] = $this->uploadFile($request->file('images'));
            }
            $pdf  = $request->pdf;


            $image_description = [];
         
            if ($request->hasFile('image_description')) {
              
                foreach($request->image_description as $imageDescription){
                 
                    $image_description[] = $this->uploadFile($imageDescription);
                }
               
            }
            $params['cols']['image_description'] = json_encode($image_description);
            if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
                $params['cols']['pdf'] = $this->uploadFile($request->file('pdf'));
            }
            $modelTes = new Product();
            $res = $modelTes->saveNew($params);
        
            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm sản phẩm thành công!');
                return redirect()->route('route_BackEnd_Products_List');
            } else {
                Session::flash('error', 'Thêm sản phẩm không thành công!');
                return redirect()->route($method_route);
            }
        }
        
        return view('admin.products.create', compact('category','TypeProduct','Supplier'));
    }

    public function edit($id)
    {
        // dd(1);
        $modelProduct = new Product();
        $product = $modelProduct->with('type_Product')->findOrFail($id);
       
        $this->v['cate_id'] = DB::table('category_product')->get();
        $this->v['product'] = $product;
        
        $this->v['TypeProduct'] = TypeProduct::get();
        $this->v['Supplier'] = DB::table('supplier')->where('status',1)->get();
        return view('admin.products.edit', $this->v);
    }

    public function update($id, ProductRequest $request)
    {
    
        $request->merge([
            'price' => str_replace(',', '', $request->price),
            'quantity' => $request->quantity ? $request->quantity : 0,
            'discount' => str_replace(',', '', $request->discount),
            'points' => $request->points ? str_replace(',', '', $request->points)  : 0
        ]);
        
        $method_route = 'route_BackEnd_Products_Edit';
        $params = [];
        
        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('images'));
        }

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        $image_description = [];
        if ($request->hasFile('image_description')) {
            foreach($request->image_description as $imageDescription){
             
                $image_description[] = $this->uploadFile($imageDescription);
            }
            $params['cols']['image_description'] = json_encode($image_description);
        }
        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $params['cols']['pdf'] = $this->uploadFile($request->file('pdf'));
        }
        $modelProduct = new Product();
        $res = $modelProduct->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Products_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHas = Str::random(20) . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public', $fileNameHas);
            $result = [
                'file_name' => $fileNameOriginal,
                'file_path' => Storage::url($filePath)
            ];
            return asset($result['file_path']);
    }
}
