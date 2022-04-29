@extends('layouts.main')
@section('title','Client Management')
<style>
#loader-custom {
    position: absolute;
    left: 50%;
    top: 80%;
    transform: translate(-50%, -80%);
}
</style>
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Package Management</h1>
                        <p class=" text-right"> <a href="{{url('add-subscriber')}}" class="p-f client_btn"> Add New Package</a></p>
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
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Numbers allowed</th>
                                <th>Campaigns</th>
                                <th>Number of Users</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>                                  
                                @if($subscriber)
                                    @foreach ($subscriber as $row)
                                    <tr class="table-">                                 
                                        <td>{{$row->package_name}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->total_number}}</td>
                                        <td>{{$row->campaigns}}</td>
                                        <td>{{$row->users}}</td>
                                        <td>
                                            <button class="btn btn-link" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('edit-subscription',$row->id) }}">Edit</a>
                                                <button type="button" class="remove-item dropdown-item" data-id="{{ $row['id'] }}" data-toggle="modal" data-target="#my-modal">Delete</button>
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
<!-- Modal HTML -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-del p-0">
                <div class="card mb-0 border-0 p-sm-3 p-2 justify-content-center">
                    <div class="card-header pb-0 bg-white border-0 ">
                        <div class="row">
                            <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                        </div>
                        <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>
                    </div>
                    <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                        <div class="row justify-content-end no-gutters">
                            <div class="col-auto"><button type="button" class="btn btn-secondary text-purple-f mr-3" data-dismiss="modal">Cancel</button></div>
                            <div class="col-auto"><button type="button" class="btn px-4 remove-from-cart" style="background-color: #fb6b5b;border-color: #fb6b5b;color:#fff;" data-dismiss="modal" data-token="{{ csrf_token() }}">Delete</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loader-custom" hidden>
    <img src="{{asset('public/assets/img/loader.gif')}}">
</div>
<div>
    <input type="hidden" name="remove_id" value="" class="remove-id">
</div>  
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
remove_it= '';
$('.remove-item').click(function(){
    var id = $(this).attr("data-id");
    $('input[name = "remove_id"]').val(id);
    remove_it=$(this).parents('tr');
});

$(".remove-from-cart").click(function (e) {
    e.preventDefault();         
    var id = $('input[name = "remove_id"]').val();
    var token = $(this).data("token");
    document.getElementById('loader-custom').hidden = false;
    $.ajax({
        url: "delete-subscription",
        type: "POST",
        data: {"_token": token,'id':id},
        success: function (response) {
            document.getElementById('loader-custom').hidden = true;
            remove_it.remove();
          if(response.success) {
            toastify(response.success, 'success');
          }else {
            toastify(response.error, 'error');
          }
        }
    });
});
</script>
@endsection
