<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Memo</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">User Memo</li>
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
                                <a href="/userMemo/create"  class="btn btn-sm btn-info float-left">Create</a>
                                <a href="/userMemo/memoSend"  class="btn btn-sm btn-info float-left">Memo Send</a>
                                </div>
                                <div class="card-body">
                                <table class="table table-hover text-nowrap" id="myTable" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">From</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        $i=1;
                                                       foreach($data as $row):?>
                                            <tr>
                                                <th scope=><?= $i++ ?>.</th>
                                                <td><?= $row['title'];?></td>
                                                <td><?= strftime("%d %b %Y", date(strtotime($row['created_at'])));?></td>
                                                <td><?= $row['first_name'];?> <?= $row['last_name'];?></td>
                                                <td><a href="userMemo/detail/<?= $row['id'];?>" class="btn btn-primary">Detail</a></td>

                                            </tr>
                                            <?php endforeach; ?>
                                           
                                        </tbody>
                                    </table>
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