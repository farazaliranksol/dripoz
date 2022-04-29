@extends('layouts.main')
@section('title','Manage Users')
<style>
    .border-bt-f {
        border-bottom: 1px solid rgba(0, 0, 0, .05);
    }
</style>
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-12">
                    <h1 class="text-white d-inline-block mb-0 d-block manage_head">Manage Users</h1>
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
                <div class="table-responsive p-4">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>User</th>
                                <th>Account Type</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users)
                            @foreach ($users as $user)

                            <tr class="table-">

                                <td class="table-user">
                                    {{ $user->first_name }}
                                </td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                <td>
                                    <button class="btn btn-link" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)"
                                            onclick="updateClientUser({{ $user->id }},'{{ $user->role }}')">Edit</a>
                                        <a class="dropdown-item" href="{{ url('deactivate-user',$user->id) }}">Deactivate</a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class=" d-inline-block mb-0 d-block manage_head pb-4">Pending Invites</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive p-4">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date Sent</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr class="table-">

                                <td class="table-user">

                                </td>
                                <td>
                                    qudsia
                                </td>
                                <td>
                                    zia
                                </td>
                                <td>
                                    Dec 20, 2021
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" type="button">
                                        Resend
                                    </button>


                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!--Create A/B Test Button-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ab_test">Invite User
            </button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class=" d-inline-block mb-0 d-block manage_head pb-4">Deactivate Users</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive p-4">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>User</th>
                                <th>Account Type</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($deactivateUsers)
                            @foreach ($deactivateUsers as $deactivateUser)

                            <tr class="table-">

                                <td class="table-user">
                                    {{ $deactivateUser->first_name }}
                                </td>
                                <td>
                                    {{ $deactivateUser->role }}
                                </td>
                                <td>
                                    <button class="btn btn-link" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ url('activate-user',$deactivateUser->id) }}">Activate</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Permissions modal-->
    <div class="modal fade" id="ab_test" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog w-auto modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <form action="{{ url('client-user-store') }}" id="clientUserForm" onsubmit="submitHandler(event)">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Invite people to Dripoz</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="card mb-0">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Select Role</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body" id="modal-body-f1">
                                <div class="container">
                                    <div class="row border-bt-f flex-nowrap">
                                        <div class="col-md-10">
                                            <h3 class="invite_pop_head">Administrator</h3>
                                            <p class="role_desc">Full access to all features</p>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <button type="button" class="btn btn-link" onclick="f_show('Admin')"><i
                                                    class="ni ni-curved-next"></i></button>
                                        </div>
                                    </div>
                                    <div class="row border-bt-f pt-1 flex-nowrap">
                                        <div class="col-md-10">
                                            <h3 class="invite_pop_head">Accounting</h3>
                                            <p class="role_desc">View, and pay invoices. Modify auto recharge settings.
                                            </p>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <button type="button" class="btn btn-link" onclick="f_show('Accounting')"><i
                                                    class="ni ni-curved-next"></i></button>
                                        </div>
                                    </div>
                                    <div class="row border-bt-f pt-1 flex-nowrap">
                                        <div class="col-md-10">
                                            <h3 class="invite_pop_head">Agents</h3>
                                            <p class="role_desc">View and manage the companies SMS Inbox.</p>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <button type="button" class="btn btn-link" onclick="f_show('Agent')"><i
                                                    class="ni ni-curved-next"></i></button>
                                        </div>
                                    </div>
                                    <div class="row border-bt-f pt-1 flex-nowrap">
                                        <div class="col-md-10">
                                            <h3 class="invite_pop_head">Reports</h3>
                                            <p class="role_desc">View and export reports.</p>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <button type="button" class="btn btn-link" onclick="f_show('Reports')"><i
                                                    class="ni ni-curved-next"></i></button>
                                        </div>
                                    </div>
                                    <div class="row border-bt-f pt-1 flex-nowrap">
                                        <div class="col-md-10">
                                            <h3 class="invite_pop_head">Custom</h3>
                                            <p class="role_desc">Account with custom persmissions.</p>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <button type="button" class="btn btn-link" onclick="f_show('Custom')"><i
                                                    class="ni ni-curved-next"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right pt-3">
                                            <button type="button" class="btn btn-primary  ml-auto"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-none" id="modal-body-f2">
                                <div class="container">
                                    <input type="hidden" name="role" id="role" value="" />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4 class="role_input_label">Email Address</h4>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-sm input_text_font"
                                                placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="row  pt-1">
                                        <div class="col-md-3">
                                            <h4 class="role_input_label">First Name</h4>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="firstName" id="firstName"
                                                class="form-control form-control-sm input_text_font"
                                                placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="row border-bt-f pt-1 pb-4">
                                        <div class="col-md-3">
                                            <h4 class="role_input_label">Last Name</h4>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="lastName" id="lastName"
                                                class="form-control form-control-sm input_text_font"
                                                placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="row border-bt-f">
                                        <div class="col-md-6 pl-4 pt-3">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="inboxCheck"
                                                    name="inboxCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="inboxCheck">Inbox</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="phoneNumberCheck"
                                                    name="phoneNumberCheck" type="checkbox" value="1" @php
                                                    if(@$user->role != 'Custom'){ echo 'checked disabled'; }else { echo
                                                '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="phoneNumberCheck">Phone Number</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="exportLeadsCheck"
                                                    name="exportLeadsCheck" type="checkbox" value="1" @php
                                                    if(@$user->role != 'Custom'){ echo 'checked disabled'; }else { echo
                                                '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="exportLeadsCheck">Export Leads</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="aiRulesCheck"
                                                    name="aiRulesCheck" type="checkbox" value="1" @php if(@$user->role
                                                != 'Custom'){ echo 'checked disabled'; }else { echo '';}
                                                @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="aiRulesCheck">A.I Rules</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="billingCheck"
                                                    name="billingCheck" type="checkbox" value="1" @php if(@$user->role
                                                != 'Custom'){ echo 'checked disabled'; }else { echo '';}
                                                @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="billingCheck">Billing</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="toolsCheck"
                                                    name="toolsCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="toolsCheck">Tools</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="logsCheck"
                                                    name="logsCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="logsCheck">Logs</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-4 pt-3">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="consoleCheck"
                                                    name="consoleCheck" type="checkbox" value="1" @php if(@$user->role
                                                != 'Custom'){ echo 'checked disabled'; }else { echo '';}
                                                @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="consoleCheck">Console</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="viewLeadsCheck"
                                                    name="viewLeadsCheck" type="checkbox" value="1" @php if(@$user->role
                                                != 'Custom'){ echo 'checked disabled'; }else { echo '';}
                                                @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="viewLeadsCheck">View Leads</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="soundCheck"
                                                    name="soundCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="soundCheck">Sound Library</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="reportsCheck"
                                                    name="reportsCheck" type="checkbox" value="1" @php if(@$user->role
                                                != 'Custom'){ echo 'checked disabled'; }else { echo '';}
                                                @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="reportsCheck">View Reports</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="makePaymentsCheck"
                                                    name="makePaymentsCheck" type="checkbox" value="1" @php
                                                    if(@$user->role != 'Custom'){ echo 'checked disabled'; }else { echo
                                                '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="makePaymentsCheck">Make Payments</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="alertsCheck"
                                                    name="alertsCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="alertsCheck">Alerts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="apiCheck"
                                                    name="apiCheck" type="checkbox" value="1" @php if(@$user->role !=
                                                'Custom'){ echo 'checked disabled'; }else { echo '';} @endphp>
                                                <label class="custom-control-label role_input_label"
                                                    for="apiCheck">API</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pt-3">
                                            <button type="button" class="btn btn-primary  ml-auto"
                                                id="back-btn">Back</button>
                                            <button type="button" class="btn btn-primary ml-auto"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-8 text-right pt-3">
                                            <button type="submit" class="btn btn-primary ml-auto">Send Invite
                                                Link</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" id="hidden-f">
                </form>
            </div>
        </div>
    </div>

    <!--Edit Permissions Modal-->
    <div class="modal fade" id="updatePermissionModal" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog w-auto modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <form action="{{ url('client-user-store') }}" id="updatePermissionForm"
                    onsubmit="updateHandler(event)">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Invite people to Dripoz</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <input type="hidden" name="user_id" id="updateClientUserId" value="" />
                    <div class="modal-body p-0">
                        <div class="card mb-0">
                            <div class="card-body" id="modal-body-f2">
                                <div class="container">
                                    <div class="row border-bt-f">
                                        <div class="col-md-6 pl-4 pt-3">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateInboxCheck"
                                                    name="inboxCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateInboxCheck">Inbox</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes"
                                                    id="updatePhoneNumberCheck" name="phoneNumberCheck" type="checkbox"
                                                    value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updatePhoneNumberCheck">Phone Number</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes"
                                                    id="updateExportLeadsCheck" name="exportLeadsCheck" type="checkbox"
                                                    value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateExportLeadsCheck">Export Leads</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateAiRulesCheck"
                                                    name="aiRulesCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateAiRulesCheck">A.I Rules</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateBillingCheck"
                                                    name="billingCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateBillingCheck">Billing</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateToolsCheck"
                                                    name="toolsCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateToolsCheck">Tools</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateLogsCheck"
                                                    name="logsCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateLogsCheck">Logs</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-4 pt-3">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateConsoleCheck"
                                                    name="consoleCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateConsoleCheck">Console</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes"
                                                    id="updateViewLeadsCheck" name="viewLeadsCheck" type="checkbox"
                                                    value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateViewLeadsCheck">View Leads</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateSoundCheck"
                                                    name="soundCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateSoundCheck">Sound Library</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateReportsCheck"
                                                    name="reportsCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateReportsCheck">View Reports</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes"
                                                    id="updateMakePaymentsCheck" name="makePaymentsCheck"
                                                    type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateMakePaymentsCheck">Make Payments</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateAlertsCheck"
                                                    name="alertsCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateAlertsCheck">Alerts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="custom-control-input checkedBoxes" id="updateApiCheck"
                                                    name="apiCheck" type="checkbox" value="1">
                                                <label class="custom-control-label role_input_label"
                                                    for="updateApiCheck">API</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pt-3">

                                            <button type="button" class="btn btn-primary ml-auto"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-8 text-right pt-3">
                                            <button type="submit" class="btn btn-primary ml-auto">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        const f_show = (role) =>{
            $('#hidden-f').val(role);
            $('#modal-body-f2').removeClass('d-none');
            $('#modal-body-f1').addClass('d-none');
            document.getElementById('role').value = role;
            if (role == 'Admin'){
                var checkedBoxes = document.getElementsByClassName('checkedBoxes');
                for (let i = 0; i < checkedBoxes.length; i++){
                checkedBoxes[i].setAttribute('checked', true);
                checkedBoxes[i].setAttribute('disabled', true);
                }
                }
            if (role == 'Accounting'){
                var checkedBoxes = document.getElementsByClassName('checkedBoxes');
                for (let i = 0; i < checkedBoxes.length; i++){
                checkedBoxes[i].removeAttribute('checked');
                }
                document.getElementById('billingCheck').setAttribute('checked', true);
                document.getElementById('makePaymentsCheck').setAttribute('checked', true);
                }
          if (role == 'Agent'){
              var checkedBoxes = document.getElementsByClassName('checkedBoxes');
              for (let i = 0; i < checkedBoxes.length; i++){
              checkedBoxes[i].removeAttribute('checked');
              }
            document.getElementById('inboxCheck').setAttribute('checked', true);
            }
          if (role == 'Reports'){
            var checkedBoxes = document.getElementsByClassName('checkedBoxes');
            for (let i = 0; i < checkedBoxes.length; i++){
              checkedBoxes[i].removeAttribute('checked');
            }
            document.getElementById('exportLeadsCheck').setAttribute('checked', true);
            document.getElementById('reportsCheck').setAttribute('checked', true);
          }
          if (role == 'Custom'){
            var checkedBoxes = document.getElementsByClassName('checkedBoxes');
            for (let i = 0; i < checkedBoxes.length; i++){
              checkedBoxes[i].removeAttribute('checked');
              checkedBoxes[i].removeAttribute('disabled');
            }
          }
            }
            $('#back-btn').on('click',function (){
                $('#modal-body-f1').removeClass('d-none');
                $('#modal-body-f2').addClass('d-none');
            })
        $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });

    const getValue = (id) =>{
        return document.getElementById(id).value;
}

    const submitHandler = (e) => {
        e.preventDefault();

        let firstName  = getValue('firstName');
        let lastName  = getValue('lastName');
        let email  = getValue('email');
        let role  = getValue('role');
           
            if(!firstName) {
            toastify('First Name is empty!', 'error');
                return;
            }
            if(!lastName) {
            toastify('Last Name is empty!', 'error');
                return;
            }
            if(!email) {
            toastify('Email is empty!', 'error');
                return;
            }
            
            if(!role) {
            toastify('Role is empty!', 'error');
                return;
            }   
       
            var data = $("#" + e.target.id).serialize();
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            $.ajax({
                type: 'GET',
                url: e.target.action,
                // data: data + '&company_id=' + companyId,
                data: data,
                async: true,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
                      document.getElementById('clientUserForm').reset();
                      toastify(response.success, 'success');
                      location.reload();
                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify('Please try again!', 'error');
                },
            });
        }

        const updateHandler = (e) => {
        e.preventDefault();
       
            var data = $("#" + e.target.id).serialize();
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            $.ajax({
                type: 'GET',
                url: e.target.action,
                data: data,
                async: true,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
                      document.getElementById('updatePermissionForm').reset();
                      toastify(response.success, 'success');
                      location.reload();
                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify('Please try again!', 'error');
                },
            });
        }

        const updateClientUser = (id,role) =>{
            document.getElementById('updateClientUserId').value = id;
            if (role == 'Admin'){
                var checkedBoxes = document.getElementsByClassName('checkedBoxes');
                for (let i = 0; i < checkedBoxes.length; i++){
                checkedBoxes[i].setAttribute('checked', true);
                }
                }
                if(role == 'Accounting'){
                    document.getElementById('updateBillingCheck').setAttribute('checked',true);
                    document.getElementById('updateMakePaymentsCheck').setAttribute('checked',true);
                }
                if(role == 'Agent'){
                    document.getElementById('updateInboxCheck').setAttribute('checked',true);
                }
                if(role == 'Reports'){
                    document.getElementById('updateExportLeadsCheck').setAttribute('checked',true);
                    document.getElementById('updateReportsCheck').setAttribute('checked',true);
                }
            $('#updatePermissionModal').modal('show');

        }
    </script>
    @endsection