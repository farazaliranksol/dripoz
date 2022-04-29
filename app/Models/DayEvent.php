<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id','type', 'meta_key' , 'meta_value'
      ];
      public function campaign()
      {
          return $this->belongsTo(Campaign::class);
      }
      public function event()
      {
          return $this->belongsTo(Event::class);
      }
}
