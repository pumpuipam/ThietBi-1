<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\RateYo;

class RateYoController extends Controller
{
    //

    public function store(Request $request){
        $check = RateYo::where('product_id',$request->id)
        ->where('user_id',$request->user_id)->where('status',2)
        ->get();
        if($check->count() > 0){
            return response()->json(['error' => 'Đánh giá đã được duyệt']);
        }
        RateYo::create([
            'rate' => $request->rate,
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'product_id' => $request->id,
            'status' => RateYo::notApprovedYet,
        ]);
        return response()->json(['success' => 'Thêm đánh giá thành công']);
    }

    public function index(){
        $rateYos = RateYo::with('Product')->get();
        $array = [];
        foreach ($rateYos->groupBy('product_id') as $productId => $group) {
            // Khởi tạo các biến đếm status
            $statusCount = [
                'status_1' => 0,
                'status_2' => 0,
                'status_3' => 0
            ];
        
            // Duyệt qua từng rateYo của cùng product_id và đếm status
            foreach ($group as $rate) {
                switch ($rate->status) {
                    case 1:
                        $statusCount['status_1']++;
                        break;
                    case 2:
                        $statusCount['status_2']++;
                        break;
                    case 3:
                        $statusCount['status_3']++;
                        break;
                }
            }
        
            // Lưu kết quả vào mảng với product_id và status count
            $array[] = [
                'product_id' => $productId,
                'product_name' => optional($group->first()->product)->name, // Lấy tên product nếu tồn tại
                'image_url' => optional($group->first()->product)->image,
                'status_count' => $statusCount
            ];
        }
        // dd($array);
        return view('admin.rateYo.index',compact('array'));
    }

    public function edit($id){
        $rateYos = RateYo::with('Product','User')->where('product_id',$id)->get();
        return view('admin.rateYo.edit',compact('rateYos'));

    }

    public function update($id,$status){
        
        $rateyo = RateYo::find($id);
        $rateyo->status = $status;
        $rateyo->save();
        Session::flash('success', 'Thêm vào giỏ hàng thành công!');

        return redirect()-> back();

    }
}
