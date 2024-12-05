<?php

namespace App\Http\Controllers;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    public function index(){
        $setting = setting::all();
      
        return view('admin.settings.index',compact('setting'));
    }

    public function store(Request $request){
        // str_replace(',', '', $request->diamond);
        setting::find(1)->update(['points' => str_replace(',', '', $request->broze)]);
        setting::find(2)->update(['points' => str_replace(',', '', $request->silver)]);
        setting::find(3)->update(['points' =>  str_replace(',', '', $request->gold)]);
        setting::find(4)->update(['points' => str_replace(',', '', $request->diamond)]);
        return redirect()->route('setting.index')->with('success','Cập nhật thành công');

    }
}
