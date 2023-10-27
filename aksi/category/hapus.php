<?php

    if (!isset($_GET['id_category'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/category/category.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_category'];
    $queryDataLama = "SELECT image_category FROM category WHERE id_category='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek image_category lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['image_category'])) {
        unlink($path . $data['image_category']);
    }

    $queryDelete = "DELETE FROM category WHERE id_category='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/category/category.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/category/category.php';
            </script>
        ";
    }
?>