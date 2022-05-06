@extends('layouts.main')
@section('title','Client Management')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Client Management</h1>
                        <p class=" text-right"> <a href="{{route('client-management.create')}}" class="p-f client_btn"> Add New Client</a></p>
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
                                <th>Customer Id</th>
                                <th>Company Name</th>
                                <th>Twilio Id</th>
                                <th>Status</th>
                                <th>Selected Package</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($clients)
                            
                                @php 
                                    $all=count($clients);
                                    for($i=0;$i<$all;$i++){
                                @endphp
                               
                                    
                             
                            <tr class="table-">

                                <td class="table-user">
                                   {{ $clients[$i]->id }}
                                </td>
                                <td>
                                    {{ $clients[$i]->company_name }}
                                </td>
                                <td>
                                    {{ $clients[$i]->twilio_id }}
                                </td>
                                <td>
                                    {{ $clients[$i]->status }}
                                </td>
                                <td class="text-center">
                                       {{$subscribed[$i]}}
                                </td>
                                <td>

                                    <button class="btn btn-link" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ url('edit-client-management',$clients[$i]->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ url('user-login',$clients[$i]->user_id) }}">Login As</a>
                                        <a class="dropdown-item" href="#">Add Funds</a>
                                        <a class="dropdown-item" href="#">Manage Rates</a>
                                        <a class="dropdown-item" href="{{ url('deactivate-client-management',$clients[$i]->id) }}">Deactivate</a>

                                    </div>
                                </td>
                            </tr>
                           
                            @php
                                    }
                            @endphp
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
            <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
                
            </script>
@endsection
