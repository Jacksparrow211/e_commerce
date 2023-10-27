        <?php
            $page = "Tambah feed";
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
        <h1 class="my-3">Tambah Feed</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/feed/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- nama kategori -->
                    <div class="form-group">
                        <label for=""> Judul feed</label>
                        <input type="text" class="form-control" name="title_feed" id="">
                    </div>
                     <!-- deskripsi -->
                     <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="category_feed" id="">
                    </div>
                    <!-- deskripsi -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="desc_feed" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <input type="file" class="form-control" name="image_feed" id="">
                        <label for="">Gambar</label>        
                    </div>
                     <!-- tanggal -->
                     <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="date_feed" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    <?php include "../../includes/footer.php" ?>