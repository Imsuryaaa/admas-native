<?php

$host     = "localhost";
$pengguna = "root";
$password = "";
$db       = "admas";

$conn = mysqli_connect($host, $pengguna, $password, $db);

if (!$conn) {
    echo 'ga konek ngab';
}



?>