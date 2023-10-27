        <?php
            $page = "Tambah Keluhan";
        ?>

        <?php include"../../includes/header.php" ?>

       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item ">Help </li>
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>

<body>

    <div class="container">
        <h1 class="my-3">Tambah Keluhan</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/help/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- nama kategori -->
                    <div class="form-group">
                        <label for="">nama Keluhan</label>
                        <input type="text" class="form-control" name="name_help" id="">
                    </div>
                    <!-- deskripsi -->
                    <div class="form-group">
                        <label for="">penjelasannya</label>
                        <input type="text" class="form-control" name="desc_help" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_help" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    <?php include "../../includes/footer.php" ?>