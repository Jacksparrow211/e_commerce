<?php
    include "../../aksi/koneksi.php";

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo
    $query = "SELECT * FROM carousel";
    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $listProduct = [];
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($listCarousel, $row);
    }
    
    echo jsonResponse($listCarousel, 200, "List sudah berhasil ditampilkan")

?>