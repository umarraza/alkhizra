@extends('layouts.app')

@section('content')
    <form action="{{url('create-student')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Student</h4>

                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input class="form-control form-control-sm" name="first_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input class="form-control form-control-sm" name="last_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Gender</label>
                    <input class="form-control form-control-sm" name="gender" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Grade</label>
                    <input class="form-control form-control-sm" name="grade" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input class="form-control form-control-sm" name="email" type="text" placeholder="">

                    <input type="hidden" class="form-control" id="type" id="id" name="teacherId" value="{{ $id }}">

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Student</button>
                    <a href="{{ url('/list-students') }}" class="small-box-footer">Show Students<i class="fa fa-arrow-circle-right"></i></a>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>
@endsection
