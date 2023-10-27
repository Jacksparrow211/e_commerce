        <?php
            $page = "Tambah Kategori";
        ?>

        <?php include"../../includes/header.php" ?>
        <?php
        if (!isset($_GET['id_category'])) {
            echo "
            <script>
                alert('id category harus ada!');
                window.location.href = 'category.php';
            </script>
            ";
        }


        $idCategory = $_GET['id_category'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectCategory = "SELECT * FROM category WHERE id_category='$idCategory'";
        // eksekusi querynya
        $selectCategory = mysqli_query($koneksi, $querySelectCategory) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectCategory);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Produk</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/category/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_category" value="<?= $data['id_category']?>" id="" hidden>
                    <!-- judul -->
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" value="<?= $data['name_category']?>" name="name_category" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?= $data['desc_category']?>" name="desc_category" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_category" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>
  
        <?php include "../../includes/footer.php" ?>