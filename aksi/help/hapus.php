<?php

    if (!isset($_GET['id_help'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/help/help.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_help'];
    $queryDataLama = "SELECT image_help FROM help WHERE id_help='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek image_help lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['image_help'])) {
        unlink($path . $data['image_help']);
    }

    $queryDelete = "DELETE FROM help WHERE id_help='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/help/help.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/help/help.php';
            </script>
        ";
    }
?>