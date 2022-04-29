@extends('layouts.main')
@section('title','Client Management')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-12 col-12">
          <h1 class="h1-f text-white d-inline-block mb-0 d-block">Add New Client</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('client-management-store') }}" id="clientManagementForm" onsubmit="clientFormHandler(event)">
        @csrf
        
        <input type="hidden" name="client_id" @if(isset($client)) value="{{ $client->id ? $client->id : '' }}" @endif />
        <input type="hidden" name="user_id" @if(isset($user)) value="{{ $user->id ? $user->id : '' }}" @endif />
        <div class="card">
          <div class="card-body">
            <div id="svg_wrap"></div>
            <!------ Basic company info  ---->
            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">Basic Company
                    Info</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="companyName" name="companyName"
                      placeholder="Company Name" @if(isset($client)) value="{{ $client->company_name ? $client->company_name : '' }}" @endif>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" @if(isset($client)) value="{{ $client->address ? $client->address : '' }}" @endif
                       />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="addressLine1" name="addressLine1"
                      placeholder="Address Line 1" @if(isset($client)) value="{{ $client->address_line_1 ? $client->address_line_1 : '' }}" @endif />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" @if(isset($client)) value="{{ $client->city ? $client->city : '' }}" @endif />
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <input type="number" class="form-control" id="zipCode" name="zipCode" placeholder="Zip Code" @if(isset($client)) value="{{ $client->zip_code ? $client->zip_code : '' }}" @endif
                       />
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control" id="state" name="state" placeholder="State"  @if(isset($client)) value="{{ $client->state ? $client->state : '' }}" @endif />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                      placeholder="Phone Number"  @if(isset($client)) value="{{ $client->phone_number ? $client->phone_number : '' }}" @endif />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="websiteUrl" name="websiteUrl" @if(isset($client)) value="{{ $client->website ? $client->website : '' }}" @endif
                      placeholder="Website URL" required />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="number" class="form-control" id="numberOfUsers" name="numberOfUsers"
                      placeholder="No. of Users" @if(isset($client)) value="{{ $client->no_of_users ? $client->no_of_users : '' }}" @endif />
                  </div>
                </div>
              </div>
            </section>

            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">Twilio Info</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="twilioId" name="twilioId" placeholder="Twilio Id" @if(isset($client)) value="{{ $client->twilio_id ? $client->twilio_id : '' }}" @endif
                       />
                  </div>
                </div>
              </div>
            </section>

            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">User Info</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" @if(isset($user)) value="{{ $user->first_name ? $user->first_name : '' }}" @endif
                       />
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" @if(isset($user)) value="{{ $user->last_name ? $user->last_name : '' }}" @endif
                       />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="number" class="form-control" id="mobileNumber" name="mobileNumber"
                      placeholder="Mobile Number" @if(isset($user)) value="{{ $user->number ? $user->number : '' }}" @endif />
                  </div>
                </div>
              </div>
            </section>

            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">Login Info</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Id" @if(isset($user)) value="{{ $user->email ? $user->email : '' }}" @endif />
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" @if(isset($user)) value="{{ $user->password ? $user->password : '' }}" @endif
                       />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="form-control" id="role" name="role">
                      <option value="Admin">Admin</option>
                    </select>
                  </div>
                </div>
              </div>
            </section>

            <div class="button" id="prev">&larr; Previous</div>
            <div class="button" id="next"> Next &rarr;</div>
            <div class="button " id="submit"><button type="submit" class="submit-btn">Submit</button></div>
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
});

