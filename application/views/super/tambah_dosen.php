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
            <li class="active">Data Kelas</li>
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
          <h4>Tambah Dosen</h4>
          <form method="POST" action="<?php echo base_url('admin/store_dosen') ?>">
            <label>NIK</label>
            <input type="number" name="nik" id="nik" class="form-control">
            <label>Nama Dosen</label>
            <input type="text" name="nm_dosen" id="nm_dosen" class="form-control">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <button class="btn btn-primary col-md-12" type="submit">Simpan data</button>
          </form>
        </div>    

        <br>
        Terimakasih, salam Administrator</center></td>
        <td width="20%">&nbsp;</td>


        <br> <br>
      </div>
    </div>
  </div>
</div>
