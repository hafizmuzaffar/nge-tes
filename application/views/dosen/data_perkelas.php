<?php $this->load->view('dosen/include/header') ?>

<div id="colorlib-main">
  <form method="post" action="<?php echo base_url()?>dosen/export">
                    <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(3); ?>">
                    <input type="hidden" name="tahun" value="<?php echo $this->uri->segment(4); ?>">
                          <input type="submit" name="export" class="btn btn-success" value="Export" />
                           </form>
 <section class="ftco-section-no-padding bg-light">
   <div class="container">
     <center> 
      <table class='table table-bordered table-striped' id='mytable'>
        <thead>
          <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Mahasiswa</th>
            <th>Prodi</th>
            <th>Kelas</th>
            <th>Tahun</th>
           
          </tr>
        </thead>
      <tbody>
                                  <?php
                          $no = 1;
                          foreach ($lihat_perkelas as $kelas1) { ?>
                        <tr>
                         
                         <td><?php echo $no; ?></td>
                          <td><?php echo $kelas1->npm; ?></td>
                          <td><?php echo $kelas1->nm_mhs; ?></td>
                          <td><?php echo $kelas1->nm_prodi; ?></td>
                          <td><?php echo $kelas1->nama_kelas; ?></td>
                          <td><?php echo $kelas1->tahunid; ?></td> 
                        </tr>
                        <?php
                        $no++;  
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>