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
            // restart campaign
            $dis = new StartCompaign($request->id);
            $this->dispatch($dis);
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
                $dis = new StartCompaign($request->id);
                $this->dispatch($dis);
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
