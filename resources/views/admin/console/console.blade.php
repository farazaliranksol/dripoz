@extends('layouts.main')
@section('title','Console')
@section('content')

<style>
    .hidden{
        display:none !important;
    }
</style>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Console</h6>
                </div>
            </div>
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7 mt--6">
                    <small class="text-white">
                        Performance Last 7 days
                    </small>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Active leads</h6>
                                    <span class="h2 font-weight-bold mb-0">3508</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-sound-wave"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">live/outbound calls</h6>
                                    <span class="h2 font-weight-bold mb-0">999/1</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Sales</h6>
                                    <span class="h2 font-weight-bold mb-0">924</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fa fa-random fa-stack-1x text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title text-uppercase text-muted mb-0">Long Transfer</h6>
                                    <span class="h2 font-weight-bold mb-0">56,623</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class='far fa-comments fa-stack-1x text-white'></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row deleted_campaign_row mb-4">
                <div class="col d-flex justify-content-end align-items-center">

                    <input type="checkbox" name="show_deleted" class="checkboxinput mr-2" id="id_show_deleted"> <label
                        for="id_show_deleted" class="text-white chk_labl mb-0 label_container" >Show deleted
                        campaigns</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt-6">
    <div class="row">
        <div class="col">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0 pb-0">
                    <div class="row">
                        <div class="col-md-4 col-8">
                            <h3 class="mb-0 drip_head">Drip Campaigns</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table align-items-center table-flush table-hover w-100"  id="table1">
                            <thead class="thead-light dripoz_tabl_head">
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Leads</th>
                                    <th>CPS</th>
                                    <th>Progress</th>
                                    <th>Numbers</th>
                                    <th>Delivery</th>
                                    <th>Status</th>
                                    <th>On Transfer</th>
                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                        <table  class="table align-items-center table-flush table-hover w-100"  id="table2">
                            <thead class="thead-light dripoz_tabl_head">
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Leads</th>
                                    <th>CPS</th>
                                    <th>Progress</th>
                                    <th>Numbers</th>
                                    <th>Delivery</th>
                                    <th>Status</th>
                                    <th>On Transfer</th>
                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col mt-1 text-center">
            <button type="button" class="btn btn-primary btn-round btn-icon mt-2">
                <a href="{{route('newCampaign.index')}}" style="color: white;">
                    <!-- <span class="btn-inner--icon"><i class="fas fa-plus"></i></span> -->
                    <span class="btn-inner--text">Add New Campaign</span>
                </a>
            </button>
            <button type="button" class="btn btn-primary btn-round btn-icon mt-2" data-toggle="modal"
                data-target="#modal-form" onclick="updateAllCampaignsStatus('pause')">
                <!-- <span class="btn-inner--icon"><i class="fas fa-pause"></i></span> -->
                <span class="btn-inner--text">Pause All Campaigns</span>
            </button>
            <button type="button" class="btn btn-primary btn-round btn-icon mt-2" data-toggle="modal"
                data-target="#modal-form" onclick="updateAllCampaignsStatus('unpause')">
                <!-- <span class="btn-inner--icon"><i class="fas fa-play"></i></span> -->
                <span class="btn-inner--text">Unpause All Campaign</span>
            </button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$( document ).ready(function() {
    $('#table1').DataTable( {
        processing: true,
        serverSide: true,
        ajax: "{{ route('consoleTable') }}",
        columns: [
                {data: 'name', name: 'name'}, 
                {data: 'id', name: 'id'},
                {data: 'lead', name: 'lead'},
                {data: 'cps', name: 'cps'},
                {data: 'progress', name: 'progress'},
                {data: 'numbers', name: 'numbers'},
                {data: 'delivery', name: 'delivery'},
                {data: 'status', name: 'status'},
                {data: 'OnTransfer', name: 'OnTransfer'},      
                {data: 'Options', name: 'Options'},
            ]
    }); 
    $('#table2').DataTable( {
        processing: true,
        serverSide: true,
        ajax: "{{ route('TableConsole') }}",
        columns: [
                {data: 'name', name: 'name'}, 
                {data: 'id', name: 'id'},
                {data: 'lead', name: 'lead'},
                {data: 'cps', name: 'cps'},
                {data: 'progress', name: 'progress'},
                {data: 'numbers', name: 'numbers'},
                {data: 'delivery', name: 'delivery'},
                {data: 'status', name: 'status'},
                {data: 'OnTransfer', name: 'OnTransfer'},      
                {data: 'Options', name: 'Options'},
            ]
    });
    $('#table2_wrapper').addClass('hidden');
});
function CheckAll() {
    if ($('#table-check-all').is(':checked')) {
        $('div input[type=checkbox]').attr('checked', true);
    } else {
        $('div input[type=checkbox]').attr('checked', false);
    }
}

// Update status campaigns
function updateAllCampaignsStatus(status) {
    if (status == 'pause') {
        var text = "Are you sure you want to pause all running campaigns?";
    }
    if (status == 'unpause') {
        var text = "Are you sure you want to unpause all running campaigns?";
    }
    swal({
        title: 'Are you sure?',
        text: text,
        type: 'info',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-info',
        confirmButtonText: 'Yes',
        cancelButtonClass: 'btn btn-secondary',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                url: "{{ url('updateAllCampaignsStatus') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": status
                },
                type: "POST",
                success: function(status) {
                    $('#table1').DataTable().ajax.reload();
                }
            });
        }
    })
}

// pause a single record
function pause(id) {
    $.ajax({
        url: "pauseSingleRecord",
        type: "GET",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
        },
        success: function(response) {
            if (response.success) {
                // i='rec'+id;
                toastify(response.success, 'success');
                $('#table1').DataTable().ajax.reload();
            } else {
                toastify(response.error, 'error');
            }
        },
        error: function(response) {
            toastify(response.responseJSON.errors.name[0], 'error');
        },
    });
}
function restore(id) {
    $.ajax({
        url: "restoreSingleRecord",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
        },
        success: function(response) {
            if(response.success){
                toastify(response.success, 'success')
                $('#table1').DataTable().ajax.reload();
                $('#table2').DataTable().ajax.reload();
            }else{
                toastify(response.error, 'error');
            };  
        },
    });
}
function delete_compaign(id){
    swal({
        title: 'Are you sure?',
        text: 'Are you sure you want to delete this campaign?',
        type: 'info',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-info',
        confirmButtonText: 'Yes',
        cancelButtonClass: 'btn btn-secondary',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                url: "{{ route('deleteCompaign') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id
                },
                type: "POST",
                success: function(data) {
                    toastify(data.success, 'success');
                    $('#table1').DataTable().ajax.reload();
                    $('#table2').DataTable().ajax.reload();
                }
            });
        }
    })
}


function checkbox_check(){
    if($("#id_show_deleted").is(':checked')){
    }else{
    }
}
$('#id_show_deleted').change(function (){
    if($(this).prop('checked')) {
        $('#table1_wrapper').addClass('hidden');
        $('#table2_wrapper').removeClass('hidden');
    }else{
        $('#table2_wrapper').addClass('hidden');
        $('#table1_wrapper').removeClass('hidden');
    }
})
</script>
@endsection