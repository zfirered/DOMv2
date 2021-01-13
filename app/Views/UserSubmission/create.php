<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Submission</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Add New Submission</li>
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
                        <h3 class="card-title">Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="/userSubmission/save" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Submission For</label>
                                            <select class="form-control" name="sub_for" required>
                                         <option value="">- Choose Submission -</option>
                                         <option value="CUTI">CUTI</option>
                                         <option value="SAKIT">SAKIT</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Approver</label>
                                            <input type="text" name="user" value="<?= $user; ?>" hidden>
                                            <select class="form-control" name="approver" required>
                                         <option value="">- Choose Approver -</option>
                                         <?php foreach($approver as $arr):?>
                                         <option value="<?= $arr['nip']; ?>" <?= ($arr['nip'] == $user) ? 'hidden' : '' ?>><?php echo $arr['first_name']; ?> <?php echo $arr['last_name']; ?> - <?php echo $arr['position_name']; ?> <?php echo $arr['division_name']; ?></option>
                                         <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date Start</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="d_start" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date End</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="d_end" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label>Describe</label>
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." type="text" name="user_desc" required></textarea>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Attachment Foto *Optional</label>
                                            <div class="custom-file">
                                                <input type="file"  id="file" name="foto">
                                                <button id="pilih" type="" style="display: none;"></button>
                                           </div>
                                        </div>
                                        <div class="row"> 
                            
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer" >
                                <div class="float-right">
                                <button type="submit" onclick="<?php $alert='SAVE'; echo alert($alert); ?>" class="btn btn-info">Save</button>
                                    <a href="/userSubmission"  class="btn btn-danger">Back</a> 
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