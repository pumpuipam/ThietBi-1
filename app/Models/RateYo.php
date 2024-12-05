<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateYo extends Model
{
    use HasFactory;
    const notApprovedYet = 1;
    const Approved = 2;
    const Refuse = 3;

    protected $table = 'rate_yo';

    protected $fillable = [
        'id', 'product_id',
        'status','comment', 
        'created_at','updated_at',
        'rate','user_id'
    ];

    public function Product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function User()
    {
            return $this->hasOne(User::class, 'id', 'user_id');
    }
}
