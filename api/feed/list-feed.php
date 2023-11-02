<?php
    include "../../aksi/koneksi.php";

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo
    $query = "SELECT * FROM feed";
    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $listProduct = [];
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($listFeed, $row);
    }
    
    echo jsonResponse($listFeed, 200, "List sudah berhasil ditampilkan")

?>