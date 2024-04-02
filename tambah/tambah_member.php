<center>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 70vh;">
            <div class="col-md-7">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 50rem; height: 25rem;">
                    <h1 class="fs-1 fw-bolder text-center">TAMBAH MEMBER</h1>
                    <hr>
                    <form action="tambah/proses_tambah_member.php" method="POST">
                        <div class="form-group row mt-2">
                            <label for="nama_member" class="col-sm-2 col-form-label">Nama Member</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_member" id=""
                                    placeholder="Nama Member">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="telp" class="col-sm-2 col-form-label">No Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telp" id="" placeholder="No Telphone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-outline-success mt-4">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</center>