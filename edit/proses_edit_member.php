<?php
    include "../koneksi.php";
    $id = $_POST['id'];
    $nama_member = $_POST['nama_member'];
    $alamat = $_POST['alamat'];
    $jns_kel = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];

    $hasil = mysqli_query($koneksi, "UPDATE tb_member SET nama = '$nama_member',alamat = '$alamat',jenis_kelamin = '$jns_kel',tlp = '$no_telp' WHERE id_member='$id'");

    if (!$hasil) {
        echo"Gagal Mengedit Data Member". mysqli_error($koneksi);
    }else{
        echo"Berhasil Masuk";
        header('Location:../dashboard.php?page=member');
        exit;
    }

?>