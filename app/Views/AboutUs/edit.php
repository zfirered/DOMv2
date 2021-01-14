<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">About Us</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                            <!-- Isi Konten -->
                            <form class="form-horizontal" action="/aboutus/update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Ubah Data Perusahaan</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="naper" value="<?= $data['naper']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Nomor Fax</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="nofax" value="<?= $data['nofax']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Nomor Telepon</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="notelp" value="<?= $data['notelp']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Alamat Email</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="email" value="<?= $data['email']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="website" value="<?= $data['website']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Alamat Kantor</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="alamatkantor" value="<?= $data['alamatkantor']; ?>" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Logo</label>
                                                        <div class="custom-file">
                                                            <input type="file" id="file" name="logo">
                                                            <button id="pilih" type="" style="display: none;"></button>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-sm-8">
                                                            <img src="/img/<?= ($data['logo']) ? $data['logo'] : 'placeholder.jpg'; ?>" alt="" id="gambar" width="350px" height="220px">
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
                                            <a href="/employe" type="submit" class="btn btn-danger">Back</a>
                                        </div>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection('content'); ?>