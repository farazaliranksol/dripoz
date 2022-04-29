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
        if($lead>0){
        foreach($lead as $k => $r){
            $check=Campaign::where('id',$this->compaign_id)->first();
            if($check->name!=2){
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
                'Authorization: Basic QUNiMTM2NzBlYjU4Y2QwY2U2MjY3YmY4ZTMxNzRkYzE2OToxMWE3ZWQ5MTIwNWNiNTk5MDgxZDM3NTk2NjU3MmY2NQ=='
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
