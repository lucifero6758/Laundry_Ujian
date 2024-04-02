<!-- <div class="d-flex justify-content-end">
<?php
echo "<p class='username-display'>" . $_COOKIE['username'] . "</p>";
?>
    </div> -->
<div class="container mt-5">
    <h1 class="text-center"><a href="" class="text-decoration-none">VIEW MEMBER</a>
    </h1>
    <hr>
    <a href="dashboard.php?page=tambah_member" class="btn btn-success d-grid gap-2 col-2 mx-auto mb-4"> + Tambah
        Member</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID MEMBER</th>
                    <th class="text-center">NAMA MEMBER</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">NO TELP</th>
                    <th colspan="2" class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_member");

                    while ($baris = mysqli_fetch_assoc($data)) {
                        // var_dump($baris);
                        ?>
                <tr>
                    <td class="text-center">
                        <?= $no++ ?>
                    </td>
                    <td class="text-center">
                        <?= $baris['nama'] ?>
                    </td>
                    <td class="text-center">
                        <?= $baris['alamat'] ?>
                    </td>
                    <td class="text-center">
                        <?= $baris['jenis_kelamin'] ?>
                    </td>
                    <td class="text-center">
                        <?= $baris['tlp'] ?>
                    </td>
                    <td class="text-center"><a href="dashboard.php?page=edit_member&id=<?= $baris['id_member'] ?>"
                            class="btn btn-warning"><i class="bi bi-pencil-fill text-light"></i></a></td>

                    <?php
                    $id = $baris['id_member'];
                    $hide_delete = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_member INNER JOIN tb_transaksi ON tb_member.id_member=tb_transaksi.id_member WHERE tb_member.id_member='$id'"));
                    
                    if ($hide_delete[0]=='0') {
                    ?>
                    <td class="text-center">
                        <a href="delete/delete_member.php?id=<?= $baris['id_member'] ?>" class="btn btn-danger"
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
    </div>
</div>