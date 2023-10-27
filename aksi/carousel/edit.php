<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/carousel/carousel.php';
        </script>
        ";
    }
    
    $idcarousel= $_POST['id_carousel'];


    $qImage = "";
    if (isset($_FILES['img_carousel']['tmp_name'])) {
        $oldData = "SELECT * FROM carousel WHERE id_carousel='$idcarousel'";
        $image_carousel = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_carousel);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['img_carousel'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['img_carousel']);
        }

        // cara nangkep buat file seperti ini
        $image_carousel = $_FILES['img_carousel']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "carousel-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_carousel, "../../images/$namaImage");
        $qImage = ",img_carousel='$namaImage'";
    }


    // merancang query
    $query = "UPDATE carousel SET img_carousel='$namaImage' WHERE id_carousel=$idcarousel";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku berhasil diubahkan');
            window.location.href = '../../pages/carousel/carousel.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal diubahkan');
            window.location.href = '../../pages/carousel/carousel.php';
        </script>
        ";
    }
?>