<?php  $this->load->view('mahasiswa/include/header') ?>
<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
			<center> 
            <!--  <table class='table table-bordered table-striped' id='mytable'>
        <thead>
            <tr>
                <th>Hari</th>
                  <th>Kelas</th>
                  <th>Nama Dosen</th>
                  <th>Jam Awal</th>
                  <th>Jam Akhir</th>
                   <th>Matkul</th>
                   <th>Ruangan</th>
                  
        
            </tr></thead><tbody><?php
            $start=0;
            foreach ($jakul as $jakul1);
            {
                ?>
            <td><?php echo $jakul1->hari?></td>
            <td><?php echo $jakul1->nama_kelas ?></td>
            <td><?php echo $jakul1->nm_dosen ?></td>
            <td><?php echo $jakul1->jamawal ?></td>
            <td><?php echo $jakul1->jamakhir ?></td>
            <td><?php echo $jakul1->nm_matkul ?></td>
            <td><?php echo $jakul1->nm_ruangan ?></td>
        </tr>
                <?php
            }
            ?>
            </tbody>
     <br>

      <br>
         </table>  -->
<br><br>
         <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Matakuliah</th>
                <th>UAS</th>
                <th>UTS</th>
                <th>Tugas</th>
                <th>Absen</th>
                <th>bobot</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($nilai as $key): ?>
              <tr>
                <td><?php echo $key->nm_matkul ?></td>
                <td><?php echo $key->uas ?></td>
                <td><?php echo $key->uts ?></td>
                <td><?php echo $key->tugas ?></td>
                <td><?php echo $key->absen ?></td>
                <td><?php echo $key->bobot ?></td>
                <td><?php echo $key->total ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
			</section>

      <?php  $this->load->view('mahasiswa/include/footer') ?>
