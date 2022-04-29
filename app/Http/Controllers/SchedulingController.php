<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\DayEvent;
use App\Models\Event;
use App\Models\InboundOffHour;
use App\Models\InboundOpenHour;
use App\Models\OutboundLive;
use App\Models\Schedule;
use App\Models\ScheduledCalls;
use App\Models\Sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['allCampaigns'] = Campaign::all();
        $data['campaign'] = Campaign::find($id);
        $data['maxMonths'] = $data['campaign']->max_scheduling_month;
        $data['sounds'] = Sound::all();
        $data['id'] = $id;
        return view('admin.console.editScheduling', $data);
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
        $data['allCampaigns'] = Campaign::all();
        $data['campaign'] = Campaign::find($id);
        $data['maxMonths'] = $data['campaign']->max_scheduling_month;
        $data['sounds'] = Sound::all();
        $data['id'] = $id;
        return view('admin.console.editScheduling', $data);
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
    public function getOutboundLiveEvents(Request $request)
    {
        if ($request->eventType == 'OutboundLiveCall') {
            $functionName = 'outboundLiveCallEvent()';
        }
        if ($request->eventType == 'OutboundLiveSms') {
            $functionName = 'outboundLiveSmsEvent()';
        }
        if ($request->eventType == 'OutboundLiveEmail') {
            $functionName = 'outboundLiveEmailEvent()';
        }
        $getEvents = Event::with('outboundLives')->where(['campaign_id' => $request->id, 'type' => $request->eventType])->get();
        $html = '<div class="container"> <p class="float-right"><button class="btn btn-secondary btn-round" onclick="' . $functionName . '">Add New</button></p></div>';
        $html .= '<div class="eventBoxes">';
        $divName = "outboundLiveEditBoxDiv";
        foreach ($getEvents as $getEvent) {
            $html .= '
            <div class="mb-3 mx-auto">
            <div class="border p-2 thumbnail">
            <div class="d-flex justify-content-center align-items-center" > 
                <p class="eventBoxTitle">' . $getEvent->outboundLives[0]->type . ' </p>
            </div>
            <p class="text-center m-0"> <button type="button" class="btn btn-vimeo btn-icon-only" title="Edit" onclick="editOutboundLiveEvent(' . $getEvent->id . ',\'' . $getEvent->outboundLives[0]->type . '\')">
            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
          </button>
          <button type="button" class="btn btn-youtube btn-icon-only" title="Delete" onclick="delOutboundLiveEvent(' . $getEvent->id . ',\'' . $getEvent->outboundLives[0]->type . '\')">
            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
          </button>
          </p>
            </div>
          </div>
          ';
        }
        $html .= '</div>';
        return $html;
    }
    public function getDayEvents(Request $request)
    {
        if ($request->checkEvent == 'Call') {
            $functionName = 'dayCallEvent()';
        }
        if ($request->checkEvent == 'Sms') {
            $functionName = 'daySmsEvent()';
        }
        if ($request->checkEvent == 'Email') {
            $functionName = 'dayEmailEvent()';
        }
        $getEvents = Event::with('dayEvents')->where(['campaign_id' => $request->id, 'type' => $request->eventType])->get();
    
        $html = '<div class="container"> <p class="float-right"><button class="btn btn-secondary btn-round" onclick="' . $functionName . '">Add New</button></p></div>';
        $html .= '<div class="eventBoxes">';
        $divName = "outboundLiveEditBoxDiv";
        foreach ($getEvents as $getEvent) {
            $html .= '
            <div class="mb-3 mx-auto">
            <div class="border p-2 thumbnail">
            <div class="d-flex justify-content-center align-items-center" > 
                <p class="eventBoxTitle">' . $getEvent->dayEvents[0]->type . ' </p>
            </div>
            <p class="text-center m-0"> <button type="button" class="btn btn-vimeo btn-icon-only" title="Edit" onclick="editDayEvent(' . $getEvent->id . ',\'' . $getEvent->dayEvents[0]->type . '\')">
            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
          </button>
          <button type="button" class="btn btn-youtube btn-icon-only" title="Delete" onclick="delDayEvent(' . $getEvent->id . ',\'' . $getEvent->dayEvents[0]->type . '\')">
            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
          </button>
          </p>
            </div>
          </div>
          ';
        }
        $html .= '</div>';
        return $html;
    }
    public function getInboundOpenHoursRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'InboundOpenHourCallBasic'])->first();
        if ($event) {
            $event_id = $event->id;
            $inboundOpenHours = InboundOpenHour::where(['event_id' => $event_id, 'type' => 'InboundOpenHourCallBasic'])->get();
            $inboundOpenHourArr = [];
            foreach ($inboundOpenHours as $inboundOpenHour) {
                if ($inboundOpenHour->meta_key == 'live_audio_sound') {
                    $sound = Sound::find($inboundOpenHour->meta_value);
                    if ($sound) {
                        $inboundOpenHourArr['live_audio_sound_id'] = $inboundOpenHour->meta_value;
                        $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOpenHour->meta_key == 'transfer_sound_1') {
                    $sound = Sound::find($inboundOpenHour->meta_value);
                    if ($sound) {
                        $inboundOpenHourArr['transfer_sound_1_id'] = $inboundOpenHour->meta_value;
                        $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOpenHour->meta_key == 'transfer_sound_2') {
                    $sound = Sound::find($inboundOpenHour->meta_value);
                    if ($sound) {
                        $inboundOpenHourArr['transfer_sound_2_id'] = $inboundOpenHour->meta_value;
                        $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOpenHour->meta_key == 'call_back_audio_sound') {
                    $sound = Sound::find($inboundOpenHour->meta_value);
                    if ($sound) {
                        $inboundOpenHourArr['call_back_audio_sound_id'] = $inboundOpenHour->meta_value;
                        $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOpenHour->meta_key == 'voice_mail_audio_sound') {
                    $sound = Sound::find($inboundOpenHour->meta_value);
                    if ($sound) {
                        $inboundOpenHourArr['voice_mail_audio_sound_id'] = $inboundOpenHour->meta_value;
                        $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $sound->file;
                    }
                } else {
                    $inboundOpenHourArr[$inboundOpenHour['meta_key']] = $inboundOpenHour['meta_value'];
                }
            }
            return $inboundOpenHourArr;
        }
        return response()->json(['error' => 'Please add event first!']);
    }
    public function getInboundOffHoursRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'InboundOffHourCallBasic'])->first();
        if ($event) {
            $event_id = $event->id;
            $inboundOffHours = InboundOffHour::where(['event_id' => $event_id, 'type' => 'InboundOffHourCallBasic'])->get();
            $inboundOffHourArr = [];
            foreach ($inboundOffHours as $inboundOffHour) {
                if ($inboundOffHour->meta_key == 'live_audio_sound') {
                    $sound = Sound::find($inboundOffHour->meta_value);
                    if ($sound) {
                        $inboundOffHourArr['live_audio_sound_id'] = $inboundOffHour->meta_value;
                        $inboundOffHourArr[$inboundOffHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOffHour->meta_key == 'transfer_sound_1') {
                    $sound = Sound::find($inboundOffHour->meta_value);
                    if ($sound) {
                        $inboundOffHourArr['transfer_sound_1_id'] = $inboundOffHour->meta_value;
                        $inboundOffHourArr[$inboundOffHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOffHour->meta_key == 'transfer_sound_2') {
                    $sound = Sound::find($inboundOffHour->meta_value);
                    if ($sound) {
                        $inboundOffHourArr['transfer_sound_2_id'] = $inboundOffHour->meta_value;
                        $inboundOffHourArr[$inboundOffHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOffHour->meta_key == 'call_back_audio_sound') {
                    $sound = Sound::find($inboundOffHour->meta_value);
                    if ($sound) {
                        $inboundOffHourArr['call_back_audio_sound_id'] = $inboundOffHour->meta_value;
                        $inboundOffHourArr[$inboundOffHour['meta_key']] = $sound->file;
                    }
                } else if ($inboundOffHour->meta_key == 'voice_mail_audio_sound') {
                    $sound = Sound::find($inboundOffHour->meta_value);
                    if ($sound) {
                        $inboundOffHourArr['voice_mail_audio_sound_id'] = $inboundOffHour->meta_value;
                        $inboundOffHourArr[$inboundOffHour['meta_key']] = $sound->file;
                    }
                } else {
                    $inboundOffHourArr[$inboundOffHour['meta_key']] = $inboundOffHour['meta_value'];
                }
            }
            return $inboundOffHourArr;
        }
        return response()->json(['error' => 'Please add event first!']);
    }
    public function getScheduledCallBasicRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'ScheduledCallBasic'])->first();
        if ($event) {
            $event_id = $event->id;
            $scheduledCalls = ScheduledCalls::where(['event_id' => $event_id, 'type' => 'ScheduledCallBasic'])->get();
            $scheduledCallArr = [];
            foreach ($scheduledCalls as $scheduledCall) {
                if ($scheduledCall->meta_key == 'live_audio_sound') {
                    $sound = Sound::find($scheduledCall->meta_value);
                    if ($sound) {
                        $scheduledCallArr['live_audio_sound_id'] = $scheduledCall->meta_value;
                        $scheduledCallArr[$scheduledCall['meta_key']] = $sound->file;
                    }
                } else if ($scheduledCall->meta_key == 'transfer_sound_1') {
                    $sound = Sound::find($scheduledCall->meta_value);
                    if ($sound) {
                        $scheduledCallArr['transfer_sound_1_id'] = $scheduledCall->meta_value;
                        $scheduledCallArr[$scheduledCall['meta_key']] = $sound->file;
                    }
                } else if ($scheduledCall->meta_key == 'transfer_sound_2') {
                    $sound = Sound::find($scheduledCall->meta_value);
                    if ($sound) {
                        $scheduledCallArr['transfer_sound_2_id'] = $scheduledCall->meta_value;
                        $scheduledCallArr[$scheduledCall['meta_key']] = $sound->file;
                    }
                } else if ($scheduledCall->meta_key == 'call_back_audio_sound') {
                    $sound = Sound::find($scheduledCall->meta_value);
                    if ($sound) {
                        $scheduledCallArr['call_back_audio_sound_id'] = $scheduledCall->meta_value;
                        $scheduledCallArr[$scheduledCall['meta_key']] = $sound->file;
                    }
                } else if ($scheduledCall->meta_key == 'voice_mail_audio_sound') {
                    $sound = Sound::find($scheduledCall->meta_value);
                    if ($sound) {
                        $scheduledCallArr['voice_mail_audio_sound_id'] = $scheduledCall->meta_value;
                        $scheduledCallArr[$scheduledCall['meta_key']] = $sound->file;
                    }
                } else {
                    $scheduledCallArr[$scheduledCall['meta_key']] = $scheduledCall['meta_value'];
                }
            }
            return $scheduledCallArr;
        }
        return response()->json(['error' => 'Please add event first!']);
    }
    public function inboundOpenHourCallBasicStore(Request $request)
    {
        $records = $request->all();
        $inboundOpenHourId = Event::where(['campaign_id' => $request->campaignId, 'type' => 'InboundOpenHourCallBasic'])->first();
        if ($inboundOpenHourId) {
            $eventId = $inboundOpenHourId->id;
            $delete = InboundOpenHour::where(['event_id' => $eventId, 'type' => 'InboundOpenHourCallBasic'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'InboundOpenHourCallBasic',
            ]);
            $eventId = $event->id;
        }

        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = InboundOpenHour::create([
                    'event_id'  => $eventId,
                    'type' => 'InboundOpenHourCallBasic',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function inboundOffHoursCallBasicStore(Request $request)
    {
        $records = $request->all();
        $inboundOffHourId = Event::where(['campaign_id' => $request->campaignId, 'type' => 'InboundOffHourCallBasic'])->first();
        if ($inboundOffHourId) {
            $eventId = $inboundOffHourId->id;
            $delete = InboundOffHour::where(['event_id' => $eventId, 'type' => 'InboundOffHourCallBasic'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'InboundOffHourCallBasic',
            ]);
            $eventId = $event->id;
        }

        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = InboundOffHour::create([
                    'event_id'  => $eventId,
                    'type' => 'InboundOffHourCallBasic',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function getInboundOffHoursSmsRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'InboundOffHourSms'])->first();
        if ($event) {
            $event_id = $event->id;
            $inboundOffHours = InboundOffHour::where(['event_id' => $event_id, 'type' => 'InboundOffHourSms'])->get();
            $inboundOffHourArr = [];
            foreach ($inboundOffHours as $inboundOffHour) {
                $inboundOffHourArr[$inboundOffHour['meta_key']] = $inboundOffHour['meta_value'];
            }
            return $inboundOffHourArr;
        } else {
            return response()->json(['error' => 'Please add event first!']);
        }
    }
    public function getScheduledCallSmsRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'ScheduledSms'])->first();
        if ($event) {
            $event_id = $event->id;
            $scheduledSmss = ScheduledCalls::where(['event_id' => $event_id, 'type' => 'ScheduledSms'])->get();
            $scheduledSmsArr = [];
            foreach ($scheduledSmss as $scheduledSms) {
                $scheduledSmsArr[$scheduledSms['meta_key']] = $scheduledSms['meta_value'];
            }
            return $scheduledSmsArr;
        } else {
            return response()->json(['error' => 'Please add event first!']);
        }
    }
    public function getScheduledCallEmailRecord(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => 'ScheduledEmail'])->first();
        if ($event) {
            $event_id = $event->id;
            $scheduledEmails = ScheduledCalls::where(['event_id' => $event_id, 'type' => 'ScheduledEmail'])->get();
            $scheduledEmailArr = [];
            foreach ($scheduledEmails as $scheduledEmail) {
                $scheduledEmailArr[$scheduledEmail['meta_key']] = $scheduledEmail['meta_value'];
            }
            return $scheduledEmailArr;
        } else {
            return response()->json(['error' => 'Please add event first!']);
        }
    }
    public function inboundOffHourSmsStore(Request $request)
    {
        $records = $request->all();
        $inboundOffHourId = Event::where(['campaign_id' => $request->campaignId, 'type' => 'InboundOffHourSms'])->first();
        if ($inboundOffHourId) {
            $eventId = $inboundOffHourId->id;
            $delete = InboundOffHour::where(['event_id' => $eventId, 'type' => 'InboundOffHourSms'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'InboundOffHourSms',
            ]);
            $eventId = $event->id;
        }

        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = InboundOffHour::create([
                    'event_id'  => $eventId,
                    'type' => 'InboundOffHourSms',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function getEventsScheduleCall(Request $request)
    {
        $getEvents = Event::with('scheduledCalls')->where(['campaign_id' => $request->id, 'type' => 'ScheduledCall'])->get();

        $html = '';

        $i = 1;
        foreach ($getEvents as $getEvent) {
            $subject = '';

            foreach ($getEvent->scheduledCalls as $scheduleCall) {
                if ($scheduleCall->meta_key == 'scheduledCallSubject') {
                    $subject = $scheduleCall->meta_value;
                }
            }

            $divName = "scheduledCallsEditBoxDiv" . $i;
            $html .= '<div class="col-md-6">
            <div class="mb-3 mx-auto" id="scheduledCallsEditBoxDiv' . $i . '">
            <div class="border p-4 thumbnail">
            <div class="float-right">
            <a href="javascript:void(0)" onclick="editScheduledCallEmailEvent(' . $getEvent->id . ',\'' . $divName . '\')"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" onclick="delScheduledCallEmailEvent(' . $getEvent->id . ',\'' . $divName . '\')"><i class="fas fa-trash"></i></a>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="flex-direction : column;" > 
                <h3 class="m-0"> Email </h3>
                <p class="m-0">' . $subject . '</p>
                </div>
            </div>
          </div>
          </div>
          ';
            $i++;
        }
        return $html;
    }
    public function delScheduledCallEmailEvent(Request $request)
    {
        $delScheduledCalls = ScheduledCalls::where('event_id', $request->id)->delete();
        $delEvent = Event::where('id', $request->id)->delete();
        if ($delScheduledCalls && $delEvent) {
            return true;
        } else {
            return false;
        }
    }
    public function editScheduledCallEmailEvent(Request $request)
    {
        $event_id = $request->id;
        $scheduledCalls = ScheduledCalls::where(['event_id' => $event_id, 'type' => 'email'])->get();
        if ($scheduledCalls) {
            $scheduledCallArr = [];
            foreach ($scheduledCalls as $scheduledCall) {
                $scheduledCallArr[$scheduledCall['meta_key']] = $scheduledCall['meta_value'];
            }
            return $scheduledCallArr;
        } else {
            return false;
        }
    }
    public function scheduledCallEventEmailStore(Request $request)
    {
        $records = $request->all();
        $scheduledCallEmailId = Event::where(['campaign_id' => $request->campaignId, 'type' => 'ScheduledEmail'])->first();
        if ($scheduledCallEmailId) {
            $eventId = $scheduledCallEmailId->id;
            $delete = ScheduledCalls::where(['event_id' => $eventId, 'type' => 'ScheduledEmail'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'ScheduledEmail',
            ]);
            $eventId = $event->id;
        }

        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = ScheduledCalls::create([
                    'event_id'  => $eventId,
                    'type' => 'ScheduledEmail',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function scheduledSmsStore(Request $request)
    {
        $records = $request->all();
        $ScheduledSms = Event::where(['campaign_id' => $request->campaignId, 'type' => 'ScheduledSms'])->first();
        if ($ScheduledSms) {
            $eventId = $ScheduledSms->id;
            $delete = ScheduledCalls::where(['event_id' => $eventId, 'type' => 'ScheduledSms'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'ScheduledSms',
            ]);
            $eventId = $event->id;
        }

        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = ScheduledCalls::create([
                    'event_id'  => $eventId,
                    'type' => 'ScheduledSms',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function scheduledCallBasicStore(Request $request)
    {
        $records = $request->all();
        $eventId = Event::where(['campaign_id' => $request->campaignId, 'type' => 'ScheduledCallBasic'])->first();
        if ($eventId) {
            $eventId = $eventId->id;
            $delete = ScheduledCalls::where(['event_id' => $eventId, 'type' => 'ScheduledCallBasic'])->delete();
        } else {
            $event = Event::create([
                'campaign_id' => $request->campaignId,
                'type' => 'ScheduledCallBasic',
            ]);
            $eventId = $event->id;
        }
        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token') {
                $create = ScheduledCalls::create([
                    'event_id'  => $eventId,
                    'type' => 'ScheduledCallBasic',
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function delEvent(Request $request)
    {
        $event = Event::where(['campaign_id' => $request->id, 'type' => $request->campaignType])->first();
        if ($event) {
            $tableName = $request->tableName;
            $deleteFromEvent = Event::where(['campaign_id' => $request->id, 'type' => $request->campaignType])->delete();
            $delete = DB::table($tableName)->where(['event_id' => $event->id, 'type' => $request->campaignType])->delete();
            return response()->json(['success' => 'Deleted']);
        } else {
            return response()->json(['error' => 'Please add first']);
        }
    }
    public function outboundLiveCallStore(Request $request)
    {
        $eventType = '';
        if ($request->outboundLiveCallBasicEventType) {
            $eventType = $request->outboundLiveCallBasicEventType;
            $type = 'OutboundLiveCall';
        }
        if ($request->outboundLiveCallAdvancedEventType) {
            $eventType = $request->outboundLiveCallAdvancedEventType;
            $type = 'OutboundLiveCall';
        }
        if ($request->outboundLiveSmsEventType) {
            $eventType = $request->outboundLiveSmsEventType;
            $type = 'OutboundLiveSms';
        }
        if ($request->outboundLiveEmailEventType) {
            $eventType = $request->outboundLiveEmailEventType;
            $type = 'OutboundLiveEmail';
        }
        $records = $request->all();
        $event = Event::create([
            'campaign_id' => $request->campaignId,
            'type' => $type,
        ]);
        $eventId = $event->id;
        foreach ($records as $key => $record) {
            if ($record != null && $key != 'campaignId' && $key != '_token' &&  $key != 'outboundLiveSmsEventType' && $key != 'outboundLiveEmailEventType' && $key != 'outboundLiveCallBasicEventType' && $key != 'outboundLiveCallAdvancedEventType') {
                $create = OutboundLive::create([
                    'event_id'  => $eventId,
                    'type' => $eventType,
                    'meta_key' => $key,
                    'meta_value' => $record,
                ]);
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function dayEventStore(Request $request)
    {
        $eventType = '';
        if ($request->dayCallBasicEventType) {
            $eventType = $request->dayCallBasicEventType;
            $type = 'DayCallBasic';
        }
        if ($request->dayCallAdvanceEventType) {
            $eventType = $request->dayCallAdvanceEventType;
            $type = 'DayCallAdvance';
        }
        if ($request->daySmsEventType) {
            $eventType = $request->daySmsEventType;
            $type = 'DaySms';
        }
        if ($request->dayEmailEventType) {
            $eventType = $request->dayEmailEventType;
            $type = 'DayEmail';
        }
        $records = $request->all();
        $event = Event::create([
            'campaign_id' => $request->campaignId,
            'type' => $eventType,
        ]);
        $eventId = $event->id;
        if($eventId && $type){
            foreach ($records as $key => $record) {
                if ($record != null && $key != 'campaignId' && $key != '_token' &&  $key != 'dayCallBasicEventType' && $key != 'dayCallAdvanceEventType' && $key != 'daySmsEventType' && $key != 'dayEmailEventType') {
                    $create = DayEvent::create([
                        'event_id'  => $eventId,
                        'type' => $type,
                        'meta_key' => $key,
                        'meta_value' => $record,
                    ]);
                }
            }
        }
      
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function editOutboundLiveEvent(Request $request)
    {
        $outboundLiveCalls = OutboundLive::where(['event_id' => $request->eventId, 'type' => $request->type])->get();
        if ($outboundLiveCalls) {
            if ($request->type == 'OutboundLiveCallBasic') {
                $outboundLiveCallArr = [];
                foreach ($outboundLiveCalls as $outboundLiveCall) {
                    if ($outboundLiveCall->meta_key == 'outbound_live_audio_sound') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_audio_sound_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else if ($outboundLiveCall->meta_key == 'outbound_live_transfer_sound_1') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_transfer_sound_1_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else if ($outboundLiveCall->meta_key == 'outbound_live_transfer_sound_2') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_transfer_sound_2_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else if ($outboundLiveCall->meta_key == 'outbound_live_call_back_audio_sound') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_call_back_audio_sound_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else if ($outboundLiveCall->meta_key == 'outbound_live_voice_mail_audio_sound') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_voice_mail_audio_sound_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else {
                        $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $outboundLiveCall['meta_value'];
                    }
                }
                return response()->json(['outboundLiveCallBasic'  => $outboundLiveCallArr]);
            }
            if ($request->type == 'OutboundLiveCallAdvanced') {
                $outboundLiveCallArr = [];
                foreach ($outboundLiveCalls as $outboundLiveCall) {
                    if ($outboundLiveCall->meta_key == 'outbound_live_advance_voice_mail_audio_sound') {
                        $sound = Sound::find($outboundLiveCall->meta_value);
                        if ($sound) {
                            $outboundLiveCallArr['outbound_live_advance_voice_mail_audio_sound_id'] = $outboundLiveCall->meta_value;
                            $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $sound->file;
                        }
                    } else {
                        $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $outboundLiveCall['meta_value'];
                    }
                }
                return response()->json(['outboundLiveCallAdvanced'  => $outboundLiveCallArr]);
            }
            if ($request->type == 'OutboundLiveSms') {
                $outboundLiveCallArr = [];
                foreach ($outboundLiveCalls as $outboundLiveCall) {
                    $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $outboundLiveCall['meta_value'];
                }
                return response()->json(['outboundLiveSms'  => $outboundLiveCallArr]);
            }
            if ($request->type == 'OutboundLiveEmail') {
                $outboundLiveCallArr = [];
                foreach ($outboundLiveCalls as $outboundLiveCall) {
                    $outboundLiveCallArr[$outboundLiveCall['meta_key']] = $outboundLiveCall['meta_value'];
                }
                return response()->json(['outboundLiveEmail'  => $outboundLiveCallArr]);
            }
        }
    }
    public function editDayEvent(Request $request)
    {
        $dayEvents = DayEvent::where(['event_id' => $request->eventId, 'type' => $request->type])->get();
        if ($dayEvents) {
            if ($request->type == 'DayCallBasic') {
                $dayEventArr = [];
                foreach ($dayEvents as $dayEvent) {
                    if ($dayEvent->meta_key == 'live_audio_sound') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['live_audio_sound_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else if ($dayEvent->meta_key == 'transfer_sound_1') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['transfer_sound_1_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else if ($dayEvent->meta_key == 'transfer_sound_2') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['transfer_sound_2_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else if ($dayEvent->meta_key == 'call_back_audio_sound') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['call_back_audio_sound_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else if ($dayEvent->meta_key == 'voice_mail_audio_sound') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['voice_mail_audio_sound_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else {
                        $dayEventArr[$dayEvent['meta_key']] = $dayEvent['meta_value'];
                    }
                }
                return response()->json(['dayEventCallBasic'  => $dayEventArr]);
            }
            if ($request->type == 'DayCallAdvance') {
                $dayEventArr = [];
                foreach ($dayEvents as $dayEvent) {
                    if ($dayEvent->meta_key == 'advance_voice_mail_audio_sound') {
                        $sound = Sound::find($dayEvent->meta_value);
                        if ($sound) {
                            $dayEventArr['advance_voice_mail_audio_sound_id'] = $dayEvent->meta_value;
                            $dayEventArr[$dayEvent['meta_key']] = $sound->file;
                        }
                    } else {
                        $dayEventArr[$dayEvent['meta_key']] = $dayEvent['meta_value'];
                    }
                }
                return response()->json(['dayEventCallAdvance'  => $dayEventArr]);
            }
            if ($request->type == 'DaySms') {
                $dayEventArr = [];
                foreach ($dayEvents as $dayEvent) {
                    $dayEventArr[$dayEvent['meta_key']] = $dayEvent['meta_value'];
                }
                return response()->json(['daySms'  => $dayEventArr]);
            }
            if ($request->type == 'DayEmail') {
                $dayEventArr = [];
                foreach ($dayEvents as $dayEvent) {
                    $dayEventArr[$dayEvent['meta_key']] = $dayEvent['meta_value'];
                }
                return response()->json(['dayEmail'  => $dayEventArr]);
            }
        }
    }
    public function delOutboundLiveEvent(Request $request)
    {
        $eventId = $request->eventId;
        $event = Event::find($eventId);
        $campaignId = $event->campaign_id;
        $delEvent = Event::where('id', $eventId)->delete();
        $delOutboundLive = OutboundLive::where('event_id', $eventId)->delete();
        if ($delEvent && $delOutboundLive) {
            if (($request->type == 'OutboundLiveCallBasic') || ($request->type == 'OutboundLiveCallAdvanced')) {
                $type = 'OutboundLiveCall';
                $functionName = 'outboundLiveCallEvent()';
            } else if ($request->type == 'OutboundLiveSms') {
                $type = $request->type;
                $functionName = 'outboundLiveSmsEvent()';
            } else if ($request->type == 'OutboundLiveEmail') {
                $type = $request->type;
                $functionName = 'outboundLiveEmailEvent()';
            }
            $getEvents = Event::with('outboundLives')->where(['campaign_id' => $campaignId, 'type' => $type])->get();
            $html = '<div class="container"> <p class="float-right"><button class="btn btn-secondary btn-round" onclick="' . $functionName . '">Add New</button></p></div>';
            $html .= '<div class="eventBoxes">';
            $divName = "outboundLiveEditBoxDiv";
            foreach ($getEvents as $getEvent) {
                $html .= '
                <div class="mb-3 mx-auto">
                <div class="border p-2 thumbnail">
                <div class="d-flex justify-content-center align-items-center" > 
                    <p class="eventBoxTitle">' . $getEvent->outboundLives[0]->type . ' </p>
                </div>
                <p class="text-center m-0"> <button type="button" class="btn btn-vimeo btn-icon-only" title="Edit" onclick="editOutboundLiveEvent(' . $getEvent->id . ',\'' . $getEvent->outboundLives[0]->type . '\')">
                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
              </button>
              <button type="button" class="btn btn-youtube btn-icon-only" title="Delete" onclick="delOutboundLiveEvent(' . $getEvent->id . ',\'' . $getEvent->outboundLives[0]->type . '\')">
                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
              </button>
              </p>
                </div>
              </div>
              ';
            }
            $html .= '</div>';
            return $html;
        }
        return response()->json(['error' => 'Please try again!']);
    }
    public function delDayEvent(Request $request)
    {
        $eventId = $request->eventId;
        $event = Event::find($eventId);
        $campaignId = $event->campaign_id;
        $type = $event->type;
        $delEvent = Event::where('id', $eventId)->delete();
        $delDayEvent = DayEvent::where('event_id', $eventId)->delete();
        if ($delEvent && $delDayEvent) {
            if (($request->type == 'DayCallBasic') || ($request->type == 'DayCallAdvance')) {
                $functionName = 'dayCallEvent()';
            } 
            if ($request->type == 'DaySms') {
                $functionName = 'daySmsEvent()';
            } 
            if ($request->type == 'DayEmail') {
                $functionName = 'dayEmailEvent()';
            }
            $getEvents = Event::with('dayEvents')->where(['campaign_id' => $campaignId, 'type' => $type])->get();
            $html = '<div class="container"> <p class="float-right"><button class="btn btn-secondary btn-round" onclick="' . $functionName . '">Add New</button></p></div>';
            $html .= '<div class="eventBoxes">';
            foreach ($getEvents as $getEvent) {
                $html .= '
                <div class="mb-3 mx-auto">
                <div class="border p-2 thumbnail">
                <div class="d-flex justify-content-center align-items-center" > 
                    <p class="eventBoxTitle">' . $getEvent->dayEvents[0]->type . ' </p>
                </div>
                <p class="text-center m-0"> <button type="button" class="btn btn-vimeo btn-icon-only" title="Edit" onclick="editDayEvent(' . $getEvent->id . ',\'' . $getEvent->dayEvents[0]->type . '\')">
                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
              </button>
              <button type="button" class="btn btn-youtube btn-icon-only" title="Delete" onclick="delDayEvent(' . $getEvent->id . ',\'' . $getEvent->dayEvents[0]->type . '\')">
                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
              </button>
              </p>
                </div>
              </div>
              ';
            }
            $html .= '</div>';
            return $html;
        }
        return response()->json(['error' => 'Please try again!']);
    }
    public function editOutboundLiveCallStore(Request $request)
    {
        $type = '';
        $eventId = '';
        if ($request->outboundLiveCallBasicEventType == 'OutboundLiveCallBasic') {
            $type = 'OutboundLiveCallBasic';
        }
        if ($request->outboundLiveCallAdvancedEventType == 'OutboundLiveCallAdvanced') {
            $type = 'OutboundLiveCallAdvanced';
        }
        if ($request->outboundLiveCallBasicEventId) {
            $eventId = $request->outboundLiveCallBasicEventId;
        }
        if ($request->outboundLiveCallAdvancedEventId) {
            $eventId = $request->outboundLiveCallAdvancedEventId;
        }

        $records = $request->all();
        $delete = OutboundLive::where(['event_id' => $eventId, 'type' => $type])->delete();
        if ($delete) {
            foreach ($records as $key => $record) {
                if ($record != null && $key != 'campaignId' && $key != 'outboundLiveCallBasicEventId' && $key != 'outboundLiveCallBasicEventType' && $key != '_token') {
                    $create = OutboundLive::create([
                        'event_id'  => $eventId,
                        'type' => $type,
                        'meta_key' => $key,
                        'meta_value' => $record,
                    ]);
                }
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function editDayEventStore(Request $request)
    {
        $type = '';
        $eventId = '';
        if ($request->editDayCallBasicEventType == 'DayCallBasic') {
            $type = $request->editDayCallBasicEventType;
        }
        if ($request->editDayCallAdvanceEventType == 'DayCallAdvance') {
            $type = $request->editDayCallAdvanceEventType;
        }
        if ($request->editDayCallBasicEventId) {
            $eventId = $request->editDayCallBasicEventId;
        }
        if ($request->editDayCallAdvanceEventId) {
            $eventId = $request->editDayCallAdvanceEventId;
        }
        if ($request->editDaySmsEventType == 'DaySms') {
            $type = $request->editDaySmsEventType;
        }
        if ($request->editDaySmsEventId) {
            $eventId = $request->editDaySmsEventId;
        }
        if ($request->editDayEmailEventType == 'DayEmail') {
            $type = $request->editDayEmailEventType;
        }
        if ($request->editDayEmailEventId) {
            $eventId = $request->editDayEmailEventId;
        }
        $records = $request->all();
        $delete = DayEvent::where(['event_id' => $eventId, 'type' => $type])->delete();
        if ($delete) {
            foreach ($records as $key => $record) {
                if ($record != null && $key != 'campaignId' && $key != 'editDayCallBasicEventType' && $key != 'editDayCallAdvanceEventType' && $key != '_token' && $key != 'editDayCallBasicEventId' && $key != 'editDayCallAdvanceEventId' && $key != 'editDaySmsEventType' && $key != 'editDaySmsEventId') {
                    $create = DayEvent::create([
                        'event_id'  => $eventId,
                        'type' => $type,
                        'meta_key' => $key,
                        'meta_value' => $record,
                    ]);
                }
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function editOutboundLiveSmsStore(Request $request)
    {
        $eventId = $request->outboundLiveSmsEventId;
        $type = $request->editOutboundLiveSmsEventType;
        $records = $request->all();
        $delete = OutboundLive::where(['event_id' => $eventId, 'type' => $type])->delete();
        if ($delete) {
            foreach ($records as $key => $record) {
                if ($record != null && $key != 'campaignId' && $key != 'outboundLiveSmsEventId' && $key != 'editOutboundLiveSmsEventType' && $key != '_token') {
                    $create = OutboundLive::create([
                        'event_id'  => $eventId,
                        'type' => $type,
                        'meta_key' => $key,
                        'meta_value' => $record,
                    ]);
                }
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
    public function editOutboundLiveEmailStore(Request $request)
    {
        $eventId = $request->outboundLiveEmailEventId;
        $type = $request->editOutboundLiveEmailEventType;
        $records = $request->all();
        $delete = OutboundLive::where(['event_id' => $eventId, 'type' => $type])->delete();
        if ($delete) {
            foreach ($records as $key => $record) {
                if ($record != null && $key != 'campaignId' && $key != 'outboundLiveEmailEventId' && $key != 'editOutboundLiveEmailEventType' && $key != '_token') {
                    $create = OutboundLive::create([
                        'event_id'  => $eventId,
                        'type' => $type,
                        'meta_key' => $key,
                        'meta_value' => $record,
                    ]);
                }
            }
        }
        if ($create) {
            return response()->json(['success' => 'Saved!']);
        } else {
            return response()->json(['error' => 'Please try again!']);
        }
    }
}
