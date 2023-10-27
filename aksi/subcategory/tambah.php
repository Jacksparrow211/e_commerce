<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/subcategory/subcategory.php';
        </script>
        ";
    }

    $id_category = $_POST['id_category'];
    $name_subcategory = $_POST['name_subcategory'];
    $desc_subcategory = $_POST['desc_subcategory'];

    // cara nangkep buat file seperti ini
    $image_subcategory = $_FILES['image_subcategory']['tmp_name'];
    
    // buku-2348.png
    $namaImage = "subcategory-" . rand(1111,9999) . ".png";

    // untuk menyimpan gambar yang sudah di upload
    // simpan di folder ../../images/
    move_uploaded_file($image_subcategory, "../../images/$namaImage");

    // merancang query
    $query = "INSERT INTO subcategory (id_subcategory, id_category, name_subcategory, desc_subcategory, image_subcategory) VALUES (NULL,'$id_category','$name_subcategory','$desc_subcategory','$namaImage' )";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Produk berhasil ditambahkan');
            window.location.href = '../../pages/subcategory/subcategory.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal ditambahkan');
            window.location.href = '../../pages/subcategory/subcategory.php';
        </script>
        ";
    }


?>