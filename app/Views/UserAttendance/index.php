<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Attendance</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Attendance</li>
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
<?php echo month($bulan);?>  <?php echo $tahun;?> 

<form action="" method="post">
<div class="header-search">
<select class="form-control" name="bulan">
                        <option value="" disabled selected>- Choose Month -</option>
                        <?php foreach($all_bulan as $bn => $bt): ?>
                            <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                        <?php endforeach; ?>
                    </select>
&nbsp;&nbsp;&nbsp;
<select class="form-control" name="tahun">
                        <option value="" disabled selected>- Choose Year -</option>
                        <?php for($i = date('Y'); $i >= (date('Y') - 5); $i--): ?>
                            <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>     
&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">
                                                        Show
                                                    </button> 
                                                    </div>
                                                </form>                  
</div>
                                <div class="card-body" >
                                    <!-- TABLE DATA PEGAWAI -->



                                    <!-- /.TABLE DATA PEGAWAI -->

                                    <table class="table_attend" cellpadding="5">
                                    <tr>
                                    <td class="td_inout">Date</td>
                                    <td class="td_inout">In</td>
                                    <td class="td_inout">Out</td>
                                    <td class="td_inout">OT-in</td>
                                    <td class="td_inout">OT-out</td>
                                    </tr>
                                    <?php 
                                    
                                    foreach ($hari as $value => $h):
                                    ?>
                                    <tr>
                                    <td class=<?php $cek= date_event($h);
                                                        if($cek=="Y"){
                                                            echo '"td_red"';
                                                        }else{
                                                            echo '"td_blue"';  
                                                        }?> 
                                                ><?= strftime("%a, %d-%m-%Y", date($h)); ?></td>
                                    <?php
                                    $absen_harian = array_search(strftime("%Y-%m-%d", date($h)), array_column($absen, 'date')) !== false ? $absen[array_search(strftime("%Y-%m-%d", date($h)), array_column($absen, 'date'))] : '' ;
                                    ?>
                                    <?php 
                                    $cek_submission= cekSub(strftime("%Y-%m-%d", date($h)), $id);
                                    if($cek_submission['status'] == "Y"):
                                    ?>
                                    <td colspan="4" class="td_permit"><?php echo $cek_submission['sub'][0]; ?></td>
                                    <?php 
                                    else: ?>
                                    <td <?=  @$absen_harian['jam_masuk'] == false ? 'class="td_in"' :  cekLate($absen_harian['jam_masuk'])?>><?=  @$absen_harian['jam_masuk'] == false ? '&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp&nbsp;' :  $absen_harian['jam_masuk']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang'] == false ? '&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp&nbsp;&nbsp;' :  $absen_harian['jam_pulang']?></td>
                                    <td class="td_in"><?=  @$absen_harian['jam_masuk_lembur'] == false ? '&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp&nbsp;' : $absen_harian['jam_masuk_lembur']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang_lembur'] == false ? '&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp&nbsp;' : $absen_harian['jam_pulang_lembur']?></td>
                                  
                                    <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    
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