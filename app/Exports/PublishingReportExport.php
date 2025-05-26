<?php

namespace App\Exports;

use App\Models\PublishingReport;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublishingReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PublishingReport::all();
    }
}
