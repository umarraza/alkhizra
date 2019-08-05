@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="heading-pannel" id="heading-pannel">
            <h1 id="user-heading"><b>Teachers</b></h1>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <button type="button" class="btn btn-lg pull-right add-user-btn">
                        <i class="fas fa-user-plus fa-user-color"></i>
                        <a href="{{ url('/create-teacher-form') }}" class="small-box-footer create-user-link" style="color:#fff; font-size:15px;font-weight:900;text-decoration:none">&nbsp;&nbsp;Add Teacher</a>
                    </button>
                </form>
            </div> <br>
            <div class="row">
                @php $count=1; @endphp
                @foreach($teachers as $teacher)
                <div class="col-md-3 col-sm-6 style-md-3-col">
                    <div class="row" id="sub-row">
                        <div class="col-md-2">
                        @if (isset($teacher->image))
                            <img src="{{url('/public/images/'.$teacher->image->imageName)}}" class="rounded img-style" alt="Image"/ width="60px" height="60px">
                        @else 
                            <img src="{{url('/public/images/male.png')}}" class="rounded img-style" alt="Image"/ width="60px" height="60px">
                        @endif
                        </div>
                        <div class="col-md-10 sub-col-md-10">
                            <div class="card style-card">
                                <h5 class="card-title style-card-title">{{$teacher->first_name . ' ' . $teacher->last_name}}</h5>
                                <p class="style-paragraph">{{$teacher->specialization}}</p>
                                <h5 class="style-headings-1"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;{{$teacher->phoneNumber}}</h5>
                                <h5 class="style-headings-2"><i class="far fa-envelope"></i>&nbsp;&nbsp;{{$teacher->email}}</h5>
                            </div>
                            <hr class="show-user-hr">
                            <a class="icon-links" href="{{url('/teacher-update-form/'.$teacher->id)}}"><i class="far fa-edit show-user-phone-icon"></i></a>
                            <a class="icon-links" href="{{url('/teacher-delete/'.$teacher->id)}}"><i class="far fa-trash-alt show-user-trash-icon"></i></a>
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
