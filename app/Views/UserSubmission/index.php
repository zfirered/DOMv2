<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data User Submission</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data User Submission</li>
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
                                <a href="/userSubmission/create"  class="btn btn-sm btn-info float-left">Add New</a>
                                </div>
                                <div class="card-body">
                                <table class="table table-hover text-nowrap" id="myTable" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Submission</th>
                                                <th scope="col">Submission Date</th>
                                                <th scope="col">Approver</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        $i=1;
                                                       foreach($data as $row):?>
                                            <tr>
                                                <th scope=><?= $i++ ?>.</th>
                                                <td><?= $row['submission_for'];?></td>
                                                <td><?= strftime("%d %b %Y", date(strtotime($row['submission_date'])));?></td>
                                                <td><?= $row['position_name'];?></td>
                                                <td><?php if($row['status_sub'] == "P"){
                                                    echo "Pending";
                                                     }else if ($row['status_sub'] == "Y"){
                                                        echo "Approved";
                                                     }else if ($row['status_sub'] == "N"){
                                                        echo "Reject";
                                                     }
                                                ;?></td>

                                                <td><a href="userSubmission/detail/<?= $row['id_sub'];?>" class="btn btn-primary">Detail</a></td>

                                            </tr>
                                            <?php endforeach; ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                <div class="float-right" <?= ($user->level == 3) ? 'hidden' : '' ?>>
                                <a href="/userSubmission/approver" class="btn btn-danger">Approve</a> 
                                  </div>
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