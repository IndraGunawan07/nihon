<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

        {{-- bootstrap --}}
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />

        {{-- style --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>			
<body>
    <!-- header -->
    <header>	
        <div id="app"></div>
        <div class="container">
            <!-- nav -->
            <nav class="py-3">
                <div id="logo">
                    <h1> <a href="index.html" style="color: black">Nihonesia</a></h1>
                </div>
                <ul class="menu mt-lg-4">
                    <li class="mr-lg-4 mr-3 active"><a href="{{ url('/') }}">Home</a></li>
                    <li class="mr-lg-4 mr-3"><a href="{{ url('/#about') }}">About</a></li>
                    <li class="mr-lg-4 mr-3"><a href="{{ url('/#team') }}">Team</a></li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                     @else
                        <!-- Jika user role contribute maka ke page contribute -->
                        @if ( Auth::user()->role === "Contributor")
                            <li class="mr-lg-4 mr-3"><a href="{{ url('contribute') }}">Contribute</a></li>
                        <!-- Jika user role validator maka ke page validator -->
                        @elseif( Auth::user()->role === "Validator")
                            <li class="mr-lg-4 mr-3"><a href="">Validate</a></li>
                        @endif
                     <li class="nav-item dropdown">
                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{ Auth::user()->username }} <span class="caret"></span>
                         </a>
                         {{-- Profile user --}}
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                             <div class="header-nav"><p class="no-underline px-3 pt-2 pb-2 mb-n2 mt-n1 d-block">Signed in as 
                                 <strong class="css-truncate-target">{{ Auth::user()->username }}</strong></p>
                             </div>
                             <div role="none" class="dropdown-divider"></div>
                 
                             {{-- Edit Profile user  --}}
                             <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                 {{ __('Edit Profile') }}
                             </a>

                             {{-- Logout dropdown --}}
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                             
                             <form id="profile-form" action="{{ route('profile.edit') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                         </div>
                     </li>
                 @endguest
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->

    <main class="py-0">
        @yield('content')
    </main>
    </div>
</body>
</html>