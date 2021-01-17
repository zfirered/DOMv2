<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Position</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Master Position</li>
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
                                <a href="/position/create" class="btn btn-sm btn-info float-left">Add New</a>
                                <div class="header-search">
                                <form action="/position/htmlToPDF" method="post">
                                <button type="submit" name="submit" value="print" class="btn btn-primary">Download Pdf</button>
                                </form>
                                </div>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE DATA PEGAWAI -->
                                    <table class="table table-hover text-nowrap" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Position Name</th>
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
                                                <td><?= $row['position_name'];?></td>
                                                <td><?= $row['position_desc'];?></td>
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
                                                                    <h5 class="modal-title" id="staticBackdropLabel"><?= $row['position_name'];?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><?= $row['position_desc'];?></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <div class="modal-footer-info" >
                                                       <span class="users-list-name">Level: <?= $row['level']; ?></span>
                                                                                                                            </div>
                                                                <a href="position/edit/<?= $row['id'];?>" class="btn btn-primary">Edit</a>
                                                                <a href="position/delete/<?= $row['id'];?>" class="btn btn-danger">Delete</a>
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