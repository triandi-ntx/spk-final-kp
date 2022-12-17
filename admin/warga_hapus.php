<?php
include '../koneksi.php';

$delete = mysqli_query($koneksi, "DELETE FROM data_warga WHERE id_warga = '$_GET[id_warga]'");
echo "<script>alert('Data Berhasil Di Hapus');window.location='data_warga.php'</script>";

?>