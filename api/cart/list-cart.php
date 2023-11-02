<?php
    include "../../aksi/koneksi.php";
    include "../response_builder.php";

    if(!isset($_GET['id'])) {
        die(jsonResponse(null, 400, "id tidak valid"));
    }

    $userID = $_GET ['id'];


    $query = "SELECT cart.id_cart, product.name_product, cart.qty, product.image_product, product.price_product FROM cart JOIN product ON cart.id_product = product.id_product JOIN user ON cart.id_user = user.id_user WHERE user.id_user='$userID'";
    $select = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $listCart = [];
    while ($row = mysqli_fetch_assoc($select)) {

        $resData = [

            "id" => (int) $row['id_cart'],
            "product_name" => $row['name_product'],
            "qty" => (int) $row['qty'],
            "price" => (int) $row['price_product'],
            "image" => $asset_url . $row['image_product'],
            "total" => $row['price_product'] * $row['qty']
        ];

        array_push($listCart, $resData);
    }
    echo jsonResponse($listCart, 200, "List Cart berhail ditampilkan");

?>