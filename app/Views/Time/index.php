<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Time of Work</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Master Time of Work</li>
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
                                <div class="card-body" >
                                    <!-- TABLE DATA PEGAWAI -->
                                    
                    <table class="table table-hover text-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Describe Time</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>In</td>
                                        <form action="time/update" method="post">

                                        <td class="td_select_hour"> 
                        <input type="text" name="id" value="<?= $timeIn->id_time; ?>" hidden>
                        <select class="form-control" name="hour" style="width:120px">
                        <option value="" disabled selected>- Hour -</option>
                        <?php for($i = 00; $i <= 23; $i++): ?>
                            <option value="<?= $i ?>" <?php $arr=$timeIn->start; $h=explode(":", $arr); ?> <?= ($i == $h[0]) ? 'selected' : '' ?>><?= zero($i); ?></option>
                        <?php endfor; ?>
                    </select>
                    &nbsp;&nbsp;:&nbsp;&nbsp;
                    <select class="form-control" name="minute" style="width:130px">
                        <option value="" disabled selected>- Minute -</option>
                        <?php for($i = 00; $i <= 59; $i++): ?>
                            <option value="<?= $i ?>" <?php $arr=$timeIn->start; $h=explode(":", $arr); ?> <?= ($i == $h[1]) ? 'selected' : '' ?>><?= zero($i); ?></option>
                        <?php endfor; ?>
                    </select> </td>
                                        <td>
                                        <button type="submit" class="btn btn-info">Update</button></td>
                                        </tr>
                                        </form>

                                        <tr>
                                        <td>Out</td>

                                        <form action="time/update" method="post">
                                        <td class="td_select_hour"> 
                                        <input type="text" name="id" value="<?= $timeOut->id_time; ?>" hidden>
                                        <select class="form-control" name="hour" style="width:120px">
                        <option value="" disabled selected>- Hour -</option>
                        <?php for($i = 00; $i <= 23; $i++): ?>
                            <option value="<?= $i ?>" <?php $arr=$timeOut->start; $h=explode(":", $arr); ?> <?= ($i == $h[0]) ? 'selected' : '' ?>><?= zero($i); ?></option>
                        <?php endfor; ?>
                    </select> 
                    &nbsp;&nbsp;:&nbsp;&nbsp;
                    <select class="form-control" name="minute" style="width:130px">
                        <option value="" disabled selected>- Minute -</option>
                        <?php for($i = 00; $i <= 59; $i++): ?>
                            <option value="<?= $i ?>" <?php $arr=$timeOut->start; $h=explode(":", $arr); ?> <?= ($i == $h[1]) ? 'selected' : '' ?>><?= zero($i); ?></option>
                        <?php endfor; ?>
                    </select> </td>
                                        <td>
                                     <button type="submit" class="btn btn-info">Update</button>
                                                                        </td>
                                        </tr>
                                        </form>

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