<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nilai Kuliah</title>


  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets4/backend/images/logo_icon_dark.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url();?>assets4/web/backend/images/logo_icon_dark.png" type="image/x-icon">

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets4/backend/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets4/backend/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets4/backend/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets4/backend/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets4/backend/css/colors.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/loaders/blockui.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/clock.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/visualization/d3/d3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/visualization/d3/d3_tooltip.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/ui/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/pickers/daterangepicker.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/ui/nicescroll.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/ui/drilldown.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/core/app.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>assets4/backend/js/plugins/ui/ripple.min.js"></script>
  <!-- /theme JS files -->

</head>
<body onLoad="goforit();" class="layout-boxed navbar-top">

  <!-- Main navbar -->
  <div class="navbar navbar-inverse bg-indigo navbar-fixed-top">
    <div class="navbar-header">
     
    
<?php $title='Super' ?>
      <ul class="nav navbar-nav visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
      <ul class="nav navbar-nav">
              
        <li class="<?php if ($title == 'Super')
        {
          
          }
        ?>">
          <a href="<?php echo base_url('super/index');?>">
            <i class="icon-credit-card"></i> Jadwal Kuliah
          </a>
        </li>

        <li class="<?php if ($title == 'Data User')
        {
          echo 'active';
          }
        ?>">
          <a href="<?php echo base_url();?>super/data_user">
            <i class="icon-people"></i> Data User
          </a>

        </li>

                <li class="<?php if ($title == 'Data Mahasiswa')
        {
          echo 'active';
          }
        ?>">
          <a href="<?php echo base_url('');?>super/data_mahasiswa">
            <i class="icon-people"></i> Data Mahasiswa
          </a>

        </li>
         <li class="<?php if ($title == 'Data Mahasiswa')
        {
          echo 'active';
          }
            if($title == 'Tambah Data Mahasiswa')
            {
              echo 'active';
              }

              
              if($title == 'Edit Data Mahasiswa')
            {
              echo 'active';
              }

        ?>">
         <a href="<?php echo base_url();?>super/data_dosen">
            <i class="icon-people"></i> Data Dosen
          </a>

        </li>
         <li>
         <a href="<?php echo base_url();?>super/data_kelas">
            <i class="icon-people"></i> Data Kelas
          </a>

        </li>
         <li class="<?php if ($title == 'Data Dosen')
        {
          echo 'active';
          }
            if($title == 'Tambah Data Dosen')
            {
              echo 'active';
              }

              
              if($title == 'Edit Data Dosen')
            {
              echo 'active';
              }
              
        ?>">
         <a href="<?php echo base_url();?>super/data_matkul">
            <i class="icon-credit-card"></i> Data Mata Kuliah
          </a>
        </li>
                <li class="<?php if ($title == 'Data Matkul')
        {
          echo 'active';
          }
        ?>">

         <li class="<?php if ($title == 'Data Nilai')
        {
          echo 'active';
          }
        ?>">
          <a href="<?php echo base_url();?>super/data_nilai">
            <i class="icon-people"></i> Data Nilai
          </a>

        </li>

         <li class="<?php if ($title == 'Data Nilai')
        {
          echo 'active';
          }
        ?>">
          <a href="<?php echo base_url();?>super/tahun_akademik">
            <i class="icon-people"></i> Tahun Akademik
          </a>

        </li>
      
    
      </ul>

      <ul class="nav navbar-nav navbar-right">
          

            
        <li class="dropdown dropdown-user">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url();?>assets4/backend/images/dokter.png" alt="">
            <span><?php echo $this->session->userdata('nama_dokter');?></span>
            <i class="caret"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url (''); ?>"><?php echo $this->session->userdata('nama'); ?></a></li>
            <li><a href="<?php echo base_url();?>login/logout"><i class="icon-switch2"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->