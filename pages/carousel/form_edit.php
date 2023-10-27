        <?php
            $page = "Tambah Carousel";
        ?>

        <?php include"../../includes/header.php" ?>
        <?php
        if (!isset($_GET['id_carousel'])) {
            echo "
            <script>
                alert('id carousel harus ada!');
                window.location.href = 'carousel.php';
            </script>
            ";
        }


        $idCarousel = $_GET['id_carousel'];

        include "../../aksi/koneksi.php";
        // rancang querynya
        $querySelectCarousel = "SELECT * FROM carousel WHERE id_carousel='$idCarousel'";
        // eksekusi querynya
        $selectCarousel = mysqli_query($koneksi, $querySelectCarousel) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($selectCarousel);
    ?>
    <div class="container">
        <h1 class="my-3">Ubah Carousel</h1>
        <div class="row">
            <div class="col-md-3">
                <!-- enctype="multipart/form-data" sebuah MIME 
                type atau tipe submit ke server PHP yang diperuntukan 
                untuk tag <input> dengan type "file" -->
                <form action="../../aksi/carousel/edit.php" method="post" enctype="multipart/form-data">

                    <input type="text" name="id_carousel" value="<?= $data['id_carousel']?>" id="" hidden>
                    <!-- gambar -->
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="img_carousel" id="">
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-success">Ubah dong</button>
                </form>
            </div>
        </div>
  
        <?php include "../../includes/footer.php" ?>