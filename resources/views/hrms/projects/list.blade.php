@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <style>
        
        .status-lable.Running {
            background: #ffa500a3;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .status-lable.Finished {
            background: #008000a3;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .status-lable.Delayed {
            background: #ff0000a3;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }
    </style>
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                     
                    <li class="breadcrumb-link">
                        <a href=""> Projects </a>
                    </li>
                    <li class="breadcrumb-current-item"> Projects Listing</li>
                </ol>
            </div>
        </header>


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Projects List </span>
                                </div>
                                <div class="panel-body pn">
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Project Name</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Project Code</th>
                                                <th class="text-center">Client Name</th>
                                                <th class="text-center">Status</th>
                                                @if(Auth::user()->isHR())
                                                <th class="text-center">Actions</th>
                                                @endif
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $i = 1;
                                            ?>
                                            @foreach($projects as $project)

                                                <?php
                                                $date = new \Carbon\Carbon($project->date_of_release);
                                                $dateStatus = $date->isPast();

                                                if($project->status == 0 && $dateStatus == false) {
                                                    $lable = 'Running';
                                                } 
                                                if ($project->status == 1 && $dateStatus == true) {
                                                    $lable = 'Finished';
                                                } 
                                                if ($project->status != 1 && $dateStatus == true) {
                                                    $lable = 'Delayed';
                                                }
                                                ?>                                                
                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td class="text-center">{{$project->name}}</td>
                                                    <td class="text-center">{{$project->description}}</td>
                                                    <td class="text-center">{{$project->code}}</td>
                                                    <td class="text-center">{{$project->client_name}}</td>
                                                    <td class="text-center">
                                                        <span class="status-lable {{ $lable }}">
                                                            {{ $lable }}
                                                        </span>
                                                    </td>
                                                    @if(Auth::user()->isHR())
                                                    <td class="text-center">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> Action
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="/edit-project/{{$project->id}}">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/delete-project/{{$project->id}}">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
                                            <tr>
                                                {!! $projects->render() !!}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection