<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCard extends Model
{
    use HasFactory;
    protected $table = 'inventory_card';

    protected $fillable = [
        'id', 'product_id','quantity',
        'created_at', 'updated_at','price','inventory_id'
    ];
}
