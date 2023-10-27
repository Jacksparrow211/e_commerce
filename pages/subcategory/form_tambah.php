<?php
            $page = "Tambah Subcategory";
        ?>

        <?php include"../../includes/header.php" ?>

       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item ">Subcategory </li>
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>

<body>

    <div class="container">
        <h1 class="my-3">Tambah Produk Baru</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/subcategory/tambah.php" method="post" enctype="multipart/form-data">
                    <!-- kategori -->
                    <div class="form-group">
                        <label for="">ID kategori</label>
                        <input type="text" class="form-control" name="id_category" id="">
                    </div>
                    <!-- nama produk -->
                    <div class="form-group">
                        <label for="">Nama Subcategory</label>
                        <input type="text" class="form-control" name="name_subcategory" id="">
                    </div>
                    <!-- deskripsi -->
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="desc_subcategory" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_subcategory" id="">
                    </div>
                    
                   

                    <br><br>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
  
        <?php include "../../includes/footer.php" ?>