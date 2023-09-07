<?php

session_start();
if (empty($_SESSION['nik_login'])) {



    include 'header.php';
?>
    <link rel="stylesheet" href="css/form_login.css">
    <div class="container">
        <h2 class="text-center">FORM LOGIN ADMAS</h2>
        <hr>
        <form action="cek_login.php" method="POST">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan Username Anda">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password Anda">
            </div>

            <div>
                <a href="" data-toggle="modal" data-target="#form_masyarakat">
                    <p><small>Daftar Baru</small></p>
                </a>
            </div>

            <button type="submit" class="btn btn-primary">Masuk</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>


<?php
    include 'footer.php';
} else {
    header('location:index.php');
}
?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="form_masyarakat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH MASYARAKAT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="masyarakat_tambah.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Pengguna</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="telp" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>