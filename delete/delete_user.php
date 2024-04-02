<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user='$id'");

    if (!$query) {
        echo "Gagal Menghapus Data User". mysqli_error($koneksi);
    }else{
        header('Location:../dashboard.php?page=user');
        exit;
    }

?>