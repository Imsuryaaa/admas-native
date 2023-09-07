<?php
session_start();
include 'conn.php';
$id_pengaduan  = $_POST['id_pengaduan'];
$status        = $_POST['status'];
$tgl_pengaduan = date('Y-m-d');
$id_petugas     = $_SESSION['nik_login'];


if ($status == 0) {
   $narasi = "Status Pekerjaan Di Ubah Ke Peninjauan";
} elseif ($status == "proses") {
   $narasi = "Status Pekerjaan Di Ubah Ke Proses";
} else {
   $narasi = "Status Pekerjaan Sudah Selesai";
}

$sql           = "UPDATE `pengaduan` SET `status` = '$status' WHERE `id_pengaduan` = '$id_pengaduan'";
$eksekusi      = mysqli_query($conn, $sql);

if ($eksekusi) {
   $sql_tanggapan = "INSERT INTO tanggapan SET id_pengaduan = '$id_pengaduan', tgl_pengaduan = '$tgl_pengaduan', tanggapan = '$narasi', id_petugas = '$id_petugas' ";
   $eksekusi_sql_tanggapan = mysqli_query($conn, $sql_tanggapan);
   if ($eksekusi_sql_tanggapan) {
      header("location:pengaduan_detail.php?id_pengaduan=$id_pengaduan");
      //echo "berhasil";
   }
} else {
   echo 'Gagal Update';
}
