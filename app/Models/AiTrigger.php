<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiTrigger extends Model
{
    use HasFactory;
    protected $fillable=[
      'type','match_type','trigger','action','message','fire_webhook','webhook','fire_zapier','fire_email','recipient','subject','email_message'
    ];
}
