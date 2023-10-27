        <?php
            $page = "Tambah Carousel";
        ?>

        <?php include"../../includes/header.php" ?>

       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item ">Carousel </li>
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>

<body>

    <div class="container">
        <h1 class="my-3">Tambah Carousel</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/carousel/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="img_carousel" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    <?php include "../../includes/footer.php" ?>