@extends('layouts.main')
@section('title','Leads Explorer')
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
                                                <h1 class=" mb-0 d-flex align-items-center bg-white text-purple-f leads_head" id="lead-report">
                                                    <div>Leads</div> <div class="custom-control custom-checkbox ml-3 d-flex">
                                                        <input class="custom-control-input" id="customCheck" type="checkbox">
                                                        <label class="custom-control-label  pt-f" for="customCheck"> View Archive
                                                        </label>
                                                    </div></h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-12  pl-1 pr-0 pt-f">
                                                <ul id="lead-explorer-f">
                                                    <li class="nav-item">
                                                        <a href="#navbar-multilevel" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-multilevel">  Leads <i class="ni ni-bold-down"></i>
                                                            <i class="ni ni-bold-up d-none"></i> </a>
                                                        <div class="collapse" id="navbar-multilevel" >
                                                            <ul class="nav nav-sm flex-column pt-2 ">
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Campaign <i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <form method="post" action="">
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            @foreach($camp as $value)
                                                                                <a class="dropdown-item" href="#" onclick="getValue(this)">{{$value->name}}</a>
                                                                            @endforeach
                                                                        </div>
                                                                    </form>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        File<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        @foreach($phoneBook as $value)
                                                                            <a class="dropdown-item" href="#" onclick="getValue(this)">{{$value->title}}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Day<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: auto; height:200px">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">0</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">1</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">2</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">3</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">4</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">5</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">6</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">7</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">8</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">9</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">10</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">11</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">12</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">13</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Status<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Active</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Close</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">DNC</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Converted</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f  p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Sms Enabled<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Yes</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">NO</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-md-4 col-form-label form-leads-input form-control-label text-md-right">After</label>
                                                                        <div class="col-md-6">
                                                                            <input class="form-control " type="date" value="John Snow" id="example-text-input-leads">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input1" class="col-md-4 col-form-label form-leads-input form-control-label text-md-right">Before</label>
                                                                        <div class="col-md-6">
                                                                            <input class="form-control " type="date" value="John Snow" id="example-text-input1-leads">
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#navbar-multilevel1" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-multilevel">Activity <i class="ni ni-bold-down"></i> <i class="ni ni-bold-up d-none"></i></a>
                                                        <div class="collapse" id="navbar-multilevel1">
                                                            <ul class="nav nav-sm flex-column pt-2">
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Live Calls <i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">one</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Some</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">None</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Sms<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">one</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Some</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">None</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Transfers<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">one</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Some</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">None</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item text-center">
                                                                    <button class="btn btn-secondary text-purple-f p-leads-f" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Long Transfers<i class="fa fa-plus"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">Yes</a>
                                                                        <a class="dropdown-item" href="#" onclick="getValue(this)">No</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#navbar-multilevel2" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-multilevel"> Search Leads Fields<i class="ni ni-bold-down"></i> <i class="ni ni-bold-up d-none"></i></a>
                                                        <div class="collapse" id="navbar-multilevel2">
                                                            <ul class="nav nav-sm flex-column">
                                                                <li class="nav-item">
                                                                    <input type="text" class="form-control form-leads-input-f" placeholder="Phone">
                                                                </li>
                                                                <li class="nav-item">
                                                                    <input type="text" class="form-control form-leads-input-f" placeholder="Sub1">
                                                                </li>
                                                                <li class="nav-item">
                                                                    <input type="text" class="form-control form-leads-input-f" placeholder="Sub2">
                                                                </li>
                                                                <li class="nav-item">
                                                                    <input type="text" class="form-control form-leads-input-f" placeholder="Sub3">
                                                                </li>
                                                            </ul>
                                                        </div>
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
                            <div class="row align-items-center pb-2 pt-2">
                                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 mb-1">
                                    <p class="text-white p-f">  <a href = "{{ route('fileExport') }}" style="color: white;"> <span class="lead-pointer">
                                            <img src="{{asset('public/assets/img/icons/common/export.png')}}">  Export as CSV</span></a>
                                        <a data-toggle="modal" data-target="#edit_modal" class="pl-3 lead-pointer">
                                            <img src="{{asset('public/assets/img/icons/common/edit.png')}}" class="h-f"> Edit</a> </p>
                                    <div class="modal fade show" tabindex="-1" role="dialog" id="edit_modal">
                                        <div class="modal-dialog modal-dialog-centered w-auto" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Bulk Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('edit_file')}}">
                                                    @csrf
                                                <div class="modal-body">
                                                    <h1>All lead(s) will be affected.</h1>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">

                                                                <select id="show_numbers_list" name="edit_option" class="select form-control">
                                                                    <option value="select">Choose Action</option>
                                                                    <option value="0">Reset the Leads</option>
                                                                    <option value="1">DNC the Leads</option>
                                                                    <option value="2">Close the Leads</option>
                                                                    <option value="3">Delete the Leads</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 mb-1 text-right">
                                    <a class="p-0 text-purple-f p-f "  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{asset('public/assets/img/icons/common/filter1.png')}}">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck1" type="checkbox" name="phone" checked>
                                                <label class="custom-control-label  pt-f" for="customCheck1" > Phone Number
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck2" type="checkbox" name="first" checked>
                                                <label class="custom-control-label  pt-f" for="customCheck2"> Firstname
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck3" type="checkbox" name="last" checked>
                                                <label class="custom-control-label  pt-f" for="customCheck3"> Lastname
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck4" type="checkbox" name="day" checked>
                                                <label class="custom-control-label  pt-f" for="customCheck4"> Day
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck5" type="checkbox" name="campaign" checked>
                                                <label class="custom-control-label  pt-f" for="customCheck5"> Campaign
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck6" type="checkbox" name="transfer">
                                                <label class="custom-control-label  pt-f" for="customCheck6"> Transfers
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck7" type="checkbox" name="live_call">
                                                <label class="custom-control-label  pt-f" for="customCheck7"> Live Calls
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck8" type="checkbox" name="in_call">
                                                <label class="custom-control-label  pt-f" for="customCheck8"> Inbound Calls
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck9" type="checkbox" name="out_call">
                                                <label class="custom-control-label  pt-f" for="customCheck9"> Outbound Calls
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck10" type="checkbox" name="in_sms">
                                                <label class="custom-control-label  pt-f" for="customCheck10"> SMS Received
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck11" type="checkbox" name="out_sms">
                                                <label class="custom-control-label  pt-f" for="customCheck11"> SMS Sent
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck12" type="checkbox" name="created">
                                                <label class="custom-control-label  pt-f" for="customCheck12"> Date Created
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck13" type="checkbox" name="last_call">
                                                <label class="custom-control-label  pt-f" for="customCheck13"> Last Call
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck14" type="checkbox" name="sub1">
                                                <label class="custom-control-label  pt-f" for="customCheck14"> Sub1
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck15" type="checkbox" name="sub2">
                                                <label class="custom-control-label  pt-f" for="customCheck15"> Sub2
                                                </label>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" href="#">
                                            <div class="custom-control custom-checkbox mb-1">
                                                <input class="custom-control-input" id="customCheck16" type="checkbox" name="sub3">
                                                <label class="custom-control-label  pt-f" for="customCheck16"> Sub3
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt--6">
                    <!-- Table -->
                    <div class="row">
                        <div class="col" id="table-blur">
                            <div class="card">
                                <div class="table-responsive py-4">
                                    <table class="table table-flush" id="datatable-basic">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="phone">Phone</th>
                                            <th class="first">First</th>
                                            <th class="last">Last</th>
                                            <th class="day">Day</th>
                                            <th class="campaign">Campaign</th>
                                            <th class="transfer">Transfer</th>
                                            <th class="live_call">Live Calls</th>
                                            <th class="in_call">In Calls</th>
                                            <th class="out_call">out Calls</th>
                                            <th class="in_sms">In SMS</th>
                                            <th class="out_sms">out SMS</th>
                                            <th class="created">Created</th>
                                            <th class="last_call">Last Call</th>
                                            <th class="sub1">Sub 1</th>
                                            <th class="sub2">Sub 2</th>
                                            <th class="sub3">Sub 3</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr >
                                            <th class="phone">Phone</th>
                                            <th class="first">First</th>
                                            <th class="last">Last</th>
                                            <th class="day">Day</th>
                                            <th class="campaign">Campaign</th>
                                            <th class="transfer">Transfer</th>
                                            <th class="live_call">Live Calls</th>
                                            <th class="in_call">In Calls</th>
                                            <th class="out_call">out Calls</th>
                                            <th class="in_sms">In SMS</th>
                                            <th class="out_sms">out SMS</th>
                                            <th class="created">Created</th>
                                            <th class="last_call">Last Call</th>
                                            <th class="sub1">Sub 1</th>
                                            <th class="sub2">Sub 2</th>
                                            <th class="sub3">Sub 3</th>
                                        </tfoot>
                                        <tbody>
                                        @foreach($leads as $value)
                                            <tr data-toggle="modal" data-target="#detail_modal" onclick="setText({{$value->id}})" id="{{$value->id}}">
                                                <td class="phone">{{$value->phone_number}}</td>
                                                <td class="first"> {{$value->first_name}}</td>
                                                <td class="last">{{$value->last_name}}</td>
                                                <td class="day">0</td>
                                                <td class="campaign">{{$value->camp_name}}</td>
                                                <td class="transfer">0</td>
                                                <td class="live_call">1</td>
                                                <td class="in_call">0</td>
                                                <td class="out_call">0</td>
                                                <td class="in_sms">0</td>
                                                <td class="out_sms">2 days</td>
                                                <td class="created"> 5 days ago	</td>
                                                <td class="last_call"> -- </td>
                                                <td class="sub1">{{$value->sub1}}</td>
                                                <td class="sub2">{{$value->sub2}}</td>
                                                <td class="sub3">{{$value->sub3}}</td>
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

            <!--left details modal-->
            <div class="modal fade show" tabindex="-1" role="dialog" id="detail_modal" style=" max-width:590px;left: 830px;">
                <div class="modal-dialog modal-dialog-centered w-auto" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height: 30px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="overflow: auto; height: 880px;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#info" aria-expanded="false">Information</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity" aria-expanded="false">Activity</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#statistics" aria-expanded="false">Statistics</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    {{--info--}}
                                    <div id="info" class="tab-pane active" >
                                            {{--header--}}
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col" style="display: inline;">
                                                    <label style="font-weight: bold;font-size: 12px;">
                                                        CONTACT DETAIL
                                                    </label>&nbsp;
                                                    <button id="set-deleted-button" onclick="deleteRecord()" class="btn btn-sm " style="width: 70px;height: 40px;font-size: 13px;padding:0px; ">
                                                        <i class="fa fa-trash"></i>&nbsp; Delete</button>
                                                    <button id="set-dnc-button" class="btn btn-sm" style="width: 70px;height: 40px;font-size: 13px;padding:0px;">
                                                        <i class="fa fa-ban"></i>&nbsp; DNC</button>
                                                    <button id="set-closed-button" class="btn btn-sm" style="width: 70px;height: 40px;font-size: 13px;padding:0px;">
                                                        <i class="fa fa-times-circle" style="background-size: cover;" ></i>&nbsp; Close</button>
                                                    <button class="btn btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 70px;height: 40px;font-size: 13px;padding:0px;">
                                                        &nbsp; More</button>
                                                    <div class="dropdown" style="display: flex;top: -35px!important; left: -30px;!important">
                                                        <ul class="dropdown-menu" style="">
                                                            <li style="text-align: center;">
                                                                <a href="#" class="dropdown-item"><i class="fa fa-phone" style="float: left; padding-top: 2px;"></i>
                                                                    <span style="">&nbsp; Call Now</span>
                                                                </a>
                                                            </li>
                                                            <li style="text-align: center;">
                                                                <a href="#" class="dropdown-item"><i class="fa fa-calendar" style="float: left; padding-top: 2px;"></i>
                                                                    <span style="">&nbsp; Schedule Call</span>
                                                                </a>
                                                            </li>
                                                            <li style="text-align: center;">
                                                                <a href="#" class="dropdown-item"><i class="fa fa-dollar-sign" style="float: left; padding-top: 2px;"></i>
                                                                    <span style="">&nbsp; Mark Converted</span>
                                                                </a>
                                                            </li>
                                                            <li style="text-align: center;">
                                                                <a href="#" class="dropdown-item"><i class="fa fa-file" style="float: left; padding-top: 2px;"></i>
                                                                    <span style="">&nbsp; Export Activity</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>NAME:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="full_name" style="float: right;"></span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span >TIMEZONE:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span  id="timezone" style="float: right;">AMERICA/NEW_YORK</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span >PHONE:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="phone_number" style="float: right;"></span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>EMAIL:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="email" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span >COMPANY:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="company" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span> STREET:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="street" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span >CITY:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="city" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>STATE:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="state" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>ZIPCODE:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="zip_code" style="float: right;"></span>
                                                    </div>
                                                </div><hr>

                                            </div>
                                        <h3 style="padding-left: 10px;">
                                            MISC
                                        </h3>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>CAMPAIGN:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="campaign" style="float: right;"></span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>DAY:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="day" style="float: right;">2 of 4</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>STATUS:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="status" style="float: right;">OPEN</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>DNC:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="dnc" style="float: right;">False</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>ID:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="id" style="float: right;">1</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>LEADS_ID:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="leads_id" style="float: right;">N/A</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SUB 1:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sub1" style="float: right;">ICAN</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SUB 2:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sub2" style="float: right;">1.26</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SUB 3:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sub3" style="float: right;">Age</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SMS ENABLE:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sms_enable" style="float: right;">FALSE</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>CARRIER:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="carrier" style="float: right;">BELLSOUTH</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>IP ADDRESS:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="ip_address" style="float: right;">N/A</span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    {{--activity--}}
                                    <div id="activity" class="tab-pane" >
                                        {{--<div class="card">--}}
                                            {{--header--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col" style="display: inline;">
                                                        <label class="h3">
                                                            HISTORY
                                                        </label>&nbsp;
                                                        <button id="set-deleted-button" {{--onclick="setText()" --}}class="btn btn-sm " style="width: 75px;height: 40px;font-size: 15px;padding:0px; ">
                                                            <i class="fa fa-trash"></i>&nbsp; Delete</button>
                                                        <button id="set-dnc-button" class="btn btn-sm" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            <i class="fa fa-ban"></i>&nbsp; DNC</button>
                                                        <button id="set-closed-button" class="btn btn-sm" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            <i class="fa fa-times-circle" style="background-size: cover;" ></i>&nbsp; Close</button>
                                                        <button class="btn btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            &nbsp; More</button>
                                                        <div class="dropdown" style="display: flex;top: -35px!important; left: -30px;!important">
                                                            <ul class="dropdown-menu" style="">
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-phone" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Call Now</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-calendar" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Schedule Call</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-dollar-sign" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Mark Converted</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-file" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Export Activity</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body" style="height: 540px;">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                            <i class="fa fa-phone" style="font-size: 18px;"></i>
                                                        </div>
                                                    <div class="col-sm-8 float-right">
                                                        <h5>Call to Virginia L Festavan</h5>
                                                        <h6>Status: Failed</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <span class="chat-time" data-tooltip="January 26, 2022, 11:08 AM US/Eastern" data-tooltip-position="left">
                                                        <i class="fa fa-clock-o"></i>&nbsp; 2 days ago</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <i class="fa fa-phone" style="font-size: 18px;"></i>
                                                    </div>
                                                    <div class="col-sm-8 float-right">
                                                        <h5>Call to Virginia L Festavan</h5>
                                                        <h6>Status: Failed</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <span class="chat-time" data-tooltip="January 26, 2022, 11:08 AM US/Eastern" data-tooltip-position="left">
                                                        <i class="fa fa-clock-o"></i>&nbsp; 2 days ago</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <i class="fa fa-phone" style="font-size: 18px;"></i>
                                                    </div>
                                                    <div class="col-sm-8 float-right">
                                                        <h5>Call to Virginia L Festavan</h5>
                                                        <h6>Status: Failed</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <span class="chat-time" data-tooltip="January 26, 2022, 11:08 AM US/Eastern" data-tooltip-position="left">
                                                        <i class="fa fa-clock-o"></i>&nbsp; 2 days ago</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <i class="fa fa-phone" style="font-size: 18px;"></i>
                                                    </div>
                                                    <div class="col-sm-8 float-right">
                                                        <h5>Call to Virginia L Festavan</h5>
                                                        <h6>Status: Failed</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <span class="chat-time" data-tooltip="January 26, 2022, 11:08 AM US/Eastern" data-tooltip-position="left">
                                                        <i class="fa fa-clock-o"></i>&nbsp; 2 days ago</span>
                                                    </div>
                                                </div><hr>
                                            </div>
                                            <div class="card-footer" style="padding-bottom: 85px;">
                                                <textarea type="text" class="form-control" id="message" placeholder="Type reply here.....">
                                                </textarea>
                                                <button type="submit" class="btn btn-lg btn-secondary float-right" id="sendMessage" style="margin-top: 10px;" disabled>
                                                    <i class="ni ni-send"></i>&nbsp; Delete
                                                </button>
                                            </div>
                                        {{--</div>--}}
                                    </div>
                                    {{--statistics--}}
                                    <div id="statistics" class="tab-pane">

                                            {{--header--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col" style="display: inline;">
                                                        <label class="h3">
                                                          OVERVIEW
                                                        </label>&nbsp;
                                                        <button id="set-deleted-button" {{--onclick="setText()" --}}class="btn btn-sm " style="width: 75px;height: 40px;font-size: 15px;padding:0px; ">
                                                            <i class="fa fa-trash"></i>&nbsp; Delete</button>
                                                        <button id="set-dnc-button" class="btn btn-sm" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            <i class="fa fa-ban"></i>&nbsp; DNC</button>
                                                        <button id="set-closed-button" class="btn btn-sm" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            <i class="fa fa-times-circle" style="background-size: cover;" ></i>&nbsp; Close</button>
                                                        <button class="btn btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 75px;height: 40px;font-size: 15px;padding:0px;">
                                                            &nbsp; More</button>
                                                        <div class="dropdown" style="display: flex;top: -35px!important; left: -30px;!important">
                                                            <ul class="dropdown-menu" style="">
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-phone" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Call Now</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-calendar" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Schedule Call</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-dollar-sign" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Mark Converted</span>
                                                                    </a>
                                                                </li>
                                                                <li style="text-align: center;">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-file" style="float: left; padding-top: 2px;"></i>
                                                                        <span style="">&nbsp; Export Activity</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>TRANSFER:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="full_name" style="float: right;">0</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>LIVE CALLS:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="full_name" style="float: right;">0</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>INBOUND CALLS:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="in_calls" style="float: right;">0</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>OUTBOUND CALLS:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="out_calls" style="float: right;">5</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SMS SEND:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sms_send" style="float: right;">0</span>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <span>SMS RECEIVED:</span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span id="sms_received" style="float: right;">0</span>
                                                    </div>
                                                </div><hr>
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
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function setText(id){
            $.ajax({
                url : "{{ url('check_click_trigger') }}",
                data : {'lead_id': id},
                type : 'GET',
                success : function(response){
                    let data = JSON.parse(response);
                    $('#full_name').text(data.first_name + ' ' + data.last_name);
                    $('#phone_number').text(data.phone_number);
                    $('#email').text(data.email);
                    $('#company').text(data.company);
                    $('#street').text(data.street);
                    $('#state').text(data.state);
                    $('#city').text(data.city);
                    $('#zip_code').text(data.zip_code);
                    $('#campaign').text(data.camp_name);
                    $('#leads_id').text(data.id);
                    $('#id').text(data.camp_id);
                    $('#sub1').text(data.sub1);
                    $('#sub2').text(data.sub2);
                    $('#sub3').text(data.sub3);
                }
            });

        }
        function deleteRecord(){
            $id = $('#leads_id').text();
            $.ajax({
                url : "{{ url('delete_record') }}",
                data : {'lead_id': id},
                type : 'GET',
                success : function(response) {
                }
            });
        }
        function getValue(obj){
            var table = $('#datatable-basic').DataTable();
            var value = $(obj).text();
            table.search(value).draw();
        }

        $('.collapse').on('hidden.bs.collapse', function () {
            $(this).find('.ni-bold-down').addClass('d-none');
            $(this).find('.ni-bold-up').removeClass('d-none');
        })

        $("input:checkbox").click(function(){
            var column = "table ." + $(this).attr("name");
            $(column).toggle();
        });
        $('input:checkbox:not(:checked)').each(function (){
            var column = "table ." + $(this).attr("name");
            $(column).hide();
        });
    </script>
@endsection


