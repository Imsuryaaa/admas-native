<?php
session_start();
include "conn.php";
$id_pengaduan = $_POST['id_pengaduan'];
$tgl_pengaduan = date('Y-m-d');
$tanggapan = $_POST['tanggapan'];
$id_petugas     = $_SESSION['nik_login'];

$sql_tanggapan = "INSERT INTO tanggapan SET id_pengaduan = '$id_pengaduan', tgl_pengaduan = '$tgl_pengaduan', tanggapan = '$tanggapan', id_petugas = '$id_petugas' ";

$eksekusi = mysqli_query($conn, $sql_tanggapan);

if ($eksekusi) {
    header("location:pengaduan_detail.php?id_pengaduan=$id_pengaduan");
} else {
    echo 'Input Pengaduan Gagal';
}
