@extends('layouts.app')

@section('content')
    <form action="{{url('create-teacher')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Create Teacher</h4>
                    <label class="form-check-label" for="exampleCheck1">Teacher Name</label>
                    <input class="form-control form-control-sm" name="teacherName" type="text" placeholder="" required>
                    <label class="form-check-label" for="exampleCheck1">About Teacher</label>
                    <input class="form-control form-control-sm" name="description" type="text" placeholder="" required>
                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input class="form-control form-control-sm" name="email" type="text" placeholder="">
                    <label class="form-check-label" for="exampleCheck1">Password</label>
                    <input class="form-control form-control-sm" name="password" type="password" id="inputPassword" placeholder="" required>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Create Teacher</button>
                    {{--  <button type="submit" class="btn btn-primary btn-sm">Show Teachers</button>  --}}
                    <a href="{{ url('/list-teachers') }}" class="small-box-footer">Show Teachers<i class="fa fa-arrow-circle-right"></i></a>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>
@endsection
