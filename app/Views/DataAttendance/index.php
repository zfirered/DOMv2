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
<?php echo $bulan;?>  <?php echo $tahun;?>                             
</div>
                                <div class="card-body" >
                                    <!-- TABLE DATA PEGAWAI -->



                                    <!-- /.TABLE DATA PEGAWAI -->
                                <pre>

                                    <table class="table_attend" cellpadding="5" >
                                    <tr>
                                    <td></td>
                                    <?php 
                                    foreach ($hari as $value):
                                         
                                    ?>
                                    
                                    <td colspan="4" class=<?php $d= strftime("%A", date($value)); 
                                                        if($d==="Sunday"OR$d==="Saturday"){
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
                                   
                                    <td colspan="4" class=<?php $d= strftime("%A", date($value)); 
                                                        if($d==="Sunday"OR$d==="Saturday"){
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
                                        $k[]= $value['first_name'];
                                    }
                                    $i=0;
                                    
                                    foreach ($absen as $arr):
                                    ?>
                                    <tr>
                                   
                                    <td class="td_name"> <?php echo $k[$i++]; ?></td>
                                    <?php 
                                    foreach ($hari as $value => $h):
                                    ?>

                                    <?php
                                    $absen_harian = array_search(strftime("%Y-%m-%d", date($h)), array_column($arr, 'date')) !== false ? $arr[array_search(strftime("%Y-%m-%d", date($h)), array_column($arr, 'date'))] : '' ;
                                    ?>

                                    <td <?=  @$absen_harian['jam_masuk'] == false ? '-' :  'class="td_in"' ?>><?=  @$absen_harian['jam_masuk'] == false ? '-' :  $absen_harian['jam_masuk']?></td>
                                    <td <?=  @$absen_harian['jam_pulang'] == false ? '-' :  'class="td_out"' ?>><?=  @$absen_harian['jam_pulang'] == false ? '-' :  $absen_harian['jam_pulang']?></td>
                                    <td <?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' :  'class="td_in"' ?>><?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' : $absen_harian['jam_masuk_lembur']?></td>
                                    <td <?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' :  'class="td_out"' ?>><?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' : $absen_harian['jam_masuk_lembur']?></td>
                                    
                                    <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>

                                    </tr>
                                    </table>
                                    </div>
                                    </pre>
                                   
                                   
                                  
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