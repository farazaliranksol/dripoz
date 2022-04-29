<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignHour extends Model
{
    use HasFactory;
    protected $fillable = [
      'campaign_id','type','day','open_hour','close_hour'
    ];
    public function campaign(){
      return $this->belongsTo(Campaign::class);
    }
}
