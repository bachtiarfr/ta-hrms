@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                    <ol class="breadcrumb">
                          
                        <li class="breadcrumb-link">
                            <a href=""> Projects </a>
                        </li>
                        <li class="breadcrumb-current-item"> Edit {{$projects->name}} </li>
                    </ol>


                @else
                    <ol class="breadcrumb">
                          
                        <li class="breadcrumb-link">
                            <a href=""> Projects </a>
                        </li>
                        <li class="breadcrumb-current-item"> Assign Projects </li>
                    </ol>
                @endif
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn" >
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-spy="affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                                        <span class="panel-title hidden-xs"> Edit Project Assignment </span>
                                    @else
                                        <span class="panel-title hidden-xs"> Assign Project</span>
                                    @endif
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
                                                <label class="col-md-3 control-label"> Select Project </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary" name="project_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="multiselect2" class="col-md-3 control-label"> Select Team Members </label>
                                                <div class="col-md-6">
                                                    <select id="done" class="selectpicker form-control" multiple data-done-button="true" name="member_id[]" required>
                                                        @foreach($emps as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Project Leader </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary" name="project_leader_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($emps as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                                                            <input type="text" id="datepicker1" class="select2-single form-control" name="doa" value="@if($emps && $emps->date_of_assignment){{$emps->date_of_assignment}}@endif" required>
                                                        @else
                                                            <input type="text" id="datepicker1" class="select2-single form-control" name="doa" required>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="datepicker4" class="col-md-3 control-label"> Date of Release </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                                                            <input type="text" id="datepicker4" class="select2-single form-control" name="dor" value="@if($emps && $emps->date_of_assignment){{$emps->date_of_assignment}}@endif" required>
                                                        @else
                                                            <input type="text" id="datepicker4" class="select2-single form-control" name="dor" required>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                                </div>
                                                <div class="col-md-2"><a href="/assign-project" >
                                                    <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a>
                                                </div>
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

        </section>
    </div>
    
    <script src="assets/js/pages/forms-widgets.js" type="text/javascript"></script>
@endsection
@push('scripts')
    <script src="/assets/js/pages/forms-widgets.js"></script>
    <script src="/assets/js/custom.js"></script>
@endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/bootstrap-select.css">
@endpush
@push('scripts')
<script src="/assets/allcp/forms/js/bootstrap-select.js"></script>
@endpush