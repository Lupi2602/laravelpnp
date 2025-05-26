<?php

namespace App\Exports;

use App\Models\SalesReport;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalesReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SalesReport::all();
    }
}
