<?php
include "koneksi.php";

$id = $_GET['id'];
$query_member = mysqli_query($koneksi, "SELECT * FROM tb_member WHERE id_member='$id'");
$baris_member = mysqli_fetch_assoc($query_member);
?>
<center><br>
    <br>

    <form action="edit/proses_edit_member.php" method="POST">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded mt-5" style="width: 40rem; height: 30rem;">
            <h2 class="card-title mt-4">EDIT MEMBER</h2>
            <hr class="border border-primary border-3 opacity-75">
            <input type="text" hidden name="id" value="<?=$id?>">
            <table cellpadding="10">
                <tr>
                    <td>Nama Member</td>
                    <td><input type="text" class="form-control" name="nama_member" value="<?=$baris_member['nama']?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="form-control" name="alamat" value="<?=$baris_member['alamat']?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><select name="jenis_kelamin" class="form-control" id="" style="width:178px"
                            value="<?=$baris_member['jenis_kelamin']?>">
                            <option value="Laki-Laki"
                                <?= ($baris_member['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki
                            </option>
                            <option value="Perempuan"
                                <?= ($baris_member['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>No Telephone</td>
                    <td><input type="text" class="form-control" name="no_telp" value="<?=$baris_member['tlp']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" style="float:right" class="mt-4 btn btn-success"
                            value="Simpan Data Member"></td>
                </tr>
            </table>
        </div>
    </form>
</center>