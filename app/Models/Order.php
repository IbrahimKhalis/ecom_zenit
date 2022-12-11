<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class, 'orders_id');
    }

    public function shipping(){
        return $this->hasOne(Shipping::class, 'orders_id');
    }

    public function dataResi(){
        return $this->hasMany(DataResi::class, 'orders_id');
    }

}
