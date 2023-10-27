<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/help/help.php';
        </script>
        ";
    }

    $name_help= $_POST['name_help'];
    $desc_help= $_POST['desc_help'];

    // cara nangkep buat file seperti ini
    $image_help= $_FILES['image_help']['tmp_name'];
    
    // buku-2348.png
    $namaImage = "help-" . rand(1111,9999) . ".png";

    // untuk menyimpan gambar yang sudah di upload
    // simpan di folder ../../images/
    move_uploaded_file($image_help, "../../images/$namaImage");

    // merancang query
    $query = "INSERT INTO help(id_help, name_help, desc_help, image_help) VALUES (NULL,'$name_help','$desc_help','$namaImage')";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Produk berhasil ditambahkan');
            window.location.href = '../../pages/help/help.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal ditambahkan');
            window.location.href = '../../pages/help/help.php';
        </script>
        ";
    }


?>