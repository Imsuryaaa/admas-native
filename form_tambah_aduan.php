<?php
    session_start();
    if (!empty($_SESSION['nik_login'])) 
    {
        $nik_login  = $_SESSION['nik_login'];
        $nama_login = $_SESSION['nama_login'];
        $level      = $_SESSION['level'];
        if ($level == 'masyarakat') 
        {
            
        
            include "header.php";
            include "navigasi.php";
?>

            <div class="container">
                <h3 class="text-center mt-5">FORM TAMBAHAN ADUAN MASYARAKAT</h3>
                <form enctype="multipart/form-data" method="POST" action="upload_aduan_mas.php">
                    <div class="form-group">
                        <label for="">Apa Keluhan Anda</label>
                        <textarea name="isi_laporan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Unggah Foto Laporan</label>
                        <input type="file" name="foto" class="form-control-file" required>
                    </div>
                    <button class="btn btn-primary">Tambahkan Laporan</button>

                </form>

            </div>
            <!-- footer -->
            <div class="bg-info text-white pt-4 pb-3 mt-3">
                <div class="container text-center">
                    <p>&copy Ini Footer</p>
                </div>
            </div>



<?php

            include "footer.php";
        }else {
            header('location:index.php');
        }
    }else {
        header('location:form_login.php');
    }

?>