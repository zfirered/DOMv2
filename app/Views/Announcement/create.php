<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Announcement</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Add New Announcement</li>
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
                    <form class="form-horizontal" action="/announcement/save" method="post">
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Body</label>
                                                <input type="text" class="form-control" name="body">
                                            </div>
                                            <div class="form-group">
                                                <label>Thumbnail</label>
                                                <div class="custom-file">
                                                    <input type="file" id="file" name="foto" required>
                                                    <button id="pilih" type="" style="display: none;"></button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <img src="<?= base_url() ?>/img/placeholder.jpg" alt="" id="gambar" width="350px" height="220px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <a href="/announcement" type="submit" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>