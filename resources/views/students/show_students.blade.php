@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel">
                <h1 style="color:#000"><b>Students</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <button type="button" class="btn btn-success pull-right"><a href="{{ url('/add-student-form') }}" class="small-box-footer" style="color:#fff; text-decoration:none">Add student</a></button>
                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($students as $student)
                <div class="col-md-3 col-sm-6">
                    <div class="card" style="width: 30rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                        <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                
                        <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >{{$student->first_name . ' ' . $student->last_name}}</h5>
                        <h5>{{$student->phoneNumber}}</h5>
                        <h5>{{$student->dateOfBirth}}</h5>
                        <h5>{{$student->email}}</h5>
                
                        <hr style=" border-top: 1px solid #DEDEDE;">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i><a href="{{url('/student-update-form/'.$student->id)}}" style="color:#000; text-decoration:none">Update</a></button>
                            <button class="btn btn-sm btn-info"><i class="fa fa-times"></i><a href="{{url('/student-delete/'.$student->id)}}" style="color:#000; text-decoration:none">Delete</a></button>
                        <p class="card-text"></p>
                    </div>
                    <br>
                </div>
                @php $count++; @endphp
                @endforeach

            </div> {{-- end row--}}
            <br>
        </div>
    </div>
@endsection
