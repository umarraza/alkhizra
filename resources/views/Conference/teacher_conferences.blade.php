@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
        <h1 class="user-heading"><b>Classes</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div> 
@if(!empty($confrences))
    @php $count=1; @endphp
    @foreach($confrences as $conference)
        <div class="container" style="width:80%;border:1px solid #D4D4D5; padding:3px; border-radius:3px">

            <div class="row">
                <div class="col-md-2" style="max-width:10%;">
                    <img src="{{url('/public/images/pic1.jpg')}}" alt="Image"/ width="120px" height="150px" style="border-radius:2px; padding:4px">
                </div>
                <div class="col-md-8">
                    <h5><b>{{$conference->conferenceName}}</b></h5>
                    <p class="teacher-classes-para"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{$conference->conferenceDate}}</p>
                    <p class="teacher-classes-para"><i class="fas fa-clock"></i>&nbsp;&nbsp;{{$conference->conferenceTime}}</p>
                    <hr style="border-top: 1px solid #DEDEDE; width:136.5%">
                    <span><i class="fas fa-file"></i>&nbsp;&nbsp;Status:</span> <span style="color:#0DC500">Live</span>
                    <span style="margin:0 0 0 75px"><i class="fas fa-globe-americas"></i>&nbsp;&nbsp;{{$conference->timeZone}}</span>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9; margin:20px 0 0 0"><a href="{{url('/start-session/'.$conference->id)}}" style=" color:#fff; text-decoration:none">&nbsp;Join</a></button>
                </div>
            </div>

        </div> 
        <br>
    @php $count++; @endphp
    @endforeach
@else
<div class="container"></div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>No Confrences Available</h1>
        </div>
    </div>
</div>
@endif
@endsection
