@extends('layouts.main')
@section('title','Billing Overview')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Billing Overview</h1>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container-fluid billing-container">
                            <div class="row bill-row-f">
                                <div class="col-md-4">
                                    <div class="card trans-f my-3">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Current Balance</h3>
                                            <span class="text-white">$ 466</span>
                                            <blockquote class="blockquote text-white mb-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            </blockquote>
                                            <button type="button" class="btn btn-success mt-2">Add Funds</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card trans-f my-3">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Auto Recharge</h3>
                                            <span class="text-white">Enabled</span>
                                            <blockquote class="blockquote text-white mb-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            </blockquote>
                                            <button type="button" class="btn btn-secondary mt-2 text-purple-f">Configure Auto Recharge</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card trans-f my-3">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Service <Address></Address></h3>
                                            <span class="text-white">Reliable Partner</span>
                                            <blockquote class="blockquote text-white mb-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            </blockquote>
                                            <button type="button" class="btn btn-success mt-2">Add Card</button>
                                            <button type="button" class="btn btn-secondary text-purple-f mt-2">Manage Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-control-label label-billing-f  text-white" for="exampleFormControlSelect1">Usage</label>
                        <select class="form-control select label-filter-f" id="exampleFormControlSelect1">
                            <option>January 2022</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-control-label label-billing-f text-white" for="exampleFormControlSelect2">Payment</label>
                        <select class="form-control select label-filter-f " id="exampleFormControlSelect2">
                            <option>January 2022</option>
                        </select>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">

                                <td class="table-user">
                                    sms_verizon_surcharge
                                </td>
                                <td>
                                    16472.00
                                </td>
                                <td>
                                    $0.0025
                                </td>
                                <td>
                                    $41.18
                                </td>
                            </tr>
                            <tr class="table-">

                                <td class="table-user">
                                    sms_verizon_surcharge
                                </td>
                                <td>
                                    16472.00
                                </td>
                                <td>
                                    $0.0025
                                </td>
                                <td>
                                    $41.18
                                </td>
                            </tr>
                            <tr class="table-">

                                <td class="table-user">
                                    sms_verizon_surcharge
                                </td>
                                <td>
                                    16472.00
                                </td>
                                <td>
                                    $0.0025
                                </td>
                                <td>
                                    $41.18
                                </td>
                            </tr>
                            <tr class="table-">

                                <td class="table-user">
                                    sms_verizon_surcharge
                                </td>
                                <td>
                                    16472.00
                                </td>
                                <td>
                                    $0.0025
                                </td>
                                <td>
                                    $41.18
                                </td>
                            </tr>
                            <tr class="table-">

                                <td class="table-user">
                                    sms_verizon_surcharge
                                </td>
                                <td>
                                    16472.00
                                </td>
                                <td>
                                    $0.0025
                                </td>
                                <td>
                                    $41.18
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <th>$1653</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush table-hover" id="datatable-buttons">
                            <thead class="thead-light">
                            <tr>

                                <th>Date</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">

                                <td class="table-user">
                                    Jan 04, 2022
                                </td>
                                <td>
                                    Credit Card. View Receipt
                                </td>
                                <td>
                                    $902.00
                                </td>
                                <td>
                                    Sale
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <th>$1653</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
