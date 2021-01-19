<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Employe</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Employe</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Employe</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="/employe/update" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control"  name="nip" value="<?= $data->nip; ?>" readonly>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="first_nm" value="<?= $data->first_name; ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="last_nm" value="<?= $data->last_name; ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <label >Division</label>
                                         <select class="form-control" name="div" required>
                                         <option value="<?= $data->division; ?>" ><?= $data->division_name; ?></option>
                    
                                     <?php 
                                             foreach($data1 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['division_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     <div class="col-sm-6">
                                        <label >Position</label>
                                         <select class="form-control" name="pos" required>
                                         <option value="<?= $data->position; ?>" ><?= $data->position_name; ?></option>
                    
                                     <?php 
                                             foreach($data2 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['position_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     
                                     <div class="col-sm-6">
                                     <div class="form-group">

                                        <label >Status</label>
                                         <select class="form-control" name="stat" required>
                                         <option value="<?= $data->status; ?>" ><?= $data->status_name; ?></option>
                    
                                     <?php 
                                             foreach($data3 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['status_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     </div>

                                     <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Right to Leave</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="right_leave" value="<?= $data->right_to_leave; ?>" required>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                         </div>
                    </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Account</h3>
                    </div>      
                    <div class="card-body">
                            <div class="form">
                                <div class="row">          
                                     
                                       <div class="col-sm-6">
                                        <label >Bank Rekening</label>
                                         <select class="form-control" name="bank_cd" required>
                                         <option value="<?= $data->bank_code; ?>" ><?= $data->bank_name; ?></option>
                    
                                     <?php 
                                             foreach($data4 as $row): ?>
                                            <option value="<?php echo $row['bank_code']; ?>" > <?php echo $row['bank_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Rekening Number</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="no_rek" value="<?= $data->bank_no; ?>" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name of Rekening</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="an_rek" value="<?= $data->bank_account; ?>" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Kesehatan</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="bpjs_ks" value="<?= $data->bpjs_ks; ?>" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Ketenagakerjaan</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="bpjs_tk" value="<?= $data->bpjs_tk; ?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="insurance" value="<?= $data->insurance; ?>">
                                        </div>
                                    </div> 
                              </div> 
                           </div> 
                         </div> 
                      </div> 

                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Data Profil</h3>
                    </div>      
                    <div class="card-body">
                            <div class="form">
                                <div class="row"> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>NIK KTP</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="nik" value="<?= $data->ktp; ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Education</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="last_edu" value="<?= $data->education; ?>" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="no_telp" value="<?= $data->no_telp; ?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email Adress</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="email" value="<?= $data->email; ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Adress</label>
                                            <textarea class="form-control" rows="11" placeholder="Enter ..." name="adress" required><?= $data->address; ?></textarea>
                                        </div>
                                    </div>           

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <div class="custom-file">
                                                <input type="file"  id="file" name="foto" >
                                                <button id="pilih" type="" style="display: none;"></button>
                                                <input type="text" name="foto_old" value="<?= $data->foto; ?>" hidden>
                                           </div>
                                        </div>
                                        <div class="row"> 
                                    
                                    <div class="col-sm-8">
                                        <img src="<?= base_url() ?>/img/<?= $data->foto; ?>"  alt="" id="gambar" width="350px" height="220px" >
                                    </div>
                                </div>
                                    </div>

                                    </div></div>
                                </div>
                                
                                
                                <!-- /.card-body -->
                                <div class="card-footer">
                                <div class="modal-footer-info" >
                                                       <span class="users-list-name">Join Date: <?= date('d F Y', strtotime($data->join_date)); ?></span>
                                                              
                                                              </div>
                                <div class="float-right">
                                <button type="submit" class="btn btn-info">Update</button>
                                    <a href="/employe" type="submit" class="btn btn-danger">Back</a> 
                                    </div>
                                    </div>
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>