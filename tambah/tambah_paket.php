<br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="col-9">
            <?php
            if(@$_POST['selanjutnya']){
            ?>
            <div class="row justify-content-center align-items-center" style="height: 50vh;">
                <div class="col-md-12">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 40rem; height: 20rem;">
                        <h1 class="fs-2 fw-bolder text-center">TAMBAH PAKET</h1>
                        <hr class="mb-6">
                        <form action="tambah/proses_tambah_paket.php" method="post">
                            <input type="text" hidden name="id_outlet" value="<?=$_POST['id_outlet'];?>">
                            <select name="jenis" class="form-select mb-3" aria-label="Default select example">
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                                <option value="lain">Lain</option>
                            </select>
                            <div class="input-group flex-nowrap mb-3">
                                <input type="text" class="form-control" placeholder="Nama Paket"
                                    aria-describedby="addon-wrapping" name="nama_paket">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" placeholder="Harga" aria-label="Username"
                                    aria-describedby="basic-addon1" name="harga">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            }else{
            ?>
            <div class="row justify-content-center align-items-center" style="height: 50vh;">
                <div class="col-md-7">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 38rem; height:15rem;">
                        <h1 class="fs-2 fw-bolder text-center">PILIH OUTLET</h1>
                        <hr class="mb-6">
                        <form action="dashboard.php?page=tambah_paket" method="POST">
                            <select name="id_outlet" class="form-select mb-3" aria-label="Default select example">
                                <?php
                    $query = mysqli_query($koneksi, "SELECT id_outlet, nama FROM tb_outlet");
                    while($baris = mysqli_fetch_assoc($query)){
                    ?>
                                <option value="<?=$baris['id_outlet']?>"><?=$baris['nama']?></option>
                                <?php
                    }
                    ?>
                            </select>
                            <input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya">
                        </form>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>