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
use App\Models\CampaignHistory;
use App\Models\CampaignExecutionHistory;
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
        $campaign_id=$this->compaign_id;
        $getevent_to_be_executed = CampaignHistory::where('campaign_id',$campaign_id)->first();
        if($getevent_to_be_executed){

        $current_date=date("Y-m-d");
        $d1 = date_create($current_date);
        $created_date=date_create($getevent_to_be_executed->changed_date);
        if($getevent_to_be_executed){
        $diff=date_diff($created_date,$d1);
        $d=$diff->format("%R%a");
        }
        //this is the date of campaign on which it was started first time
        //this variable contain day difference between campaign started and current date
        $date_difference=(int)$d;

        $campaign_months=Campaign::where('id',$campaign_id)->first();
        $months=$campaign_months->max_scheduling_month;
        $total_days_for_campaign=(int)($months*30);
        if($total_days_for_campaign>$d){
            //this condition tests whether the campaign is executing in alloted months or not if not then don't allow campaign to execute
            $message =  $campaign_months->message; 
            $number_list=PhoneNumber::where('phone_number_list_id',$campaign_months->number_list)->first();
            $lead=Lead::where('campaign_id',$campaign_id)->get();
            if(count($lead)>0){
                $f_arr=[];
                foreach($lead as $k => $r){
                    $check=Campaign::where('id',$campaign_id)->first();
                        if($check->status==1){
                            // dd($date_difference);
                            $event_type="DaySmsEvent".$date_difference;
                            // dd($event_type);

                            $campaign_events=Event::where([['campaign_id',$campaign_id],['executed',0],['type',$event_type]])->get();
                            // dd($campaign_events);
                            //below is the line to get child table events
                           if($campaign_events){
                               //these are the events to be performed on present day of campaign execution
                            foreach($campaign_events as $c){
                                //foreach to iterate multiple events if one day have more than one event
                                $e_id=$c->id;

                                foreach($c->dayEvents as $d){
                                    
                                     $time_at_moment=strtotime("now");
                                 //this will get all the events at the given time
                                   //$send_msg=dayEvent::where([['event_id',$e_id],['meta_value',$time_at_moment]])->get();
                                    
                                   $send_msg=dayEvent::where([['event_id',$e_id]])->get()->chunk(4);
                                   $schedule_time=0;
                                   $message_body=1;
                                   $yes_action=2;
                                   $no_action=3;
                                   foreach($send_msg as $m){
                                       // $m[$schedule_time]['meta_value'] contain schedule time
                                       // $m[$message_body]['meta_value'] contain message body
                                       //$m[$yes_action]['meta_value'] contain yes action 
                                       //$m[$no_action]['meta_value'] contain no action
                                        if($time_at_moment>$m[$schedule_time]['meta_value']){
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
                                                CURLOPT_POSTFIELDS => array('Body' => $m[$message_body]['meta_value'],'From' => $number_list->phone_number,'To' => $r->phone_number),
                                                CURLOPT_HTTPHEADER => array(
                                                    'Authorization: Basic QUNiMTM2NzBlYjU4Y2QwY2U2MjY3YmY4ZTMxNzRkYzE2OTo5MzlhOWQxMDcxY2ZiM2RlYjhjYmIxYTZiZTA5M2UzMg=='
                                                ),
                                                ));  
                                            $response = curl_exec($curl);
                    
                                            curl_close($curl);
                                        Event::where(['id'=>$e_id],['executed'=>0])->update(['executed'=>1]);

                                        }
                                            $schedule_time+=4;
                                            $message_body+=4;
                                            $yes_action+=4;
                                            $no_action+=4;

                                   }
                                }
                            }
                           }
                            //end below
                          
                        }else{
                            //if compaign is paused then get out of loop
                            break;
                        }
                }//execute all leads one by one for each
            }//end if  checking leads against campaign
        }else{
            //this notify that campaign exceeded alloted months
           
        }
    }else{
        //if no event associated with campaign
    }
}
}