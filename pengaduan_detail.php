<?php
session_start();
if (!empty($_SESSION['nik_login'])) {


    include 'header.php';
    include 'conn.php';

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    include 'navigasi.php';

    $id_pengaduan       = $_GET['id_pengaduan'];
    $sql_pengaduan      = "SELECT * FROM `pengaduan` INNER JOIN masyarakat on pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id_pengaduan'";
    $eksekusi_pengaduan = mysqli_query($conn, $sql_pengaduan);
    $data_pengaduan     = mysqli_fetch_array($eksekusi_pengaduan);

?>
    <div class="container">
        <div class="card mt-4 text-center">
            <div class="card-header">
                Pengaduan Dari <?php echo $data_pengaduan['nama']; ?> Pada Tanggal <?php echo $data_pengaduan['tgl_pengaduan']; ?>
            </div>
            <div class="mt-2">
                <img src="img_pengaduan/<?php echo $data_pengaduan['foto']; ?>" class="img-fluid" width="50%" alt="...">
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $data_pengaduan['isi_laporan']; ?></p>
                <footer class="blockquote-footer"><?php echo $data_pengaduan['nama']; ?> - <cite title="Source Title"><?php echo $data_pengaduan['nik']; ?></cite></footer>
                <p>Status Pengerjaan</p>
                <?php
                $progress = $data_pengaduan['status'];
                if ($progress == 0) {
                    $warna   = "bg-danger";
                    $panjang = 100;
                    $isi     = "Laporan Masih Dalam Peninjauan";
                } elseif ($progress == 'proses') {
                    $warna   = "bg-warning";
                    $panjang = 50;
                    $isi     = "Pengerjaan Sedang Berlansung";
                } else {
                    $warna   = "bg-success";
                    $panjang = 100;
                    $isi     = "Sudah Di tangani";
                }


                ?>
                <div class="progress">

                    <div class="progress-bar <?php echo $warna; ?>" role="progressbar" style="width: <?php echo $panjang; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $isi; ?></div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <?php
        if (($level == 'petugas') or ($level == 'admin')) {


        ?>
            <button type="button" class="btn btn-primary mt-3 ml-2" data-toggle="modal" data-target="#exampleModal">
                Ubah Status Laporan
            </button>

            <button type="button" class="btn btn-primary mt-3 ml-2" data-toggle="modal" data-target="#modal_tanggapan">
                Tambah Tanggapan
            </button>
        <?php } ?>

        <!-- Modal Ubah Status Laporan -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Perubahan Status Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="ubah_status.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Progress Pengerjaan Laporan</label>
                                <select class="form-control" name="status">
                                    <?php
                                    if ($progress == 0) {
                                    ?>
                                        <option value="0" selected>Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses">Pengerjaan Sedang Berlansung</option>
                                        <option value="selesai">Sudah Di tangani</option>
                                    <?php } elseif ($progress == "proses") {
                                    ?>
                                        <option value="0">Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses" selected>Pengerjaan Sedang Berlansung</option>
                                        <option value="selesai">Sudah Di tangani</option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="0">Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses">Pengerjaan Sedang Berlansung</option>
                                        <option value="selesai" selected>Sudah Di tangani</option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tanggapan -->
        <div class="modal fade" id="modal_tanggapan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tanggapan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="tambah_tanggapan.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggapan Baru</label>
                                <textarea name="tanggapan" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-header mt-3">
            Tanggapan
            <div class="card-body">
                <?php
                $sql_tanggapan = "SELECT * FROM `tanggapan` INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_pengaduan = '$id_pengaduan' order by id_tanggapan DESC";
                $eksekusi_sql_tanggapan  = mysqli_query($conn, $sql_tanggapan);
                while ($data_tanggapan = mysqli_fetch_array($eksekusi_sql_tanggapan)) {
                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        <p><?php echo $data_tanggapan['tanggapan']; ?></p>
                        <footer class="blockquote-footer">Tanggapan Oleh <?php echo $data_tanggapan['nama_petugas']; ?> Pada Tanggal <cite title="Source Title"><?php echo $data_tanggapan['tgl_pengaduan']; ?></cite></footer>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>

    <!-- footer -->
    <div class="bg-info text-white pt-4 pb-3 mt-3">
        <div class="container text-center">
            <p>&copy Ini Footer</p>
        </div>
    </div>
<?php

    include 'footer.php';
}
?>