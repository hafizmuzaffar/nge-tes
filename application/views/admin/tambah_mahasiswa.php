<?php $this->load->view('admin/include/header') ?>


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
          <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b>, Anda login sebagai Administrator</h6>
          <hr>
          <div class="heading-elements">

          </div>
        </div>

        <div class="container">
          <h4>Tambah Mahasiswa</h4>
          <form method="POST" action="<?php echo base_url('admin/store_mahasiswa') ?>">
            <label>NPM</label>
            <input type="number" name="npm" id="npm" class="form-control">
            <label>Nama Lengkap</label>
            <input type="text" name="nm_mhs" id="nm_mhs" class="form-control">
            <label>Prodi</label>
            <select name="idprodi" class="form-control">
              <option></option>
              <?php foreach ($prodi as $key): ?>
                <option value="<?php echo $key->idprodi ?>"><?php echo $key->jenjang ?></option>
              <?php endforeach ?>
            </select>
            <label>Kelas</label>
            <select name="kelas" class="form-control">
              <option></option>
              <?php foreach ($kelas as $key): ?>
                <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
              <?php endforeach ?>
            </select>
            <label>Tahun Angkatan</label>
            <select name="tahunid" class="form-control">
              <option></option>
              <?php foreach ($tahunakademik as $key): ?>
                <option value="<?php echo $key->tahunid ?>"><?php echo $key->tahun ?>, <?php echo $key->semester ?></option>
              <?php endforeach ?>
            </select>
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <br>
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
