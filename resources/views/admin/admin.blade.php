@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        

            @if (Auth::User()->roleId == 1)


            @endif

            @if (Auth::User()->roleId == 2)

                <li><a href="{{ url('teacher-courses') }}"><i class="fa fa-user"></i> <span>My Courses</span></a></li>  
                <li><a href="{{ url('teacher-students') }}"><i class="fa fa-user"></i> <span>My Students</span></a></li>  
                <li><a href="{{ url('teacher-classes') }}"><i class="fa fa-user"></i> <span>My Classes</span></a></li>  

            @endif

            @if (Auth::User()->roleId == 3)
            
                <li><a href="{{ url('student-classes') }}"><i class="fa fa-user"></i> <span>My Classes</span></a></li>  
                <li><a href="{{ url('student-courses') }}"><i class="fa fa-user"></i> <span>My Courses</span></a></li>  

            @endif
        </div>
    </div>
</div>
@endsection
