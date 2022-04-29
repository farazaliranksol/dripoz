@extends('layouts.main')
@section('title','Sounds Library')
@section('content')
   <div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-md-12">
                    <h1 class="h1-f text-white d-inline-block mb-0 d-block">Sound Library</h1>
                </div>
            </div>
                <div class="row align-items-center mb-3">
                    <form action="{{route('sound.store')}}" method="post" id="sound-form" enctype="multipart/form-data" class="w-100">
                        @csrf
                <div class="col-md-8">
                    <input type="file" name="sound" hidden id="sound" class="@error('sound') is-invalid @enderror">
                    @error('sound')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror

                  <button type="button" class="btn btn-secondary text-purple-f mt-3 d-flex align-items-center" id="sound-btn"><i class="ni ni-fat-add ml-0"></i> Select Audio</button>
                  <button type="button" class="btn btn-secondary text-purple-f mt-3" hidden id="sound-upload">Upload</button>
                    <img src="{{asset('public/assets/img/loader.gif')}}" hidden id="loader-show">
                </div>
                    </form>
            </div>
            <!-- Card stats -->
            </div>
            </div>
            </div>
   <div class="container-fluid mt--6">
       <!-- Table -->
       <div class="row">
           <div class="col">
               <div class="card">
                   <!-- Card header -->
              {{--     <div class="card-header">
                       <h3 class="mb-0">Datatable</h3>
                       <p class="text-sm mb-0">
                           This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                       </p>
                   </div>--}}
                   <div class="table-responsive py-4">
                       <table class="table table-flush" id="datatable-basic">
                           <thead >
                           <tr>
                               <th>Sr#</th>
                               <th>FileName</th>
                               <th>Audio</th>
                               <th>Created</th>
                               <th>Actions</th>
                           </tr>
                           </thead>
                           <tfoot>
                           <tr>
                               <th>Sr#</th>
                               <th>FileName</th>
                               <th>Audio</th>
                               <th>Created</th>
                               <th>Actions</th>
                           </tr>
                           </tfoot>
                           <tbody>
                           @if($sounds)
                               @foreach($sounds as $key=>$sound)
                           <tr>
                               <td>{{++$key}}</td>
                               <td>{{$sound->file}}</td>
                               <td><audio controls>
                                       <source src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                   </audio></td>
                               <td>{{date('d-m-Y H:i:s', strtotime($sound->created_at))}}</td>
                               <td>
                                   <a href="{{url('sound_delete',$sound->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="ni ni-fat-remove" style="font-size: 20px"></i></a>
{{--                                   <button class="btn btn-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                       <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>--}}
{{--                                   </button>--}}

{{--                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                       <a class="dropdown-item" href="#">Download</a>--}}
{{--                                       <a class="dropdown-item" href="#">Delete</a>--}}

{{--                                   </div>--}}
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
   </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('sound-btn').onclick=function (){
            document.getElementById('sound').click();
           document.getElementById('sound-btn').style.display='none';
           document.getElementById('sound-upload').hidden =false;
        }
        document.getElementById('sound-upload').onclick=function (){
            document.getElementById('sound-form').submit();
            document.getElementById('loader-show').hidden = false;
        }

    </script>
    @endsection
