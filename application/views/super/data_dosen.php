<?php $this->load->view('super/include/header') ?>


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
              <h6 class="panel-title">Selamat Datang, <b><?php echo $this->session->userdata('username');?></b>, Anda login sebagai Super Administrator</h6>
                            <hr>
              <div class="heading-elements">
                
              </div>
            </div>
            <div class="col-6">
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data Dosen
                             </button>


            <div.dataTables_borderWrap>
            <div>
                      <table class="table table-hover table-dark" >
                        <thead>

                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($dosen as $dsn1) { ?>
                        <tr>
                         
                          <td><?php echo $no; ?></td>
                          <td><?php echo $dsn1->nik; ?></td>
                          <td><?php echo $dsn1->nm_dosen; ?></td>
                          <td>                                                                                                    
                            <a href="<?php echo base_url('admin/edit_dosen/'.$dsn1->nik) ?>"><button>Edit</button></a>
                            <!-- <!-- <a onclick="return confirm('Hapus Data??'); " href="<?php echo base_url('admin/hapus_dosen/'.$dsn1
                            ->nik); ?>"><button>Hapus</button></a> -->  
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

                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                         </button>
                            </div>
                        <div class="modal-body">
                                <form action="<?php echo base_url('admin/store_dosen') ?>" method="POST">

                                                <label>NIK</label>
                                               <input type="number" name="nik" id="nik" class="form-control">
                                               <label>Nama Dosen</label>
                                               <input type="text" name="nm_dosen" id="nm_dosen" class="form-control">
                                               <label>Username</label>
                                               <input type="text" name="username" class="form-control">
                                               <label>Password</label>
                                               <input type="password" name="password" class="form-control">
                                               <label>Email</label>
                                               <input type="email" name="email" class="form-control">
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Submit</button>
                         </form>   
                        </div> 
                         </div>
                        </div>
                        </div>
<?php $this->load->view('admin/include/footer') ?>
