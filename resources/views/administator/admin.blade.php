<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Theme js -->
   <script src="{{ asset('js/admin.js') }}" defer></script>

   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
   
   <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('js/responsive.bootstrap4.min.js') }}" defer></script>
  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- OverlayScrollbar -->
  <script src="{{ asset('js/OverlayScrollbars.js') }}" defer></script>
  <link type="text/css" href="{{ asset('css/OverlayScrollbars.css') }}" rel="stylesheet"/>

 
  
  <!-- bootstrap -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />

  <script src="https://cdn.jsdelivr.net/npm/vue"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app"></div>
    <div class="wrapper" id="toggle">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
                </button>
            </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    {{-- Logout dropdown --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- //Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand -->
        <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Nihonesia</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="#" class="d-block">
                <i class="nav-icon fas fa-user"></i> {{ Auth::user()->username }}
            </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data
                        <span class="right badge badge-danger">New</span>
                    </p>
                    </a>
                </li>

            <!-- Users sidebar -->
            <li class="nav-header">System Setup</li>
            <li class="nav-item">
                <a href=" {{ url('/admin') }}" class="nav-link">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                    Users
                </p>
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/syllable') }}"  class="nav-link">
                <i class="nav-icon fas fa-folder-plus"></i>
                <p>
                     Syllable
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-lock"></i>
                <p>
                    Content 
                </p>
                </a>
            </li>
            <!-- //Users sidebar -->

                <li class="nav-header">Another menu?</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- //.Sidebar-menu -->
        </div>
        <!-- //.Sidebar -->
    </aside>
    <!-- //Main Sidebar Container -->

    <main class="py-0">
        @yield('content')
    </main>
    </div>
</body>
</html>