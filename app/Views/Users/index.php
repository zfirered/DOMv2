<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Users</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Users</li>
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
                            <div class="card-body" >
                                    <!-- TABLE DATA PEGAWAI -->
                                    <table class="table table-hover text-nowrap" id="myTable" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status Login</th>
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
                                                <td><?= $row['nip'];?></td>
                                                <td><?= $row['first_name'];?> <?= $row['last_name'];?></td>
                                                <td><?= 
                                                $help="";
                                                if( $row['allow'] == "N"){

                                                    echo "No";
                                                }else{
                                                    echo "Allowed";
                                                }
                                                
                                                ?></td>
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
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Data User</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="white-space:normal">
                                                                 <div class="body-detail-user">

                                                                 <form class="form-horizontal" action="/users/update" method="post" >
                                                                   <table class="tabel-detail-user">
                                                                         <tr>
                                                                             <th>NIP</th>
                                                                             <td> <input type="text" class="form-control" name="nip" value="<?= $row['nip'];?>" readonly></td>
                                                                         </tr>
                                                                         <tr>
                                                                             <th>Name</th>
                                                                             <td> <input type="text" class="form-control" name="name" value="<?= $row['first_name'];?> <?= $row['last_name'];?>" readonly></td>
                                                                         </tr>
                                                                         <tr>
                                                                             <th>Status Login</th>
                                                                             <td> <select class="form-control" name="allow" required>
                                                                                <option value="<?= $row['allow'];?>"> <?= 
                                                                                                                            $help="";
                                                                                                                            if( $row['allow'] == "N"){
                                                                                                                             echo "No </option>
                                                                                                                             <option value='Y'>Allowed</option>";
                                                                                                                            }else{
                                                                                                                              echo "Allowed </option>
                                                                                                                                <option value='N'>No</option>";
                                                                                                                             } 
                                                                                                                             ?>
                                                                                                                    </select>
                                        
                                                                             </td>
                                                                         </tr>
                                                                     </table>

                                                                     </div>
                                                                 </div>
                                                                <div class="modal-footer">
                                                              
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                <a href="users/reset/<?= $row['nip'];?>" class="btn btn-danger">Reset Password</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                                             </form>
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