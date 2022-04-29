<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumberList extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id','name','is_del'
        ];
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

   
}
