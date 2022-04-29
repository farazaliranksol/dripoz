<!-- Main content -->
@extends('layouts.main')
<!-- Sidenav -->
@section('title','Phone Number')
@section('content')
<!-- Page content -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center pt-4">
                <div class="col-lg-5 col-4">
                    <h2 class="h2 text-white d-inline-block mb-0">Phone Number</h2>
                </div>
            </div>
            <!--Action buttons-->
            <!--Show number list title-->
            <div class="row align-items-center py-4">
                <div class="col-lg-7 col-8 text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="text-white text-left">
                                Phone Number list
                            </h5>
                        </div>
                        <div class="col-md-4 text-left">
                            <select id="phoneNumberListSelect" class="form-control"
                                style="font-size:13px; width:100%!important; height: 35px!important; padding: 0px !important; padding-left: 5px !important;">
                                <option value="">All Phone Numbers</option>
                                @if($phoneNumberLists)
                                @foreach($phoneNumberLists as $phoneNumberList)
                                <option value="{{$phoneNumberList->id}}">{{$phoneNumberList->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-5 text-left">
                            <button type="button" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="modal"
                                data-target="#addPhoneNumberList">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            </button>
                            <!--Add New List-->
                            <div class="modal fade" id="addPhoneNumberList" tabindex="-1" role="dialog"
                                aria-labelledby="modal-form" aria-hidden="true">
                                <div class="row modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down "
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary border-0 mb-0">
                                                <div class="card-header pb-0">
                                                    <div class="text-darker text-lg text-center mt-2 mb-3">
                                                        <h3><strong>Create New Phone Number List</strong></h3>
                                                    </div>
                                                </div>
                                                <div class="card-body px-lg-5 py-lg-5 text-left">
                                                    <form id="phoneNumberListAdd">
                                                        @csrf
                                                        <div style="display: block;">
                                                            <p><span class="text-sm-left text-dark">Name of List</span>
                                                            </p>
                                                            <input type="text" id="phoneNumberListName"
                                                                name="phoneNumberListName" class="text form-control"
                                                                style="margin-top: 0px;">
                                                        </div>
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-primary my-4">Create</button>
                                                            <a class="btn btn-outline-secondary my-4"
                                                                data-dismiss="modal">Close </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Edit List title-->
                            <button type="button" id="phoneNumberListEditBtn"
                                class="btn btn-sm btn-info btn-round btn-icon">
                                <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                            </button>
                            <button type="button" id="phoneNumberListEditBtnModal"
                                class="btn btn-sm btn-info btn-round btn-icon" data-toggle="modal"
                                data-target="#edit_list_title" hidden>
                            </button>
                            <div class="modal fade" id="edit_list_title" tabindex="-1" role="dialog"
                                aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down "
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary border-0 mb-0">
                                                <div class="card-header pb-0">
                                                    <div class="text-darker text-lg text-center mt-2 mb-3"><small>Edit
                                                            Phone Number List</small></div>
                                                </div>
                                                <div class="card-body px-lg-5 py-lg-5 text-left">
                                                    <form id="editPhoneNumberListForm">
                                                        @csrf
                                                        <div style="display: block;">
                                                            <p><span class="text-sm-left text-dark">Name of List</span>
                                                            </p>
                                                            <input type="hidden" id="phoneNumberListIdInput"
                                                                name="phoneNumberListIdInput" value="">
                                                            <input type="text" id="phoneNumberListNameInput"
                                                                name="phoneNumberListNameInput" value=""
                                                                class="text form-control">
                                                        </div>
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-primary my-4">Edit</button>
                                                            <a class="btn btn-outline-secondary my-4"
                                                                data-dismiss="modal">Close </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Delete Phone Number-->
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-round btn-icon"
                                id="phoneNumberListDelBtn">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                            </a>

                            <!--Flag Button -->
                            <a href="javascript:void(0)" class="btn btn-sm btn-warning btn-round btn-icon"
                                id="phoneNumberListFlagBtn">
                                <span class="btn-inner--icon"><i class="fas fa-flag"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-Center py-4 mt--3">
                <div class="col-lg-7 col-8 text-left">
                    <div class="col-12 text-left">
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            style="background: white; color: royalblue ;height: 35px; width: 130px; font-size: 13px;"
                            data-toggle="modal" data-target="#buyNumberModal">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Buy Numbers</span>
                        </button>
                        <!-----------Buy Number Modal----------------->
                        <div class="modal fade" id="buyNumberModal" tabindex="-1" role="dialog"
                            aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card bg-secondary border-0 mb-0">
                                            <div class="card-header">
                                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                                    <h3><strong>Buy Phone Numbers</strong></h3>
                                                </div>
                                            </div>
                                            <div class="card-body px-lg-5 py-lg-5 text-left"
                                                style="overflow: auto; height: 630px;">
                                                <form id="buyNumberForm">
                                                    @csrf
                                                    <div class="card" style="width: 100%;">
                                                        <div class="card-header font-weight-bolder">List</div><br>
                                                        <div class="card-body form-group mb-3"
                                                            style="margin: 3px; font-size: 10px;">
                                                            <p><span class="help-block m-b-none">Select a Phone Number
                                                                    List</span></p>
                                                            <div class="form-group">
                                                                <div class="listMenu">
                                                                    <select id="buyNumberPhoneList"
                                                                        name="buyNumberPhoneList"
                                                                        class="select form-control" width="90%"
                                                                        onchange="hideNewPhoneListField(this.value)">
                                                                        <option value="-1">New List</option>
                                                                        @if($phoneNumberLists)
                                                                        @foreach($phoneNumberLists as $phoneNumberList)
                                                                        <option value="{{$phoneNumberList->id}}">
                                                                            {{$phoneNumberList->name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div><br>
                                                                <div id="buyNumberPhoneListNewDiv">
                                                                    <p><span class="text-sm-left text-dark">Name of
                                                                            List</span></p>
                                                                    <input type="text" id="buyNumberPhoneListNew"
                                                                        name="buyNumberPhoneListNew"
                                                                        class="text form-control" placeholder="New Name"
                                                                        style="margin-top: 0px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header font-weight-bolder ">Purchase Type</div>
                                                        <br>
                                                        <div class="card-body form-group mb-3" style="margin: 5px">
                                                            <div class="form-group">
                                                                <div>
                                                                    <select id="buyNumberPurchaseType"
                                                                        name="buyNumberPurchaseType"
                                                                        class="form-control"
                                                                        onchange="changeBuyNumberPurchaseType(this.value)">
                                                                        <option selected="selected" value="state">One
                                                                            Area Code per State (Recommended)</option>
                                                                        <option value="areaCode">Area Code</option>
                                                                        <option value="tollFree">Toll Free</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Per state Area code-->
                                                    <div class="state box" id="buyNumberCodePerStateDiv">
                                                        <div class="card border-1">
                                                            <div class="card-header font-weight-bolder "> Area Code Per
                                                                State</div><br>
                                                            <div class="card-body form-group mb-3" style="margin: 3px">
                                                                <div class="row form-group">
                                                                    <div class="col col-xs-3">
                                                                        <span class="help-block m-b-none"
                                                                            style="height:40px">How many:</span>
                                                                    </div>
                                                                    <div class="col col-xs-4">
                                                                        <select id="buyNumberCodePerState"
                                                                            class="select form-control"
                                                                            name="buyNumberCodePerState"
                                                                            style="height:40px">
                                                                            <option value="">Select</option>
                                                                            <option value="50">50</option>
                                                                            <option value="100">100</option>
                                                                            <option value="150">150</option>
                                                                            <option value="200">200</option>
                                                                            <option value="250">250</option>
                                                                            <option value="300">300</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Area code search-->
                                                    <div class="areacode box" style="display: none;"
                                                        id="buyNumberCodeSearchDiv">
                                                        <div class="card border-1">
                                                            <div class="card-header font-weight-bolder ">Area Code
                                                                Search</div><br>
                                                            <div class="card-body form-group mb-3" style="margin: 3px">
                                                                <div class="row form-group">


                                                                    <div class="col col-xs-4">
                                                                        <select id="buyNumberCodeList"
                                                                            class="select form-control"
                                                                            name="buyNumberCodeList"
                                                                            style="height:40px">
                                                                            @php
                                                                            $options = getAreaCode();
                                                                            echo $options;
                                                                            @endphp
                                                                        </select>
                                                                    </div>
                                                                    <div class="col col-xs-4">
                                                                        <span class="help-block m-b-none"
                                                                            style="width: 85%; height:40px">How
                                                                            many:</span>
                                                                    </div>
                                                                    <div class="col col-xs-4">
                                                                        <input type="text" name="buyNumberCodeSearch"
                                                                            id="buyNumberCodeSearch"
                                                                            style="width: 85%; height:40px" max="50">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Toll free div-->
                                                    <div class="tollfree box" style="display: none;"
                                                        id="buyNumberTollFreeDiv">
                                                        <div class="card border-1">
                                                            <div class="card-header font-weight-bolder">Toll Free
                                                                Numbers</div><br>
                                                            <div class="card-body form-group mb-3" style="margin: 3px">
                                                                <div class="row form-group">
                                                                    <div class="col col-xs-4">
                                                                        <select id="buyNumberTollFreeList"
                                                                            class="select form-control"
                                                                            name="buyNumberTollFreeList"
                                                                            style="height: 40px">
                                                                            <option value="">Select</option>
                                                                            <option value="833">833</option>

                                                                            <option value="844">844</option>

                                                                            <option value="855">855</option>

                                                                            <option value="866">866</option>

                                                                            <option value="877">877</option>

                                                                            <option value="888">888</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col col-xs-4">
                                                                        <span class="help-block m-b-none"
                                                                            style="width: 85%; height:40px">How
                                                                            many:</span>
                                                                    </div>
                                                                    <div class="col col-xs-4">
                                                                        <input type="number" name="buyNumberTollFree"
                                                                            id="buyNumberTollFree"
                                                                            style="width: 85%; height:40px" max="50">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center float-right">
                                                        <button type="submit"
                                                            class="btn btn-primary my-4">Find</button>&nbsp;
                                                        <a class="btn btn-outline-secondary my-4"
                                                            data-dismiss="modal">Close </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-----------Buy Number Ends------------>

                        <!-------------Available Numbers modal starts------------------>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#availableTwilioNumbersModal" hidden id="availableTwilioNumbersModalBtn">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="availableTwilioNumbersModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="availableNumbersForm">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Available Numbers</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">

                                                <table class="table align-items-center table-flush table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input"
                                                                        id="availableNumberCheckAll" type="checkbox">
                                                                    <label class="custom-control-label"
                                                                        for="availableNumberCheckAll"></label>
                                                                </div>
                                                            </th>
                                                            <th>Phone Number</th>
                                                            <th>Voice</th>
                                                            <th>SMS</th>
                                                            <th>MMS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="enterAvailableNumbers">

                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Purchase</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-------------Available Numbers modal ends------------------>
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            style="background: white; color: royalblue ;height: 35px; width: 142px; font-size: 13px;"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="btn-inner--icon"><i class="fas fa-align-justify"></i></span>
                            <span class="btn-inner--text">Number Actions</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            {{--style="width: 100px; font-size: 12px;" --}}>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="moveToPhoneNumberList()">Move to
                                New
                                List</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="changeNumberStatus('flagged')">Flag Numbers</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="changeNumberStatus('unflagged')">Unflag
                                Numbers</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="changeNumberStatus('cancel')">Cancel
                                Numbers</a>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            style="background: white; color: royalblue ;height: 35px; width: 175px; font-size: 13px;"
                            data-toggle="modal" data-target="#auto_rebuy">
                            <span class="btn-inner--icon"><i class="fas fa-phone"></i></span>
                            <span class="btn-inner--text">Auto Rebuy Settings</span>
                        </button>
                        <div class="modal fade" id="auto_rebuy" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                            aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down "
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card bg-secondary border-0 mb-0">
                                            <div class="card-header">
                                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                                    <h3><strong>Auto Re-buy Setting</strong></h3>
                                                </div>
                                            </div>
                                            <div class="card-body px-lg-5 py-lg-5 text-left">
                                                <form id="autoRebuySettingForm">
                                                
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label
                                                                class="col-form-label form-control-label float-left">Enable
                                                                Auto Re-buy</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label
                                                                class="custom-toggle custom-toggle-primary float-left">
                                                                <input type="checkbox" checked="" id="autoCheck"
                                                                    value="1">
                                                                <span class="custom-toggle-slider rounded-circle"
                                                                    data-label-off="No" data-label-on="Yes"></span>
                                                            </label>
                                                        </div>
                                                    </div><br>

                                                    <div>
                                                        <p><span class="text-sm-left text-dark">Monthly Limit</span></p>
                                                        <input type="number" id="list_name" name="list_name"
                                                            value="1000" step="0.25" class="text form-control"
                                                            style="margin-top: 0px;">
                                                    </div><br>

                                                    <div>
                                                        <p><span class="text-sm-left text-dark">Monthly Speed</span></p>
                                                        <input type="number" id="list_name" name="list_name" value="0"
                                                            step="0.25" class="text form-control"
                                                            style="margin-top: 0px;" disabled><br>
                                                        Auto Re-buy Period Resets: 12/16/2021
                                                    </div><br>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary my-4">Save</button>
                                                        <a class="btn btn-outline-secondary my-4"
                                                            data-dismiss="modal">Close </a>
                                                    </div>

                                                </form>

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



<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <!-- <div class="card-header border-0">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0">Phone Number List</h3>
                        </div>
                    </div>
                </div> -->

                <!-- Light table -->
                <div class="table-responsive mt-3">
                    <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                        <thead class="thead-light dripoz_tabl_head">
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input class="" id="tableCheckAll" type="checkbox" onchange="checkAll()">
                                        {{-- <label class="custom-control-label" for="tableCheckAll"></label> --}}
                                    </div>
                                </th>
                                <th>Phone Number</th>
                                <th>Active</th>
                                <th>State</th>
                                <th>List</th>
                                <th>Purchase Date </th>
                                <th>Flagged</th>
                                <th>Verified</th>
                            </tr>
                        </thead>
                        <tbody id="phoneNumbersTable">
                            @foreach($phoneNumbers as $phoneNumber)
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input class="tableCheck" type="checkbox" value="{{$phoneNumber->id}}">
                                        {{-- <label class="custom-control-label"></label> --}}
                                    </div>
                                </th>
                                <td class="table-user">
                                    <b>{{$phoneNumber->phone_number}}</b>
                                </td>
                                <td>
                                    @if($phoneNumber->active == 'in-use')
                                    <b> True</b>
                                    @else
                                    <b>Cancelled</b>
                                    @endif
                                </td>
                                <td class="table-user">
                                    <b>{{$phoneNumber->state}}</b>
                                </td>
                                <td class="table-user">
                                    <b>{{$phoneNumber->phoneNumberList->name}}</b>
                                </td>
                                <td class="table-user">
                                    <b> {{date('d-m-Y', strtotime($phoneNumber->created_at))}}, {{
                                        $phoneNumber->created_at->format('H:i') }}</b>
                                </td>
                                <td class="table-user">
                                    @if($phoneNumber->flag == 1)
                                    <i class="fas fa-flag"></i>
                                    @endif
                                </td>
                                <td class="table-user">
                                    <b></b>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-----------------Move to new list modal----------------------------->
<button type="button" data-toggle="modal" data-target="#moveToNewListModal" id="moveToNewListModalBtn" hidden>
</button>
<!--Add New List-->
<div class="modal fade" id="moveToNewListModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="row modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form id="updatePhoneNumberListForm">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header pb-0">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h3><strong>Add to Phone Number List</strong></h3>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left">
                            <div style="display: block;">
                                <p><span class="text-sm-left text-dark"><b>List</b></span>
                                </p>
                                <label>Select Phone Number List</label>
                                <select name="" id="movePhoneNumberList" class="text form-control"
                                    style="margin-top: 0px;">
                                    @if($phoneNumberLists)
                                    @foreach ($phoneNumberLists as $phoneNumberList)
                                    <option value="{{$phoneNumberList->id}}">{{$phoneNumberList->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary my-4" type="submit">Add to List</button>
                                <a class="btn btn-outline-secondary my-4" data-dismiss="modal">Close </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // **************************************************New Code ********************************
    //add phone number list form  
    $('#phoneNumberListAdd').on('submit', function (e) {
        e.preventDefault();

        let name = $('#phoneNumberListName').val();

        $.ajax({
            url: "phoneNumberListCreate",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
            },
            success: function (response) {
                toastify('The Name is Added', 'success');
                // to close modal
                $('#addPhoneNumberList').modal('hide');
                // show option in select 
                var option = document.createElement("option");
                option.text = name;
                option.value = response.id;
                var select = document.getElementById("phoneNumberListSelect");
                select.appendChild(option);
            },
            error: function (response) {
                toastify(response.responseJSON.errors.name[0], 'error');
            },
        });
    });
    // phone number list edit btn 
    document.getElementById('phoneNumberListEditBtn').onclick = function () {
        let phoneNumberListId = document.getElementById('phoneNumberListSelect').value;
        let getPhoneNumberListName = document.getElementById('phoneNumberListSelect');
        let phoneNumberListName = getPhoneNumberListName.options[getPhoneNumberListName.selectedIndex].text;
        if (phoneNumberListId == '') {
            toastify('Please select a phone number list', 'error');
            return;
        }
        document.getElementById('phoneNumberListEditBtnModal').click();
        document.getElementById('phoneNumberListIdInput').value = phoneNumberListId;
        document.getElementById('phoneNumberListNameInput').value = phoneNumberListName;

        //edit phone number list form  
        $('#editPhoneNumberListForm').on('submit', function (e) {
            e.preventDefault();
            let phoneNumberListNameNew = document.getElementById('phoneNumberListNameInput').value;
            $.ajax({
                url: "phoneNumberListEdit",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: phoneNumberListId,
                    name: phoneNumberListNameNew,
                },
                success: function (response) {

                    // to close modal
                    $('#edit_list_title').modal('hide');
                    getPhoneNumberListName.options[getPhoneNumberListName.selectedIndex].text =
                        phoneNumberListNameNew;
                    toastify('The Name is Updated', 'success');
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
        });
    }

    // delete phone number list
    document.getElementById('phoneNumberListDelBtn').onclick = function () {
        let phoneNumberListId = document.getElementById('phoneNumberListSelect').value;
        let getPhoneNumberListName = document.getElementById('phoneNumberListSelect');

        if (phoneNumberListId == '') {
            toastify('Please select a phone number list', 'error');
            return;
        }
        swal({
            title: 'Delete Phone Numer List. Are you sure?',
            html: "<span class='text-danger fw-bold'>Warning!</span>&nbsp; Deleting a phone number list will cancel all of the phone numbers. The numbers will be removed from your account and you will no longer receive calls or texts!",
            type: 'info',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes! Deleted',
            cancelButtonClass: 'btn btn-secondary',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            //  //Soft Delete phone number list 
            $.ajax({
                url: "phoneNumberListDel",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: phoneNumberListId,
                },
                success: function (response) {
                    getPhoneNumberListName.options[getPhoneNumberListName.selectedIndex]
                        .remove();
                    toastify('The Name is Deleted', 'success');
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
        })
    }

    // Flag phone number list
    document.getElementById('phoneNumberListFlagBtn').onclick = function () {
        let phoneNumberListId = document.getElementById('phoneNumberListSelect').value;
        let getPhoneNumberListName = document.getElementById('phoneNumberListSelect');

        if (phoneNumberListId == '') {
            toastify('Please select a phone number list', 'error');
            return;
        }
        swal({
            title: 'Flag Phone Number List.Are you sure?',
            html: "<span class='text-danger fw-bold'>Warning!</span>&nbsp; Flagging a phone number list will cancel all phone numbers in the selected list when it's time to bill for them. The numbers will also be removed from your account at that time and you will no longer receive calls or texts for those numbers.",
            type: 'info',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes! Flag them all!',
            cancelButtonClass: 'btn btn-secondary',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if(result.value == true){
//update status of flag phone number list 
$.ajax({
                url: "phoneNumberListFlag",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: phoneNumberListId,
                },
                success: function (response) {
                    if (response.success) {
                        toastify(response.success, 'success');
                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
            }
            
        })
    }

    // buy number phone list hidden if list is not selected
    function hideNewPhoneListField(val) {
        if (val != -1) {
            document.getElementById('buyNumberPhoneListNewDiv').style.display = 'none';
        } else {
            document.getElementById('buyNumberPhoneListNewDiv').style.display = 'block';
        }
    }
    //  buy number purchase type select value check
    function changeBuyNumberPurchaseType(val) {
        if (val == 'areaCode') {
            document.getElementById('buyNumberCodePerStateDiv').style.display = 'none';
            document.getElementById('buyNumberTollFreeDiv').style.display = 'none';
            document.getElementById('buyNumberCodeSearchDiv').style.display = 'block';
        } else if (val == 'tollFree') {
            document.getElementById('buyNumberCodePerStateDiv').style.display = 'none';
            document.getElementById('buyNumberCodeSearchDiv').style.display = 'none';
            document.getElementById('buyNumberTollFreeDiv').style.display = 'block';
        } else {
            document.getElementById('buyNumberCodeSearchDiv').style.display = 'none';
            document.getElementById('buyNumberTollFreeDiv').style.display = 'none';
            document.getElementById('buyNumberCodePerStateDiv').style.display = 'block';
        }
    }

    // buyNumberModal form submit
    $('#buyNumberModal').on('submit', function (e) {
        e.preventDefault();

        let buyNumberPhoneList = $('#buyNumberPhoneList').val();
        let buyNumberPhoneListNew = $('#buyNumberPhoneListNew').val();
        let buyNumberPurchaseType = $('#buyNumberPurchaseType').val();
        let buyNumberCodePerState = $('#buyNumberCodePerState').val();
        let buyNumberCodeSearch = $('#buyNumberCodeSearch').val();
        let buyNumberCodeList = $('#buyNumberCodeList').val();
        let buyNumberTollFree = $('#buyNumberTollFree').val();
        let buyNumberTollFreeList = $('#buyNumberTollFreeList').val();

        if (buyNumberPhoneList == -1) {
            let newListName = document.getElementById('buyNumberPhoneListNew').value;
            if (newListName == '') {
                toastify('Please enter new name of list. ', 'error');
                return;
            }
        }

        $.ajax({
            url: "checkAvailablePhoneNumbers",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                buyNumberPhoneList: buyNumberPhoneList,
                buyNumberPhoneListNew: buyNumberPhoneListNew,
                buyNumberPurchaseType: buyNumberPurchaseType,
                buyNumberCodePerState: buyNumberCodePerState,
                buyNumberCodeSearch: buyNumberCodeSearch,
                buyNumberCodeList: buyNumberCodeList,
                buyNumberTollFree: buyNumberTollFree,
                buyNumberTollFreeList: buyNumberTollFreeList,
            },
            success: function (response) {
                if (response.error) {
                    toastify(response.error, 'error');
                } else if (response.availableNumbers) {
                    document.getElementById('enterAvailableNumbers').innerHTML = response
                        .availableNumbers;
                    document.getElementById('availableTwilioNumbersModalBtn').click();

                } else {
                    toastify("Successful", 'success');
                    // to close modal
                    $('#addPhoneNumberList').modal('hide');
                }

            },
            error: function (response) {
                toastify(response.responseJSON.errors.name[0], 'error');
            },
        });
    });

    // available check number ALL 
    document.getElementById('availableNumberCheckAll').onclick = function () {
        if ($('#availableNumberCheckAll').is(':checked')) {
            $('input[class=availableNumberCheck]').attr('checked', true);
        } else {
            $('input[class=availableNumberCheck]').attr('checked', false);
        }
    }

    // selected available numbers form submit
    $('#availableNumbersForm').on('submit', function (e) {
        e.preventDefault();

        var checkIDs = $("#availableNumbersForm input:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        var checkStates = $("#availableNumbersForm input:checkbox:checked").map(function () {
            return $(this).data('state');
        }).get();
        let selectedNumbers = JSON.stringify(checkIDs);
        let selectedStates = JSON.stringify(checkStates);
        let selectedPhoneNumberListId = document.getElementById('selectedPhoneNumberListId').value;

        $.ajax({
            url: "buySelectedNumbers",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "selectedNumbers": selectedNumbers,
                "states": selectedStates,
                "selectedPhoneNumberListId": selectedPhoneNumberListId,
            },
            success: function (response) {
                if (response.success) {
                    toastify(response.success, 'success')
                    window.location.reload();
                } else {
                    toastify('Something went wrong!', 'error')
                    window.location.reload();
                }
            },
            error: function (response) {
                toastify(response.responseJSON.errors.name[0], 'error');
            },
        });
    });
    // check all table checkboxes
    function checkAll() {

        if ($('#tableCheckAll').is(':checked')) {
            $('input[class=tableCheck]').attr('checked', true);
        } else {
            $('input[class=tableCheck]').attr('checked', false);
        }
    }

    //  is checked
    function  isChecked(){
        var checked = $("#phoneNumbersTable input:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        let selectedCheckId = JSON.stringify(checked);
        if (selectedCheckId.length <= 2) {
            toastify('Please select at least one checkbox', 'error')
            return false;
        }
        // return response()->json(['selectedCheckId' => selectedCheckId]);
        return selectedCheckId;
    } 

    // Move to New List 
    function moveToPhoneNumberList() {
        let check = isChecked();
        if(check){
            document.getElementById('moveToNewListModalBtn').click();
        }
    }
    // selected available numbers form submit
    $('#updatePhoneNumberListForm').on('submit', function (e) {
        e.preventDefault();
        var checked = $("#phoneNumbersTable input:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        let selectedCheckId = JSON.stringify(checked);
        let movePhoneNumberList = document.getElementById('movePhoneNumberList').value;

        $.ajax({
            url: "updatePhoneNumberList",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "selectedCheckId": selectedCheckId,
                "movePhoneNumberList": movePhoneNumberList,
            },
            success: function (response) {
                console.log(response)
                if (response.success) {
                    $('#moveToNewListModal').modal('hide');
                    location.reload();
                    toastify(response.success, 'success')

                } else {
                    toastify('response.error', 'error')
                }
            },
            error: function (response) {
                toastify(response.responseJSON.errors.name[0], 'error');
            },
        });
    });

    // For flagged numbers
    function changeNumberStatus(status) {
        let check = isChecked();
        if(status == 'flagged'){
            var title = "Flag Phone Numbers.Are you sure?";
            var text = "You are about to flag the selected phone numbers. Are you sure?";
        }else if (status == 'unflagged'){
            var title = "UnFlag Phone Numbers.Are you sure?";
            var text = "You are about to unflag the selected phone numbers. Are you sure?";
        }else{
            var title = "Cancel Phone Numbers. Are you sure?";
            var text = "<span class='text-danger'>Warning!</span>Cancelling a phone number will remove it from your account and you will no longer receive calls or texts!";
        }
        if(check){
            swal({
            title: title,
            html: text,
            type: 'info',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes! continue!',
            cancelButtonClass: 'btn btn-secondary',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            
            if(result.value == true){
         //update status of flag phone number list 
            $.ajax({
                url: "updatePhoneNumberFlag",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    phoneNumberIds: check,
                    status: status,
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                        toastify(response.success, 'success');
                    } else {
                        toastify(response.error, 'error');
                    }
                   
                },
                error: function (response) {
                    toastify(response.responseJSON.errors.name[0], 'error');
                },
            });
            }
        })
        }
    }
</script>
@endsection