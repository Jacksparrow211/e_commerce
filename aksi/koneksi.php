<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "e_commerce_zaki";

    // buat variabel koneksi sebagai penghubung antara project php dengan database mysql
    $koneksi = mysqli_connect($host, $user, $password, $dbName) or die(mysqli_error($koneksi));

    
?>