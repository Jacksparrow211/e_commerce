<?php
    include "../../aksi/koneksi.php";
    include "../response_builder.php";

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo
    $query = "SELECT * FROM category";
    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $listCategory = [];
    while ($row = mysqli_fetch_assoc($select)) {
        $resData = [
            "id" => $row['id_category'],
            "name" => $row['name_category'],
            "desc" => $row['desc_category'],
            "image" => $asset_url. $row['image_category'],
        ];
        array_push($listCategory, $row);
    }

    echo jsonResponse($listcategory, 200, "List sudah berhasil ditampilkan")

?>