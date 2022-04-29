<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
      'phone_book_id','camp_name','campaign_id','first_name','last_name','email','company','street','city','state','phone_number','sub1','sub2','sub3','zip_code'
    ];

}
