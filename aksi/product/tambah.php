<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/product/product.php';
        </script>
        ";
    }

    $name_product = $_POST['name_product'];
    $desc_product = $_POST['desc_product'];
    $stock_product = $_POST['stock_product'];
    $price_product = $_POST['price_product'];

    // cara nangkep buat file seperti ini
    $image_product = $_FILES['image_product']['tmp_name'];
    
    // buku-2348.png
    $namaImage = "product-" . rand(1111,9999) . ".png";

    // untuk menyimpan gambar yang sudah di upload
    // simpan di folder ../../images/
    move_uploaded_file($image_product, "../../images/$namaImage");
    
    $id_subcategory = $_POST['id_subcategory'];

    // merancang query
    $query = "INSERT INTO product (id_product,  name_product, desc_product, stock_product, price_product, image_product, id_subcategory) VALUES (NULL,'$name_product','$desc_product','$stock_product','$price_product', '$namaImage', $id_subcategory )";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Produk berhasil ditambahkan');
            window.location.href = '../../pages/product/product.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal ditambahkan');
            window.location.href = '../../pages/product/product.php';
        </script>
        ";
    }


?>