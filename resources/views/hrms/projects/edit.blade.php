@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <style>

        .project-status {
            margin-bottom: 10px;
        }

        .project-status .status-lable.Running {
            background: #ffa500a3;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .project-status .status-lable.Finished {
            background: #008000a3;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        .project-status .status-lable.Delayed {
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
                    <li class="breadcrumb-current-item"> Edit Project</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-spy="affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Edit Project </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @if(Session::has('flash_message'))
                                                <div class="alert alert-success">
                                                    {{Session::get('flash_message')}}
                                                </div>
                                            @endif
                                            {!! Form::open(['class' => 'form-horizontal']) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Project </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="input002"
                                                           class="select2-single form-control" placeholder="Name" value="{{isset($project->name)? $project->name:'' }}"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" name="description">{{isset($project->description) ? $project->description:''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Project Code </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="code" id="input002"
                                                           class="select2-single form-control" placeholder="Project Code" value="{{isset($project->code)? $project->code:''}}"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Client </label>
                                                <div class="col-md-6">
                                                 {!! Form::select('client_id', $model->clients, $project->client_id, ['class' => 'form-control']) !!}
                                                    {{--<select class="selectpicker form-control" data-done-button="true"
                                                            name="client_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($model->clients as $client)
                                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                                        @endforeach
                                                    </select>--}}
                                                </div>
                                            </div>

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

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Status </label>
                                                <div class="col-md-6">
                                                    <div class="project-status">
                                                        Current status : <span class="status-lable {{ $lable }}">{{ $lable }}</span>
                                                    </div>
                                                    <select class="selectpicker form-control" data-done-button="true" name="status" required>
                                                        <option value="0">Running</option>
                                                        <option value="1">Finish</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block"
                                                           value="Save">
                                                </div>
                                                <div class="col-md-2"><a href="/add-project">
                                                        <input type="button"
                                                               class="btn btn-bordered btn-success btn-block"
                                                               value="Reset"></a>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection