@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
    <h1 style="color:#000"><b>Courses</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div> 
@php $count=1; @endphp
@foreach($courses as $course)
<div class="container show-class-container">
    <div class="row show-class-main-row">
        <div class="col-md-2" style="max-width:10%;">
        @if (isset($course->teacher->image))
            <img src="{{url('/public/images/'.$course->teacher->image->imageName)}}" alt="Image"/ width="120px" height="170px" style="border-radius:2px; padding:4px">
        @else
            <img src="{{url('/public/images/male.png')}}" alt="Image"/ width="120px" height="170px" style="border-radius:2px; padding:4px">
        @endif
        </div>
        <div class="col-md-8">
            <h5 class="class-title"><b>{{$course->courseName}}</b></h5>
            <p class="class-teacher">{{$course->description}}</p>
            <p class="class-teacher">{{$course->description}}</p>
            <hr class="show-classes-hr">
            <span><i class="fas fa-file"></i>&nbsp;&nbsp;Type:</span><span>&nbsp;&nbsp;{{$course->courseType}}</span>
        </div>
        <div class="col-md-2 md-2-col">
            <button class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9; margin:44px -57px 0px 0px"><a href="{{url('/course-content/'.$course->id)}}" style=" color:#fff; text-decoration:none">&nbsp;Content</a></button>
        </div>
    </div>
</div> 
<br>
@php $count++; @endphp
@endforeach
@endsection
