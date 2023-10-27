        <?php
            $page = "Product";
        
        ?>

        <?php include"../../includes/header.php" ?>

       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>

        <a href="form_tambah.php" class="btn btn-primary">Tambah Data Product</a>
        <br><br>

        <table class="table table-bordered">
            <tr>
                <th>Id product</th>
                <th>nama product</th>
                <th>deskripsi product</th>
                <th>stok product</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>ID Subkategori</th>
                <th>Aksi</th>
            </tr>

            <?php
                // panggil file koneksi
                include "../../aksi/koneksi.php";
                // rancang querynya
                $querySelectProduct = "SELECT * FROM product";
                // eksekusi querynya
                $selectProduct = mysqli_query($koneksi, $querySelectProduct) or die(mysqli_error($koneksi));
                $jmlDataProduct = mysqli_num_rows($selectProduct);
                if ($jmlDataProduct == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectProduct)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row['name_product']?></td>
                    <td><?= $row['desc_product']?></td>
                    <td><?= $row['stock_product']?></td>
                    <td><?= $row['price_product']?></td>
                    <td>
                        <img src="<?= '../../images/' . $row['image_product']?>" width="150" height="150">
                    
                    </td>
                    <td><?= $row['id_subcategory']?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_product='.$row['id_product']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/product/hapus.php?id_product=' . $row['id_product']?>" onclick="return confirm('Apakah anda ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>


        <?php include "../../includes/footer.php" ?>
