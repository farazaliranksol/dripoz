<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'price',
        'total_number',
        'campaigns',
        'users',
        'product_id'
    ];
}
