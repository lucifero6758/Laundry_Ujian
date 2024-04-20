<?php
include "koneksi.php";

$id = $_GET['id'];
$query_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id'");
$baris_user = mysqli_fetch_assoc($query_user);
?>
<center><br>

    <br>

    <form action="edit/proses_edit_user.php" method="POST">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded mt-5" style="width: 40rem; height: 30rem;">
            <h1 class="card-title mt-4">EDIT USER</h1>
            <hr class="border border-primary border-3 opacity-75">
            <input type="text" hidden name="id" value="<?=$id?>">
            <table cellpadding="10">
                <tr>
                    <td>Nama User</td>
                    <td><input type="text" name="nama_user" class="form-control" value="<?=$baris_user['nama_user']?>">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" class="form-control" value="<?=$baris_user['username']?>">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <td>Role User</td>
                    <td><select name="role" class="form-control" id="" style="width:178px"
                            value="<?=$baris_user['role']?>">
                            <option value="admin" <?= ($baris_user['role'] == 'admin') ? 'selected' : '' ?>>Admin
                            </option>
                            <option value="kasir" <?= ($baris_user['role'] == 'kasir') ? 'selected' : '' ?>>Kasir
                            </option>
                            <option value="owner" <?= ($baris_user['role'] == 'owner') ? 'selected' : '' ?>>Owner
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="mt-4 btn btn-success" style="float:right" value="Simpan Data User">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</center>