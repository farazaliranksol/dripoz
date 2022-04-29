@extends('layouts.main')
@section('title','A/B Test')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        <h1 class="h1-f text-white d-inline-block mb-0 d-block">A/B Tests</h1>
                        <p class="text-white">Create A/B Tests to split test multiple campaigns. You can specify which
                            A/B Test to use when posting to the API.</p>
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
                                <th>Name</th>
                                <th>Id</th>
                                <th>Type</th>
                                <th>Campaigns</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-">

                                <td class="table-user">
                                    SMS
                                </td>
                                <td>
                                    reply
                                </td>
                                <td>
                                    ai
                                </td>
                                <td>
                                    Call me scheduled
                                </td>
                                <td>

                                    <button class="btn btn-link" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Download</a>
                                        <a class="dropdown-item" href="#">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Create A/B Test Button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ab_test">Create A/B Test
                </button>
            </div>
        </div>

        <!--A/B Test MODAL-->
        <div class="modal fade" id="ab_test" tabindex="-1" role="dialog" aria-labelledby="modal-default"
             aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form method="post" action="">
                        @csrf
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">A/B Test</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">ADD/EDIT</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" pattern="[a-zA-Z]{1,}" required name="name" placeholder="Enter A/B Name">
                                </div>
                                @error('name')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group">
                                    <label class="form-control-label" for="editAI">Type<i
                                            class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Round Robin. Distribute the leads evenly across all of the campaigns selected.Home Value (By Zip Code) Using the average home value for a given zip code, this will put each lead in campaign based on the average cost of the home using the Zillow Home Value Index (ZHVI). Low Home Cost, Medium Home Cost, High Home Cost, and N/A (No ZHVI, or no Zip Code.). (Your leads must have a zip code.)"></i></label>
                                    <select class="form-control @error('type') is-invalid @enderror"
                                            id="type" required name="type">
                                        <option value="Round Robin">Round Robin</option>
                                        <option value="Home Value">Home Value (By Zip Code)</option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group">
                                    <label class="form-control-label" for="editAI">campaigns<i
                                            class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Test"></i></label>
                                    <select class="form-control @error('campaigns') is-invalid @enderror"
                                            id="campaigns" required name="campaigns">
                                        <option value="">Select Campaign(s)</option>
                                    </select>
                                </div>
                                @error('campaigns')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>
                    </form>
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
