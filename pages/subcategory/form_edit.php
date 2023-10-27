
    <?php
        $page = "Tambah Product";
        ?>
    <?php include"../../includes/header.php" ?>

    <?php
        if (!isset($_GET['id_subcategory'])) {
            echo "
            <script>
                alert('id subcategory harus ada!');
                window.location.href = 'subcategory.php';
            </script>
            ";
        }


        $idSubcategory = $_GET['id_subcategory'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectSubcategory = "SELECT * FROM subcategory WHERE id_subcategory='$idSubcategory'";
        // eksekusi querynya
        $selectSubcategory = mysqli_query($koneksi, $querySelectSubcategory) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectSubcategory);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Sub kategori</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/subcategory/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_subcategory" value="<?= $data['id_subcategory']?>" id="" hidden>
                    <!-- id category -->
                    <div class="form-group">
                        <label for="">ID Categori</label>
                        <input type="text" class="form-control" value="<?= $data['id_category']?>" name="id_category" id="">
                    </div>
                    <!-- judul -->
                    <div class="form-group">
                        <label for="">Nama Subcategory</label>
                        <input type="text" class="form-control" value="<?= $data['name_subcategory']?>" name="name_subcategory" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?= $data['desc_subcategory']?>" name="desc_subcategory" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_subcategory" id="">
                    </div>
                    

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>

        <?php include "../../includes/footer.php" ?>