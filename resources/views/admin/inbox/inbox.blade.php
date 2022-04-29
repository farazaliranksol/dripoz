@extends('layouts.main')
@section('title','Inbox')
@section('content')
<div class="container-fluid " id="inbox-container-f">
    <div class="row">
        <div class="col-md-12 col-lg-3 col-xl-3 col-sm-12 pl-0 pr-0">
            <div class="header">
                <div class="container-fluid pr-0 " id="inbox-container-f1">
                    <div class="header-body">
                        <div class="row row-f">
                            <div class="col-md-12 pl-0 pr-0">
                                <div class="container-fluid" id="inbox-container-f2">
                                    <div class="row">
                                        <div class="col-md-12 pl-0 pr-0">
                                            <h1 class="d-inline-block mb-0 d-block bg-white text-purple-f inbox_head_msg d-flex align-items-center justify-content-between" id="lead-report">Messages
                                                <a class="p-0 text-purple-f "  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings-gear-65 seting_icon"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-f" aria-labelledby="dropdownMenuButton">
                                                    <li class="dropdown-item" href="#">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input class="custom-control-input" id="customCheck1" type="checkbox">
                                                            <label class="custom-control-label  pt-f" for="customCheck1"> Show Messages from Active Leads Only
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item" href="#">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input class="custom-control-input" id="customCheck2" type="checkbox">
                                                            <label class="custom-control-label pt-f" for="customCheck2"> Date Range Filter
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <form class="form-inline pl-3">
                                                            <div class="form-group mb-1">
                                                                <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here">
                                                            </div>
                                                            <div class="form-group pl-0 pr-0 mb-2">
                                                                <button type="button" class="btn btn-light-purple pb-2 pt-3 disabled" disabled>
                                                                    <span class="btn-inner--icon">to</span>
                                                                </button>
                                                            </div>
                                                            <div class="form-group pl-0 pr-0 mb-2">
                                                                <input type="date" class="form-control d-inline date-filter-f" placeholder="Search Here">
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row inbox_side_menu">
                                        <div class="col-lg-12 col-12  pl-1 pr-0">
                                            <ul class="list-group" id="list-group-f">
                                                <li class="list-group-item">Inbox</li>
                                                <li class="list-group-item">Done</li>
                                                <li class="list-group-item">Label</li>
                                                <li class="list-group-item">DNC
                                                    <span class="badge badge-dot mr-4 float-right">
                                                        <i class="bg-danger"></i>
                                                    </span>
                                                </li>
                                                <li class="list-group-item">Scheduled
                                                    <span class="badge badge-dot mr-4 float-right">
                                                        <i class="bg-info"></i>
                                                    </span>
                                                </li>
                                                <li class="list-group-item">No Intention
                                                    <span class="badge badge-dot mr-4 float-right">
                                                        <i class="bg-warning"></i>
                                                    </span>
                                                </li>
                                                <li class="list-group-item">Closed
                                                    <span class="badge badge-dot mr-4 float-right">
                                                        <i class="bg-success"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 col-xl-9  pl-0 pr-0">
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-12 col-12">
                                <form class="form-inline">
                                    <div class="form-group pl-1 pr-1 mb-2">
                                        <button class="btn btn-secondary text-purple-f btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Filter
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                        </div>
                                    </div>
                                    <div class="form-group pl-1 pr-1 mb-2">
                                        <button class="btn btn-secondary text-purple-f btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="table-responsive py-1">
                                <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>From</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>+16183187581</td>
                                        <td>i am just being lazy now just finished a snack i wanted take you to so answer i just grab snack </td>
                                        <td>13 hours ago</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $('.dropdown-menu-f').click(function(e) {
        e.stopPropagation();
    });
</script>
