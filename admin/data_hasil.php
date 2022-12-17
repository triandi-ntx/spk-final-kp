<?php

include "src/header.php"; 

$hapus = mysqli_query($koneksi, "TRUNCATE TABLE data_hasil");

//MENGAMBIL BOBOT
$bobot  = array();
$qBobot = mysqli_query($koneksi, "SELECT bobot FROM data_kriteria");
while($dBobot = mysqli_fetch_array($qBobot)){
  array_push($bobot, $dBobot['bobot']/100);
}

//MENCARI MAX DAN MAX DARI DATA MARKETPLACE
$MQry1 = mysqli_query($koneksi, "SELECT min(k1) as mink1, min(k2) as mink2, min(k3) as mink3, min(k4) as mink4, min(k5) as mink5 FROM data_warga");
$MDta1 = mysqli_fetch_array($MQry1);

$MQry2 = mysqli_query($koneksi, "SELECT max(k1) as maxk1, max(k2) as maxk2, max(k3) as maxk3, max(k4) as maxk4, max(k5) as maxk5 FROM data_warga");
$MDta2 = mysqli_fetch_array($MQry2);

$hasArray1 = array();
$hasArray2 = array();

//NORMALISASI
$qData  = mysqli_query($koneksi, "SELECT * FROM data_warga");
while($dData = mysqli_fetch_array($qData)){

    $k1 = ($dData['k1']/$MDta2['maxk1'])*$bobot[0];
    $k2 = ($dData['k2']/$MDta2['maxk2'])*$bobot[1];
    $k3 = ($dData['k3']/$MDta2['maxk3'])*$bobot[2];
    $k4 = ($MDta1['mink4']/$dData['k4'])*$bobot[3];
    $k5 = ($MDta1['mink5']/$dData['k5'])*$bobot[4];

    $k1a = pow(($dData['k1']/$MDta2['maxk1']),$bobot[0]);
    $k2a = pow(($dData['k2']/$MDta2['maxk2']),$bobot[1]);
    $k3a = pow(($dData['k3']/$MDta2['maxk3']),$bobot[2]);
    $k4a = pow(($MDta1['mink4']/$dData['k4']),$bobot[3]);
    $k5a = pow(($MDta1['mink5']/$dData['k5']),$bobot[4]);

    $has1 = ($k1) + ($k2) + ($k3) + ($k4) + ($k5);
    $has2 = ($k1a) * ($k2a) * ($k3a) * ($k4a) * ($k5a);

    $hasil1 = 0.5 * ($has1);
  
    $hasil2 = 0.5 * ($has2);

    $akhir  = $hasil1 + $hasil2;

    $simpan = mysqli_query($koneksi, "INSERT INTO data_hasil VALUES('','$dData[id_warga]','$akhir')");
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">people</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Data Hasil</h4>
                <a href="hasil_cetak.php" target="_blank()"><button type="button" class='d-sm-inline-block btn btn-sm btn-danger shadow-sm'><span aria-hidden="true"></span>Cetak</button></a>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">NIK</th>
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
                                <td><?= $data['NIK'] ?></td>
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
            </div>
        </div>
    </div>
</div>

<?php include 'src/footer.php'; ?>        