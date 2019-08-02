@extends('layouts.app')

@section('content')
    <form action="{{url('create-teacher')}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-center modal-title-margin">
                            <h4 class="create-teacher-title">Create Teacher</h4>
                        </div>
                    </div>
                    <label class="form-check-label" for="exampleCheck1">First Name</label>
                    <input class="form-control form-control-sm" name="first_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Last Name</label>
                    <input class="form-control form-control-sm" name="last_name" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Specialization</label>
                    <input class="form-control form-control-sm" name="specialization" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Phone Number</label>
                    <input class="form-control form-control-sm" name="phoneNumber" type="text" placeholder="" required>

                    <label class="form-check-label" for="exampleCheck1">Email</label>
                    <input class="form-control form-control-sm" name="email" type="text" placeholder="" required>

                    <br>
                     <div class="row">
                        <div class="col text-center modal-title-margin">
                            <button type="submit" class="btn btn btn-lg add-teacher-btn"><i class="fas fa-user-plus fa-user-color"></i>&nbsp;&nbsp;Add Teacher</button>
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
