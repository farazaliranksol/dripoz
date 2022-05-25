<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Campaign;
use App\Models\PhoneNumber;
use App\Models\Lead;
use App\Models\DayEvent;
use App\Models\Event;
use DB;

class StartCompaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $compaign_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($compaign_id)
    {
        $this->compaign_id=$compaign_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $compaign = Campaign::where('id',$this->compaign_id)->first();
        $message =  $compaign->message; 
        $number_list=PhoneNumber::where('phone_number_list_id',$compaign->number_list)->first();
        $lead=Lead::where('campaign_id',$this->compaign_id)->get();
        if(count($lead)>0){
            foreach($lead as $k => $r){
                $check=Campaign::where('id',$this->compaign_id)->first();
                    if($check->status==1){
                            $getevent_to_be_executed=CampaignHistory::where('campaign_id',$this->campaign_id)->first();
                            $current_date=date("Y-m-d H:i:s");
                            $date_of_start=$getevent_to_be_executed['created_at'];
                            $diff=date_diff($current_date,$date_of_start);
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/ACb13670eb58cd0ce6267bf8e3174dc169/Messages.json',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('Body' => $message,'From' => $number_list->phone_number,'To' => $r->phone_number),
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: Basic QUNiMTM2NzBlYjU4Y2QwY2U2MjY3YmY4ZTMxNzRkYzE2OTo5MzlhOWQxMDcxY2ZiM2RlYjhjYmIxYTZiZTA5M2UzMg=='
                        ),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);
                    }else{
                        //if compaign is paused then get out of loop
                        break;
                    }
            }
        }else{
            //if you want to do any thing if no lead number is associated with compaign you can do it here
        }
    }
}
