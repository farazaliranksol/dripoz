<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUserPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'inbox',
        'phone_number',
        'export_leads',
        'ai_rules',
        'billing',
        'tools',
        'logs',
        'console',
        'view_leads',
        'sound_library',
        'view_reports',
        'make_payments',
        'alerts',
        'api'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
