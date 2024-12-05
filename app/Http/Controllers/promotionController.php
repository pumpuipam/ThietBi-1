<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class promotionController extends Controller
{
    //

    public function index(Request $request){
        $Promotion = Promotion::orderBy('id', 'desc')->paginate(10);
        return view('admin.promotion.index',compact('Promotion'));
    }


    public function create(Request $request){
        return view('admin.promotion.create');
    }

    public function store(Request $request){
        $request->merge([
            'total' => str_replace(',', '', $request->total ?? 0),
      
        ]);
        if(!$request->condition){
            $request->merge([
                'condition' => 2
            ]);
        }
        $Promotion = Promotion::where('code',$request->code)->first();
        if($Promotion){
            Session::flash('error', 'Mã khuyến mãi đã tồn tại !');
            return redirect()->back();
        }else{
            Promotion::create([
           
                'name' => $request->name, 
                'code' => $request->code,
                'quantity' => $request->quantity,
                'form' => $request->form,
                'total' => $request->total,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'condition' => $request->condition,
                'status' => $request->status
            ]);

            Session::flash('success', 'Tạo khuyến mãi thành công !');
            return redirect()->route('promotion.index');
        }
       
      
    }

    public function edit($id){
    
        $Promotion = Promotion::find($id);
        return view('admin.promotion.edit',compact('Promotion'));
    }

    public function update(Request $request){
        $request->merge([
            'total' => str_replace(',', '', $request->total ?? 0),
      
        ]);
        $Promotion = Promotion::find($request->id);
        $Promotion->update([
            'name' => $request->name, 
                'code' => $request->code,
                'quantity' => $request->quantity,
                'form' => $request->form,
                'total' => $request->total,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'condition' => $request->condition,
                'status' => $request->status
        ]);
        Session::flash('success', 'Cập nhật khuyến mãi thành công !');
        return redirect()->route('promotion.index');
    }
}
