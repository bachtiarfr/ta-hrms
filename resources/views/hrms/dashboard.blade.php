@extends('hrms.layouts.base')

@section('content')

<style>

.username-wrap {
    font-size: 20px;
    font-weight: 600;
    color: #000;
}

.shortcut h3 {
    margin-bottom: 15px;
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
        <div class="row" id="dashboard-page">
            @if(Auth::user()->isHR())
            <div class="col-sm-12 col-xl-12">
                <div class="panel panel-tile">
                    <div class="panel-body panel-shortcut" style="background-image: url('/assets/img/avatars/people-worked.jpg');">
                        <div class="row p15" style="margin: 0">
                            <div class="col-xs-7 ph10">
                                <div class="username-wrap">
                                    <?= $greetings . ', ' . $user['name']; ?>!
                                </div>
                                <div class="date">It’s <?= $dateNow; ?></div>
                                <div class="shortcut">
                                    <h3>Shortcut</h3>
                                    <div class="shortcut-list">
                                        <a href="/attendance-upload" class="attendance">Upload attendance</a>
                                        <a href="/add-project" class="projects">Add new projects</a>
                                        <a href="#" class="apply-leaves">Export all reports</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-7 pl5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- role chart --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <canvas id="roleChart" style="width: 288px !important; height: 291px !important"></canvas>
                    </div>
                </div>
            </div>

            {{-- gender chart --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <canvas id="genderChart"></canvas>
                        <div class="panel-content">
                            <div class="inner-content">
                                Male <span class="total"><?= count($maleEmployee); ?></span>
                            </div>
                            <div class="inner-content">
                                Female <span class="total"><?= count($femaleEmployee); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- gender chart --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <canvas id="projectChart"></canvas>
                        <div class="panel-content">
                            <div class="inner-content">
                                Finished Project <span class="total">{{ $finishedProject }}</span>
                            </div>
                            <div class="inner-content">
                                Running Project <span class="total">{{ $runningProject }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body projects-card">
                        <div class="title">Projects Detail</div>
                        <ul class="nav nav-tabs" id="projectsTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="finished-projects-tab" data-toggle="tab" href="#finished-projects" role="tab" aria-controls="finished-projects" aria-selected="true">Finished projects</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="running-projects-tab" data-toggle="tab" href="#running-projects" role="tab" aria-controls="running-projects" aria-selected="false">Running projects</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="projectsTabContent">
                            <div class="tab-pane fade active in" id="finished-projects" role="tabpanel" aria-labelledby="finished-projects-tab">
                                <div class="project-name">
                                    <ol type="1">
                                        @foreach ($dataFinishedProject as $data)
                                        <li>{{$data}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="running-projects" role="tabpanel" aria-labelledby="running-projects-tab">
                                <div class="project-name">
                                    <ol type="1">
                                        @foreach ($dataRuningProject as $data)
                                        <li>{{$data}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            


            @endif
                @if(!Auth::user()->isHR())
                <div class="col-sm-12 col-xl-12">
                    <div class="panel panel-tile">
                        <div class="panel-body panel-shortcut" style="background-image: url('/assets/img/avatars/people-worked.jpg');">
                            <div class="row p15" style="margin: 0">
                                <div class="col-xs-5 ph10">
                                    <div class="username-wrap">
                                        <?= $greetings . ', ' . $user['name']; ?>!
                                    </div>
                                    <div class="date">It’s <?= $dateNow; ?></div>
                                    <div class="shortcut">
                                        <h3>Shortcut</h3>
                                        <div class="shortcut-list">
                                            <a href="/apply-leave" class="apply-leaves">Apply leaves</a>
                                            <a href="/my-leave-list" class="attendance">My Leave List</a>
                                            <a href="/list-projects" class="projects">Projects</a>
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

            {{-- <div class="col-sm-3 col-xl-3">
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
            </div> --}}

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

         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
         <script>

            // load role chart
            $.ajax({ 
                type: 'GET', 
                url: '/get-json-data-role', 
                data: { get_param: 'value' }, 
                dataType: 'json',
                success: function (value) { 
                    var cData = value;

                    console.log('role : ', cData);

                    var ctx = $("#roleChart");
                    var ctx = document.getElementById('roleChart'); // node
                    var ctx = document.getElementById('roleChart').getContext('2d'); // 2d context
                    var ctx = $('#roleChart'); // jQuery instance
                    var ctx = 'roleChart'; // element id
                    
                    const dataRoles = {
                        labels: ['Admin', 'Human Resource', 'Project Manager', 'Front End', 'Back End'],
                        datasets: [{
                            data: cData,
                            backgroundColor: [
                            'red',
                            'green',
                            'blue',
                            'gray',
                            'yellow'
                            ],
                            hoverOffset: 4
                        }]
                    };
            
                    //create Pie Chart class object
                    var roleChart = new Chart(ctx, {
                        type: "polarArea",
                        data: dataRoles,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                fontFamily: 'Roboto',
                                text: 'Job Roles',
                                fontSize: 20
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    // options: options
                    });
                    
                }
            });
            
            // load gender chart
            $.ajax({ 
                type: 'GET', 
                url: '/get-json-data-gender', 
                data: { get_param: 'value' }, 
                dataType: 'json',
                success: function (value) { 
                    var cData = value;

                    var ctx = $("#genderChart");
                    var ctx = document.getElementById('genderChart'); // node
                    var ctx = document.getElementById('genderChart').getContext('2d'); // 2d context
                    var ctx = $('#genderChart'); // jQuery instance
                    var ctx = 'genderChart'; // element id
                    
                    const dataGender = {
                        labels: ['Male', 'Female'],
                        datasets: [{
                            data: cData,
                            backgroundColor: [
                            '#1357ff',
                            '#6610f2'
                            ],
                            hoverOffset: 4
                        }]
                    };
            
                    //create Pie Chart class object
                    var genderChart = new Chart(ctx, {
                        type: "doughnut",
                        data: dataGender,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                fontFamily: 'Roboto',
                                text: 'Gender Diversity',
                                fontSize: 20
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    // options: options
                    });
                    
                }
            });
            
            // load project chart
            $.ajax({ 
                type: 'GET', 
                url: '/get-json-data-projects', 
                data: { get_param: 'value' }, 
                dataType: 'json',
                success: function (value) { 
                    var cData = value;

                    var ctx = $("#projectChart");
                    var ctx = document.getElementById('projectChart'); // node
                    var ctx = document.getElementById('projectChart').getContext('2d'); // 2d context
                    var ctx = $('#projectChart'); // jQuery instance
                    var ctx = 'projectChart'; // element id
                    
                    const dataGender = {
                        labels: ['Finished Projects', 'Running Projects'],
                        datasets: [{
                            data: cData,
                            backgroundColor: [
                            'green',
                            'orange'
                            ],
                            hoverOffset: 4
                        }]
                    };
            
                    //create Pie Chart class object
                    var projectChart = new Chart(ctx, {
                        type: "pie",
                        data: dataGender,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                fontFamily: 'Roboto',
                                text: 'Project Report',
                                fontSize: 20
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    // options: options
                    });
                    
                }
            });
            


         </script>

    @endsection