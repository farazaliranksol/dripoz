@extends('layouts.main')
@section('title','Invoices')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Invoices</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="text-grey pl-2 pt-3">Jan. 14, 2022</h3>
                    <div class="table-responsive py-1">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Period</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>r9566za</td>
                                <td>2021-12-26 to 2022-01-26</td>
                                <td>500.00</td>
                                <td>paid</td>
                                <td><a href="#" class="btn btn-success btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>r9566za</td>
                                <td>2021-12-26 to 2022-01-26</td>
                                <td>500.00</td>
                                <td>paid</td>
                                <td><a href="#" class="btn btn-info btn-sm">Pay</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
