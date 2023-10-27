        <?php
            $page = "carousel";
        ?>

        <?php include"../../includes/header.php" ?>
       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>
        <a href="form_tambah.php" class="btn btn-primary">Tambah Data Carousel</a>
        <br><br>

        <table class="table table-bordered">
            <tr>
                <th>ID carousel</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php
                // panggil file koneksi
                include "../../aksi/koneksi.php";
                // rancang querynya
                $querySelectCarousel = "SELECT * FROM carousel";
                // eksekusi querynya
                $selectCarousel = mysqli_query($koneksi, $querySelectCarousel) or die(mysqli_error($koneksi));
                $jmlDataCarousel = mysqli_num_rows($selectCarousel);
                if ($jmlDataCarousel == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectCarousel)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td>
                        <img src="<?= '../../images/' . $row['img_carousel']?>" width="150" height="150">
                    
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_carousel='.$row['id_carousel']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/carousel/hapus.php?id_carousel=' . $row['id_carousel']?>" onclick="return confirm('Apakah anda ingin menghapus carousel ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>
    
        <?php include "../../includes/footer.php" ?>