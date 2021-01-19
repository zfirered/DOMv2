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
                            <div class="card">
                                <div class="card-header">
                                    <a href="/aboutus/edit" class="btn btn-sm btn-info float-left">Edit</a>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE DATA PEGAWAI -->
                                    <img src="img/<?= $data['logo']; ?>" alt="" class=logo>
                                    <br>
                                    <br>
                                    <h4>
                                        <i class="fas fa-globe"></i> <?= $data['naper']; ?>
                                    </h4>
                                    <i class="fas fa-address-card"></i> Alamat Kantor: <?= $data['alamatkantor']; ?>
                                    <br>
                                    <i class="fas fa-phone"></i> Nomor Telepon: <?= $data['notelp']; ?>
                                    <br>
                                    <i class="fas fa-fax"></i> Nomor Fax: <?= $data['nofax']; ?>
                                    <br>
                                    <i class="fas fa-envelope-square"></i> Email: <?= $data['email']; ?>
                                    <br>
                                    <i class="fas fa-sitemap"></i> Website: <?= $data['website']; ?>

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