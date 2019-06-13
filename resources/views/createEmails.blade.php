@extends('layouts.app')

@section('content')

    <form action="create-email" method="POST">
      {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Add Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <button type="submit" id="insert" class="btn btn-primary">Add</button>
        <a href="{{ url('show-emails') }}" type="button" class="btn btn-danger">Show Emails</a>

    </form>
  <br>
  <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Email already exists!</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
