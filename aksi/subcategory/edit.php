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
    
    $idsubcategory = $_POST['id_subcategory'];
    $idcategory = $_POST['id_category'];
    $name_subcategory = $_POST['name_subcategory'];
    $desc_subcategory = $_POST['desc_subcategory'];

    $qImage = "";
    if (isset($_FILES['image_subcategory']['tmp_name'])) {
        $oldData = "SELECT * FROM subcategory WHERE id_subcategory='$idsubcategory'";
        $image_subcategory = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_subcategory);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['image_subcategory'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['image_subcategory']);
        }

        // cara nangkep buat file seperti ini
        $image_subcategory = $_FILES['image_subcategory']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "subcategory-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_subcategory, "../../images/$namaImage");
        $qImage = ",image_subcategory='$namaImage'";
    }

    
    $idsubcategory = $_POST['id_subcategory'];

    // merancang query
    $query = "UPDATE subcategory SET id_category= $id_category name_subcategory='$name_subcategory', desc_subcategory='$desc_subcategory', image_subcategory='$namaImage' WHERE id_subcategory= $idsubcategory";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku berhasil diubahkan');
            window.location.href = '../../pages/subcategory/subcategory.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Buku gagal diubahkan');
            window.location.href = '../../pages/subcategory/subcategory.php';
        </script>
        ";
    }
?>