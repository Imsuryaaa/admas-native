<?php
session_start();
if ((!empty($_SESSION['nik_login'])) and ($_SESSION['level']) == "admin") {


    include 'header.php';
    include 'conn.php';

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];
    if (!empty($_GET['jenis'])) {
        $jenis      = $_GET['jenis'];
    } else {
        $jenis = 'petugas';
    }

    // Jumlah Pengaduan
    $sql_masyarakat      = "SELECT * FROM masyarakat";
    $eksekusi_masyarakat = mysqli_query($conn, $sql_masyarakat);
    $jml_masyarakat      = mysqli_num_rows($eksekusi_masyarakat);

    // Jumlah Belum Diperoses
    $sql_admin      = "SELECT * FROM petugas WHERE level = 'admin'";
    $eksekusi_admin = mysqli_query($conn, $sql_admin);
    $jml_admin      = mysqli_num_rows($eksekusi_admin);

    // Jumlah Diperoses
    $sql_petugas      = "SELECT * FROM petugas WHERE level = 'petugas'";
    $eksekusi_petugas = mysqli_query($conn, $sql_petugas);
    $jml_petugas      = mysqli_num_rows($eksekusi_petugas);

    if ($jenis) {
        $eksekusi = $eksekusi_petugas;
    } else {
        $eksekusi = $eksekusi_admin;
    }

    include 'navigasi.php';
?>
    <!-- Cards -->
    <div class="container">
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">rekapitulasi pengguna</h4>
        <hr>
        <div class="row text-white mb-5">
            <div class="card bg-warning mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Masyarakat</h5>
                    <div class="display-4 font-weight-bold pt-4"><?php echo $jml_masyarakat; ?></div>
                    <a href="manajemen_anggota.php">
                        <p class="card-text text-white mt-2">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <div class="card bg-secondary mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Administrator</h5>
                    <div class="display-4 font-weight-bold pt-4"><?php echo $jml_admin; ?></div>
                    <a href="manajemen_petugas.php?jenis=admin">
                        <p class="card-text text-white mt-2">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <div class="card bg-primary mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Petugas</h5>
                    <div class="display-4 font-weight-bold pt-4"><?php echo $jml_petugas; ?></div>
                    <a href="manajemen_petugas.php?jenis=petugas">
                        <p class="card-text text-white mt-2">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_petugas">
            Tambah Petugas
        </button>

        <!-- Modal -->
        <div class="modal fade" id="form_petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH PETUGAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="petugas_tambah.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" required>
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

                            <div class="form-group">
                                <label for=""></label>
                                <select name="level" class="form-control" required>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
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
        <div class="text-uppercase font-weight-bold text-secondary mt-2">
            <h4>Tabel <?= $jenis ?></h4>
        </div>
        <!-- Tabel -->

        <table class="table table-striped mt-5 table-hover data">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">TELEPON</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($eksekusi)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $data['nama_petugas']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['telp']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- footer -->
    <div class="bg-info text-white pt-4 pb-3 mt-3">
        <div class="container text-center">
            <p>&copy Ini Footer</p>
        </div>
    </div>

<?php
    include 'footer.php';
} else {
    header('location:form_login.php');
}




?>