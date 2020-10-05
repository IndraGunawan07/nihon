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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
            <a href="{{ route('admin.index') }}" class="nav-link">Home</a>
        </li>
        </ul>

        <!-- SEARCH FORM -->
        {{-- <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
                </button>
            </div>
            </div>
        </form> --}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    <a href="{{ route('admin.index') }}"class="nav-link">
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
                <a href="{{ route('showusers') }}" class="nav-link">
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
                <a href="{{ route('content.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-lock"></i>
                <p>
                    Content 
                </p>
                </a>
            </li>
            <!-- //Users sidebar -->

                <li class="nav-header">Data</li>
                <li class="nav-item">
                    <a href="{{ url('/donation') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Donation</p>
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

    <script>
    new Vue({
        el: '#toggle',
        data: {
            contributor: true,
            validator: false
        },
        methods: {
            isContributor: function(){
                this.contributor = true,
                this.validator = false
            },
            isValidator: function(){
                this.contributor = false,
                this.validator = true
            }
        }
    })
    </script>
    
    <script>
        $('#myEdit').on('show.bs.modal', function(event){
            console.log('modal opened')
            var button = $(event.relatedTarget)
            var username = button.data('myusername')
            var password = button.data('mypassword')
            var question = button.data('question')
            var answer = button.data('answer')
            console.log(question)
            var modal = $(this)
            modal.find('.modal-body #username').val(username)
            modal.find('.modal-body #hiddenUsername').val(username)
            modal.find('.modal-body #secret_question').val(question)
            modal.find('.modal-body #secret_answer').val(answer)
        })
        $('#editModal').on('show.bs.modal', function(event){
            console.log('modal opened')
            var button = $(event.relatedTarget)
            var jws = button.data('jws')
            var rws = button.data('rws')
            var bahasa_translation = button.data('translate')
            var filename = button.data('filename')
            var idterms = button.data('id')
            console.log(idterms)
            var modal = $(this)
            modal.find('.modal-body #jws').val(jws)
            modal.find('.modal-body #rws').val(rws)
            modal.find('.modal-body #bahasa_translation').val(bahasa_translation)
            modal.find('.modal-body #hiddenid').val(idterms)
            modal.find('.modal-body #uploadfile').val(filename)
        })
    </script>
</body>
</html>