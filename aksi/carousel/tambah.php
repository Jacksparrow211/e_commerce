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

    // cara nangkep buat file seperti ini
    $image_carousel= $_FILES['img_carousel']['tmp_name'];
    
    // buku-2348.png
    $namaImage = "carousel-" . rand(1111,9999) . ".png";

    // untuk menyimpan gambar yang sudah di upload
    // simpan di folder ../../images/
    move_uploaded_file($image_carousel, "../../images/$namaImage");

    // merancang query
    $query = "INSERT INTO carousel(id_carousel, img_carousel) VALUES (NULL,'$namaImage')";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('carousel berhasil ditambahkan');
            window.location.href = '../../pages/carousel/carousel.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('carousel gagal ditambahkan');
            window.location.href = '../../pages/carousel/carousel.php';
        </script>
        ";
    }


?>