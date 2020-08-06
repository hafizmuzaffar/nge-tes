<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Dosen</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url('') ?>./assets2/assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo base_url('assets/') ?>/assets/css/ace-ie.min.css" />
      <![endif]-->

      <!-- inline styles related to this page -->

      <!-- ace settings handler -->
      <script src="<?php echo base_url('') ?>./assets2/assets/js/ace-extra.min.js"></script>
      <script src="<?php echo base_url('') ?>./assets2/assets/js/jquery-2.1.4.min.js"></script>
      <script src="<?php echo base_url('') ?>./assets2/assets/js/bootstrap.min.js"></script>


      <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo base_url('assets/') ?>/assets/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url('assets/') ?>/assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="no-skin">                                                                                                                  
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="index.html" class="navbar-brand">
                    <small>
                        <i class="fa fa-leaf"></i>
                        Dosen
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">



            </ul>
        </li>



       <!--  <li class="light-blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="<?php echo base_url('') ?>./assets2/assets/images/avatars/user.jpg" alt="Jason's Photo" />
                <span class="user-info">
                    <small>Welcome,</small>
                    <?php echo $this->session->userdata('username') ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>

                <li>
                    <a href="profile.html">
                        <i class="ace-icon fa fa-user"></i>
                        Profile
                    </a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-power-off"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul> -->
</div>
</div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <ul class="nav nav-list">
            <li class="">
                <a href="<?php echo base_url('dosen/index') ?>">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="<?php echo base_url('dosen/input_nilai') ?>">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Input Nilai
                    </span>

                </a></li>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="<?php echo base_url('dosen/data_nilai') ?>" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Data Nilai </span>

                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo base_url('dosen/form_laporan') ?>" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Laporan Nilai </span>

                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo base_url('dosen/data_kelas') ?>" >
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Data Kelas </span>

                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo base_url('login/logout') ?>" >
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Logout </span>

                </a>

                <b class="arrow"></b>
            </li>



        </ul>
    </div>
    <div class="main-content">
        <div class="main-content-inner">













<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nilai Kuliah-Dosen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/louie') ?>/css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"></span><?php echo $this->session->userdata('username') ?></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                    <li><a href="<?php echo base_url('dosen/input_nilai') ?>">Input Nilai</a></li>
                    <li><a href="<?php echo base_url('dosen/data_nilai') ?>">Data Nilai</a></li>
					<li><a href="<?php echo base_url('dosen/data_kelas') ?>">Data Kelas</a></li>
					<li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    <li><a href="<?php echo base_url('assets/louie') ?>/blog.html">Blog</a></li> -->
                    <!-- <li><a href="<?php echo base_url('assets/louie') ?>/contact.html">Contact</a></li> --> 
<!-- 				</ul>
			</nav>
<td><Td><td>
			
		</aside> -->