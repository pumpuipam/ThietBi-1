<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;
use App\Models\Inventory;



use Illuminate\Support\Facades\DB;
class StatisticController extends Controller
{
    
    public function index(Request $request)
    {

     

        
        if ($request->start) {
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay()->subDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        } else {
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay();
            // ->subDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();

        }
        if($request->start){
            $data_start_ = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
           
        }else{
            $data_start_ = Carbon::today()->startOfDay();
     
        }
      
        $data_start_str = $data_start->format('Y-m-d H:i:s');
        $data_end_str = $data_end->format('Y-m-d H:i:s');
     
        $Inventory = Inventory::whereBetween('created_at', [$data_start_str, $data_end_str])->where('status',2)
        ->where('inventory_type',Inventory::IMPORT)->sum('total');
        $Inventory_quantity_import = Inventory::whereBetween('created_at', [$data_start_str, $data_end_str])->where('status',2)
        ->where('inventory_type',Inventory::IMPORT)->sum('quantity');
        
        $Inventory_ex = Inventory::whereBetween('created_at', [$data_start_str, $data_end_str])->where('status',2)
        ->where('inventory_type',Inventory::EXPORT)->sum('total');

        $Inventory_quantity_export =Inventory::whereBetween('created_at', [$data_start_str, $data_end_str])->where('status',2)
        ->where('inventory_type',Inventory::EXPORT)->sum('quantity');
        $orders = Order::whereBetween('created_at', [$data_start_str, $data_end_str])
            ->where('status', 1)
            ->with('orderDetail')
            ->get();


        $revenueByDay = [];

        $orders->each(function($order) use (&$revenueByDay) {
            $date = Carbon::parse($order->created_at)->format('Y-m-d');
            $orderTotal = $order->total;
            if (isset($revenueByDay[$date])) {
                $revenueByDay[$date] += $orderTotal;
            } else {
                $revenueByDay[$date] = $orderTotal;
            }
            });
            $date = [];
            $total = [];
            foreach ($revenueByDay as $key => $value) {
                $date[] = Carbon::parse($key)->format('d-m-Y');
                $total[] = $value;
            }
        
        return view('Statistic.index', compact('date', 'total', 'data_start_',
         'data_end','Inventory','Inventory_ex','Inventory_quantity_import','Inventory_quantity_export'));
    }
}
