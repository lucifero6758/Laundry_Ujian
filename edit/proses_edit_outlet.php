<?php
    include "../koneksi.php";

    $id = $_POST['id'];
    $nama_outlet = $_POST['nama_outlet'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $hasil = mysqli_query($koneksi, "UPDATE tb_outlet SET nama='$nama_outlet', alamat='$alamat', tlp='$no_telp' WHERE id_outlet='$id'");

    if(!$hasil){
        echo "Gagal memasukkan data Outlet" . mysqli_error($koneksi);
    }else{
    //    echo "<script>location.href='view_obat.php'</script>";
        header('Location:../dashboard.php?page=outlet');
        exit;
    }
?>