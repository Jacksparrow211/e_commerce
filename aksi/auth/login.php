<?php
    include "../koneksi.php";

    session_start();
// jika tidak ada email atau password
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        // maka pindah ke halaman login
        header("location:../../login.php");
    }

    $email = $_POST['email'];
    // menerima password dan lakukan hashing menjadi md5
    $password = md5($_POST['password']);

    // mencari data di tabel admin berdasarkan email dan password
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    // echo $query;
    $find = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));

    // cek apakah ada data admin nya
    // mysqli_num_rows = untuk menghitung data dari hasil pemanggilan ke database,
    // jika hasilnya lebih dari 1 data, maka dinyatakan berhasil login
    if (mysqli_num_rows($find) > 0) {
        // kemudian ambil data, dan ...
        $data = mysqli_fetch_assoc($find);
        // store data user : id dan username ke session
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['username'] = $data['username'];

        // muncul pesan sukses, dan pindah ke halaman admin
        echo "
        <script>
            alert('Selamat datang!');
            window.location.href = '../../pages/dashboard/dashboard.php';
        </script>
        ";  
    }else {
        echo "
        <script>
            alert('email atau password tidak cocok');
            window.location.href = '../../login.php';
        </script>
        ";  
    }
?>