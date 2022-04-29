<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
      'title','status','user_id','camp_id','total_contacts','valid','invalid','duplicates'
    ];
}
