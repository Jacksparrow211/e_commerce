<?php

    if (!isset($_GET['id_subcategory'])) {
        echo "
            <script>
                alert('ID tidak adaa');
                window.location.href = '../../pages/subcategory/subcategory.php';
            </script>
        ";
    }

    include "../koneksi.php";
    $id = $_GET['id_subcategory'];
    $queryDataLama = "SELECT image_subcategory FROM subcategory WHERE id_subcategory='$id'";
    $res = mysqli_query($koneksi, $queryDataLama) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($res);

    // cek gambar lagi,
    // kalo semisal ada gambarnya, hapus filenya di folder images
    $path = "../../images/";
    if (file_exists($path . $data['image_subcategory'])) {
        unlink($path . $data['image_subcategory']);
    }

    $queryDelete = "DELETE FROM subcategory WHERE id_subcategory='$id'";
    $delete = mysqli_query($koneksi, $queryDelete) or die(mysqli_error($koneksi));
    if ($delete) {
        echo "
            <script>
                alert('Hapus berhasil');
                window.location.href = '../../pages/subcategory/subcategory.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Hapus gagal');
                window.location.href = '../../pages/subcategory/subcategory.php';
            </script>
        ";
    }
?>