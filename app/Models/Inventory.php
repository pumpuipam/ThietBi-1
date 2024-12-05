<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    const IMPORT = 1;
    const EXPORT = 2;
    protected $table = 'inventory';

    protected $fillable = [
        'id', 'supplier_id','status',
        'user_id','quantity','created_at','updated_at','total',
        'total','total','inventory_type'
    ];
    public function Supplier(){
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function InventoryCard(){
        return $this->hasMany(InventoryCard::class, 'inventory_id');
    }
}
