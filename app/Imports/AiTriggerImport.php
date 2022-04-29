<?php

namespace App\Imports;

use App\Models\AiTrigger;
use Maatwebsite\Excel\Concerns\ToModel;

class AiTriggerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AiTrigger([
            'type'              => $row[0],
            'action'            => $row[1],
            'match_type'        => $row[2],
            'trigger'           => $row[3],
            'message'           => $row[4],
        ]);
    }
}
