@extends('layouts.main')
@section('title','Sentiment Report')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Sentiment Report</h1>
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
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox mb-3 ml-2 mr-2 mt-2 d-flex align-items-center">
                                    <input class="custom-control-input" id="customCheck2" type="checkbox">
                                    <label class="custom-control-label text-white align-items-baseline" for="customCheck2">Sub1</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox mb-3 ml-2 mr-2 mt-2 d-flex align-items-center">
                                    <input class="custom-control-input" id="customCheck3" type="checkbox">
                                    <label class="custom-control-label text-white align-items-baseline" for="customCheck3">Sub2</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox mb-3 ml-2 mr-2 mt-2 d-flex align-items-center">
                                    <input class="custom-control-input" id="customCheck4" type="checkbox">
                                    <label class="custom-control-label text-white align-items-baseline" for="customCheck4">Sub3</label>
                                </div>
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
                    <div class="col-md-11 mb-4">
                        <p class="text-white p-f"> <img src="{{asset('public/assets/img/icons/common/export.png')}}" /> Export as CSV</p>
                    </div>
                    <div class="col-md-1 mb-4">
                        <img src="{{asset('public/assets/img/icons/common/filter1.png')}}" alt="filter">
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
                                <th>Sentiment</th>
                                <th>Count</th>
                                <th>Percentage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">
                                <td>English</td>
                                <td>1</td>
                                <td>50%</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
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
