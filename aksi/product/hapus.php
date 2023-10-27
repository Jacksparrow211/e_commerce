<?php

    if (!isset($_GET['id_product'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/product/product.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_product'];
    $queryDataLama = "SELECT image_product FROM product WHERE id_product='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek gambar lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['image_product'])) {
        unlink($path . $data['image_product']);
    }

    $queryDelete = "DELETE FROM product WHERE id_product='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/product/product.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/product/product.php';
            </script>
        ";
    }
?>