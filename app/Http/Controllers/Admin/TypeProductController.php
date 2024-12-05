<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeProductRequest;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeProductController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
       
        $typeProduct = TypeProduct::orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.type_product.list', compact('typeProduct'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Type_Product_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ], [
                'name.required' => 'Tên loại bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'images.required' => 'Ảnh không được để trống!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                
                $params['cols']['image'] = $this->uploadFile($request->file('images'));
            }
            $modelTes = new TypeProduct();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm loại sản phẩm thành công!');
                return redirect()->route('route_BackEnd_Type_Product_List');
            } else {
                Session::flash('error', 'Thêm loại sản phẩm không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.type_product.create');
    }

    public function edit($id)
    {
  
        $modelTypeProduct = new TypeProduct();
        $typeProduct = $modelTypeProduct->loadOne($id);
        $this->v['typeProduct'] = $typeProduct;
        return view('admin.type_product.edit', $this->v);
    }

    public function update($id, TypeProductRequest $request)
    {

        $method_route = 'route_BackEnd_Type_Product_Edit';
        $params = [];

        $params['cols'] = $request->post();
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
                
            $params['cols']['image'] = $this->uploadFile($request->file('images'));
        }
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelTypeProduct = new TypeProduct();
        $res = $modelTypeProduct->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Type_Product_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function delete($id){
        try{
            $TypeProduct = TypeProduct::find($id)->delete();
            Session::flash('success', 'Xóa thành công!');
        }catch (\Exception $e) {
            Session::flash('error', 'Xóa không thành công!');
        }
        return redirect()->back();
    
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
