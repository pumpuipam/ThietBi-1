<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    use HasFactory;
    protected $table = 'districts';

    protected $fillable = [
        'districtid', 'name', 'type', 'location', 
        'provinceid'];
}
