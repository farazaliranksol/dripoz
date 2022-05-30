@extends('layouts.main')
@section('title','NewCampaign')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">New Campaign</h6>
                </div>
                </div>
            </div>
        </div>
</div>
<form id="form-cst">
    @csrf
    {{--Campaign detail--}}
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between " >
                <h3>
                    <strong>Campaign Details</strong>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">

                    </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label" >Name*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" required placeholder="Enter Campaign Name">
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
                                    <option value="{{$value}}"> {{$value}}</option>
                                @endforeach

                            </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Close Leads after begin on a*</label><br>
                            <div class="col-md-3">
                                <select name="closeLeads" class="select form-control" id="closeLeads" required>
                                    <option value="call"> Call</option>
                                    <option value="transfer"> Transfer</option>
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label">Close Durations*</label>
                            <div class="col-md-3">

                                <select name="closeDuration" class="select form-control" id="closeDuration" required>
                                    @php
                                        $time = getTime();
                                    @endphp
                                    <option value="1 Seconds"> 1 Seconds</option>
                                    <option value="5 Seconds"> 5 Seconds</option>
                                    @foreach($time as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Revenue per conversion*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" step="0.01" value="0.00" name="revenue">
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <p>
                                <span>
                                    Setting revenue per conversion will enable the ROI Report if you post back conversion data on your leads.
                                </span>
                            </p>
                        </div>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="setTransfer" id="setTransfer" value="1" type="checkbox">
                                <label class="custom-control-label" for="setTransfer"> Automatically Set Long Transfers as Converted</label>
                            </div>
                        </div><br>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="closeLeadCheck" id="closeLeadCheck" value="1" type="checkbox">
                                <label class="custom-control-label" for="closeLeadCheck"> Automatically Close Leads on Failed Transfer</label>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Report rule</label><br>
                            <div class="col-md-6">

                                <select name="reportRules" class="select form-control" id="reportRules">
                                    <option value="0" selected="">Never Allow Repost</option>
                                    <option value="14">Allow Repost after 14 days</option>
                                    <option value="30">Allow Repost after 30 days</option>
                                    <option value="60"> Allow Repost after 60 days</option>
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
<div class="container-fluid mt-3" >
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3>
                        <strong>A.I Setting</strong>
                    </h3>
                </div>
                <div class="card-body" >
                    <p class=" form-control-label">Customize your A.I. settings *</p>
                    <div class="form-group row">

                        <label class="col-md-2 col-form-label form-control-label">A.I Rules</label><br>
                        <div class="col-md-6">

                            <select name="AIRules" class="select form-control" id="AIRules">
                                @foreach($ais as $ai)
                                    <option value="{{$ai->id}}">{{$ai->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group row" style="margin: 5px;">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="voiceSchedule" id="voiceSchedule" value="1" type="checkbox">
                            <label class="custom-control-label" for="voiceSchedule"> Enable Voice Scheduling</label>
                        </div>
                    </div>

                    <div class="row" style="margin: 20px;">
                        <p>Voice scheduling feature allows non-mobile users to schedule a callback using A.I. Voice upon pressing the callback digit. (Speech recognition fee applies. $0.0250 per 15 seconds)
                        </p><br>

                    </div>
                    <div class="form-group row" style="margin: 5px;">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="AMD" type="checkbox" checked disabled >
                            <label class="custom-control-label" for="AMD"> Enable Enhanced AMD</label>
                        </div>
                    </div>
                    <div class="row" style="margin:20px;">
                        <p>Enhanced AMD is Answering Machine Detection powered by A.I. and Machine Learning. Cost is 0.0055 per call. US & Canada Only.
                        </p><br>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
    {{--Phone Number--}}
<div class="container-fluid mt-3" >
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header" >
                    <h3>
                        <strong>Phone Numbers</strong>
                    </h3>
                </div>
                <div class="card-body" >
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label form-control-label">Number List*</label><br>
                        <div class="col-md-6">

                            <select name="numberList" class="select form-control" id="numberList" required>
                                @foreach($list as $l)
                                    <option value="{{$l->id}}"> {{$l->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row" style="margin:20px;">
                        <p>Select a phone number list to assign numbers to this campaign. </p><br>
                    </div><br>
                    <div class="form-group row" style="margin:5px;">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="localMatch" id="localMatch" value="1" type="checkbox" >
                            <label class="custom-control-label" for="localMatch"> Enable Local Match</label>
                        </div>
                    </div>
                    <div class="row" style="margin:20px;">
                        <p>Enabling local area match will send calls and sms from the phone number geographically closest to the lead.
                        </p><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{--Delivery Setting--}}
<div class="container-fluid mt-3" >
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" >
                        <h3>
                            <strong>Delivery Settings</strong>
                        </h3>
                    </div>


                    <div class="card-body" >
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Leads per day*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" value="0" name="leadsPerDay" id="leadsPerDay">
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

                                <select class="select form-control" name="deliveryType" id="deliveryType" onchange="showDiv('max_agent','CPS', this)">
                                    <option value="cps">CPS</option>
                                    <option value="max_agent">Max Agents</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row cps" id="CPS" style="margin: 10px;">
                            <label class="col-md-2 col-form-label form-control-label"> CPS*</label>
                            <div class="col-md-6">
                                <input class="form-control" id="callPerSec" name="callPerSec" type="number" step="0.01" value="1.0" >
                            </div><br>
                            <div class="row" style="margin: 20px;">
                                <cite>
                                    The Calls Per Second ratio for this campaign. (up to 3636 Calls per Hour - 61 Calls per Minute)
                                </cite>
                            </div>
                        </div>

                    <div class="form-group max_agent" id="max_agent" style="margin: 10px; display: none">
                        <div class="form-group row"  style="margin: 10px;">
                            <label class="col-md-2 col-form-label form-control-label"> Concurrent Transfers*</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" id="concTransfer" name="concTransfer" step="1" value="1" >
                            </div>
                        </div>
                        <div class="form-group row"  style="margin: 10px;">
                            <label class="col-md-2 col-form-label form-control-label"> Max CSP*</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" id="maxCSP" name="maxCSP" step="0.01" value="1.0" >
                            </div>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label"> SMS per minute*</label>
                            <div class="col-md-6">
                                <input class="form-control" id="smsPerMin" name="smsPerMin" type="number" step="1" value="300" >
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
<div class="container-fluid mt-3" >
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" >
                        <h3>
                            <strong>Call Recording Setting</strong>
                        </h3>
                    </div>
                    <div class="card-body" >
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="callRecordCheck" id="callRecordCheck" value="1" type="checkbox">
                                <label class="custom-control-label" for="callRecordCheck">Record Call</label>
                            </div>
                        </div><br>
                        <div class="row" style="margin:20px;">
                            <small>If you choose to record calls, you need to comply with certain laws and regulations, including those regarding obtaining consent to record (such as California’s Invasion of Privacy Act and similar laws in other jurisdictions).<strong> Call recordings only apply to transferred calls, are stored for 60 days, and then are automatically deleted by the system.</strong> Cost is 0.0025 per minute of recording time, as well as 0.0005 per minute for storage. You can listen to your recordings on the live call log. </small><br>
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
                <div class="card-header" >
                    <h3>
                        Transfer Fallback Settings
                    </h3>
                </div>
                <div class="card-body">

                    <div class="form-group row" style="margin:5px;">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="fallbackCheck" id="fallbackCheck" value="1" type="checkbox">
                            <label class="custom-control-label" for="fallbackCheck">Enable fallback transfer</label>
                        </div>
                    </div><br>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label form-control-label">Fallback time out*</label><br>
                        <div class="col-md-6">
                            <input class="form-control" type="number" value="30" name="fallbackTimeOut" id="fallbackTimeOut">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label form-control-label">Fallback Number*</label><br>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="" name="fallbackNumber" id="fallbackNumber">
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
                    <div class="card-header" >
                        <h3>
                            Schedule Settings
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="schedulingCheck" id="schedulingCheck" value="1" type="checkbox" checked>
                                <label class="custom-control-label" for="schedulingCheck">Enable Scheduling</label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin:5px;">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="reschedulingCheck" name="reschedulingCheck" value="1" type="checkbox" checked>
                                <label class="custom-control-label" for="reschedulingCheck">Auto Reschedule To Open Hours</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label form-control-label">Maximum Months Allowed*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="number" value="3" id="maxScheduleMonth" name="maxScheduleMonth">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Inbound/Outbound Hours of Operation Settings--}}
<div class="container-fluid mt-3" >
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" >
                        <h3>
                            <strong>Inbound/Outbound Hours of Operation Settings</strong>
                        </h3>
                    </div>
                    <div class="card-body" >
                        <div class="form-group row" >
                            <div class="custom-control custom-checkbox" style="margin: 5px;">
                                <input class="custom-control-input" id="inbound_outbound" name="inOutBoundCheck" value="1" type="checkbox" checked onchange="valueChanged(this)">
                                <label class="custom-control-label" for="inbound_outbound">Use the same hours of operation for inbound/outbound calls & SMS</label>
                            </div>
                        </div>
                        <div class="row" style="margin:20px;">
                            <small>You can choose to have separate hours of operation for your inbound and outbound calls/sms. For example, this allows you to accept inbound calls while pausing outbound actions.</small><br>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Text Message--}}
    <div class="container-fluid mt-3" >
        <div class="row">
            <div class="col">
                <div class="card"> 
                    <!-- Card header -->
                    <div class="card-header" >
                        <h3>
                            <strong>Text Messages</strong>
                        </h3>
                    </div>
                    <div class="card-body" >
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Campaign Keyword*</label><br>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Enter Campaign Keyword" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Message Content*</label>
                            <div class="col-md-6">
                                <textarea class="form-control" maxlength="250" rows="4" name="message" placeholder="First Message Content" required ></textarea> 
                            </div>   
                        </div>
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
                           <small>Set the hours you would like the campaign to run. The timezone for the campaign hours is: US/Eastern</small><br>
                           <small> No calls or texts will go out before 8 am in the leads timezone, regardless of campaign hours.</small><br>
                       </div><br>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" id="monday" name="monday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Monday Open</label>
                           <div class="col-md-2" >
                               <select name="mondayOpen" class="col-md-12 select form-control float-left" id="MondayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Monday close</label>
                           <div class="col-md-2">
                               <select name="mondayClose" class="col-md-12 select form-control float-left" id="mondayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>


                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" value="1" id="tuesday" name="tuesday">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Tuesday Open</label>
                           <div class="col-md-2" >
                               <select name="tuesdayOpen" class="col-md-12 select form-control float-left" id="tuesdayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Tuesday close</label>
                           <div class="col-md-2">
                               <select name="tuesdayClose" class="col-md-12 select form-control float-left" id="tuesdayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" id="wednesday" name="wednesday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Wednesday Open</label>
                           <div class="col-md-2" >
                               <select name="wednesdayOpen" class="col-md-12 select form-control float-left" id="wednesdayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Wednesday close</label>
                           <div class="col-md-2">
                               <select name="wednesdayClose" class="col-md-12 select form-control float-left" id="wednesdayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" id="thursday" name="thursday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Thursday Open</label>
                           <div class="col-md-2" >
                               <select name="thursdayOpen" class="col-md-12 select form-control float-left" id="thursdayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Thursday close</label>
                           <div class="col-md-2">
                               <select name="thursdayClose" class="col-md-12 select form-control float-left" id="thursdayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="checked" id="friday" name="friday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Friday Open</label>
                           <div class="col-md-2" >
                               <select name="fridayOpen" class="col-md-12 select form-control float-left" id="fridayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Friday close</label>
                           <div class="col-md-2">
                               <select name="fridayClose" class="col-md-12 select form-control float-left" id="fridayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" id="saturday" name="saturday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Saturday Open</label>
                           <div class="col-md-2" >
                               <select name="saturdayOpen" class="col-md-12 select form-control float-left" id="saturdayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Saturday close</label>
                           <div class="col-md-2">
                               <select name="saturdayClose" class="col-md-12 select form-control float-left" id="saturdayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row" style="width: 100%">
                           <div class="col-md-2">
                               <label class="custom-toggle custom-toggle-success float-right">
                                   <input type="checkbox" checked="" id="sunday" name="sunday" value="1">
                                   <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                               </label>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Sunday Open</label>
                           <div class="col-md-2" >
                               <select name="sundayOpen" class="col-md-12 select form-control float-left" id="sundayOpen">
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <label class="col-md-2 col-form-label form-control-label float-right">Sunday close</label>
                           <div class="col-md-2">
                               <select name="sundayClose" class="col-md-12 select form-control float-left" id="sundayClose" >
                                   @php
                                       $time = getTimeArray();
                                   @endphp
                                   @foreach($time as $value)
                                       <option value="{{$value}}"> {{$value}}</option>
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
                            <strong>Outbound Campaign hours  </strong>
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="row" style="margin:20px;">
                            <small>Set the hours you would like the campaign to run. The timezone for the campaign hours is: US/Eastern</small><br>
                            <small> No calls or texts will go out before 8 am in the leads timezone, regardless of campaign hours.</small><br>
                        </div><br>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" id="monday" name="outMonday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Monday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outMondayOpen" class="col-md-12 select form-control float-left" id="outMondayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Monday close outbound</label>
                            <div class="col-md-2">
                                <select name="outMondayClose" class="col-md-12 select form-control float-left" id="outMondayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" value="1" name="outTuesday" id="tuesday">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outTuesdayOpen" class="col-md-12 select form-control float-left" id="outTuesdayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Tuesday close outbound</label>
                            <div class="col-md-2">
                                <select name="outTuesdayClose" class="col-md-12 select form-control float-left" id="outTuesdayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" id="wednesday" name="outWednesday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outWednesdayOpen" class="col-md-12 select form-control float-left" id="outWednesdayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Wednesday close outbound</label>
                            <div class="col-md-2">
                                <select name="outWednesdayClose" class="col-md-12 select form-control float-left" id="outWednesdayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" id="thursday" name="outThursday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outThursdayOpen" class="col-md-12 select form-control float-left" id="outThursdayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Thursday close outbound</label>
                            <div class="col-md-2">
                                <select name="outThursdayClose" class="col-md-12 select form-control float-left" id="outThursdayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="checked" id="friday" name="outFriday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outFridayOpen" class="col-md-12 select form-control float-left" id="outFridayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Friday close outbound</label>
                            <div class="col-md-2">
                                <select name="outFridayClose" class="col-md-12 select form-control float-left" id="outFridayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" id="saturday" name="outSaturday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outSaturdayOpen" class="col-md-12 select form-control float-left" id="outSaturdayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Saturday close outbound</label>
                            <div class="col-md-2">
                                <select name="outSaturdayClose" class="col-md-12 select form-control float-left" id=outSaturdayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="width: 100%">
                            <div class="col-md-2">
                                <label class="custom-toggle custom-toggle-success float-right">
                                    <input type="checkbox" checked="" id="sunday" name="outSunday" value="1">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday Open outbound</label>
                            <div class="col-md-2" >
                                <select name="outSundayOpen" class="col-md-12 select form-control float-left" id="outSundayOpen">
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2 col-form-label form-control-label float-right">Sunday close outbound</label>
                            <div class="col-md-2">
                                <select name="outSundayClose" class="col-md-12 select form-control float-left" id="outSundayClose" >
                                    @php
                                        $time = getTimeArray();
                                    @endphp
                                    @foreach($time as $value)
                                        <option value="{{$value}}"> {{$value}}</option>
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
        <button type="submit" class="btn btn-primary my-4 text-white" id="uploadForm">Next
        </button>&nbsp;&nbsp;
    </div>
</form>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){    
    $("#uploadForm").on("click", function(e){
        e.preventDefault();
        var forms = $('#form-cst').serialize();
        $.ajax({
            url: "{{route('newCampaign.store')}}",
            type: 'POST',
            data: forms,
            success:function(data) {
                id = data.id;
                var url = '{{ route("schedule", ":id") }}';
                url = url.replace(':id', id);
                window.location.href = url;   
            },
            error:function(data) {   
                if(data.responseJSON.errors.keyword){
                    toastify(data.responseJSON.errors.keyword[0],'error');
                }
                if(data.responseJSON.errors.name){
                    toastify(data.responseJSON.errors.name[0],'error');
                }
                if(data.responseJSON.errors.message){
                    toastify(data.responseJSON.errors.message[0],'error');
                }
            }
        });
    });
});
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
