<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function saveNew($params)
    {
        $data = array_merge(
            $params['cols']
        );

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id)
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
            if ($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }

    public function category_product(){
        return $this->belongsTo(CategoryProduct::class, 'cate_id');
    }

    public function type_Product()
    {
        return $this->hasOne(TypeProduct::class, 'id', 'type_id');
    }

    public function getCategory_product(){
        return $this->hasOne(CategoryProduct::class, 'id', 'cate_id');

    }

    public function supplier(){
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');

    }

}
