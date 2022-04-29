@extends('layouts.main')
@section('title','Upload Conversation')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">Upload Conversion Data</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-5">
                    <h2>Upload instructions</h2>
                    <p>
                        You can upload a CSV file up to 10MB. If your file exceeds 10MB , you will need to upload multiple files as separate lists.

                        Please format the first row of your columns with the proper column names, i.e: "Phone Number." For more information, see our help documentation. Files without proper column headers will be rejected.

                        Note: Only the Phone Number field is required.
                    </p>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile" accept="text/csv" lang="en">
                        <label class="custom-file-label" for="customFile">Select file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
@endsection
