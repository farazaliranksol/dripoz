 <!--------------------Days event sound modals start------------------------------------>
    <!--voice library-->
    <div class="modal fade" id="voice" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button" class="btn btn-secondary text-purple-f mt-3" id="sound-btn"> Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voice"
                                                                    onclick="getVoiceMsg('#voiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','voice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="callBack" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn"><i class="ni ni-fat-add"></i> Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#callBack"
                                                                    onclick="getVoiceMsg('#callBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','callBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="voiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceMail"
                                                                    onclick="getVoiceMsg('#voiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','voiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="voiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceTransfer"
                                                                    onclick="getVoiceMsg('#transferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','voiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="voiceOutScreener" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#voiceOutScreener"
                                                                    onclick="getVoiceMsg('#outScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','voiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--advance voice mail-->
    <div class="modal fade" id="advanceVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#advanceVoiceMail"
                                                                    onclick="getVoiceMsg('#advanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'advance_voice_mail_audio_sound','advanceVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
                 <!-------------------Day event sounds modal ends-------------------------------->

                <!--------------------Edit Days event sound modals start------------------------------------>
    <!--voice library-->
    <div class="modal fade" id="editVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editVoice"
                                                                    onclick="getVoiceMsg('#editVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','editVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="editCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editCallBack"
                                                                    onclick="getVoiceMsg('#editCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','editCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="editVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editVoiceMail"
                                                                    onclick="getVoiceMsg('#editVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','editVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="editVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editVoiceTransfer"
                                                                    onclick="getVoiceMsg('#editTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','editVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="editVoiceOutScreener" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#editOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','editVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--advance voice mail-->
    <div class="modal fade" id="editAdvanceVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#editAdvanceVoiceMail"
                                                                    onclick="getVoiceMsg('#editAdvanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'advance_voice_mail_audio_sound','editAdvanceVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------Edit Day event sounds modal ends-------------------------------->
  
    <!---------------Inbound open hours modals starts------------------------------->
    <!--voice library-->
    <div class="modal fade" id="inboundOpenHoursVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoice"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','inboundOpenHoursVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="inboundOpenHoursCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursCallBack"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','inboundOpenHoursCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="inboundOpenHoursVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceMail"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','inboundOpenHoursVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="inboundOpenHoursVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceTransfer"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','inboundOpenHoursVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="inboundOpenHoursVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOpenHoursVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#inboundOpenHoursOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','inboundOpenHoursVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------Inbound open hours modals ends------------------------------->

    <!---------------Inbound Off hours modals starts------------------------------->
    <!--voice library-->
    <div class="modal fade" id="inboundOffHoursVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" id="inboundOffHourSoundForm"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="inboundOffHourSound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoice"
                                                                    onclick="getVoiceMsg('#inboundOffHoursVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','inboundOffHoursVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="inboundOffHoursVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceTransfer"
                                                                    onclick="getVoiceMsg('#inboundOffHoursTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','inboundOffHoursVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="inboundOffHoursCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursCallBack"
                                                                    onclick="getVoiceMsg('#inboundOffHoursCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','inboundOffHoursCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="inboundOffHoursVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceMail"
                                                                    onclick="getVoiceMsg('#inboundOffHoursVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','inboundOffHoursVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="inboundOffHoursVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#inboundOffHoursVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#inboundOffHoursOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','inboundOffHoursVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!---------------scheduled call modals starts------------------------------->
    <!--voice library-->
    <div class="modal fade" id="scheduledCallBasicVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoice"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'live_audio_sound','scheduledCallBasicVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="scheduledCallBasicVoiceTransfer" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceTransfer"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_1','scheduledCallBasicVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="scheduledCallBasicCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicCallBack"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'call_back_audio_sound','scheduledCallBasicCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="scheduledCallBasicVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceMail"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'voice_mail_audio_sound','scheduledCallBasicVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="scheduledCallBasicVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#scheduledCallBasicVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#scheduledCallBasicOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'transfer_sound_2','scheduledCallBasicVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------scheduled call basic models end---------------------------------->
    <!-----------------------Out bound live starts calls basic modals------------------------------------------>
    <!--voice library-->
    <div class="modal fade" id="outboundLiveVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal" data-target="#outboundLiveVoice"
                                                                    onclick="getVoiceMsg('#outboundLiveVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_audio_sound','outboundLiveVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="outboundLiveCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveCallBack"
                                                                    onclick="getVoiceMsg('#outboundLiveCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_call_back_audio_sound','outboundLiveCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="outboundLiveVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceMail"
                                                                    onclick="getVoiceMsg('#outboundLiveVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_voice_mail_audio_sound','outboundLiveVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="outboundLiveVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceTransfer"
                                                                    onclick="getVoiceMsg('#outboundLiveTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_1','outboundLiveVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="outboundLiveVoiceOutScreener" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#outboundLiveOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_2','outboundLiveVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------Outbound live basic call event ends------------------------------------->
    <!-----------------------Edit Outbound live starts calls basic modals------------------------------------------>
    <!--voice library-->
    <div class="modal fade" id="editOutboundLiveVoice" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveVoice"
                                                                    onclick="getVoiceMsg('#editOutboundLiveVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_audio_sound','editOutboundLiveVoice')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call back-->
    <div class="modal fade" id="editOutboundLiveCallBack" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveCallBack"
                                                                    onclick="getVoiceMsg('#editOutboundLiveCallBackMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_call_back_audio_sound','editOutboundLiveCallBack')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice mail-->
    <div class="modal fade" id="editOutboundLiveVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveVoiceMail"
                                                                    onclick="getVoiceMsg('#editOutboundLiveVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_voice_mail_audio_sound','editOutboundLiveVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for transfer-->
    <div class="modal fade" id="editOutboundLiveVoiceTransfer" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveVoiceTransfer"
                                                                    onclick="getVoiceMsg('#editOutboundLiveTransferVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_1','editOutboundLiveVoiceTransfer')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--voice library for out screener-->
    <div class="modal fade" id="editOutboundLiveVoiceOutScreener" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                @php
                                                                @endphp
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveVoiceOutScreener"
                                                                    onclick="getVoiceMsg('#editOutboundLiveOutScreenVoiceMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_transfer_sound_2','editOutboundLiveVoiceOutScreener')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------edit outbound live basic call event ends------------------------------------->
    <!-------------------------outbound advance call ----------------------------->
    <!--advance voice mail-->
    <div class="modal fade" id="outboundLiveAdvanceVoiceMail" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#outboundLiveAdvanceVoiceMail"
                                                                    onclick="getVoiceMsg('#outboundLiveAdvanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_advance_voice_mail_audio_sound','outboundLiveAdvanceVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------edit Outbound advanced call ----------------------------->
    <!--advance voice mail-->
    <div class="modal fade" id="editOutboundLiveAdvanceVoiceMail" tabindex="-1" role="dialog"
        aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-fullscreen-md-down " role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <div class="text-darker text-lg text-center mt-2 mb-3">
                                <h2>Select Audio File</h2>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5 text-left" style="overflow: auto; height: 650px;">

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <form action="{{route('sound.store')}}" method="post" id="sound-form"
                                                    enctype="multipart/form-data" class="w-100">
                                                    @csrf
                                                    <div class="col-md-8">
                                                        <input type="file" name="sound" hidden id="sound"
                                                            class="@error('sound') is-invalid @enderror">
                                                        @error('sound')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3"
                                                            id="sound-btn">Select Audio
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-secondary text-purple-f mt-3" hidden
                                                            id="sound-upload">Upload
                                                        </button>
                                                        <img src="{{asset('public/assets/img/loader.gif')}}" hidden
                                                            id="loader-show">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive py-4">
                                                <table class="table table-flush" id="datatable-basic">
                                                    <thead>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>FileName</th>
                                                            <th>Audio</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if($sounds)
                                                        @foreach($sounds as $key=>$sound)
                                                        <tr>
                                                            <td>{{$sound->file}}</td>
                                                            <td>
                                                                <audio controls>
                                                                    <source
                                                                        src="{{asset('public/upload/files/audio/'.$sound->file)}}">
                                                                </audio>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#editOutboundLiveAdvanceVoiceMail"
                                                                    onclick="getVoiceMsg('#editOutboundLiveAdvanceVoiceMailMsg','{{asset('public/upload/files/audio/'.$sound->file)}}','{{$sound->file}}',{{$sound->id}},'outbound_live_advance_voice_mail_audio_sound','editOutboundLiveAdvanceVoiceMail')">Select</a>
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
                        </div>
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>