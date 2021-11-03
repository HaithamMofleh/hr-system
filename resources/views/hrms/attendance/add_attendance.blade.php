@extends('hrms.layouts.base')

@section('content')
<!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="/dashboard">
                        <span class="fa fa-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="/dashboard"> Dashboard </a>
                </li>

                <li class="breadcrumb-current-item"> Attendance Manager</li>
            </ol>
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">


        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">
            <div class="">

                <div class="tab-content mw900 center-block center-children">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- -------------- Upload Form -------------- -->
                    <div class="allcp-form theme-primary tab-pane active mw320" id="login" role="tabpanel">
                        <div class="box box-success">
                            <div class="panel fluid-width">

                                @if(Session::has('flash_message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('flash_message') }}
                                </div>
                                @endif
                                @if(Session::has('flash_message1'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message1') }}
                                </div>
                                @endif

                                {!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}

                                <div class="panel-body pn mv12">

                                    <div class="section">
                                        <label for="username" class="field prepend-icon">
                                            <h6> Name </h6>
                                        </label>
                                        <select class="gui-input" name="user_id" id="" required>
                                            @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <!-- -------------- /section -------------- -->

                                    <div class="section">
                                        <label for="username" class="field prepend-icon">
                                            <h6>Leave Type</h6>
                                        </label>
                                        <select class="gui-input" name="leave_type_id" id="" required>
                                            @foreach ($leaves as $leave)
                                            <option value="{{$leave->id}}">{{$leave->leave_type}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="section">
                                        <label for="username" class="field prepend-icon">
                                            <h6> Days </h6>
                                        </label>
                                        <select name="days[]" class="days-select gui-input" multiple="multiple" required>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday" selected>Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>

                                    <div class="section">
                                        <label for="date" class="field prepend-icon ">
                                            <h6> From Date </h6>
                                        </label>
                                        <input type="text" id="datepicker1"
                                            class="gui-input fs13 select2-single form-control" placeholder="From Date "
                                            name="date_from" required>
                                    </div>

                                    <div class="section">
                                        <label for="date" class="field prepend-icon ">
                                            <h6> To Date </h6>
                                        </label>
                                        <input type="date" id="datepicker1"
                                            class="gui-input fs13 select2-single form-control" placeholder="To Date"
                                            name="date_to" required>
                                    </div>

                                    <div class="section">
                                        <label for="username" class="field prepend-icon">
                                            <h6> From Time </h6>
                                        </label>
                                        <input type="time" class="gui-input" name="from_time" placeholder="From Time"
                                            required>
                                    </div>

                                    <div class="section">
                                        <label for="username" class="field prepend-icon">
                                            <h6> To Time</h6>
                                        </label>
                                        <input type="time" class="gui-input" name="to_time" placeholder="To Time"
                                            required>
                                    </div>




                                    <!-- -------------- /section -------------- -->


                                    <div class="section">
                                        <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                    </div>

                                    <!-- -------------- /section -------------- -->

                                </div>
                                {!! Form::close() !!}
                                <!-- -------------- /Form -------------- -->
                                </form>
                            </div>
                        </div>
                        <!-- -------------- /Panel -------------- -->
                    </div>
                    <!-- -------------- /Login Form -------------- -->


                </div>

            </div>
        </div>
        <!-- -------------- /Column Center -------------- -->

    </section>
    <!-- -------------- /Content -------------- -->
</div>

{{--  --}}

@endsection