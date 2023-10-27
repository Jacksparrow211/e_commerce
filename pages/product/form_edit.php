        <?php
            $page = "Tambah Product";
        ?>

        <?php include"../../includes/header.php" ?>

        <?php
        if (!isset($_GET['id_product'])) {
            echo "
            <script>
                alert('id product harus ada!');
                window.location.href = 'product.php';
            </script>
            ";
        }


        $idProduct = $_GET['id_product'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectProduct = "SELECT * FROM product WHERE id_product='$idProduct'";
        // eksekusi querynya
        $selectProduct = mysqli_query($koneksi, $querySelectProduct) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectProduct);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Produk</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/product/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_product" value="<?= $data['id_product']?>" id="" hidden>
                    <!-- judul -->
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" value="<?= $data['name_product']?>" name="name_product" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?= $data['desc_product']?>" name="desc_product" id="">
                    </div>
                    <!-- penerbit -->
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" class="form-control" value="<?= $data['stock_product']?>" name="stock_product" id="">
                    </div>
                    <!-- tahunTerbit -->
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" value="<?= $data['price_product']?>" name="price_product" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_product" id="">
                    </div>
                    <!-- stok -->
                    <div class="form-group">
                        <label for="">ID Subcategori</label>
                        <input type="text" class="form-control" value="<?= $data['id_subcategory']?>" name="id_subcategory" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>

        <?php include "../../includes/footer.php" ?>