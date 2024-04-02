<?php
    if (@$_POST['selanjutnya']) {     
        $id_outlet = $_SESSION['id_outlet'];

        @$kode_invoice_terakhir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT kode_invoice FROM tb_transaksi ORDER BY id_transaksi DESC LIMIT 1"));
        if (!$kode_invoice_terakhir) {
            $kode_invoice =  "INV/".date("Y/m/d")."/1";
        }else {
            $pecah_string = explode("/", $kode_invoice_terakhir['kode_invoice']);
            $bulan_sebelum = $pecah_string[2];
            $bulan_saat_ini = date('m');
            if ($bulan_saat_ini !=$bulan_sebelum) {
                $number_urut = 1;
            }else {
                $number_urut = $pecah_string[4];
                $number_urut++;
            }
            $kode_invoice = "INV/".date("Y/m/d")."/".$number_urut;
        }


        $nama_member = $_POST['nama_member'];
        $cari_id_member = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_member FROM tb_member WHERE nama = '$nama_member'"));
        $id_member= $cari_id_member['id_member'];

        date_default_timezone_set('Asia/Makassar');
        $tanggal = date("Y-m-d H:i:s");


        $batas_waktu = date("Y-m-d H:i:s", strtotime($tanggal . " +3 days"));

        $dibayar = 'belum_dibayar';

        $tgl_bayar = "0000-00-00 00:00:00";
        
        $biaya_tambahan = 0;
        

        $cari_transaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_member FROM tb_transaksi WHERE  id_member='$id_member'"));
        if ($cari_transaksi % 3 == 0 && $cari_transaksi != 0) {
            $diskon = 0.1;
        }else {
            $diskon = 0;
        }

        $pajak = 0.0075;

        $status = "baru";

        $id_user = $_SESSION['id_user'];

        $hasil = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES (NULL, '$id_outlet', '$kode_invoice', '$id_member', '$tanggal', '$batas_waktu', '$tgl_bayar', '$biaya_tambahan', '$diskon', '$pajak', '$status', '$dibayar', $id_user)");
        $id_transaksi = mysqli_fetch_row(mysqli_query($koneksi, "SELECT LAST_INSERT_ID()"));
        $_SESSION['idtransaksi'] = $id_transaksi[0];
        if (!$hasil) {
            echo "Gagal Tambah Data Transaksi : ". mysqli_error($koneksi);
        }else {
            header('Location:dashboard.php?page=detail_transaksi');
            exit;
        }
    }
    ?>
<center>
    <div class="container mt-5">
        <form action="dashboard.php?page=tambah_transaksi" method="POST">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 50rem; height: 20rem;">
                <h1 class="fs-1 text-center">ENTRI TRANSAKSI</h1>
                <hr>
                <div class="form-group ">
                    <label for="nama_member" class="form-label mt-3">Cari Nama Member</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_member" id="" placeholder=""
                            list="nama_pelanggan" autocomplete="off">
                        <datalist id="nama_pelanggan">
                            <?php
                        $query_member = mysqli_query($koneksi, "SELECT nama FROM tb_member");
                        while($data_pelanggan = mysqli_fetch_assoc($query_member)) {
                        ?>
                            <option value="<?=$data_pelanggan['nama']?>"></option>
                            <?php
                        }
                        ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <input type="submit" name="selanjutnya" class="btn btn-outline-success mt-3"
                            value="simpan"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</center>