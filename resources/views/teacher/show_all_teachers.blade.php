@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Teachers</h3>
                            {{--  <button type="submit" class="btn btn-primary btn-sm">Add Teacher</button>  --}}
                            <a href="{{ url('/admin') }}" class="small-box-footer">Home<i class="fa fa-arrow-circle-right"></i></a> <br>
                            <a href="{{ url('/create-teacher-form') }}" class="small-box-footer">Add Teacher<i class="fa fa-arrow-circle-right"></i></a> <br>


                            {{--  <li><a href="{{ url('create-teacher-form') }}"><i class="btn btn-primary btn-sm"></i>Add Teacher</a></li>    --}}
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>About Teacher</th>
                                    <th>Email</th>
                                    {{--  <th>Show Students</th>
                                    <th>Show Courses</th>
                                    <th>Show Classes</th>  --}}
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @php $count=1; @endphp
                                @foreach($teachers as $teacher)
                                    <td><span>{{ $count }}</span></td>
                                    <td>{{ $teacher->first_name }}</td>
                                    <td>{{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>{{ $teacher->description }}</td>
                                    <td>{{ $teacher->email }}
                                    {{--  <td><a href="{{url('/list-students/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Show Students</a></td>  --}}
                                    {{--  <td><a href="{{url('/list-courses/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Show Courses</a></td>  --}}
                                    {{--  <td><a href="{{url('/list-classes/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Show Classes</a></td>  --}}
                                    <td><a href="{{url('/teacher-update-form/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Update</a></td>
                                    <td><a href="{{url('/teacher-delete/'.$teacher->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>                            
                                </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- <div class="col-lg-6"></div>         -->
    </div>
@endsection
