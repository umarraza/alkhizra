@extends('layouts.app')

@section('content')
    <form action="{{url('create-class')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Create Class</h4>
                        </div>
                    </div>
                    <label class="form-check-label" for="exampleCheck1">Class Name:</label>
                    <input class="form-control form-control-sm" name="classTitle" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Class Date:</label>
                    <input class="form-control form-control-sm" name="classDate" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Class Time:</label>
                    <input class="form-control form-control-sm" name="classTime" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time Zone:</label>
                    <input class="form-control form-control-sm" name="timeZone" type="text" placeholder="" required>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Course:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="courseId">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="courseName">{{$course->courseName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg add-teacher-btn" style="color:#fff;text-decoration:none"><i class="fas fa-plus-circle fa-user-color"></i>&nbsp;&nbsp;Add Class</button>
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
