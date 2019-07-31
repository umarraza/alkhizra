@extends('layouts.app')

@section('content')
    <form action="{{url('create-conferenece')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Course</h4>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Teacher:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="teacherId">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}" name="course_name">{{$teacher->first_name. ' '. $teacher->last_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <label class="form-check-label" for="exampleCheck1">Conferenece Name</label>
                    <input class="form-control form-control-sm" name="conferenceName" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Date</label>
                    <input class="form-control form-control-sm" name="date" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time</label>
                    <input class="form-control form-control-sm" name="time" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time Zone</label>
                    <input class="form-control form-control-sm" name="timeZone" type="text" placeholder="" required>
                    
                    <label for="author">Cover:</label>
                    <input type="file" class="form-control" name="image"/>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Conferenece</button>
                    <a href="{{url('/show-courses')}}" class="small-box-footer">Show Courses<i class="fa fa-arrow-circle-right"></i></a>

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
