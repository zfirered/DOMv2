<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Detail Submission</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Detail Submission</li>
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
                                
                                            <tr>
                                                <th scope="col">Receiver</th>
                                                <td><?= $data->first_name;?> <?= $data->last_name;?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <td><?= strftime("%d %b %Y", date(strtotime($data->created_at)));?></td>
                                            </tr>
                                             <tr>
                                                <th scope="col">Title</th>
                                                <td><?= $data->title;?></td>
                                            </tr>
                                             <tr>
                                                 <th scope="col">Describe</th>
                                                <td><?= $data->body;?></td>
                                            </tr>
                                                <tr>
                                                <th scope="col">Attachment</th>
                                                <td><a href="<?= base_url() ?>/img-memo/<?= $data->attachment; ?>" target="_blank">Downlad</a></td>
                                            </tr>
                            
                                        
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                <div class="float-right">
                                    <a href="/userMemo" class="btn btn-danger">Back</a> 
                                    </div>
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