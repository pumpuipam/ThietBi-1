<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderDetailController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $orderDetail = OrderDetail::with('user')->with('product')->with('order')->orderBy('id', 'desc')->paginate(10);

        return view('admin.order.list', compact('orderDetail'));
    }

    public function edit($id)
    {
        $modelOrder = new OrderDetail();
        $orderDetail = $modelOrder->loadOne($id);
        $this->v['user_id'] = DB::table('admin')->get();
        $this->v['product_id'] = DB::table('products')->get();
        $this->v['order_id'] = DB::table('orders')->get();
        $this->v['orderDetail'] = $orderDetail;
        return view('admin.order.edit', $this->v);
    }

    public function update($id, Request $request)
    {
        $method_route = 'route_BackEnd_Orders_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelOrder = new OrderDetail();
        $res = $modelOrder->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Orders_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}
