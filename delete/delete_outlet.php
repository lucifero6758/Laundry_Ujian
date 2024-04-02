<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi, "DELETE FROM tb_outlet WHERE id_outlet='$id'");

    if (!$query) {
        echo "Gagal Menghapus Data Member". mysqli_error($koneksi);
    }else{
        header('Location:../dashboard.php?page=outlet');
        exit;
    }

?>