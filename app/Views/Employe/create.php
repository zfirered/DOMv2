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
                    <form class="form-horizontal" action="/employe/save" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="nip" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="first_nm" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="last_nm" required>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <label >Division</label>
                                         <select class="form-control" name="div" required>
                                         <option value="" >- Choose Division -</option>
                    
                                     <?php 
                                             foreach($data as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['division_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     <div class="col-sm-6">
                                        <label >Position</label>
                                         <select class="form-control" name="pos" required>
                                         <option value="" >- Choose Position -</option>
                    
                                     <?php 
                                             foreach($data2 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['position_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
                                     </div>
                                     
                                     <div class="col-sm-6">
                                        <label >Status</label>
                                         <select class="form-control" name="stat" required>
                                         <option value="" >- Choose Status -</option>
                    
                                     <?php 
                                             foreach($data3 as $row): ?>
                                            <option value="<?php echo $row['id']; ?>" > <?php echo $row['status_name']; ?> </option>

                                         <?php endforeach; ?>
                                                 </select>
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
                                         <option value="" >- Choose Bank -</option>
                    
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
                                            <input type="text" class="form-control" placeholder="Enter ..." name="no_rek" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name of Rekening</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="an_rek" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Kesehatan</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="bpjs_ks" required>
                                        </div>
                                    </div>   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>BPJS Ketenagakerjaan</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="bpjs_tk" required>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="insurance" required>
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
                                            <input type="text" class="form-control" placeholder="Enter ..." name="nik" required>
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
                                                <input type="file"  id="file" name="foto" required>
                                                <button id="pilih" type="" style="display: none;"></button>
                                           </div>
                                        </div>
                                        <div class="row"> 
                                    
                                    <div class="col-sm-8">
                                        <img  src="<?= base_url() ?>/img/placeholder.jpg"  alt="" id="gambar" width="350px" height="220px" >
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