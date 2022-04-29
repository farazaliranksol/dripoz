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
                    <h6 class="h2 text-white d-inline-block mb-0">Schedule</h6>
                </div>
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
                        <!------Inbound Open Hours--------->
                        <div class="col-3  text-center" style="margin-bottom: 10px;">
                            <label class="text-center text-primary">
                                Inbound Open Hours
                            </label><br>
                            <div class="dropdown">
                                <button type="button" class="in btn btn-secondary btn-round btn-icon"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleInboundOpenMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="inboundOpenMenu">
                                    <li><a class="dropdown-item" onclick="inboundOpenHoursEventCall()">Call</a></li>
                                </ul>
                            </div>
                        </div>
                        <!------Inbound Off Hours--------->
                        <div class="col-3  text-center" style="margin-bottom: 10px; ">
                            <label class="text-center text-primary">
                                Inbound Off Hours
                            </label><br>
                            <div class="dropdown">
                                <button type="button" class="in btn btn-secondary btn-round btn-icon"
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
                        <div class="col-3  text-center" style="margin-bottom: 10px; ">
                            <label class="text-center text-primary">
                                Scheduled Call
                            </label><br>
                            <div class="dropdown">
                                <button type="button" class="in btn btn-secondary btn-round btn-icon"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleScheduledCallMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="scheduledCallMenu">
                                    <li><a class="dropdown-item" onclick="scheduledCallEvent()">Call</a></li>
                                    <li><a class="dropdown-item" onclick="scheduledCallEventSms()">SMS</a></li>
                                    <li><a class="dropdown-item" data-toggle="modal"
                                            data-target="#scheduledCall">Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <!---------Outbound Live----------->
                        <div class="col-3 text-center" style="margin-bottom: 10px; ">
                            <label class="text-center text-primary">
                                Outbound Live
                            </label><br />
                            <div class="dropdown">
                                <button type="button" class="out btn btn-secondary btn-round btn-icon"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="toggleOutboundLiveMenu(this)">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="outboundLiveMenu">
                                    <li><a class="dropdown-item" onclick="outboundLiveEventCall()">Call</a></li>
                                    <li><a class="dropdown-item" data-toggle="modal"
                                            data-target="#outboundLiveSmsModal">SMS</a></li>
                                    <li><a class="dropdown-item" data-toggle="modal"
                                            data-target="#outboundLiveEmail">Email</a></li>
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
                                    class="day btn btn-secondary btn-round btn-icon" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Add Event&nbsp;&nbsp;<i class="fas fa-plus"></i>
                                </button>
                                <ul class="dropdown-menu" id="{{$i}}">
                                    <li><a class="dropdown-item" onclick="eventCall()">Call</a></li>
                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#smsModal">
                                            SMS</a></li>
                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#emailModal">Email</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <!---------------Assign a day value in input field--------------->

        <input type="hidden" name="assignDayValue" id="assignDayValue" value=" " />
        <!--Basic Call for days event-->

        <button type="button" data-toggle="modal" data-target="#basic" id="basicBtn" hidden></button>
        <div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST" action="{{route('dayEventStore')}}" enctype="multipart/form-data"
                            onsubmit="dayCallSubmit(this)" name="dayEventCallBasicForm">
                            @csrf
                            <input type="hidden" name="dayName" value="" class="dayName">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="dayCallEventPopup"
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
                                            <select name="dayEventBasicSchedulingTime"
                                                class="col-md-12 select form-control float-left" id="schedulingTime"
                                                name="schedulingTime">
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
                                                        name="dayTransferDigit">
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
                                                    <input class="form-control" type="number" name="dayTransferNumber"
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
                                                        <input type="checkbox" id="dayEventIn" value="1">
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
                                                        <input type="checkbox" id="dayEventOut" value="1"
                                                            name="dayEventOut"
                                                            onchange="toggleOutScreener(id,'dayEventOutScreener')">
                                                        <span class="custom-toggle-slider rounded-circle"
                                                            data-label-off="No" data-label-on="Yes"></span>
                                                    </label>
                                                </div>
                                                <div class="col-9">
                                                    <label> Enable Opt Out Screener </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="dayEventOutScreener" style="display: none;">
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
                                                            name="dayEventScreenTransferDigit">
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
                                                            name="dayEventScreenTransferNumber"
                                                            id="dayEventScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="dayEventScreenDNCDigit">
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
                                                            name="dayEventScreenCloseDigit">
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
                                                        name="dayEventCallBackDigit">
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
                                                        name="dayEventDNCDigit">
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
                                                        <input type="checkbox" id="dayEventLeaveVoicEmail"
                                                            name="dayEventLeaveVoicEmail" value="1">
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
                                                        <input type="checkbox" id="dayEventEnableVisual"
                                                            name="dayEventEnableVisual" value="1">
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
        <!--Advanced call for days event-->

        <button type="button" data-toggle="modal" data-target="#advance" id="advanceBtn" hidden></button>
        <div class="modal fade" id="advance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST" action="{{route('dayEventStore')}}" enctype="multipart/form-data"
                            onsubmit="dayCallSubmit(this)" name="dayEventCallAdvancedForm">
                            @csrf
                            <input type="hidden" name="dayName" value="" class="dayName">
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
                                                    <input name="dayEventCallAdvancedIVR" class="custom-control-input"
                                                        id="dayEventCallDelay" checked="" type="radio" value="delay">
                                                    <label class="custom-control-label"
                                                        for="dayEventCallDelay">Delay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="dayEventCallAdvancedIVR" class="custom-control-input"
                                                        id="dayEventCallSchedule" type="radio" value="schedule">
                                                    <label class="custom-control-label" for="dayEventCallSchedule">
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
                                            <select name="dayEventCallAdvanceSchedulingTime"
                                                class="col-md-12 select form-control float-left"
                                                id="dayEventCallAdvanceSchedulingTime">
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
                                                        <input type="checkbox" id="dayEventCallAdvancedLeaveVoicemail"
                                                            name="dayEventCallAdvancedLeaveVoicemail" value="1">
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
                                                        <input type="checkbox" id="dayEventCallAdvancedEnableVisual"
                                                            name="dayEventCallAdvancedEnableVisual" value="1">
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
        <!-- Inbound open hours Basic Call event-->

        <button type="button" data-toggle="modal" data-target="#inboundOpenHoursBasic" id="inboundOpenHoursBasicBtn"
            hidden></button>
        <div class="modal fade" id="inboundOpenHoursBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{route('inboundOpenHoursScheduleStore')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-header pb-0">
                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                        <h2>Call Setting</h2>
                                    </div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup"
                                    style="overflow: auto; height: 630px;">
                                    <!-- Live Audio -->
                                    <div class="card">
                                        <div class="card-header " style="height: 50px;">
                                            <h4> live Audio</h4>
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
                                                        name="inboundOpenHoursTransferDigit">
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
                                                        name="inboundOpenHoursTransferNumber">
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
                                                            name="inboundOpenHoursScreenTransferDigit">
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
                                                        <input class="form-control" type="tel" id="std" value=""
                                                            name="inboundOpenHoursScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOpenHoursScreenDNCDigit">
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
                                                            name="inboundOpenHoursScreenCloseDigit">
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
                                                        name="inboundOpenHoursCallBackDigit">
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
                                            <div id="inboundOpenHoursCallBackMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#inboundOpenHoursCallBack">Select a Message</a>
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
                                                        name="inboundOpenHoursDNCDigit">
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
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Inbound open hours call Advanced event-->

        <button type="button" data-toggle="modal" data-target="#inboundOpenHoursAdvance" id="inboundOpenHoursAdvanceBtn"
            hidden></button>
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
        <button type="button" data-toggle="modal" data-target="#inboundOffHoursAdvance" id="inboundOffHoursAdvanceBtn"
            hidden></button>
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
        <button type="button" data-toggle="modal" data-target="#inboundOffHoursBasic" id="inboundOffHoursBasicBtn"
            hidden></button>
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
                                                        name="inboundOffHoursTransferDigit">
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
                                                        name="inboundOffHoursTransferNumber">
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
                                                            name="inboundOffHoursScreenTransferDigit">
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
                                                        <input class="form-control" type="tel" id="std" value=""
                                                            name="inboundOffHoursScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="inboundOffHoursScreenDNCDigit">
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
                                                            name="inboundOffHoursScreenCloseDigit">
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
                                                        name="inboundOffHoursCallBackDigit">
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
                                                        name="inboundOffHoursDNCDigit">
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
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Scheduled call  Advanced event-->
        <button type="button" data-toggle="modal" data-target="#scheduledCallAdvance" id="scheduledCallAdvanceBtn"
            hidden></button>
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
        <button type="button" data-toggle="modal" data-target="#scheduledCallBasic" id="scheduledCallBasicBtn"
            hidden></button>
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
                                                        name="scheduledCallBasicTransferDigit">
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
                                                        name="scheduledCallBasicTransferNumber">
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
                                                            name="scheduledCallBasicScreenTransferDigit">
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
                                                        <input class="form-control" type="tel" id="std" value=""
                                                            name="scheduledCallBasicScreenTransferNumber">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label>Screen DNC Digit</label>
                                                        <select class="col-md-12 select form-control float-left"
                                                            name="scheduledCallBasicScreenDNCDigit">
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
                                                            name="scheduledCallBasicScreenCloseDigit">
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
                                                        name="scheduledCallBasicCallBackDigit">
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
                                                        name="scheduledCallBasicDNCDigit">
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
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Outbound live Basic Call event-->
        <button type="button" data-toggle="modal" data-target="#outboundLiveBasic" id="outboundLiveBasicBtn"
            hidden></button>
        <div class="modal fade" id="outboundLiveBasic" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST" action="outboundLiveCallStore" enctype="multipart/form-data">
                            @csrf
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
                                                        <input type="checkbox" id="outboundLiveCallBasicIn" value="1">
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
                                                        <input type="checkbox" id="outboundLiveCallBasicOut" value="1"
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
                                            <div id="outboundLiveCallBackMsg">
                                                <a class="btn btn-primary my-4 text-white" data-toggle="modal"
                                                    data-target="#outboundLiveCallBack">Select a Message</a>
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
        <!--Outbound live Advanced call event-->
        <button type="button" data-toggle="modal" data-target="#outboundLiveAdvance" id="outboundLiveAdvanceBtn"
            hidden></button>
        <div class="modal fade" id="outboundLiveAdvance" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form method="POST" enctype="multipart/form-data" action="{{route('outboundLiveCallStore')}}">
                            @csrf
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
    </div>
    <!--------------------day events modals start--------------------------------->

    <!--voice library-->
    <div class="modal fade" id="voice" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voice"
                                                                    onclick="getVoiceMsg('#voiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','voice')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="callBack" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#callBack"
                                                                    onclick="getVoiceMsg('#callBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','callBack')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="voiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceMail"
                                                                    onclick="getVoiceMsg('#voiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','voiceMail')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="voiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceTransfer"
                                                                    onclick="getVoiceMsg('#transferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','voiceTransfer')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="voiceOutScreener" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceOutScreener"
                                                                    onclick="getVoiceMsg('#outScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','voiceOutScreener')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--advance voice mail-->
    <div class="modal fade" id="advanceVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#advanceVoiceMail"
                                                                    onclick="getVoiceMsg('#advanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'advance_voice_mail_audio_sound','advanceVoiceMail')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sms modal day event-->
    <div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="POST" action="{{route('dayEventStore')}}" enctype="multipart/form-data"
                        onsubmit="dayCallSubmit(this)" name="dayEventSmsForm">
                        @csrf
                        <input type="hidden" name="dayName" value="" class="dayName">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>SMS Settings</h2>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="dayEventSmsPopup"
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
                                        <select name="dayEventSmsSchedulingTime"
                                            class="col-md-12 select form-control float-left"
                                            id="dayEventSmsSchedulingTime">
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
                                                        echo '<span onclick="insertEmoji(this,\''.$key.'\')">'.$key.'</span>';

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
                                                    placeholder="Enter your message" maxlength="160" id="messageBody1"
                                                    name="messageBody1" onkeyup="calculateLetters(1)"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="input_tab_id" value="">
                                        <input type="hidden" id="input_first_tab_id" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" id="" value="1" onclick="showUrlField()"
                                                        name="dayEventSmsAttachFile" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes" id="attachFile"></span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label> Attach File </label>
                                            </div>
                                        </div>
                                        <div class="row pb-3" id="url_div" style="display: none; ">
                                            <div class="col-12">
                                                <input type="text" placeholder="Enter a Url" class="form-control"
                                                    name="dayEventSmsUrl" />
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
                                                    <input type="checkbox" onclick="showPerformActionsDiv()"
                                                        name="dayEventSmsPerformAction" />
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
                                                <select class="form-control" name="dayEventSmsYesAction" id="yes_action"
                                                    onchange="yesReplyRemove(this.value)">
                                                    <option value="Do Nothing">Do Nothing</option>
                                                    <option value="Call Now">Call Now</option>
                                                    <option value="Close">Close</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>"No" Action</label>
                                                <select class="form-control" name="dayEventSmsNoAction" id="no_action"
                                                    onchange="noReplyRemove(this.value)">
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
                                                <textarea rows="2" name="dayEventSmsYesReply"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div id="no_reply_div">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="dayEventSmsNoReply"
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
                                    <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
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
    <!--email modal day event-->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="POST" action="{{route('dayEventStore')}}" enctype="multipart/form-data"
                        onsubmit="dayCallSubmit(this)" name="dayEventEmailForm">
                        @csrf
                        <input type="hidden" name="dayName" value="" class="dayName">
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
                                        <select name="dayEventEmailSchedulingTime"
                                            class="col-md-12 select form-control float-left"
                                            id="dayEventEmailSchedulingTime">
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
                                        <input class="form-control" name="dayEventEmailSubject" type="text"
                                            placeholder="Hello {first_name}" />

                                        <label>Message:</label>
                                        <textarea class="form-control" rows="6" name="dayEventEmailMessage"
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

    <!--------------------day events modals end--------------------------------->

    <!---------------Inbound open hours modals starts------------------------------->

    <!--voice library-->
    <div class="modal fade" id="inboundOpenHoursVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoice"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','inboundOpenHoursVoice')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="inboundOpenHoursVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceTransfer"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','inboundOpenHoursVoiceTransfer')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="inboundOpenHoursCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursCallBack"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','inboundOpenHoursCallBack')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="inboundOpenHoursVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceMail"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','inboundOpenHoursVoiceMail')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="inboundOpenHoursVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','inboundOpenHoursVoiceOutScreener')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------------Inbound open hours modals ends------------------------------->

    <!---------------Inbound Off hours modals starts------------------------------->
    <!--voice library-->
    <div class="modal fade" id="inboundOffHoursVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoice"
                                                                    onclick="getVoiceMsg('#inboundOffHoursVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','inboundOffHoursVoice')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="inboundOffHoursVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceTransfer"
                                                                    onclick="getVoiceMsg('#inboundOffHoursTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','inboundOffHoursVoiceTransfer')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="inboundOffHoursCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursCallBack"
                                                                    onclick="getVoiceMsg('#inboundOffHoursCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','inboundOffHoursCallBack')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="inboundOffHoursVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceMail"
                                                                    onclick="getVoiceMsg('#inboundOffHoursVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','inboundOffHoursVoiceMail')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--voice library for out screener-->
    <div class="modal fade" id="inboundOffHoursVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#inboundOffHoursOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','inboundOffHoursVoiceOutScreener')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" data-toggle="modal" data-target="#inboundOffHoursSmsModal" id="inboundOffHoursConfirmBtn"
        hidden></button>
    <div class="modal fade" id="inboundOffHoursSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{route('inboundOffHoursScheduleStore')}}" method="POST"
                        enctype="multipart/form-data">
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
                                                        echo '<span onclick="inboundOffHoursInsertEmoji(this,\''.$key.'\')">'.$key.'</span>';
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
                                                    onkeyup="inboundOffHoursCalculateLetters(1)"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="inboundOffHoursInputTabId" value="">
                                        <input type="hidden" id="inboundOffHoursInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" onclick="inboundOffHoursShowUrlField()" />
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
                                                    name="inboundOffHoursUrl" />
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
                                                        onclick="inboundOffHoursShowPerformActionsDiv()" />
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
                                                    onchange="inboundOffHoursYesReplyRemove(this.value)">
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
                                                    onchange="inboundOffHoursNoReplyRemove(this.value)">
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
                                                    class="form-control"></textarea>
                                            </div>
                                            <div id="inboundOffHoursNoReplyDiv">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="inboundOffHoursNoReply"
                                                    class="form-control"></textarea>
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

    <!---------------scheduled call modals starts------------------------------->
    <!--voice library-->
    <div class="modal fade" id="scheduledCallBasicVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoice"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','scheduledCallBasicVoice')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="scheduledCallBasicVoiceTransfer" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceTransfer"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','scheduledCallBasicVoiceTransfer')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="scheduledCallBasicCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicCallBack"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','scheduledCallBasicCallBack')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="scheduledCallBasicVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceMail"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','scheduledCallBasicVoiceMail')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="scheduledCallBasicVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','scheduledCallBasicVoiceOutScreener')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------scheduled call sms model---------------------------------->
    <button type="button" data-toggle="modal" data-target="#scheduledSmsModal" id="scheduledSmsConfirmBtn"
        hidden></button>
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
                                                    echo '<span onclick="scheduledSmsInsertEmoji(this,\''.$key.'\')">'.$key.'</span>';
                                                }
                                                ?>
                                        </div>
                                        <ul class="nav nav-tabs" id="scheduledSmsMyTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="scheduledSmsFirstTab1" data-toggle="tab"
                                                    href="#scheduledSmsTab1" onclick="scheduledSmsDelLi(this.id)"
                                                    role="tab" aria-controls="home" aria-selected="true">1</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="scheduledSmsMyTabContent">
                                            <div class="tab-pane fade show active" id="scheduledSmsTab1" role="tabpanel"
                                                aria-labelledby="first-tab1">
                                                <textarea class="form-control textarea-control" rows="4"
                                                    placeholder="Enter your message" maxlength="160"
                                                    id="scheduledSmsMessageBody1" name="scheduledSmsMessageBody1"
                                                    onkeyup="scheduledSmsCalculateLetters(1)"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="scheduledSmsInputTabId" value="">
                                        <input type="hidden" id="scheduledSmsInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" onclick="scheduledSmsShowUrlField()" />
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
                                                    name="scheduledSmsUrl" />
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
                                                        onclick="scheduledSmsShowPerformActionsDiv()" />
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
                                                    onchange="scheduledSmsYesReplyRemove(this.value)">
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
                                                    onchange="scheduledSmsNoReplyRemove(this.value)">
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
                                                    class="form-control"></textarea>
                                            </div>
                                            <div id="scheduledSmsNoReplyDiv">
                                                <label>"No" Reply Message</label>
                                                <textarea rows="2" name="scheduledSmsNoReply"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-slack btn-icon" onclick="scheduledSmsNewMessage()">
                                    <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
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
    <!----------------------Scheduled call email modal starts------------------------------------>
    <div class="modal fade" id="scheduledCall" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form action="{{route('scheduledCallStore')}}" method="POST" enctype="multipart/form-data">
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
                                        <input class="form-control" name="scheduledCallSubject" type="text"
                                            placeholder="Hello {first_name}" />

                                        <label>Message:</label>
                                        <textarea class="form-control" rows="6" name="scheduledCallMessage"
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
    <!----------------------Scheduled call email modal ends------------------------------------>

    <!-----------------------Out bound live starts calls basic modals------------------------------------------>
    <!--voice library-->
    <div class="modal fade" id="outboundLiveVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#outboundLiveVoice"
                                                                    onclick="getVoiceMsg('#outboundLiveVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_audio_sound','outboundLiveVoice')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="outboundLiveCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveCallBack"
                                                                    onclick="getVoiceMsg('#outboundLiveCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_call_back_audio_sound','outboundLiveCallBack')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="outboundLiveVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceMail"
                                                                    onclick="getVoiceMsg('#outboundLiveVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_voice_mail_audio_sound','outboundLiveVoiceMail')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="outboundLiveVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceTransfer"
                                                                    onclick="getVoiceMsg('#outboundLiveTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_1','outboundLiveVoiceTransfer')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="outboundLiveVoiceOutScreener" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#outboundLiveOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_2','outboundLiveVoiceOutScreener')">Select</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------outbound live basic call event ends------------------------------------->
    <!-------------------------outbound advance call ----------------------------->
    <!--advance voice mail-->
    <div class="modal fade" id="outboundLiveAdvanceVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveAdvanceVoiceMail"
                                                                    onclick="getVoiceMsg('#outboundLiveAdvanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_advance_voice_mail_audio_sound','outboundLiveAdvanceVoiceMail')">Select</a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------Outbound live sms event----------------------------->
    <div class="modal fade" id="outboundLiveSmsModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="POST" action="{{route('outboundLiveCallStore')}}" enctype="multipart/form-data">
                        @csrf
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
                                                        echo '<span onclick="outboundLiveInsertEmoji(this,\''.$key.'\')">'.$key.'</span>';
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
                                                    onkeyup="outboundLiveCalculateLetters(1)"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="outboundLiveInputTabId" value="">
                                        <input type="hidden" id="outboundLiveInputFirstTabId" value="">

                                        <!----tabs bootstrap ends-->

                                        <div class="row pt-3">
                                            <div class="col-2">
                                                <label class="custom-toggle custom-toggle-success float-left">
                                                    <input type="checkbox" onclick="outboundLiveShowUrlField()" />
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
                                                    <input type="checkbox"
                                                        onclick="outboundLiveShowPerformActionsDiv()" />
                                                    <span class="custom-toggle-slider rounded-circle"
                                                        data-label-off="No" data-label-on="Yes"
                                                        id="outboundLivePerformAction"
                                                        name="outboundLivePerformAction"></span>
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
                                                    onchange="outboundLiveYesReplyRemove(this.value)">
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
                                                    onchange="outboundLiveNoReplyRemove(this.value)">
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
    <!----------------------outbound Live email modal starts------------------------------------>
    <div class="modal fade" id="outboundLiveEmail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="POST" action="{{route('outboundLiveCallStore')}}" enctype="multipart/form-data">
                        @csrf
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
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function getVoiceMsg(id, filepath, filename, sound_id, field_name,dataTarget) {
        let divId = id.slice(1);
        console.log(dataTarget,divId)
        $(id).html(`<div id="audioFile">` + `<small>` + filename + `</small>`);
        $(id).html(`<input type="hidden" name="` + field_name + `" value="` + sound_id + `" />`);
        $(id).append(`<audio controls src="` + filepath + `" style="width: 60% !important"></audio>`);
        $(id).append(`<button class="btn btn-warning text-white float-right" id="removeFile" onclick="removeFileDiv(this,'`+divId+`','`+dataTarget+`')">Remove</button></div>`);
        }

        function removeFileDiv(obj,id,dataTarget) {
            /* var id = $(obj).parent().attr('id');
             if(id == '')*/
            $(obj).parent().parent().append(`<div id="`+id+`"><a class="btn btn-primary my-4 text-white" data-toggle="modal" data-target="#`+dataTarget+`">Select a Message</a></div>`);
            $(obj).parent().remove();
        }

        function hideModal() {
            $('callsOption').css('display', 'none');
        }

        function toggleOutScreener(id1,id2) {
            if ($('#'+id1).is(":checked")) {
                $('#'+id2).show();
            } else {
                $('#'+id2).hide();
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
            let dayEvent = document.getElementById('getDayEvent'+menuId).innerHTML;
            document.getElementById('assignDayValue').value= dayEvent;
        
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
        function inboundOpenHoursEventCall() {
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
                    document.getElementById('inboundOpenHoursAdvanceBtn').click();
                } else if (result.value != true) {
                    document.getElementById('inboundOpenHoursBasicBtn').click();
                }
            })
        }

         /*inbound off hours event call*/
         function inboundOffHoursEventCall() {
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
                    document.getElementById('inboundOffHoursAdvanceBtn').click();
                } else if (result.value != true) {
                    document.getElementById('inboundOffHoursBasicBtn').click();
                }
            })
        }

         /*scheduled event call*/
         function scheduledCallEvent() {
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
                    document.getElementById('scheduledCallAdvanceBtn').click();
                } else if (result.value != true) {
                    document.getElementById('scheduledCallBasicBtn').click();
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
                    document.getElementById('inboundOffHoursConfirmBtn').click();
                }
            })
        }

        /*scheduled call event sms*/
        function scheduledCallEventSms() {
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
                    document.getElementById('scheduledSmsConfirmBtn').click();
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
        function showUrlField() {
            if ($("#url_div").is(":visible") == true) {
                document.getElementById('url_div').style.display = "none";
            } else {
                document.getElementById('url_div').style.display = "block";
            }
        }
        /*inboundOffHours Show url field*/
        function inboundOffHoursShowUrlField() {
            if ($("#inboundOffHoursUrlDiv").is(":visible") == true) {
                document.getElementById('inboundOffHoursUrlDiv').style.display = "none";
            } else {
                document.getElementById('inboundOffHoursUrlDiv').style.display = "block";
            }
        }
        
        /*scheduled call Show url field*/
        function scheduledSmsShowUrlField() {
            if ($("#scheduledSmsUrlDiv").is(":visible") == true) {
                document.getElementById('scheduledSmsUrlDiv').style.display = "none";
            } else {
                document.getElementById('scheduledSmsUrlDiv').style.display = "block";
            }
        }

        /*outboundLive Show url field*/
        function outboundLiveShowUrlField() {
            if ($("#outboundLiveUrlDiv").is(":visible") == true) {
                document.getElementById('outboundLiveUrlDiv').style.display = "none";
            } else {
                document.getElementById('outboundLiveUrlDiv').style.display = "block";
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
            <a class="nav-link active" id="first-tab` + rowNum + `" onclick="delLi(this.id)" data-toggle="tab" href="#tab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a>
    </li>`;
            document.getElementById('input_first_tab_id').value = "first-tab" + rowNum;
            document.getElementById('myTabContent').innerHTML += ` <div class="tab-pane fade show active" id="tab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
    <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="messageBody` + rowNum + `" name="messageBody` + rowNum + `" onkeyup="calculateLetters(rowNum)"></textarea>
</div>`;
            document.getElementById('input_tab_id').value = "tab" + rowNum;
            document.getElementById('total_letters').innerHTML = 160;
        }
        /*inbound off hours new message */
        function inboundOffHoursNewMessage() {
            $("#inboundOffHoursFirstTab1").removeClass("active");
            $("#inboundOffHoursTab1").removeClass("show active");
            $("#inboundOffHoursFirstTab" + rowNum).removeClass("active");
            $("#inboundOffHoursTab" + rowNum).removeClass("show active");
            rowNum++;
            document.getElementById('inboundOffHoursMyTab').innerHTML += `<li class="nav-item" role="presentation">
            <a class="nav-link active" id="inboundOffHoursFirstTab` + rowNum + `" onclick="inboundOffHoursDelLi(this.id)" data-toggle="tab" href="#inboundOffHoursTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a>
    </li>`;
            document.getElementById('inboundOffHoursInputFirstTabId').value = "inboundOffHoursFirstTab" + rowNum;
            document.getElementById('inboundOffHoursMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="inboundOffHoursTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
    <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="inboundOffHoursMessageBody ` + rowNum + `" name="inboundOffHoursMessageBody ` + rowNum + `" onkeyup="inboundOffHoursCalculateLetters(rowNum)"></textarea>
</div>`;
            document.getElementById('inboundOffHoursInputTabId').value = "inboundOffHoursTab" + rowNum;
            document.getElementById('inboundOffHoursTotalLetters').innerHTML = 160;
        }
        
         /* scheduled sms new message */
         function scheduledSmsNewMessage() {
            $("#scheduledSmsFirstTab1").removeClass("active");
            $("#scheduledSmsTab1").removeClass("show active");
            $("#scheduledSmsFirstTab" + rowNum).removeClass("active");
            $("#scheduledSmsTab" + rowNum).removeClass("show active");
            rowNum++;
            document.getElementById('scheduledSmsMyTab').innerHTML += `<li class="nav-item" role="presentation">
            <a class="nav-link active" id="scheduledSmsFirstTab` + rowNum + `" onclick="scheduledSmsDelLi(this.id)" data-toggle="tab" href="#scheduledSmsTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a>
    </li>`;
            document.getElementById('scheduledSmsInputFirstTabId').value = "scheduledSmsFirstTab" + rowNum;
            document.getElementById('scheduledSmsMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="scheduledSmsTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
    <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="scheduledSmsMessageBody ` + rowNum + `" name="scheduledSmsMessageBody ` + rowNum + `" onkeyup="scheduledSmsCalculateLetters(rowNum)"></textarea>
</div>`;
            document.getElementById('scheduledSmsInputTabId').value = "scheduledSmsTab" + rowNum;
            document.getElementById('scheduledSmsTotalLetters').innerHTML = 160;
        }

        /*outboundLive new message */
        function outboundLiveNewMessage() {
            $("#outboundLiveFirstTab1").removeClass("active");
            $("#outboundLiveTab1").removeClass("show active");
            $("#outboundLiveFirstTab" + rowNum).removeClass("active");
            $("#outboundLiveTab" + rowNum).removeClass("show active");
            rowNum++;
            document.getElementById('outboundLiveMyTab').innerHTML += `<li class="nav-item" role="presentation">
            <a class="nav-link active" id="outboundLiveFirstTab` + rowNum + `" onclick="outboundLiveDelLi(this.id)" data-toggle="tab" href="#outboundLiveTab` + rowNum + `" role="tab" aria-controls="tab" aria-selected="false">` + rowNum + `</a>
    </li>`;
            document.getElementById('outboundLiveInputFirstTabId').value = "outboundLiveFirstTab" + rowNum;
            document.getElementById('outboundLiveMyTabContent').innerHTML += ` <div class="tab-pane fade show active" id="outboundLiveTab` + rowNum + `" role="tabpanel" aria-labelledby="first-tab` + rowNum + `">
    <textarea class="form-control" rows="4" placeholder="Enter your message" maxlength="160" id="outboundLiveMessageBody` + rowNum + `" name="outboundLiveMessageBody` + rowNum + `" onkeyup="outboundLiveCalculateLetters(rowNum)"></textarea>
</div>`;
            document.getElementById('outboundLiveInputTabId').value = "outboundLiveTab" + rowNum;
            document.getElementById('outboundLiveTotalLetters').innerHTML = 160;
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

           /* scheduled sms delete message tab */
           function scheduledSmsDeleteTab() {
            var tab_del = $('#scheduledSmsInputTabId').val();
            if (tab_del != 'scheduledSmsTab1' && tab_del != '') {
                $('#' + tab_del).remove();
                var first_tab_del = $('#scheduledSmsInputFirstTabId').val();
                $('#' + first_tab_del).remove();
                $('#scheduledSmsFirstTab1').click();
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

        /*inbound off hours delli */
        function inboundOffHoursDelLi(li_id) {
            document.getElementById('inboundOffHoursInputFirstTabId').value = li_id;
            removeFirst = li_id.slice(6);
            document.getElementById('inboundOffHoursInputTabId').value = removeFirst;
        }

          /*scheduled sms delli */
          function scheduledSmsDelLi(li_id) {
            document.getElementById('scheduledSmsInputFirstTabId').value = li_id;
            removeFirst = li_id.slice(6);
            document.getElementById('scheduledSmsInputTabId').value = removeFirst;
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

        //toggle inbound off hours emoji div
        $("#inbound_off_hours_emoji_face").click(function () {
            $("#inbound_off_hours_emoji_div").toggle();
        });

        //toggle scheduled sms emoji div
        $("#scheduled_sms_emoji_face").click(function () {
            $("#scheduled_sms_emoji_div").toggle();
        });

        //toggle emoji div
        $("#emoji-face").click(function () {
            $("#emoji-div").toggle();
        });

        //    calculate letters
        function calculateLetters(rowNum) {
            let letters = document.getElementById('messageBody' + rowNum).value.length;
            let remainingLetters = 160 - letters;
            document.getElementById('total_letters').innerHTML = remainingLetters;
        }

        /* inboundOffHours calculate letters*/
        function inboundOffHoursCalculateLetters(rowNum) {
            let letters = document.getElementById('inboundOffHoursMessageBody' + rowNum).value.length;
            let remainingLetters = 160 - letters;
            document.getElementById('inboundOffHoursTotalLetters').innerHTML = remainingLetters;
        }

         /* scheduled sms calculate letters*/
         function scheduledSmsCalculateLetters(rowNum) {
            let letters = document.getElementById('scheduledSmsMessageBody' + rowNum).value.length;
            let remainingLetters = 160 - letters;
            document.getElementById('scheduledSmsTotalLetters').innerHTML = remainingLetters;
        }

        /* outboundLive calculate letters*/
        function outboundLiveCalculateLetters(rowNum) {
            let letters = document.getElementById('outboundLiveMessageBody' + rowNum).value.length;
            let remainingLetters = 160 - letters;
            document.getElementById('outboundLiveTotalLetters').innerHTML = remainingLetters;
        }

        //yes reply div hide
        function yesReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('yes_reply_div').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('yes_reply_div').style.display = 'block';
            } else {
                return;
            }
        }
        // inboundOffHours yes reply div hide
        function inboundOffHoursYesReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('inboundOffHoursYesReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('inboundOffHoursYesReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

           // scheduled sms yes reply div hide
           function scheduledSmsYesReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('scheduledSmsYesReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('scheduledSmsYesReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

        // outboundLive yes reply div hide
        function outboundLiveYesReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('outboundLiveYesReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('outboundLiveYesReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

        //no reply div hide
        function noReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('no_reply_div').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('no_reply_div').style.display = 'block';
            } else {
                return;
            }
        }

        // inboundOffHours no reply div hide
        function inboundOffHoursNoReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('inboundOffHoursNoReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('inboundOffHoursNoReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

           // scheduled sms no reply div hide
           function scheduledSmsNoReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('scheduledSmsNoReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('scheduledSmsNoReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

        // outboundLive no reply div hide
        function outboundLiveNoReplyRemove(val) {
            if (val == 'DNC') {
                document.getElementById('outboundLiveNoReplyDiv').style.display = 'none';
            } else if (val != 'DNC') {
                document.getElementById('outboundLiveNoReplyDiv').style.display = 'block';
            } else {
                return;
            }
        }

        /*perform action divs*/
        function showPerformActionsDiv() {
            if ($("#perform_action_message_div").is(":visible") == true) {
                document.getElementById('perform_action_message_div').style.display = "none";
            } else {
                document.getElementById('perform_action_message_div').style.display = "block";
            }
        }

        /*inboundOffHours perform action divs*/
        function inboundOffHoursShowPerformActionsDiv() {
            if ($("#inboundOffHoursPerformActionMessageDiv").is(":visible") == true) {
                document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = "none";
            } else {
                document.getElementById('inboundOffHoursPerformActionMessageDiv').style.display = "block";
            }
        }

         /*scheduled calls perform action divs*/
         function scheduledSmsShowPerformActionsDiv() {
            if ($("#scheduledSmsPerformActionMessageDiv").is(":visible") == true) {
                document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = "none";
            } else {
                document.getElementById('scheduledSmsPerformActionMessageDiv').style.display = "block";
            }
        }

        /*outboundLive perform action divs*/
        function outboundLiveShowPerformActionsDiv() {
            if ($("#outboundLivePerformActionMessageDiv").is(":visible") == true) {
                document.getElementById('outboundLivePerformActionMessageDiv').style.display = "none";
            } else {
                document.getElementById('outboundLivePerformActionMessageDiv').style.display = "block";
            }
        }

        /*insert emoji*/
        function insertEmoji(obj,text){
            var txtareaId = $('#myTabContent').find('div.active').find('textarea').attr('id')
            var txtarea = document.getElementById(txtareaId);
            if(!txtarea){
                return;
            }
            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
            var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
                "ff" : (document.selection ? "ie" : false));
            if(br == "ie"){
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart('character', -txtarea.value.length);
                strPos = range.text.length;
            }else if(br == "ff"){
                strPos = txtarea.selectionStart;
            }

            var front = (txtarea.value).substring(0, strPos);
            var back = (txtarea.value).substring(strPos, txtarea.value.length);
            txtarea.value = front + text + back;
            strPos = strPos + text.length;
            if(br == "ie"){
                txtarea.focus();
                var ieRange = document.selection.createRange();
                ieRange.moveStart('character', -txtarea.value.length);
                ieRange.moveStart('character', strPos);
                ieRange.moveEnd('character', 0);
                ieRange.select();
            }else if (br == "ff"){
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }
            txtarea.scrollTop = scrollPos;
        }

        /*----------------inbound off hours emoji insert function --------------------*/
        function inboundOffHoursInsertEmoji(obj,text){
            var txtareaId = $('#inboundOffHoursMyTabContent').find('div.active').find('textarea').attr('id')
            var txtarea = document.getElementById(txtareaId);
            if(!txtarea){
                return;
            }
            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
            var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
                "ff" : (document.selection ? "ie" : false));
            if(br == "ie"){
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart('character', -txtarea.value.length);
                strPos = range.text.length;
            }else if(br == "ff"){
                strPos = txtarea.selectionStart;
            }

            var front = (txtarea.value).substring(0, strPos);
            var back = (txtarea.value).substring(strPos, txtarea.value.length);
            txtarea.value = front + text + back;
            strPos = strPos + text.length;
            if(br == "ie"){
                txtarea.focus();
                var ieRange = document.selection.createRange();
                ieRange.moveStart('character', -txtarea.value.length);
                ieRange.moveStart('character', strPos);
                ieRange.moveEnd('character', 0);
                ieRange.select();
            }else if (br == "ff"){
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }
            txtarea.scrollTop = scrollPos;
        }

            /*----------------scheduled call emoji insert function --------------------*/
            function scheduledSmsInsertEmoji(obj,text){
            var txtareaId = $('#scheduledSmsMyTabContent').find('div.active').find('textarea').attr('id')
            var txtarea = document.getElementById(txtareaId);
            if(!txtarea){
                return;
            }
            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
            var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
                "ff" : (document.selection ? "ie" : false));
            if(br == "ie"){
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart('character', -txtarea.value.length);
                strPos = range.text.length;
            }else if(br == "ff"){
                strPos = txtarea.selectionStart;
            }

            var front = (txtarea.value).substring(0, strPos);
            var back = (txtarea.value).substring(strPos, txtarea.value.length);
            txtarea.value = front + text + back;
            strPos = strPos + text.length;
            if(br == "ie"){
                txtarea.focus();
                var ieRange = document.selection.createRange();
                ieRange.moveStart('character', -txtarea.value.length);
                ieRange.moveStart('character', strPos);
                ieRange.moveEnd('character', 0);
                ieRange.select();
            }else if (br == "ff"){
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }
            txtarea.scrollTop = scrollPos;
        }

        /*----------------outboundLive emoji insert function --------------------*/
        function outboundLiveInsertEmoji(obj,text){
            var txtareaId = $('#outboundLiveMyTabContent').find('div.active').find('textarea').attr('id')
            var txtarea = document.getElementById(txtareaId);
            if(!txtarea){
                return;
            }
            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
            var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
                "ff" : (document.selection ? "ie" : false));
            if(br == "ie"){
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart('character', -txtarea.value.length);
                strPos = range.text.length;
            }else if(br == "ff"){
                strPos = txtarea.selectionStart;
            }

            var front = (txtarea.value).substring(0, strPos);
            var back = (txtarea.value).substring(strPos, txtarea.value.length);
            txtarea.value = front + text + back;
            strPos = strPos + text.length;
            if(br == "ie"){
                txtarea.focus();
                var ieRange = document.selection.createRange();
                ieRange.moveStart('character', -txtarea.value.length);
                ieRange.moveStart('character', strPos);
                ieRange.moveEnd('character', 0);
                ieRange.select();
            }else if (br == "ff"){
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }
            txtarea.scrollTop = scrollPos;
        }
        // preview message 
      function messagePreview(id){
        
        var msg = $('#'+id).find('div.active').find('textarea').attr('id');
        let message = document.getElementById(msg).value;
        swal("Message Preview!", message,"info")
    
      }

        function dayCallSubmit(obj){
            let dayValue = document.getElementById('assignDayValue').value;
            document.querySelector("form[name="+obj.name+"] > input.dayName").value = dayValue;
        }
    // slick slider 
    $('.slick_event_btns').slick({

  slidesToShow: 5,
  slidesToScroll: 5,
  arrows: true,
  dots: false,
  responsive: [
    {
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

const schedulingEventFormHandler = (e) =>{
  
e.preventDefault();
$.ajax({
            type: 'GET',
            async: false,
            // url: $("#inboundOffHoursCallBasicFormHandler").attr("action"),
            url: e.target.action,
            // data: $("#scheduledCallEventEmailForm").serialize(),
            data: $("#"+e.target.id).serialize(),
            success: function(response) {
                if(response.success){
                    toastify(response.success, 'success');
                    }
                    else
                    {
                        toastify(response.error, 'error');
                        }
                        },
                        error: function (response) {
                            toastify('Please try again!', 'error');
                            },
                            });
}

</script>
@endsection