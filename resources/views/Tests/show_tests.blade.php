@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel">
                <h1 style="color:#000"><b>Tests</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    
                    <button type="button" class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9;"><a href="{{ url('/create-test-form') }}" class="small-box-footer" style="color:#fff; text-decoration:none">Create Test</a></button>

                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($tests as $test)
                <div class="col-md-4">
                    <div class="card" style="width: 45rem; height:32rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                        <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                
                        <h5 class="card-title" style="display: block; color:#000; font-size:20px; font-weight:bold" >{{$test->testName}}</h5>
                        <h5>{{$test->description}}</h5>
                        <span>Total Marks:<b>{{$test->totalMarks}}</b></span>
                        <span style="display:block">Passing Marks:<b>{{$test->passingMarks}}</b></span>
            
                        <hr style=" border-top: 1px solid #DEDEDE;">
                        <a href="{{url('/class-update-form/'.$test->id)}}"> <button type="submit" class="btn btn-lg btn-default" style="margin:-10px 0 0 0"><i class="fas fa-trash-alt"aria-hidden="true"></i></button></a>
                        <button class="btn btn-lg btn-success pull-right" style="margin:-11px 33px 0px 0; background-color: #38ADA9;"><i class="fa fa-sign-in"></i><a href="{{url('/teacher-delete/'.$test->id)}}" style="color:#fff; text-decoration:none">&nbsp;View Results</a></button>

                    </div>
                    <p class="card-text"></p>
                </div>
                @php $count++; @endphp
                @endforeach
            </div> {{-- end row--}}
            <br>
        </div>
    </div>

 
@endsection
