<?php  $this->load->view('dosen/include/header') ?>
<div id="colorlib-main">
 <section class="ftco-section-no-padding bg-light">
   <div class="container">
     <center> 
      <table class='table table-bordered table-striped' id='mytable'>
        <thead>
          <tr>
            <th>NPM</th>
            <th>Mata Kuliah</th>
            <th>Uas</th>
            <th>UTS</th>
            <th>Tugas</th>
            <th>Absen</th>
            <th>Bobot</th>
            <th>Total</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nilai as $key): ?>
          <tr>
            <td><?php echo $key['npm'] ?></td>
            <td><?php echo $key['idmatkul'] ?></td>
            <td><?php echo $key['uas'] ?></td>
            <td><?php echo $key['uts'] ?></td>
            <td><?php echo $key['tugas'] ?></td>
            <td><?php echo $key['absen'] ?></td>
            <td><?php echo $key['bobot'] ?></td>
            <td><?php echo number_format($key['total'],0) ?></td>
            
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>    
    </div>  
  </section>

  <?php  $this->load->view('dosen/include/footer') ?>
