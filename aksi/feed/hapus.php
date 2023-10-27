<?php

    if (!isset($_GET['id_feed'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/feed/feed.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_feed'];
    $queryDataLama = "SELECT image_feed FROM feed WHERE id_feed='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek image_feed lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['image_feed'])) {
        unlink($path . $data['image_feed']);
    }

    $queryDelete = "DELETE FROM feed WHERE id_feed='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/feed/feed.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/feed/feed.php';
            </script>
        ";
    }
?>