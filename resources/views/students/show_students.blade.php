@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel" id="heading-pannel">
                <h1 id="user-heading"><b>Students</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <button type="button" class="btn btn-lg pull-right add-user-btn">
                        <i class="fas fa-user-plus fa-user-color"></i>
                        <a href="{{ url('/add-student-form') }}" class="small-box-footer create-user-link" style="color:#fff; font-size:15px;font-weight:900;text-decoration:none">&nbsp;&nbsp;Add Student</a>
                    </button>
                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($students as $student)
                <div class="col-md-3 col-sm-6 style-md-3-col">
                    <div class="row" id="sub-row">
                        <div class="col-md-2">
                        @if(isset($student->image))
                            <img src="{{url('/public/images/'.$student->image->imageName)}}" class="rounded img-style" alt="Image"/ width="60px" height="60px">
                        @else
                            <img src="{{url('/public/images/male.png')}}" class="rounded img-style" alt="Image"/ width="60px" height="60px">
                        @endif
                        </div>
                        <div class="col-md-10 sub-col-md-10">
                            <div class="card style-card">
                                <h5 class="card-title style-card-title">{{$student->first_name . ' ' . $student->last_name}}</h5>
                                <p class="style-paragraph">{{$student->specialization}}</p>
                                <h5 class="style-headings-1"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;{{$student->phoneNumber}}</h5>
                                <h5 class="style-headings-2"><i class="far fa-envelope"></i>&nbsp;&nbsp;{{$student->email}}</h5>
                            </div>
                            <hr class="show-user-hr">
                            <a class="icon-links" href="{{url('/student-update-form/'.$student->id)}}"><i class="far fa-edit show-user-phone-icon"></i></a>
                            <a class="icon-links" href="{{url('/student-delete/'.$student->id)}}"><i class="far fa-trash-alt show-user-trash-icon"></i></a>
                        </div>
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
