@extends('layouts.app')

@section('content')
    <form action="{{url('create-course')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Create Course</h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Teacher:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="teacherId">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" name="course_name">{{$teacher->first_name. ' '. $teacher->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-check-label" for="exampleCheck1">Course Name</label>
                    <input class="form-control form-control-sm" name="courseName" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Course Type</label>
                    <input class="form-control form-control-sm" name="courseType" type="text" placeholder="" required>

                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg add-teacher-btn" style="color:#fff; font-size:15px;text-decoration:none"><i class="fas fa-plus-circle fa-user-color"></i>&nbsp;&nbsp;Add Course</button>
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
