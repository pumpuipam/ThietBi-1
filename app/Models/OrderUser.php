<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;
    protected $table = 'orders_user';

    protected $fillable = ['id', 'product_id', 'user_id', 'quantity', 'price', 
    'total_payment', 'discount', 'created_at', 'updated_at','type_id'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
