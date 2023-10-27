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
    
    $idhelp= $_POST['id_help'];
    $name_help = $_POST['name_help'];
    $desc_help = $_POST['desc_help'];

    $qImage = "";
    if (isset($_FILES['image_help']['tmp_name'])) {
        $oldData = "SELECT * FROM help WHERE id_help='$idhelp'";
        $image_help = mysqli_query($koneksi, $oldData) or die(mysqli_error($koneksi));
        $dataLama = mysqli_fetch_assoc($image_help);

        $path = "../../images/";
        // cek apakah gambar yang ada di folder images/ itu ada?
        if (file_exists($path . $dataLama['image_help'])) {
            // jika ada, hapus gambar lamanya
            unlink($path . $dataLama['image_help']);
        }

        // cara nangkep buat file seperti ini
        $image_help = $_FILES['image_help']['tmp_name'];
        
        // buku-2348.png
        $namaImage = "help-" . rand(1111,9999) . ".png";

        // untuk menyimpan gambar yang sudah di upload
        // simpan di folder ../../images/
        move_uploaded_file($image_help, "../../images/$namaImage");
        $qImage = ",image_help='$namaImage'";
    }


    // merancang query
    $query = "UPDATE help SET name_help='$name_help', desc_help='$desc_help', image_help='$namaImage' WHERE id_help=$idhelp";
    
    // eksekusi query
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


    // // cek apakah hasil eksekusinya berhasil atau tidak
    if($hasil){
        // jika berhasil maka muncul pesan sukses dan kembali ke halaman utama
        echo "
        <script>
            alert('Help berhasil diubahkan');
            window.location.href = '../../pages/help/help.php';
        </script>
        ";
    }else{
        // jika tidak, muncul pesan error dan kembali ke halaman utama
        echo "
        <script>
            alert('Help gagal diubahkan');
            window.location.href = '../../pages/help/help.php';
        </script>
        ";
    }
?>