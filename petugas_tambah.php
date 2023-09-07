<?php

include "conn.php";

$nama_petugas = $_POST['nama_petugas'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$telp         = $_POST['telp'];
$level        = $_POST['level'];

$sql = "INSERT INTO petugas SET nama_petugas = '$nama_petugas', username = '$username', password = '$password', telp = '$telp', level = '$level'";
$sql_eksekusi = mysqli_query($conn, $sql);

if ($sql_eksekusi) {
    header("location:manajemen_petugas.php?jenis=$level");
} else {
    echo "Gagal Cuy!";
}
