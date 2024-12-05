<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModal extends Model
{
    use HasFactory;

    protected $table = 'orders';

    
   

    protected $fillable = [
        'id',
        'email',
        'phone',
        'address',
        'note',
        'payment_type',
        'status',
        'created_at',
        'updated_at',
        
    ];
}
