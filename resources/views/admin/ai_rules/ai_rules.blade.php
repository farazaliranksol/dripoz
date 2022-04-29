@extends('layouts.main')
@section('title','AI Rules')
@section('content')
   <div class="header bg-primary pb-6" id="main-header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center pt-4">
                <div class="col">
                    <h1 class="h1-f text-white d-inline-block mb-0 d-block">A.I. Rules</h1>
                    <p class="text-white my-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet aut tempore a, natus fuga saepe ex.
                    </p>
                </div>
            </div>
            <div class="row align-items-center pb-4">
                <div class="col text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-white">
                                A.I Rules:
                            </h5>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-5 text-left">
                            <select class="select form-control" id="ai_rule_select" style="height: 28px!important; padding: 0px !important; padding-left: 5px !important;">
                                @foreach($ais as $ai)
                                <option value="{{$ai->id}}">{{$ai->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 text-left mt-2 mt-md-0">
                            <!--Add AI Button-->
                            <button type="button" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="modal" data-target="#modal-add">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            </button>
                            <!-- ADD AI MODAL-->
                            <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{route('ai.store')}}">
                                            @csrf
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Create New A.I. Rules</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header">
                                                <h4 class="mb-0">Friendly Name</h4>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="form-control-label" for="addAI">A.I. Rules are a collection of triggers. Enter a friendly name for your A.I. Rules.</label>
                                                        <input type="text" class="form-control @error('ai_rule_name') is-invalid @enderror" id="addAI" pattern="[a-zA-Z]{1,}" required name="ai_rule_name" placeholder="AI Rules 1">
                                                    </div>
                                                @error('ai_rule_name')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!--EDIT AI Button-->
                            <button type="button" class="btn btn-sm btn-info btn-round btn-icon ai_edit_icon" id="edit_ai_rule_btn" data-toggle="modal" data-target="#edit_modal">
                                <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                            </button>
                            <!--EDIT AI MODAL-->
                            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{url('update_ai_rule')}}">
                                            @csrf
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-default">Edit Trigger List Name</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="card">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <h4 class="mb-0">List</h4>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="editAI">Name of list</label>
                                                        <input type="hidden" name="edit_ai_id" id="edit_ai_id" value="">
                                                        <input type="text" class="form-control @error('ai_rule_edit_name') is-invalid @enderror" id="editAI" pattern="[a-zA-Z]{1,}" required name="ai_rule_edit_name">
                                                    </div>
                                                    @error('ai_rule_edit_name')
                                                    <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-round btn-icon ai_del_icon" id="del_btn_ai_rule" data-toggle="tooltip">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                            </a>

                            <a href="#" class="btn btn-sm btn-warning btn-round btn-icon ai_archive_icon" data-toggle="tooltip" onclick="exportFunction()">
                                <span class="btn-inner--icon"><i class="fas fa-file-archive"></i></span>
                            </a>
                            <!--del form ai rule-->
                            <form action="{{url('del_ai_rule')}}" method="post" id="del_airule_form">
                                @csrf
                                <input type="hidden" name="del_ai_rule" id="del_ai_rule" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card stats -->
            </div>
            </div>
            </div>
            <div class="container-fluid mt--6">
                <!-- Table -->
                <div class="row">
                <div class="col-md-8" id="table_blur">
                    <div class="card">
                      <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush table-hover" id="datatable-basic">
                            <thead>
                              <tr>
                                <th>Type </th>
                                <th>Action</th>
                                <th>Match Type</th>
                                <th>Trigger</th>
                                <th>Message</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Type </th>
                                <th>Action</th>
                                <th>Match Type</th>
                                <th>Trigger</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($aiTriggers)
                                @foreach($aiTriggers as $aiTrigger)
                              <tr>
                                <td>{{$aiTrigger->type}}</td>
                                <td>{{$aiTrigger->action}}</td>
                                <td>{{$aiTrigger->match_type}}</td>
                                <td>{{$aiTrigger->trigger}}</td>
                                <td>{{$aiTrigger->message}}</td>
                                <td>
                                  <button class="btn btn-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-purple-f" aria-hidden="true"></i>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="editTrigger({{$aiTrigger->id}})">Edit</a>
                                    <a class="dropdown-item" href="{{url('del_aiTrigger',$aiTrigger->id)}}" onclick="return confirm('Are you sure');">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                              @endif
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-wrapper">
                      <div class="card" id="card_border">
                        <div class="card-body">
                            <h2 class="mb-1 text-h2-f">Add Trigger</h2>
                          <form method="post" action="{{route('aiTrigger.store')}}" id="trigger_form">
                              @csrf
                              <input type="hidden" value="" id="triggerId" name="triggerId">
                            <div class="form-group mt-1">
                              <label class="form-control-label label" for="type">Select Trigger Type</label>
                              <select class="form-control select" id="type" name="type" onchange="voice(value)" required>
                                <option value="SMS">SMS</option>
                                <option value="Voice">Voice</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label label" for="matchingType">Matching Type</label>
                                <select class="form-control select" name="match_type" id="match_type" onchange="matchingType(value)" required>
                                  <option value="ai_engine">AI Engine</option>
                                  <option value="contains">Contains</option>
                                  <option value="exact">Exact</option>
                                </select>
                                <select class="form-control select mt-3" name="trigger" id="ai_engine_options">
                                    <option value="">-- Select --</option>

                                    <option value="schedule">Call me. (Schedule)</option>

                                    <option value="call_now">Call me now.</option>

                                    <option value="dnc">Do not contact me. (DNC)</option>

                                    <option value="not_interested">Not interested.</option>

                                    <option value="not_qualified">Not qualified.</option>

                                    <option value="driving">I'm driving.</option>

                                    <option value="work">I'm at work.</option>

                                    <option value="meeting">I'm in a meeting.</option>

                                    <option value="busy">I'm busy now.</option>

                                    <option value="who">Who is this?</option>

                                    <option value="tell_more">Tell me more.</option>

                                    <option value="have_it">I have it already.</option>

                                    <option value="open_hours">When are you open?</option>

                                    <option value="text_me">Can't talk text me.</option>

                                    <option value="too_much">Costs too much.</option>

                                    <option value="call_number">Call me at this number.</option>

                                    <option value="email_me">Email me more info.</option>

                                    <option value="number">What is the number to call?</option>

                                    <option value="my_info">How did you get my info?</option>

                                    <option value="how_much">How much?</option>

                                    <option value="scam">Is this a scam?</option>

                                    <option value="human">Are you a human?</option>

                                    <option value="english">Doesn't speak English.</option>

                                    <option value="located">Where are you located?</option>
                                  </select>
                                <br />
                                <textarea class="form-control select mt-3" name="message" disabled id="voice_reply" placeholder="Enter SMS to send" rows="2" hidden></textarea>
                                <input type="text" class="form-control" disabled name="trigger" placeholder="Enter Trigger Text" id="trigger_text" hidden>
                              </div>
                              <div class="form-group" id="selecttriggerAction">
                                <label class="form-control-label label" for="exampleFormControlSelect1">Select Trigger Action</label>
                                <select class="form-control select" name="action" onchange="reply_select(value)" id="select_reply" required>
                                  <option value="Reply">Reply</option>
                                  <option value="Close">Close</option>
                                  <option value="DNC">DNC</option>
                                </select>
                                <textarea class="form-control select mt-3" name="message" id="smsToSend" placeholder="Enter SMS to send" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-1">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" id="fire_webhook" name="fire_webhook" value="1" type="checkbox" onclick="fireWebHook()">
                                    <label class="custom-control-label check-f" for="fire_webhook">Fire webhook</label>
                                  </div>
                                <div class="form-group" style="display: none" id="select_webhook">
                                    <label class="form-control-label label" for="exampleFormControlSelect1">Select Webhook</label>
                                    <select class="form-control select" name="webhook">
                                        <option value=""></option>
                                    </select>
                                </div>
                                  <div class="custom-control custom-checkbox mb-2" id="fireZapier">
                                    <input class="custom-control-input" id="customCheck2" type="checkbox" name="fire_zapier" value="1">
                                    <label class="custom-control-label check-f" for="customCheck2">Fire zapier</label>
                                  </div>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" id="fire_email" type="checkbox" name="fire_email" value="1" onclick="fireEmail()">
                                    <label class="custom-control-label check-f" for="fire_email">Fire Email</label>
                                  </div>
                                <div class="form-group" style="display: none" id="fire_email_div">
                                    <label class="form-control-label label" for="exampleFormControlSelect1">Select Recipient</label>
                                    <select class="form-control select" name="recipient">
                                        <option value=""></option>
                                    </select>
                                    <input type="text" class="form-control mt-3" placeholder="Enter alert e-mail subject" name="subject">
                                    <textarea class="form-control mt-3" placeholder="Enter alert e-mail body" name="email_message" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="form-group text-md-right text-center mt-0 mb-1">
                                <button class="btn btn-primary pt-2" type="submit" id="add_trigger_btn">Add Trigger</button>
                                <button type="submit" class="btn btn-success" id="save_trigger_btn" hidden>Save Trigger</button>
                                <button type="button" class="btn btn-danger" onclick="reset_trigger()" id="reset_btn" hidden>Cancel</button>
                            </div>
                          </form>
                            <div id="testAI">
                            <div class="form-group">
                                <label class="form-control-label label" for="testAIRule"> Test AI Rules</label>
                                <textarea class="form-control select mt-3" id="testAIRule" rows="2"></textarea>
                            </div>
                            <div class="form-group text-md-right text-center">
                                <button class="btn btn-primary pt-2" type="button" onclick="testMessage()">Test Message</button>
                            </div>
                            </div>
                            <div id="youSaidDiv" style="display: none">
                                <div class="form-group">
                                    <label class="form-control-label label" for="youSaid"> You Said:</label>
                                    <textarea class="form-control select mt-3" id="youSaid" rows="1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label label" for="result"> Results:</label>
                                    <textarea class="form-control select mt-3" id="result" rows="1"></textarea>
                                </div>

                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
    <!-- Import / Export form-->
   <!--Import Modal Button-->
   <button type="button" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="modal" data-target="#modal-import" hidden id="import-modal">
   </button>
   <!-- Import MODAL-->
   <div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
       <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
           <div class="modal-content">
               <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="modal-header">
                       <h6 class="modal-title" id="modal-title-default">Import A.I. Rules</h6>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>
                   <div class="card">
                       <!-- Card header -->
                       <div class="card-header">
                           <h4 class="mb-0">Select File</h4>
                       </div>
                       <!-- Card body -->
                       <div class="card-body">
                           <div class="form-group">
                               <input type="file" name="file" class="form-control custom-file-input @error('file') is-invalid @enderror" id="import-file" required style="opacity: unset" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
                           </div>
                           @error('file')
                           <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-success">Import</button>
                       <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
    @endsection
