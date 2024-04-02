<?php
    include "../koneksi.php";

    $id_outlet = $_POST['id_outlet'];
    $jenis = $_POST['jenis'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];

    $hasil = mysqli_query($koneksi, "INSERT INTO tb_paket VALUES (NULL,'$id_outlet','$jenis','$nama_paket','$harga')");

    if (!$hasil) {
        echo"Gagal Memasukan Data". mysqli_error($koneksi);
    }else{
        echo"Berhasil Masuk";
        header('Location:../dashboard.php?page=paket');
        exit;
    }

?>