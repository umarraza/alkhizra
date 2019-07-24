<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('/public/css/home.css') }}" rel="stylesheet" type="text/css" >
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <title>Font Awesome Icons</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
        <style>
        body, html {
    height: 100%;
    margin: 0;
  }
  
  .bg {
    /* The image used */
    background-image: url("resources/views/laptop.jpg");
  
    /* Full height */
    width: 100%; 
    height:75%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
   
  .bg1 {
    /* The image used */
    background-image: url("resources/views/boy.jpg");
  
    /* Full height */
    width: 100%; 
    height:75%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
.container1 {
  position: relative;
  width: 180px;
  max-width: 400px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  border-radius:50%;
  background-color: green;
}

.container1:hover .overlay {
  opacity: 1;
}

.icon {
  color: white;
  font-size: 100px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-user:hover {
  color: #eee;
}
        </style>
    </head>
    
<body style="font-family: 'Poppins'; color: #38ADA9">
  <nav class="nav lighten-4 py-4" style="background-color: white">
    <div class="row" style="min-width: 100%; height: 110px; padding-top: 28px; padding-right: 140px; padding-left: 140px;">
      <div class="row ">
        <label style="font-size: 35px; font-family: 'Poppins';margin-bottom: 0px; font-weight: bold;">Al-Khizra</label>
      </div>
      <div class="row" style="margin-left: auto; font-size: 14px; font-weight: 500">
        <a class="nav-link active" href="#"  style="text-transform: inherit;padding-top: 25px;">Home</a>
        <a class="nav-link" href="#"  style="text-transform: inherit;padding-top: 25px;">About Us</a>
        <a class="nav-link" href="#"  style="text-transform: inherit;padding-top: 25px;">Service</a>
        <a class="nav-link" href="#"  style="text-transform: inherit;padding-top: 25px;">Contact</a>
        <a href="{{ route('login') }}" style="width: 150px; height:45px; margin-top:15px; border-radius: 30px;color: white; background-color:#38ADA9">Login</a>
        {{-- <button type="button"  style="width: 190px; height:60px; border-radius: 30px;color: white; background-color:#38ADA9">Sign In</button> --}}
      </div>
    </div>
  </nav>
  <div class="bg" >
 
 </div>
 <div class="container" style="min-width:100%; text-align: -webkit-center; margin-top:105px; padding-left:140px; padding-right:140px">
 <h1 style="text-align: -webkit-center; margin-bottom:100px" >Why Choose Us</h1>
 <div class="row" style="margin:10px">
 <div class="col-4" style="text-align: -webkit-center;">
    <button disabled style="width: 150PX; height:150px; border-radius: 50%;color: white; background-color:#38ADA9"><i style="font-size: 41px;" class="glyphicon glyphicon-time"></i></button>
    <h3 style="margin-top:50px">Different Class Timings</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>

 </div>
 <div class="col-4" style="text-align: -webkit-center;">
    <button disabled style="width: 150PX; height:150px; border-radius: 50%;color: white; background-color:#38ADA9"><i style="font-size: 41px;" class="glyphicon glyphicon-calendar"></i></button>
    <h3 style="margin-top:50px">Easy To Join</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
 </div>
 <div class="col-4" style="text-align: -webkit-center;">
    <button disabled style="width: 150PX; height:150px; border-radius: 50%;color: white; background-color:#38ADA9"><i style="font-size: 41px;" class="	glyphicon glyphicon-user"></i></button>
    <h3 style="margin-top:50px">Easy Access</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
 </div>
 
 
 </div> 
 </div>


 <div class="container" style="background-color:#FAFAFA; min-width:100%; text-align: -webkit-center; margin-top:105px; padding-left:140px; padding-right:140px">
 <h1 style="text-align: -webkit-center;margin-top:120px; margin-bottom:20px">Our Services</h1>
 <div class="row" style="margin:10px">
 <div class="col-3" style="text-align: -webkit-center;">
     <h3>Virtual Classrooms</h3>
     <img src="{{ URL::to('resources/views/4.jpg') }}" height="190px" width="270px">
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>

 </div>
 <div class="col-3" style="text-align: -webkit-center;">
      <h3>Virtual Conference Room</h3>
      <img src="{{ URL::to('resources/views/3.jpg') }}" height="190px" width="270px">
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
 </div>
 <div class="col-3" style="text-align: -webkit-center;">
    <h3>Online Tests</h3>
    <img src="{{ URL::to('resources/views/1.jpg') }}" height="190px" width="270px">
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
 </div>
 <div class="col-3" style="text-align: -webkit-center;">
    <h3>Online Courses</h3>
    <img src="{{ URL::to('resources/views/2.jpg') }}" height="190px" width="270px">
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h5>
 </div>
 
 </div> 
 <button type="button"  style="width: 190px; height:50px; border-radius: 30px;color: white; background-color:#38ADA9;text-align: -webkit-center;margin-top:80px; margin-bottom:20px">Sign In</button>

 </div>



 <div class="container" style="min-width:100%; padding-bottom: 70px; padding-left:140px; padding-right:140px">
 <div class="row" style="margin:10px">
 <div class="col-6" style="text-align: -webkit-right;">
     <img src="{{ URL::to('resources/views/5.jpg') }}" height="760px" width="550px">
    
 </div>
 <div class="col-6">

      <h5 style="padding-top:70px; color:#7C7C7C"><i>Best Learning Management System</i></h5>
      <h2>About Company</h2>
    <h6 style="color:#7C7C7C">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h6>
    <br>
    <br>
    <div class="row">
    <div class="col-2" style="text-align: -webkit-center;">
    <img src="{{ URL::to('resources/views/6.jpg') }}" height="65px" width="auto">
    </div>
    <div class="col-10">
    <h3>We Know the Area</h3>
    <h6 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h6>
   
    </div>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-2" style="text-align: -webkit-center;">
    <img src="{{ URL::to('resources/views/7.jpg') }}" height="65px" width="auto">
    </div>
    <div class="col-10">
    <h3>Quality never compromised</h3>
    <h6 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h6>
   
    </div>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-2" style="text-align: -webkit-center;">
    <img src="{{ URL::to('resources/views/8.jpg') }}" height="65px" width="auto" style="">
    </div>
    <div class="col-10">
    <h3>Highly-Trained Instructors</h3>
    <h6 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h6>
   
    </div>
    </div>



    <button type="button"  style="width: 190px; height:50px; border-radius: 30px;color: white; background-color:#38ADA9;text-align: -webkit-center;margin-top:80px; margin-bottom:20px">More Info</button>

 
 </div>

 
 </div> 
 
 </div>

 <div class="container" style="min-height:260px; margin-top: 110px;   min-width:100%;background-color:#38ADA9; padding-bottom: 70px; padding-left:140px; padding-right:140px">
 <div class="row justify-content-center">
 <h1 style="color:white;line-height: 25px;margin-top: 110px;font-weight: 300;">Join now, the best learning management system </h1>
 <button type="button"  style="margin-top: 100px; margin-left: 20px;width: 190px; height:50px; border-radius: 30px; background-color:white;color:#38ADA9;text-align: -webkit-center">Sign In</button>
 </div>
  
</div>
<div class="container" style="min-width:100%; text-align: -webkit-center; margin-top:105px; padding-left:140px; padding-right:140px">
 <h1 style="text-align: -webkit-center; margin-bottom:100px" >Meet Our Team</h1>
 <div class="row" style="margin:10px">
 <div class="col-4" style="text-align: -webkit-center;">
 <img  src="{{ URL::to('resources/views/image.jpg') }}" style="border-radius:50%" alt="Avatar">  <h3 style="margin-top:30px">Name</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Designation</h5>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-facebook"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-instagram"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-linkedin"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-twitter"></i>

 </div>
 <div class="col-4" style="text-align: -webkit-center;">
 <img  src="{{ URL::to('resources/views/image.jpg') }}" style="border-radius:50%" alt="Avatar">    <h3 style="margin-top:30px">Name</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Designation</h5>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-facebook"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-instagram"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-linkedin"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-twitter"></i>
 </div>
 <div class="col-4" style="text-align: -webkit-center;">
 <img  src="{{ URL::to('resources/views/image.jpg') }}" style="border-radius:50%" alt="Avatar">    <h3 style="margin-top:30px">Name</h3>
    <h5 style="color:#7C7C7C;line-height: 25px;font-weight: 300;">Designation</h5>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-facebook"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-instagram"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-linkedin"></i>
    <i style="font-size: 16px; color:#7C7C7C" class="fa fa-twitter"></i>
 </div>
 
 
 </div> 
 </div>

 <div class="container" style="background-color:#FAFAFA; min-width:100%; text-align: -webkit-center; padding-bottom:100px;margin-top:105px; padding-left:140px; padding-right:140px">
 <h1 style="text-align: -webkit-center; margin-top:105px; margin-bottom:100px">Testimonials</h1> 
 <div class="container1">
  <img src="{{ URL::to('resources/views/image.jpg') }}" style="border-radius:50%" alt="Avatar" class="image">
  <div class="overlay">
    <a href="#" class="icon" title="User Profile">
      <i class="fa fa-quote-left" style="color:white"></i> 
    </a>
  </div>
</div>
<h4 style="color:#7C7C7C;font-weight: 300;margin-top:25px; max-width:900px"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</i></h4>
<h4 style="background-color:#38ADA9;color:white;font-weight: 300;margin-top:25px; max-width:fit-content;padding:8px"><i>John Doe, CEO Founder, Company</i></h4>
</div>

<div class="bg1" >
 
 </div>
</body>
    <!-- <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Alkhizra
                </div>
            </div>
        </div>
    </body> -->
</html>