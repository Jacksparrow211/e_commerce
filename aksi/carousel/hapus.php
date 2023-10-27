<?php

    if (!isset($_GET['id_carousel'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/carousel/carousel.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_carousel'];
    $queryDataLama = "SELECT img_carousel FROM carousel WHERE id_carousel='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek image_carousel lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['img_carousel'])) {
        unlink($path . $data['img_carousel']);
    }

    $queryDelete = "DELETE FROM carousel WHERE id_carousel='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/carousel/carousel.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/carousel/carousel.php';
            </script>
        ";
    }
?>