@section('scripts')
    <script>

        document.getElementById('edit_ai_rule_btn').onclick=function (){
           let ai_id = document.getElementById('ai_rule_select').value;
           let ai_id_text = document.getElementById('ai_rule_select');
           let ai_text = ai_id_text.options[ai_id_text.selectedIndex].text;
           document.getElementById('edit_ai_id').value = ai_id;
           document.getElementById('editAI').value = ai_text;
        }
        document.getElementById('del_btn_ai_rule').onclick= function (){
            alert('Are you sure?')
            let ai_id = document.getElementById('ai_rule_select').value;
                document.getElementById('del_ai_rule').value = ai_id;
                document.getElementById('del_airule_form').submit();
        }
        /*matching type contais*/
        function matchingType(val){
           if(val != 'ai_engine'){
               document.getElementById('ai_engine_options').hidden = true;
               document.getElementById('trigger_text').hidden = false;
               document.getElementById('trigger_text').disabled = false;
           }else{
               document.getElementById('ai_engine_options').hidden = false;
               document.getElementById('trigger_text').hidden = true;
               document.getElementById('trigger_text').disabled = true;
           }
        }
        /*reply select*/
        function reply_select(val){
            if(val != 'Reply'){
                document.getElementById('smsToSend').hidden = true;
            }else{
                document.getElementById('smsToSend').hidden = false;
            }
        }
        /*fire webhook*/
        function fireWebHook(){
            if(document.querySelector('#fire_webhook:checked') !== null){
               document.getElementById('select_webhook').style.display='block';
            }else{
                document.getElementById('select_webhook').style.display='none';
            }
        }
        /*fire email*/
        function fireEmail(){
            if(document.querySelector('#fire_email:checked') !== null){
                document.getElementById('fire_email_div').style.display='block';
            }else{
                document.getElementById('fire_email_div').style.display='none';
            }
        }
        /*voice function*/
        function voice(val){
            if(val == 'Voice'){
            document.getElementById('selecttriggerAction').style.display='none';
            document.getElementById('fireZapier').style.display='none';
            }else{
                document.getElementById('selecttriggerAction').style.display='block';
                document.getElementById('fireZapier').style.display='block';
            }
        }
        /*AI engine options change */
            $("#ai_engine_options").change(function () {
                var val = $(this).val();
                if (val == "dnc") {
                    $("#select_reply").html(" <option value='DNC'>DNC</option>");
                    document.getElementById('smsToSend').hidden = true;
                } else if (val == "not_interested" || val == "have_it") {
                    $("#select_reply").html("<option value='Close'>Close</option>");
                    document.getElementById('smsToSend').hidden = true;
                } else{
                    $("#select_reply").html("<option value='Reply'>Reply</option>");
                    if(document.getElementById('type').value == 'Voice'){
                        document.getElementById('voice_reply').hidden = false;
                        document.getElementById('voice_reply').disabled = false;
                    }
                    document.getElementById('smsToSend').hidden = false;
                }

            });
            /*edit trigger*/


        function editTrigger(id){
          let triggerId = id;
            $.ajax({
                url : "{{ url('editTrigger') }}",
                data : {'id': triggerId},
                type : 'GET',
                success : function(response){
                    let data = JSON.parse(response);
                    document.getElementById('main-header').style.cssText="filter: blur(2px); pointer-events: none";
                    document.getElementById('table_blur').style.cssText="filter: blur(2px); pointer-events: none";
                    document.getElementById('triggerId').value= data.id;
                    document.getElementById('type').value= data.type;
                    document.getElementById('match_type').value= data.match_type;
                    document.getElementById('ai_engine_options').value= data.trigger;
                    document.getElementById('select_reply').value= data.action;
                    document.getElementById('smsToSend').value= data.message;
                    document.getElementById('testAI').hidden= true;
                    document.getElementById('add_trigger_btn').hidden= true;
                    document.getElementById('save_trigger_btn').hidden= false;
                    document.getElementById('reset_btn').hidden= false;
                    document.getElementById('card_border').style.cssText="border-color: limegreen;  border: 1px solid limegreen;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05)";

                }
            });
        }
        function reset_trigger(){
            document.getElementById('main-header').style.cssText="";
            document.getElementById('table_blur').style.cssText="";
            document.getElementById('trigger_form').reset();
            document.getElementById('card_border').style.border='none';
            document.getElementById('save_trigger_btn').hidden=true;
            document.getElementById('reset_btn').hidden=true;
            document.getElementById('add_trigger_btn').hidden=false;
            document.getElementById('testAI').hidden= false;

        }
        /*export function*/
        function exportFunction(){
            swal({
                title: 'Import / Export ?',
                text: "Would you like to import or export your A.I Rules?",
                type: 'question',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-info',
                confirmButtonText: 'Import',
                cancelButtonClass: 'btn btn-primary',
                cancelButtonText: '<a href="{{ route('file-export') }}" style="text-decoration: none; color: white";>Export</a>',
                // cancelButtonClass: 'btn btn-secondary'
            }).then((result) => {
                if (result.value) {
                 document.getElementById('import-modal').click();
                }
            })
        }
        function testMessage(){
            document.getElementById('youSaidDiv').style.display = "block";
           let testMessage =  document.getElementById('testAIRule').value;
            document.getElementById('youSaid').innerHTML = testMessage;
            $.ajax({
                url : "{{ url('checkTrigger') }}",
                data : {'trigger': testMessage},
                type : 'GET',
                success : function(response){
                    let data = JSON.parse(response);
                    console.log(data.message)
                    if(data.message){
                        document.getElementById('result').innerHTML = "Action:" + data.message;
                    }else{
                        document.getElementById('result').innerText = "Not Available";
                    }
                }
            });

        }
    </script>
    @endsection
