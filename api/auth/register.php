<?php

include "../../aksi/koneksi.php";
include "../response_builder.php";
//jika tidak ada data POST maka muncul error di jsonnya

if(!isset($_POST)) {
    die(jsonResponse(null, 400, "Data tidak valid"));

}

$id =rand(1111,99999);
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$query = "INSERT INTO user (id_user, fullname, email, password) VALUES ($id, '$fullname', '$email', '$password')";
$register = mysqli_query($koneksi, $query) or (mysqli_error($koneksi));
if($register) {
    echo jsonResponse(null, 200, "Berhasil Register");
}else{
    echo jsonResponse(null, 200, "Gagal Register");
}


?>