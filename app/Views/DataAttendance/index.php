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
<select class="form-control" name="divisi">
                        <option value="">- All Division -</option>
                        <?php foreach($divisi as $div): ?>
                            <option value="<?= $div['id']; ?>" <?= ($div['id'] == $divisi_id) ? 'selected' : '' ?>><?= $div['division_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
&nbsp;&nbsp;&nbsp;
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
                    <button type="submit" name="submit" value="data" class="btn btn-primary">Show </button>
                    &nbsp;&nbsp;&nbsp;

                <button type="submit" name="submit" value="print" class="btn btn-primary">Download Pdf</button> 
                                                    </div>
                                                </form>                  
</div>
                                <div class="card-body" >
                                    <!-- TABLE DATA PEGAWAI -->



                                    <!-- /.TABLE DATA PEGAWAI -->
                                <pre>

                                    <table class="table_attend" cellpadding="5">
                                    <tr>
                                    <td></td>
                                    <?php 
                                    foreach ($hari as $value):
                                         
                                    ?>
                                    
                                    <td colspan="4" class=<?php $cek= date_event($value);
                                                        if($cek=="Y"){
                                                            echo '"td_red"';
                                                        }else{
                                                            echo '"td_blue"';  
                                                        }?> 
                                                ><?= strftime("%A", date($value)); ?></td>
                                    <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <?php 
                                    foreach ($hari as $value):
                                         
                                    ?>
                                   
                                    <td colspan="4" class=<?php $cek= date_event($value);
                                                        if($cek=="Y"){
                                                            echo '"td_red"';
                                                        }else{
                                                            echo '"td_blue"';  
                                                        }?> 
                    ><?= strftime("%d", date($value)); ?></td>
                                    <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                    <td>Employe Name</td>
                                    <?php 
                                    foreach ($hari as $value):
                                         
                                    ?> 
                                    <td class="td_inout">In</td>
                                    <td class="td_inout">Out</td>
                                    <td class="td_inout">OT-in</td>
                                    <td class="td_inout">OT-out</td>

                                    <?php endforeach; ?>
                                    </tr>

                                    
                                    
                                
                                    <?php 
                                    $k= array();
                                    foreach ($employe as $value){
                                        $nip[]= $value['nip'];
                                        $namef[]= $value['first_name'];
                                        $namel[]= $value['last_name'];


                                    }
                                    $i_nip=0;
                                    $i_namef=0;
                                    $i_namel=0;
                                    $i_nip=0;

                                    
                                    foreach ($absen as $arr):
                                    $id= $nip[$i_nip++];

                                    ?> 
                                    <tr>
                                    <td class="td_name"> <?php echo $namef[$i_namef++]; ?> <?php echo $namel[$i_namel++]; ?></td>
                                    <?php 
                                    foreach ($hari as $value => $h):
                                    ?>

                                    <?php
                                    $absen_harian = array_search(strftime("%Y-%m-%d", date($h)), array_column($arr, 'date')) !== false ? $arr[array_search(strftime("%Y-%m-%d", date($h)), array_column($arr, 'date'))] : '' ;
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
                                    <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>

                                    </tr>
                                    </table>
                                    </div>
                                    </pre>
                                   
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