@extends('hrms.layouts.base')

@section('content')

<style>

.username-wrap {
    font-size: 20px;
    font-weight: 600;
    color: #000;
}

.shortcut h3 {
    font-size: 12px;
    color: #000;
    font-weight: bold;
}

.shortcut-list a {
    padding: 8px 24px;
    border: 1px solid #e2e2e2;
    border-radius: 20px;
    font-weight: 500;
    text-decoration: none;
    font-size: 15px;
    line-height: 20px;
    color: #000;
}

.panel-shortcut {
    background-repeat: no-repeat;
    background-position: right 50px bottom;
    background-size: contain;
}

</style>

        <!-- -------------- Topbar -------------- -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon">
                <a href="/dashboard">
                    <span class="fa fa-home"></span>
                </a>
            </li>
            <li class="breadcrumb-active">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-link">
                <a href="/dashboard">Home</a>
            </li>
            <li class="breadcrumb-current-item">Dashboards</li>
        </ol>
    </div>

</header>
<!-- -------------- /Topbar -------------- -->

<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- -------------- Column Center -------------- -->
    <div class="chute chute-center">

        <!-- -------------- Quick Links -------------- -->
        <div class="row">
            @if(Auth::user()->isHR())
            <div class="col-sm-12 col-xl-12">
                <div class="panel panel-tile">
                    <div class="panel-body panel-shortcut" style="background-image: url('/assets/img/avatars/people-worked.jpg');">
                        <div class="row pv10" style="margin: 0">
                            <div class="col-xs-5 ph10">
                                <div class="username-wrap">
                                    Good morning, Bachtiar Fatur Rohim!
                                </div>
                                <div class="date">It’s Wednesday, 29 December 2021</div>
                                <div class="shortcut">
                                    <h3>Shortcut</h3>
                                    <div class="shortcut-list">
                                        <a href="#" class="attendance">Upload attendance</a>
                                        <a href="#" class="apply-leaves">Apply leaves</a>
                                        <a href="#" class="projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-7 pl5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10">
                                <img src="/assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-7 pl5">
                                <h3 class="text-muted"><a href="{{route('employee-manager')}}"> EMPLOYEE MANAGER</a></h3>
                                {{--<h2 class="fs50 mt5 mbn">385</h2>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart0.png"
                                                            class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-7 pl5">
                                <h3 class="text-muted"> <a href="{{route('total-leave-list')}}"> LEAVE <br/> MANAGER </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-sm-3 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/Laptop Sketch-64x64"
                                                                class="img-responsive mauto" style="height: 100px; width: 100px;" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"> <a href="{{route('asset-listing')}}"> ASSET <br /> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/dollar.jpg"
                                                                class="img-responsive mauto" style="height: 100px; width: 100px;" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"> <a href="{{route('expense-list')}}"> EXPENSE <br /> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-3 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart5.png"
                                                            class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-7 pl5">
                                <h3 class="text-muted"><a href="{{route('attendance-manager')}}"> ATTENDANCE MANAGER </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @endif
                @if(!Auth::user()->isHR())
                <div class="col-sm-3 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart0.png"
                                                                class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="{{route('my-leave-list')}}"> LEAVES </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            <div class="col-sm-3 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart6.png"
                                                            class="img-responsive mauto" alt=""/></div>
                            <div class="col-xs-7 pl5">
                                <h3 class="text-muted"><a href="{{route('hr-policy')}}"> HR POLICIES </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                @if($events)
                <div class="col-md-12">
                    <h3 class="mb10 mr5 notification" data-note-style="primary" style="color: darkturquoise">Latest &nbsp; Events </h3>
                @foreach (array_chunk($events, 3, true) as $results)
                    <table class="table">
                        <tr>
                            @foreach($results as $event)
                            <td>
                                <div class='fc-event fc-event-primary' data-event="primary">
                                <div class="fc-event-icon" style="color: darkslateblue">
                                    <span class="fa fa-exclamation"></span>
                                </div>
                                <div class="fc-event-desc blink" id="blink">
                                    <a href="{{route('create-event')}}" ><b>{{ \Carbon\Carbon::createFromTimestamp(strtotime($event->date))->diffForHumans()}} </b> {{$event->name}}</a>
                                </div>
                                    </div>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                    @endforeach
               </div>
                @endif

                @if($meetings)
                <div class="col-md-12">
                    <h3 class=" mb10 mr5 notification" data-note-style="primary" style="color: darkturquoise"> Latest &nbsp;&nbsp; Meetings </h3>
                    @foreach (array_chunk($meetings, 3, true) as $results)
                        <table class="table">
                            <tr>
                                @foreach($results as $meeting)
                                    <td>
                                        <div class='fc-event fc-event-primary' data-event="primary">
                                            <div class="fc-event-icon" style="color: darkslateblue">
                                                <span class="fa fa-exclamation"></span>
                                            </div>
                                            <div class="fc-event-desc blink" id="blink">
                                                <b>{{ \Carbon\Carbon::createFromTimestamp(strtotime($meeting->date))->diffForHumans()}} </b> {{$meeting->name}}
                                            </div>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    @endforeach
                </div>
                    @endif


             </div>
           </div>
         </section>
    @endsection