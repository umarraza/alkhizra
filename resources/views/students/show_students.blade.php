@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="container-fluid">
                <div class="col-lg-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Students</h3>
                            <a href="{{ url('/create-student-form/'.$id) }}" class="small-box-footer">Add Student<i class="fa fa-arrow-circle-right"></i></a> <br>
                            <a href="{{ url('/admin') }}" class="small-box-footer">Home<i class="fa fa-arrow-circle-right"></i></a>
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
                                    <th>Gender</th>
                                    <th>Grade</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @php $count=1; @endphp
                                @foreach($students as $student)
                                    <td><span>{{ $count }}</span></td>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->grade }}</td>
                                    <td>{{ $student->email }}
                                    <td><a href="{{url('/student-update-form/'.$student->id)}}" type="button" class="btn btn-primary btn-sm">Update</a></td>
                                    <td><a href="{{url('/student-delete/'.$student->id)}}" type="button" class="btn btn-primary btn-sm">Delete</a></td>                            
                                </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-lg-6"></div>        
    </div>
@endsection
