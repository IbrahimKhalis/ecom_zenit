<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ShopProfile extends Model implements HasMedia
{
    use HasFactory,Sluggable,InteractsWithMedia;

    protected $table = 'shop_profiles';


    protected $fillable = [
        'name',
        'major',
        'users_id',
        'desc',
        'instagram',
        'gmail',
        'linkedIn',
        'portofolio'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule(){
        return $this->hasOne(Schedule::class, 'shops_id');
    }
}
