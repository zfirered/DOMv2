
                                    <table class="table table-hover text-nowrap" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Position Name</th>
                                                <th scope="col">Describe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        $i=1;
                                                        $a=1;
                                                        $b=1;
                                                     foreach($data as $row):?>
                                            <tr>
                                                <th scope=><?= $i++ ?>.</th>
                                                <td><?= $row['position_name'];?></td>
                                                <td><?= $row['position_desc'];?></td>
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                           
                                        </tbody>
                                    </table>
                                   