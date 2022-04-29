@extends('layouts.main')
@section('title','Add User')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-12 col-12">
          @if(!isset($user))
          <h1 class="h1-f text-white d-inline-block mb-0 d-block">Add User</h1>
          @else
          <h1 class="h1-f text-white d-inline-block mb-0 d-block">Update User</h1>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('user-store') }}" id="userForm" onsubmit="userFormHandler(event)">
        @csrf
         <input type="hidden" name="user_id" @if(isset($user)) value="{{ $user->id ? $user->id : '' }}"
          @endif />
        {{--<input type="hidden" name="user_id" @if(isset($user)) value="{{ $user->id ? $user->id : '' }}" @endif /> --}}
        <div class="card">
          <div class="card-body">
            <!------ User info  ---->
            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">User
                    Info</label>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <select class="form-control" id="companyName" name="companyName">
                      @foreach($companies as $company)
                      <option @if(isset($user)) @if($company->user_id == $user->user_id) selected @endif @endif value="{{ $company->user_id }}" data-company-id = {{ $company->id }}>{{ $company->company_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select class="form-control" id="role" name="role" onchange="rolesChecked(this.value)">
                      <option @if(isset($user)) @if($user->role == 'Admin') selected @endif @endif value="Admin" >Administrator
                        (Full access to all features.)</option>
                      <option @if(isset($user)) @if($user->role == 'Accounting') selected @endif @endif value="Accounting">Accounting (View, and pay
                        invoices. Modify auto recharge settings.)</option>
                      <option @if(isset($user)) @if($user->role == 'Agent') selected @endif @endif value="Agent"> Agent (View and manage the companies SMS
                        Inbox.)</option>
                      <option @if(isset($user)) @if($user->role == 'Reports') selected @endif @endif value="Reports">Reports (View and export reports.)
                      </option>
                      <option @if(isset($user)) @if($user->role == 'Custom') selected @endif @endif value="Custom">Custom (Account with custom
                        persmissions.)</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                      @if(isset($user)) value="{{ $user->first_name ? $user->first_name : '' }}" @endif />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                      @if(isset($user)) value="{{ $user->last_name ? $user->last_name : '' }}" @endif />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                      @if(isset($user)) value="{{ $user->email ? $user->email : '' }}" @endif>
                  </div>
                </div>
                @if(!isset($user))
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                      value="" >
                  </div>
                </div>
                @else
                <input id="password" value="132" hidden>
                @endif
              </div>
              <div class="row border-bt-f">
                <div class="col-md-6 pl-4 pt-3">
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="inboxCheck" name="inboxCheck" type="checkbox"
                     value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) {  if($user->clientUserPermissions->inbox == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="inboxCheck">Inbox</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="phoneNumberCheck" name="phoneNumberCheck"
                      type="checkbox"  value="1"  @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->phone_number == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="phoneNumberCheck">Phone Number</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="exportLeadsCheck" name="exportLeadsCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->export_leads == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="exportLeadsCheck">Export Leads</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="aiRulesCheck" name="aiRulesCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->ai_rules == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="aiRulesCheck">A.I Rules</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="billingCheck" name="billingCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->billing == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="billingCheck">Billing</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="toolsCheck" name="toolsCheck" type="checkbox"
                       value="1"  @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->tools == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="toolsCheck">Tools</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="logsCheck" name="logsCheck" type="checkbox"
                       value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->logs == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="logsCheck">Logs</label>
                  </div>
                </div>
                <div class="col-md-6 pl-4 pt-3">
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="consoleCheck" name="consoleCheck"
                      type="checkbox" value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->console == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="consoleCheck">Console</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="viewLeadsCheck" name="viewLeadsCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->view_leads == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="viewLeadsCheck">View Leads</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="soundCheck" name="soundCheck" type="checkbox"
                       value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->sound_library == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp> 
                    <label class="custom-control-label role_input_label" for="soundCheck">Sound Library</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="reportsCheck" name="reportsCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->view_reports == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="reportsCheck">View Reports</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="makePaymentsCheck" name="makePaymentsCheck"
                      type="checkbox"  value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->make_payments == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="makePaymentsCheck">Make Payments</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="alertsCheck" name="alertsCheck" type="checkbox"
                       value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->alerts == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="alertsCheck">Alerts</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input checkedBoxes" id="apiCheck" name="apiCheck" type="checkbox"
                       value="1" @php if(@$user->role != 'Custom'){ echo  'checked disabled'; }else { echo '';} if(isset($user)) { if($user->clientUserPermissions->api == 1){ echo 'checked'; }else{ echo '' ;}  } @endphp>
                    <label class="custom-control-label role_input_label" for="apiCheck">API</label>
                  </div>
                </div>
              </div>
            </section>
            <button type="submit" class=" button">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    <?php if ((isset($user)) AND ($user->role != 'Custom')) {?>
    rolesChecked('<?php echo $user->role; ?>');
    <?php  } ?>
});

const getValue = (id) =>{
  return document.getElementById(id).value;
}
// function companyId(id) {
//     $('#'+id).change(function() {
//         var com_id = $(this).find('option:selected').data('company-id');
//      });
// });

  //  form submit handler
  const userFormHandler = (e) => {
    e.preventDefault();

    let companyName  = getValue('companyName');
    let companyId = $('#companyName').find('option:selected').data('company-id');
    let firstName  = getValue('firstName');
    let lastName  = getValue('lastName');
    let email  = getValue('email');
    let password  = getValue('password');
    let role  = getValue('role');
        if(!companyName){
          toastify('Company Name is empty!', 'error');
            return;
        }
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
        if(!password) {
          toastify('Password is empty!', 'error');
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
                data: data + '&company_id=' + companyId,
                async: true,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
                      toastify(response.success, 'success');
                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify('Please try again!', 'error');
                },
            });
        }


        const rolesChecked = (role) =>{
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
</script>
@endsection