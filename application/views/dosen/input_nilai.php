<?php $this->load->view('dosen/include/header') ?>
<div id="colorlib-main">
  <br><br><br>
  
  <section class="ftco-section-no-padding bg-light">
    <div class="container">

      <center> 
      <h4>Input Nilai</h4><br><br>
     <form action="<?php echo base_url('dosen/import') ?>" enctype="multipart/form-data" method="POST">
       <div class="row">
        <div class="container">

      <td>
        <label>Tahun Akademik</label><br><br>
        <select name="provinsi" id="provinsi" class="form-control">
          <option value="">Pilih Tahun</option><br><br>
          <?php
          foreach($tahunakademik as $data){ // Lakukan looping pada variabel siswa dari controller
            echo "<option value='".$data->tahunid."'>".$data->tahun.",".$data->semester."</option>";
          }
          ?>
        </select>
      </td>
      <tr>
      <td><b>Jadwal</b></td><br><br>
      <td>
        <select name="kota" id="kota" class="form-control">
          <option value="">Pilih</option><br><br>
        </select>        
      </td>
      <br>
      <label>Bobot Nilai UTS (dalam persen)</label>
       <input type="number" name="bobot_uts" placeholder="Persentase Nilai UTS" class="form-control">
       <br>
       <label>Bobot Nilai UAS (dalam persen)</label>
        <input type="number" name="bobot_uas" placeholder="Persentase Nilai UAS" class="form-control">
        <br>
        <label>Bobot Nilai Tugas (dalam persen)</label>
         <input type="number" name="bobot_tugas" placeholder="Persentase Nilai Tugas" class="form-control">
         <br>
         <label>Bobot Nilai Absen (dalam persen)</label>
          <input type="number" name="bobot_absen" placeholder="Persentase Nilai Absen" class="form-control">
          <br>
    </tr>

          <!-- <label>Mata Kuliah</label>
       <select name="idmatkul" class="form-control">
         <option></option>
         <?php foreach ($matkul as $key): ?>
           <option value="<?php echo $key->idmatkul ?>"><?php echo $key->nm_matkul ?></option>
         <?php endforeach ?>
       </select> -->
       <!--  <label>Tahun Akademik</label>
                                  <select name="tahunid" class="form-control">
                                    <option></option>
                                    <?php foreach($tahunakademik as $data): ?>
                                      { 
                                      echo "<option value='".$data->tahunid."',.$data->tahun.></option>";
          }
                                   <?php endforeach ?>
                                  </select>
 -->     
                                 <!-- <label>Prodi</label>
                                  <select name="idprodi" class="form-control">
                                    <option></option>
                                    <?php foreach ($prodi as $key): ?>
                                      <option value="<?php echo $key->idprodi ?>"><?php echo $key->jenjang ?></option>
                                    <?php endforeach ?>
                                  </select>

                                 <label>Kelas</label>
                                  <select name="id_kelas" class="form-control">
                                    <option></option>
                                    <?php foreach ($kelas as $key): ?>
                                      <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                                    <?php endforeach ?>
                                  </select>
       </div>
        </div> -->
       <label>Upload Excel</label>
       <input type="file" name="file" class="form-control">
       <br><br>
       <button type="submit" class="btn btn-primary col-md-12">Simpan Nilai</button>
     </form>

     <div class="table-responsive" id="nilai_data">
       
     </div>



    </div>  
  </section>
  <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
  
  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kota").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("dosen/listjakul"); ?>", // Isi dengan url/path file php yang dituju
        data: {tahunid : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_jakul).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
<br><br><br>
<br><br><br>
<br><br><br>


<!--   <?php $this->load->view('dosen/include/footer') ?> -->
