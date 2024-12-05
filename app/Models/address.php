<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table = 'address';

    protected $fillable = [
        'id', 'cityid', 'provinceid', 'wardid', 
        'created_at','updated_at','price'];

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
