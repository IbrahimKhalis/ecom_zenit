<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'shop_schedules';

    protected $fillable = [
        'buka_minggu',
        'tutup_minggu',
        'buka_senin',
        'tutup_senin',
        'buka_selasa',
        'tutup_selasa',
        'buka_rabu',
        'tutup_rabu',
        'buka_kamis',
        'tutup_kamis',
        'buka_jumat',
        'tutup_jumat',
        'buka_sabtu',
        'tutup_sabtu'
    ];

    public function shop(){
        return $this->belongsTo(ShopProfile::class, 'shops_id');
    }
}
