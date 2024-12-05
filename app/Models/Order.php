<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Order extends Model
{ 
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id', 'email', 'phone', 'address', 
        'note', 'payment_type', 'status', 
        'created_at', 'updated_at',
        'firstName','lastname','user_id','total','code_discount'
        ,'cityid','provinceid','wardid'
    ];

    protected $appends = [
            'discount_product',
        ];
        
        
    public function getDiscountProductAttribute()
        {
          if($this->code_discount){
            $code_discount = Promotion::find($this->code_discount);
            return $code_discount;
          }else{
                return null;
          }
            // return $this->code_discount;
        }
    public function loadOne($id, $params = [])
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::push('errors', 'không xác định bản ghi cập nhập');
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') {
                continue;
            }
            $dataUpdate[$colName] = strlen($val) == 0 ? null : $val;
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function User_Order()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Provinceid_AD()
    {
        return $this->hasOne(provinces::class, 'provinceid', 'provinceid');
    }
    public function City_AD()
    {
        return $this->hasOne(districts::class, 'districtid', 'cityid');
    }
    public function Ward_AD()
    {
        return $this->hasOne(wards::class, 'wardid', 'wardid');
    }
}
