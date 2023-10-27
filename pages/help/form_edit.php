        <?php
            $page = "Tambah Kategori";
        ?>

        <?php include"../../includes/header.php" ?>
        <?php
        if (!isset($_GET['id_help'])) {
            echo "
            <script>
                alert('id help harus ada!');
                window.location.href = 'help.php';
            </script>
            ";
        }


        $idHelp = $_GET['id_help'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectHelp = "SELECT * FROM help WHERE id_help='$idHelp'";
        // eksekusi querynya
        $selectHelp = mysqli_query($koneksi, $querySelectHelp) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectHelp);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Produk</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/help/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_help" value="<?= $data['id_help']?>" id="" hidden>
                    <!-- judul -->
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" value="<?= $data['name_help']?>" name="name_help" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?= $data['desc_help']?>" name="desc_help" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_help" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>
  
        <?php include "../../includes/footer.php" ?>