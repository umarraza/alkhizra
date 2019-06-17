@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">My Courses</h3>
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
                                    <th>Course Name</th>
                                    <th>Description</th>
                                    <th>About Instructor</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @php $count=1; @endphp
                                @foreach($courses as $course)
                                    <td><span>{{ $count }}</span></td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>{{ $course->about_instructor }}</td>
                                    <td>{{ $course->category }}</td>
                                    <td>{{ $course->type }}
                                </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-lg-10"></div>        
    </div>
@endsection
