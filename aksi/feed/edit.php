<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/feed/feed.php';
        </script>
        ";
    }
    
    $idfeed= $_POST['id_feed'];
    $title_feed = $_POST['title_feed'];
    $category_feed = $_POST['category_feed'];
    $desc_feed = $_POST['desc_feed'];
    $date_feed = $_POST['date_feed'];
    $qImage = "";
    if (isset($_FILES['image_feed']['tmp_name'])) {
        $oldData = "SELECT * FROM feed WHERE id_feed='$idfeed'";
        $image_feed = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_feed);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['image_feed'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['image_feed']);
        }

        // cara nangkep buat file seperti ini
        $image_feed = $_FILES['image_feed']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "feed-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_feed, "../../images/$namaImage");
        $qImage = ",image_feed='$namaImage'";

       
    }


    // merancang query
    $query = "UPDATE feed SET title_feed='$title_feed',category_feed='$category_feed', desc_feed='$desc_feed', image_feed='$namaImage', date_feed='$date_feed' WHERE id_feed=$idfeed";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku berhasil diubahkan');
            window.location.href = '../../pages/feed/feed.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal diubahkan');
            window.location.href = '../../pages/feed/feed.php';
        </script>
        ";
    }
?>