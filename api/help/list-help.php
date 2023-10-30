<?php
    include "../../aksi/koneksi.php";

    // id, nama,price,image, nama subcategory
    // 1. Hp Vivo, 1.500.000, example.png, smartphone vivo
    $query = "SELECT product.id_product, product.name_product, product.price_product, product.image_product, subcategory.name_subcategory FROM product JOIN subcategory ON product.id_subcategory = subcategory.id_subcategory";
    $select = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));
    $listProduct = [];
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($listProduct, $row);
    }
    echo json_encode($listProduct);

?>