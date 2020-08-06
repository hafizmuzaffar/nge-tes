<?php $this->load->view('super/include/header') ?>
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
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('username');?></b>, Anda login sebagai Super Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>

<div class="page-header">
	<h1>
		Form Edit User
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="<?php echo base_url('admin/store_user') ?>" method="POST">
			<input type="hidden" name="id" value="<?php echo $user['id'] ?>">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nomor</label>

				<div class="col-sm-9">
					<input type="text" name="nomor" placeholder="nomor" value="<?php echo $user['nomor']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username</label>

				<div class="col-sm-9">
					<input type="text" name="username" placeholder="Username" value="<?php echo $user['username']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>

				<div class="col-sm-9">
					<input type="test" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Level</label>

				<div class="col-sm-9">
					<select name="level" >
						<option value="">---Pilih Level---</option>
						<option value="admin" <?php if($user['level'] == 'Admin') { echo "selected"; } ?>>Admin</option>
						<option value="dosen" <?php if($user['level'] == 'Dosen') { echo "selected"; } ?>>Dosen</option>
						<option value="mahasiswa" <?php if($user['level'] == 'Mahasiswa') { echo "selected"; } ?>>Mahasiswa</option>
						
					</select>
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-2 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
					<a href="<?php echo base_url('admin/data_user'); ?>" class="btn"> Kembali</a>
				</div>
			</div>
		</form>

	</div>
</div>		