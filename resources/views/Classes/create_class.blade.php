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
                        <select class="form-control" id="exampleFormControlSelect1" name="course_Id">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" name="course_name">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">Title</label>
                    <input class="form-control form-control-sm" name="title" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Date</label>
                    <input class="form-control form-control-sm" name="date" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time From</label>
                    <input class="form-control form-control-sm" name="time_from" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time To</label>
                    <input class="form-control form-control-sm" name="time_to" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Description</label>
                    <input class="form-control form-control-sm" name="description" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Teacher Description</label>
                    <input class="form-control form-control-sm" name="teacher_description" type="text" placeholder="" required>

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
                            <li>Class Name already exists!</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
