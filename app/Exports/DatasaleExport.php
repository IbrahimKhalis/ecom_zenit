<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DatasaleExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return OrderItem::all();
    // }
    public function view(): View{
        return view('exports.datasale',[
            'income' => OrderItem::where('seller_id', auth()->id())->where('status', 'COMPLETE')->get()
        ]);
    }
}
