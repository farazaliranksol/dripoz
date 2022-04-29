<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::Select('first_name','last_name','phone_number','email','company','street','city','state','sub1','sub2','sub3','zip_code')->get();
    }
}
