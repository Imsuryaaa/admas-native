<nav class="navbar navbar-expand-lg navbar-light bg-info sticky-top">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">ADMAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <?php
                if ($level == 'masyarakat') {


                ?>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="form_tambah_aduan.php">Buat Pengaduan Baru</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Pengaduan
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="tampil_halaman_total.php">Total Pengaduan</a>
                        <a class="dropdown-item" href="tampil_halaman_blm.php">Pengaduan Belum Di Proses</a>
                        <a class="dropdown-item" href="tampil_halaman_proses.php">Pengaduan Dalam Proses</a>
                        <a class="dropdown-item" href="tampil_halaman_selesai.php">Pengaduan Selesai</a>
                    </div>
                </li>
                <?php
                if ($level == 'admin') {


                ?>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="manajemen_anggota.php">Manajemen Anggota</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <span class="navbar-text text-white">
                <?php echo $nama_login   ?> (<a href="logout.php" class="text-white">Keluar</a>)
            </span>

        </div>
    </div>
</nav>