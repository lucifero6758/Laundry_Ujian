<?php
    include "../koneksi.php";

    $nama_member = $_POST['nama_member'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];


    $hasil = mysqli_query($koneksi, "INSERT INTO tb_member VALUES (NULL,'$nama_member','$alamat','$jenis_kelamin','$no_telp')");

    if (!$hasil) {
        echo"Gagal Memasukan Data". mysqli_error($koneksi);
    }else{
        echo"Berhasil Masuk";
        header('Location:../dashboard.php?page=member');
        exit;
    }

?>