@extends('layouts.app')

@section('content')
    <form action="/alkhizra/course-update/{{ $course->id }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Update course</h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Teacher:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="teacherId">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" name="course_name">{{$teacher->first_name. ' '. $teacher->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input type="text" class="form-control" id="courseName" name="courseName" placeholder="" required="true" value="{{$course->courseName}}">


                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input type="text" class="form-control" id="courseType" name="courseType" placeholder="" required="true" value="{{$course->courseType}}">


                    <label class="form-check-label" for="exampleCheck1">Specialization</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="" required="true" value="{{$course->description}}">

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg update-teacher-btn" style="color:#fff; font-size:15px;"><i class="fas fa-user-plus fa-user-color"></i>&nbsp;&nbsp;Update course</button>
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
