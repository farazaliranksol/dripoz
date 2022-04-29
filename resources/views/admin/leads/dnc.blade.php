@extends('layouts.main')
@section('title','DNC')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">DNC</h6>
                </div>
            </div>
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7 mt--6">
                    <small class="text-white">{{--
                        Performance Last 7 days--}}
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
                <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#upload-dnc" aria-expanded="true">Upload DNC</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#search-dnc" aria-expanded="false">Search DNC</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#export-dnc" aria-expanded="false">Export DNC</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#state-dnc" aria-expanded="false">State DNC</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#blacklist" aria-expanded="false">Blacklist</a></li>
                        </ul>
                </div>
                    <div class="tab-content">
                        {{--upload-dnc--}}
                        <div id="upload-dnc" class="tab-pane active" style="padding-top: 10px;">
                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <div class="well col-xs-12">
                                        <h4><b>Upload instructions</b></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <small>You can upload a <b>CSV file</b> up to 10MB. If your file exceeds 10MB (roughly 50,000 contacts), you will need to upload multiple files as separate lists.</small>
                                </div>
                            </div>

                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <h4 style="font-weight: bold;">Upload Do Not Call List File</h4>
                                </div>
                                <div class="card-body" >
                                    <div class="well col-xs-12">
                                        <form id="dnc-upload-form" method="Post" action="{{route('dnc.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-xs-12">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file" id="customFile" accept="text/csv" lang="en" required>
                                                    <label class="custom-file-label" for="customFile">Select file</label>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 float-right">
                                                <button type="submit" name="submit" value="dnc" class="btn btn-primary btn btn-primary pull-right dnc-submit-button" id="submit-id-submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <div class="well col-xs-12">
                                        <h4 style="font-weight: bold;">Add To Your Company DNC List</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="well col-xs-12">
                                        <div class="form-group col-xs-3">
                                            <input type="text" id="dnc_add" class="form-control" placeholder="Input a phone number..."><br>
                                            <span class="input-group-btn float-right">
                                            <button class="browse btn btn-default" type="button" id="dnc-add-button">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                         </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <div class="col-md-12 well">
                                        <h4><b>DNC Uploads - Last 60 Days</b></h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush table-hover">
                                            <thead class="thead-light">
                                                <tr role="row">
                                                    <th>Date</th>
                                                    <th >File Type</th>
                                                    <th>Status</th>
                                                    <th>Filename</th>
                                                    <th>Total</th>
                                                    <th>Valid</th>
                                                    <th>Invalid</th>
                                                    <th>Duplicates</th>
                                                    <th>Options</th></tr>
                                                </thead>
                                                <tbody>

                                                @foreach($list as $key)
                                                <tr>
                                                    <td>{{$key->created_at}}</td>
                                                    <td>DNC</td>
                                                    <td> Success</td>
                                                    <td> {{$key->title}}</td>
                                                    <td> {{$key->total_contacts}}</td>
                                                    <td> {{$key->valid}}</td>
                                                    <td> {{$key->invalid}}</td>
                                                    <td> {{$key->duplicates}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="float-right" >
                                                <a class="btn btn-primary my-4" aria-controls="upload-table" data-dt-idx="0" tabindex="0" id="upload-table_previous">Previous</a>&nbsp;
                                                <a class="btn btn-primary my-md-4" aria-controls="upload-table" data-dt-idx="1" tabindex="0" id="upload-table_next">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        {{--search-dnc--}}
                        <div id="search-dnc" class="tab-pane" style="padding-top: 10px;">
                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <h4 style="font-weight: bold;">Search Your Company DNC List</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group col-xs-3">
                                        <input type="text" id="dnc_lookup" class="form-control" placeholder="Input a phone number..."><br>
                                        <span class="input-group-btn float-right" >
                                            <button class="browse btn btn-default" type="button" id="dnc-lookup-button">
                                                <i class="fa fa-search"></i> Lookup
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--export-dnc--}}
                        <div id="export-dnc" class="tab-pane" style="padding-top: 10px;">

                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <h4><b>Export DNC Instructions</b></h4>
                                </div>
                                <div class="card-body">
                                    <small>You can create an export DNC request here. Your request will be queued and you will receive an email upon completion.</small>
                                    <div class="col-xs-12 pull-right">
                                        <p></p>
                                        <input type="submit" name="submit" value="Export" class="btn btn-primary btn btn-primary center-block" id="export-dnc-button" style="width: 120px;" onclick="ExportDNC();">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--state-dnc--}}
                        <div id="state-dnc" class="tab-pane" style="padding-top: 10px;">

                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <h4 style="font-weight: bold;">Configure Your Company State DNC List</h4>
                                </div>
                                <div class="card-body">
                                    <div id="div-select-list" class="col-xs-12" style="padding: 0px;">
                                        <p><span class="help-block m-b-none"></span></p>
                                        <label>
                                            Select State(s)
                                        </label>
                                        <select class="select form-control" id="stateSelection" multiple>
                                            @php
                                                $state = getStateArray();
                                            @endphp
                                            @foreach($state as $key=>$value)
                                                <option value="{{$key}}">
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                        </select><br>

                                    <div class="col-xs-12">
                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn btn-primary pull-right state-dnc-submit-button" id="state-dnc-submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{--black-list--}}
                        <div id="blacklist" class="tab-pane" style="padding-top: 10px;">
                            <div class="card" style="margin: 30px;">
                                <div class="card-header">
                                    <h4 style="font-weight: bold;">Check Your Company Blacklist</h4>
                                </div>
                                <div class="card-body">
                                    <input type="text" id="number_blacklist" class="form-control" placeholder="Input a phone number..."><br>
                                    <span class="input-group-btn float-right">
                                        <button class="browse btn btn-default" type="button" id="blacklist-button">
                                            <i class="fa fa-search"></i> Lookup
                                        </button>
                                     </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var multipleCancelButton = new Choices('#stateSelection', {
            removeItemButton: true,
        });
    });
@endsection
