@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::User()->role->name}} Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    This is {{Auth::User()->role->name}} Dashboard. You must be privileged to be here !

                    @if (Auth::User()->roleId == 1)

                    <ul>
                        <li><a href="{{ url('create-teacher-form') }}"><i class="fa fa-user"></i> <span>Add Teacher</span></a></li>  
                        <li><a href="{{ url('add-course-form') }}"><i class="fa fa-user"></i> <span>Add Course</span></a></li>
                        <li><a href="{{ url('add-student-form') }}"><i class="fa fa-user"></i> <span>Add Student</span></a></li>
                        <li><a href="{{ url('add-class-form') }}"><i class="fa fa-user"></i> <span>Add Classes</span></a></li>
                    </ul>


                    <ul>
                        <li><a href="{{ url('list-teachers') }}"><i class="fa fa-user"></i> <span>Show Teachers</span></a></li>
                        <li><a href="{{ url('show-students') }}"><i class="fa fa-user"></i> <span>Show Students</span></a></li>
                        <li><a href="{{ url('show-courses') }}"><i class="fa fa-user"></i> <span>Show Courses</span></a></li>
                        <li><a href="{{ url('show-classes') }}"><i class="fa fa-user"></i> <span>Show Classes</span></a></li>
                    </ul>

                    @endif

                    @if (Auth::User()->roleId == 2)

                        <li><a href="{{ url('teacher-courses') }}"><i class="fa fa-user"></i> <span>My Courses</span></a></li>  
                        <li><a href="{{ url('teacher-students') }}"><i class="fa fa-user"></i> <span>My Students</span></a></li>  
                        <li><a href="{{ url('teacher-classes') }}"><i class="fa fa-user"></i> <span>My Classes</span></a></li>  

                    @endif

                    @if (Auth::User()->roleId == 3)
                    
                        <li><a href="{{ url('student-classes') }}"><i class="fa fa-user"></i> <span>My Classes</span></a></li>  
                        <li><a href="{{ url('teacher-students') }}"><i class="fa fa-user"></i> <span>My Courses</span></a></li>  

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
