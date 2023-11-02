<?php
    include "../../aksi/koneksi.php";
    include "../response_builder.php";

    // jika tidak ada data ID
    if (!isset($_GET['id'])) {
        // muncul pesan error
        die(jsonResponse(null, 400, "ID tidak valid"));
    }
    $id = $_GET['id'];

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo

    // DETAIL PRODUCT MEMBATASI DATA PRODUCT ITU CUMA 1
    $query = "SELECT product.id_product, product.name_product, product.price_product, product.image_product,product.desc_product, product.stock_product, subcategory.name_subcategory 
    FROM product JOIN subcategory ON product.id_subcategory = subcategory.id_subcategory WHERE product.id_product = '$id' LIMIT 1";

    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $row = mysqli_fetch_assoc ($select);
    // die(print_r($row));
    
    $resData = [
        "id" => $row['id_product'],
        "name" => $row['name_product'],
        "price" => $row['price_product'],
        "image" => $asset_url. $row['image_product'],
        "stock" =>  $row['stock_product'],
        "desc" =>  $row['desc_product'],
        "subcategory" => $row['name_subcategory']
    ];

    echo jsonResponse($resData, 200, "Detail sudah berhasil ditampilkan");

?>