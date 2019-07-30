@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="heading-pannel">
                    <h1><b>Students</b></h1>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        <button type="button" class="btn btn-success pull-right">Add Student</button>
                    </form>
                </div> <br>

                <div class="row">

                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div> 
                <br>
                <div class="row">

                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card" style="width: 18rem; border:1px solid #DEDEDE; border-radius: 5px; padding:5px">
                            <img src="{{url('/public/images/pic1.jpg')}}" class="rounded" alt="Image"/ width="50px" height="50px" style="border-radius: 50%;">
                            <h5 class="card-title" style="display: inline-block; color:#000; font-size:20px; font-weight:bold" >Card Title</h5>
                            <h5>Web Technology</h5>
                            <h5>03034969407</h5>
                            <h5>umarraza2200@gmail.com</h5>
                            <hr style=" border-top: 1px solid #DEDEDE;">
                            <div class="btn-group btn-group-xs pull-center" style="margin-left: 30px">
                                <button type="button" class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default">Delete</button>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection
