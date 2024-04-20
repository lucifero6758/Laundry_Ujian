<center>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 70vh;">
            <div class="col-md-7">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 50rem; height: 25rem;">
                    <h1 class="fs-1 fw-bolder text-center">TAMBAH OUTLET</h1>
                    <hr>
                    <br>
                    <form action="tambah/proses_tambah_outlet.php" method="POST">
                        <div class="form-group row">
                            <label for="namaoutlet" class="col-sm-2 col-form-label">Nama outlet</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="namaoutlet" id=""
                                    placeholder="Nama Outlet" required>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="" placeholder="Alamat"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="notlp" class="col-sm-2 col-form-label">No Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telp" id="" placeholder="No Telphone"
                                    required>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-outline-success">Simpan Data</button>
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