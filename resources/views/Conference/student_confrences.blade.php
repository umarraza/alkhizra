@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
        <h1 style="color:#000"><b>Conferences</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div> 
@php $count=1; @endphp
@foreach($confrences as $conference)
<div class="container show-class-container">

    <div class="row show-class-main-row">
        <div class="col-md-2" style="max-width:10%;">
            <img src="{{url('/public/images/pic1.jpg')}}" alt="Image"/ width="120px" height="170px" style="border-radius:2px; padding:4px">
        </div>
        <div class="col-md-8">
            <h5 class="class-title"><b>{{$conference->conferenceName}}</b></h5>
            <p class="class-teacher">{{$conference->conferenceDate}}</p>
            <p class="teacher-class-para"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{$conference->conferenceTime}}</p>

            <hr class="show-classes-hr">
            <span><i class="fas fa-file"></i>&nbsp;&nbsp;Status:</span><span class="style-spam">&nbsp;&nbsp;Live</span>
            <span style="margin:0 0 0 75px"><i class="fas fa-globe-americas"></i>&nbsp;&nbsp;</span>&nbsp;&nbsp;{{$conference->timeZone}}</span>
        </div>
        <div class="col-md-2 md-2-col">
            <button class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9; margin:44px -57px 0px 0px"><a href="{{url('/start-session/'.$conference->id)}}" style=" color:#fff; text-decoration:none">&nbsp;Join</a></button>
        </div>
    </div>

</div> 
<br>
@php $count++; @endphp
@endforeach
@endsection
