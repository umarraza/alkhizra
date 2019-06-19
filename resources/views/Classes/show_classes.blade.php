@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Classes</h3>
                            <a href="{{ url('/admin') }}" class="small-box-footer">Home<i class="fa fa-arrow-circle-right"></i></a> <br>
                            <a href="{{ url('/add-class-form') }}" class="small-box-footer">Add Class<i class="fa fa-arrow-circle-right"></i></a> <br>
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
                                    <th>Date</th>
                                    <th>Time From</th>
                                    <th>Time To</th>
                                    <th>Description</th>
                                    <th>Teacher Description</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @php $count=1; @endphp
                                @foreach($classes as $class)
                                    <td><span>{{ $count }}</span></td>
                                    <td>{{ $class->title }}</td>
                                    <td>{{ $class->date }}</td>
                                    <td>{{ $class->time_from }}</td>
                                    <td>{{ $class->time_to }}</td>
                                    <td>{{ $class->description }}</td>
                                    <td>{{ $class->teacher_description }}</td>
                                    <td><a href="{{url('/class-update-form/'.$class->id)}}" type="button" class="btn btn-primary btn-sm">Update</a></td>
                                    <td><a href="{{url('/class-delete/'.$class->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>                            
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
