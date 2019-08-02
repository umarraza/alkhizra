@extends('layouts.app')

@section('content')
    <form action="{{url('create-class')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Class</h4>

                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Course:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="courseId">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="course_name">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">Title</label>
                    <input class="form-control form-control-sm" name="classTitle" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Date</label>
                    <input class="form-control form-control-sm" name="classDate" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time</label>
                    <input class="form-control form-control-sm" name="classTime" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time Zone</label>
                    <input class="form-control form-control-sm" name="timeZone" type="text" placeholder="" required>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Class</button>
                    <a href="{{url('/show-classes')}}" class="small-box-footer">Show Classes<i class="fa fa-arrow-circle-right"></i></a>

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
