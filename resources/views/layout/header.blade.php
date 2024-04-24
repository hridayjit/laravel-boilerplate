@php
  $project_logo = 'assets/'. session('software')->project_logo;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{session('software')->project_name}}</title>
  
<!--------------------------------from software boilerplate--------------------------------------------------------------------------------------------->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <!--<link rel="stylesheet" href="dist/css/skins/_all-skins.css">-->
  <!-- iCheck -->
  <!--<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">-->
  <!-- Morris chart -->
  <!--<link rel="stylesheet" href="plugins/morris/morris.css">-->
  <!-- jvectormap -->
  <!--<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
  <!-- Date Picker -->
  <!--<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">-->
  <!-- Daterange picker -->
  <!--<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">-->
  <!--<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">-->
  <!-- bootstrap wysihtml5 - text editor -->
  <!--<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
  
  <!--<link rel="stylesheet" href="plugins/datatables/jquery.dataTables.min.css">-->

  <!----------------------------------------------------------------------------------------------------->
  
  <!--<link rel="stylesheet" href="css/dataTables.tableTools.min.css">-->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/jquery-ui/jquery-ui.min.css') }}">
  <!--<link rel="stylesheet" href="adminlte-3.2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">-->
  
  <!--<link rel="stylesheet" href="css/dataTables.reset.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">-->
  <!--<link rel="stylesheet" href="css/bootstrap-select.min.css">-->
  <!--<link rel="stylesheet" href="css/bootstrap-multiselect.css">-->
  <!--<link rel="stylesheet" href="css/editor_wysiwyg.css">-->
  <!--<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
  <!--<link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/toast.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">-->
  

  <!----------------------------from Adminlte-3.2------------------------------------------------------------------------>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!--Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <!--<link rel="stylesheet" href="adminlte-3.2/dist/css/adminlte.min.css">-->
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/jqvmap/jqvmap.min.css') }}">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
   <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-----fixedheader---->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <!--<link rel="stylesheet" href="adminlte-3.2/plugins/dropzone/min/dropzone.min.css">-->
  <!--font awesome cdn-->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">





  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="adminlte-3.2/plugins/fontawesome-free/css/all.min.css">-->
  <link rel="stylesheet" href="{{ asset('assets/fontawesome6.1.2/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/dropzone/min/dropzone.min.css') }}">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/dist/css/adminlte.css') }}">
'
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2/plugins/toastr/toastr.min.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <style>
    .loader{
      display: block;
      /*position: sticky;*/
      height: 12px;
      width: 50%;
      border: transparent;
      border-radius: 10px;
      overflow: hidden;
      z-index: 50;
    }
    .loader::after {
      content: '';
      width: 50%;
      height: 100%;
      background: #FF3D00;
      position: absolute;
      top: 0;
      left: 0;
      box-sizing: border-box;
      animation: animloader 2s linear infinite;
    }
    
    @keyframes animloader {
      0% {
        left: 0;
        transform: translateX(-100%);
      }
      100% {
        left: 100%;
        transform: translateX(0%);
      }
    }
    
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  
  <div class="wrapper">
    <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>
    
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>-->
      
    </ul>
    <div id="loader-div" style="justify-content: center; align-items: center; width: 70%; margin-left: auto; margin-right: auto; display: flex; display: none;">
      <div style="position: fixed; display: flex; justify-content: space-between; align-items: center;">
        <div>Updating...</div>
        <div><div class="loader"></div></div>
      </div>
      <!--<div style="position: fixed; display: flex; width: 20%; margin-left: 40%; margin-right: auto; justify-content: center; align-items: center;" id="loader-div">
          <div class="loader"></div>
      </div>
      <div >
        <p>Updating...</p>
      </div>-->
    </div>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block ">
        <a href="{{route('logout')}}" class="nav-link">Log Out</a>
      </li>
      <!-- Navbar Search -->
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{ asset($project_logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{session('software')->project_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/profile_image.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ session('user_name') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open-->
            
            <li class="nav-item" id="nav-item-one">
              <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item" id="nav-open-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-cog"></i>
                <p>
                  Manager
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" id="nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('user')}}" class="nav-link">
                    <i class="fa-solid fa-user nav-icon"></i>
                    <p>User Manager</p>
                  </a>
                </li>
                @if(session('role')==1)
                <li class="nav-item">
                  <a href="{{route('software')}}" class="nav-link">
                    <i class="fa-solid fa-user nav-icon"></i>
                    <p>Software Manager</p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
           

            <li class="nav-item" id="logout-btn" style="display: var(--logout-display);">
              <a href="{{route('logout')}}" class="nav-link" id="nav-link">
                <i class="nav-icon fa-solid fa-power-off"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style>
      :root { --logout-display: none; }
  
      @media (max-width: 600px) {
          :root { --logout-display: block; }
      }
  </style>

    
