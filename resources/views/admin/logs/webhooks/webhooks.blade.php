@extends('layouts.main')
@section('title','Webhooks')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Webhook log</h1>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <div class="container-fluid mt-6">
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <form>
                    <textarea style="overflow:auto; resize:none; height: 500px; width: 100%; font-size: 12px;" wrap="off" readonly=""></textarea>
                </form>
            </div>
        </div>
    @endsection
