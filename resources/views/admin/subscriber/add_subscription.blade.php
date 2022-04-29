@extends('layouts.main')
@section('title','Subscription')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-12 col-12">
          <h1 class="h1-f text-white d-inline-block mb-0 d-block">Add New Package</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('subscriber-store') }}" id="subscriptionForm" onsubmit="userFormHandler(event)">
        @csrf
        <div class="card">
          <div class="card-body">
            <!------ Basic company info  ---->
            <section>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-control-label" for="">Subscription Package</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="packageName" name="packageName" placeholder="Package Name" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" required/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" id="totalNumbers" name="totalNumber" placeholder="Total Numbers"  required/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" id="campaigns" name="campaigns" placeholder="Campaigns" required/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" id="users" name="users" placeholder="Number Of Users" required/>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                  <div class="button " id="submit"><button type="submit" class="submit-btn">Submit</button></div>
                  </div>
              </div>
            </section>
           
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
const userFormHandler = (e) => {
    e.preventDefault();
    var data = $("#" + e.target.id).serialize();
    $.ajax({
        type: 'POST',
        url: e.target.action,
        data: data,
        success: function (response) {
          if(response.success) {
            toastify(response.success, 'success');
          }else {
            toastify(response.error, 'error');
          }
        }
    });
}
</script> 
@endsection