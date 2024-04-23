<?php
    include_once "../koneksi.php";
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo '<script>alert("Selain Admin tidak bisa masuk ke halaman register");';
        echo 'window.location.href = "../dashboard.php?page=homepage";</script>';
    exit;
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">REGISTER</p>

                                    <form class="mx-1 mx-md-4" action="proses_register_enkripsi.php" method="POST">

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Nama lengkap</label>
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    name="nama_lengkap" required>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Username</label>
                                                <input type="text" id="form3Example3c" class="form-control"
                                                    name="username" required>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input type="password" id="form3Example4c" class="form-control"
                                                    name="password" required>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Outlet</label>
                                                <select name="id_outlet" id="" class="form-control" required>
                                                    <?php                               
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                                                    while($hasil = mysqli_fetch_assoc($query)){
                                                    ?>
                                                    <option value="<?=$hasil['id_outlet'];?>"><?=$hasil['nama'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Level User</label>
                                                <select name="level_user" id="" class="form-control" required>
                                                    <option value="kasir">Kasir</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="owner">Owner</option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="d-grid gap-2 mt-5">
                                            <button type="submit" class="btn btn-outline-primary">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="../logo.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>