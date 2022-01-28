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

.tooltip-info {
    border: none;
    position: absolute;
    right: 10px;
    text-transform: none;
    border-radius: 50%;
    font-size: 10px;
    width: 15px;
    padding: 0;
    background: #80808096;
    color: #fff;
}

body ul {
    padding: 0;
    border-bottom: 1px solid #fff;
    text-align: left;
}

</style>

        <!-- -------------- Topbar -------------- -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
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
                                    @if(Auth::user()->isHR())
                                    <div class="shortcut-list">
                                        <a href="/attendance-upload" class="attendance">Upload attendance</a>
                                        <a href="/add-project" class="projects">Add new projects</a>
                                        <a href="/export-pdf" class="apply-leaves">Export all reports</a>
                                    </div>
                                    @else
                                    <div class="shortcut-list">
                                        <a href="/project-assign-listing" class="attendance">Project assign listing</a>
                                        <a href="/apply-leave" class="projects">Request for leave</a>
                                    </div>
                                    @endif
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
                        <button type="button" id="tooltip-role" class="tooltip-info" data-toggle="tooltip" data-html="true" title="<?= $roleTooltipHTML; ?>" data-placement="bottom">
                            i
                        </button>
                        <canvas id="roleChart" style="width: 288px !important; height: 291px !important"></canvas>
                    </div>
                </div>
            </div>

            {{-- gender chart --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <button type="button" id="tooltip-gender" class="tooltip-info" data-toggle="tooltip" data-html="true" title="<?= $genderTooltipHTML; ?>" data-placement="bottom">
                            i
                        </button>
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
                        @if(count($dataFinishedProject) > 0 || count($dataRuningProject) > 0)
                        <canvas id="projectChart"></canvas>
                        @else
                        <canvas>
                            No data yet
                        </canvas>
                        @endif
                        <div class="panel-content">
                            <div class="inner-content">
                                @if(count($dataFinishedProject) > 0)
                                Finished Project <span class="total">{{ count($dataFinishedProject) }}</span>
                                @else
                                Finished Project <span class="total">0</span>
                                @endif
                            </div>
                            <div class="inner-content">
                                @if(count($dataRuningProject) > 0)
                                Running Project <span class="total">{{ count($dataRuningProject) }}</span>
                                @else
                                Running Project <span class="total">0</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- project detail --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body projects-card">
                        <div class="title">Projects detail</div>
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
                                    @if(count($dataFinishedProject) > 0)
                                        <ol type="1">
                                            @foreach ($dataFinishedProject as $data)
                                            <li>{{$data}}</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        <ol style="list-style: none">
                                            <li>No data yet</li>
                                        </ol>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="running-projects" role="tabpanel" aria-labelledby="running-projects-tab">
                                <div class="project-name">
                                    @if(count($dataRuningProject) > 0)
                                        <ol type="1">
                                            @foreach ($dataRuningProject as $data)
                                            <li>{{$data}}</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        <ol style="list-style: none">
                                            <li>No data yet</li>
                                        </ol>
                                    @endif
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>   

            {{-- who's off --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body projects-card">
                        <div class="title">Who's off today</div>
                        
                        @if(count($dataUserWhoOff) > 0)
                        <ol type="1" style="margin-top: 15px">
                            @foreach ($dataUserWhoOff as $data)
                            <li>{{$data}}</li>
                            @endforeach
                        </ol>
                        @else
                        <ol style="list-style: none; padding: 0; display: flex; align-items: center; justify-content: center; height: 200px">
                            <li>No employee off today</li>
                        </ol>
                        @endif
                    </div>
                </div>
            </div>   

            {{-- project detail --}}
            <div class="col-sm-6 col-xl-6 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body" style="display: flex; align-items: center; justify-content: center">
                        <div class="title">No content yet</div>
                    </div>
                </div>
            </div>   

            {{-- balance leaves --}}
            <div class="col-sm-3 col-xl-3 panel-card">
                <div class="panel panel-tile">
                    <div class="panel-body projects-card">
                        <div class="title">Balance annual leave</div>
                        <div class="leaves-content">
                            <div class="inner-content">
                                <div class="subtitle">Sick leave</div>
                                <div class="amount"><?= $remainingSickLeave ?> Day</div>
                            </div>
                            <div class="inner-content">
                                <div class="subtitle">Casual leave</div>
                                <div class="amount"><?= $remainingCasualLeave ?> Day</div>
                            </div>
                            @if(Auth::user()->isFemale())
                            <div class="inner-content">
                                <div class="subtitle">Maternity leave</div>
                                <div class="amount"><?= $remainingMaternityLeave ?> Day</div>
                            </div>
                            @endif
                            <a href="/apply-leave" class="btn-request-leave">Request for leave</a>
                        </div>
                    </div>
                </div>
            </div>   


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

                    var ctx = $("#roleChart");
                    var ctx = document.getElementById('roleChart'); // node
                    var ctx = document.getElementById('roleChart').getContext('2d'); // 2d context
                    var ctx = $('#roleChart'); // jQuery instance
                    var ctx = 'roleChart'; // element id
                    
                    const dataRoles = {
                        labels: cData.names,
                        datasets: [{
                            data: cData.counts,
                            backgroundColor: [
                            'red',
                            'green',
                            'blue',
                            'gray',
                            'orange',
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
                                text: 'Job roles',
                                fontSize: 16
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
                            '#0cafee',
                            '#ed008c'
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
                                text: 'Gender diversity',
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
                            '#27AE60',
                            '#d3dc8d'
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
                                text: 'Project report',
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