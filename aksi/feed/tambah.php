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

    $title_feed= $_POST['title_feed'];
    $category_feed= $_POST['category_feed'];
    $desc_feed= $_POST['desc_feed'];

    // cara nangkep buat file seperti ini
    $image_feed= $_FILES['image_feed']['tmp_name'];
    
    // buku-2348.png
    $namaImage = "feed-" . rand(1111,9999) . ".png";

    // untuk menyimpan gambar yang sudah di upload
    // simpan di folder ../../images/
    move_uploaded_file($image_feed, "../../images/$namaImage");

    $date_feed= $_POST['date_feed'];

    // merancang query
    $query = "INSERT INTO feed(id_feed,title_feed,  category_feed, desc_feed, image_feed, date_feed) VALUES (NULL,'$title_feed','$category_feed ','$desc_feed','$namaImage', '$date_feed')";

  
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('feed berhasil ditambahkan');
            window.location.href = '../../pages/feed/feed.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Feed gagal ditambahkan');
            window.location.href = '../../pages/feed/feed.php';
        </script>
        ";
    }


?>