<?php 
session_start();
  if($_SESSION['login']==""){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu');window.location='../index.php'</script>";
    $id = $_SESSION['id'];
}
include '../koneksi.php';
$ambil  = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$_SESSION[id]'");
$dt     = mysqli_fetch_array($ambil);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sistem Pendataan KPM Penerima Program Bantuan PKH</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!-- Grafik -->
    <script src="../assets/Chart/Chart.bundle.js"></script>
    <style type="text/css">
        .container {
            width: 100%;
            margin: 5px auto;
        }
    </style>

    <style type="text/css">
        .container1 {
            width: 100%;
            margin: 5px auto;
        }
    </style>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../bg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="index.php" class="simple-text">
                   <h7>DINAS SOSIAL <BR>
                    KOTA TANJUNGPINANG</h7> 
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../Dinsos.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?= $dt['nama_admin'] ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="data_admin.php">My Profile</a>
                                </li>
                                <li>
                                    <a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="data_admin.php">
                            <i class="material-icons">people</i>
                            <p>Data Admin</p>
                        </a>
                    </li>
                    <li>
                        <a href="data_kriteria.php">
                            <i class="material-icons">apps</i>
                            <p>Data Kriteria</p>
                        </a>
                    </li>
                    <li>
                        <a href="data_warga.php">
                            <i class="material-icons">people</i>
                            <p>Data Warga</p>
                        </a>
                    </li>
                    <li>
                        <a href="data_hasil.php">
                            <i class="material-icons">view_list</i>
                            <p>Data Hasil</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT count(id_admin) AS admin FROM data_admin");
                                    $data  = mysqli_fetch_array($query);
                                    ?>
                                    <p class="category">Data Admin</p>
                                    <h3 class="card-title"><?= $data['admin'] ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Jumlah Dari Semua Data
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">apps</i>
                                </div>
                                <div class="card-content">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT count(id_kriteria) AS kri FROM data_kriteria");
                                    $data  = mysqli_fetch_array($query);
                                    ?>
                                    <p class="category">Data Kriteria</p>
                                    <h3 class="card-title"><?= $data['kri'] ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Jumlah Dari Semua Data
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT count(id_warga) AS war FROM data_warga");
                                    $data  = mysqli_fetch_array($query);
                                    ?>
                                    <p class="category">Data Warga</p>
                                    <h3 class="card-title"><?= $data['war'] ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Jumlah Dari Semua Data
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">content_paste</i>
                                </div>
                                <div class="card-content">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT count(id_hasil) AS has FROM data_hasil");
                                    $data  = mysqli_fetch_array($query);
                                    ?>
                                    <p class="category">Data Hasil</p>
                                    <h3 class="card-title"><?= $data['has'] ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Jumlah Dari Semua Data
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>