<?php
include "../koneksi.php";

    $id_paket = $_POST['id_paket'];
    $nama_paket = $_POST['nama_paket'];
    $jenis_paket = $_POST['jenis'];
    $harga = $_POST['harga'];

    $hasil = mysqli_query($koneksi, "UPDATE tb_paket SET id_paket='$id_paket', jenis='$jenis_paket', nama_paket='$nama_paket', harga='$harga' WHERE id_paket='$id_paket'");

    if (!$hasil) {
        echo "Gagal Mengedit Data Paket: " . mysqli_error($koneksi);
    } else {
        header('Location:../dashboard.php?page=paket');
      exit;
}
?>