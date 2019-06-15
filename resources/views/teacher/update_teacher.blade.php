@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h1 class="box-title">Edit Teacher</h1>
                    <div class="pull-right">
                        <a href="{{ url('list-teachers') }}" type="button" class="btn btn-danger">Back</a>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="{{url('/teacher-update')}}">
                {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">First Name:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required="true" value="{{$teacher->first_name}}">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Last Name:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" required="true" value="{{$teacher->last_name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Address:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address" placeholder="" required="true" value="{{$teacher->address}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">About:</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" placeholder="" required="true" value="{{$teacher->description}}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$teacher->id}}">

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