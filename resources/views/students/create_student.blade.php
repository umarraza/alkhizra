@extends('layouts.app')

@section('content')
    <form action="{{url('create-student')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Create Student</h4>
                        </div>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input class="form-control form-control-sm" name="first_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input class="form-control form-control-sm" name="last_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Gender</label>
                    <input class="form-control form-control-sm" name="gender" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Date of Birth</label>
                    <input class="form-control form-control-sm" name="dateOfBirth" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Phone Number</label>
                    <input class="form-control form-control-sm" name="phoneNumber" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input class="form-control form-control-sm" name="email" type="text" placeholder="" required>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Course:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="courseName">{{$course->courseName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg add-teacher-btn" style="color:#fff; font-size:15px;text-decoration:none"><i class="fas fa-user-plus fa-user-color"></i>&nbsp;&nbsp;Add Student</button>
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
