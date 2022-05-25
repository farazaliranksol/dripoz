<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'campaign_id' , 'type',
        'executed'
    ];
    public function inboundOpenHours()
    {
        return $this->hasMany(InboundOpenHour::class);
    }
    public function inboundOffHours()
    {
        return $this->hasMany(InboundOffHour::class);
    }
    public function scheduledCalls()
    {
        return $this->hasMany(ScheduledCalls::class);
    }
    public function outboundLives()
    {
        return $this->hasMany(OutboundLive::class);
    }
    public function dayEvents()
    {
        return $this->hasMany(DayEvent::class);
    }
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

}
