<?php $this->load->view('super/include/header') ?>

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

        <center> 
         <table class='table table-bordered table-striped' id='mytable'>
         <thead>
           <tr>
             <th>Tahun Akademik</th>
             <th>Semester</th>
             <th>Awal Semester</th>
             <th>Akhir Semester</th>
             <th>Status</th>
             <th width="34%">Action</th>
           </tr>
         </thead>
         <tbody>
           <?php
           $no = 1;
           foreach ($tahunid as $key) { ?>
             <tr>
             <td><?php echo $key->tahun; ?></td>
             <td><?php echo $key->semester; ?></td>
             <td><?php echo $key->waktuawal; ?></td>
             <td><?php echo $key->bataswaktu; ?></td>
             <td><?php echo $key->status; ?></td>
             <td><a href="<?php echo base_url('admin/aktifkansemester/'.$key->tahunid) ?>" class="btn btn-info"> Aktif</a> | <a href="<?php echo base_url('admin/nonaktifkansemester/'.$key->tahunid) ?>" class="btn btn-danger"> Non Aktif</a> | <a href="<?php echo base_url('admin/cetak_berita_acara/'.$key->tahunid) ?>" class="btn btn-success"> Cetak Berita Acara</a></td>
           </tr>
             <?php
             $no++;
               } ?>
         </tbody>
        </table><br>
        </div> 

          <div class="container">
          <h4>Tambah Tahun Akademik</h4>
          <form method="POST" action="<?php echo base_url('admin/store_akademik') ?>">
            <label>Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control">
           
           <h4>Semester Ganjil</h4>
            <br>
           
             <label>Waktu Awal</label>
            <input type="date" name="waktuawal1" id="waktuawal" class="form-control">
             <label>Waktu Akhir</label>
            <input type="date" name="bataswaktu1" id="bataswaktu1" class="form-control">

             <h4>Semester Genap</h4>
             <br>
           
             <label>Waktu Awal</label>
            <input type="date" name="waktuawal2" id="waktuawal2" class="form-control">
             <label>Waktu Akhir</label>
            <input type="date" name="bataswaktu2" id="bataswaktu2" class="form-control">

             <h4>Semester Pendek</h4>
             <br>
            
             <label>Waktu Awal</label>
            <input type="date" name="waktuawal3" id="waktuawal3" class="form-control">
             <label>Waktu Akhir</label>
            <input type="date" name="bataswaktu3" id="bataswaktu3" class="form-control">
          
            <button class="btn btn-primary col-md-12" type="submit">Simpan data</button>
          </form>
        </div>    