$(document).ready(function() {
    var base_color = "rgb(230,230,230)";
    var active_color = "#5e72e3";



    var child = 1;
    var length = $("section").length - 1;
    $("#prev").addClass("disabled");
    $("#submit").addClass("disabled");

    $("section").not("section:nth-of-type(1)").hide();
    $("section").not("section:nth-of-type(1)").css('transform', 'translateX(100px)');

    var svgWidth = length * 200 + 24;
    $("#svg_wrap").html(
        '<svg version="1.1" id="svg_form_time" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
        svgWidth +
        ' 24" xml:space="preserve"></svg>'
    );

    function makeSVG(tag, attrs) {
        var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
        for (var k in attrs) el.setAttribute(k, attrs[k]);
        return el;
    }

    for (i = 0; i < length; i++) {
        var positionX = 12 + i * 200;
        var rect = makeSVG("rect", {
            x: positionX,
            y: 9,
            width: 200,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(rect);
        // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
        var circle = makeSVG("circle", {
            cx: positionX,
            cy: 12,
            r: 12,
            width: positionX,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(circle);
    }

    var circle = makeSVG("circle", {
        cx: positionX + 200,
        cy: 12,
        r: 12,
        width: positionX,
        height: 6
    });
    document.getElementById("svg_form_time").appendChild(circle);

    $('#svg_form_time rect').css('fill', base_color);
    $('#svg_form_time circle').css('fill', base_color);
    $("circle:nth-of-type(1)").css("fill", active_color);


    $(".button").click(function() {
        $("#svg_form_time rect").css("fill", active_color);
        $("#svg_form_time circle").css("fill", active_color);
        var id = $(this).attr("id");
        if (id == "next") {
            $("#prev").removeClass("disabled");
            if (child >= length) {
                $(this).addClass("disabled");
                $('#submit').removeClass("disabled");
            }
            if (child <= length) {
                child++;
            }
        } else if (id == "prev") {
            $("#next").removeClass("disabled");
            $('#submit').addClass("disabled");
            if (child <= 2) {
                $(this).addClass("disabled");
            }
            if (child > 1) {
                child--;
            }
        }
        var circle_child = child + 1;
        $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
            "fill",
            base_color
        );
        $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
            "fill",
            base_color
        );
        var currentSection = $("section:nth-of-type(" + child + ")");
        currentSection.fadeIn();
        currentSection.css('transform', 'translateX(0)');
        currentSection.prevAll('section').css('transform', 'translateX(-100px)');
        currentSection.nextAll('section').css('transform', 'translateX(100px)');
        $('section').not(currentSection).hide();
    });
});

const getValue = (id) =>{
  return document.getElementById(id).value;
}
  //  form submit handler
  const clientFormHandler = (e) => {
    e.preventDefault();

    let companyName  = getValue('companyName');
    let address  = getValue('address');
    let addressLine1  = getValue('addressLine1');
    let city  = getValue('city');
    let zipCode  = getValue('zipCode');
    let state  = getValue('state');
    let phoneNumber  = getValue('phoneNumber');
    let numberOfUsers  = getValue('numberOfUsers');
    let twilioId  = getValue('twilioId');
    let firstName  = getValue('firstName');
    let lastName  = getValue('lastName');
    let mobileNumber  = getValue('mobileNumber');
    let email  = getValue('email');
    let password  = getValue('password');
    let role  = getValue('role');
  if(!companyName){
    toastify('Company Name is empty!', 'error');
      return;
  }
  if(!address){
    toastify('Address is empty!', 'error');
      return;
  }
  if(!city){
    toastify('City is empty!', 'error');
      return;
  }
  if(!zipCode) {
    toastify('Zip Code is empty!', 'error');
        return;
  }
  if(!state) {
    toastify('State is empty!', 'error');
        return;
  }
  if(!phoneNumber) {
    toastify('Phone Number is empty!', 'error');
        return;
  }
  if(!numberOfUsers) {
    toastify('Number of Users is empty!', 'error');
        return;
  }
  if(!twilioId) {
    toastify('Twilio Id is empty!', 'error');
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
  if(!mobileNumber) {
    toastify('Mobile Number is empty!', 'error');
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
                data: data,
                async: true,
                success: function (response) {
                document.getElementById('loader').hidden = true;
                document.getElementById('bodyBlur').style.cssText="";
                    if (response.success) {
                      document.getElementById('clientManagementForm').reset();
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
</script>
@endsection