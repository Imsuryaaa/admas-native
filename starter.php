<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <title>ADMAS</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand text-white" href="#">ADMAS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Buat Pengaduan Baru</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Pengaduan
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Total Pengaduan</a>
                            <a class="dropdown-item" href="#">Pengaduan Dalam Proses</a>
                            <a class="dropdown-item" href="#">Pengaduan Selesai</a>
                        </div>
                    </li>
                </ul>
                <span class="navbar-text text-white">
                    Admin (<a href="#" class="text-white">Keluar</a>)
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">daftar pengaduan yang dibuat</h4>
        <hr>
        <!-- Cards -->
        <div class="row text-white">
            <div class="card bg-warning mr-3" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Jumlah Pengaduan</h5>
                    <div class="display-4 font-weight-bold">25</div>
                    <a href="#">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <div class="card bg-primary mr-3" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Pengaduan Diperoses</h5>
                    <div class="display-4 font-weight-bold">5</div>
                    <a href="#">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <div class="card bg-success mr-3" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Pengaduan Selesai</h5>
                    <div class="display-4 font-weight-bold">20</div>
                    <a href="#">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabel -->
        <a href="#" class="btn btn-primary text-uppercase mt-5 mb-3">buat pengaduan baru</a>
        <table class="table table-striped mt-5 table-hover data">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Isi Pengaduan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>2021-06-02</td>
                    <td> <a href="#" class="text-secondary">Jalan Di Surya Kencana banyak lubang besar</a></td>
                    <td>Sedang Ditangani</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>2021-06-02</td>
                    <td> <a href="#" class="text-secondary">Jalan Di depan Setu Pamulang Jalan nya bergelombang, tolong perhatiannya</a></td>
                    <td>Sedang Ditangani</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>2021-06-02</td>
                    <td><a href="#" class="text-secondary">Pohon Besar didekat Villa Dago Tolong dikondisikan, khawatir akan rubuh</a></td>
                    <td>Selesai</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- footer -->
    <div class="bg-info text-white pt-4 pb-3 mt-3 fixed-bottom">
        <div class="container text-center">
            <p>&copy Ini Footer</p>
        </div>
    </div>



    <!-- Bootstrap Js -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>
</body>

</html>