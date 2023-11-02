<?php
    include "../../aksi/koneksi.php";
    include "../response_builder.php";

// jika tidak ada email atau password
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        // maka pindah ke halaman login
        die(jsonResponse(null, 400, "Email & password tidak valid"));
    }

    $email = $_POST['email'];
    // menerima password dan lakukan hashing menjadi md5
    $password = md5($_POST['password']);

    // mencari data di tabel admin berdasarkan email dan password
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    // echo $query;
    $find = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));

    // cek apakah ada data admin nya
    // mysqli_num_rows = untuk menghitung data dari hasil pemanggilan ke database,
    // jika hasilnya lebih dari 1 data, maka dinyatakan berhasil login
    if (mysqli_num_rows($find) > 0) {
        // kemudian ambil data, dan ...
        $data = mysqli_fetch_assoc($find);
        $respData = [
            "id" => $data['id_user'],
            "fullname" => $data['fullname'],
            "email" => $data['email'],
        ];

        die(jsonResponse($resData, 200, "Login Berhasil"));
    }else {
        die(jsonResponse($resData, 200, "Login Gagal"));
    }   
?>