<html>
<style>

    .header{

    text-align: center;
        padding: 10px;
    }
  
    p1 {
        font-weight: bold;
        font-size: 25pt;
    }
    p2 {
        font-size: 12pt;
    }
    p3 {
        font-weight: bold;
        font-size: 10pt;
    }
    p4 {
        font-size: 10pt;
    }

    hr{
        border:3px solid #000000;
    }
    
    .content {
       padding-top: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 5pt;

    }
  
    table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
        background-color: lightgrey;
    }
  
    table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }

    .td_in{
        color: #030303;
        background-color: #f1f1f1;
    }

    .td_out{
        color: #080808;
        background-color: #f1f1f1;
}

    .td_inout{
        color: white;
        background-color: #ffc107;
        font-style: italic;
}

    .td_red{
        color: white;
        background-color: #db3545;
    }

    .td_blue{
        color: white;
        background-color: #343a40;
    }

    .td_in_late{
        color: #ffffff;
        background-color: #db3545;
    }

    .td_permit{
        color: white;
        background-color: lawngreen;
    }

</style>
<body>
    <section>
    <div class="header">
        <p1>Nama Perusahaan</p1> <br>
        <p3>Address:..... Phone:..... Email:...... Fax:....</p3> <br><br>
        <p2>Data Attendance Report</p2> <br>
        <p4><?= $namadivisi->division_name; ?> Division</p4><br>
        <p4><?= $bulanlaporan; ?> <?= $tahun; ?></p4>
        </div>
        <hr>
        <div class="content">
        <table class="table" cellpadding="5">
                                    <tr>
                                    <td></td>
                                    <?php 
                                    foreach ($hari_pertama as $value):
                                         
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
                                    foreach ($hari_pertama as $value):
                                         
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
                                    foreach ($hari_pertama as $value):
                                         
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
                                    foreach ($hari_pertama as $value => $h):
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
                                    <td <?=  @$absen_harian['jam_masuk'] == false ? 'class="td_in"' :  cekLate($absen_harian['jam_masuk'])?>><?=  @$absen_harian['jam_masuk'] == false ? '-' :  $absen_harian['jam_masuk']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang'] == false ? '-' :  $absen_harian['jam_pulang']?></td>
                                    <td class="td_in"><?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' : $absen_harian['jam_masuk_lembur']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang_lembur'] == false ? '-' : $absen_harian['jam_pulang_lembur']?></td>
                                    
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>

                                    </tr>
                                    </table>
<br>
                                    <table class="table" cellpadding="5">
                                    <tr>
                                    <td></td>
                                    <?php 
                                    foreach ($hari_kedua as $value):
                                         
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
                                    foreach ($hari_kedua as $value):
                                         
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
                                    foreach ($hari_kedua as $value):
                                         
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
                                    foreach ($hari_kedua as $value => $h):
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
                                    <td <?=  @$absen_harian['jam_masuk'] == false ? 'class="td_in"' :  cekLate($absen_harian['jam_masuk'])?>><?=  @$absen_harian['jam_masuk'] == false ? '-' :  $absen_harian['jam_masuk']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang'] == false ? '-' :  $absen_harian['jam_pulang']?></td>
                                    <td class="td_in"><?=  @$absen_harian['jam_masuk_lembur'] == false ? '-' : $absen_harian['jam_masuk_lembur']?></td>
                                    <td class="td_out"><?=  @$absen_harian['jam_pulang_lembur'] == false ? '-' : $absen_harian['jam_pulang_lembur']?></td>
                                    
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>

                                    </tr>
                                    </table>
                                    </div>

                                    </section>
</body>
</html>