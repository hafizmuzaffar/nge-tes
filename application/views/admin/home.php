<?php $this->load->view('admin/include/header') ?>

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> Dashboard Admin</h4>
            </div>

            <div class="heading-elements">
              <img src="<?php echo base_url();?>assets4/backend/images/polpos.png" alt="" width=75px height=75px>
            </div>
          </div>
          <br>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url();?>"><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-calendar2 position-left"></i> <span id="clock"></span></a></li>

              
            </ul>
          </div>
        </div>
              <div class="panel panel-flat">
            <div class="panel-heading">
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b>, Anda login sebagai Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>
            <div class="col-6">
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data Jadwal
                             </button>


            <div.dataTables_borderWrap>
            <div>
                      <table class="table table-hover table-dark" >
                        <thead>

                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Jam Awal</th>
                            <th scope="col">Jam Akhir</th>
                            <th scope="col">Matkul</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($jakul as $key) { ?>
                        <tr>
                         
                          <td><?php echo $no; ?></td>
                          <td><?php echo $key->hari; ?></td>
                          <td><?php echo $key->nama_kelas; ?></td>
                          <td><?php echo $key->nm_dosen; ?></td>
                          <td><?php echo $key->jamawal; ?></td>
                          <td><?php echo $key->jamakhir; ?></td>
                          <td><?php echo $key->nm_matkul; ?></td>
                          <td><?php echo $key->nm_ruangan; ?></td>
                          <td>                                                                                           
                            <a href="<?php echo base_url('admin/edit_jadwal/'.$key->idjakul) ?>"><button>Edit</button></a>
                            <!-- <a onclick="return confirm('Hapus Data??'); " href="<?php echo base_url('admin/hapus_jadwal/'.$key
                            ->idjakul); ?>"><button>Hapus</button></a> -->
                          </td>
                          
                        </tr>
                        <?php
                        $no++;  
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
            

         </table> 

           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                         </button>
                            </div>
                        <div class="modal-body">
                                <form action="<?php echo base_url('admin/store_jadwal') ?>" method="POST">

                                  <label>Matkul</label>
                                  <select name="idmatkul" class="form-control">
                                    <option></option>
                                    <?php foreach ($matkul as $key): ?>
                                      <option value="<?php echo $key->idmatkul ?>"><?php echo $key->nm_matkul ?></option>
                                    <?php endforeach ?>
                                  </select>


                                  <label>Prodi</label>
                                  <select name="idprodi" class="form-control">
                                    <option></option>
                                    <?php foreach ($prodi as $key): ?>
                                      <option value="<?php echo $key->idprodi ?>"><?php echo $key->jenjang ?></option>
                                    <?php endforeach ?>
                                  </select>

                                   <label>Ruangan</label>
                                  <select name="idruangan" class="form-control">
                                    <option></option>
                                    <?php foreach ($ruangan as $key): ?>
                                      <option value="<?php echo $key->idruangan ?>"><?php echo $key->nm_ruangan ?></option>
                                    <?php endforeach ?>
                                  </select>

                                  <label>Dosen</label>
                                  <select name="nik" class="form-control">
                                    <option></option>
                                    <?php foreach ($dosen as $key): ?>
                                      <option value="<?php echo $key->nik ?>"><?php echo $key->nm_dosen ?></option>
                                    <?php endforeach ?>
                                  </select>

                                   <label>Kelas</label>
                                  <select name="id_kelas" class="form-control">
                                    <option></option>
                                    <?php foreach ($kelas as $key): ?>
                                      <option value="<?php echo $key->id_kelas ?>"><?php echo $key->nama_kelas ?></option>
                                    <?php endforeach ?>
                                  </select>
                                               <label>Hari</label>
                                               <input type="text" name="hari" id="hari" class="form-control">

                                  

                                               <label>Jam Awal</label>
                                               <input type="text" name="jamawal" id="jamawal" class="form-control">
                                               <label>Jam Akhir</label>
                                               <input type="text" name="jamakhir" id="jamakhir" class="form-control">  

                                  <label>Tahun Akademik</label>
                                  <select name="tahunid" class="form-control">
                                    <option></option>
                                    <?php foreach ($tahunakademik as $key): ?>
                                      <option value="<?php echo $key->tahunid ?>"><?php echo $key->tahun ?>, <?php echo $key->semester ?></option>
                                    <?php endforeach ?>
                                  </select>
                            
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Submit</button>
                         </form>   
                        </div> 
                         </div>
                        </div>
                        </div>