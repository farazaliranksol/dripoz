@extends('layouts.main')
@section('title','Users')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Users</h1>
                        <p class=" text-right"> <a href="{{route('users.create')}}" class="p-f client_btn"> Add New User</a></p>
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
                                <th>User Id</th>
                                <th>Full Name</th>
                                <th>Email Id</th>
                                <th>Client Company</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($users)
                                @foreach ($users as $user)
                                
                            <tr class="table-">
                                <td class="table-user">
                                   {{ $user->id }}
                                </td>
                                <td>
                                   {{ $user->first_name }} {{ $user->last_name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>

                                @php
                                    $companyName = DB::table('client_management')->where('user_id',$user->user_id)->first();
                          
                               @endphp
                                <td>
                                   {{ $companyName->company_name }}
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
                                        <a class="dropdown-item" href="{{ url('edit-client-user',$user->id) }}">Edit</a>
                                        {{-- <a class="dropdown-item" href="#">Send Password</a> --}}
                                        <a class="dropdown-item" href="{{ url('user-login',$user->id) }}">Login</a>

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
        @endsection
        @section('scripts')
            <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
@endsection
