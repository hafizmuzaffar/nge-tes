<?php $this->load->view('dosen/include/header') ?>
<div id="colorlib-main">
  <br><br><br>
  
  <section class="ftco-section-no-padding bg-light">
    <div class="container col-md-12">

      <center> 
        <h4>Laporan Nilai</h4><br><br>
        <form action="<?php echo base_url('dosen/laporan_nilai') ?>" enctype="multipart/form-data" method="POST">
         <div class="row">
          <label>Tahun Akademik</label>
            <select name="tahunid" class="form-control">
              <option></option>
              <?php foreach ($tahunakademik as $key) {?>
                <option value="<?php echo $key->tahunid ?>"><?php echo $key->semester ?> - <?php echo $key->tahun ?></option>
              <?php } ?>
            </select>
            <br><br>

        </div>

        <button type="submit" class="btn btn-primary col-md-12">Simpan Nilai</button>
      </form>

     
     <?php if (!empty($laporan)) { ?>
      <br></br></br>
      <a href="<?=base_url('dosen/laporan_nilai_excel/'.$tahunid)?>"><button class="btn btn-primary">Export Excel</button></a>
      <br></br>
       <table class="table table-bordered table-striped">
         <thead>
           <tr>
             <th>Tahun Akademik</th>
             <th>MataKuliah</th>
             <th>NPM</th>
             <th>UAS</th>
             <th>UTS</th>
             <th>Tugas</th>
             <th>Absen</th>
             <th>Bobot</th>
             <th>Total</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($laporan as $key): ?>
            <tr>
             <td><?php echo $key->semester ?> - <?php echo $key->tahun ?></td>
             <td><?php echo $key->nm_matkul ?></td>
             <td><?php echo $key->nm_mhs ?></td>
             <td><?php echo $key->uas ?></td>
             <td><?php echo $key->uts ?></td>
             <td><?php echo $key->tugas ?></td>
             <td><?php echo $key->absen ?></td>
             <td><?php echo $key->bobot ?></td>
             <td><?php echo $key->total ?></td>
             <td>
                <a href="<?php echo base_url('dosen/edit_nilai_final/'.$key->id_nilai) ?>"><button>Edit</button></a>
              </td>
           </tr>
           <?php endforeach ?>
         </tbody>
       </table>
     <?php } ?>



    </div>  
  </section>
  <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>

  <br><br><br>
  <br><br><br>
  <br><br><br>


