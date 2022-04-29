<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                {{--<img src="{{url('/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">--}}
                <h2 style="alignment: center;">
                    Dripoz
                </h2>
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">


            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->
                <ul class="navbar-nav">
                    @if(auth()->user()->role == 'SuperAdmin')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}"
                            href="{{url('dashboard')}}">
                            <i class="ni ni-shop"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'client-management') ? 'active' : '' }}"
                            href="{{route('client-management.index')}}">
                            <i class="ni ni-shop"></i>
                            <span class="nav-link-text">Client Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'users') ? 'active' : '' }}"
                            href="{{route('client-user-permission.index')}}">
                            <i class="ni ni-shop"></i>
                            <span class="nav-link-text">List of Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'users') ? 'active' : '' }}"
                            href="{{url('subscriptions')}}">
                            <i class="ni ni-shop"></i>
                            <span class="nav-link-text">Subscription</span>
                        </a>
                    </li>
                    @else

                    <!-----Admin / users options------>
                    @if(userPermission(auth()->user()->id)->inbox == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'inbox') ? 'active' : '' }}"
                            href="{{route('inbox.index')}}">
                            <i class="ni ni-email-83"></i>
                            <span class="nav-link-text">Inbox</span>
                        </a>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->console == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'console') ? 'active' : '' }}"
                            href="{{route('console.index')}}">
                            <i class="ni ni-books text-info"></i>
                            <span class="nav-link-text">Console</span>
                        </a>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->phone_number == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'phoneNumber') ? 'active' : '' }}"
                            href="{{route('phoneNumber.index')}}">
                            <i class="ni ni-circle-08 text-info"></i>
                            <span class="nav-link-text">Phone Number</span>
                        </a>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->view_leads == 1 || userPermission(auth()->user()->id)->export_leads == 1)
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-forms" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Leads</span>
                        </a>
                        @if(userPermission(auth()->user()->id)->export_leads == 1)
                        <div class="collapse" id="navbar-forms"
                            style="{{(request()->segment(1) == 'leadsSummary' || request()->segment(1) == 'uploadLeads' || request()->segment(1) == 'DNC' || request()->segment(1) == 'leadsExplorer') ? 'display:block' : '' }}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('uploadLeads.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'uploadLeads') ? 'active' : '' }}">Upload
                                        Leads</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('dnc.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'dnc') ? 'active' : '' }}">DNC</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('leadsExplorer.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'leadsExplorer') ? 'active' : '' }}">Leads
                                        Explorer</a>
                                </li>
                            </ul>
                        </div>
                        @else
                        <div class="collapse" id="navbar-forms"
                            style="{{(request()->segment(1) == 'leadsSummary' || request()->segment(1) == 'uploadLeads' || request()->segment(1) == 'DNC' || request()->segment(1) == 'leadsExplorer') ? 'display:block' : '' }}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('leadsSummary.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'leadsSummary') ? 'active' : '' }}">Summary</a>
                                </li>
                               
                            </ul>
                        </div>
                        @endif
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->sound_library == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'sound') ? 'active' : '' }}"
                            href="{{route('sound.index')}}">
                            <i class="ni ni-sound-wave"></i>
                            {{-- <img src="{{asset('public/assets/img/icons/sidebar/sound.png')}}" class="img-icon-f"
                                alt=""> &nbsp;--}}
                            <span class="nav-link-text"> &nbsp;Sound Library</span>
                        </a>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->ai_rules == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == 'ai') ? 'active' : '' }}"
                            href="{{route('ai.index')}}">
                            <i class="ni ni-app"></i>
                            {{-- <img src="{{asset('public/assets/img/icons/sidebar/ai_rules.png')}}" class="img-icon-f"
                                alt=""> &nbsp;--}}
                            <span class="nav-link-text">&nbsp;AI Rules</span>
                        </a>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->view_reports == 1)
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-forms-f" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            {{-- <img src="{{asset('pubic/assets/img/icons/common/report.png')}}" class="img-icon-f1"
                                alt=""> &nbsp;--}}
                            <i class="ni ni-folder-17"></i>
                            <span class="nav-link-text">&nbsp;Reports</span></a>
                        <div class="collapse" id="navbar-forms-f"
                            style="{{(request()->segment(1) == 'leadsSummary' || request()->segment(1) == 'uploadLeads' || request()->segment(1) == 'DNC') ? 'display:block' : ''}}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('callsReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'callsReport') ? 'active' : '' }}">Calls
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('dailyReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'dailyReport') ? 'active' : '' }}">Daily
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('smsReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'smsReport') ? 'active' : '' }}">SMS
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('sentimentReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'sentimentReport') ? 'active' : '' }}">Sentiment
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('advancedIVRReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'advancedIVRReport') ? 'active' : '' }}">Advanced
                                        IVR Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('leadsReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'leadsReport') ? 'active' : '' }}">Leads
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('roiReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'roiReport') ? 'active' : '' }}">Roi
                                        Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('speedReport.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'speedReport') ? 'active' : '' }}">Speed
                                        Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->logs == 1)
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-forms-f1" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            {{-- <img src="{{asset('public/assets/img/icons/common/logs.png')}}" class="img-icon-f1"
                                alt=""> &nbsp;--}}
                            <i class="ni ni-ruler-pencil"></i>
                            <span class="nav-link-text">&nbsp;Logs</span></a>
                        <div class="collapse" id="navbar-forms-f1"
                            style="{{(request()->segment(1) == 'logs' || request()->segment(1) == 'logs' || request()->segment(1) == 'logs') ? 'display:block' : ''}}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('liveCall.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'liveCall') ? 'active' : '' }}">
                                        Live Calls
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cdr.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'cdr') ? 'active' : '' }}">
                                        CDRs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('scheduleLog.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'scheduleLog') ? 'active' : '' }}">
                                        Schedules
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('webhook.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'webhook') ? 'active' : '' }}">
                                        Webhooks
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->tools == 1)
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-forms-f2" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <img src="{{asset('public/assets/img/icons/common/tools.png')}}" class="img-icon-f1" alt="">
                            &nbsp;
                            <span class="nav-link-text">&nbsp;Tools</span></a>
                        <div class="collapse" id="navbar-forms-f2"
                            style="{{(request()->segment(1) == 'abtest' || request()->segment(1) == 'abtest' || request()->segment(1) == 'abtest') ? 'display:block' : ''}}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('abTest.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'abTest') ? 'active' : '' }}">A/B
                                        Test</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('uploadConversation.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'uploadConversation') ? 'active' : '' }}">Upload
                                        Conversation</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(userPermission(auth()->user()->id)->billing == 1)
                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-forms-f3" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <img src="{{asset('public/assets/img/icons/common/billings.png')}}" class="img-icon-f1"
                                alt=""> &nbsp;
                            <span class="nav-link-text">&nbsp;Billings</span></a>
                        <div class="collapse" id="navbar-forms-f3"
                            style="{{(request()->segment(1) == 'billing' || request()->segment(1) == 'billing' || request()->segment(1) == 'billing') ? 'display:block' : ''}}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('overview.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'overview') ? 'active' : '' }}">
                                        Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('invoice.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'invoice') ? 'active' : '' }}">Invoices</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('dailyUsage.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'dailyUsage') ? 'active' : '' }}">Daily
                                        Usage</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('rate.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'rate') ? 'active' : '' }}">Rates</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('recurringItem.index')}}"
                                        class="nav-link {{ (request()->segment(1) == 'recurringItem') ? 'active' : '' }}">Recurring
                                        Item</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                  
                    <li class="nav-item">
                        <a href="{{route('trustHub.index')}}"
                            class="nav-link {{ (request()->segment(1) == 'trustHub') ? 'active' : '' }}">
                            <img src="{{asset('public/assets/img/icons/common/trust_hub.png')}}" class="img-icon-f1"
                                alt=""> &nbsp;
                            <span class="nav-link-text">&nbsp;Trust Hub</span>
                        </a>
                    </li>
                  
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>