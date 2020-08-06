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
            

                    <div class="container">
     <center> 
      <table class='table table-bordered table-striped' id='mytable'>
        <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Tahun</th>
            <th>Tindakan</th>
          </tr>
        </thead>
      <tbody>
                          <?php
                          $no = 1;
                          foreach ($kelas as $kelas1) { ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $kelas1->nama_kelas; ?></td>
                          <td><?php echo $kelas1->tahun; ?></td>
                          <td><a href="<?php echo base_url();?>admin/nilai_perkelas/<?php echo $kelas1->id_kelas; ?>/<?php echo $kelas1->tahunid ?>">Tampilkan</a>  <!-- <a href="<?php echo base_url('admin/finalisasi_nilai/'.$kelas1->id_kelas) ?>"><button>Finalisasi</button> --></a></td>
                          
                        </tr>
                        <?php
                        $no++;  
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>