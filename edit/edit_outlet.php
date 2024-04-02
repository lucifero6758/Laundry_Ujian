<?php
include "koneksi.php";

$id = $_GET['id'];
$query_outlet = mysqli_query($koneksi, "SELECT * FROM tb_outlet WHERE id_outlet='$id'");
$baris_outlet = mysqli_fetch_assoc($query_outlet);
?>
<center><br>
    <br>

    <form action="edit/proses_edit_outlet.php" method="POST">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded mt-5" style="width: 40rem; height: 25rem;">
            <h2 class="card-title mt-4">EDIT OUTLET</h2>
            <hr class="border border-primary border-3 opacity-75">
            <input type="text" hidden name="id" value="<?=$id?>">
            <table cellpadding="10">
                <tr>
                    <td>Nama Outlet</td>
                    <td><input type="text" name="nama_outlet" class="form-control" value="<?=$baris_outlet['nama']?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" class="form-control" value="<?=$baris_outlet['alamat']?>"></td>
                </tr>
                <tr>
                    <td>No Telephone</td>
                    <td><input type="text" name="no_telp" class="form-control" value="<?=$baris_outlet['tlp']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" style="float:right" class="mt-4 btn btn-success"
                            value="Simpan Data Outlet"></td>
                </tr>
            </table>
        </div>
    </form>
</center>