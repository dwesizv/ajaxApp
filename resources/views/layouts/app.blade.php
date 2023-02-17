<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <base href="{{ url('/') }}/">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>laravel - dwes - ajax</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url('') }}">yachts</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto" id="ajax-navbar">
                    @yield('navItems')
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <input type="search" name="q" id="q" value="{{ $q ?? '' }}">
                        <button id="btSearch">Search</button>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('modalContent')
        <main>
            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4">{{ $title ?? 'YachtApp' }}</h4>
                </div>
            </div>
            <div class="container">
                @yield('content')
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>
                &copy; IZV 2023
                <small style="color: whitesmoke;">php artisan route:list --except-vendor</small>
            </p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>