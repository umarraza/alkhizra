@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
        <h1 class="user-heading"><b>Conferences</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <button type="button" class="btn btn-lg pull-right add-user-btn">
            <i class="fas fa-plus-circle fa-user-color"></i>
            <a class="create-user-link" href="{{ url('/add-conference-form') }}" class="small-box-footer" style="color:#fff; font-size:15px;font-weight:900;text-decoration:none">&nbsp;&nbsp;Add Conference</a>
        </button>
    </form>
</div> 
@php $count=1; @endphp
@foreach($conferences as $conference)
<div class="container show-class-container">

    <div class="row show-class-main-row">
        <div class="col-md-2" style="max-width:10%;">
            <img src="{{url('/public/images/pic1.jpg')}}" alt="Image"/ width="120px" height="170px" style="border-radius:2px; padding:4px">
        </div>
        <div class="col-md-8">
            <h5 class="class-title"><b>{{$conference->conferenceName}}</b></h5>
            <p class="class-teacher">{{$conference->date}}</p>
            @if (empty($conference->teacher))
                <p class="class-teacher">No Tecahers</p>
            @else
                <p class="class-teacher">{{$conference->teacher->first_name . ' ' .$conference->teacher->last_name}}</p>
            @endif
            <p class="teacher-class-para"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{$conference->conferenceDate}}</p>
            <p class="teacher-class-para"><i class="fas fa-clock"></i>&nbsp;&nbsp;{{$conference->conferenceTime}}</p>

            <hr class="show-classes-hr">
            <span><i class="fas fa-file"></i>&nbsp;&nbsp;Status:</span><span class="style-spam">&nbsp;&nbsp;Live</span>
            <span style="margin:0 0 0 75px"><i class="fas fa-globe-americas"></i></span>&nbsp;&nbsp;{{$conference->timeZone}}</span>
            <div class="pull-right pull-right-div">
                <a href="{{url('/conference-update-form/'.$conference->id)}}"><button type="submit" class="btn btn-lg btn-default  dlt-teacher-btn"><i class="far fa-edit"aria-hidden="true"></i></button></a>
                <a href="{{url('/conference-delete/'.$conference->id)}}"><button type="submit" class="btn btn-lg btn-default  dlt-teacher-btn"><i class="fas fa-trash-alt"aria-hidden="true"></i></button></a>
            </div>
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
