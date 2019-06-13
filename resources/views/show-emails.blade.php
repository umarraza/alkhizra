@extends('layouts.app')
@section('content')

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">All Emails</h3>
        <div class="pull-right button">
            <a href="{{ url('create-email-form') }}" type="button" class="btn btn-primary">Back</a>
            <a href="{{ url('type-message') }}" type="button" class="btn btn-primary">Send Email</a>
        </div>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Email:</th>
                    <th>Action:</th>
                </tr>
            </thead>

                  @php $count=1; @endphp
                  @foreach($emails as $value)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                      <a href="{{url('/delete-email/'.$value->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                    </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection