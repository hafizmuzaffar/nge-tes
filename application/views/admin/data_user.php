<?php $this->load->view('admin/include/header') ?>
  <div class="page-container">

 
    <div class="page-content">

   
      <div class="content-wrapper">

      
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
           

       
											<table  id="dynamic-table" class="table table-striped table-bordered table-hover" >
												<thead>

													<tr>
														
														<th scope="col">No</th>
														<th scope="col">Nomor</th>
														<th scope="col">username</th>
														<th scope="col">email</th>
														<th scope="col">Level</th>
														<th scope="col">Action</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$no = 1;
													foreach ($user as $user1) { ?>
												<tr>
													
													<td><?php echo $no; ?></td>
													<td><?php echo $user1->nomor; ?></td>
													<td><?php echo $user1->username; ?></td>
													<td><?php echo $user1->email; ?></td>
													<td><?php echo $user1->level; ?></td>
													<td>                                                                                                                                                                                                                          
														<a href="<?php echo base_url('admin/edit_user/'.$user1->id) ?>"><button>Edit</button></a>
														<!-- <a onclick="return confirm('Hapus Data??'); " href="<?php echo base_url('admin/hapus_user/'.$user1
														->id); ?>"><button>Hapus</button></a> -->
													</td>
												</tr>
												<?php
												$no++;	
													}
													?>
												</tbody>
											</table>
										</div>

									<!-- 	 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										    <div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
										    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										     </button>
										        </div>
										    <div class="modal-body">
										            <form action="<?php echo base_url('admin/store_user') ?>" method="POST"> -->