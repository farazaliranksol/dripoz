@extends('layouts.main')
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/alumuko/vanilla-datetimerange-picker@latest/dist/vanilla-datetimerange-picker.css">
@section('title','Console')
@section('content')
  <!-- Sidenav -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-white pb-4">
                      Billing Overview
                  </h1>
                  <h2 class="text-white text-right">
                    Period : <span id="dt-rng-f"><input type="text" id="datetimerange-input1" size="40" class="input-date-f" ><i class="ni ni-bold-down ni-f" readonly></i></span>
                </h2>
              </div>
          </div>
        </div>
      </div>
    </div>
  <div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0 pb-0">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0 drip_head">Billing Overview</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-basic_wrapper" class="table align-items-center table-flush table-hover">
                            <thead class="thead-light dripoz_tabl_head">
                            <tr>
                                <th>Total Revenue</th>
                                <th>Total Cost</th>
                                <th>Profit</th>
                                <th>Profit %</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
 <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/alumuko/vanilla-datetimerange-picker@latest/dist/vanilla-datetimerange-picker.js"></script>
        <script>
            window.addEventListener("load", function (event) {
                let drp = new DateRangePicker('datetimerange-input1',
                    {
                       
                        timePicker: true,
                        alwaysShowCalendars: true,
                        ranges: {
                            'Today': [moment().startOf('day'), moment().endOf('day')],
                            'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
                            'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment().endOf('day')],
                            'This Month': [moment().startOf('month').startOf('day'), moment().endOf('month').endOf('day')],
                        },
                        locale: {
                            format: "YYYY-MM-DD",
                        }
                    },
                    function (start, end) {
                        alert(start.format() + " - " + end.format());
                    })
                
                window.addEventListener('apply.daterangepicker', function (ev) {
                    console.log(ev.detail.startDate.format('YYYY-MM-DD'));
                    console.log(ev.detail.endDate.format('YYYY-MM-DD'));
                });
            });
        </script>
@endsection
