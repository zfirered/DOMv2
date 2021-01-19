<html>
<style>
    @page { size: A4 }

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
</style>
<body class="A4">
    <section>
    <div class="header">
        <p1>Nama Perusahaan</p1> <br>
        <p3>Address:..... Telp:..... Email:...... Fax:....</p3> <br><br>
        <p2>Data Status Employe Report</p2> <br>
        <p4><?= $bulan; ?> <?= $tahun; ?></p4>
        </div>
        <hr>
        <div class="content">
        <table class="table">
            <thead>
            <thead>
                                            <tr>
  
                                                <th>#</th>
                                                <th>Name Status</th>
                                                <th>Describe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        $i=1;
                                                        $a=1;
                                                        $b=1;
                                                     foreach($data as $row):?>
                                            <tr>
                                                <td><?= $i++ ?>.</td>
                                                <td><?= $row['status_name'];?></td>
                                                <td><?= $row['status_desc'];?></td>

                                            </tr>
                                            <?php endforeach; ?>
                                           
                                        </tbody>
                                    </table>
                                    </div>

                                    </section>
</body>
</html>