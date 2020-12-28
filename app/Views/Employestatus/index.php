<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Employe Status</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Master Employe Status</li>
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
                                <a href="/employestatus/create" class="btn btn-sm btn-info float-left">Add New</a>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE DATA PEGAWAI -->
                                    <table class="table table-hover text-nowrap" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Status Name</th>
                                                <th scope="col">Describe</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        $i=1;
                                                        $a=1;
                                                        $b=1;
                                                     foreach($data as $row):?>
                                            <tr>
                                                <th scope=><?= $i++ ?>.</th>
                                                <td><?= $row['status_name'];?></td>
                                                <td><?= $row['status_desc'];?></td>
                                                <td>
                                                
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?= $a++ ?>">
                                                        Detail
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop<?= $b++ ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel"><?= $row['status_name'];?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><?= $row['status_desc'];?></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                              
                                                                <a href="employestatus/edit/<?= $row['id'];?>" class="btn btn-primary">Edit</a>
                                                                <a href="employestatus/delete/<?= $row['id'];?>" class="btn btn-danger">Delete</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                                                 
                                                                </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content'); ?>