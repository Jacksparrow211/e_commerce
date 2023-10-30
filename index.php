<?php 
session_start();

// jika ada id_admin didalam session maka langsung pindah ke halaman admin
if(isset($_SESSION['id_admin'])) {
    header("location:pages/dashboard/dashboard.php"); 
}else{
    // jika tidak ada id admin di session
    // maka masuk ke halaman login
    header("location:login.php");
}

    
?>