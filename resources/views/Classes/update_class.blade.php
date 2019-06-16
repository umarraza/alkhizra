@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h1 class="box-title">Edit Class</h1>
                    <div class="pull-right">
                        <a href="{{ url('list-classs') }}" type="button" class="btn btn-danger">Back</a>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="{{url('/class-update')}}">
                {{ csrf_field() }}

                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" placeholder="" required="true" value="{{$class->title}}">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Date:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="date" name="date" placeholder="" required="true" value="{{$class->date}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Time From:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="time_from" name="time_from" placeholder="" required="true" value="{{$class->time_from}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Time To:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="time_to" name="time_to" placeholder="" required="true" value="{{$class->time_to}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Description:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" placeholder="" required="true" value="{{$class->description}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Teacher Description:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="teacher_description" name="teacher_description" placeholder="" required="true" value="{{$class->teacher_description}}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$class->id}}">

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