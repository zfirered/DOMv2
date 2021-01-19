<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Detail Submission Overtime Approver</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Detail Submission Overtime Approver</li>
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
                                </div>
                                <div class="card-body">
                                <table class="table table-hover text-nowrap" style="width:50%">
                                <form class="form-horizontal" action="/userSubmissionOvertime/update" method="post">
                                            <tr>
                                            <input type="text" class="form-control"  name="idSub" value="<?= $data->id_sub_ot; ?>" hidden>
                                                <th scope="col">Submision Date</th>
                                                <td><?= strftime("%d %b %Y", date(strtotime($data->submission_date)));?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Implementation Date</th>
                                                <td><?= strftime("%d %b %Y", date(strtotime($data->implementation_date)));?></td>
                                            </tr>
                                             <tr>
                                                <th scope="col">Describe User</th>
                                                <td><textarea class="form-control" cols="2" rows="2"  readonly><?= $data->user_desc;?></textarea></td>
                                            </tr>
                                             <tr>
                                                 <th scope="col">User</th>
                                                <td><?= $data->position_name;?> - <?= $data->first_name;?> <?= $data->last_name;?></td>
                                            </tr>
                                                <tr>
                                                <th scope="col">Describe Approver</th>
                                                <td><textarea class="form-control" cols="2" rows="2" name="approver_desc" <?= ($data->status_sub_ot == 'P') ? '' : 'readonly' ?>  required> <?= ($data->status_sub_ot == 'P') ? '' : $data->approver_desc ?></textarea> </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Status</th>
                                                <td><?php if($data->status_sub_ot == "P"){
                                                    echo "Pending";
                                                     }else if ($data->status_sub_ot == "Y"){
                                                        echo "Approved";
                                                     }else if ($data->status_sub_ot == "N"){
                                                        echo "Reject";
                                                     }
                                                ;?></td>
                                                <tr>
                                                                                
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                <div class="float-left"  <?= ($data->status_sub_ot == 'P') ? '' : 'hidden' ?>>
                                <button type="submit" name="submit" value="approve" onclick="<?php $alert='APPROVE'; echo alert($alert); ?>" class="btn btn-info">Approve</button>
                                <button type="submit" name="submit" value="reject" onclick="<?php $alert='REJECT'; echo alert($alert); ?>" class="btn btn-danger">Reject</button> 
                                </div>
                                <div class="float-right">
                                <a href="/userSubmissionOvertime/approver" class="btn btn-danger">Back</a> 
                                    </div>
                                    </form>
                                </div>
                                </div>

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