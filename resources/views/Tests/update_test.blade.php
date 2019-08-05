@extends('layouts.app')

@section('content')
    <form action="/alkhizra/conference-update/{{ $conference->id }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Update Conference</h4>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Teacher:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" name="course_name">{{$teacher->first_name. ' '. $teacher->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">Conference Name</label>
                    <input type="text" class="form-control" id="conferenceName" name="conferenceName" required="true" value="{{$conference->conferenceName}}">


                    <label class="form-check-label" for="exampleCheck1">Conference Date</label>
                    <input type="text" class="form-control" id="conferenceDate" name="conferenceDate" required="true" value="{{$conference->conferenceDate}}">


                    <label class="form-check-label" for="exampleCheck1">Conference Time</label>
                    <input type="text" class="form-control" id="conferenceTime" name="conferenceTime" required="true" value="{{$conference->conferenceTime}}">


                    <label class="form-check-label" for="exampleCheck1">Time Zone</label>
                    <input type="text" class="form-control" id="timeZone" name="timeZone" required="true" value="{{$conference->timeZone}}">

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg update-teacher-btn" style="color:#fff; font-size:15px;text-decoration:none">Update Conference</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>

    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-4"></div>
    </div>

@endsection
