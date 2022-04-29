@extends('layouts.main')
@section('title','Calls Report')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Calls Report</h1>
                        <form class="form-inline">
                            <div class="form-group mb-1 pr-1">  <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                            <div class="form-group pl-1 pr-1 mb-2"> <button type="button" class="btn btn1 btn-light-purple disabled" disabled>
                                    <span class="btn-inner--icon">to</span>
                                </button></div>
                            <div class="form-group pl-1 pr-1 mb-2"> <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                            <div class="form-group pl-1 pr-1 mb-2">
                                <select class="form-control select label-filter-f" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group pl-1 pr-1 mb-2">
                                <select class="form-control select label-filter-f" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group pl-1 pr-1 mb-2"><button type="button" class="btn btn-secondary text-purple-f">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 mb-4">
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck1" type="checkbox">
                            <label class="custom-control-label text-white pt-f" for="customCheck1">Show deleted compaigns</label>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-10 mb-4">
                        <p class="text-white p-f"> <img src="{{asset('public/assets/img/icons/common/export.png')}}" /> Export as CSV</p>
                    </div>
                    <div class="col-md-2 mb-4">
                        <button class="btn btn-link " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('public/assets/img/icons/common/filter1.png')}}" alt="filter">
                        </button>
                        <ul class="dropdown-menu pl-2" aria-labelledby="dropdownMenuButton">

                            <li><a href="#"  data-value="filter_campaign" tabindex="-1"><input type="checkbox" id="filter_campaign" >&nbsp;Campaign</a></li>
                            <li><a href="#"  data-value="filter_source" tabindex="-1"><input type="checkbox" id="filter_source">&nbsp;Source</a></li>
                            <li><a href="#"  data-value="filter_live_calls" tabindex="-1"><input type="checkbox" id="filter_live_calls" >&nbsp;Live Calls</a></li>
                            <li><a href="#"  data-value="filter_inbound_calls" tabindex="-1"><input type="checkbox" id="filter_inbound_calls" >&nbsp;Inbound Calls</a></li>
                            <li><a href="#"  data-value="filter_outbound_calls" tabindex="-1"><input type="checkbox" id="filter_outbound_calls" >&nbsp;Outbound Calls</a></li>
                            <li><a href="#"  data-value="filter_answer_rate" tabindex="-1"><input type="checkbox" id="filter_answer_rate" >&nbsp;Answer Rate</a></li>
                            <li><a href="#" data-value="filter_transfers" tabindex="-1"><input type="checkbox" id="filter_transfers">&nbsp;Transfers</a></li>
                            <li><a href="#"  data-value="filter_transfer_percent" tabindex="-1"><input type="checkbox" id="filter_transfer_percent" >&nbsp;Transfer %</a></li>
                            <li><a href="#"  data-value="filter_long_transfers" tabindex="-1"><input type="checkbox" id="filter_long_transfers" >&nbsp;Long Transfers</a></li>
                            <li><a href="#"  data-value="filter_long_transfer_percent" tabindex="-1"><input type="checkbox" id="filter_long_transfer_percent" >&nbsp;Long Transfer %</a></li>
                            <li><a href="#"  data-value="filter_failed_transfers" tabindex="-1"><input type="checkbox" id="filter_failed_transfers" >&nbsp;Failed Transfers</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>

                                <th>Compaigns</th>
                                <th>Source</th>
                                <th>Live Calls</th>
                                <th>Inbound Calls</th>
                                <th>Outbound Calls</th>
                                <th>Answer Rate</th>
                                <th>Transfers</th>
                                <th>Transfer %</th>
                                <th>Long Transfer %</th>
                                <th>Failed Transfer %</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">

                                <td>Medicare</td>
                                <td></td>
                                <td>7</td>
                                <td>7</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr class="table-">

                                <td>Medicare</td>
                                <td></td>
                                <td>7</td>
                                <td>7</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr class="table-">

                                <td>Medicare</td>
                                <td></td>
                                <td>7</td>
                                <td>7</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr class="table-">

                                <td>Medicare</td>
                                <td></td>
                                <td>7</td>
                                <td>7</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr class="table-">

                                <td>Medicare</td>
                                <td></td>
                                <td>7</td>
                                <td>7</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
                <h1 class="h1-f-purple">Total Calls : 0</h1>
            </div>
            <div class="col-md-1">
                <img src="{{asset('public/assets/img/icons/common/bar.png')}}" class="bar-img-f" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h3>Transfer : <span class="text-muted text-muted-f">0</span></h3>
            </div>
            <div class="col-md-5">
                <h3>Transfer : <span class="text-muted text-muted-f">0 (Transfer to long transfer: 0.0%)</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="chart">
                    <canvas id="chart-pie" class="chart-canvas" data-update='{"data":{"datasets":[{"data":[100,0,0,0,0]}]}}'></canvas>
                </div>
            </div>
        </div>
    @endsection
