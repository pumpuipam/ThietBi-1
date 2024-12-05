<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $table = 'setting';

    protected $fillable = [
        'id', 'name',
        'points',
        'created_at','updated_at',
    ];
}
