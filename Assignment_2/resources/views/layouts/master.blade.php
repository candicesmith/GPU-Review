<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/wp.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-expand-md nav-colour navbar-dark navbar-fixed-top" id="header">

            <div class="collpase navbar-collapse" id="navbarSupportedContent">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collpase navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ml-auto"><h1></h1></div>
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Hi, {{ Auth::user()->name }}! ({{ Auth::user()->user_type }})</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <option class="nav-item dropdown dropdown-item logout-button">
                                    <span class="logout-button">
                                    <form class="logout-button" method="POST" action= "{{ url('/logout') }}">
                                        {{ csrf_field() }}
                                        <input class="logout-button" type="submit" value="Logout">
                                    </form>
                                    </span>
                                </option>
                            </div>
                        </li>
                    @else
                        <li class="nav-item active nav-text">
                            <div class="nav-link"><a href="{{ url('login') }}">Login</a></div>
                        </li>
                        <li class="nav-item active nav-text">
                            <div class="nav-link"><a href="{{ url('register') }}">Register</a></div>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-md-2 sidebar-colour filled-height">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a class="navbar-brand nav-title ml-2" href="{{ url('/') }}">GPU Review</a>
                    </li>
                    <li class="nav-item ml-2 mb-2 mt-4">
                        <a class="nav-link text-white sidebar-text" href="{{ url('/') }}">Home</a>
                    </li>
                    @auth
                        <li>
                            <a class="nav-link text-white ml-2 mb-2 sidebar-text" href="{{ url('follow') }}">Followed Reviewers</a>
                        </li>
                        <li>
                            <a class="nav-link text-white ml-2 mb-2 sidebar-text" href="{{ url('recommendation') }}">Recommended Reviewers</a>
                        </li>
                        @if(Auth::user()->user_type == "Moderator")
                            <li>
                                <a class="nav-link text-white ml-2 sidebar-text" href='{{ url("product/create") }}'>Create Product</a>
                            </li>
                        @endif
                    @endauth
                    <li>
                        <a class="nav-link text-white ml-2 mb-2 sidebar-text" href="{{ url('documentation') }}">Documentation</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="row" id="content">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </body>
</html>