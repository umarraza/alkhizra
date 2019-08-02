@extends('layouts.app')

@section('content')
    <form action="/alkhizra/class-update/{{ $class->id }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Update Class</h4>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Course:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="courseId">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="courseName">{{$course->courseName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">Class Name</label>
                    <input type="text" class="form-control" id="classTitle" name="classTitle" placeholder="" required="true" value="{{$class->classTitle}}">


                    <label class="form-check-label" for="exampleCheck1">Class Date</label>
                    <input type="text" class="form-control" id="classDate" name="classDate" placeholder="" required="true" value="{{$class->classDate}}">


                    <label class="form-check-label" for="exampleCheck1">Class Time</label>
                    <input type="text" class="form-control" id="classTime" name="classTime" placeholder="" required="true" value="{{$class->classTime}}">


                    <label class="form-check-label" for="exampleCheck1">Time Zone</label>
                    <input type="text" class="form-control" id="timeZone" name="timeZone" placeholder="" required="true" value="{{$class->timeZone}}">

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg update-teacher-btn" style="color:#fff; font-size:15px;text-decoration:none">Update Class</button>
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
