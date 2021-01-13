<html lang="en">
<head>
<style type="type/css">
.modal-body {
  white-space: pre-line;
}


.card-head{
  padding-bottom: 100px;
}

.img-user-detail {
  text-align: center;
  
}

.widget-user-head-mod{
    /* border-top-left-radius: .25rem; */
    /* border-top-right-radius: .25rem; */
    height: 160px;
    padding: 1rem;
    text-align: center;
}

.widget-user-foto{
  position: absolute;
  padding-left: 41%;
  padding-top: 10%;
 
  }
.img-user {
  border-radius: 50%;
  width: 150px; 
  height: 150px;
  box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23);
  border: 4px solid #fff;
}

.bg-info-mod{
  background-color: #2b3131;
  color: #fff;
}

.modal-footer-info{
  flex: auto;
  display: inline-flex;
}

.latest-img{
  border-radius: 50%;
  height: 130px;
  max-width: 100%;
  width: 130px;
}

.body-detail-user{


}

.tabel-detail-user{
  
margin: auto;
width: 80%;
}

.table_attend{
  border-collapse: inherit;
  text-align: center;
  font-family: sans-serif;
  font-size: 5px;
}

.td_name{
  text-align: right;
}

.td_inout{
  color: white;
  background-color: #ffc107;
  font-style: italic;
}

.td_in{
  color: #030303;
  background-color: #f1f1f1;
}

.td_out{
  color: #080808;
  background-color: #f1f1f1;
}

.td_in_late{
  color: #ffffff;
  background-color: #db3545;
}


.td_red{
  color: white;
  background-color: #db3545;
}

.td_blue{
  color: white;
  background-color: #343a40;
}

.td_permit{
  color: white;
  background-color: lawngreen;
}

.td_select_hour{
  display: flex;
  
}

.header-search{
  display: inline-flex;
  float: right;
}


</style>
</head>
<body>
    

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
                                    </pre>
                                    </body>                                 
</html>          