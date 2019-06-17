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
                        <li><a href="{{ url('list-teachers') }}"><i class="fa fa-user"></i> <span>All Teachers</span></a></li>
                        <!-- <li><a href="{{ url('all-students') }}"><i class="fa fa-user"></i> <span>All Teachers</span></a></li> -->
                    @endif

                    @if (Auth::User()->roleId == 2)

                    <li><a href="{{ url('create-teacher-form') }}"><i class="fa fa-user"></i> <span>My Courses</span></a></li>  

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
