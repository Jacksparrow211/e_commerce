        <?php
            $page = "Subcategory";
        
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
                <th>ID subKategori</th>
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
                $querySelectSubcategory = "SELECT * FROM subcategory";
                // eksekusi querynya
                $selectSubcategory = mysqli_query($koneksi, $querySelectSubcategory) or die(mysqli_error($koneksi));
                $jmlDataSubcategory = mysqli_num_rows($selectSubcategory);
                if ($jmlDataSubcategory == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectSubcategory)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row['id_category']?></td>
                    <td><?= $row['name_subcategory']?></td>
                    <td><?= $row['desc_subcategory']?></td>

                    <td>
                        <img src="<?= '../../images/' . $row['image_subcategory']?>" width="150" height="150">
                    
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_subcategory='.$row['id_subcategory']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/subcategory/hapus.php?id_subcategory=' . $row['id_subcategory']?>" onclick="return confirm('Apakah anda ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>
    
        <?php include "../../includes/footer.php" ?>