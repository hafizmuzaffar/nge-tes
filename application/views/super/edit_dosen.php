<?php $this->load->view('super/include/header') ?>
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
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('username');?></b>, Anda login sebagai Super Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>

<div class="page-header">
  <h1>
    Form Edit Dosen
  </h1>
</div><!-- /.page-header -->
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <form class="form-horizontal" role="form" action="<?php echo base_url('admin/edit_dosen_simpan') ?>" method="POST">
      <input type="hidden" name="nik" value="<?php echo $dosen['nik'] ?>">

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIK</label>

        <div class="col-sm-9">
          <input type="text" name="nik2" placeholder="NIK" value="<?php echo $dosen['nik']; ?>" required />
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Dosen</label>

        <div class="col-sm-9">
          <input type="text" name="nm_dosen" placeholder="Nama Dosen" value="<?php echo $dosen['nm_dosen']; ?>" required />
        </div>
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