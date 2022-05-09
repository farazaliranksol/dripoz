<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'company_name','customer_id', 'address', 'address_line_1', 'city', 'zip_code', 'state', 'phone_number', 'no_of_users', 'website', 'twilio_id', 'status','subscribed_package','session_id'
    ];
   
}
