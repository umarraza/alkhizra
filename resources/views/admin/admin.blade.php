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
      <div class="col-lg-12">
         <h1>{{Auth::User()->name}}</h1>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12 text-center">
         <img src="{{url('/public/images/pic1.jpg')}}" class="rounded img-style" alt="Image"/ width="160px" height="160px">
      </div>
   </div>
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
                     <button class="btn btn btn-lg update-btn">Update</button>
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
         <h1>{{Auth::User()->name}}</h1>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12 text-center">
         <img src="{{url('/public/images/pic1.jpg')}}" class="rounded img-style" alt="Image"/ width="160px" height="160px">
         {{-- <input type="file" name="image" class="form-control image-input text-center"> --}}
      </div>
   </div>
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
                     <button class="btn btn btn-lg update-btn">Update</button>
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
         <img src="{{url('/public/images/pic1.jpg')}}" class="rounded img-style" alt="Image"/ width="160px" height="160px">
      </div>
   </div>
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
                     <button class="btn btn btn-lg update-btn">Update</button>
                  </div>
               </div>
            </form>
         </div>
      <div class="col-lg-3"></div>
   </div>
</div>
@endif


@endsection
