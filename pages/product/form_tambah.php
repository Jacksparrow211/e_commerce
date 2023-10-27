        <?php
            $page = "Tambah Product";
        ?>

        <?php include"../../includes/header.php" ?>

       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item ">Product </li>
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>

<body>

        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/product/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- nama produk -->
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" name="name_product" id="">
                    </div>
                    <!-- deskripsi -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="desc_product" id="">
                    </div>
                    <!-- stok -->
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" class="form-control" name="stock_product" id="">
                    </div>
                    <!-- Harga -->
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" name="price_product" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_product" id="">
                    </div>
                    <!-- Subkategori -->
                    <div class="form-group">
                        <label for="">ID Subkategori</label>
                        <input type="text" class="form-control" name="id_subcategory" id="">
                    </div>
                   

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    <?php include "../../includes/footer.php" ?>


