<?php include 'src/header.php'; ?>
                    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">view_list</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Data Trend Linear</h4>
                <a href="linier_cetak.php" target="_blank()"><button type="button" class='d-sm-inline-block btn btn-sm btn-success shadow-sm'><span aria-hidden="true"></span>Cetak</button></a>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Hasil</th>
                                <th class="text-center">MSE</th>
                                <th class="text-center">MAD</th>
                                <th class="text-center">MAPE</th>
                                <th class="disabled-sorting text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM data_linier");
                                while($data = mysqli_fetch_array($query)){
                              ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $data['bulan'] ?></td>
                                <td><?= $data['tahun'] ?></td>
                                <td><?= round($data['hasil_linier'], 2) ?></td>
                                <td><?= round($data['mse'], 2) ?></td>
                                <td><?= round($data['mad'], 2) ?></td>
                                <td><?= round($data['mape'], 2) ?></td>
                                <td>
                                  <a href="linier_hapus.php?id_linier=<?php echo $data['id_linier']; ?>"><button type="button" class='d-sm-inline-block btn btn-sm btn-danger shadow-sm'><span aria-hidden="true"></span>Delete</button></a>
                              </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'src/footer.php'; ?>        