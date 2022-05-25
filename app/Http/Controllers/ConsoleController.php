<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use App\Models\CampaignHistory;
use App\Models\CampaignExecutionHistory;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use App\Jobs\StartCompaign;
use App\Models\DayEvent;
use App\Models\Event;
use App\Models\PhoneNumber;
class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign_id=22;
        $getevent_to_be_executed=CampaignHistory::where('campaign_id',$campaign_id)->first();
        $current_date=date("Y-m-d");
        $d1 = date_create($current_date);
        $created_date=date_create($getevent_to_be_executed->changed_date);
        if($getevent_to_be_executed){
        $diff=date_diff($created_date,$d1);
        $d=$diff->format("%R%a");
        }
        //this is the date of campaign on which it was satrted first time
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
                foreach($lead as $k => $r){
                    $check=Campaign::where('id',$campaign_id)->first();
                        if($check->status==1){
                            // dd($date_difference);
                            $event_type="DaySmsEvent".$date_difference;
                            // dd($event_type);

                            $campaign_events=Event::where([['campaign_id',$campaign_id],['executed',0],['type',$event_type]])->get();
                            
                           //below is the line to get child table events
                           if($campaign_events){
                               //these are the events to be performed on present day of campaign execution
                            foreach($campaign_events as $c){
                                //foreach to iterate multiple events if one day have more than one event
                                foreach($c->dayEvents as $d){
                                   
                                    dd(strtotime("now"));
                                    dd($d->meta_key,$d->meta_value);
                                }
                            }
                            dd($campaign_events);
                           }
                            //end below
                            //     $curl = curl_init();
                            //     curl_setopt_array($curl, array(
                            //     CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/ACb13670eb58cd0ce6267bf8e3174dc169/Messages.json',
                            //     CURLOPT_RETURNTRANSFER => true,
                            //     CURLOPT_ENCODING => '',
                            //     CURLOPT_MAXREDIRS => 10,
                            //     CURLOPT_TIMEOUT => 0,
                            //     CURLOPT_FOLLOWLOCATION => true,
                            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //     CURLOPT_CUSTOMREQUEST => 'POST',
                            //     CURLOPT_POSTFIELDS => array('Body' => $message,'From' => $number_list->phone_number,'To' => $r->phone_number),
                            //     CURLOPT_HTTPHEADER => array(
                            //         'Authorization: Basic QUNiMTM2NzBlYjU4Y2QwY2U2MjY3YmY4ZTMxNzRkYzE2OToxMWE3ZWQ5MTIwNWNiNTk5MDgxZDM3NTk2NjU3MmY2NQ=='
                            //     ),
                            //     ));  
                            // $response = curl_exec($curl);
    
                            // curl_close($curl);
                        }else{
                            //if compaign is paused then get out of loop
                            break;
                        }
                }//execute all leads one by one for each
            }//end if  checking leads against campaign
        }else{
            //this notify that campaign exceeded alloted months
           
        }
        return view('admin.console.console');
    }

    public function consoleTable(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->user_id){
                $camp = Campaign::where([['user_id',auth()->user()->user_id],['status','<>',3]])->get();
                $camp1=Campaign::where([['user_id',auth()->user()->user_id],['status',3]])->get();
            }else{
                $camp = Campaign::where([['user_id',auth()->user()->id],['status','<>',3]])->get();
                $camp1 = Campaign::where([['user_id',auth()->user()->id],['status',3]])->get();
            }
            $lead=array();
            foreach ($camp as $c){
                $lead += [$c->number_list=>Lead::where('camp_name',$c->number_list)->count()];
            }
            return Datatables::of($camp)
            ->addColumn('lead', function($row) use ($lead) { 
                $value1 ="";
                foreach($lead as $key=>$value){
                    if($key == $row->number_list){
                        $value1 = $value;
                    }
                };
                return $value1;
            })
            ->addColumn('id', function($row){ 
                $sample = base64_encode($row->id);
                return $sample;
            })
            ->addColumn('progress', function($row){ 
                $sample ="
                <div class=\"progress progress-xs m-t-sm\" style=\"cursor: pointer;\"onclick=\"\">
                <div class=\"progress-bar progress-bar-info\" data-toggle=\"tooltip\" data-original-title=\"0%\" style=\"width: 0%\"></div>
                </div>";
                return $sample;
            })
            ->addColumn('numbers', function($row){ 
                $sample1 ='
                <i class="fa fa-battery-full" style="color: green;">&nbsp;&nbsp;
                    <i class="fa fa-circle" style="color: red; size: 2px;" aria-hidden="true"
                        data-container="body" data-toggle="tooltip" data-placement="top"
                        data-html="true" title=""
                        data-original-title="Delivery has been paused for the following carriers:<br><br>Sprint Spectrum, L.P.<br>">
                    </i>
                </i>';
                return $sample1;
            })
            ->addColumn('delivery', function($row){ 
                $sample2 ='<b> -- </b>';
                return $sample2;
            })
            ->addColumn('OnTransfer', function($row){ 
                $sample3 ='<b>0</b>';
                return $sample3;
            })
            ->addColumn('status', function($row){ 
                if($row->status == 1){
                    $status='Running';
                }else if($row->status == 0){
                    $status='Created';
                }else if( $row->status == 2){
                    $status='Paused';
                }else{
                    $status='deleted';
                }
                return $status;
            })
            ->addColumn('Options', function($row){ 
                if($row->status == 1){
                    $status='Pause';
                }else{
                    $camp = Lead::where('campaign_id',$row->id)->first();
                    if($camp){
                    $status='Start';}else{
                        $status='';
                    }
                } 
                if($status!=''){
                $sample4 ='<button class="btn btn-link" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="javascript:void(0)"
                        onclick="pause('.$row->id.')" id="btn'.$row->id.'">'.$status.'</a>
                    <a class="dropdown-item"
                        href="'.route("newCampaign.edit",$row->id).'">Edit Settings</a>
                    <a class="dropdown-item"
                        href="'.route("scheduling.edit",$row->id).'">Edit Schedule</a>
                    <a class="dropdown-item" href="javascript:void(0)">Copy</a>
                    <a class="dropdown-item" href="javascript:void(0)"
                        onclick="delete_compaign('.$row->id.')">Delete</a>
                </div>';}else{
                    $sample4 ='<button class="btn btn-link" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="javascript:void(0)"
                         id="btn'.$row->id.'">Upload leads first</a>
                    <a class="dropdown-item"
                        href="'.route("newCampaign.edit",$row->id).'">Edit Settings</a>
                    <a class="dropdown-item"
                        href="'.route("scheduling.edit",$row->id).'">Edit Schedule</a>
                    <a class="dropdown-item" href="javascript:void(0)">Copy</a>
                    <a class="dropdown-item" href="javascript:void(0)"
                        onclick="delete_compaign('.$row->id.')">Delete</a>
                </div>';
                }

                return $sample4;
            })
            ->rawColumns(['lead','progress','numbers','delivery','OnTransfer','Options'])  
            ->make(true);   
        }
    }
    public function TableConsole(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->user_id){
                $camp = Campaign::where([['user_id',auth()->user()->user_id],['status','<>',3]])->get();
                $camp1=Campaign::where([['user_id',auth()->user()->user_id],['status',3]])->get();
            }else{
                $camp = Campaign::where([['user_id',auth()->user()->id],['status','<>',3]])->get();
                $camp1 = Campaign::where([['user_id',auth()->user()->id],['status',3]])->get();
            }
            $lead1=array();
            foreach ($camp1 as $c){
                $lead1 += [$c->number_list=>Lead::where('camp_name',$c->number_list)->count()];
            }
            return Datatables::of($camp1)
            ->addColumn('lead', function($row) use ($lead1) { 
                $value1 ="";
                foreach($lead1 as $key=>$value){
                    if($key == $row->number_list){
                        $value1 = $value;
                    }
                };
                return $value1;
            })
            ->addColumn('progress', function($row){ 
                $sample ="
                <div class=\"progress progress-xs m-t-sm\" style=\"cursor: pointer;\"onclick=\"\">
                <div class=\"progress-bar progress-bar-info\" data-toggle=\"tooltip\" data-original-title=\"0%\" style=\"width: 0%\"></div>
                </div>";
                return $sample;
            })
            ->addColumn('numbers', function($row){ 
                $sample1 ='
                <i class="fa fa-battery-full" style="color: green;">&nbsp;&nbsp;
                    <i class="fa fa-circle" style="color: red; size: 2px;" aria-hidden="true"
                        data-container="body" data-toggle="tooltip" data-placement="top"
                        data-html="true" title=""
                        data-original-title="Delivery has been paused for the following carriers:<br><br>Sprint Spectrum, L.P.<br>">
                    </i>
                </i>';
                return $sample1;
            })
            ->addColumn('id', function($row){ 
                $sample = base64_encode($row->id);
                return $sample;
            })
            ->addColumn('status', function($row){ 
                if($row->status == 1){
                    $status='Running';
                }else if($row->status == 0){
                    $status='Created';
                }else if( $row->status == 2){
                    $status='Paused';
                }else{
                    $status='deleted';
                }
                return $status;
            })
            ->addColumn('delivery', function($row){ 
                $sample2 ='<b> -- </b>';
                return $sample2;
            })
            ->addColumn('OnTransfer', function($row){ 
                $sample3 ='<b>0</b>';
                return $sample3;
            })
            ->addColumn('Options', function($row){ 
                $sample4 ='<button class="btn btn-link" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="javascript:void(0)"
                    onclick="restore('.$row->id.')" id="btn'.$row->id.'">Restore</a>
                    <a class="dropdown-item"
                        href="'.route("newCampaign.edit",$row->id).'">Edit Settings</a>
                    <a class="dropdown-item"
                        href="'.route("scheduling.edit",$row->id).'">Edit Schedule</a>
                    <a class="dropdown-item" href="javascript:void(0)">Copy</a>
                </div>';
                return $sample4;
            })
            ->rawColumns(['lead','progress','numbers','delivery','OnTransfer','Options'])  
            ->make(true);   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // update all campaigns
    public function updateAllCampaignsStatus(Request $request){
        $status = $request->status;
        if($status == 'pause'){
            $update = DB::table('campaigns')->update(array('status' => 2));
        }else{
            $update = DB::table('campaigns')->update(array('status' => 1));
        }
        return $status;
    }
    public function restoreSingleRecord(Request $request){
        $update = Campaign::where('id',$request->id)->update([
            'status' => 0,
        ]);
        if($update){
            return response()->json(['success' => 'Restored Successfully']);
        }else{
            return response()->json(['error' => 'Something went wrong!']);
        }
    }
    public function pauseSingleRecord(Request $request){
        // $update = Campaign::where('id',$request->id)->update([
        //     'status' => 'Pause',
        // ]);
        $today = date("Y-m-d");
         $old=Campaign::where('id',$request->id)->first();
        if($old['status']==2){
            $s='Started';
            // $dis = new StartCompaign($request->id);
            // $this->dispatch($dis);
            $update = Campaign::where('id',$request->id)->update([
                'status' => 1,
                'date_started' => $today
            ]);
            $history=new CampaignHistory;
            $history->campaign_id=$request->id;
            $history->campaign_status=1;
            $history->save();
        }else if($old['status']==1){
            $s='Paused';
        $update = Campaign::where('id',$request->id)->update([
            'status' => 2,
        ]);
        $history=new CampaignHistory;
            $history->campaign_id=$request->id;
            $history->campaign_status=2;
            $history->save();
             }else{
                $s='Started';
                // $dis = new StartCompaign($request->id);
                // $this->dispatch($dis);
                $update = Campaign::where('id',$request->id)->update([
                    'status' => 1,
                ]);
                $history=new CampaignHistory;
            $history->campaign_id=$request->id;
            $history->campaign_status=1;
            $history->save();
             }
        if($update){
            return response()->json(['success' => $s]);
        }else{
            return response()->json(['error' => 'Something went wrong!']);
        }
    }
        public function deleteCompaign(Request $request){
        $id=$request->id;
        $delete = Campaign::where('id',$id)->update(['status'=>3]);
        $history=new CampaignHistory;
            $history->campaign_id=$request->id;
            $history->campaign_status=3;
            $history->save();
        if($delete){
            return response()->json(['success' => 'Campaign Deleted!']);
        }else{
            return response()->json(['error' => 'Something went wrong!']);
        }
    }
}
