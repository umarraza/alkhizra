@extends('layouts.app')

@section('content')
    <form action="{{url('create-course')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Course</h4>

                    <label class="form-check-label" for="exampleCheck1">Title</label>
                    <input class="form-control form-control-sm" name="course_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Description</label>
                    <input class="form-control form-control-sm" name="description" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">About Instructor</label>
                    <input class="form-control form-control-sm" name="about_instructor" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Category</label>
                    <input class="form-control form-control-sm" name="category" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Type</label>
                    <input class="form-control form-control-sm" name="type" type="text" placeholder="">

                    <input type="hidden" class="form-control" id="type" id="id" name="teacherId" value="{{ $id }}">

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Course</button>
                    <a href="{{url('/list-courses/'.$id)}}" class="small-box-footer">Show Courses<i class="fa fa-arrow-circle-right"></i></a>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>
@endsection
