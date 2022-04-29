@extends('layouts.main')
@section('title','Rates')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-3 d-block">Rate Overview</h1>
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
                    <p>
                        <button class="btn btn-link label" type="button" data-toggle="collapse" data-target="#phone_pricing" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i>  Phone Number Pricing
                        </button>
                    </p>
                    <div class="collapse" id="phone_pricing">
                        <div class="container pl-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Local Phone Number:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Toll Free Phone Number:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-link label" type="button" data-toggle="collapse" data-target="#voice_pricing" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i>
                            Voice Pricing
                        </button>
                    </p>
                    <div class="collapse" id="voice_pricing">
                        <div class="container pl-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Local Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Local Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Toll-Free Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Toll-Free Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Transfer Fee:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Transcription Fee:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Enhanced AMD:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Recording:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Recording Storage::</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 2.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-link label" type="button" data-toggle="collapse" data-target="#sms_pricing" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i>  SMS Pricing
                        </button>
                    </p>
                    <div class="collapse" id="sms_pricing">
                        <div class="container pl-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Local Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Local Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Toll-Free Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Toll-Free Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>US Cellular SMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Verizon SMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Verizon MMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>AT&T SMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>AT&T MMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>T-Mobile SMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>T-Mobile MMS Surcharge (Outbound):</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Short Code Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Short Code Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>MMS Inbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>MMS Outbound:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-link label" type="button" data-toggle="collapse" data-target="#extra_pricing" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i>  Extra Pricing
                        </button>
                    </p>
                    <div class="collapse" id="extra_pricing">
                        <div class="container pl-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Carrier Lookup Fee:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Speech Recognition Fee:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-link label" type="button" data-toggle="collapse" data-target="#transfer_pricing" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i>  Transfer Pricing
                        </button>
                    </p>
                    <div class="collapse" id="transfer_pricing">
                        <div class="container pl-5">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Pay Per:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Fee Per Transfer:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3>$ 0.75</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
            $('.label').on('click',function(){
                $(this).find('i').toggleClass('fa-plus')
                $(this).find('i').addClass('fa-minus')
            })
        </script>
@endsection
