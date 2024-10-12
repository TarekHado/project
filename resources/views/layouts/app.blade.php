<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Adminlte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/home')}}" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">

        <span class="brand-text font-weight-light">&emsp;<b>Blood Bank</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li> <br>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Posts and Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('posts')}}" class="nav-link">
                  <i class="far fa-comment-alt nav-icon"></i>
                  <p>posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('category')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>categories</p>
                </a>
              </li>

            </ul>
          </li>
            <br>


          <li class="nav-item">
            <a href="{{url('governorates')}}" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>Governorates</p>
            </a>
          </li> <br>

          <li class="nav-item">
            <a href="{{url('cities')}}" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>Cities</p>
            </a>
          </li> <br>

            <li class="nav-item">
                <a class="nav-link" href="{{url('donation-requests')}}">
                    <i class="nav-icon fas fa-file-medical"></i>
                    <p>Donation Requests</p>
                </a>
            </li> <br>




            <li class="nav-item">
                <a href="../examples/forgot-password.html" class="nav-link">
                    <i class="fas fa-unlock nav-icon"></i>
                    <p>Forgot Password</p>
                </a>
            </li><br>

            <li class="nav-item">
                <a href="{{url('clients')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Clients</p>
                </a>
            </li> <br>

          <li class="nav-item">
            <a href="{{url('settings')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Settings</p>
            </a>
          </li> <br>

            <li class="nav-item">
                <a href="{{url('contact')}}" class="nav-link">
                    <i class="nav-icon far fa-paper-plane"></i>
                    <p>Contact us</p>
                </a>
            </li><br>

            <li class="nav-item">
                <a href="{{url('users')}}" class="nav-link">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>Users</p>
                </a>
            </li> <br>

            <li class="nav-item">
                <a href="{{url('roles')}}" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Roles</p>
                </a>
            </li> <br>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

   @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Adminlte/js/demo.js')}}"></script>
</body>
</html>
