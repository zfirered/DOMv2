<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Employe</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Employe</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col md-6">
                            <!-- CARD DATA PEGAWAI -->
                            <div class="card">
                                <div class="card-header">
                                <a href="/employe/create" class="btn btn-sm btn-info float-left">Add New</a> 
                                <div class="header-search">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                                        Download Pdf
                                                    </button>
                                </div>
                                </div>
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Download Pdf</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="white-space:normal">
                                                                 <div class="body-detail-user">

                                                                 <form class="form-horizontal" action="/employe/htmlToPDF" method="post" >
                                                                   <table class="tabel-detail-user">
                                                                             <tr>
                                                                             <th>Division</th>
                                                                             <td> <select class="form-control" name="div" required>
                                                                             <option value="">- Choose Division -</option>
                                                                             <?php foreach($data2 as $row): ?>
                                                                                <option value="<?= $row['id']; ?>"><?= $row['division_name']; ?></option>
                                                                            <?php endforeach; ?>
                                                                             </select>
                                                                            </td>
                                                                         </tr>
                                                                     </table>

                                                                     </div>
                                                                 </div>
                                                                <div class="modal-footer">
                                                              
                                                                <button type="submit" class="btn btn-primary">Download</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                                             </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                <div class="card-body">
                                    <!-- TABLE DATA PEGAWAI -->
                                    <table class="table table-hover text-nowrap" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Division</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $a = 1;
                                            $b = 1;
                                            foreach ($data as $row) : ?>
                                                <tr>
                                                    <th scope=><?= $i++ ?>.</th>
                                                    <td><?= $row['nip']; ?></td>
                                                    <td><?= $row['first_name']; ?> <?= $row['last_name']; ?></td>
                                                    <td><?= $row['division_name']; ?></td>
                                                    <td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop<?= $b++ ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                                                        <div class="modal-dialog modal-dialog-centered " style="max-width:50%">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                               
                                            <!-- isi detail -->                                                       
                                     <div class="container">
                                     <div class="card-body">
                                         <div class="card-head">
                                     <div class="card card-widget widget-user">
                                         <div class="widget-user-head-mod bg-info-mod">
                                         <h3 class="widget-user-username"><?= $row['nip'];?></h3>
                                         <h5 class="widget-user-desc"><?= $row['first_name'];?> <?= $row['last_name'];?></h4>
                                                     </div>
                                     <div class="widget-user-foto">            
                                     <img class="img-user" src="<?= base_url() ?>/img/<?= $row['foto'];?>"  alt="" >
                                     
                                                     
                                     </div>
                                     </div>
                                     </div>
                                        <div class="row">
                                            
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Division</label>
                                             <input type="text" class="form-control" value="<?= $row['division_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Position</label>
                                             <input type="text" class="form-control" value="<?= $row['position_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Status</label>
                                             <input type="text" class="form-control" value="<?= $row['status_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Bank Rekening</label>
                                             <input type="text" class="form-control" value="<?= $row['bank_name'];?> - <?= $row['bank_no'];?> An. <?= $row['bank_account'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>BPJS Kesehatan</label>
                                             <input type="text" class="form-control" value="<?= $row['bpjs_ks'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>BPJS Ketenagakerjaan</label>
                                             <input type="text" class="form-control" value="<?= $row['bpjs_tk'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Insurance</label>
                                             <input type="text" class="form-control" value="<?= $row['insurance'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>NIK KTP</label>
                                             <input type="text" class="form-control" value="<?= $row['ktp'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Phone Number</label>
                                             <input type="text" class="form-control" value="<?= $row['no_telp'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Email Address</label>
                                             <input type="text" class="form-control" value="<?= $row['email'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Last Education</label>
                                             <input type="text" class="form-control" value="<?= $row['education'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Right to Leave</label>
                                             <input type="text" class="form-control" value="<?= $row['right_to_leave'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Address</label>
                                             <textarea class="form-control" cols="5" rows="5"  readonly><?= $row['address'];?></textarea>
                                              </div>
                                                 </div> 
                                    
                                    
                                </div>
                                    </div>
                                      </div>
                                                     <div class="modal-footer">
                                                              <div class="modal-footer-info" >
                                                              <span class="users-list-name">Join Date: <?= date('d F Y', strtotime($row['join_date'])); ?></span>
                                                              
                                                              </div>
                                                                <a href="employe/edit/<?= $row['nip'];?>" class="btn btn-primary">Edit</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.Modal -->
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                    <!-- /.TABLE DATA PEGAWAI -->
                                </div>
                                <div class="card-footer clearfix">
                                    <!-- /.ISI FOOTER TABEL -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Employe</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        <?php
                                        foreach ($latest as $row) : ?>
                                            <li>
                                                <img src="<?= base_url() ?>/img/<?= $row['foto']; ?>" alt="User Image">
                                                <a href=# class="users-list-name" data-toggle="modal" data-target="#staticBackdrop<?= $a++ ?>"><?= $row['first_name']; ?> <?= $row['last_name']; ?></a>
                                                <span class="users-list-date"><?= date('d F Y', strtotime($row['join_date'])); ?></span>
                                            </li>
                                            <!-- /.detail latest -->
                                            <div class="modal fade" id="staticBackdrop<?= $b++ ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " style="max-width:50%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <!-- isi detail -->
                                                        <div class="container">
                                                            <div class="card-body">
                                                                <div class="card-head">
                                                                    <div class="card card-widget widget-user">
                                                                        <div class="widget-user-head-mod bg-info-mod">
                                                                            <h3 class="widget-user-username"><?= $row['nip']; ?></h3>
                                                                            <h5 class="widget-user-desc"><?= $row['first_name']; ?> <?= $row['last_name']; ?></h4>
                                                                        </div>
                                                                        <div class="widget-user-foto">
                                                                            <img class="img-user" src="<?= base_url() ?>/img/<?= $row['foto']; ?>" alt="">


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Division</label>
                                                                            <input type="text" class="form-control" value="<?= $row['division_name']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Position</label>
                                                                            <input type="text" class="form-control" value="<?= $row['position_name']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Status</label>
                                                                            <input type="text" class="form-control" value="<?= $row['status_name']; ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Bank Rekening</label>
                                                                            <input type="text" class="form-control" value="<?= $row['bank_name']; ?> - <?= $row['bank_no']; ?> An. <?= $row['bank_account']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>BPJS Kesehatan</label>
                                                                            <input type="text" class="form-control" value="<?= $row['bpjs_ks']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>BPJS Ketenagakerjaan</label>
                                                                            <input type="text" class="form-control" value="<?= $row['bpjs_tk']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Insurance</label>
                                                                            <input type="text" class="form-control" value="<?= $row['insurance']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Insurance</label>
                                                                            <input type="text" class="form-control" value="<?= $row['insurance']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>NIK KTP</label>
                                                                            <input type="text" class="form-control" value="<?= $row['ktp']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Phone Number</label>
                                                                            <input type="text" class="form-control" value="<?= $row['no_telp']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Email Address</label>
                                                                            <input type="text" class="form-control" value="<?= $row['email']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Last Education</label>
                                                                            <input type="text" class="form-control" value="<?= $row['education']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <textarea class="form-control" cols="5" rows="5" readonly><?= $row['address']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                            <!-- isi detail -->                                                       
                                     <div class="container">
                                     <div class="card-body">
                                         <div class="card-head">
                                     <div class="card card-widget widget-user">
                                         <div class="widget-user-head-mod bg-info-mod">
                                         <h3 class="widget-user-username"><?= $row['nip'];?></h3>
                                         <h5 class="widget-user-desc"><?= $row['first_name'];?> <?= $row['last_name'];?></h4>
                                                     </div>
                                     <div class="widget-user-foto">            
                                     <img class="img-user" src="<?= base_url() ?>/img/<?= $row['foto'];?>"  alt="" >
                                     
                                                     
                                     </div>
                                     </div>
                                     </div>
                                        <div class="row">
                                            
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Division</label>
                                             <input type="text" class="form-control" value="<?= $row['division_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Position</label>
                                             <input type="text" class="form-control" value="<?= $row['position_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Status</label>
                                             <input type="text" class="form-control" value="<?= $row['status_name'];?>" readonly>
                                              </div>
                                                 </div> 
                                                
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Bank Rekening</label>
                                             <input type="text" class="form-control" value="<?= $row['bank_name'];?> - <?= $row['bank_no'];?> An. <?= $row['bank_account'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>BPJS Kesehatan</label>
                                             <input type="text" class="form-control" value="<?= $row['bpjs_ks'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>BPJS Ketenagakerjaan</label>
                                             <input type="text" class="form-control" value="<?= $row['bpjs_tk'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Insurance</label>
                                             <input type="text" class="form-control" value="<?= $row['insurance'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>NIK KTP</label>
                                             <input type="text" class="form-control" value="<?= $row['ktp'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Phone Number</label>
                                             <input type="text" class="form-control" value="<?= $row['no_telp'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Email Address</label>
                                             <input type="text" class="form-control" value="<?= $row['email'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Last Education</label>
                                             <input type="text" class="form-control" value="<?= $row['education'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Right to Leave</label>
                                             <input type="text" class="form-control" value="<?= $row['right_to_leave'];?>" readonly>
                                              </div>
                                                 </div> 
                                                 <div class="col-sm-6">
                                             <!-- text input -->
                                             <div class="form-group">
                                             <label>Address</label>
                                             <textarea class="form-control" cols="5" rows="5"  readonly><?= $row['address'];?></textarea>
                                              </div>
                                                 </div> 
                                       </div>
                                       </div>
                                      </div>
                                <div class="modal-footer">
                                <div class="modal-footer-info" >
                                                       <span class="users-list-name">Join Date: <?= date('d F Y', strtotime($row['join_date'])); ?></span>
                                                              
                                                              </div>
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                                                         </div>
                                    </div>
                                      </div>
                                        </div>
                                         
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection('content'); ?>