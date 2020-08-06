<?php  $this->load->view('mahasiswa/include/header') ?>
<div id="colorlib-main">
	<section class="ftco-section-no-padding bg-light">
		<div class="hero-wrap">
			<br><br>
			<p>Nama Lengkap : <?php echo $mhs->nm_mhs ?></p>
					<p>NPM : <?php echo $mhs->npm ?></p>
					<p>Kelas : <?php echo $mhs->nama_kelas ?></p>
					<p>Tahun Akademik : <?php echo $mhs->tahun ?></p>

					<br><br>
					
		</div>
	</section>
</div>