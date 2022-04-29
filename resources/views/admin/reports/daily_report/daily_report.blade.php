@extends('layouts.main')
@section('title','Daily Report')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Daily Report</h1>
                    </div>
                </div>
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <form class="form-inline">
                            <div class="form-group mb-1 ">  <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
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
                    <div class="col-md-12 mb-4">
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck1" type="checkbox">
                            <label class="custom-control-label text-white pt-f" for="customCheck1">Use lead's cost for $/LT.</label>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-11 mb-4">
                        <p class="text-white p-f"> <img src="{{asset('public/assets/img/icons/common/export.png')}}" /> Export as CSV</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="text-grey pl-3 pt-3 ">Jan. 14, 2022</h3>
                    <div class="table-responsive py-1">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Compaign</th>
                                <th>Leads</th>
                                <th>Leads Added</th>
                                <th>Live Calls</th>
                                <th>Transfers</th>
                                <th>Transfer %</th>
                                <th>Long Transfer</th>
                                <th>Long Transfer %</th>
                                <th>DNC</th>
                                <th>DNC %</th>
                                <th>Cost</th>
                                <th>$/LT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Medicare 2</td>
                                <td>0</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td> $0.17</td>
                                <td>$0.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-grey pl-3 pt-3">Jan. 14, 2022</h3>
                    <div class="table-responsive py-1">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Compaign</th>
                                <th>Leads</th>
                                <th>Leads Added</th>
                                <th>Live Calls</th>
                                <th>Transfers</th>
                                <th>Transfer %</th>
                                <th>Long Transfer</th>
                                <th>Long Transfer %</th>
                                <th>DNC</th>
                                <th>DNC %</th>
                                <th>Cost</th>
                                <th>$/LT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Medicare 2</td>
                                <td>0</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td> $0.17</td>
                                <td>$0.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-grey pl-3 pt-3">Jan. 14, 2022</h3>
                    <div class="table-responsive py-1">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Compaign</th>
                                <th>Leads</th>
                                <th>Leads Added</th>
                                <th>Live Calls</th>
                                <th>Transfers</th>
                                <th>Transfer %</th>
                                <th>Long Transfer</th>
                                <th>Long Transfer %</th>
                                <th>DNC</th>
                                <th>DNC %</th>
                                <th>Cost</th>
                                <th>$/LT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Medicare 2</td>
                                <td>0</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td>0</td>
                                <td>0%</td>
                                <td> $0.17</td>
                                <td>$0.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
