<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    $query_password = mysqli_query($koneksi, "SELECT password FROM tb_user WHERE id_user='$id'");
    $baris_password = mysqli_fetch_assoc($query_password);
    $hashed_password = $baris_password['password'];
}

$query_update = "UPDATE tb_user SET nama_user='$nama_user', username='$username', password='$hashed_password', role='$role' WHERE id_user='$id'";

if (mysqli_query($koneksi, $query_update)) {
    header('Location:../dashboard.php?page=user');
    exit;
} else {
    echo "Error: " . $query_update . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>