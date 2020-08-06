<?php $this->load->view('admin/include/header') ?>
 <div class="page-container">

 
    <div class="page-content">

   
      <div class="content-wrapper">

      
        <div class="page-header page-header-default">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> Dashboard Admin</h4>
            </div>

            <div class="heading-elements">
              <img src="<?php echo base_url();?>assets4/backend/images/husada.png" alt="">
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
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b>, Anda login sebagai Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>
<div class="page-header">
  <h1>
    Form Edit Jadwal Kuliah
  </h1>
</div><!-- /.page-header -->
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <form class="form-horizontal" role="form" action="<?php echo base_url('admin/edit_jadwal_simpan') ?>" method="POST">
      <input type="hidden" name="idjakul" value="<?php echo $jakul['idjakul'] ?>">

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hari</label>

        <div class="col-sm-9">
          <input type="text" name="hari" placeholder="hari" value="<?php echo $jakul['hari']; ?>" required />
        </div>
      </div>

      <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Kelas</label>
                                  <select name="id_kelas" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($kelas as $key): ?>
                                      <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                                    <?php endforeach ?>
                                  </select></div>
            <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Dosen</label>
                                  <select name="nik" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($dosen as $key): ?>
                                      <option value="<?php echo $key->nik ?>"><?php echo $key->nm_dosen ?></option>
                                    <?php endforeach ?>
                                  </select></div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jam Awal</label>

        <div class="col-sm-9">
          <input type="text" name="jamawal" placeholder="Jam Awal" value="<?php echo $jakul['jamawal']; ?>" required />
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jam Akhir</label>

        <div class="col-sm-9">
          <input type="text" name="jamakhir" placeholder="Jam Akhir" value="<?php echo $jakul['jamakhir']; ?>" required />
        </div>
      </div>

    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Matkul</label>
                                  <select class="col-sm-2" name="idmatkul">
                                    <option></option>
                                    <?php foreach ($matkul as $key): ?>
                                      <option value="<?php echo $key->idmatkul ?>"><?php echo $key->nm_matkul ?></option>
                                    <?php endforeach ?>
                                  </select>
                              </div>
                                         
        <div class="form-group">                               
     <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ruangan</label>
                                  <select name="idruangan" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($ruangan as $key): ?>
                                      <option value="<?php echo $key->idruangan ?>"><?php echo $key->nm_ruangan ?></option>
                                    <?php endforeach ?>
                                  </select>
                                  </div>

      <div class="clearfix form-actions">
        <div class="col-md-offset-2 col-md-9">
          <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Submit
          </button>
          <a href="<?php echo base_url('admin/index'); ?>" class="btn"> Kembali</a>
        </div>
      </div>
    </form>

  </div>
</div>    