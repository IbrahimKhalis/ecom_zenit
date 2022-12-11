<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataResi extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery');
    }

    public function orders(){
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function orderItems(){
        return $this->belongsTo(OrderItem::class, 'order_items_id');
    }
}
