<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    
    @yield('style')

    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">BusTicket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            @if(Auth::check() && Auth::user()->is_admin==1)
            <li class="nav-item">
            <a class="nav-link" href="{{url('/admin_dashboard/Buses')}}">Buses</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('/admin_dashboard/Routes')}}">Routes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('/admin_dashboard/Stops')}}">Stops</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('/admin_dashboard/Seats')}}">Seats</a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(!Auth::check())
                    <li><a class="dropdown-item" href="{{url('/users/register')}}">Register</a></li>
                    <li><a class="dropdown-item" href="{{url('/users/login')}}">Login</a></li>
                    @endif
                    @if(Auth::check())
                    <li><a class="dropdown-item" href="{{url('/users/logout')}}">Logout</a></li>
                    @endif
                </ul>
            </li>
            
        </ul>
        
        </div>
    </div>
</nav>
    
    
        @yield('content')
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('asset/js/jquery-3.4.1.slim.min.js')}}" ></script>
    <script src="{{asset('asset/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}" ></script>
</body>
</html>
