@extends('layouts.main')
@section('title','Scheduling')
@section('content')
<style>
    /* slick arrows start */
    .slick-next:before {
        content: '→';
        color: #5e72e4;
    }

    .slick-prev:before {
        content: '←';
        color: #5e72e4;
    }

    /* slick arrows end */

    /* slick individual slide */
    .slick_event_btns .slick-slide {
        padding: 0 !important;
    }

    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }

    .emoji-div {
        width: 300px;
        height: auto;
        background: whitesmoke;
        border: 1px solid #dee2e6;
        cursor: pointer;
        display: none;
    }

    div#callPopup {
        height: 550px;
    }
</style>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"> Campaign Schedule</h6>
                </div>
            </div>
            <div class="row ml-2">
                <p class="text-white">Campaign: <select name="campaign" id="campaign" class="form-control">
                        {{-- <option value="">--Select--</option> --}}
                        @foreach ($allCampaigns as $allCampaign)
                        <option value="{{ $allCampaign->id }}" @if($id==$allCampaign->id) ? selected : ''
                            @endif>{{$allCampaign->name}}</option>
                        @endforeach
                    </select></p>
            </div>
            <!-- Card starts -->
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt-6">
    <div class="row">
        <div class="col">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->
                <div class="card-body">
                    <div class="row slick_event_btns" style="margin: 35px;">
                        <!-----------------Campaign ID store in a field-------------------->
                        <input type="hidden" id="campaignId" value="{{ $id }}">
                        <!------Inbound Open Hours--------->
                        <div class="col-3  text-center" style="margin-bottom: 10px;">
                            <label class="text-center text-primary">
                                Inbound Open Hours
                            </label><br>
                            <div class="dropdown">

                                <button type="button" class="in btn btn-secondary btn-round btn-icon event_btn"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleInboundOpenMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="inboundOpenMenu">
                                    <li><a class="dropdown-item" onclick="inboundOpenHoursEventCall()">Call
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!------Inbound Off Hours--------->
                        <div class="col-3  text-center" style="margin-bottom: 10px; ">
                            <label class="text-center text-primary">
                                Inbound Off Hours
                            </label><br>
                            <div class="dropdown">
                                <button type="button" class="in btn btn-secondary btn-round btn-icon event_btn"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleInboundOffMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="inboundOffMenu">
                                    <li><a class="dropdown-item" onclick="inboundOffHoursEventCall()">Call</a></li>
                                    <li><a class="dropdown-item" onclick="inboundOffHoursEventSms()">SMS</a></li>
                                </ul>
                            </div>
                        </div>
                        <!------Scheduled Call --------->
                        <div class="col-3  text-center" style="margin-bottom: 10px;">
                            <label class="text-center text-primary">
                                Scheduled Call
                            </label><br>
                            <div class="dropdown">
                                <button type="button" class="in btn btn-secondary btn-round btn-icon event_btn"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleScheduledCallMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="scheduledCallMenu">
                                    <li><a class="dropdown-item" onclick="scheduledCallEvent()">Call</a></li>
                                    <li><a class="dropdown-item" onclick="scheduledCallEventSms()">SMS</a></li>
                                    <li><a class="dropdown-item" onclick="scheduledCallEventEmail()">Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <!---------Outbound Live----------->
                        <div class="col-3 text-center" style="margin-bottom: 10px;">
                            <label class="text-center text-primary">
                                Outbound Live
                            </label><br />
                            <div class="dropdown">
                                <button type="button" class="out btn btn-secondary btn-round btn-icon event_btn"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleOutboundLiveMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="outboundLiveMenu">
                                    <li><a class="dropdown-item"
                                            onclick="getOutboundLiveEvents('OutboundLiveCall')">Call</a></li>
                                    <li><a class="dropdown-item"
                                            onclick="getOutboundLiveEvents('OutboundLiveSms')">SMS</a></li>
                                    <li><a class="dropdown-item"
                                            onclick="getOutboundLiveEvents('OutboundLiveEmail')">Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--------------------Days event------------------------>
                        @for($i=1; $i<=$maxMonths*30;$i++) <div class="col-3 text-center" style="margin-bottom: 10px; ">
                            <label class="align-self-center text-primary" id="getDayEvent{{$i}}">
                                Day {{$i}}
                            </label><br>
                            <div class="dropdown">
                                <button type="button" onclick="toggleDayMenu('{{$i}}')"
                                    class="day btn btn-secondary btn-round btn-icon event_btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="{{$i}}">
                                    <li><a class="dropdown-item"
                                            onclick="getDayEvents('DayCallEvent{{ $i }}','Call')">Call</a></li>
                                    <li><a class="dropdown-item"
                                            onclick="getDayEvents('DaySmsEvent{{ $i }}','Sms')">SMS</a></li>
                                    <li><a class="dropdown-item"
                                            onclick="getDayEvents('DayEmailEvent{{ $i }}','Email')">Email</a></li>
                                </ul>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <!---------------Assign a day value in input field--------------->
        <input type="hidden" name="assignDayValue" id="assignDayValue" value=" " />


        <!-- Inbound open hours Basic Call event-->
        <div class="modal fade" id="inboundOpenHoursBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('inboundOpenHourCallBasicStore') }}" id="inboundOpenHourCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            {{-- <input type="hidden" name="inboundOpenHourCallBasicCampaignId"
                                id="inboundOpenHourCallBasicCampaignId" value="{{ $id }}" /> --}}
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                        {{-- <i class="fas fa-spinner fa-spin" id="inboundOpenHourLoaderModal"
                                            style="font-size: 30px"></i> --}}
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="inboundOpenHoursBasicCallPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="inboundOpenHoursVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOpenHoursVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------- Transfer ---------------->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOpenHoursTransferDigit"
                                                        id="inboundOpenHoursTransferDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number"
                                                        placeholder="Transfer Number"
                                                        name="inboundOpenHoursTransferNumber"
                                                        id="inboundOpenHoursTransferNumber">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="inboundOpenHoursTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOpenHoursVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="inboundOpenHoursInScreener" value="1"
                                                            name="inboundOpenHoursEnableOptInScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="inboundOpenHoursOut" value="1"
                                                            onchange="toggleOutScreener(id,'inboundOpenHoursOutScreener')"
                                                            name="inboundOpenHoursEnableOptOutScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="inboundOpenHoursOutScreener" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="inboundOpenHoursOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#inboundOpenHoursVoiceOutScreener">Send Message
                                                    </a>
                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOpenHoursScreenTransferDigit"
                                                            id="inboundOpenHoursScreenTransferDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel" id="inboundOpenHoursStd"
                                                            name="inboundOpenHoursScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOpenHoursScreenDNCDigit"
                                                            id="inboundOpenHoursScreenDNCDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9" selected="">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOpenHoursScreenCloseDigit"
                                                            id="inboundOpenHoursScreenCloseDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOpenHoursCallBackDigit"
                                                        id="inboundOpenHoursCallBackDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="inboundOpenHoursCallBackMsg">
                                            <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                data-target="#inboundOpenHoursCallBack">Select a Message</a>
                                        </div>
                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOpenHoursDNCDigit" id="inboundOpenHoursDNCDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="inboundOpenHoursLeaveVoicemail"
                                                            value="1" name="inboundOpenHoursLeaveVoicemail">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="inboundOpenHoursEnableVisual"
                                                            value="1" name="inboundOpenHoursEnableVisual">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="inboundOpenHoursVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOpenHoursVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="delEvent('InboundOpenHourCallBasic','inbound_open_hours','inboundOpenHoursBasic')"><a>
                                                Delete </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Inbound open hours Basic Advanced event-->
        <div class="modal fade" id="inboundOpenHoursAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup" style="overflow: auto;">
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-menu" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-menu" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Inbound off hours call  Advanced event-->
        <div class="modal fade" id="inboundOffHoursAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="inboundOffHoursAdvanceCallPopup"
                                    style="overflow: auto;">
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-menu" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-menu" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inbound off hours Basic Call event-->
        <div class="modal fade" id="inboundOffHoursBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{route('inboundOffHoursCallBasicStore')}}" id="inboundOffHoursCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="inboundOffHoursBasicCallPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="inboundOffHoursVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOffHoursVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOffHoursTransferDigit"
                                                        id="inboundOffHoursTransferDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number" value=""
                                                        placeholder="Transfer Number"
                                                        name="inboundOffHoursTransferNumber"
                                                        id="inboundOffHoursTransferNumber">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="inboundOffHoursTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOffHoursVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="inboundOffHoursInScreener" value="1"
                                                            name="inboundOffHoursEnableOptInScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="inboundOffHoursOut" value="1"
                                                            onchange="toggleOutScreener(id,'inboundOffHoursOutScreener')"
                                                            name="inboundOffHoursEnableOptOutScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="inboundOffHoursOutScreener" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="inboundOffHoursOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#inboundOffHoursVoiceOutScreener">Send Message
                                                    </a>
                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOffHoursScreenTransferDigit"
                                                            id="inboundOffHoursScreenTransferDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel" id="inboundOffHoursStd"
                                                            value="" name="inboundOffHoursScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOffHoursScreenDNCDigit"
                                                            id="inboundOffHoursScreenDNCDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOffHoursScreenCloseDigit"
                                                            id="inboundOffHoursScreenCloseDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOffHoursCallBackDigit"
                                                        id="inboundOffHoursCallBackDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="inboundOffHoursCallBackMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOffHoursCallBack">Select a Message</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="inboundOffHoursDNCDigit" id="inboundOffHoursDNCDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="inboundOffHoursLeaveVoicemail"
                                                            value="1" name="inboundOffHoursLeaveVoicemail">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="inboundOffHoursEnableVisual"
                                                            value="1" name="inboundOffHoursEnableVisual">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="inboundOffHoursVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOffHoursVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="delEvent('InboundOffHourCallBasic','inbound_off_hours','inboundOffHoursBasic')"><a>
                                                Delete </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Scheduled call  Advanced event-->
        <div class="modal fade" id="scheduledCallAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="scheduledAdvanceCallPopup"
                                    style="overflow: auto;">
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-menu" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-menu" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scheduled Call Basic event-->
        <div class="modal fade" id="scheduledCallBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{route('scheduledCallBasicStore')}}" id="scheduledCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="scheduledCallBasicPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="scheduledCallBasicVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#scheduledCallBasicVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="scheduledCallBasicTransferDigit"
                                                        id="scheduledCallBasicTransferDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number" value=""
                                                        placeholder="Transfer Number"
                                                        name="scheduledCallBasicTransferNumber"
                                                        id="scheduledCallBasicTransferNumber">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="scheduledCallBasicTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#scheduledCallBasicVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="scheduledCallBasicInScreener"
                                                            value="1" name="scheduledCallBasicEnableOptInScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="scheduledCallBasicOut" value="1"
                                                            onchange="toggleOutScreener(id,'scheduledCallBasicOutScreener')"
                                                            name="scheduledCallBasicEnableOptOutScreener">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="scheduledCallBasicOutScreener" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="scheduledCallBasicOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#scheduledCallBasicVoiceOutScreener">Send Message
                                                    </a>
                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="scheduledCallBasicScreenTransferDigit"
                                                            id="scheduledCallBasicScreenTransferDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel"
                                                            id="scheduledCallBasicStd" value=""
                                                            name="scheduledCallBasicScreenTransferNumber"
                                                            id="scheduledCallBasicScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="scheduledCallBasicScreenDNCDigit"
                                                            id="scheduledCallBasicScreenDNCDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="scheduledCallBasicScreenCloseDigit"
                                                            id="scheduledCallBasicScreenCloseDigit">
                                                            <option value="">--Select--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="scheduledCallBasicCallBackDigit"
                                                        id="scheduledCallBasicCallBackDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="scheduledCallBasicCallBackMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#scheduledCallBasicCallBack">Select a Message</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="scheduledCallBasicDNCDigit"
                                                        id="scheduledCallBasicDNCDigit">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="scheduledCallBasicLeaveVoicemail"
                                                            value="1" name="scheduledCallBasicLeaveVoicemail">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="scheduledCallBasicEnableVisual"
                                                            value="1" name="scheduledCallBasicEnableVisual">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="scheduledCallBasicVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#scheduledCallBasicVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="delEvent('ScheduledCallBasic','scheduled_calls','scheduledCallBasic')"><a>
                                                Delete </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!----------scheduled call sms model---------------------------------->
        <div class="modal fade" id="scheduledSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{route('scheduledSmsStore')}}" id="scheduledSmsStore"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>SMS Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="scheduledSmsPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Message -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Message
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Enter the message to deliver to the lead. You may use macros
                                                in your message such as {first_name}.</small><br>
                                            <p>CTIA guidelines require the <b>name of the company, the reason
                                                    for the message, and opt out verbiage.</b> We strongly
                                                recommend following these requirements.</p>
                                            <br>
                                            <!----tabs bootstrap starts-->
                                            <p id="scheduled_sms_emoji_face">&#128512;</p>
                                            <div class="emoji-div" id="scheduled_sms_emoji_div">
                                                <?php
                                                    $emojis = getEmojies();
                                                    foreach ($emojis as $key => $emoji) {
                                                        echo '<span onclick="insertEmoji(this,\''.$key.'\',\'scheduledSmsMyTabContent\')">'.$key.'</span>';
                                                    }
                                                    ?>
                                            </div>
                                            <ul class="nav nav-tabs" id="scheduledSmsMyTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="scheduledSmsFirstTab1"
                                                        data-toggle="tab" href="#scheduledSmsTab1"
                                                        onclick="scheduledSmsDelLi(this.id)" role="tab"
                                                        aria-controls="home" aria-selected="true">1</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="scheduledSmsMyTabContent">
                                                <div class="tab-pane fade show active" id="scheduledSmsTab1"
                                                    role="tabpanel" aria-labelledby="first-tab1">
                                                    <textarea class="form-control textarea-control" rows="4"
                                                        placeholder="Enter your message" maxlength="160"
                                                        id="scheduledSmsMessageBody1" name="scheduledSmsMessageBody1"
                                                        onkeyup="calculateLetters(1,id,'scheduledSmsTotalLetters')"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="scheduledSmsInputTabId" value="">
                                            <input type="hidden" id="scheduledSmsInputFirstTabId" value="">

                                            <!----tabs bootstrap ends-->

                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            onclick="showUrlField('scheduledSmsUrlDiv')" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="scheduledSmsAttachFile"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Attach File </label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="scheduledSmsUrlDiv" style="display: none; ">
                                                <div class="col-12">
                                                    <input type="text" placeholder="Enter a Url" class="form-control"
                                                        name="scheduledSmsUrl" id="scheduledSmsUrl" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-slack btn-icon"
                                                        onclick="messagePreview('scheduledSmsMyTabContent')">
                                                        <span class="btn-inner--icon"><i class="fa fa-search"
                                                                aria-hidden="true"></i></span>
                                                        <span class="btn-inner--text">Preview</span>
                                                    </button>
                                                </div>
                                                <div class="col-8">
                                                    <p> This SMS will be sent as 1 message(s). Characters
                                                        remaining: <span id="scheduledSmsTotalLetters">160</span></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!---------Yes / No Actions------->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Yes / No Actions
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            onclick="showPerformActionsDiv('scheduledSmsPerformActionMessageDiv')"
                                                            id="scheduledSmsPerformActionChecked" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="scheduledSmsPerformAction"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label>Perform Action on Yes/No Sentiment(s).</label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="scheduledSmsPerformActionDiv">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"Yes" Action</label>
                                                    <select class="form-control" name="scheduledSmsYesAction"
                                                        id="scheduledSmsYesAction"
                                                        onchange="yesReplyRemove(this.value,'scheduledSmsYesReplyDiv')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"No" Action</label>
                                                    <select class="form-control" name="scheduledSmsNoAction"
                                                        id="scheduledSmsNoAction"
                                                        onchange="noReplyRemove(this.value,'scheduledSmsNoReplyDiv')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="display: none" id="scheduledSmsPerformActionMessageDiv">
                                                <div id="scheduledSmsYesReplyDiv">
                                                    <label>"Yes" Reply Message</label>
                                                    <textarea rows="2" name="scheduledSmsYesReply"
                                                        id="scheduledSmsYesReply" class="form-control"></textarea>
                                                </div>
                                                <div id="scheduledSmsNoReplyDiv">
                                                    <label>"No" Reply Message</label>
                                                    <textarea rows="2" name="scheduledSmsNoReply"
                                                        id="scheduledSmsNoReply" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-slack btn-icon"
                                        onclick="scheduledSmsNewMessage()">
                                        <span class="btn-inner--icon"><i class="fa fa-plus"
                                                aria-hidden="true"></i></span>
                                        <span class="btn-inner--text">New Message</span>
                                    </button>
                                    <button type="button" class="btn btn-youtube btn-icon"
                                        onclick="scheduledSmsDeleteTab()">
                                        <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                        <span class="btn-inner--text">Delete</span>
                                    </button>
                                </div>
                                <div>
                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!---------------scheduled call modals ends------------------------------->
        <!----------------------Outbound Live show event starts------------------------------------>
        <div class="modal fade" id="outboundLiveEvents" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="container p-5">
                            <h2 class="text-center">Events</h2>
                            <div class="row d-block">
                                <div id="outboundLiveEventShows" class="d-flex flex-wrap">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------Outbound Live show event  ends------------------------------------>
        <!--Outbound live Basic Call event-->
        <div class="modal fade" id="outboundLiveBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('outboundLiveCallStore') }}" id="outboundLiveCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="outboundLiveCallBasicEventType" value="OutboundLiveCallBasic"
                                id="outboundLiveCallBasicEventType" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="outboundLiveCallBasicPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveBasicAdvancedIVR"
                                                        class="custom-control-input" id="outboundLiveBasicAdvancedDelay"
                                                        checked="" type="radio" value="outboundLiveBasicAdvancedDelay">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveBasicAdvancedDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveBasicAdvancedIVR"
                                                        class="custom-control-input"
                                                        id="outboundLiveBasicAdvancedSchedule" type="radio"
                                                        value="outboundLiveBasicAdvancedSchedule">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveBasicAdvancedSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Live Delay -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Delay</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the number of minutes to wait before making a call to a newly
                                                posted lead.</p><br>
                                            <select name="outboundLiveBasicCallLiveDelay" class="select form-control">

                                                <option value="No Delay - Closed Hours" style="display: none;">No Delay
                                                    - Closed Hours
                                                </option>

                                                <option value="No Delay - Open Hours" selected="selected">No Delay -
                                                    Open Hours</option>

                                                <option value="1 Minute Delay">1 Minute Delay</option>

                                                <option value="2 Minute Delay">2 Minute Delay</option>

                                                <option value="3 Minute Delay">3 Minute Delay</option>

                                                <option value="4 Minute Delay">4 Minute Delay</option>

                                                <option value="5 Minute Delay">5 Minute Delay</option>

                                                <option value="6 Minute Delay">6 Minute Delay</option>

                                                <option value="7 Minute Delay">7 Minute Delay</option>

                                                <option value="8 Minute Delay">8 Minute Delay</option>

                                                <option value="9 Minute Delay">9 Minute Delay</option>

                                                <option value="10 Minute Delay">10 Minute Delay</option>

                                                <option value="11 Minute Delay">11 Minute Delay</option>

                                                <option value="12 Minute Delay">12 Minute Delay</option>

                                                <option value="13 Minute Delay">13 Minute Delay</option>

                                                <option value="14 Minute Delay">14 Minute Delay</option>

                                                <option value="15 Minute Delay">15 Minute Delay</option>

                                                <option value="25 Minute Delay">25 Minute Delay</option>

                                                <option value="30 Minute Delay">30 Minute Delay</option>

                                                <option value="45 Minute Delay">45 Minute Delay</option>

                                                <option value="60 Minute Delay">60 Minute Delay</option>

                                                <option value="75 Minute Delay">75 Minute Delay</option>

                                                <option value="85 Minute Delay">85 Minute Delay</option>

                                                <option value="90 Minute Delay">90 Minute Delay</option>

                                                <option value="120 Minute Delay">120 Minute Delay</option>

                                                <option value="180 Minute Delay">180 Minute Delay</option>

                                                <option value="240 Minute Delay">240 Minute Delay</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="outboundLiveVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#outboundLiveVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicTransferDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number"
                                                        placeholder="Transfer Number"
                                                        name="outboundLiveCallBasicTransferNumber">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="outboundLiveTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#outboundLiveVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" name="outboundLiveCallBasicIn"
                                                            id="outboundLiveCallBasicIn" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" name="outboundLiveCallBasicOut"
                                                            id="outboundLiveCallBasicOut" value="1"
                                                            onchange="toggleOutScreener(id,'outboundLiveCallBasicOutScreener')">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="outboundLiveCallBasicOutScreener" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="outboundLiveOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#outboundLiveVoiceOutScreener">Send Message </a>
                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenTransferDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel"
                                                            name="outboundLiveCallBasicScreenTransferNumber"
                                                            id="outboundLiveCallBasicScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenDNCDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenCloseDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicCallBackDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="outboundLiveCallBackMsg">
                                            <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                data-target="#outboundLiveCallBack">Select a Message</a>
                                        </div>
                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicDNCDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="outboundLiveCallBasicLeaveVoicEmail"
                                                            name="outboundLiveCallBasicLeaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="outboundLiveCallBasicEnableVisual"
                                                            name="outboundLiveCallBasicEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="outboundLiveVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#outboundLiveVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Outbound live Basic Call event-->
        <div class="modal fade" id="editOutboundLiveBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('editOutboundLiveCallStore') }}" id="editOutboundLiveCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="outboundLiveCallBasicEventType" value="OutboundLiveCallBasic"
                                id="outboundLiveCallBasicEventType" />
                            <input type="hidden" name="outboundLiveCallBasicEventId" id="outboundLiveCallBasicEventId"
                                value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="editOutboundLiveCallBasicPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveBasicAdvancedIVR"
                                                        class="custom-control-input"
                                                        id="editOutboundLiveBasicAdvancedDelay" checked="" type="radio"
                                                        value="outboundLiveBasicAdvancedDelay">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveBasicAdvancedDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveBasicAdvancedIVR"
                                                        class="custom-control-input"
                                                        id="editOutboundLiveBasicAdvancedSchedule" type="radio"
                                                        value="outboundLiveBasicAdvancedSchedule">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveBasicAdvancedSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Live Delay -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Delay</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the number of minutes to wait before making a call to a newly
                                                posted lead.</p><br>
                                            <select name="outboundLiveBasicCallLiveDelay" class="select form-control"
                                                id="editOutboundLiveBasicCallLiveDelay">

                                                <option value="No Delay - Closed Hours" style="display: none;">No Delay
                                                    - Closed Hours
                                                </option>

                                                <option value="No Delay - Open Hours" selected="selected">No Delay -
                                                    Open Hours</option>

                                                <option value="1 Minute Delay">1 Minute Delay</option>

                                                <option value="2 Minute Delay">2 Minute Delay</option>

                                                <option value="3 Minute Delay">3 Minute Delay</option>

                                                <option value="4 Minute Delay">4 Minute Delay</option>

                                                <option value="5 Minute Delay">5 Minute Delay</option>

                                                <option value="6 Minute Delay">6 Minute Delay</option>

                                                <option value="7 Minute Delay">7 Minute Delay</option>

                                                <option value="8 Minute Delay">8 Minute Delay</option>

                                                <option value="9 Minute Delay">9 Minute Delay</option>

                                                <option value="10 Minute Delay">10 Minute Delay</option>

                                                <option value="11 Minute Delay">11 Minute Delay</option>

                                                <option value="12 Minute Delay">12 Minute Delay</option>

                                                <option value="13 Minute Delay">13 Minute Delay</option>

                                                <option value="14 Minute Delay">14 Minute Delay</option>

                                                <option value="15 Minute Delay">15 Minute Delay</option>

                                                <option value="25 Minute Delay">25 Minute Delay</option>

                                                <option value="30 Minute Delay">30 Minute Delay</option>

                                                <option value="45 Minute Delay">45 Minute Delay</option>

                                                <option value="60 Minute Delay">60 Minute Delay</option>

                                                <option value="75 Minute Delay">75 Minute Delay</option>

                                                <option value="85 Minute Delay">85 Minute Delay</option>

                                                <option value="90 Minute Delay">90 Minute Delay</option>

                                                <option value="120 Minute Delay">120 Minute Delay</option>

                                                <option value="180 Minute Delay">180 Minute Delay</option>

                                                <option value="240 Minute Delay">240 Minute Delay</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="editOutboundLiveVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editOutboundLiveVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicTransferDigit"
                                                        id="editOutboundLiveCallBasicTransferDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number"
                                                        placeholder="Transfer Number"
                                                        name="outboundLiveCallBasicTransferNumber"
                                                        id="editOutboundLiveCallBasicTransferNumber">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="editOutboundLiveTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editOutboundLiveVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" name="outboundLiveCallBasicIn"
                                                            id="editOutboundLiveCallBasicIn" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" id="editOutboundLiveCallBasicOut"
                                                            name="outboundLiveCallBasicOut" value="1"
                                                            onchange="toggleOutScreener(id,'editOutboundLiveCallBasicOutScreener')">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editOutboundLiveCallBasicOutScreener" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="editOutboundLiveOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#editOutboundLiveVoiceOutScreener">Send Message
                                                    </a>

                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenTransferDigit"
                                                            id="editOutboundLiveCallBasicScreenTransferDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel"
                                                            name="outboundLiveCallBasicScreenTransferNumber"
                                                            id="editOutboundLiveCallBasicScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenDNCDigit"
                                                            id="editOutboundLiveCallBasicScreenDNCDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="outboundLiveCallBasicScreenCloseDigit"
                                                            id="editOutboundLiveCallBasicScreenCloseDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicCallBackDigit"
                                                        id="editOutboundLiveCallBasicCallBackDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editOutboundLiveCallBackMsg">
                                            <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                data-target="#editOutboundLiveCallBack">Select a Message</a>
                                        </div>
                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="outboundLiveCallBasicDNCDigit"
                                                        id="editOutboundLiveCallBasicDNCDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            id="editOutboundLiveCallBasicLeaveVoicEmail"
                                                            name="outboundLiveCallBasicLeaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            id="editOutboundLiveCallBasicEnableVisual"
                                                            name="outboundLiveCallBasicEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editOutboundLiveVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editOutboundLiveVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Outbound live Advanced call event-->
        <div class="modal fade" id="outboundLiveAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('outboundLiveCallStore') }}" id="outboundLiveCallAdvanceForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="outboundLiveCallAdvancedEventType"
                                value="OutboundLiveCallAdvanced" id="outboundLiveCallAdvancedEventType" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="outboundLiveCallAdvancedPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveAdvancedIVR" class="custom-control-input"
                                                        id="outboundLiveAdvancedDelay" checked="" type="radio"
                                                        value="outboundLiveAdvancedDelay">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveAdvancedDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveAdvancedIVR" class="custom-control-input"
                                                        id="outboundLiveAdvancedSchedule" type="radio"
                                                        value="outboundLiveAdvancedSchedule">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveAdvancedSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Live Delay -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Delay</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the number of minutes to wait before making a call to a newly
                                                posted lead.</p><br>
                                            <select name="outboundLiveCallAdvancedLivedelay"
                                                class="select form-control">

                                                <option value="No Delay - Closed Hours" style="display: none;">No Delay
                                                    - Closed Hours
                                                </option>

                                                <option value="No Delay - Open Hours" selected="selected">No Delay -
                                                    Open Hours</option>

                                                <option value="1 Minute Delay">1 Minute Delay</option>

                                                <option value="2 Minute Delay">2 Minute Delay</option>

                                                <option value="3 Minute Delay">3 Minute Delay</option>

                                                <option value="4 Minute Delay">4 Minute Delay</option>

                                                <option value="5 Minute Delay">5 Minute Delay</option>

                                                <option value="6 Minute Delay">6 Minute Delay</option>

                                                <option value="7 Minute Delay">7 Minute Delay</option>

                                                <option value="8 Minute Delay">8 Minute Delay</option>

                                                <option value="9 Minute Delay">9 Minute Delay</option>

                                                <option value="10 Minute Delay">10 Minute Delay</option>

                                                <option value="11 Minute Delay">11 Minute Delay</option>

                                                <option value="12 Minute Delay">12 Minute Delay</option>

                                                <option value="13 Minute Delay">13 Minute Delay</option>

                                                <option value="14 Minute Delay">14 Minute Delay</option>

                                                <option value="15 Minute Delay">15 Minute Delay</option>

                                                <option value="25 Minute Delay">25 Minute Delay</option>

                                                <option value="30 Minute Delay">30 Minute Delay</option>

                                                <option value="45 Minute Delay">45 Minute Delay</option>

                                                <option value="60 Minute Delay">60 Minute Delay</option>

                                                <option value="75 Minute Delay">75 Minute Delay</option>

                                                <option value="85 Minute Delay">85 Minute Delay</option>

                                                <option value="90 Minute Delay">90 Minute Delay</option>

                                                <option value="120 Minute Delay">120 Minute Delay</option>

                                                <option value="180 Minute Delay">180 Minute Delay</option>

                                                <option value="240 Minute Delay">240 Minute Delay</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="javascript:void(0)"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-forms" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-forms" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            id="outboundLiveCallAdvancedLeaveVoicEmail"
                                                            name="outboundLiveCallAdvancedLeaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="outboundLiveCallAdvancedEnableVisual"
                                                            name="outboundLiveCallAdvancedEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="outboundLiveAdvanceVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#outboundLiveAdvanceVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Outbound live Advanced call event-->
        <div class="modal fade" id="editOutboundLiveAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('editOutboundLiveCallStore') }}" id="editOutboundLiveCallAdvanceForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="outboundLiveCallAdvancedEventType"
                                value="OutboundLiveCallAdvanced" id="outboundLiveCallAdvancedEventType" />
                            <input type="hidden" name="outboundLiveCallAdvancedEventId"
                                id="outboundLiveCallAdvancedEventId" value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="editOutboundLiveCallAdvancedPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveAdvancedIVR" class="custom-control-input"
                                                        id="editOutboundLiveAdvancedDelay" checked="" type="radio"
                                                        value="outboundLiveAdvancedDelay">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveAdvancedDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="outboundLiveAdvancedIVR" class="custom-control-input"
                                                        id="editOutboundLiveAdvancedSchedule" type="radio"
                                                        value="outboundLiveAdvancedSchedule">
                                                    <label class="custom-control-label"
                                                        for="outboundLiveAdvancedSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Live Delay -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Delay</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the number of minutes to wait before making a call to a newly
                                                posted lead.</p><br>
                                            <select name="outboundLiveCallAdvancedLivedelay"
                                                id="editOutboundLiveCallAdvancedLivedelay" class="select form-control">

                                                <option value="No Delay - Closed Hours" style="display: none;">No Delay
                                                    - Closed Hours
                                                </option>

                                                <option value="No Delay - Open Hours" selected="selected">No Delay -
                                                    Open Hours</option>

                                                <option value="1 Minute Delay">1 Minute Delay</option>

                                                <option value="2 Minute Delay">2 Minute Delay</option>

                                                <option value="3 Minute Delay">3 Minute Delay</option>

                                                <option value="4 Minute Delay">4 Minute Delay</option>

                                                <option value="5 Minute Delay">5 Minute Delay</option>

                                                <option value="6 Minute Delay">6 Minute Delay</option>

                                                <option value="7 Minute Delay">7 Minute Delay</option>

                                                <option value="8 Minute Delay">8 Minute Delay</option>

                                                <option value="9 Minute Delay">9 Minute Delay</option>

                                                <option value="10 Minute Delay">10 Minute Delay</option>

                                                <option value="11 Minute Delay">11 Minute Delay</option>

                                                <option value="12 Minute Delay">12 Minute Delay</option>

                                                <option value="13 Minute Delay">13 Minute Delay</option>

                                                <option value="14 Minute Delay">14 Minute Delay</option>

                                                <option value="15 Minute Delay">15 Minute Delay</option>

                                                <option value="25 Minute Delay">25 Minute Delay</option>

                                                <option value="30 Minute Delay">30 Minute Delay</option>

                                                <option value="45 Minute Delay">45 Minute Delay</option>

                                                <option value="60 Minute Delay">60 Minute Delay</option>

                                                <option value="75 Minute Delay">75 Minute Delay</option>

                                                <option value="85 Minute Delay">85 Minute Delay</option>

                                                <option value="90 Minute Delay">90 Minute Delay</option>

                                                <option value="120 Minute Delay">120 Minute Delay</option>

                                                <option value="180 Minute Delay">180 Minute Delay</option>

                                                <option value="240 Minute Delay">240 Minute Delay</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="javascript:void(0)"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-forms" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-forms" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            id="editOutboundLiveCallAdvancedLeaveVoicEmail"
                                                            name="outboundLiveCallAdvancedLeaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox"
                                                            id="editOutboundLiveCallAdvancedEnableVisual"
                                                            name="outboundLiveCallAdvancedEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editOutboundLiveAdvanceVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editOutboundLiveAdvanceVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Basic Call for days event-->
        <div class="modal fade" id="dayCallBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{url('dayEventStore')}}" id="dayCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="dayCallBasicEventType" value="" id="dayCallBasicEventType" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="dayCallBasicPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="schedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="voiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#voice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="transferDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number" name="transferNumber"
                                                        placeholder="Transfer Number">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="transferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#voiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" name="enableOptInScreener" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" value="1" name="enableOptOutScreener"
                                                            id="enableOptOutScreener"
                                                            onchange="toggleOutScreener(id,'enableOptOutScreenerDiv')">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="enableOptOutScreenerDiv" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="outScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#voiceOutScreener">Send Message </a>

                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenTransferDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel"
                                                            name="screenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenDncDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9" selected="">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenCloseDigit">
                                                            <option value="1">1</option>
                                                            <option value="2" selected="">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="callBackDigit">
                                                        <option value="1">1</option>
                                                        <option value="2" selected="">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="callBackMsg">
                                            <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                data-target="#callBack">Select a Message</a>
                                        </div>
                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="dncDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9" selected="">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" name="leaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" name="enableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="voiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#voiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Basic Call for days event-->
        <div class="modal fade" id="editDayCallBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{url('editDayEventStore')}}" id="editDayCallBasicForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="editDayCallBasicEventType" value="DayCallBasic"
                                id="editDayCallBasicEventType" />
                            <input type="hidden" name="editDayCallBasicEventId" id="editDayCallBasicEventId" value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="editDayCallBasicPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="schedulingTime" id="editSchedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> Live Audio</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the message that is played when the phone is answered.
                                                Remember to mention the Transfer and Do Not Call options and
                                                digits in this message.</p><br>
                                            <div id="editVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editVoice">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Transfer -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Transfer</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter a phone number to transfer the call to when the Transfer
                                                digit is pressed.</p><br>
                                            <label> Transfer Digit</label><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="transferDigit" id="editTransferDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="number" name="transferNumber"
                                                        id="editTransferNumber" placeholder="Transfer Number">
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                <strong>Optional:</strong> Select an audio file to play when the
                                                Transfer digit is pressed.
                                            </p>
                                            <div id="editTransferVoiceMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editVoiceTransfer">Select a Message</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" name="enableOptInScreener"
                                                            id="editEnableOptInScreener" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt In Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="custom-toggle custom-toggle-success float-right">
                                                        <input type="checkbox" value="1" name="enableOptOutScreener"
                                                            id="editEnableOptOutScreener"
                                                            onchange="toggleOutScreener(id,'editEnableOptOutScreenerDiv')">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editEnableOptOutScreenerDiv" style="display: none;">
                                                <small>
                                                    <strong>Optional:</strong> Select an audio file to play.
                                                </small><br>
                                                <div id="editOutScreenVoiceMsg">
                                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                                        data-target="#editVoiceOutScreener">Send Message </a>

                                                </div>
                                                <div>
                                                    <label>Screen Transfer Digit</label><br>
                                                </div>
                                                <div class="row">

                                                    <div class="col-4">
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenTransferDigit" id="editScreenTransferDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="tel"
                                                            name="screenTransferNumber" id="editScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenDncDigit" id="editScreenDncDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen Close Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="screenCloseDigit" id="editScreenCloseDigit">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Call Back -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4>
                                                Call Back
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Select the message that is played when the Callback digit is
                                                pressed. This message informs the customer that they will
                                                receive a text message to schedule a callback</small>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> Callback Digit</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="callBackDigit" id="editCallBackDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editCallBackMsg">
                                            <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                data-target="#editCallBack">Select a Message</a>
                                        </div>
                                    </div>
                                    <!-- DNC -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                DNC
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>
                                                The Do Not Call Digit will add the caller to the Do Not Call
                                                list
                                            </small><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-control-label"> DNC Digits</label>
                                                    <select class="col-md-12 select form-control float-left"
                                                        name="dncDigit" id="editDncDigit">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" name="leaveVoicEmail"
                                                            id="editLeaveVoicEmail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" name="enableVisual" id="editEnableVisual"
                                                            value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Advanced call for days event-->
        <div class="modal fade" id="dayCallAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{url('dayEventStore')}}" id="dayCallAdvanceForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="dayCallAdvanceEventType" value="" id="dayCallAdvanceEventType" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="dayEventCallAdvancedPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="dayCallAdvancedIVR" class="custom-control-input"
                                                        id="dayCallDelay" checked="" type="radio" value="delay">
                                                    <label class="custom-control-label" for="dayCallDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="dayCallAdvancedIVR" class="custom-control-input"
                                                        id="dayCallSchedule" type="radio" value="schedule">
                                                    <label class="custom-control-label" for="dayCallSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="schedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="javascript:void(0)"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-forms" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-forms" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="dayCallAdvancedLeaveVoicemail"
                                                            name="dayCallAdvancedLeaveVoicemail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="dayCallAdvancedEnableVisual"
                                                            name="dayCallAdvancedEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="advanceVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#advanceVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Advanced call for days event-->
        <div class="modal fade" id="editDayCallAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{url('editDayEventStore')}}" id="editDayCallAdvanceForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf

                            <input type="hidden" name="editDayCallAdvanceEventId" id="editDayCallAdvanceEventId"
                                value="" />
                            <input type="hidden" name="editDayCallAdvanceEventType" value="DayCallAdvance"
                                id="editDayCallAdvanceEventType" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Advanced IVR
                                            Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="dayEventCallAdvancedPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Time Scheduling -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="dayCallAdvancedIVR" class="custom-control-input"
                                                        id="editDayCallDelay" checked="" type="radio" value="delay">
                                                    <label class="custom-control-label"
                                                        for="editDayCallDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="dayCallAdvancedIVR" class="custom-control-input"
                                                        id="editDayCallSchedule" type="radio" value="schedule">
                                                    <label class="custom-control-label" for="editDayCallSchedule">
                                                        Schedule</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="schedulingTime" id="editDayAdvanceSchedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--Icons with names-->
                                    <div class="well">
                                        <a href="javascript:void(0)"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="menu" style="touch-action: none;"><i
                                                class="fa fa-fw fa-bars"></i>Menu</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="play" style="touch-action: none;"><i
                                                class="fa fa-fw fa-play"></i>Play</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="say" style="touch-action: none;"><i
                                                class="fa fa-fw fa-volume-up"></i>Say</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="keypress"><i class="fa fa-fw fa-th"></i>Keypress</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="transfer"><i class="fa fa-fw fa-arrow-right"></i> Transfer</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="sms"><i class="fa fa-fw fa-comment"></i>SMS</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="dnc"><i class="fa fa-fw fa-ban"></i>DNC</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="close"><i class="fa fa-fw fa-check-square-o"></i>Close</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="record" style="touch-action: none;"><i
                                                class="fa fa-fw fa-microphone"></i>Record</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="listen" style="touch-action: none;"><i
                                                class="fa fa-fw fa-phone"></i>Listen</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="goto" style="touch-action: none;"><i
                                                class="fa fa-fw fa-angle-double-right"></i>Goto</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="hangup"><i class="fa fa-fw fa-times"></i>Hangup</a>
                                        <a href="#"
                                            class="drag draggable btn btn-rounded btn-sm ui-draggable ui-draggable-handle"
                                            type="webhook" style="touch-action: none;"><i
                                                class="fa fa-fw fa-code"></i>Webhook</a>
                                    </div>
                                    <p class="text-center">Drag and Drop Below &nbsp;<i class="fa fa-arrow-down"></i>
                                    </p>
                                    <div class="well jstree jstree-4 jstree-default jstree-leaf" id="jstree_div"
                                        role="tree" tabindex="0" aria-activedescendant="j1_3" aria-busy="false">
                                        <li class="nav-item" style="list-style-type: none">
                                            <a class="nav-link " href="#navbar-forms" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="navbar-forms">
                                                <i class="ni ni-align-left-2"></i>
                                                <span class="nav-link-text">Menu</span>
                                            </a>
                                            <div class="collapse" id="navbar-forms" style="margin-left: 10%">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <i class="ni ni-bullet-list-67"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Keypress</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="ni ni-button-play"></i>
                                                        <a href="javascript:void(0)" class="nav-link ">Play</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </div>
                                    <!-- Voice Mail -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Voicemail
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Turning the Voicemail Feature on Allows you to Select the
                                                message that is played when an Answering Machine is reached.
                                                Enhanced AMD will be used and the cost is $0.0055 per call. US &
                                                Canada Only.</small><br>
                                            <br>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="editDayCallAdvancedLeaveVoicemail"
                                                            name="dayCallAdvancedLeaveVoicemail" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Leave Voicemail On Answering Machines. </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <small>
                                                    This will say the callback number at the end of the
                                                    voicemail to enable click to call inside of visual
                                                    voicemail.
                                                </small>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="editDayCallAdvancedEnableVisual"
                                                            name="dayCallAdvancedEnableVisual" value="1">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Enable Visual Voicemail Click To Call </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="editAdvanceVoiceMailMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#editAdvanceVoiceMail">Select a Message</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--sms modal day event-->
        <div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('dayEventStore') }}" id="daySmsForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="daySmsEventType" id="daySmsEventType" value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>SMS Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="daySmsPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- SMS Scheduling -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="SchedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Message
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Enter the message to deliver to the lead. You may use macros
                                                in your message such as {first_name}.</small><br>
                                            <p>CTIA guidelines require the <b>name of the company, the reason
                                                    for the message, and opt out verbiage.</b> We strongly
                                                recommend following these requirements.</p>
                                            <br>
                                            <!----tabs bootstrap starts-->
                                            <p id="emoji-face">&#128512;</p>
                                            <div class="emoji-div" id="emoji-div">
                                                <?php
                                                        $emojis = getEmojies();
                                                        foreach ($emojis as $key => $emoji) {
                                                            echo '<span onclick="insertEmoji(this,\''.$key.'\',\'myTabContent\')">'.$key.'</span>';

                                                        }
                                                        ?>
                                            </div>
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="first-tab1" data-toggle="tab"
                                                        href="#tab1" onclick="delLi(this.id)" role="tab"
                                                        aria-controls="home" aria-selected="true">1</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                                    aria-labelledby="first-tab1">
                                                    <textarea class="form-control textarea-control" rows="4"
                                                        placeholder="Enter your message" maxlength="160"
                                                        id="messageBody1" name="messageBody1"
                                                        onkeyup="calculateLetters(1,id,'total_letters')"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="input_tab_id" value="">
                                            <input type="hidden" id="input_first_tab_id" value="">

                                            <!----tabs bootstrap ends-->

                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="" value="1"
                                                            onclick="showUrlField('url_div')" name="AttachFile" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="attachFile"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Attach File </label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="url_div" style="display: none; ">
                                                <div class="col-12">
                                                    <input type="text" placeholder="Enter a Url" class="form-control"
                                                        name="smsUrl" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <button onclick="messagePreview('myTabContent')" type="button"
                                                        class="btn btn-slack btn-icon">
                                                        <span class="btn-inner--icon"><i class="fa fa-search"
                                                                aria-hidden="true"></i></span>
                                                        <span class="btn-inner--text">Preview</span>
                                                    </button>
                                                </div>
                                                <div class="col-8">
                                                    <p> This SMS will be sent as 1 message(s). Characters
                                                        remaining: <span id="total_letters">160</span></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!---------Yes / No Actions------->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Yes / No Actions
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" onclick="showPerformActionsDiv('perform_action_message_div')"
                                                            name="smsPerformAction" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="performAction"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label>Perform Action on Yes/No Sentiment(s).</label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="perform_action_div">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"Yes" Action</label>
                                                    <select class="form-control" name="smsYesAction" id="yes_action"
                                                        onchange="yesReplyRemove(this.value,'yes_reply_div')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"No" Action</label>
                                                    <select class="form-control" name="smsNoAction" id="no_action"
                                                        onchange="noReplyRemove(this.value,'no_reply_div')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="display: none" id="perform_action_message_div">
                                                <div id="yes_reply_div">
                                                    <label>"Yes" Reply Message</label>
                                                    <textarea rows="2" name="smsYesReply"
                                                        class="form-control"></textarea>
                                                </div>
                                                <div id="no_reply_div">
                                                    <label>"No" Reply Message</label>
                                                    <textarea rows="2" name="smsNoReply"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-slack btn-icon" onclick="newMessage()">
                                        <span class="btn-inner--icon"><i class="fa fa-plus"
                                                aria-hidden="true"></i></span>
                                        <span class="btn-inner--text">New Message</span>
                                    </button>
                                    <button type="button" class="btn btn-youtube btn-icon" onclick="deleteTab()">
                                        <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                        <span class="btn-inner--text">Delete</span>
                                    </button>
                                </div>
                                <div>
                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--edit sms modal day event-->
        <div class="modal fade" id="editSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{url('editDayEventStore')}}" id="editDaySmsForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="editDaySmsEventType" id="editDaySmsEventType" value="DaySms" />
                            <input type="hidden" name="editDaySmsEventId" id="editDaySmsEventId" value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>SMS Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="daySmsPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- SMS Scheduling -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="SchedulingTime" id="editDaySchedulingTime"
                                                class="col-md-12 select form-control float-left">
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Message
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <small>Enter the message to deliver to the lead. You may use macros
                                                in your message such as {first_name}.</small><br>
                                            <p>CTIA guidelines require the <b>name of the company, the reason
                                                    for the message, and opt out verbiage.</b> We strongly
                                                recommend following these requirements.</p>
                                            <br>
                                            <!----tabs bootstrap starts-->
                                            <p id="edit_sms_emoji-face">&#128512;</p>
                                            <div class="emoji-div" id="edit_sms_emoji-div">
                                                <?php
                                                        $emojis = getEmojies();
                                                        foreach ($emojis as $key => $emoji) {
                                                            echo '<span onclick="insertEmoji(this,\''.$key.'\',\'edit_sms_myTabContent\')">'.$key.'</span>';

                                                        }
                                                        ?>
                                            </div>
                                            <ul class="nav nav-tabs" id="edit_sms_myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="edit_sms_first-tab1"
                                                        data-toggle="tab" href="#edit_sms_tab1" onclick="editDelLi(this.id)"
                                                        role="tab" aria-controls="home" aria-selected="true">1</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="edit_sms_myTabContent">
                                                <div class="tab-pane fade show active" id="edit_sms_tab1"
                                                    role="tabpanel" aria-labelledby="first-tab1">
                                                    <textarea class="form-control textarea-control" rows="4"
                                                        placeholder="Enter your message" maxlength="160"
                                                        id="edit_sms_messageBody1" name="messageBody1"
                                                        onkeyup="calculateLetters(1,id,'edit_sms_total_letters')"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="edit_sms_input_tab_id" value="">
                                            <input type="hidden" id="edit_sms_input_first_tab_id" value="">

                                            <!----tabs bootstrap ends-->

                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" id="edit_sms_attach_file" value="1"
                                                            onclick="showUrlField('edit_sms_url_div')"
                                                            name="AttachFile" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="attachFile"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> Attach File </label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="edit_sms_url_div" style="display: none; ">
                                                <div class="col-12">
                                                    <input type="text" placeholder="Enter a Url" class="form-control"
                                                        name="smsUrl" id="edit_sms_smsUrl" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <button onclick="messagePreview('edit_sms_myTabContent')"
                                                        type="button" class="btn btn-slack btn-icon">
                                                        <span class="btn-inner--icon"><i class="fa fa-search"
                                                                aria-hidden="true"></i></span>
                                                        <span class="btn-inner--text">Preview</span>
                                                    </button>
                                                </div>
                                                <div class="col-8">
                                                    <p> This SMS will be sent as 1 message(s). Characters
                                                        remaining: <span id="edit_sms_total_letters">160</span></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!---------Yes / No Actions------->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Yes / No Actions
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row pt-3">
                                                <div class="col-2">
                                                    <label class="custom-toggle custom-toggle-success float-left">
                                                        <input type="checkbox" onclick="showPerformActionsDiv('edit_sms_perform_action_message_div')"
                                                            name="smsPerformAction" id="edit_sms_smsPerformAction" />
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"
                                                            id="performAction"></span>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label>Perform Action on Yes/No Sentiment(s).</label>
                                                </div>
                                            </div>
                                            <div class="row pb-3" id="perform_action_div">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"Yes" Action</label>
                                                    <select class="form-control" name="smsYesAction"
                                                        id="edit_sms_yes_action" onchange="yesReplyRemove(this.value,'edit_sms_yes_reply_div')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>"No" Action</label>
                                                    <select class="form-control" name="smsNoAction"
                                                        id="edit_sms_no_action" onchange="noReplyRemove(this.value,'edit_sms_no_reply_div')">
                                                        <option value="Do Nothing">Do Nothing</option>
                                                        <option value="Call Now">Call Now</option>
                                                        <option value="Close">Close</option>
                                                        <option value="DNC">DNC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="display: none" id="edit_sms_perform_action_message_div">
                                                <div id="edit_sms_yes_reply_div">
                                                    <label>"Yes" Reply Message</label>
                                                    <textarea rows="2" name="smsYesReply" id="edit_smsYesReply"
                                                        class="form-control"></textarea>
                                                </div>
                                                <div id="edit_sms_no_reply_div">
                                                    <label>"No" Reply Message</label>
                                                    <textarea rows="2" name="smsNoReply" id="edit_smsNoReply"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-slack btn-icon" onclick="editNewMessage()">
                                        <span class="btn-inner--icon"><i class="fa fa-plus"
                                                aria-hidden="true"></i></span>
                                        <span class="btn-inner--text">New Message</span>
                                    </button>
                                    <button type="button" class="btn btn-youtube btn-icon" onclick="editDeleteTab()">
                                        <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                        <span class="btn-inner--text">Delete</span>
                                    </button>
                                </div>
                                <div>
                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--email modal day event-->
        <div class="modal fade" id="dayEmailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('dayEventStore') }}" id="dayEmailForm"
                            onsubmit="schedulingEventFormHandler(event)">
                            @csrf
                            <input type="hidden" name="dayEmailEventType" id="dayEmailEventType" value="" />
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Email Settings</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Email Scheduling -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4> Scheduling</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Select the time that you would like the call to be attempted
                                                using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                                lead's timezone and not your call centers timezone.</p><br>
                                            <select name="schedulingTime"
                                                class="col-md-12 select form-control float-left"
                                                >
                                                @php
                                                $times = getTimeArray();
                                                @endphp
                                                @foreach($times as $key=>$value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Message -->
                                    <div class="card">
                                        <div class="card-header" style="height: 50px;">
                                            <h4>
                                                Compose
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <label>Subject:</label>
                                            <input class="form-control" name="dayEmailSubject" type="text"
                                                placeholder="Hello {first_name}" />

                                            <label>Message:</label>
                                            <textarea class="form-control" rows="6" name="dayEmailMessage"
                                                placeholder="Type in your message here. Basic HTML formatting is supported"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <div>
                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!--edit email modal day event-->
        <div class="modal fade" id="editDayEmailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
         aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                    <form action="{{url('editDayEventStore')}}" id="editDayEmailForm"
                    onsubmit="schedulingEventFormHandler(event)">
                    @csrf
                    <input type="hidden" name="editDayEmailEventType" id="editDayEmailEventType" value="DayEmail" />
                    <input type="hidden" name="editDayEmailEventId" id="editDayEmailEventId" value="" />
                         <div class="card bg-secondary border-0 mb-0">
                             <div class="card-header pb-0">
                                 <div class="text-darker text-lg text-center mt-2 mb-3">
                                     <h2>Email Settings</h2>
                                 </div>
                             </div>
                             <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup"
                                 style="overflow: auto; height: 630px;">
                                 <!-- Email Scheduling -->
                                 <div class="card">
                                     <div class="card-header" style="height: 50px;">
                                         <h4> Scheduling</h4>
                                     </div>
                                     <div class="card-body">
                                         <p>Select the time that you would like the call to be attempted
                                             using the <b>24 Hour Clock</b> below. Note: calls are attempted per the
                                             lead's timezone and not your call centers timezone.</p><br>
                                         <select name="schedulingTime" id="editSchedulingTime"
                                             class="col-md-12 select form-control float-left"
                                             >
                                             @php
                                             $times = getTimeArray();
                                             @endphp
                                             @foreach($times as $key=>$value)
                                             <option value="{{$key}}"> {{$value}} </option>
                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 <!-- Message -->
                                 <div class="card">
                                     <div class="card-header" style="height: 50px;">
                                         <h4>
                                             Compose
                                         </h4>
                                     </div>
                                     <div class="card-body">
                                         <label>Subject:</label>
                                         <input class="form-control" name="dayEmailSubject" id="editDayEmailSubject" type="text"
                                             placeholder="Hello {first_name}" />

                                         <label>Message:</label>
                                         <textarea class="form-control" rows="6" name="dayEmailMessage" id="editDayEmailMessage"
                                             placeholder="Type in your message here. Basic HTML formatting is supported"></textarea>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end">
                             <div>
                                 <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                 <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    </div>
    @include('admin.console.soundModels')
    <!-------inbound off hours sms modal------------>
    <div class="modal fade" id="inboundOffHoursSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('inboundOffHourSmsStore') }}" id="inboundOffHourSmsForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf

                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>SMS Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Message
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <small>Enter the message to deliver to the lead. You may use macros
                                            in your message such as {first_name}.</small><br>
                                        <p>CTIA guidelines require the <b>name of the company, the reason
                                                for the message, and opt out verbiage.</b> We strongly
                                            recommend following these requirements.</p>
                                        <br>
                                        <!----tabs bootstrap starts-->
                                        <p id="inbound_off_hours_emoji_face">&#128512;</p>
                                        <div class="emoji-div" id="inbound_off_hours_emoji_div">
                                            <?php
                                                    $emojis = getEmojies();
                                                    foreach ($emojis as $key => $emoji) {
                                                        echo '<span onclick="insertEmoji(this,\''.$key.'\',\'inboundOffHoursMyTabContent\')">'.$key.'</span>';
                                                    }
                                                    ?>
                                        </div>
                                        <ul class="nav nav-tabs" id="inboundOffHoursMyTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="inboundOffHoursFirstTab1"
                                                    data-toggle="tab" href="#inboundOffHoursTab1"
                                                    onclick="inboundOffHoursDelLi(this.id)" role="tab"
                                                    aria-controls="home" aria-selected="true">1</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="inboundOffHoursMyTabContent">
                                            <div class="tab-pane fade show active" id="inboundOffHoursTab1"
                                                role="tabpanel" aria-labelledby="first-tab1">
                                                <textarea class="form-control textarea-control" rows="4"
                                                    placeholder="Enter your message" maxlength="160"
                                                    id="inboundOffHoursMessageBody1" name="inboundOffHoursMessageBody1"
                                                    onkeyup="calculateLetters(1,id,'inboundOffHoursTotalLetters')"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="inboundOffHoursInputTabId" value="">
                                        <input type="hidden" id="inboundOffHoursInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox"
                                                        onclick="showUrlField('inboundOffHoursUrlDiv')"
                                                        id="inboundOffHourChecked" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="inboundOffHoursAttachFile"></span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label> Attach File </label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="inboundOffHoursUrlDiv" style="display: none; ">
                                            <div class="col-12">
                                                <input type="text" placeholder="Enter a Url" class="form-control"
                                                    name="inboundOffHoursUrl" id="inboundOffHoursUrl" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="btn btn-slack btn-icon"
                                                    onclick="messagePreview('inboundOffHoursMyTabContent')">
                                                    <span class="btn-inner--icon"><i class="fa fa-search"
                                                            aria-hidden="true"></i></span>
                                                    <span class="btn-inner--text">Preview</span>
                                                </button>
                                            </div>
                                            <div class="col-8">
                                                <p> This SMS will be sent as 1 message(s). Characters
                                                    remaining: <span id="inboundOffHoursTotalLetters">160</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!---------Yes / No Actions------->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Yes / No Actions
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox"
                                                        onclick="showPerformActionsDiv('inboundOffHoursPerformActionMessageDiv')"
                                                        id="inboundOffHoursPerformActionChecked" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="inboundOffHoursPerformAction"></span>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <label>Perform Action on Yes/No Sentiment(s).</label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="inboundOffHoursPerformActionDiv">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"Yes" Action</label>
                                                <select class="form-control" name="inboundOffHoursYesAction"
                                                    id="inboundOffHoursYesAction"
                                                    onchange="yesReplyRemove(this.value,'inboundOffHoursYesReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"No" Action</label>
                                                <select class="form-control" name="inboundOffHoursNoAction"
                                                    id="inboundOffHoursNoAction"
                                                    onchange="noReplyRemove(this.value,'inboundOffHoursNoReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: none" id="inboundOffHoursPerformActionMessageDiv">
                                            <div id="inboundOffHoursYesReplyDiv">
                                                <label>"Yes" Reply Message</label>
                                                <textarea rows="2" name="inboundOffHoursYesReply"
                                                    id="inboundOffHoursYesReply" class="form-control"></textarea>
                                            </div>
                                            <div id="inboundOffHoursNoReplyDiv">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="inboundOffHoursNoReply"
                                                    id="inboundOffHoursNoReply" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-slack btn-icon"
                                    onclick="inboundOffHoursNewMessage()">
                                    <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="btn-inner--text">New Message</span>
                                </button>
                                <button type="button" class="btn btn-youtube btn-icon"
                                    onclick="inboundOffHoursDeleteTab()">
                                    <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                    <span class="btn-inner--text">Delete</span>
                                </button>
                            </div>
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
                    <!---------------Inbound Off hours modals ends------------------------------->

                 <!----------------------Scheduled call email modal starts------------------------------------>
    <div class="modal fade" id="scheduledCallEmail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('scheduledCallEventEmailStore') }}" id="scheduledCallEventEmailForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf

                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>Email Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="scheduledCallPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Email Scheduling -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4> Pre Scheduling</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Select the number of minutes to send a remainder email before the call. </p>
                                        <br>
                                        <select name="scheduledCallPreScheduling"
                                            class="col-md-12 select form-control float-left"
                                            id="scheduledCallPreScheduling">
                                            <option value="5 Minutes Before">5 Minutes Before</option>
                                            <option value="15 Minutes Before">15 Minutes Before</option>
                                            <option value="30 Minutes Before">30 Minutes Before</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Compose
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <label>Subject:</label>
                                        <input class="form-control" name="scheduledCallSubject"
                                            id="scheduledCallSubject" type="text" placeholder="Hello {first_name}" />

                                        <label>Message:</label>
                                        <textarea class="form-control" rows="6" name="scheduledCallMessage"
                                            id="scheduledCallMessage"
                                            placeholder="Type in your message here. Basic HTML formatting is supported"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                                <button type="button" class="btn btn-danger"
                                    onclick="delEvent('ScheduledEmail','scheduled_calls','scheduledCallEmail')"><a>
                                        Delete </a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                <!----------------------Scheduled call email modal ends------------------------------------>
             <!------------------Outbound live sms modal event----------------------------->
    <div class="modal fade" id="outboundLiveSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('outboundLiveCallStore') }}" id="outboundLiveSmsForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf
                        <input type="hidden" name="outboundLiveSmsEventType" id="outboundLiveSmsEventType"
                            value="OutboundLiveSms" />
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>SMS Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="outboundLiveSMSPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Time Scheduling -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveSmsAdvancedIVR" class="custom-control-input"
                                                    id="outboundLiveSmsAdvancedDelay" checked="" type="radio"
                                                    value="outboundLiveSmsAdvancedDelay">
                                                <label class="custom-control-label"
                                                    for="outboundLiveSmsAdvancedDelay">Delay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveSmsAdvancedIVR" class="custom-control-input"
                                                    id="outboundLiveSmsAdvancedSchedule" type="radio"
                                                    value="outboundLiveSmsAdvancedSchedule">
                                                <label class="custom-control-label"
                                                    for="outboundLiveSmsAdvancedSchedule">
                                                    Schedule</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Live Delay -->
                                <div class="card">
                                    <div class="card-header " style="height: 50px;">
                                        <h4> Live Delay</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Select the number of minutes to wait before making a call to a newly posted
                                            lead.</p><br>
                                        <select name="outboundLiveSMSLiveDelay" class="select form-control">

                                            <option value="No Delay - Closed Hours" style="display: none;">No Delay -
                                                Closed Hours</option>

                                            <option value="No Delay - Open Hours" selected="selected">No Delay - Open
                                                Hours</option>

                                            <option value="1 Minute Delay">1 Minute Delay</option>

                                            <option value="2 Minute Delay">2 Minute Delay</option>

                                            <option value="3 Minute Delay">3 Minute Delay</option>

                                            <option value="4 Minute Delay">4 Minute Delay</option>

                                            <option value="5 Minute Delay">5 Minute Delay</option>

                                            <option value="6 Minute Delay">6 Minute Delay</option>

                                            <option value="7 Minute Delay">7 Minute Delay</option>

                                            <option value="8 Minute Delay">8 Minute Delay</option>

                                            <option value="9 Minute Delay">9 Minute Delay</option>

                                            <option value="10 Minute Delay">10 Minute Delay</option>

                                            <option value="11 Minute Delay">11 Minute Delay</option>

                                            <option value="12 Minute Delay">12 Minute Delay</option>

                                            <option value="13 Minute Delay">13 Minute Delay</option>

                                            <option value="14 Minute Delay">14 Minute Delay</option>

                                            <option value="15 Minute Delay">15 Minute Delay</option>

                                            <option value="25 Minute Delay">25 Minute Delay</option>

                                            <option value="30 Minute Delay">30 Minute Delay</option>

                                            <option value="45 Minute Delay">45 Minute Delay</option>

                                            <option value="60 Minute Delay">60 Minute Delay</option>

                                            <option value="75 Minute Delay">75 Minute Delay</option>

                                            <option value="85 Minute Delay">85 Minute Delay</option>

                                            <option value="90 Minute Delay">90 Minute Delay</option>

                                            <option value="120 Minute Delay">120 Minute Delay</option>

                                            <option value="180 Minute Delay">180 Minute Delay</option>

                                            <option value="240 Minute Delay">240 Minute Delay</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Message
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <small>Enter the message to deliver to the lead. You may use macros
                                            in your message such as {first_name}.</small><br>
                                        <p>CTIA guidelines require the <b>name of the company, the reason
                                                for the message, and opt out verbiage.</b> We strongly
                                            recommend following these requirements.</p>
                                        <br>
                                        <!----tabs bootstrap starts-->
                                        <p id="outbound_live_emoji_face">&#128512;</p>
                                        <div class="emoji-div" id="outbound_live_emoji_div">
                                            <?php
                                                    $emojis = getEmojies();
                                                    foreach ($emojis as $key => $emoji) {
                                                        echo '<span onclick="insertEmoji(this,\''.$key.'\',\'outboundLiveMyTabContent\')">'.$key.'</span>';
                                                    }
                                                    ?>
                                        </div>
                                        <ul class="nav nav-tabs" id="outboundLiveMyTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="outboundLiveFirstTab1" data-toggle="tab"
                                                    href="#outboundLiveTab1" onclick="outboundLiveDelLi(this.id)"
                                                    role="tab" aria-controls="home" aria-selected="true">1</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="outboundLiveMyTabContent">
                                            <div class="tab-pane fade show active" id="outboundLiveTab1" role="tabpanel"
                                                aria-labelledby="first-tab1">
                                                <textarea class="form-control textarea-control" rows="4"
                                                    placeholder="Enter your message" maxlength="160"
                                                    id="outboundLiveMessageBody1" name="outboundLiveMessageBody1"
                                                    onkeyup="calculateLetters(1,id,'outboundLiveTotalLetters')"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="outboundLiveInputTabId" value="">
                                        <input type="hidden" id="outboundLiveInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" onclick="showUrlField('outboundLiveUrlDiv')"
                                                        name="outboundLiveShowUrlField" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="outboundLiveAttachFile"></span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label> Attach File </label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="outboundLiveUrlDiv" style="display: none; ">
                                            <div class="col-12">
                                                <input type="text" placeholder="Enter a Url" class="form-control"
                                                    name="outboundLiveUrl" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="btn btn-slack btn-icon"
                                                    onclick="messagePreview('outboundLiveMyTabContent')">
                                                    <span class="btn-inner--icon"><i class="fa fa-search"
                                                            aria-hidden="true"></i></span>
                                                    <span class="btn-inner--text">Preview</span>
                                                </button>
                                            </div>
                                            <div class="col-8">
                                                <p> This SMS will be sent as 1 message(s). Characters
                                                    remaining: <span id="outboundLiveTotalLetters">160</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!---------Yes / No Actions------->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Yes / No Actions
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" onclick="showPerformActionsDiv('outboundLivePerformActionMessageDiv')"
                                                        name="outboundLivePerformAction" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="outboundLivePerformAction"></span>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <label>Perform Action on Yes/No Sentiment(s).</label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="outboundLivePerformActionDiv">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"Yes" Action</label>
                                                <select class="form-control" name="outboundLiveYesAction"
                                                    id="outboundLiveYesAction"
                                                    onchange="yesReplyRemove(this.value,'outboundLiveYesReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"No" Action</label>
                                                <select class="form-control" name="outboundLiveNoAction"
                                                    id="outboundLiveYesAction"
                                                    onchange="noReplyRemove(this.value,'outboundLiveNoReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: none" id="outboundLivePerformActionMessageDiv">
                                            <div id="outboundLiveYesReplyDiv">
                                                <label>"Yes" Reply Message</label>
                                                <textarea rows="2" name="outboundLiveYesReply"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div id="outboundLiveNoReplyDiv">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="outboundLiveNoReply"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-slack btn-icon" onclick="outboundLiveNewMessage()">
                                    <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="btn-inner--text">New Message</span>
                                </button>
                                <button type="button" class="btn btn-youtube btn-icon"
                                    onclick="outboundLiveDeleteTab()">
                                    <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                    <span class="btn-inner--text">Delete</span>
                                </button>
                            </div>
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

                <!------------------edit Outbound live sms modal event----------------------------->
    <div class="modal fade" id="editOutboundLiveSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('editOutboundLiveSmsStore') }}" id="editOutboundLiveSmsForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf
                        <input type="hidden" name="outboundLiveSmsEventId" id="outboundLiveSmsEventId" value="" />
                        <input type="hidden" name="editOutboundLiveSmsEventType" id="editOutboundLiveSmsEventType"
                            value="OutboundLiveSms" />

                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>SMS Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="editOutboundLiveSMSPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Time Scheduling -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveSmsAdvancedIVR" class="custom-control-input"
                                                    id="editOutboundLiveSmsAdvancedDelay" checked="" type="radio"
                                                    value="outboundLiveSmsAdvancedDelay">
                                                <label class="custom-control-label"
                                                    for="editOutboundLiveSmsAdvancedDelay">Delay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveSmsAdvancedIVR" class="custom-control-input"
                                                    id="editOutboundLiveSmsAdvancedSchedule" type="radio"
                                                    value="outboundLiveSmsAdvancedSchedule">
                                                <label class="custom-control-label"
                                                    for="editOutboundLiveSmsAdvancedSchedule">
                                                    Schedule</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Live Delay -->
                                <div class="card">
                                    <div class="card-header " style="height: 50px;">
                                        <h4> Live Delay</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Select the number of minutes to wait before making a call to a newly posted
                                            lead.</p><br>
                                        <select name="outboundLiveSMSLiveDelay" id="editOutboundLiveSMSLiveDelay"
                                            class="select form-control">

                                            <option value="No Delay - Closed Hours" style="display: none;">No Delay -
                                                Closed Hours</option>

                                            <option value="No Delay - Open Hours" selected="selected">No Delay - Open
                                                Hours</option>

                                            <option value="1 Minute Delay">1 Minute Delay</option>

                                            <option value="2 Minute Delay">2 Minute Delay</option>

                                            <option value="3 Minute Delay">3 Minute Delay</option>

                                            <option value="4 Minute Delay">4 Minute Delay</option>

                                            <option value="5 Minute Delay">5 Minute Delay</option>

                                            <option value="6 Minute Delay">6 Minute Delay</option>

                                            <option value="7 Minute Delay">7 Minute Delay</option>

                                            <option value="8 Minute Delay">8 Minute Delay</option>

                                            <option value="9 Minute Delay">9 Minute Delay</option>

                                            <option value="10 Minute Delay">10 Minute Delay</option>

                                            <option value="11 Minute Delay">11 Minute Delay</option>

                                            <option value="12 Minute Delay">12 Minute Delay</option>

                                            <option value="13 Minute Delay">13 Minute Delay</option>

                                            <option value="14 Minute Delay">14 Minute Delay</option>

                                            <option value="15 Minute Delay">15 Minute Delay</option>

                                            <option value="25 Minute Delay">25 Minute Delay</option>

                                            <option value="30 Minute Delay">30 Minute Delay</option>

                                            <option value="45 Minute Delay">45 Minute Delay</option>

                                            <option value="60 Minute Delay">60 Minute Delay</option>

                                            <option value="75 Minute Delay">75 Minute Delay</option>

                                            <option value="85 Minute Delay">85 Minute Delay</option>

                                            <option value="90 Minute Delay">90 Minute Delay</option>

                                            <option value="120 Minute Delay">120 Minute Delay</option>

                                            <option value="180 Minute Delay">180 Minute Delay</option>

                                            <option value="240 Minute Delay">240 Minute Delay</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Message
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <small>Enter the message to deliver to the lead. You may use macros
                                            in your message such as {first_name}.</small><br>
                                        <p>CTIA guidelines require the <b>name of the company, the reason
                                                for the message, and opt out verbiage.</b> We strongly
                                            recommend following these requirements.</p>
                                        <br>
                                        <!----tabs bootstrap starts-->
                                        <p id="edit_outbound_live_emoji_face">&#128512;</p>
                                        <div class="emoji-div" id="edit_outbound_live_emoji_div">
                                            <?php
                                                $emojis = getEmojies();
                                                foreach ($emojis as $key => $emoji) {
                                                    echo '<span onclick="insertEmoji(this,\''.$key.'\',\'editOutboundLiveMyTabContent\')">'.$key.'</span>';
                                                }
                                                  ?>
                                        </div>
                                        <ul class="nav nav-tabs" id="editOutboundLiveMyTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="editOutboundLiveFirstTab1"
                                                    data-toggle="tab" href="#editOutboundLiveTab1"
                                                    onclick="editOutboundLiveDelLi(this.id)" role="tab"
                                                    aria-controls="home" aria-selected="true">1</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="editOutboundLiveMyTabContent">
                                            <div class="tab-pane fade show active" id="editOutboundLiveTab1"
                                                role="tabpanel" aria-labelledby="first-tab1">
                                                <textarea class="form-control textarea-control" rows="4"
                                                    placeholder="Enter your message" maxlength="160"
                                                    id="editOutboundLiveMessageBody1" name="outboundLiveMessageBody1"
                                                    onkeyup="calculateLetters(1,id,'editOutboundLiveTotalLetters')"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="editOutboundLiveInputTabId" value="">
                                        <input type="hidden" id="editOutboundLiveInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox"
                                                        onclick="showUrlField('editOutboundLiveUrlDiv')"
                                                        id="editOutboundLiveShowUrlField"
                                                        name="outboundLiveShowUrlField" value="1" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="editOutboundLiveAttachFile"></span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label> Attach File </label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="editOutboundLiveUrlDiv" style="display: none; ">
                                            <div class="col-12">
                                                <input type="text" placeholder="Enter a Url" class="form-control"
                                                    name="outboundLiveUrl" id="editOutboundLiveUrl" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="btn btn-slack btn-icon"
                                                    onclick="messagePreview('editOutboundLiveMyTabContent')">
                                                    <span class="btn-inner--icon"><i class="fa fa-search"
                                                            aria-hidden="true"></i></span>
                                                    <span class="btn-inner--text">Preview</span>
                                                </button>
                                            </div>
                                            <div class="col-8">
                                                <p> This SMS will be sent as 1 message(s). Characters
                                                    remaining: <span id="editOutboundLiveTotalLetters">160</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!---------Yes / No Actions------->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Yes / No Actions
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox"
                                                        onclick="showPerformActionsDiv('editOutboundLivePerformActionMessageDiv')"
                                                        id="editOutboundLivePerformAction"
                                                        name="outboundLivePerformAction" value="1" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="editOutboundLivePerformAction"></span>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <label>Perform Action on Yes/No Sentiment(s).</label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="editOutboundLivePerformActionDiv">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"Yes" Action</label>
                                                <select class="form-control" name="outboundLiveYesAction"
                                                    id="editOutboundLiveYesAction"
                                                    onchange="yesReplyRemove(this.value,'editOutboundLiveYesReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"No" Action</label>
                                                <select class="form-control" name="outboundLiveNoAction"
                                                    id="editOutboundLiveYesAction"
                                                    onchange="noReplyRemove(this.value,'editOutboundLiveNoReplyDiv')">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: none" id="editOutboundLivePerformActionMessageDiv">
                                            <div id="editOutboundLiveYesReplyDiv">
                                                <label>"Yes" Reply Message</label>
                                                <textarea rows="2" name="outboundLiveYesReply"
                                                    id="editOutboundLiveYesReply" class="form-control"></textarea>
                                            </div>
                                            <div id="editOutboundLiveNoReplyDiv">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="outboundLiveNoReply"
                                                    id="editOutboundLiveNoReply" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-slack btn-icon"
                                    onclick="editOutboundLiveNewMessage()">
                                    <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="btn-inner--text">New Message</span>
                                </button>
                                <button type="button" class="btn btn-youtube btn-icon"
                                    onclick="editOutboundLiveDeleteTab()">
                                    <span class="btn-inner--icon"> <i class="fa fa-trash"></i></span>
                                    <span class="btn-inner--text">Delete</span>
                                </button>
                            </div>
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!----------------------outbound Live email modal starts------------------------------------>
    <div class="modal fade" id="outboundLiveEmailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('outboundLiveCallStore') }}" id="outboundLiveEmailForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf
                        <input type="hidden" name="outboundLiveEmailEventType" id="outboundLiveEmailEventType"
                            value="OutboundLiveEmail" />
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>Email Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="outboundLiveEmailPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Time Scheduling -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveEmailAdvancedIVR" class="custom-control-input"
                                                    id="outboundLiveEmailAdvancedDelay" checked="" type="radio"
                                                    value="outboundLiveEmailAdvancedDelay">
                                                <label class="custom-control-label"
                                                    for="outboundLiveEmailAdvancedDelay">Delay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveEmailAdvancedIVR" class="custom-control-input"
                                                    id="outboundLiveEmailAdvancedSchedule" type="radio"
                                                    value="outboundLiveEmailAdvancedSchedule">
                                                <label class="custom-control-label"
                                                    for="outboundLiveEmailAdvancedSchedule">
                                                    Schedule</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Live Delay -->
                                <div class="card">
                                    <div class="card-header " style="height: 50px;">
                                        <h4> Live Delay</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Select the number of minutes to wait before making an email to a newly posted
                                            lead.</p><br>
                                        <select name="outboundLiveEmailLiveDelay" class="select form-control">

                                            <option value="No Delay - Closed Hours" style="display: none;">No Delay -
                                                Closed Hours</option>

                                            <option value="No Delay - Open Hours" selected="selected">No Delay - Open
                                                Hours</option>

                                            <option value="1 Minute Delay">1 Minute Delay</option>

                                            <option value="2 Minute Delay">2 Minute Delay</option>

                                            <option value="3 Minute Delay">3 Minute Delay</option>

                                            <option value="4 Minute Delay">4 Minute Delay</option>

                                            <option value="5 Minute Delay">5 Minute Delay</option>

                                            <option value="6 Minute Delay">6 Minute Delay</option>

                                            <option value="7 Minute Delay">7 Minute Delay</option>

                                            <option value="8 Minute Delay">8 Minute Delay</option>

                                            <option value="9 Minute Delay">9 Minute Delay</option>

                                            <option value="10 Minute Delay">10 Minute Delay</option>

                                            <option value="11 Minute Delay">11 Minute Delay</option>

                                            <option value="12 Minute Delay">12 Minute Delay</option>

                                            <option value="13 Minute Delay">13 Minute Delay</option>

                                            <option value="14 Minute Delay">14 Minute Delay</option>

                                            <option value="15 Minute Delay">15 Minute Delay</option>

                                            <option value="25 Minute Delay">25 Minute Delay</option>

                                            <option value="30 Minute Delay">30 Minute Delay</option>

                                            <option value="45 Minute Delay">45 Minute Delay</option>

                                            <option value="60 Minute Delay">60 Minute Delay</option>

                                            <option value="75 Minute Delay">75 Minute Delay</option>

                                            <option value="85 Minute Delay">85 Minute Delay</option>

                                            <option value="90 Minute Delay">90 Minute Delay</option>

                                            <option value="120 Minute Delay">120 Minute Delay</option>

                                            <option value="180 Minute Delay">180 Minute Delay</option>

                                            <option value="240 Minute Delay">240 Minute Delay</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Compose
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <label>Subject:</label>
                                        <input class="form-control" name="outboundLiveEmailSubject" type="text"
                                            placeholder="Hello {first_name}" />

                                        <label>Message:</label>
                                        <textarea class="form-control" rows="6" name="outboundLiveEmailMessage"
                                            placeholder="Type in your message here. Basic HTML formatting is supported"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!----------------------outbound Live email modal ends------------------------------------>

    <!----------------------edit outbound Live email modal starts------------------------------------>
    <div class="modal fade" id="editOutboundLiveEmailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{ url('editOutboundLiveEmailStore') }}" id="editOutboundLiveEmailForm"
                        onsubmit="schedulingEventFormHandler(event)">
                        @csrf
                        <input type="hidden" name="outboundLiveEmailEventId" id="outboundLiveEmailEventId" value="" />
                        <input type="hidden" name="editOutboundLiveEmailEventType" id="editOutboundLiveEmailEventType"
                            value="OutboundLiveEmail" />
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>Email Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="editOutboundLiveEmailPopup"
                                style="overflow: auto; height: 630px;">
                                <!-- Time Scheduling -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveEmailAdvancedIVR" class="custom-control-input"
                                                    id="editOutboundLiveEmailAdvancedDelay" checked="" type="radio"
                                                    value="outboundLiveEmailAdvancedDelay">
                                                <label class="custom-control-label"
                                                    for="editOutboundLiveEmailAdvancedDelay">Delay</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="outboundLiveEmailAdvancedIVR" class="custom-control-input"
                                                    id="editOutboundLiveEmailAdvancedSchedule" type="radio"
                                                    value="outboundLiveEmailAdvancedSchedule">
                                                <label class="custom-control-label"
                                                    for="editOutboundLiveEmailAdvancedSchedule">
                                                    Schedule</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Live Delay -->
                                <div class="card">
                                    <div class="card-header " style="height: 50px;">
                                        <h4> Live Delay</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Select the number of minutes to wait before making an email to a newly posted
                                            lead.</p><br>
                                        <select name="outboundLiveEmailLiveDelay" id="editOutboundLiveEmailLiveDelay"
                                            class="select form-control">

                                            <option value="No Delay - Closed Hours" style="display: none;">No Delay -
                                                Closed Hours</option>

                                            <option value="No Delay - Open Hours" selected="selected">No Delay - Open
                                                Hours</option>

                                            <option value="1 Minute Delay">1 Minute Delay</option>

                                            <option value="2 Minute Delay">2 Minute Delay</option>

                                            <option value="3 Minute Delay">3 Minute Delay</option>

                                            <option value="4 Minute Delay">4 Minute Delay</option>

                                            <option value="5 Minute Delay">5 Minute Delay</option>

                                            <option value="6 Minute Delay">6 Minute Delay</option>

                                            <option value="7 Minute Delay">7 Minute Delay</option>

                                            <option value="8 Minute Delay">8 Minute Delay</option>

                                            <option value="9 Minute Delay">9 Minute Delay</option>

                                            <option value="10 Minute Delay">10 Minute Delay</option>

                                            <option value="11 Minute Delay">11 Minute Delay</option>

                                            <option value="12 Minute Delay">12 Minute Delay</option>

                                            <option value="13 Minute Delay">13 Minute Delay</option>

                                            <option value="14 Minute Delay">14 Minute Delay</option>

                                            <option value="15 Minute Delay">15 Minute Delay</option>

                                            <option value="25 Minute Delay">25 Minute Delay</option>

                                            <option value="30 Minute Delay">30 Minute Delay</option>

                                            <option value="45 Minute Delay">45 Minute Delay</option>

                                            <option value="60 Minute Delay">60 Minute Delay</option>

                                            <option value="75 Minute Delay">75 Minute Delay</option>

                                            <option value="85 Minute Delay">85 Minute Delay</option>

                                            <option value="90 Minute Delay">90 Minute Delay</option>

                                            <option value="120 Minute Delay">120 Minute Delay</option>

                                            <option value="180 Minute Delay">180 Minute Delay</option>

                                            <option value="240 Minute Delay">240 Minute Delay</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="card">
                                    <div class="card-header" style="height: 50px;">
                                        <h4>
                                            Compose
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <label>Subject:</label>
                                        <input class="form-control" name="outboundLiveEmailSubject"
                                            id="editOutboundLiveEmailSubject" type="text"
                                            placeholder="Hello {first_name}" />
                                        <label>Message:</label>
                                        <textarea class="form-control" rows="6" name="outboundLiveEmailMessage"
                                            id="editOutboundLiveEmailMessage"
                                            placeholder="Type in your message here. Basic HTML formatting is supported"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div>
                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary"><a> Save Changes </a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!----------------------edit outbound Live email modal ends------------------------------------>
    @endsection
    @section('scripts')
    <script type="text/javascript">
    const getId = (id) => {
        return document.getElementById(id).value;
        }
    function getVoiceMsg(id, filepath, filename, sound_id, field_name, dataTarget) {
        let divId = id.slice(1);
        $(id).html(`<div id="audioFile">` + `<small>` + filename + `</small>`);
        $(id).html(`<input type="hidden" name="` + field_name + `" value="` + sound_id + `" />`);
        $(id).append(`<audio controls src="` + filepath + `" style="width: 60% !important"></audio>`);
        $(id).append(`<button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'` + divId + `','` + dataTarget + `')">Remove</button></div>`);
    }
    
    function removeFileDiv(obj, id, dataTarget) {
        /* var id = $(obj).parent().attr('id');
         if(id == '')*/
        $(obj).parent().parent().append(`<div id="` + id + `"><a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#` + dataTarget + `">Select a Message</a></div>`);
        $(obj).parent().remove();
    }
    
    function hideModal() {
        $('callsOption').css('display', 'none');
    }
    
    function toggleOutScreener(id1, id2) {
        if ($('#' + id1).is(":checked")) {
            $('#' + id2).show();
        } else {
            $('#' + id2).hide();
        }
    }
    
    function toggleInboundOpenMenu() {
        document.getElementById('inboundOpenMenu').classList.toggle('show');
    }
    
    function toggleInboundOffMenu() {
        document.getElementById('inboundOffMenu').classList.toggle('show');
    }
    
    function toggleScheduledCallMenu() {
        document.getElementById('scheduledCallMenu').classList.toggle('show');
    }
    
    function toggleOutboundLiveMenu() {
        document.getElementById('outboundLiveMenu').classList.toggle('show');
    }
    
    function toggleDayMenu(menuId) {
        document.getElementById(menuId).classList.toggle('show');
        let dayEvent = document.getElementById('getDayEvent' + menuId).innerHTML;
        document.getElementById('assignDayValue').value = dayEvent;
    }
    
    window.onclick = function (event) {
        if (!event.target.matches('.btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    document.getElementById('sound-btn').onclick = function () {
        document.getElementById('sound').click();
        document.getElementById('sound-btn').style.display = 'none';
        document.getElementById('sound-upload').hidden = false;
    }
    document.getElementById('sound-upload').onclick = function () {
        document.getElementById('sound-form').submit();
        document.getElementById('loader-show').hidden = false;
    }
    
    /*event call*/
    function eventCall() {
        swal({
            title: 'Please select Basic or Advanced call.',
            text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
            type: 'question',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-info',
            confirmButtonText: 'Advanced',
            cancelButtonClass: 'btn btn-primary',
            cancelButtonText: '<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>',
        }).then((result) => {
            if (result.value === true) {
                document.getElementById('advanceBtn').click();
            } else if (result.value != true) {
                document.getElementById('basicBtn').click();
            }
        })
    }
    /*inbound open hours event call*/
    const inboundOpenHoursEventCall = () => {
        swal({
            title: 'Please select Basic or Advanced call.',
            text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
            type: 'question',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-info',
            confirmButtonText: 'Advanced',
            cancelButtonClass: 'btn btn-primary',
            cancelButtonText: `<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>`,
        }).then((result) => {
            if (result.value === true) {
                $('#inboundOpenHoursAdvance').modal('show');
            } else if (result.value != true) {
                // new code start
                document.getElementById('loader').hidden = false;
                document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            
                var campaignId = getId('campaign');
                $.ajax({
                    url: "{{ url('getInboundOpenHoursRecord') }}",
                    type: "GET",
                    async: true,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': campaignId,
                    },
                    success: function (response) {
                        if (!response.error) {
                            if (response.live_audio_sound) {
                                document.getElementById('inboundOpenHoursVoiceMsg').innerHTML =
                                    `<input type="hidden" name="live_audio_sound" value="` + response.live_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.live_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOpenHoursVoiceMsg','inboundOpenHoursVoice')">Remove</button></div>`;
                            }
                            if (response.inboundOpenHoursTransferDigit) {
                                document.getElementById('inboundOpenHoursTransferDigit').value = response.inboundOpenHoursTransferDigit;
                            }
                            if (response.inboundOpenHoursTransferNumber) {
                                document.getElementById('inboundOpenHoursTransferNumber').value = response.inboundOpenHoursTransferNumber;
                            }
                            if (response.transfer_sound_1) {
                                document.getElementById('inboundOpenHoursTransferVoiceMsg').innerHTML =
                                    `<input type="hidden" name="transfer_sound_1" value="` + response.transfer_sound_1_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_1 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOpenHoursTransferVoiceMsg','inboundOpenHoursVoiceTransfer')">Remove</button></div>`;
                            }
                            if (response.inboundOpenHoursEnableOptInScreener) {
                                document.getElementById('inboundOpenHoursInScreener').setAttribute('checked', 'true');
                            }
                            if (response.inboundOpenHoursEnableOptOutScreener) {
                                document.getElementById('inboundOpenHoursOut').setAttribute('checked', 'true');
                                toggleOutScreener('inboundOpenHoursOut', 'inboundOpenHoursOutScreener');
                            }
                            if (response.transfer_sound_2) {
                                document.getElementById('inboundOpenHoursOutScreenVoiceMsg').innerHTML =
                                    `<input type="hidden" name="transfer_sound_2" value="` + response.transfer_sound_2_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_2 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOpenHoursOutScreenVoiceMsg','inboundOpenHoursVoiceOutScreener')">Remove</button></div>`;
                            }
                            if (response.inboundOpenHoursScreenTransferDigit) {
                                document.getElementById('inboundOpenHoursScreenTransferDigit').value = response.inboundOpenHoursScreenTransferDigit;
                            }
                            if (response.inboundOpenHoursScreenTransferNumber) {
                                document.getElementById('inboundOpenHoursStd').value = response.inboundOpenHoursScreenTransferNumber;
                            }
                            if (response.inboundOpenHoursScreenDNCDigit) {
                                document.getElementById('inboundOpenHoursScreenDNCDigit').value = response.inboundOpenHoursScreenDNCDigit;
                            }
                            if (response.inboundOpenHoursScreenCloseDigit) {
                                document.getElementById('inboundOpenHoursScreenCloseDigit').value = response.inboundOpenHoursScreenCloseDigit;
                            }
                            if (response.inboundOpenHoursCallBackDigit) {
                                document.getElementById('inboundOpenHoursCallBackDigit').value = response.inboundOpenHoursCallBackDigit;
                            }
                            if (response.call_back_audio_sound) {
                                document.getElementById('inboundOpenHoursCallBackMsg').innerHTML =
                                    `<input type="hidden" name="call_back_audio_sound" value="` + response.call_back_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.call_back_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOpenHoursCallBackMsg','inboundOpenHoursCallBack')">Remove</button></div>`;
                            }
                            if (response.inboundOpenHoursDNCDigit) {
                                document.getElementById('inboundOpenHoursDNCDigit').value = response.inboundOpenHoursDNCDigit;
                            }
                            if (response.inboundOpenHoursLeaveVoicemail) {
                                document.getElementById('inboundOpenHoursLeaveVoicemail').setAttribute('checked', 'true');
                            }
                            if (response.inboundOpenHoursEnableVisual) {
                                document.getElementById('inboundOpenHoursEnableVisual').setAttribute('checked', 'true');
                            }
                            if (response.voice_mail_audio_sound) {
                                document.getElementById('inboundOpenHoursVoiceMailMsg').innerHTML =
                                    `<input type="hidden" name="voice_mail_audio_sound" value="` + response.voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOpenHoursVoiceMailMsg','inboundOpenHoursVoiceMail')">Remove</button></div>`;
                            }
                            $('#inboundOpenHoursBasic').modal('show');
                        } else {
                                document.getElementById('inboundOpenHoursVoiceMsg').innerHTML = ' <a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOpenHoursVoice">Select a Message</a>';
                                document.getElementById('inboundOpenHoursTransferDigit').value = '';
                                document.getElementById('inboundOpenHoursTransferNumber').value = '';
                                document.getElementById('inboundOpenHoursTransferVoiceMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOpenHoursVoiceTransfer">Select a Message</a>';
                                document.getElementById('inboundOpenHoursInScreener').removeAttribute('checked');
                                document.getElementById('inboundOpenHoursOut').removeAttribute('checked');
                                document.getElementById('inboundOpenHoursOutScreenVoiceMsg').innerHTML = '<a class="btn btn-primary text-white" data-toggle="modal" data-target="#inboundOpenHoursVoiceOutScreener">Send Message  </a>';
                                document.getElementById('inboundOpenHoursScreenTransferDigit').value = '';
                                document.getElementById('inboundOpenHoursStd').value = '';
                                document.getElementById('inboundOpenHoursScreenDNCDigit').value = '';
                                document.getElementById('inboundOpenHoursScreenCloseDigit').value = '';
                                document.getElementById('inboundOpenHoursCallBackDigit').value = '';
                                document.getElementById('inboundOpenHoursCallBackMsg').innerHTML = ' <a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOpenHoursCallBack">Select a Message</a>' ;
                                document.getElementById('inboundOpenHoursDNCDigit').value = '';
                                document.getElementById('inboundOpenHoursLeaveVoicemail').removeAttribute('checked');
                                document.getElementById('inboundOpenHoursEnableVisual').removeAttribute('checked');
                                document.getElementById('inboundOpenHoursVoiceMailMsg').innerHTML = ' <a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOpenHoursVoiceMail">Select a Message</a>' ;

                            // new code end 
                            $('#inboundOpenHoursBasic').modal('show');
                        }
                    },
                    complete: function (data) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
    
                    error: function (response) {
                        // toastify('Please add event first', 'error');
                        $('#inboundOpenHoursBasic').modal('show');
                    },
                });
            }
        })
    }
    /*inbound off hours event sms*/
    function inboundOffHoursEventSms() {
        swal({
            title: 'Are you sure?',
            text: "If you create an Inbound Off Hours SMS, then your trigger rules will NOT work while campaign is closed. Instead they will recieve the Inbound Off Hours SMS message. (Once per day, per lead.)",
            type: 'question',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-primary',
            confirmButtonText: 'Confirm',
            cancelButtonClass: 'btn btn-secondary',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                // new code start
                document.getElementById('loader').hidden = false;
                document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                var campaignId = getId('campaign');
                $.ajax({
                    url: "{{ url('getInboundOffHoursSmsRecord') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': campaignId,
                    },
                    success: function (response) {
                       
                    if(!response.error){
                        if (response.inboundOffHoursMessageBody1) {
                            document.getElementById('inboundOffHoursMessageBody1').value = response.inboundOffHoursMessageBody1;
                            calculateLetters(1,'inboundOffHoursMessageBody1','inboundOffHoursTotalLetters');
                        }
                        if (response.inboundOffHoursUrl) {
                            document.getElementById('inboundOffHourChecked').setAttribute('checked', true);
                            document.getElementById('inboundOffHoursUrlDiv').style.display = "block";
                            document.getElementById('inboundOffHoursUrl').value = response.inboundOffHoursUrl;
                        }
                        if (response.inboundOffHoursYesAction) {
                            document.getElementById('inboundOffHoursYesAction').value = response.inboundOffHoursYesAction;
                        }
    
                        if (response.inboundOffHoursNoAction) {
                            document.getElementById('inboundOffHoursNoAction').value = response.inboundOffHoursNoAction;
                        }
                        if (response.inboundOffHoursYesReply) {
                            document.getElementById('inboundOffHoursPerformActionChecked').setAttribute('checked', true);
                            document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = 'block';
                            document.getElementById('inboundOffHoursYesReply').value = response.inboundOffHoursYesReply;
                        }
                        if (response.inboundOffHoursNoReply) {
                            document.getElementById('inboundOffHoursPerformActionChecked').setAttribute('checked', true);
                            document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = 'block';
                            document.getElementById('inboundOffHoursNoReply').value = response.inboundOffHoursNoReply;
                        }
                    }else{
                            document.getElementById('inboundOffHoursMessageBody1').value = '';
                            calculateLetters(1,'inboundOffHoursMessageBody1','inboundOffHoursTotalLetters');
                            document.getElementById('inboundOffHourChecked').removeAttribute('checked');
                            document.getElementById('inboundOffHoursUrl').value = '';
                            document.getElementById('inboundOffHoursYesAction').value = '';
                            document.getElementById('inboundOffHoursNoAction').value = '';
                            document.getElementById('inboundOffHoursPerformActionChecked').removeAttribute('checked');
                            document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = 'none';
                            document.getElementById('inboundOffHoursYesReply').value = '';
                            document.getElementById('inboundOffHoursPerformActionChecked').removeAttribute('checked');
                            document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = 'none';
                            document.getElementById('inboundOffHoursNoReply').value = '';
                    }
                    },
                    error: function (response) {
                        toastify('Please add event first', 'error');
                    },
                    complete: function (response) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
                });
                // new code end 
                $('#inboundOffHoursSmsModal').modal('show');
            }
        })
    }
    /*outbound live event call*/
    function outboundLiveEventCall() {
        swal({
            title: 'Please select Basic or Advanced call.',
            text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
            type: 'question',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-info',
            confirmButtonText: 'Advanced',
            cancelButtonClass: 'btn btn-primary',
            cancelButtonText: '<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>',
        }).then((result) => {
            if (result.value === true) {
                document.getElementById('outboundLiveAdvanceBtn').click();
            } else if (result.value != true) {
                document.getElementById('outboundLiveBasicBtn').click();
            }
        })
    }
    /*Show url field*/
    function showUrlField(id) {
        if ($("#"+id).is(":visible") == true) {
            document.getElementById(id).style.display = "none";
        } else {
            document.getElementById(id).style.display = "block";
        }
    }
  
    //new message
    var rowNum = 1;
    
    function newMessage() {
        $("#first-tab1").removeClass("active");
        $("#tab1").removeClass("show active");
        $("#first-tab" + rowNum).removeClass("active");
        $("#tab" + rowNum).removeClass("show active");
        rowNum++;
        document.getElementById('myTab').innerHTML += `<li class="nav-item" role="presentation">
        <a class="nav-link active" id="first-tab` + rowNum + `" onclick="delLi(this.id)" data-toggle="tab" href="#tab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
        document.getElementById('input_first_tab_id').value = "first-tab" + rowNum;
        document.getElementById('myTabContent').innerHTML += ` <div class="tab-pane fade show active" id="tab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
            <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="messageBody` + rowNum + `" name="messageBody` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'total_letters')"></textarea>
            </div>`;
        document.getElementById('input_tab_id').value = "tab" + rowNum;
        document.getElementById('total_letters').innerHTML = 160;
    }

    function editNewMessage() {
        $("#edit_sms_first-tab1").removeClass("active");
        $("#edit_sms_tab1").removeClass("show active");
        $("#edit_sms_first-tab" + rowNum).removeClass("active");
        $("#edit_sms_tab" + rowNum).removeClass("show active");
        rowNum++;
        document.getElementById('edit_sms_myTab').innerHTML += `<li class="nav-item" role="presentation">
        <a class="nav-link active" id="edit_sms_first-tab` + rowNum + `" onclick="delLi(this.id)" data-toggle="tab" href="#edit_sms_tab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
        document.getElementById('edit_sms_input_first_tab_id').value = "first-tab" + rowNum;
        document.getElementById('edit_sms_myTabContent').innerHTML += ` <div class="tab-pane fade show active" id="edit_sms_tab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
            <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="edit_sms_messageBody` + rowNum + `" name="messageBody` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'edit_sms_total_letters')"></textarea>
            </div>`;
        document.getElementById('edit_sms_input_tab_id').value = "tab" + rowNum;
        document.getElementById('edit_sms_total_letters').innerHTML = 160;
    }
    /*inbound off hours new message */
    function inboundOffHoursNewMessage() {
        $("#inboundOffHoursFirstTab1").removeClass("active");
        $("#inboundOffHoursTab1").removeClass("show active");
        $("#inboundOffHoursFirstTab" + rowNum).removeClass("active");
        $("#inboundOffHoursTab" + rowNum).removeClass("show active");
        rowNum++;
        document.getElementById('inboundOffHoursMyTab').innerHTML += `<li class="nav-item" role="presentation">
        <a class="nav-link active" id="inboundOffHoursFirstTab` + rowNum + `" onclick="inboundOffHoursDelLi(this.id)" data-toggle="tab" href="#inboundOffHoursTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
        document.getElementById('inboundOffHoursInputFirstTabId').value = "inboundOffHoursFirstTab" + rowNum;
        document.getElementById('inboundOffHoursMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="inboundOffHoursTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
            <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="inboundOffHoursMessageBody ` + rowNum + `" name="inboundOffHoursMessageBody ` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'inboundOffHoursTotalLetters')"></textarea></div>`;
        document.getElementById('inboundOffHoursInputTabId').value = "inboundOffHoursTab" + rowNum;
        document.getElementById('inboundOffHoursTotalLetters').innerHTML = 160;
    }
    /*outboundLive new message */
    function outboundLiveNewMessage() {
        $("#outboundLiveFirstTab1").removeClass("active");
        $("#outboundLiveTab1").removeClass("show active");
        $("#outboundLiveFirstTab" + rowNum).removeClass("active");
        $("#outboundLiveTab" + rowNum).removeClass("show active");
        rowNum++;
        document.getElementById('outboundLiveMyTab').innerHTML += `<li class="nav-item" role="presentation">
        <a class="nav-link active" id="outboundLiveFirstTab` + rowNum + `" onclick="outboundLiveDelLi(this.id)" data-toggle="tab" href="#outboundLiveTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
        document.getElementById('outboundLiveInputFirstTabId').value = "outboundLiveFirstTab" + rowNum;
        document.getElementById('outboundLiveMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="outboundLiveTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
            <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="outboundLiveMessageBody` + rowNum + `" name="outboundLiveMessageBody` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'outboundLiveTotalLetters')"></textarea>
            </div>`;
        document.getElementById('outboundLiveInputTabId').value = "outboundLiveTab" + rowNum;
        document.getElementById('outboundLiveTotalLetters').innerHTML = 160;
    }
    /*edit outboundLive new message */
    function editOutboundLiveNewMessage() {
        $("#editOutboundLiveFirstTab1").removeClass("active");
        $("#editOutboundLiveTab1").removeClass("show active");
        $("#editOutboundLiveFirstTab" + rowNum).removeClass("active");
        $("#editOutboundLiveTab" + rowNum).removeClass("show active");
        rowNum++;
        document.getElementById('editOutboundLiveMyTab').innerHTML += `<li class="nav-item" role="presentation">
        <a class="nav-link active" id="editOutboundLiveFirstTab` + rowNum + `" onclick="editOutboundLiveDelLi(this.id)" data-toggle="tab" href="#editOutboundLiveTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
        document.getElementById('editOutboundLiveInputFirstTabId').value = "editOutboundLiveFirstTab" + rowNum;
        document.getElementById('editOutboundLiveMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="editOutboundLiveTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
            <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="editOutboundLiveMessageBody` + rowNum + `" name="outboundLiveMessageBody` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'editOutboundLiveTotalLetters')"></textarea>
            </div>`;
        document.getElementById('editOutboundLiveInputTabId').value = "editOutboundLiveTab" + rowNum;
        document.getElementById('editOutboundLiveTotalLetters').innerHTML = 160;
    }
    
    function deleteTab() {
        var tab_del = $('#input_tab_id').val();
        if (tab_del != 'tab1' && tab_del != '') {
            $('#' + tab_del).remove();
            var first_tab_del = $('#input_first_tab_id').val();
            $('#' + first_tab_del).remove();
            $('#first-tab1').click();
        }
        return;
    }
    // edit day sms delete 
    function editDeleteTab() {
        var tab_del = $('#edit_sms_input_tab_id').val();
        if (tab_del != 'edit_sms_tab1' && tab_del != '') {
            $('#' + tab_del).remove();
            var first_tab_del = $('#edit_sms_input_first_tab_id').val();
            $('#' + first_tab_del).remove();
            $('#edit_sms_first-tab1').click();
        }
        return;
    }

    /*Inbound off hours delete message tab*/
    function inboundOffHoursDeleteTab() {
        var tab_del = $('#inboundOffHoursInputTabId').val();
        if (tab_del != 'inboundOffHoursTab1' && tab_del != '') {
            $('#' + tab_del).remove();
            var first_tab_del = $('#inboundOffHoursInputFirstTabId').val();
            $('#' + first_tab_del).remove();
            $('#inboundOffHoursFirstTab1').click();
        }
        return;
    }
    
    /*outboundLive delete message tab*/
    function outboundLiveDeleteTab() {
        var tab_del = $('#outboundLiveInputTabId').val();
        if (tab_del != 'outboundLiveTab1' && tab_del != '') {
            $('#' + tab_del).remove();
            var first_tab_del = $('#outboundLiveInputFirstTabId').val();
            $('#' + first_tab_del).remove();
            $('#outboundLiveFirstTab1').click();
        }
        return;
    }
    
    function delLi(li_id) {
        document.getElementById('input_first_tab_id').value = li_id;
        removeFirst = li_id.slice(6);
        document.getElementById('input_tab_id').value = removeFirst;
    }
    function editDelLi(li_id) {
        document.getElementById('edit_sms_input_first_tab_id').value = li_id;
        removeFirst = li_id.slice(6);
        document.getElementById('edit_sms_input_tab_id').value = removeFirst;
    }
    /*inbound off hours delli */
    function inboundOffHoursDelLi(li_id) {
        document.getElementById('inboundOffHoursInputFirstTabId').value = li_id;
        removeFirst = li_id.slice(6);
        document.getElementById('inboundOffHoursInputTabId').value = removeFirst;
    }
    /*outboundLive delli */
    function outboundLiveDelLi(li_id) {
        document.getElementById('outboundLiveInputFirstTabId').value = li_id;
        removeFirst = li_id.slice(6);
        document.getElementById('outboundLiveInputTabId').value = removeFirst;
    }

    //toggle outboundLive emoji div
    $("#outbound_live_emoji_face").click(function () {
        $("#outbound_live_emoji_div").toggle();
    });

    //toggle edit outboundLive emoji div
    $("#edit_outbound_live_emoji_face").click(function () {
        $("#edit_outbound_live_emoji_div").toggle();
    });
    
    //toggle inbound off hours emoji div
    $("#inbound_off_hours_emoji_face").click(function () {
        $("#inbound_off_hours_emoji_div").toggle();
    });
    
    //toggle emoji div
    $("#emoji-face").click(function () {
        $("#emoji-div").toggle();
    });

    //toggle emoji div
    $("#edit_sms_emoji-face").click(function () {
        $("#edit_sms_emoji-div").toggle();
    });
    
    // calculate letters
    function calculateLetters(rowNum,id,totalId) {
        let letters = document.getElementById(id).value.length;
        let remainingLetters = 160 - letters;
        document.getElementById(totalId).innerHTML = remainingLetters;
    }
    
    //yes reply div hide
    function yesReplyRemove(val,id) {
        if (val == 'DNC') {
            document.getElementById(id).style.display = 'none';
        } else if (val != 'DNC') {
            document.getElementById(id).style.display = 'block';
        } else {
            return;
        }
    }
    
    //no reply div hide
    function noReplyRemove(val,id) {
        if (val == 'DNC') {
            document.getElementById(id).style.display = 'none';
        } else if (val != 'DNC') {
            document.getElementById(id).style.display = 'block';
        } else {
            return;
        }
    }

    /*perform action divs*/
    function showPerformActionsDiv(id) {
        if ($("#"+id).is(":visible") == true) {
            document.getElementById(id).style.display = "none";
        } else {
            document.getElementById(id).style.display = "block";
        }
    }
     /* scheduled sms new message */
     const scheduledSmsNewMessage = () => {
            $("#scheduledSmsFirstTab1").removeClass("active");
            $("#scheduledSmsTab1").removeClass("show active");
            $("#scheduledSmsFirstTab" + rowNum).removeClass("active");
            $("#scheduledSmsTab" + rowNum).removeClass("show active");
            rowNum++;
            document.getElementById('scheduledSmsMyTab').innerHTML += `<li class="nav-item" role="presentation">
            <a class="nav-link active" id="scheduledSmsFirstTab` + rowNum + `" onclick="scheduledSmsDelLi(this.id)" data-toggle="tab" href="#scheduledSmsTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a></li>`;
            document.getElementById('scheduledSmsInputFirstTabId').value = "scheduledSmsFirstTab" + rowNum;
            document.getElementById('scheduledSmsMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="scheduledSmsTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `"><textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="scheduledSmsMessageBody ` + rowNum + `" name="scheduledSmsMessageBody ` + rowNum + `" onkeyup="calculateLetters(rowNum,id,'scheduledSmsTotalLetters')"></textarea></div>`;
            document.getElementById('scheduledSmsInputTabId').value = "scheduledSmsTab" + rowNum;
            document.getElementById('scheduledSmsTotalLetters').innerHTML = 160;
        }
        /* scheduled sms delete message tab */
        const scheduledSmsDeleteTab = () => {
            var tab_del = $('#scheduledSmsInputTabId').val();
            if (tab_del != 'scheduledSmsTab1' && tab_del != '') {
                $('#' + tab_del).remove();
                var first_tab_del = $('#scheduledSmsInputFirstTabId').val();
                $('#' + first_tab_del).remove();
                $('#scheduledSmsFirstTab1').click();
            }
            return;
        }
        /*scheduled sms delli */
        const scheduledSmsDelLi = (li_id) => {
            document.getElementById('scheduledSmsInputFirstTabId').value = li_id;
            removeFirst = li_id.slice(6);
            document.getElementById('scheduledSmsInputTabId').value = removeFirst;
        }
        //toggle scheduled sms emoji div
        $("#scheduled_sms_emoji_face").click(function () {
            $("#scheduled_sms_emoji_div").toggle();
        });
    
    /*insert emoji*/
    function insertEmoji(obj, text,id) {
        var txtareaId = $('#'+id).find('div.active').find('textarea').attr('id')
        var txtarea = document.getElementById(txtareaId);
        if (!txtarea) {
            return;
        }
        var scrollPos = txtarea.scrollTop;
        var strPos = 0;
        var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
            "ff" : (document.selection ? "ie" : false));
        if (br == "ie") {
            txtarea.focus();
            var range = document.selection.createRange();
            range.moveStart('character', -txtarea.value.length);
            strPos = range.text.length;
        } else if (br == "ff") {
            strPos = txtarea.selectionStart;
        }
    
        var front = (txtarea.value).substring(0, strPos);
        var back = (txtarea.value).substring(strPos, txtarea.value.length);
        txtarea.value = front + text + back;
        strPos = strPos + text.length;
        if (br == "ie") {
            txtarea.focus();
            var ieRange = document.selection.createRange();
            ieRange.moveStart('character', -txtarea.value.length);
            ieRange.moveStart('character', strPos);
            ieRange.moveEnd('character', 0);
            ieRange.select();
        } else if (br == "ff") {
            txtarea.selectionStart = strPos;
            txtarea.selectionEnd = strPos;
            txtarea.focus();
        }
        txtarea.scrollTop = scrollPos;
    }
    
    // preview message 
    function messagePreview(id) {
        var msg = $('#' + id).find('div.active').find('textarea').attr('id');
        let message = document.getElementById(msg).value;
        swal("Message Preview!", message, "info")
    
    }
    
    function dayCallSubmit(obj) {
        let dayValue = document.getElementById('assignDayValue').value;
        document.querySelector("form[name=" + obj.name + "] > input.dayName").value = dayValue;
    }
    // slick slider 
    $('.slick_event_btns').slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: true,
        dots: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
    
        const inboundOffHourSmsFormSubmit = (e) => {
            e.preventDefault();
            var campaignId = document.getElementById('inboundOffHourSmsCampaignId').value;
            $.ajax({
                type: 'GET',
                async: false,
                url: $("#inboundOffHourSmsForm").attr("action"),
                data: $("#inboundOffHourSmsForm").serialize(),
                success: function (response) {
                    if (response == 0) {
                        toastify('Please try again', 'error');
                    } else {
                        toastify('Updated!', 'success');
                    }
                },
                error: function (response) {
                    toastify('Please try again!', 'error');
                },
            });
        }
        // schedule call email events modal
        const getOutboundLiveEvents = (eventType) => {
            var campaignId = getId('campaign');
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            // get events of selected event
            $.ajax({
                url: "{{ url('getOutboundLiveEvents') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': campaignId,
                    'eventType': eventType,
                },
                success: function (response) {
                    document.getElementById('loader').hidden = true;
                    document.getElementById('bodyBlur').style.cssText="";
                    document.getElementById('outboundLiveEventShows').innerHTML = response;
                },
                error: function (response) {
                    toastify('Please try again', 'error');
                },
                complete: function (response) {
                    document.getElementById('loader').hidden = true;
                    document.getElementById('bodyBlur').style.cssText="";
                },
            });
            $('#outboundLiveEvents').modal('show');
        }
        // Get day events
        const getDayEvents = (eventType,checkEvent) => {
            var campaignId = getId('campaign');
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            // get events of selected event
            $.ajax({
                url: "{{ url('getDayEvents') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': campaignId,
                    'eventType': eventType,
                    'checkEvent': checkEvent,
                },
                success: function (response) {
                    document.getElementById('loader').hidden = true;
                    document.getElementById('bodyBlur').style.cssText="";
                    document.getElementById('outboundLiveEventShows').innerHTML = response;
                },
                error: function (response) {
                    toastify('Please try again', 'error');
                },
                complete: function (response) {
                    document.getElementById('loader').hidden = true;
                    document.getElementById('bodyBlur').style.cssText="";
                },
            });
            $('#outboundLiveEvents').modal('show');
            document.getElementById('dayCallBasicEventType').value = eventType;
            document.getElementById('dayCallAdvanceEventType').value = eventType;
            document.getElementById('daySmsEventType').value = eventType;
            document.getElementById('dayEmailEventType').value = eventType;
        }
        // del schedule call event. 
        const delScheduledCallEmailEvent = (event_id, divName) => {
          
            $.ajax({
                url: "{{ url('delScheduledCallEmailEvent') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': event_id,
                },
                success: function (response) {
                    if (response == false) {
                        toastify('Please try again!', 'error')
                    } else {
                        toastify('Deleted', 'success')
                        document.getElementById(divName).style.display = 'none';
                    }
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
        
        }
        const editScheduledCallEmailEvent = (event_id, divName) => {
            $.ajax({
                url: "{{ url('editScheduledCallEmailEvent') }}",
                type: "GET",
                async: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': event_id,
                },
                success: function (response) {
                    if (response == false) {
                        toastify('Please try again!', 'error')
                    } else {
                        // console.log(response)
                        document.getElementById('scheduledCallBtn').click();
                        if (response.scheduledCallMessage) {
                            document.getElementById('scheduledCallMessage').value = response.scheduledCallMessage;
                        }
                        if (response.scheduledCallPreScheduling) {
                            document.getElementById('scheduledCallPreScheduling').value = response.scheduledCallPreScheduling;
                        }
                        if (response.scheduledCallSubject) {
                            document.getElementById('scheduledCallSubject').value = response.scheduledCallSubject;
                        }
                    }
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
        
        }
        //  form submit handler
        const schedulingEventFormHandler = (e) => {
            e.preventDefault();
            var data = $("#" + e.target.id).serialize();
            var campaignId = getId('campaign');
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            $.ajax({
                type: 'GET',
                url: e.target.action,
                data: data + '&campaignId=' + campaignId,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
                        toastify(response.success, 'success');
                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify('Please try again!', 'error');
                },
            });
        }
        //   delete the event
        const delEvent = (campaignType,tableName,modalId) => {
                swal({
                    title: 'Are you sure?',
                    text: "Once deleted, you will not be able to recover this event!",
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Confirm',
                    cancelButtonClass: 'btn btn-secondary',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value === true) {
                        let campaignId = getId('campaign');
                        document.getElementById('loader').hidden = false;
                        document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                        $.ajax({
                            type: 'GET',
                            async: true,
                            url: '{{ url('delEvent') }}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': campaignId,
                                'campaignType': campaignType,
                                'tableName': tableName,
                            },
                            success: function (response) {
                                // console.log(response)
                                if (response.success) {
                                
                                    $('#'+modalId).modal('hide');
                                    toastify(response.success, 'success');
                                } else {
                                    toastify(response.error, 'error');
                                }
                            },
                            error: function (response) {
                                // console.log(response)
                                // toastify('Please try again!', 'error');
                            },
                            complete: function (response) {
                            document.getElementById('loader').hidden = true;
                            document.getElementById('bodyBlur').style.cssText="";
                        },
                        });
                    }
                });
        }
        /*inbound open hours event call*/
        const inboundOffHoursEventCall = () => {
            swal({
                title: 'Please select Basic or Advanced call.',
                text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-info',
                confirmButtonText: 'Advanced',
                cancelButtonClass: 'btn btn-primary',
                cancelButtonText: `<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>`,
            }).then((result) => {
                if (result.value === true) {
                    $('#inboundOffHoursAdvance').modal('show');
                } else if (result.value != true) {
                    // new code start
                    document.getElementById('loader').hidden = false;
                    document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                    let campaignId = getId('campaign');
                    $.ajax({
                        url: "{{ url('getInboundOffHoursRecord') }}",
                        type: "GET",
                        async: true,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': campaignId,
                        },
                        success: function (response) {
                            
                            if (!response.error) {
                            
                                if (response.live_audio_sound) {
                                    document.getElementById('inboundOffHoursVoiceMsg').innerHTML =
                                        `<input type="hidden" name="live_audio_sound" value="` + response.live_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.live_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOffHoursVoiceMsg','inboundOffHoursVoice')">Remove</button></div>`;
                                }
                                if (response.inboundOffHoursTransferDigit) {
                                    document.getElementById('inboundOffHoursTransferDigit').value = response.inboundOffHoursTransferDigit;
                                }
                                if (response.inboundOffHoursTransferNumber) {
                                    document.getElementById('inboundOffHoursTransferNumber').value = response.inboundOffHoursTransferNumber;
                                }
                                if (response.transfer_sound_1) {
                                    document.getElementById('inboundOffHoursTransferVoiceMsg').innerHTML =
                                        `<input type="hidden" name="transfer_sound_1" value="` + response.transfer_sound_1_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_1 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOffHoursTransferVoiceMsg','inboundOffHoursVoiceTransfer')">Remove</button></div>`;
                                }
                                if (response.inboundOffHoursEnableOptInScreener) {
                                    document.getElementById('inboundOffHoursInScreener').setAttribute('checked', 'true');
                                }
                                if (response.inboundOffHoursEnableOptOutScreener) {
                                    document.getElementById('inboundOffHoursOut').setAttribute('checked', 'true');
                                    toggleOutScreener('inboundOffHoursOut', 'inboundOffHoursOutScreener');
                                }
                                if (response.transfer_sound_2) {
                                    document.getElementById('inboundOffHoursOutScreenVoiceMsg').innerHTML =
                                        `<input type="hidden" name="transfer_sound_2" value="` + response.transfer_sound_2_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_2 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOffHoursOutScreenVoiceMsg','inboundOffHoursVoiceOutScreener')">Remove</button></div>`;
                                }
                                if (response.inboundOffHoursScreenTransferDigit) {
                                    document.getElementById('inboundOffHoursScreenTransferDigit').value = response.inboundOffHoursScreenTransferDigit;
                                }
                                if (response.inboundOffHoursScreenTransferNumber) {
                                    document.getElementById('inboundOffHoursStd').value = response.inboundOffHoursScreenTransferNumber;
                                }
                                if (response.inboundOffHoursScreenDNCDigit) {
                                    document.getElementById('inboundOffHoursScreenDNCDigit').value = response.inboundOffHoursScreenDNCDigit;
                                }
                                if (response.inboundOffHoursScreenCloseDigit) {
                                    document.getElementById('inboundOffHoursScreenCloseDigit').value = response.inboundOffHoursScreenCloseDigit;
                                }
                                if (response.inboundOffHoursCallBackDigit) {
                                    document.getElementById('inboundOffHoursCallBackDigit').value = response.inboundOffHoursCallBackDigit;
                                }
                                if (response.call_back_audio_sound) {
                                    document.getElementById('inboundOffHoursCallBackMsg').innerHTML =
                                        `<input type="hidden" name="call_back_audio_sound" value="` + response.call_back_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.call_back_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOffHoursCallBackMsg','inboundOffHoursCallBack')">Remove</button></div>`;
                                }
                                if (response.inboundOffHoursDNCDigit) {
                                    document.getElementById('inboundOffHoursDNCDigit').value = response.inboundOffHoursDNCDigit;
                                }
                                if (response.inboundOffHoursLeaveVoicemail) {
                                    document.getElementById('inboundOffHoursLeaveVoicemail').setAttribute('checked', 'true');
                                }
                                if (response.inboundOffHoursEnableVisual) {
                                    document.getElementById('inboundOffHoursEnableVisual').setAttribute('checked', 'true');
                                }
                                if (response.voice_mail_audio_sound) {
                                    document.getElementById('inboundOffHoursVoiceMailMsg').innerHTML =
                                        `<input type="hidden" name="voice_mail_audio_sound" value="` + response.voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'inboundOffHoursVoiceMailMsg','inboundOffHoursVoiceMail')">Remove</button></div>`;
                                }
                                $('#inboundOffHoursBasic').modal('show');
                            } else {

                                    document.getElementById('inboundOffHoursVoiceMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOffHoursVoice">Select a Message</a>';
                                    document.getElementById('inboundOffHoursTransferDigit').value = '';
                                    document.getElementById('inboundOffHoursTransferNumber').value = '';
                                    document.getElementById('inboundOffHoursTransferVoiceMsg').innerHTML = ' <a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOffHoursVoiceTransfer">Select a Message</a>';
                                    document.getElementById('inboundOffHoursInScreener').removeAttribute('checked');
                                    document.getElementById('inboundOffHoursOut').removeAttribute('checked');
                                    document.getElementById('inboundOffHoursOutScreenVoiceMsg').innerHTML = ' <a class="btn btn-primary text-white" data-toggle="modal" data-target="#inboundOffHoursVoiceOutScreener">Send Message </a>';
                                    document.getElementById('inboundOffHoursScreenTransferDigit').value = '';
                                    document.getElementById('inboundOffHoursStd').value = '';
                                    document.getElementById('inboundOffHoursScreenDNCDigit').value = '';
                                    document.getElementById('inboundOffHoursScreenCloseDigit').value = '';
                                    document.getElementById('inboundOffHoursCallBackDigit').value = '';
                                    document.getElementById('inboundOffHoursCallBackMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOffHoursCallBack">Select a Message</a>' ;
                                    document.getElementById('inboundOffHoursDNCDigit').value = '';
                                    document.getElementById('inboundOffHoursLeaveVoicemail').removeAttribute('checked');
                                    document.getElementById('inboundOffHoursEnableVisual').removeAttribute('checked');
                                    document.getElementById('inboundOffHoursVoiceMailMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#inboundOffHoursVoiceMail">Select a Message</a>' ;

                                // new code end 
                                $('#inboundOffHoursBasic').modal('show');
                            }
                        },
                        complete: function (data) {
                            document.getElementById('loader').hidden = true;
                            document.getElementById('bodyBlur').style.cssText="";
                        },
        
                        error: function (response) {
                            // toastify('Please add event first', 'error');
                            $('#inboundOffHoursBasic').modal('show');
                        },
                    });
                }
            })
        }
        /*scheduled event call*/
        const scheduledCallEvent = () => {
                swal({
                    title: 'Please select Basic or Advanced call.',
                    text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
                    type: 'question',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-info',
                    confirmButtonText: 'Advanced',
                    cancelButtonClass: 'btn btn-primary',
                    cancelButtonText: '<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>',
                }).then((result) => {
                    if (result.value === true) {
                    $('#scheduledCallAdvance').modal('show');
                } else if (result.value != true) {
                    // new code start
                    document.getElementById('loader').hidden = false;
                    document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                    let campaignId = getId('campaign');
                    $.ajax({
                        url: "{{ url('getScheduledCallBasicRecord') }}",
                        type: "GET",
                        async: true,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': campaignId,
                        },
                        success: function (response) {
                            console.log(response)
                            if (!response.error) {
                            
                                if (response.live_audio_sound) {
                                    document.getElementById('scheduledCallBasicVoiceMsg').innerHTML =
                                        `<input type="hidden" name="live_audio_sound" value="` + response.live_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.live_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'scheduledCallBasicVoiceMsg','scheduledCallBasicVoice')">Remove</button></div>`;
                                }
                                if (response.scheduledCallBasicTransferDigit) {
                                    document.getElementById('scheduledCallBasicTransferDigit').value = response.scheduledCallBasicTransferDigit;
                                }
                                if (response.scheduledCallBasicTransferNumber) {
                                    document.getElementById('scheduledCallBasicTransferNumber').value = response.scheduledCallBasicTransferNumber;
                                }
                                if (response.transfer_sound_1) {
                                    document.getElementById('scheduledCallBasicTransferVoiceMsg').innerHTML =
                                        `<input type="hidden" name="transfer_sound_1" value="` + response.transfer_sound_1_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_1 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'scheduledCallBasicTransferVoiceMsg','scheduledCallBasicVoiceTransfer')">Remove</button></div>`;
                                }
                                if (response.scheduledCallBasicEnableOptInScreener) {
                                    document.getElementById('scheduledCallBasicInScreener').setAttribute('checked', 'true');
                                }
                                if (response.scheduledCallBasicEnableOptOutScreener) {
                                    document.getElementById('scheduledCallBasicOut').setAttribute('checked', 'true');
                                    toggleOutScreener('scheduledCallBasicOut', 'scheduledCallBasicOutScreener');
                                }
                                if (response.transfer_sound_2) {
                                    document.getElementById('scheduledCallBasicOutScreenVoiceMsg').innerHTML =
                                        `<input type="hidden" name="transfer_sound_2" value="` + response.transfer_sound_2_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.transfer_sound_2 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'scheduledCallBasicOutScreenVoiceMsg','scheduledCallBasicVoiceOutScreener')">Remove</button></div>`;
                                }
                                if (response.scheduledCallBasicScreenTransferDigit) {
                                    document.getElementById('scheduledCallBasicScreenTransferDigit').value = response.scheduledCallBasicScreenTransferDigit;
                                }
                                if (response.scheduledCallBasicScreenTransferNumber) {
                                    document.getElementById('scheduledCallBasicStd').value = response.scheduledCallBasicScreenTransferNumber;
                                }
                                if (response.scheduledCallBasicScreenDNCDigit) {
                                    document.getElementById('scheduledCallBasicScreenDNCDigit').value = response.scheduledCallBasicScreenDNCDigit;
                                }
                                if (response.scheduledCallBasicScreenCloseDigit) {
                                    document.getElementById('scheduledCallBasicScreenCloseDigit').value = response.scheduledCallBasicScreenCloseDigit;
                                }
                                if (response.scheduledCallBasicCallBackDigit) {
                                    document.getElementById('scheduledCallBasicCallBackDigit').value = response.scheduledCallBasicCallBackDigit;
                                }
                                if (response.call_back_audio_sound) {
                                    document.getElementById('scheduledCallBasicCallBackMsg').innerHTML =
                                        `<input type="hidden" name="call_back_audio_sound" value="` + response.call_back_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.call_back_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'scheduledCallBasicCallBackMsg','scheduledCallBasicCallBack')">Remove</button></div>`;
                                }
                                if (response.scheduledCallBasicDNCDigit) {
                                    document.getElementById('scheduledCallBasicDNCDigit').value = response.scheduledCallBasicDNCDigit;
                                }
                                if (response.scheduledCallBasicLeaveVoicemail) {
                                    document.getElementById('scheduledCallBasicLeaveVoicemail').setAttribute('checked', 'true');
                                }
                                if (response.scheduledCallBasicEnableVisual) {
                                    document.getElementById('scheduledCallBasicEnableVisual').setAttribute('checked', 'true');
                                }
                                if (response.voice_mail_audio_sound) {
                                    document.getElementById('scheduledCallBasicVoiceMailMsg').innerHTML =
                                        `<input type="hidden" name="voice_mail_audio_sound" value="` + response.voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'scheduledCallBasicVoiceMailMsg','scheduledCallBasicVoiceMail')">Remove</button></div>`;
                                }
                                $('#scheduledCallBasic').modal('show');
                            } else {

                                    document.getElementById('scheduledCallBasicVoiceMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#scheduledCallBasicVoice">Select a Message</a>';
                                    document.getElementById('scheduledCallBasicTransferDigit').value = '';
                                    document.getElementById('scheduledCallBasicTransferNumber').value = '';
                                    document.getElementById('scheduledCallBasicTransferVoiceMsg').innerHTML = ' <a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#scheduledCallBasicVoiceTransfer">Select a Message</a>';
                                    document.getElementById('scheduledCallBasicInScreener').removeAttribute('checked');
                                    document.getElementById('scheduledCallBasicOut').removeAttribute('checked');
                                    document.getElementById('scheduledCallBasicOutScreenVoiceMsg').innerHTML = ' <a class="btn btn-primary text-white" data-toggle="modal" data-target="#scheduledCallBasicVoiceOutScreener">Send Message </a>';
                                    document.getElementById('scheduledCallBasicScreenTransferDigit').value = '';
                                    document.getElementById('scheduledCallBasicStd').value = '';
                                    document.getElementById('scheduledCallBasicScreenDNCDigit').value = '';
                                    document.getElementById('scheduledCallBasicScreenCloseDigit').value = '';
                                    document.getElementById('scheduledCallBasicCallBackDigit').value = '';
                                    document.getElementById('scheduledCallBasicCallBackMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#scheduledCallBasicCallBack">Select a Message</a>' ;
                                    document.getElementById('scheduledCallBasicDNCDigit').value = '';
                                    document.getElementById('scheduledCallBasicLeaveVoicemail').removeAttribute('checked');
                                    document.getElementById('scheduledCallBasicEnableVisual').removeAttribute('checked');
                                    document.getElementById('scheduledCallBasicVoiceMailMsg').innerHTML = '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#scheduledCallBasicVoiceMail">Select a Message</a>' ;

                                // new code end 
                                $('#scheduledCallBasic').modal('show');
                            }
                        },
                        complete: function (data) {
                            document.getElementById('loader').hidden = true;
                            document.getElementById('bodyBlur').style.cssText="";
                        },
        
                        error: function (response) {
                            // toastify('Please add event first', 'error');
                            $('#scheduledCallBasic').modal('show');
                        },
                    });
                }
            })
        }      
        /*scheduled call event sms*/
        const scheduledCallEventSms = () => {
            swal({
                title: 'Are you sure?',
                text: "If you create an Scheduled Call Event SMS, then your trigger rules will NOT work while campaign is closed. Instead they will recieve the Inbound Off Hours SMS message. (Once per day, per lead.)",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                confirmButtonText: 'Confirm',
                cancelButtonClass: 'btn btn-secondary',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                // new code start
                document.getElementById('loader').hidden = false;
                document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                let campaignId = document.getElementById('campaignId').value;
                $.ajax({
                    url: "{{ url('getScheduledCallSmsRecord') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': campaignId,
                    },
                    success: function (response) {
                        console.log(response)
                    if(!response.error){
                        if (response.scheduledSmsMessageBody1) {
                            document.getElementById('scheduledSmsMessageBody1').value = response.scheduledSmsMessageBody1;
                            calculateLetters(1,'scheduledSmsMessageBody1','scheduledSmsTotalLetters');
                        }
                        if (response.scheduledSmsUrl) {
                            document.getElementById('inboundOffHourChecked').setAttribute('checked', true);
                            document.getElementById('scheduledSmsUrlDiv').style.display = "block";
                            document.getElementById('scheduledSmsUrl').value = response.scheduledSmsUrl;
                        }
                        if (response.scheduledSmsYesAction) {
                            document.getElementById('scheduledSmsYesAction').value = response.scheduledSmsYesAction;
                        }
    
                        if (response.scheduledSmsNoAction) {
                            document.getElementById('scheduledSmsNoAction').value = response.scheduledSmsNoAction;
                        }
                        if (response.scheduledSmsYesReply) {
                            document.getElementById('scheduledSmsPerformActionChecked').setAttribute('checked', true);
                            document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = 'block';
                            document.getElementById('scheduledSmsYesReply').value = response.scheduledSmsYesReply;
                        }
                        if (response.scheduledSmsNoReply) {
                            document.getElementById('scheduledSmsPerformActionChecked').setAttribute('checked', true);
                            document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = 'block';
                            document.getElementById('scheduledSmsNoReply').value = response.scheduledSmsNoReply;
                        }
                    }else{
                            document.getElementById('scheduledSmsMessageBody1').value = '';
                            calculateLetters(1,'scheduledSmsMessageBody1','scheduledSmsTotalLetters');
                            document.getElementById('inboundOffHourChecked').removeAttribute('checked');
                            document.getElementById('scheduledSmsUrl').value = '';
                            document.getElementById('scheduledSmsYesAction').value = '';
                            document.getElementById('scheduledSmsNoAction').value = '';
                            document.getElementById('scheduledSmsPerformActionChecked').removeAttribute('checked');
                            document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = 'none';
                            document.getElementById('scheduledSmsYesReply').value = '';
                            document.getElementById('scheduledSmsPerformActionChecked').removeAttribute('checked');
                            document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = 'none';
                            document.getElementById('scheduledSmsNoReply').value = '';
                    }
                    },
                    error: function (response) {
                        toastify('Please add event first', 'error');
                    },
                    complete: function (response) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
                });
                // new code end 
                $('#scheduledSmsModal').modal('show');
            }
        })
        }
        /*scheduled call event email*/
        const scheduledCallEventEmail = () => {
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText = "filter: blur(2px); pointer-events: none";
            let campaignId = document.getElementById('campaignId').value;
            $.ajax({
                url: "{{ url('getScheduledCallEmailRecord') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': campaignId,
                    },
                    success: function (response) {
                        console.log(response)
                        if (!response.error) {
                            if (response.scheduledCallPreScheduling) {
                            document.getElementById('scheduledCallPreScheduling').value = response.scheduledCallPreScheduling;
                            }
                            if (response.scheduledCallSubject) {
                            document.getElementById('scheduledCallSubject').value = response.scheduledCallSubject;
                            }
                            if (response.scheduledCallMessage) {
                            document.getElementById('scheduledCallMessage').value = response.scheduledCallMessage;
                            }
                        }
                        else
                        {
                            document.getElementById('scheduledCallPreScheduling').value = '';
                     
                            document.getElementById('scheduledCallSubject').value = '';
                    
                            document.getElementById('scheduledCallMessage').value = '';
                      
                            }
                        $('#scheduledCallEmail').modal('show');
                            },
                        error: function (response) {
                            toastify('Please add event first', 'error');
                        },
                        complete: function (response) {
                            document.getElementById('loader').hidden = true;
                            document.getElementById('bodyBlur').style.cssText = "";
                        },
                        });
        }
        
        const outboundLiveCallEvent = () => {
            $('#outboundLiveEvents').modal('hide');
            swal({
                title: 'Please select Basic or Advanced call.',
                text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-info',
                confirmButtonText: 'Advanced',
                cancelButtonClass: 'btn btn-primary',
                cancelButtonText: '<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>',
            }).then((result) => {
                if (result.value === true) {
                document.getElementById('outboundLiveCallAdvanceForm').reset();
                document.getElementById('outboundLiveAdvanceVoiceMailMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#outboundLiveAdvanceVoiceMail">Select a Message</a>';
                $('#outboundLiveAdvance').modal('show');
            } else if (result.value != true) {
                document.getElementById('outboundLiveCallBasicForm').reset();
                document.getElementById('outboundLiveVoiceMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#outboundLiveVoice">Select a Message</a>';
                document.getElementById('outboundLiveTransferVoiceMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#outboundLiveVoiceTransfer">Select a Message</a>';
                document.getElementById('outboundLiveOutScreenVoiceMsg').innerHTML= '<a class="btn btn-primary text-white" data-toggle="modal" data-target="#outboundLiveVoiceOutScreener">Send Message </a>';
                document.getElementById('outboundLiveCallBackMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#outboundLiveCallBack">Select a Message</a>';
                document.getElementById('outboundLiveVoiceMailMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#outboundLiveVoiceMail">Select a Message</a>';
                $('#outboundLiveBasic').modal('show');
            }
        })
        }
        const dayCallEvent = () => {
            $('#outboundLiveEvents').modal('hide');
            swal({
                title: 'Please select Basic or Advanced call.',
                text: "Advanced calls are for expert users who wish to setup a survey or complex IVR using visual editor.",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-info',
                confirmButtonText: 'Advanced',
                cancelButtonClass: 'btn btn-primary',
                cancelButtonText: '<a href="javascript:void(0)" style="text-decoration: none; color: white">Basic</a>',
            }).then((result) => {
                if (result.value === true) {
                document.getElementById('dayCallAdvanceForm').reset();
                document.getElementById('advanceVoiceMailMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#advanceVoiceMail">Select a Message</a>';
                $('#dayCallAdvance').modal('show');
            } else if (result.value != true) {
                document.getElementById('dayCallBasicForm').reset();
                document.getElementById('voiceMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#voice">Select a Message</a>';
                document.getElementById('transferVoiceMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#voiceTransfer">Select a Message</a>';
                document.getElementById('outScreenVoiceMsg').innerHTML= '<a class="btn btn-primary text-white" data-toggle="modal" data-target="#voiceOutScreener">Send Message </a>';
                document.getElementById('callBackMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#callBack">Select a Message</a>';
                document.getElementById('voiceMailMsg').innerHTML= '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#voiceMail">Select a Message</a>';
                $('#dayCallBasic').modal('show');
            }
        })
        }
        const editOutboundLiveEvent = (eventId,type) => {
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
              console.log("Event-Id:" , eventId)
              console.log("Type:" , type)
                $.ajax({
                    url: "{{ url('editOutboundLiveEvent') }}",
                    type: "GET",
                    async: true,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'eventId': eventId,
                        'type': type,
                    },
                    success: function (response) {
                        if (response.outboundLiveCallBasic) {
                            if (response.outboundLiveCallBasic.outboundLiveBasicAdvancedIVR) {
                                if(response.outboundLiveCallBasic.outboundLiveBasicAdvancedIVR == 'outboundLiveBasicAdvancedDelay'){
                                    document.getElementById('editOutboundLiveBasicAdvancedDelay').setAttribute('checked', 'true');
                                }else{
                                    document.getElementById('editOutboundLiveBasicAdvancedSchedule').setAttribute('checked', 'true');
                                }
                            }
                            if (response.outboundLiveCallBasic.outboundLiveBasicCallLiveDelay) {
                                document.getElementById('editOutboundLiveBasicCallLiveDelay').value = response.outboundLiveCallBasic.outboundLiveBasicCallLiveDelay;
                            }else{
                                document.getElementById('editOutboundLiveBasicCallLiveDelay').value = '';
                            }
                            if (response.outboundLiveCallBasic.outbound_live_audio_sound) {
                                document.getElementById('editOutboundLiveVoiceMsg').innerHTML =
                                    `<input type="hidden" name="outbound_live_audio_sound" value="` + response.outboundLiveCallBasic.outbound_live_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallBasic.outbound_live_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutboundLiveVoiceMsg','editOutboundLiveVoice')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveVoiceMsg').innerHTML =
                                '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editOutboundLiveVoice">Select a Message</a>';
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicTransferDigit) {
                                document.getElementById('editOutboundLiveCallBasicTransferDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicTransferDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicTransferDigit').value = '';                                
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicTransferNumber) {
                                document.getElementById('editOutboundLiveCallBasicTransferNumber').value = response.outboundLiveCallBasic.outboundLiveCallBasicTransferNumber;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicTransferNumber').value = '';
                            }
                            if (response.outboundLiveCallBasic.outbound_live_transfer_sound_1) {
                                document.getElementById('editOutboundLiveTransferVoiceMsg').innerHTML =
                                    `<input type="hidden" name="outbound_live_transfer_sound_1" value="` + response.outboundLiveCallBasic.outbound_live_transfer_sound_1_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallBasic.outbound_live_transfer_sound_1 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutboundLiveTransferVoiceMsg','editOutboundLiveVoiceTransfer')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveTransferVoiceMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editOutboundLiveVoiceTransfer">Select a Message</a>`;
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicIn) {
                                document.getElementById('editOutboundLiveCallBasicIn').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editOutboundLiveCallBasicIn').removeAttribute('checked');
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicOut) {
                                document.getElementById('editOutboundLiveCallBasicOut').setAttribute('checked', 'true');
                                toggleOutScreener('editOutboundLiveCallBasicOut', 'editOutboundLiveCallBasicOutScreener');
                            }else{
                                document.getElementById('editOutboundLiveCallBasicOut').removeAttribute('checked');
                            }
                            if (response.outboundLiveCallBasic.outbound_live_transfer_sound_2) {
                                document.getElementById('editOutboundLiveOutScreenVoiceMsg').innerHTML =
                                    `<input type="hidden" name="outbound_live_transfer_sound_2" value="` + response.outboundLiveCallBasic.outbound_live_transfer_sound_2_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallBasic.outbound_live_transfer_sound_2 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutboundLiveOutScreenVoiceMsg','editOutboundLiveVoiceOutScreener')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveOutScreenVoiceMsg').innerHTML =
                                    `<a class="btn btn-primary text-white" data-toggle="modal" data-target="#editOutboundLiveVoiceOutScreener">Send Message </a>`;
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicScreenTransferDigit) {
                                document.getElementById('editOutboundLiveCallBasicScreenTransferDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicScreenTransferDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicScreenTransferDigit').value = '';
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicScreenTransferNumber) {
                                document.getElementById('editOutboundLiveCallBasicScreenTransferNumber').value = response.outboundLiveCallBasic.outboundLiveCallBasicScreenTransferNumber;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicScreenTransferNumber').value = '';     
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicScreenDNCDigit) {
                                document.getElementById('editOutboundLiveCallBasicScreenDNCDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicScreenDNCDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicScreenDNCDigit').value = '';
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicScreenCloseDigit) {
                                 document.getElementById('editOutboundLiveCallBasicScreenDNCDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicScreenDNCDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicScreenDNCDigit').value = '';
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicCallBackDigit) {
                                document.getElementById('editOutboundLiveCallBasicCallBackDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicCallBackDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicCallBackDigit').value = '';
                            }
                            if (response.outboundLiveCallBasic.outbound_live_call_back_audio_sound) {
                                document.getElementById('editOutboundLiveCallBackMsg').innerHTML =
                                    `<input type="hidden" name="outbound_live_call_back_audio_sound" value="` + response.outboundLiveCallBasic.outbound_live_call_back_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallBasic.outbound_live_call_back_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutboundLiveCallBackMsg','editOutboundLiveCallBack')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveCallBackMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editOutboundLiveCallBack">Select a Message</a>`;
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicDNCDigit) {
                                document.getElementById('editOutboundLiveCallBasicDNCDigit').value = response.outboundLiveCallBasic.outboundLiveCallBasicDNCDigit;
                            }else{
                                document.getElementById('editOutboundLiveCallBasicDNCDigit').value = '';
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicLeaveVoicEmail) {
                                document.getElementById('editOutboundLiveCallBasicLeaveVoicEmail').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editOutboundLiveCallBasicLeaveVoicEmail').removeAttribute('checked');
                            }
                            if (response.outboundLiveCallBasic.outboundLiveCallBasicEnableVisual) {
                                document.getElementById('editOutboundLiveCallBasicEnableVisual').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editOutboundLiveCallBasicEnableVisual').removeAttribute('checked');
                            }
                            if (response.outboundLiveCallBasic.outbound_live_voice_mail_audio_sound) {
                                document.getElementById('editOutboundLiveVoiceMailMsg').innerHTML =
                                    `<input type="hidden" name="outbound_live_voice_mail_audio_sound" value="` + response.outboundLiveCallBasic.outbound_live_voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallBasic.outbound_live_voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutboundLiveVoiceMailMsg','editOutboundLiveVoiceMail')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveVoiceMailMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editOutboundLiveVoiceMail">Select a Message</a>`;
                            }
                            $('#editOutboundLiveBasic').modal('show');
                        }
                        if(response.outboundLiveCallAdvanced)
                        {
                            // first field
                            if (response.outboundLiveCallAdvanced.outboundLiveAdvancedIVR) {
                                if(response.outboundLiveCallAdvanced.outboundLiveAdvancedIVR == 'outboundLiveAdvancedDelay'){
                                    document.getElementById('editOutboundLiveAdvancedDelay').setAttribute('checked', 'true');
                                }else{
                                    document.getElementById('editOutboundLiveAdvancedSchedule').setAttribute('checked', 'true');
                                }
                            }
                            // second field
                            if (response.outboundLiveCallAdvanced.outboundLiveCallAdvancedLivedelay) {
                                document.getElementById('editOutboundLiveCallAdvancedLivedelay').value = response.outboundLiveCallAdvanced.outboundLiveCallAdvancedLivedelay;
                            }else{
                                document.getElementById('editOutboundLiveCallAdvancedLivedelay').value = '';
                            }
                            // third field
                            if (response.outboundLiveCallAdvanced.outboundLiveCallAdvancedLeaveVoicEmail) {
                                document.getElementById('editOutboundLiveCallAdvancedLeaveVoicEmail').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editOutboundLiveCallAdvancedLeaveVoicEmail').removeAttribute('checked');
                            }
                            // fourth field
                            if(response.outboundLiveCallAdvanced.outboundLiveCallAdvancedEnableVisual){
                                document.getElementById('editOutboundLiveCallAdvancedEnableVisual').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editOutboundLiveCallAdvancedEnableVisual').removeAttribute('checked');
                            }
                            //  fifth field
                            if (response.outboundLiveCallAdvanced.outbound_live_advance_voice_mail_audio_sound) {
                                document.getElementById('editOutboundLiveAdvanceVoiceMailMsg').innerHTML =
                                `<input type="hidden" name="outbound_live_advance_voice_mail_audio_sound" value="` + response.outboundLiveCallAdvanced.outbound_live_advance_voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.outboundLiveCallAdvanced.outbound_live_advance_voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'outboundLiveAdvanceVoiceMailMsg','outboundLiveAdvanceVoiceMail')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutboundLiveAdvanceVoiceMailMsg').innerHTML =
                                '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editOutboundLiveAdvanceVoiceMail">Select a Message</a>';
                            }
                            $('#editOutboundLiveAdvance').modal('show');
                        }
                        if(response.outboundLiveSms){
                           
                            // first field radio schedule
                            if(response.outboundLiveSms.outboundLiveSmsAdvancedIVR == "outboundLiveSmsAdvancedSchedule") {
                                document.getElementById('editOutboundLiveSmsAdvancedSchedule').setAttribute('checked',true);
                            }else{
                                document.getElementById('editOutboundLiveSmsAdvancedSchedule').removeAttribute('checked');
                            }
                            // first field radio delay
                            if(response.outboundLiveSms.outboundLiveSmsAdvancedIVR == "outboundLiveSmsAdvancedDelay") {
                                document.getElementById('editOutboundLiveSmsAdvancedDelay').setAttribute('checked',true);
                            }else{
                                document.getElementById('editOutboundLiveSmsAdvancedDelay').removeAttribute('checked');
                            }
                            // second field Live delay 
                            if (response.outboundLiveSms.outboundLiveSMSLiveDelay){
                                document.getElementById('editOutboundLiveSMSLiveDelay').value = response.outboundLiveSms.outboundLiveSMSLiveDelay;
                            }else{
                                document.getElementById('editOutboundLiveSMSLiveDelay').value = '';
                            }
                            // third field  
                            if (response.outboundLiveSms.outboundLiveMessageBody1){
                                document.getElementById('editOutboundLiveMessageBody1').value = response.outboundLiveSms.outboundLiveMessageBody1;
                                calculateLetters(1,'editOutboundLiveMessageBody1','editOutboundLiveTotalLetters');
                            }else{
                                document.getElementById('editOutboundLiveMessageBody1').value = '';
                            }
                            // fourth field  
                            if (response.outboundLiveSms.outboundLiveShowUrlField){
                                document.getElementById('editOutboundLiveShowUrlField').setAttribute('checked', true);
                                document.getElementById('editOutboundLiveUrlDiv').style.display = "block";
                            }else{
                                document.getElementById('editOutboundLiveShowUrlField').removeAttribute('checked');
                            }
                            // fifth field  
                            if (response.outboundLiveSms.outboundLiveUrl){
                                document.getElementById('editOutboundLiveUrl').value = response.outboundLiveSms.outboundLiveUrl;
                            }else{
                                document.getElementById('editOutboundLiveUrl').value = '';
                            }
                            // Sixth field  
                            if (response.outboundLiveSms.outboundLivePerformAction){
                                document.getElementById('editOutboundLivePerformAction').setAttribute('checked', true);
                                document.getElementById('editOutboundLivePerformActionMessageDiv').style.display = "block";
                            }else{
                                document.getElementById('editOutboundLivePerformAction').removeAttribute('checked');
                            }
                            // Seventh field 
                            if (response.outboundLiveSms.outboundLiveYesAction){
                                document.getElementById('editOutboundLiveYesAction').value = response.outboundLiveSms.outboundLiveYesAction;
                            }else{
                                document.getElementById('editOutboundLiveYesAction').value = '';
                            }
                            // Eight field 
                            if (response.outboundLiveSms.outboundLiveNoAction){
                                document.getElementById('editOutboundLiveYesAction').value = response.outboundLiveSms.outboundLiveNoAction;
                            }else{
                                document.getElementById('editOutboundLiveYesAction').value = '';
                            }
                            // Ninth field 
                            if (response.outboundLiveSms.outboundLiveYesReply){
                                document.getElementById('editOutboundLiveYesReply').value = response.outboundLiveSms.outboundLiveYesReply;
                            }else{
                                document.getElementById('editOutboundLiveYesReply').value = '';
                            }
                            // Tenth field 
                            if (response.outboundLiveSms.outboundLiveNoReply){
                                document.getElementById('editOutboundLiveNoReply').value = response.outboundLiveSms.outboundLiveNoReply;
                            }else{
                                document.getElementById('editOutboundLiveNoReply').value = '';
                            }
                            $('#editOutboundLiveSmsModal').modal('show');
                        }
                        if(response.outboundLiveEmail){
                            console.log(response.outboundLiveEmail)
                            // first field radio schedule
                            if(response.outboundLiveEmail.outboundLiveEmailAdvancedIVR == "outboundLiveEmailAdvancedDelay") {
                                document.getElementById('editOutboundLiveEmailAdvancedDelay').setAttribute('checked',true);
                            }else{
                                document.getElementById('editOutboundLiveEmailAdvancedDelay').removeAttribute('checked');
                            }
                            // first field radio delay
                            if(response.outboundLiveEmail.outboundLiveEmailAdvancedIVR == "outboundLiveEmailAdvancedSchedule") {
                                document.getElementById('editOutboundLiveEmailAdvancedSchedule').setAttribute('checked',true);
                            }else{
                                document.getElementById('editOutboundLiveEmailAdvancedSchedule').removeAttribute('checked');
                            }
                            // second field Live delay 
                            if (response.outboundLiveEmail.outboundLiveEmailLiveDelay){
                                document.getElementById('editOutboundLiveEmailLiveDelay').value = response.outboundLiveEmail.outboundLiveEmailLiveDelay;
                            }else{
                                document.getElementById('editOutboundLiveEmailLiveDelay').value = '';
                            }
                            // third field  
                            if (response.outboundLiveEmail.outboundLiveEmailSubject){
                                document.getElementById('editOutboundLiveEmailSubject').value = response.outboundLiveEmail.outboundLiveEmailSubject;
                            }else{
                                document.getElementById('editOutboundLiveEmailSubject').value = '';
                            }
                            // fourth field  
                            if (response.outboundLiveEmail.outboundLiveEmailMessage){
                                document.getElementById('editOutboundLiveEmailMessage').value = response.outboundLiveEmail.outboundLiveEmailMessage;
                            }else{
                                document.getElementById('editOutboundLiveEmailMessage').value = response.outboundLiveEmail.outboundLiveEmailMessage;
                            }
                            $('#editOutboundLiveEmailModal').modal('show');
                        }
                    },
                    complete: function (data) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
    
                    error: function (response) {
                    //    your code here 
                    },
                });
                document.getElementById('outboundLiveEmailEventId').value = eventId;
                document.getElementById('outboundLiveSmsEventId').value = eventId;
                document.getElementById('outboundLiveCallAdvancedEventId').value = eventId;
                document.getElementById('outboundLiveCallBasicEventId').value = eventId;
        }
        const editDayEvent = (eventId,type) => {
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            
                $.ajax({
                    url: "{{ url('editDayEvent') }}",
                    type: "GET",
                    async: true,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'eventId': eventId,
                        'type': type,
                    },
                    success: function (response) {
                        if (response.dayEventCallBasic) {
                           
                            //  first field
                            if(response.dayEventCallBasic.schedulingTime){
                                document.getElementById('editSchedulingTime').value =  response.dayEventCallBasic.schedulingTime;
                            }else{
                                document.getElementById('editSchedulingTime').value =  '';
                            }
                            // second field
                            if (response.dayEventCallBasic.live_audio_sound) {
                                document.getElementById('editVoiceMsg').innerHTML =
                                    `<input type="hidden" name="live_audio_sound" value="` + response.dayEventCallBasic.live_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallBasic.live_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editVoiceMsg','editVoice')">Remove</button></div>`;
                            }else{
                                document.getElementById('editVoiceMsg').innerHTML =
                                '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editVoice">Select a Message</a>';
                            }
                            //  third field
                            if (response.dayEventCallBasic.transferDigit) {
                                document.getElementById('editTransferDigit').value = response.dayEventCallBasic.transferDigit;
                            }else{
                                document.getElementById('editTransferDigit').value = '';                                
                            }
                            // fourth field
                            if (response.dayEventCallBasic.transferNumber) {
                                document.getElementById('editTransferNumber').value = response.dayEventCallBasic.transferNumber;
                            }else{
                                document.getElementById('editTransferNumber').value = '';
                            }
                            // fifth field 
                            if (response.dayEventCallBasic.transfer_sound_1) {
                                document.getElementById('editTransferVoiceMsg').innerHTML =
                                    `<input type="hidden" name="transfer_sound_1" value="` + response.dayEventCallBasic.transfer_sound_1_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallBasic.transfer_sound_1 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editTransferVoiceMsg','editVoiceTransfer')">Remove</button></div>`;
                            }else{
                                document.getElementById('editTransferVoiceMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editVoiceTransfer">Select a Message</a>`;
                            }
                            // sixth field
                            if (response.dayEventCallBasic.enableOptInScreener) {
                                document.getElementById('editEnableOptInScreener').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editEnableOptInScreener').removeAttribute('checked');
                            }
                            // seventh field
                            if (response.dayEventCallBasic.enableOptOutScreener) {
                                document.getElementById('editEnableOptOutScreener').setAttribute('checked', 'true');
                                toggleOutScreener('editEnableOptOutScreener', 'editEnableOptOutScreenerDiv');
                            }else{
                                document.getElementById('editEnableOptOutScreener').removeAttribute('checked');
                            }
                            // Eight field
                            if (response.dayEventCallBasic.transfer_sound_2) {
                                document.getElementById('editOutScreenVoiceMsg').innerHTML =
                                    `<input type="hidden" name="transfer_sound_2" value="` + response.dayEventCallBasic.transfer_sound_2_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallBasic.transfer_sound_2 + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editOutScreenVoiceMsg','editVoiceOutScreener')">Remove</button></div>`;
                            }else{
                                document.getElementById('editOutScreenVoiceMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editVoiceOutScreener">Select a Message</a>`;
                            }
                            // nineth field
                            if (response.dayEventCallBasic.screenTransferDigit) {
                                document.getElementById('editScreenTransferDigit').value = response.dayEventCallBasic.screenTransferDigit;
                            }else{
                                document.getElementById('editScreenTransferDigit').value = '';
                            }
                            // tenth field
                            if (response.dayEventCallBasic.screenTransferNumber) {
                                document.getElementById('editScreenTransferNumber').value = response.dayEventCallBasic.screenTransferNumber;
                            }else{
                                document.getElementById('editScreenTransferNumber').value = '';     
                            }
                            // eleven field
                            if (response.dayEventCallBasic.screenDncDigit) {
                                document.getElementById('editScreenDncDigit').value = response.dayEventCallBasic.screenDncDigit;
                            }else{
                                document.getElementById('editScreenDncDigit').value = '';
                            }
                            // twelve field
                            if (response.dayEventCallBasic.screenCloseDigit) {
                                 document.getElementById('editScreenCloseDigit').value = response.dayEventCallBasic.screenCloseDigit;
                            }else{
                                document.getElementById('editScreenCloseDigit').value = '';
                            }
                            // thirteen field
                            if (response.dayEventCallBasic.callBackDigit) {
                                document.getElementById('editCallBackDigit').value = response.dayEventCallBasic.callBackDigit;
                            }else{
                                document.getElementById('editCallBackDigit').value = '';
                            }
                            // fourteen field
                            if (response.dayEventCallBasic.call_back_audio_sound) {
                                document.getElementById('editCallBackMsg').innerHTML =
                                    `<input type="hidden" name="call_back_audio_sound" value="` + response.dayEventCallBasic.call_back_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallBasic.call_back_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editCallBackMsg','editCallBack')">Remove</button></div>`;
                            }else{
                                document.getElementById('editCallBackMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editCallBack">Select a Message</a>`;
                            }
                            // fifteen  field
                            if (response.dayEventCallBasic.dncDigit) {
                                document.getElementById('editDncDigit').value = response.dayEventCallBasic.dncDigit;
                            }else{
                                document.getElementById('editDncDigit').value = '';
                            }
                            // sixteen field
                            if (response.dayEventCallBasic.leaveVoicEmail) {
                                document.getElementById('editLeaveVoicEmail').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editLeaveVoicEmail').removeAttribute('checked');
                            }
                            // seventeen  field
                            if (response.dayEventCallBasic.enableVisual) {
                                document.getElementById('editEnableVisual').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editEnableVisual').removeAttribute('checked');
                            }
                            // eighteen field
                            if (response.dayEventCallBasic.voice_mail_audio_sound) {
                                document.getElementById('editVoiceMailMsg').innerHTML =
                                    `<input type="hidden" name="voice_mail_audio_sound" value="` + response.dayEventCallBasic.voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallBasic.voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editVoiceMailMsg','editVoiceMail')">Remove</button></div>`;
                            }else{
                                document.getElementById('editVoiceMailMsg').innerHTML =
                                    `<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editVoiceMail">Select a Message</a>`;
                            }
                            $('#editDayCallBasic').modal('show');
                        }
                        if(response.dayEventCallAdvance)
                        {
                            // first field
                            if (response.dayEventCallAdvance.dayEventCallAdvancedIVR) {
                                if(response.dayEventCallAdvance.dayEventCallAdvancedIVR == 'schedule'){
                                    document.getElementById('editDayCallSchedule').setAttribute('checked', 'true');
                                }else{
                                    document.getElementById('editDayCallDelay').setAttribute('checked', 'true');
                                }
                            }
                            // second field
                            if (response.dayEventCallAdvance.schedulingTime) {
                                document.getElementById('editDayAdvanceSchedulingTime').value = response.dayEventCallAdvance.schedulingTime;
                            }else{
                                document.getElementById('editDayAdvanceSchedulingTime').value = '';
                            }
                            // third field
                            if (response.dayEventCallAdvance.dayCallAdvancedLeaveVoicemail) {
                                document.getElementById('editDayCallAdvancedLeaveVoicemail').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editDayCallAdvancedLeaveVoicemail').removeAttribute('checked');
                            }
                            // fourth field
                            if(response.dayEventCallAdvance.dayCallAdvancedEnableVisual){
                                document.getElementById('editDayCallAdvancedEnableVisual').setAttribute('checked', 'true');
                            }else{
                                document.getElementById('editDayCallAdvancedEnableVisual').removeAttribute('checked');
                            }
                            //  fifth field
                            if (response.dayEventCallAdvance.advance_voice_mail_audio_sound) {
                                document.getElementById('editAdvanceVoiceMailMsg').innerHTML =
                                `<input type="hidden" name="advance_voice_mail_audio_sound" value="` + response.dayEventCallAdvance.advance_voice_mail_audio_sound_id + `" /><audio controls src="{{asset('public/upload/files/audio/` + response.dayEventCallAdvance.advance_voice_mail_audio_sound + `')}}" style="width: 60% !important"></audio><button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'editAdvanceVoiceMailMsg','editAdvanceVoiceMail')">Remove</button></div>`;
                            }else{
                                document.getElementById('editAdvanceVoiceMailMsg').innerHTML =
                                '<a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#editAdvanceVoiceMail">Select a Message</a>';
                            }
                            $('#editDayCallAdvance').modal('show');
                        }
                        if(response.daySms){
                      
                            // first field radio schedule
                            if (response.daySms.SchedulingTime){
                                document.getElementById('editDaySchedulingTime').value = response.daySms.SchedulingTime;
                            }else{
                                document.getElementById('editDaySchedulingTime').value = '';
                            }
                            // Second field  
                            if (response.daySms.messageBody1){
                                document.getElementById('edit_sms_messageBody1').value = response.daySms.messageBody1;
                            }else{
                                document.getElementById('edit_sms_messageBody1').value = '';
                            }
                            // Third field  
                            if (response.daySms.AttachFile){
                                document.getElementById('edit_sms_attach_file').setAttribute('checked', true);
                                document.getElementById('edit_sms_url_div').style.display = "block";
                            }else{
                                document.getElementById('edit_sms_attach_file').removeAttribute('checked');
                            }
                            // Fourth field  
                            if (response.daySms.smsPerformAction){
                                document.getElementById('edit_sms_smsPerformAction').setAttribute('checked', true);
                                document.getElementById('edit_sms_perform_action_message_div').style.display = "block";
                            }else{
                                document.getElementById('edit_sms_smsPerformAction').removeAttribute('checked');
                            }
                            // Fifth field  
                            if (response.daySms.smsYesAction){
                                document.getElementById('edit_sms_yes_action').value = response.daySms.smsYesAction;
                                yesReplyRemove(response.daySms.smsYesAction,'edit_sms_yes_reply_div')
                            }else{
                                document.getElementById('edit_sms_yes_action').value = '';
                            }
                            // Sixth field 
                            if (response.daySms.smsNoAction){
                                document.getElementById('edit_sms_no_action').value = response.daySms.smsNoAction;
                                noReplyRemove(response.daySms.smsNoAction,'edit_sms_no_reply_div')
                            }else{
                                document.getElementById('edit_sms_no_action').value = '';
                            }
                            // Seventh field 
                            if (response.daySms.smsUrl){
                                document.getElementById('edit_sms_smsUrl').value = response.daySms.smsUrl;
                            }else{
                                document.getElementById('edit_sms_smsUrl').value = '';
                            }
                            // Eight field 
                            if (response.daySms.smsYesReply){
                                document.getElementById('edit_smsYesReply').value = response.daySms.smsYesReply;
                            }else{
                                document.getElementById('edit_smsYesReply').value = '';
                            }
                            // Nine field 
                            if (response.daySms.smsNoReply){
                                document.getElementById('edit_smsNoReply').value = response.daySms.smsNoReply;
                            }else{
                                document.getElementById('edit_smsNoReply').value = '';
                            }
                            $('#editSmsModal').modal('show');
                        }
                        if(response.dayEmail){
                            // First field scheduling time
                            if (response.dayEmail.schedulingTime){
                                document.getElementById('editSchedulingTime').value = response.dayEmail.schedulingTime;
                            }else{
                                document.getElementById('editSchedulingTime').value = '';
                            }
                            // Second field subject 
                            if (response.dayEmail.dayEmailSubject){
                                document.getElementById('editDayEmailSubject').value = response.dayEmail.dayEmailSubject;
                            }else{
                                document.getElementById('editDayEmailSubject').value = '';
                            }
                            // Third field message  
                            if (response.dayEmail.dayEmailMessage){
                                document.getElementById('editDayEmailMessage').value = response.dayEmail.dayEmailMessage;
                            }else{
                                document.getElementById('editDayEmailMessage').value = '';
                            }
                            $('#editDayEmailModal').modal('show');
                        }
                    },
                    complete: function (data) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
    
                    error: function (response) {
                    //    your code here 
                    },
                });
                document.getElementById('editDayCallBasicEventId').value = eventId;
                document.getElementById('editDayCallAdvanceEventId').value = eventId;
                document.getElementById('editDaySmsEventId').value = eventId;
                document.getElementById('editDayEmailEventId').value = eventId;
        }
        const delOutboundLiveEvent = (eventId,type) =>{
            swal({
                title: 'Are you sure?',
                text: "Once deleted, you will not be able to recover this event!",
                type: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-danger',
                confirmButtonText: 'Confirm',
                cancelButtonClass: 'btn btn-secondary',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value === true) {
                    document.getElementById('loader').hidden = false;
                    document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                    $.ajax({
                        type: 'GET',
                        async: true,
                        url: '{{ url('delOutboundLiveEvent') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'eventId': eventId,
                            'type': type,
                        },
                        success: function (response) {
                            console.log(response)
                            document.getElementById('outboundLiveEventShows').innerHTML = response;
                        },
                        error: function (response) {
                            // console.log(response)
                            // toastify('Please try again!', 'error');
                        },
                        complete: function (response) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
                    });
                }
            });
        }
        const delDayEvent = (eventId,type) =>{
            swal({
                title: 'Are you sure?',
                text: "Once deleted, you will not be able to recover this event!",
                type: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-danger',
                confirmButtonText: 'Confirm',
                cancelButtonClass: 'btn btn-secondary',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value === true) {
                    document.getElementById('loader').hidden = false;
                    document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
                    $.ajax({
                        type: 'GET',
                        async: true,
                        url: '{{ url('delDayEvent') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'eventId': eventId,
                            'type': type,
                        },
                        success: function (response) {
                            document.getElementById('outboundLiveEventShows').innerHTML = response;
                        },
                        error: function (response) {
                            // console.log(response)
                            // toastify('Please try again!', 'error');
                        },
                        complete: function (response) {
                        document.getElementById('loader').hidden = true;
                        document.getElementById('bodyBlur').style.cssText="";
                    },
                    });
                }
            });
        }
        const outboundLiveSmsEvent = () =>{
            $('#outboundLiveEvents').modal('hide');
            swal({
                title: 'Are you sure?',
                text: "If you create an Scheduled Call Event SMS, then your trigger rules will NOT work while campaign is closed. Instead they will recieve the Inbound Off Hours SMS message. (Once per day, per lead.)",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                confirmButtonText: 'Confirm',
                cancelButtonClass: 'btn btn-secondary',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    document.getElementById('editOutboundLiveUrlDiv').style.display = "none";
                    document.getElementById('editOutboundLivePerformActionMessageDiv').style.display = "none";
                    document.getElementById('outboundLiveSmsForm').reset();
                $('#outboundLiveSmsModal').modal('show');
            }
        })
        }
        const daySmsEvent = () =>{
            $('#outboundLiveEvents').modal('hide');
            swal({
                title: 'Are you sure?',
                text: "If you create an Scheduled Call Event SMS, then your trigger rules will NOT work while campaign is closed. Instead they will recieve the Inbound Off Hours SMS message. (Once per day, per lead.)",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                confirmButtonText: 'Confirm',
                cancelButtonClass: 'btn btn-secondary',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    document.getElementById('url_div').style.display = "none";
                    document.getElementById('perform_action_message_div').style.display = "none";
                    document.getElementById('daySmsForm').reset();
                $('#smsModal').modal('show');
            }
        })
        }
        const outboundLiveEmailEvent = () =>{
            $('#outboundLiveEvents').modal('hide');
            document.getElementById('outboundLiveEmailForm').reset();
            $('#outboundLiveEmailModal').modal('show');
        }
        const dayEmailEvent = () =>{
            $('#outboundLiveEvents').modal('hide');
            document.getElementById('dayEmailForm').reset();
            $('#dayEmailModal').modal('show');
        }
    </script>
    @endsection