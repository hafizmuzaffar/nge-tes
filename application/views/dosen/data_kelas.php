<?php $this->load->view('dosen/include/header') ?>

<div id="colorlib-main">
 <section class="ftco-section-no-padding bg-light">
   <div class="container">

   	<td>
   	<form action="<?php echo base_url('dosen/data_kelas') ?>" method="POST">
   	  <br><label>Tahun Akademik</label>
   	  <select name="tahunid" id="tahunid" class="form-control">
   	    <option value="">Pilih Tahun</option><br><br>
   	    <?php
   	    foreach($tahunakademik as $data){ // Lakukan looping pada variabel siswa dari controller
   	      echo "<option value='".$data->tahunid."'>".$data->tahun.", ".$data->semester."</option>";
   	    }
   	    ?>
   	  </select>
   	</td>
   </br>
   	<button class="btn btn-primary col-md-12" type="submit">Lihat Data</button>
   	<br>
</form>

     <center> 
     	<br>
      <table class='table table-bordered table-striped' id='mytable'>
      	<br>
        <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Semester</th>
            <th>Tindakan</th>   
          </tr>
        </thead>
      <tbody>
													<?php
													$no = 1;
													foreach ($kelas as $kelas1) { ?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $kelas1->nama_kelas; ?></td>
													<td><?php echo $kelas1->tahun; ?></td>
													<td><?php echo $kelas1->semester; ?></td>
													<td><a href="<?php echo base_url();?>dosen/data_perkelas/<?php echo $kelas1->id_kelas; ?>/<?php echo $kelas1->tahunid ?>">Tampilkan</a></td>
													
												</tr>
												<?php
												$no++;	
													}
													?>
												</tbody>
											</table>
										</div>