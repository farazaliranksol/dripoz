@extends('layouts.main')
@section('title','Recurring Items')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-3 d-block">Recurring Overview</h1>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <h3>CPS Fee:</h3>
                            </div>
                            <div class="col-md-3">
                                <h3>$ 320.00</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Local Phone Numbers:</h3>
                            </div>
                            <div class="col-md-3">
                                <h3>781 x $0.75 = $585.75</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Toll Free Phone Numbers:</h3>
                            </div>
                            <div class="col-md-3">
                                <h3>0 x $2.00 = $0.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
