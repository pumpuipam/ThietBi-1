<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\address;


use App\Models\User;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        // dd(1);
        if($request->start){
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        }else{
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();
        }
        $order = Order::whereBetween('created_at', [$data_start, $data_end])->with('orderDetail')->orderBy('id', 'desc');
      
        if($request->status){
            if($request->status == 10){
                $order = $order->where('status',0);
            }else{
                $order = $order->where('status',$request->status);
            }
          
        }
        if($request->bill){
            $bill = $request->bill;
            $check_bill = str_replace('OR000','',$request->bill);
            $order = $order->where('id',$check_bill);
            
        }else{
            $bill = '';

        }
        $status = (int)$request->status;
        
       
   
        $order = $order->paginate(20);
       
        
      
        $countOrderSuccessToday  = Order::whereBetween('created_at', [$data_start, $data_end])->where('status',1)->count();

        $countOrderPendingToday = Order::whereBetween('created_at', [$data_start, $data_end])->where('status',0)->count();

        $countOrderCancelToday = Order::whereBetween('created_at', [$data_start, $data_end])->where('status',3)->count();

        $countOrderAcceptToday = Order::whereBetween('created_at', [$data_start, $data_end])->where('status',5)->count();
      
        return view('admin.order.list', compact('order','countOrderSuccessToday',
        'countOrderCancelToday','countOrderPendingToday',
        'countOrderAcceptToday','data_start','data_end','status','bill'));
    }

    public function edit($id)
    {
        // dd(1);
        $orders = Order::where('id',$id)->with('Provinceid_AD','City_AD','Ward_AD')->first();
        $price_check = 0;
        $address = address::where('cityid', $orders->cityid)
        ->where('provinceid', $orders->provinceid)
        ->where('wardid', $orders->wardid)
        ->first();
        if($address){
            $price_check = $address->price;
        }
      
        $username = $orders->User_Order->email ?? '';
        $userId = $orders->User_Order->id ?? '';
       
        $orderDetail = OrderDetail::with('user')->with('product')->with('order')
            ->where('order_id', '=', $orders->id)
            ->orderBy('id', 'desc')
            ->get();
       
        return view('admin.order_detail.list', compact('orders', 'orderDetail','username','userId','price_check'));
    }

    public function update($id, Request $request)
    {

        $method_route = 'route_BackEnd_Orders_Edit';
        $params = [];
        
        $auth = auth()->user()->id;
        
        if($auth != User::ADMIN){
            
            $Order = Order::find($id);
           
            if($Order->status == 4){
                toastr()->error('Đơn hàng đã được xác nhận.');
                
                return redirect()->route('user.userOrder');
            }else{
                $params['cols'] = $request->post();

                unset($params['cols']['_token']);
                $params['cols']['id'] = $id;
                $modelNew = new Order();
                $res = $modelNew->saveUpdate($params);
            }
            
        }else{
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            $params['cols']['id'] = $id;
            $modelNew = new Order();
            $res = $modelNew->saveUpdate($params);
        }
      
      
        $Order = Order::find($id);

        if($request->status == 1){
            if($Order->orderDetail){
                foreach($Order->orderDetail as $detail){
                    $product_id =  DB::table('products')->where('id',$detail->product_id)->first();
                    if($product_id->quantity){
                        $quantity = $product_id->quantity;
                    }else{
                        $quantity = 0;
                    }
                    DB::table('products')->where('id',$detail->product_id)->update([
                        'quantity' =>   $quantity - (int)$detail->quantity
                    ]);
                }
            }
        }
        
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật đơn hàng thành công!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function updateAdmin($id,Request $request){

      
        $Order = Order::find($id);
        
        if($Order->status == 1){
            if($Order->orderDetail){
                foreach($Order->orderDetail as $detail){
                    $product_id =  DB::table('products')->where('id',$detail->product_id)->first();
                    if($product_id->quantity){
                        $quantity = $product_id->quantity;
                    }else{
                        $quantity = 0;
                    }
                    DB::table('products')->where('id',$detail->product_id)->update([
                        'quantity' =>   $quantity + (int)$detail->quantity
                    ]);
                }
            }
        }
        $Order = Order::find($id)->update(['status' => $request->status]);
        Session::flash('success', 'Hủy đơn hàng thành công!');
        return redirect()->back();

    }
    // public function pdf($id)
    // {
    //     $modelOrder = new Order();
    //     $this->v['orders'] = $modelOrder->loadOne($id);

    //     $data['title'] = 'Hoá đơn';
    //     $data['orderDetail'] =  OrderDetail::with('user')->with('product')->with('order')
    //         // ->where('order_id', '=', $this->v['orders']->id)
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     $pdf = PDF::loadView(['data', $data])->setOptions(['defaultFont' => 'sans-serif']);

    //     return $pdf->download('invoice.pdf');
    // }

    public function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id)
    {
        // $order = new Order();
        // $this->v['orders'] = $order->loadOne($id);
        $Order= Order::find($id);
        
        // $this->v['orderDetail'] = OrderDetail::with('user')->with('product')->with('order')
        //     ->where('order_id', '=', $this->v['orders']->id)
        //     ->orderBy('id', 'desc')
        //     ->get();
        $orderDetail =OrderDetail::with('user')->with('product')->with('order')
            ->where('order_id', '=', $Order->id)
            ->orderBy('id', 'desc')
            ->get();
       
       
        $output = '';
        $output .= '
        <title>Đơn hàng</title>
        <style>
        body{
            font-family:DejaVu Sans;
        }
        h2 {
            text-align: center;
        }
        i {
            font-size : 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
          }

          td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 0 8px 8px 8px;
          }

         
        
        </style>';

        $statusText = '';
        if ($Order->status == 0) {
            $statusText = 'Đang chờ';
        } elseif ($Order->status ==  1) {
            $statusText = 'Đã hoàn thành';
        } else {
            $statusText = 'Huỷ';
        }
        $imgPath = public_path('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png');
        $imgData = base64_encode(file_get_contents($imgPath));
        $imgSrc = 'data:image/png;base64,' . $imgData;
       

        $output .= '
        <h2>Thông tin đơn hàng</h2>
        <div style="margin-left:280px;">
        <img alt="Akasha" src="'.$imgSrc.'"
                                        class="" style="width:150px;">
        </div>
        <i>Tài khoản mua hàng: ' . $Order->User_Order->email . '</i><br>
        <i>Họ tên người đặt hàng: ' . $Order->firstName . ''.$Order->lastname.'</i><br>
        <i style="text-align:right;">Số điện thoại: ' . $Order->phone . '</i><br>
        <i >Email:  ' . $Order->email . '</i><br>
        <i ">Địa chỉ: ' . $Order->address . '</i><br>
        <i ">Ghi chú: ' . $Order->note . '</i>
        <h5>
            <i class="far fa-calendar-minus scale3 me-3"></i>
            Trạng thái đơn hàng: ' . $statusText . '
        </h5>
    
        </div>
        
        <table>
            <thead>
                <tr>
                   
                    <th >Tên sản phẩm</th>
                    <th >Số lượng</th>
                    <th >Giá</th>
                    <th>Giảm giá</th>
                    <th >Tổng đơn hàng</th>
                </tr>
            </thead>
            <tbody>';
        $total_paymeny = 0;
        foreach ($orderDetail as $order) {
            $imgPath = public_path($order->product->image);
            $imgData = base64_encode(file_get_contents($imgPath));
            $imgSrc = 'data:image/png;base64,' . $imgData;
            $output .= '
                            <tr>
                          
                            <td>
                                <div class="guest-bx">
                                  
                                    <div>
                                        <h4 class="mb-0 mt-1""> ' . $order->product->name . '</h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . $order->quantity . '<br></span>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . number_format($order->price) . ' đ<br></span>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . number_format($order->discount) . ' đ<br></span>
                            </td>
                            <td>
                                <span class="text-danger d-block guest-bx">' . number_format($order->total_payment) . ' đ<br></span>
                            </td>
                        </tr>';
                        $total_paymeny = $total_paymeny + $order->total_payment;
        }


     
        
        $output .= '
                </tbody>
            </table>
            <div style="text-align:center;">
                <div class="me-10 mb-sm-0 mb-3">
                    <h3 class="mb-2">Tổng thanh toán</h3>
                    <hr style="width:10%;" >
                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>' . number_format($total_paymeny) . 'đ</var></b></h3>
                </div>
            </div>
        ';

        return $output;
    }

    public function paymentVNPay(Request $request){
        return 1;
    }
}
