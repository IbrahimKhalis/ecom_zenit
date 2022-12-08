<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'shop_schedules';

    public function shop(){
        return $this->belongsTo(ShopProfile::class, 'shops_id');
    }
}
