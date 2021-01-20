<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Employe Status</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Employe Status</li>
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
                    <form class="form-horizontal" action="/employestatus/update" method="post" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Status Name</label>
                                            <input type="text" name="id" value="<?= $data->id; ?>" hidden>
                                            <input type="text" name="stat_nm_old" value="<?= $data->status_name; ?>" hidden>
                                            <input type="text" class="form-control <?= ($validation->hasError('stat_nm')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="stat_nm" value="<?= (old('stat_nm')==FALSE) ? $data->status_name : old('stat_nm') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('stat_nm'); ?>
                                            </div>
                                           </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label>Describe</label>
                                            <textarea class="form-control <?= ($validation->hasError('stat_desc')) ? 'is-invalid' : '' ?>" rows="5" placeholder="Enter ..." type="text" name="stat_desc"><?= (old('stat_desc')==FALSE) ? $data->status_desc : old('stat_desc') ?></textarea>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('stat_desc'); ?>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                <!-- /.card-body -->
                                <div class="card-footer" >
                                <div class="float-right">
                                <button type="submit" class="btn btn-info">Update</button>
                                    <a href="/employestatus" type="submit" class="btn btn-danger">Back</a> 
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