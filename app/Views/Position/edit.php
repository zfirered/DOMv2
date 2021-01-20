<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Position</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Position</li>
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
                    <form class="form-horizontal" action="/position/update" method="post" >
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Position Name</label>
                                            <input type="text" name="id" value="<?= $data->id; ?>" hidden>
                                            <input type="text" name="pos_nm_old" value="<?= $data->position_name; ?>" hidden>
                                            <input type="text" class="form-control <?= ($validation->hasError('pos_nm')) ? 'is-invalid' : '' ?>" placeholder="Enter ..." name="pos_nm" value="<?= (old('pos_nm')== FALSE) ? $data->position_name : old('pos_nm') ?>">
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('pos_nm'); ?>
                                            </div>
                                           </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Position Level</label>
                                            <select class="form-control" name="level" >
                        <option value="" disabled selected>- Choose Level -</option>
                        <?php for($i = 1; $i <= 3; $i++): ?>
                            <option value="<?= $i ?>" <?= ($i == $data->level) ? 'selected' : ''  ?>><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>                                        
                                 </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label>Describe</label>
                                            <textarea class="form-control <?= ($validation->hasError('pos_desc')) ? 'is-invalid' : '' ?>" rows="5" placeholder="Enter ..." type="text" name="pos_desc" ><?= (old('pos_desc')== FALSE) ? $data->position_desc : old('pos_desc') ?></textarea>
                                            <div class="invalid-feedback">
                                            <?= $validation->getError('pos_desc'); ?>
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
                                    <a href="/position" type="submit" class="btn btn-danger">Back</a> 
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