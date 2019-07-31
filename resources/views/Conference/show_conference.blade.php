@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel">
                <h1><b>Classes</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    
                    <button type="button" class="btn btn-success pull-right"><a href="{{ url('/add-conference-form') }}" class="small-box-footer" style="color:#fff; text-decoration:none">Add Class</a></button>

                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($conferences as $conference)
                <div class="col-md-4">
                    <div class="card" style="width: 45rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                        <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                
                        <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >{{$conference->conferenceName}}</h5>
                        <h5>{{$conference->date}}</h5>
                        <h5>{{$conference->teacherName}}</h5>

                
                        <hr style=" border-top: 1px solid #DEDEDE;">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i><a href="{{url('/teacher-update-form/'.$conference->id)}}" style="color:#000; text-decoration:none">Update</a></button>
                            <button class="btn btn-sm btn-info"><i class="fa fa-times"></i><a href="{{url('/teacher-delete/'.$conference->id)}}" style="color:#000; text-decoration:none">Delete</a></button>
                            <button class="btn btn-lg btn-success pull-right" style="margin:-10px 33px 0px 0;"><i class="fa fa-sign-in"></i><a href="{{url('/teacher-delete/'.$conference->id)}}" style="color:#000; text-decoration:none">Join</a></button>
                        
                        <p class="card-text"></p>
                    </div>
                </div>
                @php $count++; @endphp
                @endforeach
            </div> {{-- end row--}}
            <br>
        </div>
    </div>

 
@endsection
