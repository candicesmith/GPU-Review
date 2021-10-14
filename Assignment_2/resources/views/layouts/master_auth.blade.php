<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

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
                <ul class="navbar-nav ml-auto">
                    @yield('page')
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