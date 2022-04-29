<?php

namespace App\Exports;

use App\Models\AiTrigger;
use Maatwebsite\Excel\Concerns\FromCollection;

class AiTriggerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AiTrigger::select('type','action','match_type','trigger','message')->get();
    }
}
