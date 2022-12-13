<?php

namespace App\Exports;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;


class DetailSaleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderItem::where('seller_id', Auth()->id())->whereMonth('created_at', );
    }
}
