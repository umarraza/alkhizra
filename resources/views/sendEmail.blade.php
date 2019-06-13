@extends('layouts.app')

@section('content')
    
  <form action="send-mail" method="POST">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Type your message</label>
    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" >Send</button>
  <a href="{{ url('show-emails') }}" type="button" class="btn btn-danger">Back</a>


</form>
@endsection
