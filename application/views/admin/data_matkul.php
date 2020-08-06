<?php $this->load->view('admin/include/header') ?>


  <!-- Page container -->
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
            <div class="container">
          <button type="button" class="btn btn-primary btn btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
          Tambah Data Mata Kuliah
          </button></div>
            <center> 
             <table class='table table-bordered table-striped' id='mytable'>
        <thead>
            <tr>
                <th>Nama Matkul</th>
                  <th>SKS</th>
                  <th>PRODI</th>
                  <th>Semester</th>
                  <th>Action</th>
               
            </tr></thead><tbody><?php
            $start=0;
            foreach ($mtkl as $mtkl1);
            {
                ?>
            <td><?php echo $mtkl1->nm_matkul ?></td>
            <td><?php echo $mtkl1->sks ?></td>
            <td><?php echo $mtkl1->nm_prodi ?></td>
            <td><?php echo $mtkl1->nm_semester ?></td>
            <td>
              <a href="<?php echo base_url('admin/edit_matkul/'.$mtkl1->idmatkul) ?>"><button>Edit</button></a>
                          </td>
            </td>
        </tr>
                <?php
            }
            ?>
            </tbody>
        </table><br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                         </button>
                            </div>
                        <div class="modal-body">
                                <form action="<?php echo base_url('admin/store_matkul') ?>" method="POST">
                                  <label>Mata Kuliah</label>
                                  <input type="text" name="nm_matkul" id="idmatkul" class="form-control">

                                  <label>SKS</label>
                                  <input type="number" name="sks" id="idmatkul" class="form-control">

                                   <label>Program Studi</label>
                                  <select name="idprodi" class="form-control">
                                    <option></option>
                                    <?php foreach ($prodi as $key): ?>
                                      <option value="<?php echo $key->idprodi ?>"><?php echo $key->nm_prodi ?></option>
                                    <?php endforeach ?>
                                  </select>

                                  <label>Semester</label>
                                  <select name="idsemester" class="form-control">
                                    <option></option>
                                    <?php foreach ($semester as $key): ?>
                                      <option value="<?php echo $key->idsemester ?>"><?php echo $key->nm_semester ?></option>
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

      <br>
      Terimakasih, salam Administrator</center></td>
    <td width="20%">&nbsp;</td>

                                         
            <br> <br>
          