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

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/category/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- nama kategori -->
                    <div class="form-group">
                        <label for="">Nama kategori</label>
                        <input type="text" class="form-control" name="name_category" id="">
                    </div>
                    <!-- deskripsi -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="desc_category" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_category" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    <?php include "../../includes/footer.php" ?>