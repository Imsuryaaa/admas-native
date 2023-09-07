<?php 
    session_start();
    include 'conn.php';


    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql      = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
    $eksekusi = mysqli_query($conn, $sql);
    $ketemu   = mysqli_num_rows($eksekusi);

    if ($ketemu>0) {
       $data     = mysqli_fetch_array($eksekusi);
       $nik      = $data['nik'];
       $nama     = $data['nama'];
       
       $_SESSION['nik_login']  = $nik;
       $_SESSION['nama_login'] = $nama;
       $_SESSION['level']      = 'masyarakat';

     header("location:index.php");


    }else {
        //  echo 'username dan password salah';
        // header('location:form_login.php');
        $sql_petugas      = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
        $eksekusi_petugas = mysqli_query($conn, $sql_petugas);
        $ketemu_petugas   = mysqli_num_rows($eksekusi_petugas);

        if ($ketemu_petugas>0) {
            $data_petugas     = mysqli_fetch_array($eksekusi_petugas);
            $id_petugas       = $data_petugas['id_petugas'];
            $nama             = $data_petugas['nama_petugas'];
            $level            = $data_petugas['level'];
            
            $_SESSION['nik_login']  = $id_petugas;
            $_SESSION['nama_login'] = $nama;
            $_SESSION['level']      = $level;

            header('location:index.php');
        }
        else {
            header('location:form_login.php');
        }



    }
