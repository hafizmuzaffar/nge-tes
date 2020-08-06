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

<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <form class="form-horizontal" role="form" action="<?php echo base_url('admin/edit_matkul_simpan') ?>" method="POST">
      <input type="hidden" name="idmatkul" value="<?php echo $matkul['idmatkul'] ?>">

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mata Kuliah</label>

        <div class="col-sm-9">
          <input type="text" name="nm_matkul" placeholder="nm_matkul" value="<?php echo $matkul['nm_matkul']; ?>" required />
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> SKS</label>

        <div class="col-sm-9">
          <input type="text" name="sks" placeholder="SKS" value="<?php echo $matkul['sks']; ?>" required />
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
      
        <br>
        Terimakasih, salam Administrator</center></td>
        <td width="20%">&nbsp;</td>


        <br> <br>
      </div>
    </div>
  </div>
</div>
