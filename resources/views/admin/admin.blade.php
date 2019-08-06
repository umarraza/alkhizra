@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>

@if (Auth::User()->roleId == 1)
<div class="container">
<div class="row">
   <div class="col-lg-12 text-center">
      @if (isset($image->imageName))
         <img src="{{url('/public/images/'.$image->imageName)}}" class="rounded img-style" alt="Image"/ width="250px" height="250px">
      @else
         <img src="{{url('/public/images/default.jpg')}}" class="rounded img-style" alt="Image"/ width="250px" height="250px">
      @endif
        <br>
         <div class="row">
            <br>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
               @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
                  </div>
                  <img src="images/{{ Session::get('image') }}">
                  @endif
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                     <strong>Whoops!</strong> There were some problems with your input.
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif
            </div>
            <div class="col-lg-4"></div>
         </div>
      <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
               <div class="col-md-12 text-center">
                  <input type="file" name="image" class=" image-upload"><br>
                  <input type="hidden" name="admin_id" value="1" class="image-upload">
                  <button type="submit" class="btn btn-sm update-btn">Upload</button>
               </div>
            </div>
      </form>
   </div> {{-- END COL 12 --}}
</div> {{-- END ROW --}}
   <br>
   <br>
   <div class="row">
      <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <form>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" name="first_name" id="exampleFormControlInput1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="email" class="form-control" name="last_name" id="exampleFormControlInput1">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Old Password</label>
                  <input type="password" class="form-control" name="oldPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">New Password</label>
                  <input type="password" class="form-control" name="newPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Confirm New Password</label>
                  <input type="password" class="form-control" name="confirmPassword" id="exampleFormControlInput1">
               </div>
               <div class="row">
                  <div class="col-lg-12 text-center">
                     <button class="btn btn btn-sm update-btn">Update</button>
                  </div>
               </div>
            </form>
         </div>
      <div class="col-lg-3"></div>
   </div>
</div>
@endif


{{-- Teacher Profile --}}

@if (Auth::User()->roleId == 2)
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <h1>{{Auth::User()->first_name. ' ' .Auth::User()->last_name}}</h1>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12 text-center">
         @if (isset($image->imageName))
            <img src="{{url('/public/images/'.$image->imageName)}}" class="rounded img-style" alt="Image"/ width="250px" height="250px" id="upload-image">
         @else
            <img src="{{url('/public/images/default.jpg')}}" class="rounded img-style" alt="Image"/ width="250px" height="250px" id="image-upload">
         @endif
         <br>
            <div class="row">
               <br>
               <div class="col-lg-4"></div>
               <div class="col-lg-4">
                  @if ($message = Session::get('success'))
                     <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                     </div>
                     <img src="images/{{ Session::get('image') }}">
                     @endif
                     @if (count($errors) > 0)
                     <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif
               </div>
               <div class="col-lg-4"></div>
            </div>
        
         <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
               <div class="col-md-12 text-center">
                  <br>
                  <input type="file" name="image" class="image-upload" id="image-trigger"><br>
                  <input type="hidden" name="teacher_id" value="{{Auth::User()->teacher->id}}" class="image-upload">
                  <button type="submit" class="btn btn-sm update-btn">Upload</button>
               </div>
            </div>
         </form>

      </div> {{-- END COL 12 --}}
   </div> {{-- END ROW --}}
   
   <br>
   <br>
   <div class="row">
      <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <form>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" name="first_name" id="exampleFormControlInput1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="email" class="form-control" name="last_name" id="exampleFormControlInput1">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Old Password</label>
                  <input type="password" class="form-control" name="oldPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">New Password</label>
                  <input type="password" class="form-control" name="newPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Confirm New Password</label>
                  <input type="password" class="form-control" name="confirmPassword" id="exampleFormControlInput1">
               </div>
               <div class="row">
                  <div class="col-lg-12 text-center">
                     <button class="btn btn btn-sm update-btn">Update</button>
                  </div>
               </div>
            </form>
         </div>
      <div class="col-lg-3"></div>
   </div>
</div>
@endif


{{-- Student Profile --}}

@if (Auth::User()->roleId == 3)
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <h1>{{Auth::User()->name}}</h1>
      </div>
</div>
<div class="row">
   <div class="col-lg-12 text-center">
      @if (isset($image->imageName))
         <img src="{{url('/public/images/'.$image->imageName)}}" class="rounded img-style" alt="Image"/ width="250px" height="250px">
      @else
         <img src="{{url('/public/images/default.jpg')}}" class="rounded img-style" alt="Image"/ width="250px" height="250px">
      @endif
      <br>
         <div class="row">
            <br>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
               @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
                  </div>
                  <img src="images/{{ Session::get('image') }}">
                  @endif
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                     <strong>Whoops!</strong> There were some problems with your input.
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif
            </div>
            <div class="col-lg-4"></div>
         </div>
      
      <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
               <div class="col-md-12 text-center">
                  <input type="file" name="image" class=" image-upload"><br>
                  <input type="hidden" name="student_id" value="{{Auth::User()->student->id}}" class="image-upload">
                  <button type="submit" class="btn btn-sm update-btn">Upload</button>
               </div>
            </div>
      </form>

   </div> {{-- END COL 12 --}}
</div> {{-- END ROW --}}

   <br>
   <br>
   <div class="row">
      <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <form>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" name="first_name" id="exampleFormControlInput1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="email" class="form-control" name="last_name" id="exampleFormControlInput1">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Old Password</label>
                  <input type="password" class="form-control" name="oldPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">New Password</label>
                  <input type="password" class="form-control" name="newPassword" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Confirm New Password</label>
                  <input type="password" class="form-control" name="confirmPassword" id="exampleFormControlInput1">
               </div>
               <div class="row">
                  <div class="col-lg-12 text-center">
                     <button class="btn btn btn-sm update-btn">Update</button>
                  </div>
               </div>
            </form>
         </div>
      <div class="col-lg-3"></div>
   </div>
</div>
@endif


@endsection
