<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;
    protected $fillable = [
      'phone_number_list_id','phone_number','friendly_name','number_sid','state','active','flag','verify'
    ];
    public function phoneNumberList()
    {
      return $this->belongsTo(PhoneNumberList::class);
    }
}
