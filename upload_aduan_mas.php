<?php 
    session_start();
    include 'conn.php';
    $nik_login    = $_SESSION['nik_login'];
    $tanggal      = date('Y-m-d');




    $isi_laporan  = $_POST['isi_laporan'];
    $filename_tmp = $_FILES['foto']['tmp_name'];
    $nama_file_lama = $_FILES['foto']['name'];
    $ekstensi_file = end(explode('.',$nama_file_lama));
//Filename = nik pengguna + tanggal + waktu upload
    $nama_file_baru = $nik_login. "_". date('Ymd_His'). ".". $ekstensi_file; 
    $folder_up     = "img_pengaduan/";
    $unggah = move_uploaded_file($filename_tmp, $folder_up. $nama_file_baru);
    if ($unggah) {
        $sql_laporan = "INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES (NULL, '$tanggal', '$nik_login', '$isi_laporan', '$nama_file_baru', '0')";
        $eksekusi_laporan = mysqli_query($conn, $sql_laporan);

        if ($eksekusi_laporan) {
            header('location:index.php');
        }else {
            echo "Gagal Ngab";
        }

    }

?>