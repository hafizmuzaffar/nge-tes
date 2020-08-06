<?php $this->load->view('super/include/header') ?>


<!-- Page container -->
<div class="page-container">

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-default">
        <div class="page-header-content">
          <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> Dashboard Admin</h4>
          </div>

          <div class="heading-elements">
            <img src="<?php echo base_url();?>assets4/backend/images/polpos.png" alt="" width=75px height=75px>
          </div>
        </div>
        <br>

        <div class="breadcrumb-line">
          <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ul>

          <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-calendar2 position-left"></i> <span id="clock"></span></a></li>


          </ul>
        </div>
      </div>
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('username');?></b>, Anda login sebagai Super Administrator</h6>
                            <hr>
          <div class="heading-elements">

          </div>
        </div>
        <div class="container">
          <a href="<?php echo base_url('admin/tambah_mahasiswa') ?>" class="btn btn-primary">Tambah Mahasiswa</a>
          <br><br>
          <center> 
           <table class='table table-bordered table-striped' id='mytable'>
            <thead>
              <tr>
                <th>NPM</th>
                <th>NAMA MAHASISWA</th>
                <th>PRODI</th>
                <th>JENJANG</th>
                <th>KELAS</th>
                <th>TAHUN</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mhs as $key): ?>
              <tr>
                <td><?php echo $key->npm ?></td>
                <td><?php echo $key->nm_mhs ?></td>
                <td><?php echo $key->nm_prodi ?></td>
                <td><?php echo $key->jenjang ?></td>
                <td><?php echo $key->nama_kelas ?></td>
                <td><?php echo $key->tahun ?></td>
                <td>                                                                                  
                            <a href="<?php echo base_url('admin/edit_mahasiswa/'.$key->npm) ?>"><button>Edit</button></a>
                            <!-- <a onclick="return confirm('Hapus Data??'); " href="<?php echo base_url('admin/hapus_mahasiswa/'.$key
                            ->npm); ?>"><button>Hapus</button></a> -->
                          </td>
                
                
              </tr>
              <?php endforeach ?>
            </tbody>
          </table><br>
        </div>

        <br>
        Terimakasih, salam Administrator</center></td>
        <td width="20%">&nbsp;</td>


        <br> <br>
