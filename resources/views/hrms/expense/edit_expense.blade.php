@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">

                    <ol class="breadcrumb">
                          
                        <li class="breadcrumb-link">
                            <a href=""> Expenses </a>
                        </li>
                        <li class="breadcrumb-current-item"> Edit Expenses </li>
                    </ol>
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
                                    <span class="panel-title hidden-xs"> Edit Expenses </span>
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
                                            <label class="col-md-3 control-label"> Select Employee </label>
                                            <div class="col-md-6">
                                                <select class="select2-multiple form-control select-primary"
                                                        name="emp_id" required>
                                                    @foreach($emps as $emp)
                                                        @if($emp->id == $expenses->user_id)
                                                            <option value="{{$emp->id}}" selected>{{$emp->name}}</option>
                                                        @else
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Item </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="item" id="input002" class=" form-control" value="@if($expenses){{$expenses->item}}@endif" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Purchase From</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="purchase_from" id="input002" class=" form-control" value="@if($expenses){{$expenses->purchase_from}}@endif" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date of Purchase </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>

                                                        <input type="text" id="datepicker1" class="select2-single form-control" name="date_of_purchase" value="@if($expenses){{$expenses->date_of_purchase}}@endif"required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Amount </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="amount" id="input002" class=" form-control" value="@if($expenses){{$expenses->amount}}@endif" required>
                                                </div>
                                            </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">

                                            </div>
                                            <div class="col-md-2"><a href="/edit-expense/{id}" >
                                                    <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
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