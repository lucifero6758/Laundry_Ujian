<?php

    include "../koneksi.php";

    $nama_outlet = $_POST['namaoutlet'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];


    $hasil = mysqli_query($koneksi, "INSERT INTO tb_outlet VALUES (NULL,'$nama_outlet','$alamat','$no_telp')");

    if (!$hasil) {
        echo"Gagal Memasukan Data". mysqli_error($koneksi);
    }else{
        echo"Berhasil Masuk";
        header('Location:../dashboard.php?page=outlet');
        exit;
    }

?>