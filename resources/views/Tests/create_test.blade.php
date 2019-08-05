@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-4 col-lg-offset-1">
            <div class="row">
                <div class="col text-center modal-title-margin">
                    <h1 class="add-test-btn">Create Test</h1>
                </div>
            </div>
            <form action="{{url('create-test')}}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlInput1">Test Name</label>
                    <input type="text" class="form-control" name="testName" id="exampleFormControlInput1" placeholder="Enter Test Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Total Marks</label>
                            <input type="text" class="form-control" name="totalMarks" id="exampleFormControlInput1" placeholder="Enter Total Marks">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Passing Marks</label>
                            <input type="text" class="form-control" name="passingMarks" id="exampleFormControlInput1" placeholder="Enter Passing Marks">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Total Time</label>
                    <input type="text" class="form-control" name="totalTime" id="exampleFormControlInput1" placeholder="Enter Total Time">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Instructions</label>
                    <textarea class="form-control" name="instructions" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Course:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}" name="course_name">{{$course->courseName}}</option>
                        @endforeach
                    </select>
                </div>
            <button type="submit" class="btn btn-lg btn-success pull-right" style="background-color: #38ADA9;">Create Test</button>
            </form>
        </div>
    </div>


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
