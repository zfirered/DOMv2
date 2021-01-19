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
                                            <input type="text" class="form-control <?= ($validation->hasError('first_nm')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="first_nm" value="<?= (old('first_nm')==FALSE) ? $data->first_name : old('first_nm') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('first_nm'); ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('last_nm')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="last_nm" value="<?= (old('last_name')==FALSE) ? $data->last_name : old('last_name') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('last_nm'); ?>
                                            </div>
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
                                            <input type="text" class="form-control <?= ($validation->hasError('right_leave')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="right_leave" value="<?= (old('right_leave')==FALSE) ? $data->right_to_leave : old('right_leave') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('right_leave'); ?>
                                            </div>   
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
                                         <select class="form-control" name="bank_cd">
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
                                            <input type="text" class="form-control <?= ($validation->hasError('no_rek')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="no_rek" value="<?= (old('no_rek')==FALSE) ? $data->bank_no : old('no_rek') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('no_rek'); ?>
                                            </div>  
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name of Rekening</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('an_rek')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="an_rek" value="<?= (old('an_rek')==FALSE) ? $data->bank_account : old('an_rek') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('an_rek'); ?>
                                            </div>  
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Kesehatan</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('bpjs_ks')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="bpjs_ks" value="<?= (old('bpjs_ks')==FALSE) ? $data->bpjs_ks : old('bpjs_ks') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('bpjs_ks'); ?>
                                            </div> 
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Ketenagakerjaan</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('bpjs_tk')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="bpjs_tk" value="<?= (old('bpjs_tk')==FALSE) ? $data->bpjs_tk : old('bpjs_tk') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('bpjs_tk'); ?>
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('insurance')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="insurance" value="<?= (old('insurance')==FALSE) ? $data->insurance : old('insurance') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('insurance'); ?>
                                            </div> 
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
                                            <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="nik" value="<?= (old('ktp')==FALSE) ? $data->ktp : old('ktp') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('nik'); ?>
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Education</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('last_edu')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="last_edu" value="<?= (old('last_edu')==FALSE) ? $data->education : old('last_edu') ?>" >
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('last_edu'); ?>
                                            </div> 
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="no_telp" value="<?= (old('no_telp')==FALSE) ? $data->no_telp : old('no_telp') ?>" >
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('no_telp'); ?>
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email Adress</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="email" value="<?= (old('email')==FALSE) ? $data->email : old('email') ?>" required>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Adress</label>
                                            <textarea class="form-control <?= ($validation->hasError('adress')) ? 'is-invalid' : '' ?>" rows="11" placeholder="Enter ..." name="adress" ><?= (old('adress')==FALSE) ? $data->address : old('adress') ?></textarea>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('adress'); ?>
                                            </div> 
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