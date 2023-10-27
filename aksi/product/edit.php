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
    
    $idProduct = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    $desc_product = $_POST['desc_product'];
    $stock_product = $_POST['stock_product'];
    $price_product = $_POST['price_product'];

    $qImage = "";
    if (isset($_FILES['image_product']['tmp_name'])) {
        $oldData = "SELECT * FROM product WHERE id_product='$idProduct'";
        $image_product = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_product);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['image_product'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['image_product']);
        }

        // cara nangkep buat file seperti ini
        $image_product = $_FILES['image_product']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "product-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_product, "../../images/$namaImage");
        $qImage = ",image_product='$namaImage'";
    }

    
    $id_subcategory = $_POST['id_subcategory'];

    // merancang query
    //qImage = ini adalah variabel untuk menggabungkan querynya
    //jika gambar di inputkan maka, query ini akan dilanjutkan dengan, image_product='$namaImage';
    // ...... price_product="$priceProduct", image_product= '$namaImage' ........
    $query = "UPDATE product SET name_product='$name_product', desc_product='$desc_product', stock_product='$stock_product', price_product='$price_product', $qImage WHERE id_product=$idProduct";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku berhasil diubahkan');
            window.location.href = '../../pages/product/product.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal diubahkan');
            window.location.href = '../../pages/product/product.php';
        </script>
        ";
    }
?>