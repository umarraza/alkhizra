<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Stylesheet Links --}}
    <link rel="stylesheet" href="{{ asset('/public/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/public/css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Javascript Links --}}

    <script src="{{ asset('/public/js/app.js') }}"></script>
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('/public/js/alkhizra.js')}}"></script>
    <script src="https://kit.fontawesome.com/7917da7459.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}" style="color:#38ADA9; font-weight:900;font-size:30px">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                    
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown" style="position:absolute; right:0; margin-right:30px">
                                    <a href="{{ url('') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                @if (Auth::User()->roleId == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('list-teachers') }}">Teacher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-courses') }}">Course</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-students') }}">Student</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-classes') }}">Class</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-conferenece') }}">Conference</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-admin-tests') }}">Test</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('admin') }}">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('get-autorization-code') }}">Zoom API</a>
                                    </li>
                                @endif
                                @if (Auth::User()->roleId == 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('teacher-classes') }}">Class</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('teacher-courses') }}">Course</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('show-tests') }}">Test</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('teacher-conferences') }}">Conference</a>
                                    </li>
                                    <li class="nav-item pull-right">
                                        <a class="nav-link" href="{{ url('admin') }}">Profile</a>
                                    </li>
                                @endif
                                @if (Auth::User()->roleId == 3)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('student-classes') }}">Classes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('student-confrences') }}">Confreneces</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('student-courses') }}">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('student-tests') }}">Tests</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('admin') }}">Profile</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            </div>
            @yield('content')

        </div>
    </div>
    <!-- Scripts -->
    
    
</body>
</html>
