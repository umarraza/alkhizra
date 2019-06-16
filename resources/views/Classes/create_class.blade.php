@extends('layouts.app')

@section('content')
    <form action="{{url('create-class')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Course</h4>

                    <label class="form-check-label" for="exampleCheck1">Title</label>
                    <input class="form-control form-control-sm" name="title" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Date</label>
                    <input class="form-control form-control-sm" name="date" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time From</label>
                    <input class="form-control form-control-sm" name="time_from" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time To</label>
                    <input class="form-control form-control-sm" name="time_to" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Description</label>
                    <input class="form-control form-control-sm" name="description" type="text" placeholder="">

                    <label class="form-check-label" for="exampleCheck1">Teacher Description</label>
                    <input class="form-control form-control-sm" name="teacher_description" type="text" placeholder="">

                    <input type="hidden" class="form-control" id="type" id="id" name="teacherId" value="{{ $id }}">

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Class</button>
                    <a href="{{url('/list-classes/'.$id)}}" class="small-box-footer">Show Classes<i class="fa fa-arrow-circle-right"></i></a>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>
@endsection
