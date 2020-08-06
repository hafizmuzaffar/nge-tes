<?php $this->load->view('admin/include/header') ?>
 <div class="page-container">

 
    <div class="page-content">

   
      <div class="content-wrapper">

      
        <div class="page-header page-header-default">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> Dashboard Petugas</h4>
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
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b>, Anda login sebagai Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>

<div class="page-header">
  <h1>
    Form Edit Mahasiswa
  </h1>
</div><!-- /.page-header -->
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <form class="form-horizontal" role="form" action="<?php echo base_url('admin/edit_mahasiswa_simpan') ?>" method="POST">
      <input type="hidden" name="npm" value="<?php echo $mhs['npm'] ?>">

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Mahasiswa</label>

        <div class="col-sm-9">
          <input type="text" name="nm_mhs" placeholder="Nama Mahasiswa" value="<?php echo $mhs['nm_mhs']; ?>" required />
        </div>
      </div>

    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Jenjang</label>
                                  <select name="idprodi" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($prodi as $key): ?>
                                      <option value="<?php echo $key->idprodi ?>"><?php echo $key->jenjang ?></option>
                                    <?php endforeach ?>
                                  </select></div>
      <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Kelas</label>
                                  <select name="id_kelas" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($kelas as $key): ?>
                                      <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                                    <?php endforeach ?>
                                  </select></div>
        <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1" >Tahun Ajaran</label>
                                  <select name="tahunid" class="col-sm-2">
                                    <option></option>
                                    <?php foreach ($tahunakademik as $key): ?>
                                      <option value="<?php echo $key->tahunid ?>"><?php echo $key->tahun ?></option>
                                    <?php endforeach ?>
                                  </select></div>

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