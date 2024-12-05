<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provinces;
use App\Models\districts;
use App\Models\wards;
use App\Models\address;




class deliveryAddressController extends Controller
{
    //

    public function index(){
        $address = address::with('Provinceid_AD')->paginate(10);
        // dd($address);
        return view('admin.address.index',compact('address'));
    }

    public function create(){
        
        $provinces = provinces::get();
       
        return view('admin.address.create',compact('provinces'));
    }
 
    public function getProvinceid(Request $request){
       
        $districts = districts::where('provinceid',$request->provinceid)->get();
        return $districts;
    }

    public function store(Request $request){
        
        $request->validate([
            'provinceid' => 'required',
            'price' => 'required',
            'cityid'=> 'required',
            'wardid' => 'required',
        ], [
            'provinceid.required' => 'Tỉnh/Thành phố bắt buộc nhập!',
            'price.required' => 'Giá bắt buộc nhập!',
            'cityid.required' => 'Quận/huyện bắt buộc nhập!',
            'wardid.required' => 'Phường/Xã bắt buộc nhập!',



           
        ], []);

        $request->merge([
            'price' => str_replace(',', '', $request->price),
        ]);
            address::create([
                'provinceid' => $request->provinceid,

                'cityid'=>$request->cityid,

                'wardid'=>$request->wardid,
                'price'=>$request->price
            ]);
            return redirect()->route('address.index')->with('success','Thêm nhà thành công');
    }

    public function getCityid(Request $request){
     
        $wards = wards::where('districtid',$request->cityid)->get();
      
        return $wards;
    }

    public function edit($id) {
        $add = address::find($id);
        $add_city = $add->cityid;
        $add_ward = $add->wardid;

        $districts = districts::where('provinceid',$add->provinceid)->get();
        $ward = wards::where('districtid',$add->cityid)->get();

        $provinces = provinces::get();
       
        return view('admin.address.edit',compact('provinces','add','districts','ward'));
    }

    public function update(Request $request) {
        $request->merge([
            'price' => str_replace(',', '', $request->price),
        ]);
        $add = address::find($request->id);
        $add->update([
                'provinceid' => $request->provinceid,

                'cityid'=>$request->cityid,

                'wardid'=>$request->wardid,
                'price'=>$request->price
        ]);
        return redirect()->route('address.index')->with('success','Chỉnh sửa thành công');
        
    }

    public function checkprice(Request $request) {
       
        $address = address::where('cityid', $request->cityid)
        ->where('provinceid', $request->provinceid)
        ->where('wardid', $request->wardid)
        ->first();
        if($address) {
            return $address->price;
        } else {
            return 0;
        }
       
    }
}
