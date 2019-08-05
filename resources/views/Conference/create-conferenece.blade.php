@extends('layouts.app')

@section('content')
    <form action="{{url('create-conferenece')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Create Conference</h4>
                        </div>
                    </div>
                    <label class="form-check-label" for="exampleCheck1">Conference Name</label>
                    <input class="form-control form-control-sm" name="conferenceName" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Conference Date</label>
                    <input class="form-control form-control-sm" name="conferenceDate" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Conference Time</label>
                    <input class="form-control form-control-sm" name="conferenceTime" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Time Zone</label>
                    <input class="form-control form-control-sm" name="timeZone" type="text" placeholder="" required>

                    @if (!empty($teachers))
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Who is conducting? (Teacher Name)</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="teacher_id">
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}" name="course_name">{{$teacher->first_name. ' '. $teacher->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">No Teachers Available</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="teacher_id">
                                <option value="{{$teacher->id}}" name="course_name"></option>
                            </select>
                        </div>
                    @endif
                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn-lg add-conference-btn" style="color:#fff; font-size:15px;text-decoration:none"><i class="fas fa-plus-circle fa-user-color"></i>&nbsp;&nbsp;Add Conference</button>
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
