@extends('layouts.main')
@section('title','Schedules')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Schedules</h1>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container billing-container p-3 pl-2 pr-2">

                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline">
                                        <div class="form-group mb-1">  <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                                        <div class="form-group pl-1 pr-1 mb-2"> <button type="button" class="btn btn1 btn-light-purple disabled" disabled>
                                                <span class="btn-inner--icon">to</span>
                                            </button></div>
                                        <div class="form-group pl-1 pr-1 mb-2"> <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                                        <div class="form-group pl-1 pr-1 mb-2"><button type="button" class="btn btn-secondary text-purple-f">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4 text-right">
                                    <p class="text-white p-f"><img src="{{asset('public/assets/img/icons/common/export.png')}}"/>
                                        Export as CSV</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
                                <th>Date</th>
                                <th>Lead</th>
                                <th>Phone Number</th>
                                <th> Transfered</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">
                                <td class="table-user">
                                    January 14, 2022, 05:00 PM
                                </td>
                                <td>
                                    3xenolo
                                </td>
                                <td>
                                    +12399977349
                                </td>
                                <td>
                                    No
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
