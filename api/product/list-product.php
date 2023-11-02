<?php
    include "../../aksi/koneksi.php";
    include "../response_builder.php";

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo
    $query = "SELECT product.id_product, product.name_product, product.price_product, product.image_product, subcategory.name_subcategory FROM product JOIN subcategory ON product.id_subcategory = subcategory.id_subcategory";
    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $listProduct = [];
    while ($row = mysqli_fetch_assoc($select)) {
        $resData = [
            "id" => $row['id_product'],
            "name" => $row['name_product'],
            "price" => $row['price_product'],
            "image" => $asset_url. $row['image_product'],
            "subcategory" => $row['name_subcategory']
        ];
        array_push($listProduct, $resData);
    }

    echo jsonResponse($listProduct, 200, "List sudah berhasil ditampilkan")

?>