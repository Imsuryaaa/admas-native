<?php

include "conn.php";

$nik          = $_POST['nik'];
$nama         = $_POST['nama'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$telp         = $_POST['telp'];


$sql = "INSERT INTO masyarakat SET nik = '$nik', nama = '$nama', username = '$username', password = '$password', telp = '$telp'";
$sql_eksekusi = mysqli_query($conn, $sql);

if ($sql_eksekusi) {
    header("location:manajemen_anggota.php");
} else {
    echo "Gagal Cuy!";
}
