@extends('layouts.app')

@section('content')


<div class="container" style="width:80%;padding: 0 0 20px">
        <h1 style="color:#000"><b>Tests</b></h1>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div> 
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>No Tests Available</h1>
        </div>
    </div>
@endsection
