@extends('layouts.main')
@section('title','NewCampaign')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Edit Campaign</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="post" action="{{route('newCampaign.update',$campaign->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{--Campaign detail--}}
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <strong>Campaign Details</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Name*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" required
                                    value="{{ $campaign->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Long Transfer*</label><br>
                            <div class="col-md-6">
                                <select name="longTransfer" class="select form-control" id="id_long_transfer" required>
                                    @php
                                    $time = getTime();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($campaign->long_transfer == $value) selected @endif >
                                        {{$value}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Close Leads after begin on
                                a*</label><br>
                            <div class="col-md-3">
                                <select name="closeLeads" class="select form-control" id="closeLeads" required>
                                    <option value="call" @if($campaign->close_lead == 'call') selected @endif > Call
                                    </option>
                                    <option value="transfer" @if($campaign->close_lead == 'transfer') selected @endif>
                                        Transfer</option>
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label">Close Durations*</label>
                            <div class="col-md-3">

                                <select name="closeDuration" class="select form-control" id="closeDuration" required>
                                    @php
                                    $time = getTime();
                                    @endphp
                                    <option value="1 Seconds" @if($campaign->close_duration == '1 Seconds') selected
                                        @endif> 1 Seconds</option>
                                    <option value="5 Seconds" @if($campaign->close_duration == '5 Seconds') selected
                                        @endif> 5 Seconds</option>
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($campaign->close_duration == $value) selected
                                        @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Revenue per
                                conversion*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" step="0.01" name="revenue"
                                    value="{{ $campaign->revenue }}">
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <p>
                                <span>
                                    Setting revenue per conversion will enable the ROI Report if you post back
                                    conversion data on your leads.
                                </span>
                            </p>
                        </div>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="setTransfer" id="setTransfer" value="1"
                                    type="checkbox" @if($campaign->long_transfer_check == 1) checked @endif>
                                <label class="custom-control-label" for="setTransfer"> Automatically Set Long Transfers
                                    as Converted</label>
                            </div>
                        </div><br>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="closeLeadCheck" id="closeLeadCheck" value="1"
                                    type="checkbox" @if($campaign->close_leads_check == 1) checked @endif>
                                <label class="custom-control-label" for="closeLeadCheck"> Automatically Close Leads on
                                    Failed Transfer</label>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Report rule</label><br>
                            <div class="col-md-6">

                                <select name="reportRules" class="select form-control" id="reportRules">
                                    <option value="0" @if($campaign->report_rule == 0) selected @endif>Never Allow
                                        Repost</option>
                                    <option value="14" @if($campaign->report_rule == 14) selected @endif>Allow Repost
                                        after 14 days</option>
                                    <option value="30" @if($campaign->report_rule == 30) selected @endif>Allow Repost
                                        after 30 days</option>
                                    <option value="60" @if($campaign->report_rule == 60) selected @endif> Allow Repost
                                        after 60 days</option>
                                </select>
                            </div>

                        </div>
                        <div class="row" style="margin:20px;">
                            <p>
                                Setting for duplicate leads being posted to this campaign via the API.
                            </p><br>
                            <p>
                                <strong><cite>
                                        Disclaimer: Reposting a lead, will overwrite the existing lead's stats.</cite>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--AI settings--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>A.I Setting</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p class=" form-control-label">Customize your A.I. settings *</p>
                        <div class="form-group row">

                            <label class="col-md-2 col-form-label form-control-label">A.I Rules</label><br>
                            <div class="col-md-6">

                                <select name="AIRules" class="select form-control" id="AIRules">
                                    @foreach($ais as $ai)
                                    <option value="{{$ai->id}}" @if($campaign->ai_rules == $ai->id) selected
                                        @endif>{{$ai->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group row" style="margin: 5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="voiceSchedule" id="voiceSchedule" value="1"
                                    type="checkbox" @if($campaign->voice_scheduling_check == 1) checked @endif>
                                <label class="custom-control-label" for="voiceSchedule"> Enable Voice Scheduling</label>
                            </div>
                        </div>

                        <div class="row" style="margin: 20px;">
                            <p>Voice scheduling feature allows non-mobile users to schedule a callback using A.I. Voice
                                upon pressing the callback digit. (Speech recognition fee applies. $0.0250 per 15
                                seconds)
                            </p><br>

                        </div>
                        <div class="form-group row" style="margin: 5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="AMD" type="checkbox" checked disabled>
                                <label class="custom-control-label" for="AMD"> Enable Enhanced AMD</label>
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <p>Enhanced AMD is Answering Machine Detection powered by A.I. and Machine Learning. Cost is
                                0.0055 per call. US & Canada Only.
                            </p><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Phone Number--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>Phone Numbers</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Number List*</label><br>
                            <div class="col-md-6">

                                <select name="numberList" class="select form-control" id="numberList" required>
                                    @foreach($list as $l)
                                    <option value="{{$l->id}}" @if($campaign->number_list == $l->id) selected @endif>
                                        {{$l->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row" style="margin:20px;">
                            <p>Select a phone number list to assign numbers to this campaign. </p><br>
                        </div><br>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="localMatch" id="localMatch" value="1"
                                    type="checkbox" @if($campaign->local_match_Check == 1) checked @endif >
                                <label class="custom-control-label" for="localMatch"> Enable Local Match</label>
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <p>Enabling local area match will send calls and sms from the phone number geographically
                                closest to the lead.
                            </p><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Delivery Setting--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>Delivery Settings</strong>
                        </h3>
                    </div>


                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Leads per day*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="leadsPerDay" id="leadsPerDay"
                                    value="{{ $campaign->leads_per_day }}">
                            </div>
                        </div>

                        <div class="row" style="margin: 20px;">
                            <cite>
                                The maximum amount of leads to start in a day. (0 for unlimited.)
                            </cite>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Delivery type*</label><br>
                            <div class="col-md-6">

                                <select class="select form-control" name="deliveryType" id="deliveryType"
                                    onchange="showDiv('max_agent','CPS', this)">
                                    <option value="cps" @if($campaign->delivery_type == 'cps') selected @endif>CPS
                                    </option>
                                    <option value="max_agent" @if($campaign->delivery_type == 'max_agent') selected
                                        @endif>Max Agents</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row cps" id="CPS" style="margin: 10px;">
                            <label class="col-md-2 col-form-label form-control-label"> CPS*</label>
                            <div class="col-md-6">
                                <input class="form-control" id="callPerSec" name="callPerSec" type="number" step="0.01"
                                    value="{{ $campaign->cps }}">
                            </div><br>
                            <div class="row" style="margin: 20px;">
                                <cite>
                                    The Calls Per Second ratio for this campaign. (up to 3636 Calls per Hour - 61 Calls
                                    per Minute)
                                </cite>
                            </div>
                        </div>

                        <div class="form-group max_agent" id="max_agent" style="margin: 10px; display: none">
                            <div class="form-group row" style="margin: 10px;">
                                <label class="col-md-2 col-form-label form-control-label"> Concurrent Transfers*</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" id="concTransfer" name="concTransfer"
                                        step="1" value="{{ $campaign->concurrent_transfer }}">
                                </div>
                            </div>
                            <div class="form-group row" style="margin: 10px;">
                                <label class="col-md-2 col-form-label form-control-label"> Max CSP*</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" id="maxCSP" name="maxCSP" step="0.01"
                                        value="{{ $campaign->max_CSP }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label"> SMS per minute*</label>
                            <div class="col-md-6">
                                <input class="form-control" id="smsPerMin" name="smsPerMin" type="number" step="1"
                                    value="{{ $campaign->sms_per_min }}">
                            </div>

                            <div class="row" style="margin: 20px;">
                                <cite>
                                    The SMS Per Minute for this campaign. (0 for unlimited.)
                                </cite>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--Call recording setting--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>Call Recording Setting</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="callRecordCheck" id="callRecordCheck"
                                    value="1" type="checkbox" @if($campaign->record_call_check == 1) checked @endif>
                                <label class="custom-control-label" for="callRecordCheck">Record Call</label>
                            </div>
                        </div><br>
                        <div class="row" style="margin:20px;">
                            <small>If you choose to record calls, you need to comply with certain laws and regulations,
                                including those regarding obtaining consent to record (such as California’s Invasion of
                                Privacy Act and similar laws in other jurisdictions).<strong> Call recordings only apply
                                    to transferred calls, are stored for 60 days, and then are automatically deleted by
                                    the system.</strong> Cost is 0.0025 per minute of recording time, as well as 0.0005
                                per minute for storage. You can listen to your recordings on the live call log.
                            </small><br>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Transfer Fallback Settings--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Transfer Fallback Settings
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="fallbackCheck" id="fallbackCheck" value="1"
                                    type="checkbox" @if($campaign->fallback_transfer_check == 1) checked @endif>
                                <label class="custom-control-label" for="fallbackCheck">Enable fallback transfer</label>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Fallback time out*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" value="30" name="fallbackTimeOut"
                                    id="fallbackTimeOut" value="{{ $campaign->fallback_timeout }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Fallback Number*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fallbackNumber" id="fallbackNumber"
                                    value="{{ $campaign->fallback_number }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Schedule Settings--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Schedule Settings
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="schedulingCheck" id="schedulingCheck"
                                    value="1" type="checkbox" @if($campaign->scheduling_check == 1) checked @endif>
                                <label class="custom-control-label" for="schedulingCheck">Enable Scheduling</label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="reschedulingCheck" name="reschedulingCheck"
                                    value="1" type="checkbox" @if($campaign->rescheduling_check == 1) checked @endif>
                                <label class="custom-control-label" for="reschedulingCheck">Auto Reschedule To Open
                                    Hours</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Maximum Months
                                Allowed*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" value="{{ $campaign->max_scheduling_month }}"
                                    id="maxScheduleMonth" name="maxScheduleMonth">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Inbound/Outbound Hours of Operation Settings--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>Inbound/Outbound Hours of Operation Settings</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox" style="margin: 5px;">
                                <input class="custom-control-input" id="inbound_outbound" name="inOutBoundCheck"
                                    value="1" @if($campaign->in_outbound_check == 1)
                                checked @endif type="checkbox" onchange="valueChanged(this)">
                                <label class="custom-control-label" for="inbound_outbound">Use the same hours of
                                    operation for inbound/outbound calls & SMS</label>
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <small>You can choose to have separate hours of operation for your inbound and outbound
                                calls/sms. For example, this allows you to accept inbound calls while pausing outbound
                                actions.</small><br>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Campaign hours--}}
    <div class="container-fluid mt-3" id="camp">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" id="campHours">
                        <h3>
                            <strong>Campaign Hours</strong>
                        </h3>
                    </div>
                    <div class="card-header" id="inboundHours" style="display: none;">
                        <h3>
                            <strong>Inbound Campaign hours</strong>
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="row" style="margin:20px;">
                            <small>Set the hours you would like the campaign to run. The timezone for the campaign hours
                                is: US/Eastern</small><br>
                            <small> No calls or texts will go out before 8 am in the leads timezone, regardless of
                                campaign hours.</small><br>
                        </div><br>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="monday" name="monday" value="1" @if($mon=='monday' )
                                        checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>

                            <label class="col-md-2 col-form-label form-control-label float-right">Monday Open</label>
                            <div class="col-md-2">
                                @php
                                $time = getTimeArray();
                                @endphp

                                <select name="mondayOpen" class="col-md-12 select form-control float-left"
                                    id="MondayOpen">
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($monOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Monday close</label>
                            <div class="col-md-2">
                                <select name="mondayClose" class="col-md-12 select form-control float-left"
                                    id="mondayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($monCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" value="1" id="tuesday" name="tuesday" @if($tue=='tuesday' )
                                        checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday Open</label>
                            <div class="col-md-2">
                                <select name="tuesdayOpen" class="col-md-12 select form-control float-left"
                                    id="tuesdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($tueOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday close</label>
                            <div class="col-md-2">
                                <select name="tuesdayClose" class="col-md-12 select form-control float-left"
                                    id="tuesdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($tueCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="wednesday" name="wednesday" value="1"
                                        @if($wed=='wednesday' ) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday Open</label>
                            <div class="col-md-2">
                                <select name="wednesdayOpen" class="col-md-12 select form-control float-left"
                                    id="wednesdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($wedOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday
                                close</label>
                            <div class="col-md-2">
                                <select name="wednesdayClose" class="col-md-12 select form-control float-left"
                                    id="wednesdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($wedCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="thursday" name="thursday" value="1" @if($thru=='thrusday'
                                        ) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday Open</label>
                            <div class="col-md-2">
                                <select name="thursdayOpen" class="col-md-12 select form-control float-left"
                                    id="thursdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($thruOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday close</label>
                            <div class="col-md-2">
                                <select name="thursdayClose" class="col-md-12 select form-control float-left"
                                    id="thursdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($thruCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="friday" name="friday" value="1" @if($fri=='friday' )
                                        checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday Open</label>
                            <div class="col-md-2">
                                <select name="fridayOpen" class="col-md-12 select form-control float-left"
                                    id="fridayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($friOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday close</label>
                            <div class="col-md-2">
                                <select name="fridayClose" class="col-md-12 select form-control float-left"
                                    id="fridayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($friCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="saturday" name="saturday" value="1" @if($sat=='saturday'
                                        ) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday Open</label>
                            <div class="col-md-2">
                                <select name="saturdayOpen" class="col-md-12 select form-control float-left"
                                    id="saturdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($satOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday close</label>
                            <div class="col-md-2">
                                <select name="saturdayClose" class="col-md-12 select form-control float-left"
                                    id="saturdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($satCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="sunday" name="sunday" value="1" @if($sun=='sunday' )
                                        checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday Open</label>
                            <div class="col-md-2">
                                <select name="sundayOpen" class="col-md-12 select form-control float-left"
                                    id="sundayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($sunOpenHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday close</label>
                            <div class="col-md-2">
                                <select name="sundayClose" class="col-md-12 select form-control float-left"
                                    id="sundayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($sunCloseHour==$value) selected @endif> {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3" id="outboundHours" style="display: none;">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3>
                            <strong>Outbound Campaign hours </strong>
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="row" style="margin:20px;">
                            <small>Set the hours you would like the campaign to run. The timezone for the campaign hours
                                is: US/Eastern</small><br>
                            <small> No calls or texts will go out before 8 am in the leads timezone, regardless of
                                campaign hours.</small><br>
                        </div><br>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="monday" name="outMonday" value="1" @if($monOutbound == 'monday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Monday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outMondayOpen" class="col-md-12 select form-control float-left"
                                    id="outMondayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($monOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Monday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outMondayClose" class="col-md-12 select form-control float-left"
                                    id="outMondayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($monOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" value="1" name="outTuesday" id="tuesday" @if($tueOutbound == 'tuesday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outTuesdayOpen" class="col-md-12 select form-control float-left"
                                    id="outTuesdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($tueOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outTuesdayClose" class="col-md-12 select form-control float-left"
                                    id="outTuesdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($tueOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="wednesday" name="outWednesday" value="1" @if($wedOutbound == 'wednesday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outWednesdayOpen" class="col-md-12 select form-control float-left"
                                    id="outWednesdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($wedOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outWednesdayClose" class="col-md-12 select form-control float-left"
                                    id="outWednesdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($wedOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox"  id="thursday" name="outThursday" value="1" @if($thruOutbound == 'thrusday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outThursdayOpen" class="col-md-12 select form-control float-left"
                                    id="outThursdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($thruOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outThursdayClose" class="col-md-12 select form-control float-left"
                                    id="outThursdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($thruOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="friday" name="outFriday" value="1" @if($friOutbound == 'friday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outFridayOpen" class="col-md-12 select form-control float-left"
                                    id="outFridayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($friOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outFridayClose" class="col-md-12 select form-control float-left"
                                    id="outFridayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($friOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="saturday" name="outSaturday" value="1" @if($satOutbound == 'saturday') checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outSaturdayOpen" class="col-md-12 select form-control float-left"
                                    id="outSaturdayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($satOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outSaturdayClose" class="col-md-12 select form-control float-left"
                                    id="outSaturdayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($satOutboundCloseHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" id="sunday" name="outSunday" value="1" @if($sunOutbound == 'sunday') checked @endif> 
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                        data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday Open
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outSundayOpen" class="col-md-12 select form-control float-left"
                                    id="outSundayOpen">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($sunOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday close
                                outbound</label>
                            <div class="col-md-2">
                                <select name="outSundayClose" class="col-md-12 select form-control float-left"
                                    id="outSundayClose">
                                    @php
                                    $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                    <option value="{{$value}}" @if($sunOutboundOpenHour == $value) selected @endif> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="float-right" style="margin-right: 50px">
        <button type="submit" class="btn btn-primary my-4 text-white"> Next
        </button>&nbsp;&nbsp;
    </div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
    valueChanged();
    function valueChanged()
    {
        if($("#inbound_outbound").is(":checked")){
            $("#outboundHours").hide();
            $('#inboundHours').hide();
            $("#campHours").show();
            $("#camp").show();
        }else{
            $("#campHours").hide();
            $('#inboundHours').show();
            $("#outboundHours").show();
        }
    }
    function toggleDiv() {
        var some = $(this).find('option:selected').val();
        if(some == 'max_agent'){
            $('#maxAgent').css('display', 'block');
            $('#CPS').css('display', 'none');
        }else{
            $('#maxAgent').css('display', 'none');
            $('#CPS').css('display', 'block');
        }
    }
    function showDiv(divId,maxDiv, element)
    {
        document.getElementById(divId).style.display = element.value == 'max_agent' ? 'block' : 'none';
        document.getElementById(maxDiv).style.display = element.value == 'cps' ? 'block' : 'none';

    }
</script>
@endsection