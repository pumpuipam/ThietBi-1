<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $phone = $request->get('phone');
        if ($name) {
            $suppliers = Supplier::where('name', 'like', '%' . $name . '%')
                ->paginate(10);
        } elseif ($phone) {
            $suppliers = Supplier::where('phone', 'like', '%' . $phone . '%')
                ->paginate(10);
        } else {
            $suppliers = Supplier::orderBy('id', 'desc')
                ->paginate(10);
        }

        return view('admin.supplier.list', compact('suppliers'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Suppliers_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3',
                'phone' => 'required|numeric|min:10',
            ], [
                'name.required' => 'Tên bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'phone.required' => 'Số điện thoại bắt buộc nhập!',
                'phone.numeric' => 'Số điện thoại phải là số!',
                'phone.min' => 'Số điện thoại tối thiểu 10 số!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new Supplier();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm nhà cung cấp thành công!');
                return redirect()->route('route_BackEnd_Suppliers_List');
            } else {
                Session::flash('error', 'Thêm nhà cung cấp không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.supplier.create');
    }

    public function edit($id)
    {
        $modelSupplier = new Supplier();
        $supplier = $modelSupplier->loadOne($id);
        $this->v['supplier'] = $supplier;
        return view('admin.supplier.edit', $this->v);
    }

    public function update($id, SupplierRequest $request)
    {

        $method_route = 'route_BackEnd_Suppliers_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelSupplier = new Supplier();
        $res = $modelSupplier->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Suppliers_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function delete($id){
     
        $Supplier = Supplier::find($id);

        if ($Supplier) {
            $result = $Supplier->delete();
            if ($result) {
                Session::flash('success', 'Xóa thành công!');
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
            
        

    }

}
