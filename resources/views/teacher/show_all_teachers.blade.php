@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Teachers</h3>
                        {{--  <button type="submit" class="btn btn-primary btn-sm">Add Teacher</button>  --}}
                        <a href="{{ url('/create-teacher-form') }}" class="small-box-footer">Add Teacher<i class="fa fa-arrow-circle-right"></i></a>

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
                                <th>Teacher Name</th>
                                <th>About Teacher</th>
                                <th>Email</th>
                                <th>Update Teacher</th>
                                <th>Delete Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @php $count=1; @endphp
                            @foreach($teachers as $teacher)
                                <td><span>{{ $count }}</span></td>
                                <td>{{ $teacher->teacherName }}</td>
                                <td>{{ $teacher->description }}</td>
                                <td>{{ $teacher->email }}
                                <td><a href="{{url('/teacher-update-form/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Update</a></td>
                                <td><a href="{{url('/teacher-delete/'.$teacher->id)}}" type="button" class="btn btn-primary btn-sm">Delete</a></td>                            
                            </tr>
                            @php $count++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="col-lg-4"></div>        
    </div>
@endsection
