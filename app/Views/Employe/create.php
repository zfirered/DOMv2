<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Employe</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Add New Employe</li>
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
                    <form class="form-horizontal" action="/employe/save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="nip" value="<?= $nip; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First Name*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('first_nm')) ? 'is-invalid' : '' ?>" value="<?= old('first_nm'); ?>" placeholder="Enter ..." name="first_nm">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('first_nm'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Name*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('last_nm')) ? 'is-invalid' : '' ?>" value="<?= old('last_nm'); ?>" placeholder="Enter ..." name="last_nm">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('last_nm'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Division</label>
                                        <select class="form-control" name="div" required>
                                            <option value="">- Choose Division -</option>

                                            <?php
                                            foreach ($data as $row) : ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['division_name']; ?> </option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label >Division*</label>
                                         <select class="form-control <?= ($validation->hasError('div')) ? 'is-invalid' : '' ?>" name="div">
                                         <option value="" >- Choose Division -</option>
                    
                                     <?php 
                                             foreach($data as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" <?= (old('div') == $row['id']) ? 'selected' : '' ?> > <?php echo $row['division_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('div'); ?>
                                            </div>
                                     </div>
                                     <div class="col-sm-6">
                                        <label >Position*</label>
                                         <select class="form-control <?= ($validation->hasError('pos')) ? 'is-invalid' : '' ?>" name="pos">
                                         <option value="" >- Choose Position -</option>
                    
                                     <?php 
                                             foreach($data2 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" <?= (old('pos') == $row['id']) ? 'selected' : '' ?> > <?php echo $row['position_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('pos'); ?>
                                            </div>
                                     </div>
                                     
                                     <div class="col-sm-6">
                                     <div class="form-group">

                                        <label >Status*</label>
                                         <select class="form-control <?= ($validation->hasError('stat')) ? 'is-invalid' : '' ?>" name="stat">
                                         <option value="" >- Choose Status -</option>
                    
                                     <?php 
                                             foreach($data3 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" <?= (old('stat') == $row['id']) ? 'selected' : '' ?> > <?php echo $row['status_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('stat'); ?>
                                            </div>
                                     </div>
                                     </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Right to Leave*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('right_leave')) ? 'is-invalid' : '' ?>" value="<?= old('right_leave'); ?>" placeholder="Enter ..." name="right_leave">
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
                                        <label >Bank Rekening*</label>
                                         <select class="form-control <?= ($validation->hasError('bank_cd')) ? 'is-invalid' : '' ?>" name="bank_cd">
                                         <option value="" >- Choose Bank -</option>
                    
                                     <?php 
                                             foreach($data4 as $row): ?>
                                            <option value="<?php echo $row['bank_code']; ?>" <?= (old('bank_cd') == $row['bank_code']) ? 'selected' : '' ?> > <?php echo $row['bank_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('bank_cd'); ?>
                                            </div>
                                     </div>
                                     <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Rekening Number*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('no_rek')) ? 'is-invalid' : '' ?>" value="<?= old('no_rek'); ?>" placeholder="Enter ..." name="no_rek">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('no_rek'); ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name of Rekening*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('an_rek')) ? 'is-invalid' : '' ?>" value="<?= old('an_rek'); ?>" placeholder="Enter ..." name="an_rek">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('an_rek'); ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Kesehatan*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('bpjs_ks')) ? 'is-invalid' : '' ?>" value="<?= old('bpjs_ks'); ?>" placeholder="Enter ..." name="bpjs_ks">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('bpjs_ks'); ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Ketenagakerjaan*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('bpjs_tk')) ? 'is-invalid' : '' ?>" value="<?= old('bpjs_tk'); ?>" placeholder="Enter ..." name="bpjs_tk">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('bpjs_tk'); ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('insurance')) ? 'is-invalid' : '' ?>" value="<?= old('insurance'); ?>" placeholder="Enter ..." name="insurance">
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
                                            <label>NIK KTP*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" value="<?= old('nik'); ?>" placeholder="Enter ..." name="nik">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('nik'); ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Education*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('last_edu')) ? 'is-invalid' : '' ?>" value="<?= old('last_edu'); ?>" placeholder="Enter ..." name="last_edu">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('last_edu'); ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Phone Number*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : '' ?>" value="<?= old('no_telp'); ?>" placeholder="Enter ..." name="no_telp">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('no_telp'); ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Email Adress*</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email'); ?>" placeholder="Enter ..." name="email">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Adress*</label>
                                            <textarea class="form-control <?= ($validation->hasError('adress')) ? 'is-invalid' : '' ?>" rows="11" placeholder="Enter ..." name="adress"><?= old('adress'); ?></textarea>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('adress'); ?>
                                            </div>
                                        </div>
                                    </div>           

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Foto</label> 
                                            <div class="custom-file">

                                                <input type="file" class="<?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="file" name="foto" accept="image/*">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                            </div>
                                                <button id="pilih" type="" style="display: none;" ></button>
                                           </div>
                                        </div>
                                        <div class="row"> 
                                    
                                    <div class="col-sm-8">
                                        <img  src="<?= base_url() ?>/img/placeholder.jpg"  alt="" id="gambar"  width="350px" height="220px" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Last Education</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="last_edu" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="no_telp" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email Adress</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Adress</label>
                                        <textarea class="form-control" rows="11" placeholder="Enter ..." name="adress" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="custom-file">
                                            <input type="file" id="file" name="foto" required>
                                            <button id="pilih" type="" style="display: none;"></button>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-8">
                                            <img src="<?= base_url() ?>/img/placeholder.jpg" alt="" id="gambar" width="350px" height="220px">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-info">Save</button>
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