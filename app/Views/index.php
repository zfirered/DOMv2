<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Home</li>
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
                                <a href="/bankAccount/create" class="btn btn-sm btn-info float-left">Add New</a>
                                <div class="header-search">
                                <form action="/bankAccount/htmlToPDF" method="post">
                                <button type="submit" name="submit" value="print" class="btn btn-primary">Download Pdf</button>
                                </form>
                                </div>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE DATA PEGAWAI -->
                                    <h1>Hello World</h1>
                                    <!-- /.TABLE DATA PEGAWAI -->
                                </div>
                                <div class="card-footer clearfix">
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