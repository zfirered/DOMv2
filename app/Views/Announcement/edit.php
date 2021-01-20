<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Announcement</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Announcement</li>
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
                    <form class="form-horizontal" action="/announcement/update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <input type="text" class="form-control" name="id" value="<?= $data->id; ?>" hidden>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control" name="title" value="<?= $data->title; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Body</label>
                                                <input type="text" class="form-control" name="body" value="<?= $data->body; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Thumbnail</label>
                                                <div class="custom-file">
                                                    <input type="file" id="file" name="thumbnail">
                                                    <button id="pilih" type="" style="display: none;"></button>
                                                    <input type="text" name="thumbnail_old" value="<?= $data->thumbnail; ?>" hidden>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <img src="<?= base_url() ?>/img-announcement/<?= $data->thumbnail; ?>" alt="" id="gambar" width="350px" height="220px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info">Update</button>
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
<?= $this->endSection(); ?>