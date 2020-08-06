<?php  $this->load->view('dosen/include/header') ?>
<div id="colorlib-main">
 <section class="ftco-section-no-padding bg-light">
   <div class="container">
     <!--  <div class="wrapper">
        <h2>Input Bobot</h2><hr>
        <form method="POST" action="">
          <div class="form-group col-md-2">
            <label class="control-label">UAS</label>
            <input type="number" min="0" step="0.1" name="uas" class="form-control" placeholder="Bobot UAS (%)">
          </div>
          <div class="form-group col-md-2">
            <label class="control-label">UTS</label>
            <input type="number" min="0" step="0.1" name="uts" class="form-control" placeholder="Bobot UTS (%)">
          </div>
          <div class="form-group col-md-2">
            <label class="control-label">Tugas</label>
            <input type="number" min="0" step="0.1" name="tugas" class="form-control" placeholder="Bobot Tugas (%)">
          </div>
          <div class="form-group col-md-2">
            <label class="control-label">Absen</label>
            <input type="number" min="0" step="0.1" name="absen" class="form-control" placeholder="Bobot Absensi (%)">
          </div>
          <button style="margin-top: 26px;" class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
      </div> -->
     <center>
      <table class='table table-bordered table-striped' id='mytable'>
        <thead>
          <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Uas </th>
            <th>UTS </th>
            <th>Tugas </th>
            <th>Absen </th>
            <th>Grade</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nilai as $key): ?>
          <tr>
            <td><?php echo $key->npm ?></td>
            <td><?php echo $key->nm_mhs ?></td>
            <td><?php echo $key->nm_matkul ?></td>
            <td><?php echo $key->uas ?></td>
            <td><?php echo $key->uts ?></td>
            <td><?php echo $key->tugas ?></td>
            <td><?php echo $key->absen ?></td>
            <td><?php echo $key->bobot ?></td>
            <td><?php echo $key->total ?></td>
            <td><?php if($key->status == '') { echo "belum difinalisasi"; } ?></td>
            <td>
                            <a href="<?php echo base_url('dosen/edit_nilai/'.$key->id_nilai) ?>"><button>Edit</button></a>
                            <a href="<?php echo base_url('dosen/finalisasi_nilai/'.$key->id_nilai) ?>"><button>Finalisasi</button></a>
                          </td>
            
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>    
    </div>  
  </section>

  <?php  $this->load->view('dosen/include/footer') ?>
