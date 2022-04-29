@extends('layouts.main')
@section('title','Billing Overview')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-12">
                    <h1 class="h1-f text-white d-inline-block mb-0 d-block">Account Setting</h1>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="container-fluid billing-container">
                        <div class="row bill-row-f">
                            <div class="col-lg-4">
                                <div class="card trans-f my-3">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">User Details</h3>
                                        <blockquote class="blockquote text-white mb-0">
                                            <p>User:<span id="email">{{ auth()->user()->email }}</span></p>
                                            <p>First Name: <span id="first_name">{{ auth()->user()->first_name }}</span>
                                            </p>
                                            <p>Last Name: <span id="last_name">{{ auth()->user()->last_name }}</span>
                                            </p>
                                            <p>Change Password</p>
                                        </blockquote>
                                        <button type="button" class="btn btn-success mt-2"
                                            onclick="editUserDetail()">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card trans-f my-3">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Contact Details
                                        </h3>
                                        <blockquote class="blockquote text-white mb-0">
                                            <p>Email: <span id="email_contact"> {{ auth()->user()->email }}</span></p>
                                            <p>Mobile:  @if (auth()->user()->number)<span id="number"> {{ auth()->user()->number }}</span> @else N/A @endif</p>
                                            <p>If alerts are enabled, they will be issued to the above destinations.</p>
                                        </blockquote>
                                        <button type="button" class="btn btn-secondary text-purple-f" onclick="editUserContact()">Edit</button>
                                    </div>
                                </div>
                            </div>
                            @if(auth()->user()->role != 'SuperAdmin')
                            <div class="col-lg-4">
                                <div class="card trans-f my-3">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Service Address</h3>
                                        <blockquote class="blockquote text-white mb-0">
                                            <p>{{$clientManagement->address}}
                                                {{$clientManagement->address_line_1}}
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Email Alerts</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="container">
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Compaign results
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Failed Transfer results
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Billing Alerts
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Phone Number Alerts
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox" checked>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Sms Delivery Alerts
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Daily Reporting Email
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Report On Successful Payment
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Sms Alerts</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="container">
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Compaign results
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Failed Transfer results
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Billing Alerts
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Phone Number Alerts
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                </div>
                                <div class="col-md-8 text-left">
                                    Issue Sms Delivery Alerts
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right mt-0 pt-1 pb-1">
            <button class="btn btn-primary pl-4 pr-4">SAVE</button>
        </div>
    </div>
    <!-----user detail modal------->
    <div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form id="userDetailsForm" onsubmit="submitHandler(event)" action="{{ url('userDetailsForm') }}">
                        @csrf
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header pb-0">
                                <div class="text-darker text-lg text-center mt-2 mb-3">
                                    <h2>User Detail</h2>
                                </div>
                            </div>
                            <input type="hidden" value="{{ auth()->user()->id }}" name="userId" id="userId" />
                            <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup" style="overflow: auto;">
                                <div class="row">
                                    <label>First Name</label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" />
                                </div>
                                <div class="row">
                                    <label>Last Name</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" />
                                </div>
                                <div class="row">
                                    <label>Email</label>
                                    <input type="email" id="emailModal" name="email" class="form-control" />
                                </div>
                                <div class="row">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="float-right">
                                    <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                    <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!-----user Contact modal------->
      <div class="modal fade" id="userContactModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
      aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
          <div class="modal-content">
              <div class="modal-body p-0">
                  <form id="userContactForm" onsubmit="submitHandler(event)" action="{{ url('userContactForm') }}">
                      @csrf
                      <div class="card bg-secondary border-0 mb-0">
                          <div class="card-header pb-0">
                              <div class="text-darker text-lg text-center mt-2 mb-3">
                                  <h2>User Contact</h2>
                              </div>
                          </div>
                          <input type="hidden" value="{{ auth()->user()->id }}" name="userId" id="userContactId" />
                          <div class="card-body px-lg-5 py-lg-5 text-left" id="callPopup" style="overflow: auto;">
                           
                             
                              <div class="row">
                                  <label>Email</label>
                                  <input type="email" id="emailContact" name="email" class="form-control" />
                              </div>

                              <div class="row">
                                  <label>Phone Number</label>
                                  <input type="number" id="numberContact" name="number" class="form-control" />
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <div class="row">
                              <div class="float-right">
                                  <a class="btn btn-secondary" data-dismiss="modal"> Cancel</a>
                                  <button type="submit" class="btn btn-primary"><a> Save Changing </a>
                                  </button>
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
    <script>
        const editUserDetail = () =>{
            let email = document.getElementById('email').innerText;
            let firstName = document.getElementById('first_name').innerText;
            let lastName = document.getElementById('last_name').innerText;
            console.log(email,firstName,lastName)
            document.getElementById('firstName').value = firstName;
            document.getElementById('lastName').value = lastName;
            document.getElementById('emailModal').value = email;

            $('#userDetailModal').modal('show');
            }

            const editUserContact = () =>{
            let emailContact = document.getElementById('email_contact').innerText;
            let numberContact = document.getElementById('number').innerText;

            document.getElementById('emailContact').value = emailContact;
            document.getElementById('numberContact').value = numberContact;

            $('#userContactModal').modal('show');
            }

            
    const submitHandler = (e) => {
            e.preventDefault();
            var data = $("#" + e.target.id).serialize();
            document.getElementById('loader').hidden = false;
            document.getElementById('bodyBlur').style.cssText="filter: blur(2px); pointer-events: none";
            $.ajax({
                type: 'POST',
                url: e.target.action,
                data: data,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
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
    </script>
    @endsection