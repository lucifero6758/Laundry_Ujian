<!-- <div class="d-flex justify-content-end">
<?php
echo "<p class='username-display'>" . $_COOKIE['username'] . "</p>";
?>
    </div> -->
<div class="container mt-5">
    <h1 class="text-center"><a href="" class="text-decoration-none">VIEW REGISTRASI USER</a>
    </h1>
    <hr>
    <a href="register/register.php" class="btn btn-success d-grid gap-2 col-2 mx-auto mb-4"> + Tambah
        User</a>

    <!-- Search Box -->
    <form method="POST">
        <div class="row g-3 align-items-center justify-content-end mb-3">
            <div class="col-auto"><input type="text" name="tcari"
                    value="<?php echo isset($_POST['tcari']) ? $_POST['tcari'] : ''; ?>" class="form-control"
                    placeholder="Masukkan Kata Kunci"></div>
            <div class="col-auto"><button type="submit" class="btn btn-info" name="bcari">Cari</button></div>
            <div class="col-auto">
                <button type="submit" class="btn btn-warning" name="breset"><a href=""
                        class="text-decoration-none text-dark">Reset</a></button>
            </div>
        </div>


        <!-- End Search Box -->

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">NAMA USER</th>
                        <th class="text-center">USERNAME</th>
                        <th class="text-center">NAMA OUTLET</th>
                        <th class="text-center">ROLE</th>
                        <th colspan="2" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tb_user INNER JOIN tb_outlet ON tb_user.id_outlet=tb_outlet.id_outlet";

                        if (isset($_POST['bcari'])) {
                            $keyword = $_POST['tcari'];
                            $query .= " WHERE id_user LIKE '%$keyword%' OR nama_user LIKE '%$keyword%' OR username LIKE '%$keyword%'";
                        }

                        $query .= " ORDER BY id_user DESC";

                        $no = 1;
                        $data = mysqli_query($koneksi, $query);
                        while ($baris = mysqli_fetch_assoc($data)) {
                        ?>
                    <tr>
                        <td class="text-center">
                            <?= $no++ ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['nama_user'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['username'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['nama'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['role'] ?>
                        </td>
                        <td class="text-center"><a href="dashboard.php?page=edit_user&id=<?= $baris['id_user'] ?>"
                                class="btn btn-warning"><i class="bi bi-pencil-fill text-light"></i></a></td>

                        <?php
                      if ($_SESSION["username"] != $baris["username"]) {
                    ?>
                        <td class="text-center">
                            <a href="delete/delete_member.php?id=<?= $baris['id_user'] ?>" class="btn btn-danger"
                                onclick="return confirm('Apakah Ingin Menghapus Data?')"><i
                                    class="bi bi-trash-fill text-light"></i></a>
                        </td>

                        <?php
                    }else {
                        echo "<td></td>";
                    }
                    ?>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </form>
</div>
</div>