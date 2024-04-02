<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi, "DELETE FROM tb_paket WHERE id_paket='$id'");

    if (!$query) {
        echo "Gagal Menghapus Data Paket". mysqli_error($koneksi);
    }else{
        header('Location:../dashboard.php?page=paket');
        exit;
    }

?>