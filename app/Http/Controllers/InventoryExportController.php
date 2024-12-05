<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\InventoryCard;

class InventoryExportController extends Controller
{
    //
    public function index(){
        $Inventory = Inventory::orderBy('id', 'desc')->
        where('inventory_type',Inventory::EXPORT)->with('Supplier','User')->paginate(20);
        return view('admin.inventory_export.index',compact('Inventory'));
    }

    public function create(){
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        $products =  Product::with('category_product')->orderBy('id', 'desc')->get();
        return view('admin.inventory_export.create',compact('suppliers','products'));
    }

    public function store(Request $request)  {

        $request->validate([
            'supplier' => 'required',
            'product_id'=>'required',
        ], [
            'supplier.required' => 'Nhà cung cấp không được bỏ trống!',
            'product_id.required' => 'Vui lòng thêm sản phẩm nhập',
           
        ], []);
        $quantity = 0;
        $total = 0;
        $inventory = Inventory::create([
            'supplier_id'=> $request->supplier,
            'status' => 1,
            'inventory_type' => Inventory::EXPORT,
            'user_id' => auth()->user()->id,
        ]);
        foreach($request->product_id as $key => $product){
            $quantity +=  str_replace(',', '',$request->quantity[$key]);
            $total +=  str_replace(',', '',$request->price[$key])* str_replace(',', '',$request->quantity[$key]);
            InventoryCard::create([
                'inventory_id'=> $inventory->id,
                'product_id' => $product,
                'quantity' => str_replace(',', '', $request->quantity[$key]) ,
                'price' =>str_replace(',', '', $request->price[$key]),
                'user_id' => auth()->user()->id,
            ]);
        }
        $inventory->update([
            'quantity' =>$quantity,
            'total' => $total,
        ]);
        return redirect()->route('inventory_export.index')->with('success', 'Thêm phiếu xuất kho hàng thành công!');
        
    }




    public function delete($id) {
      
            InventoryCard::where('inventory_id', $id)->delete();
            Inventory::find($id)->delete();
            return redirect()->back()->with('success', 'Xóa phiếu xuất kho hàng thành công!');
    }

    public function argee($id) {
        $inventory = Inventory::find($id);
        $inventory->status = 2;
        $inventory->save();
        

        $inventoryCard = InventoryCard::where('inventory_id', $inventory->id)->get();
   
        foreach($inventoryCard as $card){
            $product = Product::find($card->product_id);
            $product->quantity = $product->quantity - $card->quantity;
            $product->save();
        }
        return redirect()->route('inventory_export.index')->with('success', 'Phê duyệt xuất kho thành công!');
    }

    public function edit($id) {
        $inventory = Inventory::where('id',$id)->with('InventoryCard','User')->first();

        $suppliers = Supplier::orderBy('id', 'desc')->get();
        $products =  Product::with('category_product')->orderBy('id', 'desc')->get();
        return view('admin.inventory_export.edit',compact('inventory','suppliers','products'));


    }

    public function update(Request $request) {
        $request->validate([
            'supplier' => 'required',
            'product_id'=>'required',
        ], [
            'supplier.required' => 'Nhà cung cấp không được bỏ trống!',
            'product_id.required' => 'Vui lòng thêm sản phẩm nhập',
           
        ], []);
        $quantity = 0;
        $total = 0;
        $Inventory = Inventory::find($request->id)->update([
            'supplier_id'=> $request->supplier,
            'status' => 1,
            'inventory_type' => Inventory::EXPORT,
            'user_id' => $request->user_add,
        ]);
        InventoryCard::where('inventory_id', $request->id)->delete();
        foreach($request->product_id as $key => $product){
            $quantity +=  str_replace(',', '',$request->quantity[$key]);
            $total +=  str_replace(',', '',$request->price[$key])* str_replace(',', '',$request->quantity[$key]);
            InventoryCard::create([
                'inventory_id'=> $request->id,
                'product_id' => $product,
                'quantity' => str_replace(',', '', $request->quantity[$key]) ,
                'price' =>str_replace(',', '', $request->price[$key]),
                'user_id' => auth()->user()->id,
            ]);
        }
     
        $Inventory = Inventory::find($request->id)->update([
            'quantity' =>$quantity,
            'total' => $total,
        ]);
    

        return redirect()->route('inventory_export.index')->with('success', 'Cập nhật phiếu xuất thành công!');

    }
}
