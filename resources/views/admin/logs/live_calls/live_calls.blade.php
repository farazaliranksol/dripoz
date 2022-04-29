@extends('layouts.main')
@section('title','Live Calls')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                    <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Live Call log</h1>
                    </div>
                        <div class="col-lg-2 col-sm-12">
                            <select class="form-control select label-filter-f mb-1"
                                    id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 mb-4 text-right">
                        <p class="text-white p-f"><img src="{{asset('public/assets/img/icons/common/export.png')}}"/>
                            Export as CSV</p>
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
                                <th>Number</th>
                                <th>Lead</th>
                                <th>Direction</th>
                                <th>Phone</th>
                                <th>Duration</th>
                                <th>Transfer Duration</th>
                                <th>Compaign</th>
                                <th>Sub1</th>
                                <th>Sub2</th>
                                <th>Sub3</th>
                                <th>Date</th>
                                <th>Keypress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">
                                <td class="table-user">
                                    +16183187581
                                </td>
                                <td>
                                    midnea2d
                                </td>
                                <td>
                                    inbound
                                </td>
                                <td>
                                    +16183187581
                                </td>
                                <td>
                                    0
                                </td>
                                <td>0</td>
                                <td>Medicare 2</td>
                                <td>ican</td>
                                <td>ican</td>
                                <td>ican</td>
                                <td>01-04-2022</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
