        <?php
            $page = "Tambah Feed";
        ?>

        <?php include"../../includes/header.php" ?>
        <?php
        if (!isset($_GET['id_feed'])) {
            echo "
            <script>
                alert('id feed harus ada!');
                window.location.href = 'feed.php';
            </script>
            ";
        }


        $idFeed = $_GET['id_feed'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectFeed = "SELECT * FROM feed WHERE id_feed='$idFeed'";
        // eksekusi querynya
        $selectFeed = mysqli_query($koneksi, $querySelectFeed) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectFeed);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Feed</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/feed/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_feed" value="<?= $data['id_feed']?>" id="" hidden>
                    <!-- judul -->
                    <div class="form-group">
                        <label for="">title Feed/label>
                        <input type="text" class="form-control" value="<?= $data['title_feed']?>" name="title_feed" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Categori Feed</label>
                        <input type="text" class="form-control" value="<?= $data['category_feed']?>" name="category_feed" id="">
                    </div>
                    <!-- penulis -->
                    <div class="form-group">
                        <label for="">Deskripsi feed Feed</label>
                        <input type="text" class="form-control" value="<?= $data['desc_feed']?>" name="desc_feed" id="">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image_feed" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="<?= $data['date_feed']?>" name="date_feed" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>
  
        <?php include "../../includes/footer.php" ?>