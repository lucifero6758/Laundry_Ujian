<?php
session_start();
include "koneksi.php";
// echo $_SESSION['role']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Laundry</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
.navbar-color {
    background-color: #03045e;
}
</style>

<body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-color navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php?page=homepage">
                <i class="bi bi-basket2-fill"></i> D-Laundry</a>
            <button class="navbar-toggler bg-body-danger" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <!-- menu admin -->
                    <?php
                    if (@$_SESSION['role'] == 'admin') {
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-clipboard2-data-fill"></i> Data Master</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dashboard.php?page=outlet"><i class="bi bi-shop"></i>
                                    <span class="ms-2">Outlet</span></a></li>
                            <li><a class="dropdown-item" href="dashboard.php?page=paket"><i class="bi bi-box2-fill"></i>
                                    <span class="ms-2">Paket</span></a></li>
                            <li><a class="dropdown-item" href="dashboard.php?page=user"><i
                                        class="bi bi-person-fill"></i>
                                    <span class="ms-2">User</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=member"><i class="bi bi-people-fill"></i>
                            Registrasi
                            Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=tambah_transaksi"><i class="bi bi-cash-stack"></i>
                            Entri Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=laporan"><i
                                class="bi bi-file-earmark-bar-graph-fill"></i> Laporan</a>
                    </li>
                    <!-- akhir menu admin -->
                    <!-- menu kasir -->
                    <?php
                    } elseif (@$_SESSION['role'] == 'kasir') {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=member">Registrasi Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=tambah_transaksi">Entri Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=laporan">Laporan</a>
                    </li>
                    <?php
                    } else {
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=laporan">Laporan</a>
                    </li>
                    <?php
                    }
                    ?>
                    <!-- akhir menu kasir -->
                </ul>

            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-person-fill"></i>
                        <?= $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- akhir navbar -->
    <?php
    switch(@$_GET['page']){
        case "homepage":
            include_once "view/homepage.php";
        break;
        // Case Outlet
        case "outlet":
            include_once "view/view_outlet.php";
        break;
        case "tambah_outlet":
            include_once "tambah/tambah-outlet.php";
        break;
        case "edit_outlet":
            include_once "edit/edit_outlet.php";
        break;

        // Case Paket
        case "paket":
            include_once "view/view_paket.php";
        break;
        case "tambah_paket":
            include_once "tambah/tambah_paket.php";
        break;
        case "edit_paket":
            include_once "edit/edit_paket.php";
        break;

         // Case Member
         case "member":
            include_once "view/view_member.php";
        break;
        case "tambah_member":
            include_once "tambah/tambah_member.php";
        break;
        case "edit_member":
            include_once "edit/edit_member.php";
        break;

        // Case User
        case "user":
            include_once "view/view_user.php";
        break;
        case "edit_user":
            include_once "edit/edit_user.php";
        break;

        // Case Transaksi 
        case "tambah_transaksi":
            include_once "tambah/tambah_transaksi.php";
        break;
        case "laporan":
            include_once "view/view_laporan.php";
        break;
        case "detail_transaksi":
            include_once "tambah/detail_transaksi.php";
        break;
    }
    ?>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>