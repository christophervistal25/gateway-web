<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="https://res.cloudinary.com/dpcxcsdiw/image/upload/v1585791186/gateway/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">

    <style>
    body {
         font-family: 'Montserrat', sans-serif; 
         overflow-x: hidden;
    }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('page-css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background :#303F9F">
          <a class="navbar-brand " href="/">
              <img width="25px" src="https://res.cloudinary.com/dpcxcsdiw/image/upload/v1585793026/gateway/nav_brand_logo.png" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Documentation</a>
              </li>
              
            </ul>
            @guest
            <ul class="navbar-nav pull-right">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Sign In</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">Sign Up</a>
                </li>
            </ul>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
          </div>
        </nav>

        <main class="py-4 mt-5">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
