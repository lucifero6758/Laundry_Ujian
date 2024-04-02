<!-- <div class="d-flex justify-content-end">

<?php
echo "<p class='username-display'>" . $_COOKIE['username'] . "</p>";
?>
    </div> -->
<div class="container mt-5">
    <h1 class="text-center"><a href="" class="text-decoration-none">VIEW PAKET</a>
    </h1>
    <hr>
    <a href="dashboard.php?page=tambah_paket" class="btn btn-success d-grid gap-2 col-2 mx-auto mb-2"> + Tambah
        Paket</a>
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
                        <th class="text-center">NO PAKET</th>
                        <th class="text-center">ID OUTLET</th>
                        <th class="text-center">JENIS</th>
                        <th class="text-center">NAMA PAKET</th>
                        <th class="text-center">HARGA</th>
                        <th colspan="2" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
// Search Box
if (isset($_POST['bcari'])) {
    $keyword = $_POST['tcari'];
    $query = "SELECT tb_paket.id_paket, tb_outlet.id_outlet AS id_tb_outlet, nama, jenis, nama_paket, harga 
              FROM tb_paket 
              INNER JOIN tb_outlet ON tb_paket.id_outlet=tb_outlet.id_outlet 
              WHERE tb_paket.id_paket LIKE '%$keyword%' OR tb_outlet.id_outlet LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR nama_paket LIKE '%$keyword%' OR harga LIKE '%$keyword%' 
              ORDER BY tb_outlet.id_outlet DESC";
} else {
    $query = "SELECT tb_paket.id_paket, tb_outlet.id_outlet AS id_tb_outlet, nama, jenis, nama_paket, harga 
              FROM tb_paket 
              INNER JOIN tb_outlet ON tb_paket.id_outlet=tb_outlet.id_outlet 
              ORDER BY tb_outlet.id_outlet DESC";
}
// End Search Box

$data = mysqli_query($koneksi, $query);
$last_outlet_id = null;
$no = 1;

while ($baris = mysqli_fetch_assoc($data)) {
    if ($last_outlet_id !== null && $last_outlet_id != $baris['id_tb_outlet']) {
        $no = 1;
?>
                    <thead>
                        <td colspan='7'>&nbsp;</td>
                    </thead>
                    <?php
    }
?>
                    <tr>
                        <td class="text-center">
                            <?= $no++ ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['nama'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['jenis'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['nama_paket'] ?>
                        </td>
                        <td class="text-center">
                            <?= $baris['harga'] ?>
                        </td>
                        <td class="text-center">
                            <a href="dashboard.php?page=edit_paket&id=<?= $baris['id_paket'] ?>"
                                class="btn btn-warning"><i class="bi bi-pencil-fill text-light"></i></a>
                        </td>
                        <?php
        $id = $baris['id_paket'];
        $hide_delete = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_paket INNER JOIN tb_detail_transaksi ON tb_paket.id_paket=tb_detail_transaksi.id_paket WHERE tb_paket.id_paket='$id'"));
        
        if ($hide_delete[0]=='0') {
        ?>
                        <td class="text-center">
                            <a href="delete/delete_paket.php?id=<?= $baris['id_paket'] ?>" class="btn btn-danger"
                                onclick="return confirm('Apakah Ingin Menghapus Data?')"><i
                                    class="bi bi-trash-fill text-light"></i></a>
                        </td>
                        <?php
        } else {
            echo "<td></td>";
        }
        ?>
                    </tr>
                    <?php
    // Simpan id_outlet saat ini sebagai outlet terakhir
    $last_outlet_id = $baris['id_tb_outlet'];
}
?>
                </tbody>
            </table>
    </form>
</div>
</div>