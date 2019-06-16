@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h1 class="box-title">Edit Course</h1>
                    <div class="pull-right">
                        <a href="{{ url('list-courses') }}" type="button" class="btn btn-danger">Back</a>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="{{url('/course-update')}}">
                {{ csrf_field() }}

                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Course Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="" required="true" value="{{$course->course_name}}">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Description:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" placeholder="" required="true" value="{{$course->description}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">About Instructor:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="about_instructor" name="about_instructor" placeholder="" required="true" value="{{$course->about_instructor}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Category:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category" name="category" placeholder="" required="true" value="{{$course->category}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Type:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="type" name="type" placeholder="" required="true" value="{{$course->type}}">
                            </div>
                        </div>


                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$course->id}}">

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