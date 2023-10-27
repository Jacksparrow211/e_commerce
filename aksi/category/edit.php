<?php

// panggil file koneksi
    include "../koneksi.php";
    // cek apakah ada data POST dari file form_tambah.php?
    if (!isset($_POST)) {
        // jika tidak ada data, maka pindah ke halaman utama
        echo "
        <script>
            alert('Anda harus mengisi data terlebih dahulu');
            window.location.href = '../../pages/category/category.php';
        </script>
        ";
    }
    
    $idcategory= $_POST['id_category'];
    $name_category = $_POST['name_category'];
    $desc_category = $_POST['desc_category'];

    $qImage = "";
    if (isset($_FILES['image_category']['tmp_name'])) {
        $oldData = "SELECT * FROM category WHERE id_category='$idCategory'";
        $image_category = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_category);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['image_category'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['image_category']);
        }

        // cara nangkep buat file seperti ini
        $image_category = $_FILES['image_category']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "category-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_category, "../../images/$namaImage");
        $qImage = ",image_category='$namaImage'";
    }


    // merancang query
    $query = "UPDATE category SET name_category='$name_category', desc_category='$desc_category', image_category='$namaImage' WHERE id_category=$idcategory";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku berhasil diubahkan');
            window.location.href = '../../pages/category/category.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal diubahkan');
            window.location.href = '../../pages/category/category.php';
        </script>
        ";
    }
?>