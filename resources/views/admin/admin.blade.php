@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::User()->name}} Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    This is Admin Dashboard. You must be privileged to be here !
                    @if (Auth::User()->roleId == 1)
                        <li><a href="{{ url('create-teacher-form') }}"><i class="fa fa-user"></i> <span>Add Teacher</span></a></li>  
                        <li><a href="{{ url('create-student') }}"><i class="fa fa-user"></i> <span>Add Student</span></a></li>   
                        <li><a href="{{ url('create-class') }}"><i class="fa fa-user"></i> <span>Add Class</span></a></li>   
                        <li><a href="{{ url('create-course') }}"><i class="fa fa-user"></i> <span>Add Course</span></a></li>   
                        <li><a href="{{ url('create-test') }}"><i class="fa fa-user"></i> <span>Add Test</span></a></li>
                        <li><a href="{{ url('list-teachers') }}"><i class="fa fa-user"></i> <span>All Teachers</span></a></li>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
