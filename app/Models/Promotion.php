<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotion';

    protected $fillable = [
        'id', 'name', 'code','quantity','form',
    'total','start_time','end_time','condition','status'];
}
