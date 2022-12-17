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

  $simpan = mysqli_query($koneksi, "INSERT INTO data_warga VALUES('','$nik','$nama','$k1','$k2','$k3','$k4','$k5')");
  echo "<script>alert('Data Berhasil Di Simpan');window.location='data_warga.php'</script>";

}
?>
                    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">add</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tambah Data Warga</h4>
                    <div class="table-responsive">
                        <form action="" method="POST">
                        <div class="form-group">
                              <label class="form-control-label" for="NIK">NIK</label>
                              <input type="text" class="form-control" name="NIK" placeholder="Input Nik Warga">
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="nama_warga">Nama Warga</label>
                              <input type="text" class="form-control" name="nama_warga" placeholder="Input Nama Lengkap Warga" required>
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
                                <option value="">-- <?= $namaKriteria[0] ?> --</option>
                                <option value="3"> >60 Tahun</option>
                                <option value="2.5">59 Tahun</option>
                                <option value="2">58 Tahun</option>
                                <option value="1.5">57 Tahun</option>
                                <option value="1">56 Tahun</option>
                                <option value="0.55">55 Tahun</option>
                                <option value="0.54">54 Tahun</option>
                                <option value="0.53">53 Tahun</option>
                                <option value="0.52">52 Tahun</option>
                                <option value="0.51">51 Tahun</option>
                                <option value="0.50">50 Tahun</option>
                                <option value="0.49">49 Tahun</option>
                                <option value="0.48">48 Tahun</option>
                                <option value="0.47">47 Tahun</option>
                                <option value="0.46">46 Tahun</option>
                                <option value="0.45">45 Tahun</option>
                                <option value="0.44">44 Tahun</option>
                                <option value="0.43">43 Tahun</option>
                                <option value="0.42">42 Tahun</option>
                                <option value="0.41">41 Tahun</option>
                                <option value="0.40">40 Tahun</option>
                                <option value="0.39">39 Tahun</option>
                                <option value="0.38">38 Tahun</option>
                                <option value="0.37">37 Tahun</option>
                                <option value="0.36">36 Tahun</option>
                                <option value="0.35">35 Tahun</option>
                                <option value="0.34">34 Tahun</option>
                                <option value="0.33">33 Tahun</option>
                                <option value="0.32">32 Tahun</option>
                                <option value="0.31">31 Tahun</option>
                                <option value="0.30">30 Tahun</option>
                                <option value="0.29">29 Tahun</option>
                                <option value="0.28">28 Tahun</option>
                                <option value="0.27">27 Tahun</option>
                                <option value="0.26">26 Tahun</option>
                                <option value="0.25">25 Tahun</option>
                                <option value="0.24">24 Tahun</option>
                                <option value="0.23">23 Tahun</option>                                
                                <option value="0.22">22 Tahun</option>                       
                                <option value="0.21">21 Tahun</option>                                
                                <option value="0.20">20 Tahun</option>                                
                                <option value="0.19">19 Tahun</option>                                
                                <option value="0.18">18 Tahun</option>                                
                                <option value="0.17">17 Tahun</option>                                
                                <option value="0.16">16 Tahun</option>                                
                                <option value="0.15">15 Tahun</option>                                
                                <option value="0.14">14 Tahun</option>                                
                                <option value="0.13">13 Tahun</option>                                
                                <option value="0.12">12 Tahun</option>                                
                                <option value="0.11">11 Tahun</option>                                
                                <option value="0.10">10 Tahun</option>                                
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k2"><?= $namaKriteria[1] ?></label>
                              <select class="form-control" name="k2" required>
                                <option value="">-- <?= $namaKriteria[1] ?> --</option>
                                <option value="3">Ada</option>
                                <option value="1">Tidak Ada</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k3"><?= $namaKriteria[2] ?></label>
                              <select class="form-control" name="k3" required>
                                <option value="">-- <?= $namaKriteria[2] ?> --</option>
                                <option value="3">SD</option>
                                <option value="3">SMP</option>
                                <option value="3">SMA</option>
                                <option value="1">Tidak Ada</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k4"><?= $namaKriteria[3] ?></label>
                              <select class="form-control" name="k4" required>
                                <option value="">-- <?= $namaKriteria[3] ?> --</option>
                                <option value="1">Tidak Ada</option>
                                <option value="3">6 Tahun</option>
                                <option value="3">5 Tahun</option>
                                <option value="3">4 Tahun</option>
                                <option value="3">3 Tahun</option>
                                <option value="3">2 Tahun</option>
                                <option value="3">1 Tahun</option>
                              
                            </select>
                            </div>
                            <!-- <div class="form-group">
                              <label class="form-control-label" for="k4"><?= $namaKriteria[3] ?></label>
                              <input type="number" name="k4" placeholder="Input Jumlah tanggungan" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="k4"><?= $namaKriteria[3] ?></label>
                              <input type="number" name="k4" placeholder="Input Jumlah tanggungan" class="form-control" required>
                            </div> -->
                            <div class="form-group">
                              <label class="form-control-label" for="k5"><?= $namaKriteria[4] ?></label>
                              <select class="form-control" name="k5" required>
                                <option value="">-- <?= $namaKriteria[4] ?> --</option>
                                <option value="3">Ada</option>
                                <option value="1">Tidak Ada</option>
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