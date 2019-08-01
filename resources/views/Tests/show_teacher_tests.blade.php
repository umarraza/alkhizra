@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
        <h1 style="color:#000"><b>Tests</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <button type="button" class="btn btn-lg pull-right add-user-btn">
            <i class="fas fa-plus-circle fa-user-color"></i>
            <a class="create-user-link" href="{{ url('/create-teacher-form') }}" class="small-box-footer">&nbsp;&nbsp;Add Test</a>
        </button>
    </form>
</div> 
@php $count=1; @endphp
@foreach($tests as $test)
<div class="container show-class-container">

    <div class="row show-class-main-row">
        <div class="col-md-2" style="max-width:10%;">
            <img src="{{url('/public/images/pic1.jpg')}}" alt="Image"/ width="120px" height="170px" style="border-radius:2px; padding:4px">
        </div>
        <div class="col-md-8">
            <h5 class="class-title"><b>{{$test->testName}}</b></h5>
            <p class="class-teacher">{{$test->date}}</p>
            <p class="teacher-class-para"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{$test->time}}</p>
            <p class="teacher-class-para"><i class="fas fa-clock"></i>&nbsp;&nbsp;{{$test->timeZone}}</p>

            <hr class="show-classes-hr">
            <span><i class="fas fa-file"></i>&nbsp;&nbsp;Status:</span><span class="style-spam">&nbsp;&nbsp;Live</span>
            <span style="margin:0 0 0 75px"><i class="fas fa-globe-americas"></i>&nbsp;&nbsp;Attempts:</span>&nbsp;&nbsp;GMT Standard Time</span>
            <div class="pull-right pull-right-div">
                <a href="{{url('/class-update-form/'.$test->id)}}"><button type="submit" class="btn btn-lg btn-default  dlt-teacher-btn"><i class="far fa-edit"aria-hidden="true"></i></button></a>
                <a href="{{url('/class-update-form/'.$test->id)}}"><button type="submit" class="btn btn-lg btn-default  dlt-teacher-btn"><i class="fas fa-trash-alt"aria-hidden="true"></i></button></a>
           
            </div>
        </div>
        <div class="col-md-2 md-2-col">
            <button class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9; margin:44px -57px 0px 0px"><a href="{{url('/start-session/'.$test->id)}}" style=" color:#fff; text-decoration:none">&nbsp;View Results</a></button>
        </div>
    </div>

</div> 
<br>
@php $count++; @endphp
@endforeach
@endsection
