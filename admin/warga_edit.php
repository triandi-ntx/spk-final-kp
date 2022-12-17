<?php
include 'src/header.php';

if(isset($_POST['simpan'])){
  $nik  = $_POST['NIK'];
  $nama  = $_POST['nama_warga'];
  $k1    = $_POST['k1'];
  $k2    = $_POST['k2'];
  $k3    = $_POST['k3'];
  $k4    = $_POST['k4'];
  $k5    = $_POST['k5'];

  $simpan = mysqli_query($koneksi, "UPDATE data_warga SET NIK = '$nik', nama_warga = '$nama', k1 = '$k1', k2 = '$k2', k3 = '$k3', k4 = '$k4', k5 = '$k5' WHERE id_warga = '$_GET[id_warga]'");
  echo "<script>alert('Data Berhasil Di Simpan');window.location='data_warga.php'</script>";

}
?>
                    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">edit</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Data Warga</h4>
                    <div class="table-responsive">
                        <?php
                        $id    = $_GET['id_warga'];
                        $query = mysqli_query($koneksi, "SELECT * FROM data_warga WHERE id_warga = '$id'");
                        $data  = mysqli_fetch_array($query);
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                              <label class="form-control-label" for="NIK">Nik</label>
                              <input type="text" class="form-control" name="NIK" value="<?php echo $data['NIK'] ?>" placeholder="Input Nik Warga" required>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="nama_warga">Nama Warga</label>
                              <input type="text" class="form-control" name="nama_warga" value="<?php echo $data['nama_warga'] ?>" placeholder="Input Nama Warga" required>
                            </div>
                            <?php
                              $namaKriteria = array();
                              $qry  = mysqli_query($koneksi, "SELECT * FROM data_kriteria");
                              while($dt = mysqli_fetch_array($qry)){
                                array_push($namaKriteria, $dt['nama_kriteria']);
                              }
                            ?>
                            <div class="form-group">
                              <label class="form-control-label" for="k1"><?= $namaKriteria[0] ?></label>
                              <select class="form-control" name="k1" required>
                                <option value="3" <?php if($data['k1'] == 3){ echo "selected"; } ?> >60 Tahun</option>
                                <option value="2.5" <?php if($data['k1'] == 2.5){ echo "selected"; } ?> >59 Tahun</option>
                                <option value="2" <?php if($data['k1'] == 2){ echo "selected"; } ?> >58 Tahun</option>
                                <option value="1.5" <?php if($data['k1'] == 1.5){ echo "selected"; } ?> >57 Tahun</option>
                                <option value="1" <?php if($data['k1'] == 1){ echo "selected"; } ?> >56 Tahun</option>
                                <option value="0.55" <?php if($data['k1'] == 0.55){ echo "selected"; } ?> >55 Tahun</option>
                                <option value="0.54" <?php if($data['k1'] == 0.54){ echo "selected"; } ?> >54 Tahun</option>
                                <option value="0.53" <?php if($data['k1'] == 0.53){ echo "selected"; } ?> >53 Tahun</option>
                                <option value="0.52" <?php if($data['k1'] == 0.52){ echo "selected"; } ?> >52 Tahun</option>
                                <option value="0.51" <?php if($data['k1'] == 0.51){ echo "selected"; } ?> >51 Tahun</option>
                                <option value="0.50" <?php if($data['k1'] == 0.50){ echo "selected"; } ?> >50 Tahun</option>
                                <option value="0.49" <?php if($data['k1'] == 0.49){ echo "selected"; } ?> >49 Tahun</option>
                                <option value="0.48" <?php if($data['k1'] == 0.48){ echo "selected"; } ?> >48 Tahun</option>
                                <option value="0.47" <?php if($data['k1'] == 0.47){ echo "selected"; } ?> >47 Tahun</option>
                                <option value="0.46" <?php if($data['k1'] == 0.46){ echo "selected"; } ?> >46 Tahun</option>
                                <option value="0.45" <?php if($data['k1'] == 0.45){ echo "selected"; } ?> >45 Tahun</option>
                                <option value="0.44" <?php if($data['k1'] == 0.44){ echo "selected"; } ?> >44 Tahun</option>
                                <option value="0.43" <?php if($data['k1'] == 0.43){ echo "selected"; } ?> >43 Tahun</option>
                                <option value="0.42" <?php if($data['k1'] == 0.42){ echo "selected"; } ?> >42 Tahun</option>
                                <option value="0.41" <?php if($data['k1'] == 0.41){ echo "selected"; } ?> >41 Tahun</option>
                                <option value="0.40" <?php if($data['k1'] == 0.40){ echo "selected"; } ?> >40 Tahun</option>
                                <option value="0.39" <?php if($data['k1'] == 0.39){ echo "selected"; } ?> >39 Tahun</option>
                                <option value="0.38" <?php if($data['k1'] == 0.38){ echo "selected"; } ?> >38 Tahun</option>
                                <option value="0.37" <?php if($data['k1'] == 0.37){ echo "selected"; } ?> >37 Tahun</option>
                                <option value="0.36" <?php if($data['k1'] == 0.36){ echo "selected"; } ?> >36 Tahun</option>
                                <option value="0.35" <?php if($data['k1'] == 0.35){ echo "selected"; } ?> >35 Tahun</option>
                                <option value="0.34" <?php if($data['k1'] == 0.34){ echo "selected"; } ?> >34 Tahun</option>
                                <option value="0.33" <?php if($data['k1'] == 0.33){ echo "selected"; } ?> >33 Tahun</option>
                                <option value="0.32" <?php if($data['k1'] == 0.32){ echo "selected"; } ?> >32 Tahun</option>
                                <option value="0.31" <?php if($data['k1'] == 0.31){ echo "selected"; } ?> >31 Tahun</option>
                                <option value="0.30" <?php if($data['k1'] == 0.30){ echo "selected"; } ?> >30 Tahun</option>
                                <option value="0.29" <?php if($data['k1'] == 0.29){ echo "selected"; } ?> >29 Tahun</option>
                                <option value="0.28" <?php if($data['k1'] == 0.28){ echo "selected"; } ?> >28 Tahun</option>
                                <option value="0.27" <?php if($data['k1'] == 0.27){ echo "selected"; } ?> >27 Tahun</option>
                                <option value="0.26" <?php if($data['k1'] == 0.26){ echo "selected"; } ?> >26 Tahun</option>
                                <option value="0.25" <?php if($data['k1'] == 0.25){ echo "selected"; } ?> >25 Tahun</option>
                                <option value="0.24" <?php if($data['k1'] == 0.24){ echo "selected"; } ?> >24 Tahun</option>
                                <option value="0.23" <?php if($data['k1'] == 0.23){ echo "selected"; } ?> >23 Tahun</option>
                                <option value="0.22" <?php if($data['k1'] == 0.22){ echo "selected"; } ?> >22 Tahun</option>
                                <option value="0.21" <?php if($data['k1'] == 0.21){ echo "selected"; } ?> >21 Tahun</option>
                                <option value="0.20" <?php if($data['k1'] == 0.20){ echo "selected"; } ?> >20 Tahun</option>
                                <option value="0.19" <?php if($data['k1'] == 0.19){ echo "selected"; } ?> >19 Tahun</option>
                                <option value="0.18" <?php if($data['k1'] == 0.18){ echo "selected"; } ?> >18 Tahun</option>
                                <option value="0.17" <?php if($data['k1'] == 0.17){ echo "selected"; } ?> >17 Tahun</option>
                                <option value="0.16" <?php if($data['k1'] == 0.16){ echo "selected"; } ?> >16 Tahun</option>
                                <option value="0.15" <?php if($data['k1'] == 0.15){ echo "selected"; } ?> >15 Tahun</option>
                                <option value="0.14" <?php if($data['k1'] == 0.14){ echo "selected"; } ?> >14 Tahun</option>
                                <option value="0.13" <?php if($data['k1'] == 0.13){ echo "selected"; } ?> >13 Tahun</option>
                                <option value="0.12" <?php if($data['k1'] == 0.12){ echo "selected"; } ?> >12 Tahun</option>
                                <option value="0.11" <?php if($data['k1'] == 0.11){ echo "selected"; } ?> >11 Tahun</option>
                                <option value="0.10" <?php if($data['k1'] == 0.10){ echo "selected"; } ?> >10 Tahun</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k2"><?= $namaKriteria[1] ?></label>
                              <select class="form-control" name="k2" required>
                                <option value="3" <?php if($data['k2'] == 3){ echo "selected"; } ?> >Ada</option>
                                <option value="1" <?php if($data['k2'] == 1){ echo "selected"; } ?> >Tidak Ada</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k3"><?= $namaKriteria[2] ?></label>
                              <select class="form-control" name="k3" required>
                                <option value="3" <?php if($data['k3'] == 3){ echo "selected"; } ?> >SD</option>
                                <option value="3" <?php if($data['k3'] == 3){ echo "selected"; } ?> >SMP</option>
                                <option value="3" <?php if($data['k3'] == 3){ echo "selected"; } ?> >SMA</option>
                                <option value="1" <?php if($data['k3'] == 1){ echo "selected"; } ?> >Tidak Ada</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k4"><?= $namaKriteria[3] ?></label>
                              <input type="number" name="k4" placeholder="Input Jumlah tanggungan" value="<?php echo $data['k4'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k5"><?= $namaKriteria[4] ?></label>
                              <select class="form-control" name="k5" required>
                                <option value="3" <?php if($data['k5'] == 3){ echo "selected"; } ?> >Ada</option>
                                <option value="1" <?php if($data['k5'] == 1){ echo "selected"; } ?> >Tidak Ada</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <button type="submit" class='d-sm-inline-block btn btn-sm btn-primary shadow-sm' name="simpan"><span aria-hidden="true"></span>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'src/footer.php'; ?>        