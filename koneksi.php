<?php
$koneksi = mysqli_connect("localhost","root","","laundry");
if(!$koneksi){
    die("Koneksi database gagal ". mysqli_connect_error());
}

?>