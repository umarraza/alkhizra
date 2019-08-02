@extends('layouts.app')

@section('content')
    <form action="/alkhizra/student-update/{{ $student->id }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Update Student</h4>
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

                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required="true" value="{{$student->first_name}}">


                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" required="true" value="{{$student->last_name}}">


                    <label class="form-check-label" for="exampleCheck1">Specialization</label>
                    <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="" required="true" value="{{$student->dateOfBirth}}">


                    <label class="form-check-label" for="exampleCheck1">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="" required="true" value="{{$student->phoneNumber}}">


                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" required="true" value="{{$student->email}}">


                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg update-teacher-btn" style="color:#fff; font-size:15px;text-decoration:none"><i class="fas fa-user-plus fa-user-color"></i>&nbsp;&nbsp;Update student</button>
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
