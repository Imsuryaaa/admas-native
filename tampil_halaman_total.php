<?php
session_start();
if (!empty($_SESSION['nik_login'])) {


    include 'header.php';
    include 'conn.php';

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if ($level == 'masyarakat') {
        // Jumlah Pengaduan
        $sql_peng_all       = "SELECT * FROM pengaduan WHERE nik = '$nik_login' ORDER BY id_pengaduan DESC";
        $eksekusi_peng_all  = mysqli_query($conn, $sql_peng_all);
        $jml_peng_all       = mysqli_num_rows($eksekusi_peng_all);
    } else {
        // Jumlah Pengaduan
        $sql_peng_all       = "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC";
        $eksekusi_peng_all  = mysqli_query($conn, $sql_peng_all);
        $jml_peng_all       = mysqli_num_rows($eksekusi_peng_all);
    }
    include 'navigasi.php';
?>
    <!-- Cards -->
    <div class="container">
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">daftar pengaduan total</h4>
        <hr>
        <div class="row text-white ">
            <div class="card bg-warning mr-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase ml-5 mt-3">Jumlah Pengaduan</h5>
                    <div class="display-4 font-weight-bold pt-4 ml-5 mb-3"><?php echo $jml_peng_all; ?></div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Tabel -->
        <?php
        if ($level == 'masyarakat') {
        ?>
            <a href="#" class="btn btn-primary text-uppercase mt-2 mb-3">buat pengaduan baru</a>
        <?php } ?>
        <table class="table table-striped mt-5 table-hover data">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <?php
                    if ($level != 'masyarakat') {
                    ?>
                        <th scope="col">Nik Masyarakat</th>
                    <?php
                    }
                    ?>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Isi Pengaduan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($eksekusi_peng_all)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <?php
                        if ($level != 'masyarakat') {
                        ?>
                            <td><?php echo $data['nik']; ?></td>
                        <?php
                        }
                        ?>
                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                        <td> <a href="pengaduan_detail.php?id_pengaduan=<?php echo $data['id_pengaduan'] ?>" class="text-secondary"><?php echo $data['isi_laporan']; ?></a></td>
                        <td><?php echo $data['status']; ?></td>
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