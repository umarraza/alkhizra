@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel">
                <h1><b>Classes</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    
                    <button type="button" class="btn btn-success pull-right"><a href="{{ url('/add-class-form') }}" class="small-box-footer" style="color:#fff; text-decoration:none">Add Class</a></button>

                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($classes as $class)
                <div class="col-md-4">
                    <div class="card" style="width: 45rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                        <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                
                        <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >{{$class->first_name}}</h5>
                        <h5>{{$class->title}}</h5>
                        <h5>{{$class->date}}</h5>
                        <h5>{{$class->teacher_email}}</h5>

                
                        <hr style=" border-top: 1px solid #DEDEDE;">
                        <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px"> 
                            <button type="button" class="btn btn-info"><a href="{{url('/class-update-form/'.$class->id)}}" style="color:#000; text-decoration:none">Update</a></button>
                            <button type="button" class="btn btn-danger"><a href="{{url('/class-delete/'.$class->id)}}" style="color:#000; text-decoration:none">Delete</a></button>
                        </div>
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
