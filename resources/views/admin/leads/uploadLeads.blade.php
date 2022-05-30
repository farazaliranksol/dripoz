@extends('layouts.main')
@section('title','Upload Leads')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Uplaod Leads</h6>
                </div>
            </div>
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7 mt--6">
                    <small class="text-white">
                        {{--Performance Last 7 days--}}
                    </small>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Active leads</h6>
                                    <span class="h2 font-weight-bold mb-0">3508</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-sound-wave"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">live/outbound calls</h6>
                                    <span class="h2 font-weight-bold mb-0">999/1</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Sales</h6>
                                    <span class="h2 font-weight-bold mb-0">924</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Long Transfers/Transfer</h6>
                                    <span class="h2 font-weight-bold mb-0">56,623</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->
                <div class="card-header" >
                    <h3>Upload instructions</h3>
                </div>
                <div class="card-body">
                    <small>
                        You can upload a CSV file up to 10MB. If your file exceeds 10MB (roughly 50,000 contacts), you will need to upload multiple files as separate lists.<br>
                        Please format the first row of your columns with the proper column names, i.e.: "First Name," "Last Name," "Phone Number", "Sub1", "Sub2", "Sub3" and "ZIP Code." <br>For more information, see our help documentation. Files without proper column headers will be rejected.<br>
                        <strong>Note:</strong> Only the Phone Number field is required; all other fields are optional.<br>
                       <strong>Note:</strong>  Uploading leads to a running campaign will cause the leads to be processed immediately as though they were posted live.<br>
                        Each unique uploaded lead will incur a cost of $.005. This one time fee is to check for validity, get carrier information, and check if the phone number is sms enabled.<br>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Leads Upload-Last 60 days
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="table-check-all" type="checkbox" onchange="checkAll(this)">
                                        <label class="custom-control-label" for="table-check-all"></label>
                                    </div>
                                </th>
                                <th>Date</th>
                                <th>File Type</th>
                                <th>Status</th>
                                <th>File Name</th>
                                <th>Campaigns</th>
                                <th>Total</th>
                                <th>Valid</th>
                                <th>Invalid</th>
                                <th>Duplicates</th>
                                <th>Options</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phoneBook as $record)
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="column-check" type="checkbox">
                                            <label class="custom-control-label" for="column-check"></label>
                                        </div>
                                    </th>
                                    <td class="table-user">
                                        <b>{{$record->created_at}}</b>
                                    </td>
                                    <td>
                                        <b>Leads</b>
                                    </td>
                                    <td class="table-user">
                                        <b> Success</b>
                                    </td>
                                    <td class="table-user">
                                        <b>{{$record->title}}</b>
                                    </td>
                                    <td class="table-user">
                                        <b>	@foreach($camp as $c)
                                                @if($c->id == $record->camp_id)
                                                    {{$c->name}}
                                                @endif
                                            @endforeach</b>
                                    </td>
                                    <td class="table-user">
                                        <b>{{$record->total_contacts}}</b>
                                    </td>
                                    <td class="table-user">
                                        <b>	{{$record->valid}}</b>
                                    </td>
                                    <td class="table-user">
                                        <b>{{$record->invalid}}</b>
                                    </td>
                                    <td class="table-user">
                                        <b>{{$record->duplicates}}</b>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" >
                    <h3>
                        Upload Leads
                    </h3>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{route('uploadLeads.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="radio" name="campaign" id="campaign" checked onchange="valueChanged(this)"> Campaign &nbsp;
                        <input type="radio" name="campaign" id="abTest" onchange="valueChanged(this)"> AB Test <br>
                        <br>
                        <div class="row">
                            <div class="col-md-8" id="camp">
                                <label>
                                    Campaign*
                                </label><br>
                                <select id="camp_select" class="select form-control" name="camp_select" style="width: 70%" required>
                                    @foreach($camp as $c)
                                    <option value={{$c->id}}>{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8" id="ab" style="display: none;">
                                <label>
                                    AB Test*
                                </label><br>
                                <select id="ab_select" class="select form-control" name="ab_select" style="width: 70%;">
                                    <option value=""> ------------ </option>
                                </select>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-8">
                                <label>
                                    Mobile Option*
                                </label>
                                <select name="mobile_options" class="form-control select form-control" required="required" id="id_mobile_options">
                                    <option value="all">Upload All Phone Numbers</option>
                                    <option value="mobile">Upload Mobile Numbers Only</option>
                                    <option value="landline">Upload LandLine Numbers Only</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Duplicate Option*</label>
                                <select name="duplicate_options" class="form-control select form-control" required="required" id="id_duplicate_options">
                                    <option value="leads">Remove Duplicates - All Leads</option>
                                    <option value="campaign">Remove Duplicates - Campaign</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="customFile" accept="text/csv" lang="en" required>
                                    <label class="custom-file-label" for="customFile">Select file</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center float-left">
                                <button type="submit" class="btn btn-primary my-4">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

function valueChanged()
{
    if($('#abTest').is(":checked")){
        $('#camp').hide();
        $("#ab").show();
    }else{
        $("#ab").hide();
        $("#camp").show();
    }

}
function checkAll(){
    if ($('#table-check-all').is(':checked')) {
        $('div input[type=checkbox]').attr('checked', true);
    } else {
        $('div input[type=checkbox]').attr('checked', false);
    }

}


</script>
@endsection
