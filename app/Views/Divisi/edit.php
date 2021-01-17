<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Division</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Division</li>
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
                    <form class="form-horizontal" action="/divisi/update" method="post" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Division Name</label>
                                            <input type="text" name="id" value="<?= $data->id; ?>" hidden>
                                            <input type="text" name="div_nm_old" value="<?= $data->division_name; ?>" hidden>
                                            <input type="text" class="form-control <?= ($validation->hasError('div_nm')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="div_nm" value="<?= (old('div_nm')== FALSE) ? $data->division_name : old('div_nm') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('div_nm'); ?>
                                            </div>
                                           </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label>Describe</label>
                                            <textarea class="form-control <?= ($validation->hasError('div_desc')) ? 'is-invalid' : '' ?>" rows="5" placeholder="Enter ..." type="text" name="div_desc"><?= (old('div_desc')== FALSE) ? $data->division_desc : old('div_desc') ?></textarea>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('div_desc'); ?>
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
                                    <a href="/divisi" type="submit" class="btn btn-danger">Back</a> 
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