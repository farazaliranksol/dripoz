<?php

namespace App\Imports;

use App\Models\Lead;
use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    /**
    * @param array $record
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $record)
    {
        return new Lead([
            'phone_book_id' => $this->data['phone_book_id'],
            'campaign_id' => $this->data['campaign_id'],
            'camp_name' => $this->data['camp_name'],
            'first_name' => $record[0],
            'last_name' => $record[1],
            'phone_number' => $record[2],
            'email' => $record[3],
            'company' => $record[4],
            'street' => $record[5],
            'city' => $record[6],
            'state' => $record[7],
            'sub1' => $record[8],
            'sub2' => $record[9],
            'sub3' => $record[10],
            'zip_code' => $record[11]

        ]);
    }
}
