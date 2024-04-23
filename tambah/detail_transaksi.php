<?php
if (@$_GET['idtransaksi']) {
    $idtransaksi = $_GET['idtransaksi'];
    $_SESSION['idtransaksi'] = $idtransaksi;
} elseif (@$_SESSION['idtransaksi']) {
    $idtransaksi = $_SESSION['idtransaksi'];
}
// tidak menampilkan Navbar saat di print
echo "<style>
    @media print {
        .navbar {
            display: none !important;
        }
    }
</style>";

$data_transaksi = mysqli_fetch_row(mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member = tb_member.id_member INNER JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tb_transaksi.id_transaksi = '$idtransaksi'"));

if (@$_POST['pilih_paket']) {
    $qty = $_POST['qty'];
    $nama_paket = $_POST['nama_paket'];
    $row_paket = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_paket WHERE  nama_paket = '$nama_paket'"));
    $harga_paket = $row_paket['harga'];
    $total_harga = $qty * $harga_paket;
    $id_paket = $row_paket['id_paket'];
    $keterangan = $_POST['keterangan'];
    mysqli_query($koneksi, "INSERT INTO tb_detail_transaksi VALUES(NULL, '$idtransaksi', '$id_paket', '$qty', '$keterangan', '$harga_paket', '$total_harga')");
    echo "<script>window.location.href=window.location.href</script>";
}

if (@$_POST['bayar_sekarang']) {
    date_default_timezone_set('Asia/Makasar');
    $tgl_bayar = date("Y-m-d H:i:s");
    mysqli_query($koneksi, "UPDATE tb_transaksi SET tgl_bayar = '$tgl_bayar' WHERE id_transaksi='$idtransaksi'");
    //update kolom tgl_bayar ketika klik tombol bayar sekarang
    mysqli_query($koneksi, "UPDATE tb_transaksi SET dibayar='dibayar' WHERE id_transaksi = '$idtransaksi'");
    echo "<script>window.location.href=window.location.href</script>";
}
if ($data_transaksi['11'] == 'belum_dibayar') {
    // $pembayaran = "Belum Bayar";
    $card_header = "Belum Bayar";
    $warna = "warning";
} else {
    // $pembayaran = "Lunas";
    $card_header = "Lunas";
    $warna = "success";
}

if (@$_POST['tombol_biaya_tambahan']) {
    $biaya_tambahan = $_POST['biaya_tambahan'];
    mysqli_query($koneksi, "UPDATE tb_transaksi SET biaya_tambahan='$biaya_tambahan' WHERE id_transaksi = '$idtransaksi'");
    echo "<script>window.location.href=window.location.href</script>";
}

if($data_transaksi['10']=='baru'){
    $progress = "BARU";
    $warna_persen = "#f78104";
    $lebar_persentase = "25%";
    $warna_text = "fs-6";
}else if($data_transaksi['10']=='proses'){
    $progress = "MASIH DI PROSES";
    $warna_persen = "#FAAB36";
    $lebar_persentase = "59%";
    $warna_text = "fs-6";
}else if($data_transaksi['10']=='selesai'){
    $progress = "SELESAI DI CUCI";
    $warna_persen = "#249EA0";
    $lebar_persentase = "75%";
    $warna_text = "fs-6";
}else if($data_transaksi['10']=='diambil'){
    $progress = "SUDAH DI AMBIL";
    $warna_persen = "#008083";
    $lebar_persentase = "100%";
    $warna_text = "fs-6";
}

?>
<style>
/* Agar element yang tidak di inginkan tidak terprint */
@media print {
    .tidak_print {
        opacity: 0;
    }
}
</style>
<br>

<!-- <h3>
        <? $pembayaran ?>
    </h3> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 tidak_print">
            <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped <?= $warna_text ?>"
                    style="width: <?= $lebar_persentase ?>; background-color: <?= $warna_persen ?>;">
                    <?= $progress ?>
                </div>
            </div>
        </div>
        <div class="col-4 mt-5 atas">
            <div class="card text-bg-<?=$warna?> w-100">
                <h5 class="card-header"><?=$card_header?></h5>
                <div class="card-body">
                    <!-- Tabel Atas -->
                    <table class="table table-<?= $warna ?> table-striped-columns">
                        <tbody>
                            <tr>
                                <td>Kode Invoice</td>
                                <td><?= $data_transaksi['2']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td><?= $data_transaksi['14']; ?></td>
                            </tr>
                            <tr>
                                <td>No Telp</td>
                                <td><?= $data_transaksi['17']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Pelanggan</td>
                                <td><?= $data_transaksi['15']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kasir</td>
                                <td><?= $data_transaksi['23']; ?></td>
                            </tr>
                            <tr>
                                <td>Ambil Sebelum</td>
                                <td>
                                    <?php
                                $data_transaksi['5'];
                                $pecah_string_tanggal = explode(" ", $data_transaksi['5']); 
                                $pecah_string_hari = explode("-", $pecah_string_tanggal['0']);
                                $pecah_string_jam = explode(":", $pecah_string_tanggal['1']);
                                echo "Tanggal : " . $pecah_string_hari['2'] . "-" . $pecah_string_hari['1'] . "-" . $pecah_string_hari['0'];
                                echo "<br>";
                                echo "Jam : " . $pecah_string_jam['0'] . ":" . $pecah_string_jam['1'];
                                ?></td>
                            </tr>
                            <tr class="tidak_print">
                                <td>Status</td>
                                <td>
                                    <select
                                        onchange="pilihStatus(this.options[this.selectedIndex].value, <?= $data_transaksi['0'] ?>)"
                                        class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="baru"
                                            <?php if ($data_transaksi['10'] == 'baru') { echo "selected";} ?>>
                                            Baru
                                        </option>
                                        <option value="proses"
                                            <?php if ($data_transaksi['10'] == 'proses') {echo "selected";} ?>>
                                            Proses
                                        </option>
                                        <option value="selesai"
                                            <?php if ($data_transaksi['10'] == 'selesai') {echo "selected";} ?>>
                                            Selesai
                                        </option>
                                        <option value="diambil"
                                            <?php if ($data_transaksi['10'] == 'diambil') {echo "selected";} ?>>
                                            Sudah Diambil
                                        </option>
                                    </select>
                                    <script>
                                    function pilihStatus(value, id) {
                                        window.location.href = 'edit/proses_edit_status.php?status=' + value + '&id=' +
                                            id;
                                    }
                                    </script>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <!--Tabel Atas -->
                </div>
            </div>





            <!-- Input Paket -->
            <?php
                        if ($data_transaksi['11'] == 'belum_dibayar') {
                        ?>
            <form action="dashboard.php?page=detail_transaksi" method="POST" class="tidak_print">
                <div class="input-group flex-nowrap mt-2">
                    <span class="input-group-text" id="addon-wrapping">Nama Paket</span>
                    <input type="text" name="nama_paket" list="nama_paket" class="form-control" aria-label="Username"
                        aria-describedby="addon-wrapping" autocomplete="off" required>
                    <datalist id="nama_paket">
                        <?php
                                    $id_outlet = $data_transaksi['18'];
                                    $query_paket = mysqli_query($koneksi, "SELECT nama_paket FROM tb_paket WHERE id_outlet = '$id_outlet'");
                                    while ($data_paket = mysqli_fetch_assoc($query_paket)) {
                                    ?>
                        <option value="<?= $data_paket['nama_paket'] ?>">
                            <?php
                                    }
                                    ?>
                    </datalist>
                </div>
                <div class="input-group flex-nowrap mt-2">
                    <span class="input-group-text" id="addon-wrapping">Qty</span>
                    <input type="number" name="qty" class="form-control" aria-label="Username"
                        aria-describedby="addon-wrapping" autocomplete="off" required>
                </div>
                <div class="form-floating mt-2">
                    <textarea name="keterangan" id="floatingTextarea2" class="form-control" style="height: 100px"
                        placeholder="Leave a coment here" required></textarea>
                    <label for="floatingTextarea2">Keterangan</label>
                </div>
                <input type="submit" class="btn btn-success mt-3" value="Masukkan Paket" name="pilih_paket">
            </form>
            <?php
            }
            ?>
        </div>
        <!-- Input Paket -->

        <div class="col-8">
            <!-- Biaya Tambahan -->
            <?php
            if ($data_transaksi['11'] == 'belum_dibayar') {
            ?>
            <form action="dashboard.php?page=detail_transaksi" method="POST">
                <table class="mt-5 mx-5 tidak_print" align="right">
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Biaya Tambahan"
                                    name="biaya_tambahan" aria-label="Recipient,s username"
                                    aria-describedby="button-addon2">
                                <input type="submit" class="btn btn-warning" id="button-addon2" value="tambah"
                                    name="tombol_biaya_tambahan">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            }
            ?>
            <br>
            <!-- Biaya Tambahan -->



            <!-- Tabel Transaksi -->
            <br>
            <table class="table table-hover mt-5">
                <thead>
                    <tr style="font-weight:700">
                        <td>Nama Paket</td>
                        <td align="right">Keterangan</td>
                        <td align="center">Qty</td>
                        <td>Harga</td>
                        <td align="right">Total Harga</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $result_detail = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE id_transaksi = '$idtransaksi'");
            while ($detail = mysqli_fetch_assoc($result_detail)) {
            ?>
                    <tr>
                        <td>
                            <?php
                        $idpaket = $detail['id_paket'];
                        $paket = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_paket, jenis, harga FROM tb_paket WHERE id_paket = '$idpaket'"));
                        echo $paket['nama_paket'];
                        echo "<br>";
                        echo "<p class='fw-lighter'>".$paket['jenis']."</p>";
                        ?>
                        </td>
                        <td align="right"><?= $detail['keterangan'] ?></td>
                        <td align="center"><?= $detail['qty'] ?></td>
                        <td><?= number_format($detail['harga_paket'], 0, ',', '.') ?></td>
                        <td align="right" style="font-weight:700;">
                            Rp. <?= number_format($detail['total_harga'], 0, ',', '.') ?>
                        </td>
                        <?php
                    if ($data_transaksi['11'] == 'belum_dibayar') {
                    ?>
                        <form action="delete/delete_paket_detail.php" method="GET">
                            <input type="text" name="id" hidden value="<?= $detail['id_detail_transaksi'] ?>">
                            <td>
                                <button type="submit" class="btn-close" aria-label="Close"></button>
                            </td>
                        </form>
                        <?php
                    }
                    ?>
                    </tr>
                    <?php
            }
            ?>
                    <?php
            $grand_total = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(total_harga) FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id_paket WHERE id_transaksi = '$idtransaksi'"));
            if (!$grand_total['0'] == '0') {
            ?>
                    <tr>
                        <td colspan="4" style="font-weight:700" align="right">Pajak</td>
                        <td align="right" style="font-weight:700" class="table-warning">
                            <?php
                        echo "<p class='fw-lighter'>0,75%</p>";
                        $pajak = $grand_total['0'] * $data_transaksi['9'];
                        echo "Rp." . number_format($pajak, 0, ',', '.');
                        ?>
                        </td>
                    </tr>
                    <?php
                if ($data_transaksi['7'] != '0') {
                ?>
                    <tr>
                        <td colspan="4" style="font-weight:700" align="right">Biaya Tambahan</td>
                        <td class="table-warning" align="right" style="font-weight:700">
                            <?= "Rp." . number_format($data_transaksi['7'], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php
                }
                if ($data_transaksi['8'] != '0') {
                ?>
                    <tr>
                        <td colspan="4" style="font-weight:700" align="right">Diskon</td>
                        <td class="table-warning" align="right" style="font-weight:700">
                            <?php
                            echo "<p class='fw-lighter'>10%</p>";
                            echo "<br>";
                            $diskon = $grand_total['0'] * $data_transaksi['8'];
                            echo "Rp." . number_format($diskon, 0, ',', '.');
                            ?>
                        </td>
                    </tr>
                    <?php
                } else {
                    $diskon = 0;
                }
                ?>
                    <tr>
                        <td colspan="4" style="font-weight:700" align="right">Total Keseluruhan</td>
                        <td class="table-success" align="right" style="font-weight:700">
                            <?php
                        $total_keseluruhan = ($grand_total['0'] + $data_transaksi['7'] + $pajak) - $diskon;
                        echo "Rp." . number_format($total_keseluruhan, 0, ',', '.');
                        ?>
                        </td>
                    </tr>
                    <?php
            }
            ?>
                </tbody>
            </table>
            <br>
            <!-- Tabel Transaksi -->



            <!-- Tombol bayar Sekarang -->
            <form action="dashboard.php?page=detail_transaksi" method="POST">
                <table class="mt-5 mx-5" align="right">
                    <tr>
                        <td>
                            <a onclick="window.print()" type="submit" class="btn mt-3 btn-info tidak_print"
                                name="cetak">Cetak Nota</a>
                        </td>
                        <td>
                            <input type="submit" class="btn mt-3 btn-warning tidak_print"
                                <?php if ($data_transaksi['11'] == 'dibayar') echo "hidden"; ?> value="Bayar Sekarang?"
                                name="bayar_sekarang" onclick="return confirm('Apakah Mau Bayar Sekarang?')">
                        </td>
                    </tr>
                </table>
            </form>
            <!-- Tombol bayar Sekarang -->
        </div>

    </div>
</div>