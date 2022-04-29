@extends('layouts.main')
@section('title','Speed Report')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-3 d-block">Speed Report</h1>
                        <form class="form-inline">
                            <div class="form-group mb-1">  <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                            <div class="form-group pl-1 pr-1 mb-2"> <button type="button" class="btn btn1 btn-light-purple disabled" disabled>
                                    <span class="btn-inner--icon">to</span>
                                </button></div>
                            <div class="form-group pl-1 pr-1 mb-2"> <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                            <div class="form-group pl-1 pr-1 mb-2">
                                <select class="form-control select label-filter-f" id="exampleFormControlSelect1">
                                    <option>All Compaigns</option>
                                </select>
                            </div>

                            <div class="form-group pl-1 pr-1 mb-2"><button type="button" class="btn btn-secondary text-purple-f">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck1" type="checkbox">
                            <label class="custom-control-label text-white pt-f" for="customCheck1">Show deleted compaigns</label>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 mb-4 text-right">
                        <p class="text-white p-f"> <img src="{{asset('public/assets/img/icons/common/export.png')}}" /> Export as CSV</p>
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
                                <th>Compaign</th>
                                <th>Average 1 <sup>st</sup> Contract</th>
                                <th>Average 1 <sup>st</sup> Transfer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">
                                <td>Medicare</td>
                                <td>N/A</td>
                                <td>N/A</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-fade">Note: This report is only accurate if you are posting conversion data back to the converted leads. All dates are in UTC.</p>
            </div>
        </div>
     @endsection
