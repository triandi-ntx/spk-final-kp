  <?php
include "../koneksi.php";
?>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
  .tandatangan{
    text-align: center;
    margin-left: 545px;
  }

  @media print{
    .tandatangan{
      text-align: center;
      margin-left: 345px;
    }
  }
</style>
<body style="padding: 0 20;">
    <div>
      <section class="content">
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <hr>
              <img align="left" width="70" src="../Dinsos.png"/> 
              <h2 align="center">LAPORAN HASIL PENENTUAN PENERIMA BANTUAN PKH</h2>
              <h4 align="center">DINAS SOSIAL KOTA TANJUNGPINANG</h4>
              <hr size="100px">
              <table class="table table-striped" align="center" border="1">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Warga</th>
                    <?php
                    $qry  = mysqli_query($koneksi, "SELECT * FROM data_kriteria");
                    while($dt = mysqli_fetch_array($qry)){
                        echo "<th class='text-center'>$dt[nama_kriteria]</th>";
                    }
                    ?>
                    <th class="text-center">Hasil</th>
                    <th class="text-center">Ket</th>
                  </tr>
                </thead>
                <tbody>
                  	<?php
      				$no = 1;
                    $query = mysqli_query($koneksi, "SELECT data_hasil.*, data_warga.* FROM data_warga, data_hasil WHERE data_hasil.id_warga = data_warga.id_warga");
                    while($data = mysqli_fetch_array($query)){
                        if($data['hasil'] >= 0.6){
                            $ket = 'Menerima PKH';
                        }else{
                            $ket = 'Tidak Menerima PKH';
                        }
                   	?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_warga'] ?></td>
                        <td><?= $data['k1'] ?></td>
                        <td><?= $data['k2'] ?></td>
                       	<td><?= $data['k3'] ?></td>
                        <td><?= $data['k4'] ?></td>
                        <td><?= $data['k5'] ?></td>
                      	<td><?= $data['hasil'] ?></td>
                        <td><?= $ket ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
          </div>
      </section>
    </div>
  </body>
  <hr>
  <div class="tandatangan">
    <br/>
    <b><?php 
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $hari=date('l'); // hari indonesia
        $bulan=date('m'); // bulan indonesia
          switch ($hari) {
            case"Sunday":$hari="Minggu";break;
            case"Monday":$hari="Senin";break;
            case"Tuesday":$hari="Selasa";break;
            case"Wednesday":$hari="Rabu";break;
            case"Thursday":$hari="Kamis";break;
            case"Friday":$hari="Jumat";break;
            case"Saturday":$hari="Sabtu";break;
          }
          switch($bulan){
            case"1":$bulan="Januari";break;
            case"2":$bulan="Februari";break;
            case"3":$bulan="Maret";break;
            case"4":$bulan="April";break;
            case"5":$bulan="Mei";break;
            case"6":$bulan="Juni";break;
            case"7":$bulan="Juli";break;
            case"8":$bulan="Agustus";break;
            case"9":$bulan="September";break;
            case"10":$bulan="Oktober"; break;
            case"11":$bulan="Nopember";break;
            case"12":$bulan="Desember";break;
          }
          $tanggal=date('d');
          $tahun=date('Y');
          echo "<br/>$hari, $tanggal $bulan $tahun";
      ?></b>     
    <p>Mengetahui</p>
    <b>Ketua Panitia</b>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p>Nama Ketua Panitia</p>
  </div>

  <script>
      window.print()
  </script>