@extends('layouts.main')
@section('title','CDRs')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">CDRs</h1>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container billing-container p-3 pl-2 pr-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="h2-f text-white">Export CDRs</h1>
                                        <p class="text-white">To perform an export please select a date below and click export.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline">
                                        <div class="form-group mb-1">  <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here"></div>
                                        <div class="form-group pl-1 pr-1 mb-1"><button type="button" class="btn btn-secondary text-purple-f">Export</button></div>
                                    </form>
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
                                <th>File Type</th>
                                <th>Filename</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">
                                <td class="table-user">
                                    2021-11-18
                                </td>
                                <td>
                                    CSV
                                </td>
                                <td>
                                    cdr-export-2021-11-18-469040.csv
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><img src="{{asset('public/assets/img/icons/common/export.png')}}" /></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
