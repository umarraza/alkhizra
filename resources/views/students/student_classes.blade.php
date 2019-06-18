@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">My Classes</h3>
                            <a href="{{ url('/admin') }}" class="small-box-footer">Home<i class="fa fa-arrow-circle-right"></i></a> <br>
                            <br>
                            <br>
                            <div class="pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="dbookSales" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Class Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Description</th>
                                    <th>Course Name</th>
                                    <th>Attend Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $class->title }}</td>
                                    <td>{{ $class->date }}</td>
                                    <td>{{ $class->time_from }}</td>
                                    <td>{{ $class->time_to }}</td>
                                    <td>{{ $class->description }}</td>
                                    <td>{{ $class->teacher_description }}</td>
                                    <td>{{ $class->course_name }}</td>
                                    <td>
                                    
                                        <form action="{{url('/start-class')}}" method="post">
                                        {{ csrf_field() }}

                                            <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}">
                                            <button type="submit" class="btn btn-primary btn-sm">Start Class</button>

                                        {{--  <a href="{{url('/start-class')}}" type="submit" class="btn btn-primary btn-sm" name="{{$class->id}}">Start Class</a>  --}}
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-lg-2"></div>        
    </div>
@endsection
