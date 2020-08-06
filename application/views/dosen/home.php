<?php  $this->load->view('dosen/include/header') ?>
<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
			<center> 
             <table class='table table-bordered table-striped' id='mytable'>
        <thead>
            <tr>
                <th>Hari</th>
                  <th>Kelas</th>
                  <th>Nama Dosen</th>
                  <th>Jam Awal</th>
                  <th>Jam Akhir</th>
                   <th>Matkul</th>
                   <th>Ruangan</th>
                  
        
            </tr></thead><tbody>                          <?php
                          $no = 1;
                          foreach ($jakul as $key) { ?>
                        <tr>
                         
                          <td><?php echo $key->hari; ?></td>
                          <td><?php echo $key->nama_kelas; ?></td>
                          <td><?php echo $key->nm_dosen; ?></td>
                          <td><?php echo $key->jamawal; ?></td>
                          <td><?php echo $key->jamakhir; ?></td>
                          <td><?php echo $key->nm_matkul; ?></td>
                          <td><?php echo $key->nm_ruangan; ?></td>
                          
                        </tr>
                        <?php
                        $no++;  
                          }
                          ?>
            </tbody>
     <br>

      <br>
         </table> 
			</section>


