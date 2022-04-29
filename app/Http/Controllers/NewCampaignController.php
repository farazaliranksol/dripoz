<?php

namespace App\Http\Controllers;

use App\Models\AI;
use App\Models\Campaign;
use App\Models\CampaignHour;
use App\Models\PhoneNumberList;
use App\Models\Schedule;
use App\Models\Sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use Illuminate\Support\Facades\Session;

class NewCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = PhoneNumberList::all();
        $data['ais'] = AI::all();
        return view('admin.console.newCampaign', $data);
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
        //0 for created campaign
        //1 for running campaign
        //2 for paused campaign
        //3 for deleted campaign
        $this->validate($request, [
            'keyword' => 'unique:campaigns',
        ]);

        $data = new Campaign();
        $hours = new CampaignHour();
        $data->name = $request->name;
        $data->user_id = auth()->user()->id;
        $data->long_transfer = $request->longTransfer;
        $data->close_lead = $request->closeLeads;
        $data->close_duration = $request->closeDuration;
        $data->revenue = $request->revenue;
        $data->long_transfer_check = $request->setTransfer;
        $data->close_leads_check = $request->closeLeadCheck;
        $data->report_rule = $request->reportRules;
        $data->ai_rules = $request->AIRules;
        $data->voice_scheduling_check = $request->voiceSchedule;
        $data->number_list = $request->numberList;
        $data->local_match_Check = $request->localMatch;
        $data->leads_per_day = $request->leadsPerDay;
        $data->delivery_type = $request->deliveryType;
        $data->cps = $request->callPerSec;
        $data->keyword = $request->keyword;
        $data->message = $request->message;
        $data->name = $request->name;
        $data->sms_per_min = $request->smsPerMin;
        $data->concurrent_transfer = $request->concTransfer;
        $data->max_CSP = $request->maxCSP;
        $data->record_call_check = $request->callRecordCheck;
        $data->fallback_transfer_check = $request->fallbackCheck;
        $data->status=0;
        if ($request->fallbackCheck == 1) {
            $data->fallback_timeout = $request->fallbackTimeOut;
            $data->fallback_number = $request->fallbackNumber;
        }
        $data->scheduling_check = $request->schedulingCheck;
        $data->rescheduling_check = $request->reschedulingCheck;
        $data->max_scheduling_month = $request->maxScheduleMonth;
        $data->in_outbound_check = $request->inOutBoundCheck;
        $data->save();

        if ($request->monday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'monday';
            $hours->open_hour = $request->mondayOpen;
            $hours->close_hour = $request->mondayClose;
            $hours->save();
        }
        if ($request->tuesday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'tuesday';
            $hours->open_hour = $request->tuesdayOpen;
            $hours->close_hour = $request->tuesdayClose;
            $hours->save();
        }

        if ($request->wednesday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'wednesday';
            $hours->open_hour = $request->wednesdayOpen;
            $hours->close_hour = $request->wednesdayClose;
            $hours->save();
        }
        if ($request->thursday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'thrusday';
            $hours->open_hour = $request->thursdayOpen;
            $hours->close_hour = $request->thursdayClose;
            $hours->save();
        }
        if ($request->friday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'friday';
            $hours->open_hour = $request->fridayOpen;
            $hours->close_hour = $request->fridayClose;
            $hours->save();
        }
        if ($request->saturday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'saturday';
            $hours->open_hour = $request->saturdayOpen;
            $hours->close_hour = $request->saturdayClose;
            $hours->save();
        }
        if ($request->sunday == 1) {
            $hours = new CampaignHour();
            $hours->campaign_id = $data->id;
            $hours->type = 'campaign_hours';
            $hours->day = 'sunday';
            $hours->open_hour = $request->sundayOpen;
            $hours->close_hour = $request->sundayClose;
            $hours->save();
        }

        if (!isset($request->inOutBoundCheck)) {
            if ($request->outMonday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'monday';
                $hours->open_hour = $request->outMondayOpen;
                $hours->close_hour = $request->outMondayClose;
                $hours->save();
            }
            if ($request->outTuesday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'tuesday';
                $hours->open_hour = $request->outTuesdayOpen;
                $hours->close_hour = $request->outTuesdayClose;
                $hours->save();
            }
            if ($request->outWednesday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'wednesday';
                $hours->open_hour = $request->outWednesdayOpen;
                $hours->close_hour = $request->outWednesdayClose;
                $hours->save();
            }
            if ($request->outThursday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'thrusday';
                $hours->open_hour = $request->outThursdayOpen;
                $hours->close_hour = $request->outThursdayClose;
                $hours->save();
            }
            if ($request->outFriday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'friday';
                $hours->open_hour = $request->outFridayOpen;
                $hours->close_hour = $request->outFridayClose;
                $hours->save();
            }
            if ($request->outSaturday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'saturday';
                $hours->open_hour = $request->outSaturdayOpen;
                $hours->close_hour = $request->outSaturdayClose;
                $hours->save();
            }
            if ($request->outSunday == 1) {
                $hours = new CampaignHour();
                $hours->campaign_id = $data->id;
                $hours->type = 'out_hours';
                $hours->day = 'sunday';
                $hours->open_hour = $request->outSundayOpen;
                $hours->close_hour = $request->outSundayClose;
                $hours->save();
            }
        }
        return ($data);
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
        $data['list'] = PhoneNumberList::all();
        $data['ais'] = AI::all();
        $data['campaign'] = Campaign::with('campaignHours')->find($id);
        foreach ($data['campaign']->campaignHours as $campaignHour) {
            if ($campaignHour->type == 'campaign_hours') {
                switch ($campaignHour->day) {
                    case 'monday':
                        $data['mon'] = $campaignHour->day;
                        $data['monOpenHour'] = $campaignHour->open_hour;
                        $data['monCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'tuesday':
                        $data['tue'] = $campaignHour->day;
                        $data['tueOpenHour'] = $campaignHour->open_hour;
                        $data['tueCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'wednesday':
                        $data['wed'] = $campaignHour->day;
                        $data['wedOpenHour'] = $campaignHour->open_hour;
                        $data['wedCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'thrusday':
                        $data['thru'] = $campaignHour->day;
                        $data['thruOpenHour'] = $campaignHour->open_hour;
                        $data['thruCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'friday':
                        $data['fri'] = $campaignHour->day;
                        $data['friOpenHour'] = $campaignHour->open_hour;
                        $data['friCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'saturday':
                        $data['sat'] = $campaignHour->day;
                        $data['satOpenHour'] = $campaignHour->open_hour;
                        $data['satCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'sunday':
                        $data['sun'] = $campaignHour->day;
                        $data['sunOpenHour'] = $campaignHour->open_hour;
                        $data['sunCloseHour'] = $campaignHour->close_hour;
                        break;
                }
            } else {
                switch ($campaignHour->day) {
                    case 'monday':
                        $data['monOutbound'] = $campaignHour->day;
                        $data['monOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['monOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'tuesday':
                        $data['tueOutbound'] = $campaignHour->day;
                        $data['tueOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['tueOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'wednesday':
                        $data['wedOutbound'] = $campaignHour->day;
                        $data['wedOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['wedOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'thrusday':
                        $data['thruOutbound'] = $campaignHour->day;
                        $data['thruOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['thruOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'friday':
                        $data['friOutbound'] = $campaignHour->day;
                        $data['friOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['friOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'saturday':
                        $data['satOutbound'] = $campaignHour->day;
                        $data['satOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['satOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                    case 'sunday':
                        $data['sunOutbound'] = $campaignHour->day;
                        $data['sunOutboundOpenHour'] = $campaignHour->open_hour;
                        $data['sunOutboundCloseHour'] = $campaignHour->close_hour;
                        break;
                }
            }
        }
        // if variables not assigned value in a foreach then it goes empty to the next page. 
        if (!isset($data['mon'])) {
            $data['mon'] = '';
            $data['monOpenHour'] = '';
            $data['monCloseHour'] = '';
        }
        if (!isset($data['tue'])) {
            $data['tue'] = '';
            $data['tueOpenHour'] = '';
            $data['tueCloseHour'] = '';
        }
        if (!isset($data['wed'])) {
            $data['wed'] = '';
            $data['wedOpenHour'] = '';
            $data['wedCloseHour'] = '';
        }
        if (!isset($data['thru'])) {
            $data['thru'] = '';
            $data['thruOpenHour'] = '';
            $data['thruCloseHour'] = '';
        }
        if (!isset($data['fri'])) {
            $data['fri'] = '';
            $data['friOpenHour'] = '';
            $data['friCloseHour'] = '';
        }
        if (!isset($data['sat'])) {
            $data['sat'] = '';
            $data['satOpenHour'] = '';
            $data['satCloseHour'] = '';
        }
        if (!isset($data['sun'])) {
            $data['sun'] = '';
            $data['sunOpenHour'] = '';
            $data['sunCloseHour'] = '';
        }
        if (!isset($data['monOutbound'])) {
            $data['monOutbound'] = '';
            $data['monOutboundOpenHour'] = '';
            $data['monOutboundCloseHour'] = '';
        }
        if (!isset($data['tueOutbound'])) {
            $data['tueOutbound'] = '';
            $data['tueOutboundOpenHour'] = '';
            $data['tueOutboundCloseHour'] = '';
        }
        if (!isset($data['wedOutbound'])) {
            $data['wedOutbound'] = '';
            $data['wedOutboundOpenHour'] = '';
            $data['wedOutboundCloseHour'] = '';
        }
        if (!isset($data['thruOutbound'])) {
            $data['thruOutbound'] = '';
            $data['thruOutboundOpenHour'] = '';
            $data['thruOutboundCloseHour'] = '';
        }
        if (!isset($data['friOutbound'])) {
            $data['friOutbound'] = '';
            $data['friOutboundOpenHour'] = '';
            $data['friOutboundCloseHour'] = '';
        }
        if (!isset($data['satOutbound'])) {
            $data['satOutbound'] = '';
            $data['satOutboundOpenHour'] = '';
            $data['satOutboundCloseHour'] = '';
        }
        if (!isset($data['sunOutbound'])) {
            $data['sunOutbound'] = '';
            $data['sunOutboundOpenHour'] = '';
            $data['sunOutboundCloseHour'] = '';
        }
        return view('admin.console.editNewCampaign', $data);
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
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $data = Campaign::find($id);
        $maxMonths = $data->max_scheduling_month;
        $sounds = Sound::all();
        $data->name = $request->name;
        $data->user_id = auth()->user()->id;
        $data->long_transfer = $request->longTransfer;
        $data->close_lead = $request->closeLeads;
        $data->close_duration = $request->closeDuration;
        $data->revenue = $request->revenue;
        $data->long_transfer_check = $request->setTransfer;
        $data->close_leads_check = $request->closeLeadCheck;
        $data->report_rule = $request->reportRules;
        $data->ai_rules = $request->AIRules;
        $data->voice_scheduling_check = $request->voiceSchedule;
        $data->number_list = $request->numberList;
        $data->local_match_Check = $request->localMatch;
        $data->leads_per_day = $request->leadsPerDay;
        $data->delivery_type = $request->deliveryType;
        $data->cps = $request->callPerSec;
        $data->sms_per_min = $request->smsPerMin;
        $data->concurrent_transfer = $request->concTransfer;
        $data->max_CSP = $request->maxCSP;
        $data->record_call_check = $request->callRecordCheck;
        $data->fallback_transfer_check = $request->fallbackCheck;
        if ($request->fallbackCheck == 1) {
            $data->fallback_timeout = $request->fallbackTimeOut;
            $data->fallback_number = $request->fallbackNumber;
        }
        $data->scheduling_check = $request->schedulingCheck;
        $data->rescheduling_check = $request->reschedulingCheck;
        $data->max_scheduling_month = $request->maxScheduleMonth;
        $data->in_outbound_check = $request->inOutBoundCheck;
        $data->save();

        if ($request->monday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'monday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'monday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->mondayOpen,
                    'close_hour' => $request->mondayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'monday',
                    'open_hour' => $request->mondayOpen,
                    'close_hour' => $request->mondayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'monday', 'campaign_hours');
        }
        if ($request->tuesday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'tuesday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'tuesday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->tuesdayOpen,
                    'close_hour' => $request->tuesdayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'tuesday',
                    'open_hour' => $request->tuesdayOpen,
                    'close_hour' => $request->tuesdayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'tuesday', 'campaign_hours');
        }

        if ($request->wednesday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'wednesday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'wednesday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->wednesdayOpen,
                    'close_hour' => $request->wednesdayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'wednesday',
                    'open_hour' => $request->wednesdayOpen,
                    'close_hour' => $request->wednesdayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'wednesday', 'campaign_hours');
        }
        if ($request->thursday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'thrusday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'thrusday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->thursdayOpen,
                    'close_hour' => $request->thursdayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'thrusday',
                    'open_hour' => $request->thursdayOpen,
                    'close_hour' => $request->thursdayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'thrusday', 'campaign_hours');
        }
        if ($request->friday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'friday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'friday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->fridayOpen,
                    'close_hour' => $request->fridayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'friday',
                    'open_hour' => $request->fridayOpen,
                    'close_hour' => $request->fridayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'friday', 'campaign_hours');
        }
        if ($request->saturday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'saturday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'saturday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->saturdayOpen,
                    'close_hour' => $request->saturdayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'saturday',
                    'open_hour' => $request->saturdayOpen,
                    'close_hour' => $request->saturdayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'saturday', 'campaign_hours');
        }
        if ($request->sunday == 1) {
            $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'sunday', 'type' => 'campaign_hours'])->first();
            if ($check) {
                $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'sunday', 'type' => 'campaign_hours'])->update([
                    'open_hour' => $request->sundayOpen,
                    'close_hour' => $request->sundayClose,
                ]);
            } else {
                $createCampaignHour = CampaignHour::create([
                    'campaign_id' => $id,
                    'type' => 'campaign_hours',
                    'day' => 'sunday',
                    'open_hour' => $request->sundayOpen,
                    'close_hour' => $request->sundayClose,
                ]);
            }
        } else {
            // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
            // function write in helpers.php
            delCampaignHour($id, 'sunday', 'campaign_hours');
        }

        if (!isset($request->inOutBoundCheck)) {
            if ($request->outMonday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'monday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'monday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outMondayOpen,
                        'close_hour' => $request->outMondayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'monday',
                        'open_hour' => $request->outMondayOpen,
                        'close_hour' => $request->outMondayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'monday', 'out_hours');
            }
            if ($request->outTuesday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'tuesday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'tuesday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outTuesdayOpen,
                        'close_hour' => $request->outTuesdayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'tuesday',
                        'open_hour' => $request->outTuesdayOpen,
                        'close_hour' => $request->outTuesdayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'tuesday', 'out_hours');
            }
            if ($request->outWednesday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'wednesday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'wednesday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outWednesdayOpen,
                        'close_hour' => $request->outWednesdayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'wednesday',
                        'open_hour' => $request->outWednesdayOpen,
                        'close_hour' => $request->outWednesdayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'wednesday', 'out_hours');
            }
            if ($request->outThursday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'thrusday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'thrusday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outThursdayOpen,
                        'close_hour' => $request->outThursdayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'thrusday',
                        'open_hour' => $request->outThursdayOpen,
                        'close_hour' => $request->outThursdayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'thrusday', 'out_hours');
            }
            if ($request->outFriday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'friday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'friday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outFridayOpen,
                        'close_hour' => $request->outFridayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'friday',
                        'open_hour' => $request->outFridayOpen,
                        'close_hour' => $request->outFridayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'friday', 'out_hours');
            }
            if ($request->outSaturday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'saturday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'saturday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outSaturdayOpen,
                        'close_hour' => $request->outSaturdayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'saturday',
                        'open_hour' => $request->outSaturdayOpen,
                        'close_hour' => $request->outSaturdayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'saturday', 'out_hours');
            }
            if ($request->outSunday == 1) {
                $check = CampaignHour::where(['campaign_id' => $id, 'day' => 'sunday', 'type' => 'out_hours'])->first();
                if ($check) {
                    $updateCampaignHour = CampaignHour::where(['campaign_id' => $id, 'day' => 'sunday', 'type' => 'out_hours'])->update([
                        'open_hour' => $request->outSundayOpen,
                        'close_hour' => $request->outSundayClose,
                    ]);
                } else {
                    $createCampaignHour = CampaignHour::create([
                        'campaign_id' => $id,
                        'type' => 'out_hours',
                        'day' => 'sunday',
                        'open_hour' => $request->outSundayOpen,
                        'close_hour' => $request->outSundayClose,
                    ]);
                }
            } else {
                // if campaign hour is available in db but updation time user does not select this. So, Delete it.  
                // function write in helpers.php
                delCampaignHour($id, 'sunday', 'out_hours');
            }
        }

        if ($data) {
            return redirect()->route('scheduling.edit',$id);
        } else {
            Session::put('error', 'Something went wrong');
            return back();
        }
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
}