<?php $this->load->view('dosen/include/header') ?>

<div id="colorlib-main">
 <section class="ftco-section-no-padding bg-light">
   <div class="container">
     <center> 
      <table class='table table-bordered table-striped' id='mytable'>
<div class="page-header">
	<h1>
		Form Edit Nilai
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="<?php echo base_url('dosen/edit_nilai_final_simpan') ?>" method="POST">
			<input type="hidden" name="id_nilai" value="<?php echo $nilai['id_nilai'] ?>">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> UTS</label>

				<div class="col-sm-9">
					<input type="number" name="uts" placeholder="nilai uts" value="<?php echo $nilai['uts']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> UAS</label>

				<div class="col-sm-9">
					<input type="number" name="uas" placeholder="Nilai UAS" value="<?php echo $nilai['uas']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tugas</label>

				<div class="col-sm-9">
					<input type="number" name="tugas" placeholder="Nilai Tugas" value="<?php echo $nilai['tugas']; ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Absen</label>

				<div class="col-sm-9">
					<input type="number" name="absen" placeholder="Jumlah Absen" value="<?php echo $nilai['absen']; ?>" required />
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-2 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
					<a href="<?php echo base_url('admin/data_nilai'); ?>" class="btn"> Kembali</a>
				</div>
			</div>
		</form>

	</div>
</div>		

<?php $this->load->view('dosen/include/footer') ?>
