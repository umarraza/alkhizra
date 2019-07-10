@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h1 class="box-title">Edit Student</h1>
                    <div class="pull-right">
                        <a href="{{ url('show-students') }}" type="button" class="btn btn-danger">Back</a>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="{{url('/student-update/'.$student->id)}}">
                {{ csrf_field() }}
                    <div class="box-body">

                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Update Course:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}" name="course_name">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">First Name:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required="true" value="{{$student->first_name}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Last Name:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" required="true" value="{{$student->last_name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Gender:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="gender" name="gender" placeholder="" required="true" value="{{$student->gender}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Grade:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="grade" name="grade" placeholder="" required="true" value="{{$student->grade}}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$student->id}}">

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection