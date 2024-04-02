<?php
include "../koneksi.php";

$nama_lengkap   = $_POST['nama_lengkap'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$password_hash  = password_hash($password,PASSWORD_DEFAULT);
$id_outlet      = $_POST['id_outlet'];
$level          = $_POST['level_user'];

// awal--> cek username apakah sama di database
$query_username = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username='$username'");

$cek = mysqli_num_rows($query_username);

if($cek != 0){
    echo "
        <script>
            alert('username sudah ada, silahkan masukkan username yang lain');
            window.location.href='register.php';
        </script>
    ";
}else{
    $hasil = mysqli_query($koneksi, "INSERT INTO tb_user VALUES(NULL,'$nama_lengkap','$username','$password_hash','$id_outlet','$level')");
    
    if(!$hasil){
        echo "Gagal Register" . mysqli_error($koneksi);
    }else{
        header('Location:../login.php');
        exit;
    } 
}
// akhir--> cek username apakah sama di database




?>