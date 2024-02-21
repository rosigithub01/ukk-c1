<?php
include('koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Digilib</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Digilib</h3></div>
                                    <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $no_telepon = $_POST['no_telepon'];
                                        $level = $_POST['level'];
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);
                                    
                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama, email, alamat, no_telepon, username, password, level) VALUES ('$nama','$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");
                                    
                                        if ($insert) {
                                            echo '<script>alert("Selamat, Register Berhasil. Silahkan Login"); location.href="login.php"</script>';
                                        } else {
                                        $error = mysqli_error($koneksi);
                                    // Periksa apakah kesalahan terkait dengan kunci utama (PRIMARY KEY)
                                    if (strpos($error, 'Duplicate entry') !== false) {
                                    echo '<script>alert("Register Gagal. Username atau email sudah digunakan.");</script>';
                                    } else {
                                    echo '<script>alert("Register Gagal. Kesalahan:' . $error . '");</script>';
                                            }
                                        }
                                    }
                                    ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control py-2" type="text" name="nama" placeholder="Masukkan Nama Lengkap" />
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Email</label>
                                        <input class="form-control py-2" type="text" required name="email" placeholder="Masukkan Email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">No Telepon</label>
                                        <input class="form-control py-2" type="text" required name="no_telepon" placeholder="Masukkan No Telepon" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                            <textarea name="alamat" rows="5" required class="form-control" placeholder="Masukkan Alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Username</label>
                                        <input class="form-control py-2" type="text" required name="username" placeholder="Masukkan Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Password</label>
                                        <input class="form-control py-2" type="password" required name="password" placeholder="Masukkan Password" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Level</label>
                                            <select name="level" class="form-select py-2">
                                        <option value="admin">Admin</option>
                                        <option value="peminjam">Peminjam</option>
                                        </select>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                        <a class="btn btn-danger" href="login.php">Sudah Punya Akun</a>
                                        </div>
                                        </form>
                                        </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Digilib SMK N 1 Bukit Sundi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
