        <?php
            $page = "Kategori";
        ?>

        <?php include"../../includes/header.php" ?>
       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>
        <a href="form_tambah.php" class="btn btn-primary">Tambah Data Kategori</a>
        <br><br>

        <table class="table table-bordered">
            <tr>
                <th>ID Kategori</th>
                <th>nama Kategori</th>
                <th>deskripsi Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php
                // panggil file koneksi
                include "../../aksi/koneksi.php";
                // rancang querynya
                $querySelectCategory = "SELECT * FROM category";
                // eksekusi querynya
                $selectCategory = mysqli_query($koneksi, $querySelectCategory) or die(mysqli_error($koneksi));
                $jmlDataCategory = mysqli_num_rows($selectCategory);
                if ($jmlDataCategory == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectCategory)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row['name_category']?></td>
                    <td><?= $row['desc_category']?></td>

                    <td>
                        <img src="<?= '../../images/' . $row['image_category']?>" width="150" height="150">
                    
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_category='.$row['id_category']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/category/hapus.php?id_category=' . $row['id_category']?>" onclick="return confirm('Apakah anda ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>
    
        <?php include "../../includes/footer.php" ?>