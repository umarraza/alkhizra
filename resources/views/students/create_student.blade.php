@extends('layouts.app')

@section('content')
    <form action="{{url('create-student')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Student</h4>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Course:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="course_name">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input class="form-control form-control-sm" name="first_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input class="form-control form-control-sm" name="last_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Gender</label>
                    <input class="form-control form-control-sm" name="gender" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Grade</label>
                    <input class="form-control form-control-sm" name="grade" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input class="form-control form-control-sm" name="email" type="text" placeholder="" required>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Student</button>
                    <a href="{{ url('/show-students') }}" class="small-box-footer">Show Students<i class="fa fa-arrow-circle-right"></i></a>

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
                            <li>Email already exists!</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-4"></div>
    </div>

@endsection
