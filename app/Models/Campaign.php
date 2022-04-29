<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable =[
      'name','user_id','keyword','message','long_transfer','close_lead','close_duration','revenue','long_transfer_check','close_leads_check','report_rule',
        'ai_rules','voice_scheduling_check','leads_per_day','number_list','local_match_Check','delivery_type','cps','sms_per_min',
        'concurrent_transfer','max_CSP','record_call_check','fallback_transfer_check','fallback_timeout','fallback_number','scheduling_check','rescheduling_check','max_scheduling_month','in_outbound_check','status','message','keyword'
    ];
    public function campaignHours()
    {
        return $this->hasMany(CampaignHour::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
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
}
