@extends('layouts.main')
@section('title','Trust Hub')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4 mb-3">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block mt-5 mb-3">Trust Hub</h1>
                    </div>
                    <div class="col-md-9">
                        <p class="text-white">Trust Hub provides products that can improve customer engagement by increasing throughput and brand recognition. To access the available products, create a Business Profile and we'll verify you as a trusted sender.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="h3-f-purple">General Information</h3>
                                        <div class="form-group row">
                                            <label for="business_name" class="col-md-3 col-form-label form-control-label">Business Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Reliable Partner LLC" id="business_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street_address1" class="col-md-3 col-form-label form-control-label">Street Address</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="street_address1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street_address2" class="col-md-3 col-form-label form-control-label">Street Address (Line 2)</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value=" " id="street_address2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="city" class="col-md-3 col-form-label form-control-label">City</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Lakewood" id="city">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state" class="col-md-3 col-form-label form-control-label">State</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="New jersey" id="state">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="postal_code" class="col-md-3 col-form-label form-control-label">Postal code</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="08071" id="postal_code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="h3-f-purple">Business Information</h3>
                                        <div class="form-group row">
                                            <label for="business_type" class="col-md-3 col-form-label form-control-label">Business Type</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="business_type">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street_address1" class="col-md-3 col-form-label form-control-label">Business Registration Number</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="street_address1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="business_id" class="col-md-3 col-form-label form-control-label">Business Registration ID Type</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="business_id">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="city" class="col-md-3 col-form-label form-control-label">Business Industry</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="business_industry">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="web_url" class="col-md-3 col-form-label form-control-label">Website URL</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="web_url">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="social_media" class="col-md-3 col-form-label form-control-label">Social Media Profile URL</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="i.e LinkedIn, Twitter, Facebook" id="social_media">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h4 class="h4-f-purple">People To Contact</h4>
                                        <p>We will contact your authorized representatives to verify your identities. Please ensure that they are contactable via email and phone.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <h3 class="h3-f-purple">Authorized Representative # 1</h3>
                                        <div class="form-group row">
                                            <label for="business_type" class="col-md-3 col-form-label form-control-label">First Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Mare" id="first_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-3 col-form-label form-control-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="last_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="business_title" class="col-md-3 col-form-label form-control-label">Business title</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Reliable Partner LLC" id="business_title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="job_position" class="col-md-3 col-form-label form-control-label">Job Postiton</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Reliable Partner LLC" id="job_position">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state" class="col-md-3 col-form-label form-control-label">State</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="state">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="postal_code" class="col-md-3 col-form-label form-control-label">Postal Code</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="0108" id="postal_code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="h3-f-purple">Authorized Representative # 2</h3>
                                        <div class="form-group row">
                                            <label for="first_name1" class="col-md-3 col-form-label form-control-label">First Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Mare" id="first_name1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street_address1" class="col-md-3 col-form-label form-control-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="last_name1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="business_title1" class="col-md-3 col-form-label form-control-label">Business title</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Reliable Partner LLC" id="business_title1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="job_postion1" class="col-md-3 col-form-label form-control-label">Job Postiton</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="Reliable Partner LLC" id="job_position1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state1" class="col-md-3 col-form-label form-control-label">State</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="128 Somerset" id="state1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="social_media" class="col-md-3 col-form-label form-control-label">Phone Number</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="+19088397714" id="social_media">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary" type="button">Save</button>
                </div>
            </div>
        </form>
    @endsection
