        <?php
            $page = "help";
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
                <th>ID help</th>
                <th>nama_</th>
                <th>desc</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php
                // panggil file koneksi
                include "../../aksi/koneksi.php";
                // rancang querynya
                $querySelectHelp = "SELECT * FROM help";
                // eksekusi querynya
                $selectHelp = mysqli_query($koneksi, $querySelectHelp) or die(mysqli_error($koneksi));
                $jmlDataHelp = mysqli_num_rows($selectHelp);
                if ($jmlDataHelp == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectHelp)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row['name_help']?></td>
                    <td><?= $row['desc_help']?></td>

                    <td>
                        <img src="<?= '../../images/' . $row['image_help']?>" width="150" height="150">
                    
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_help='.$row['id_help']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/help/hapus.php?id_help=' . $row['id_help']?>" onclick="return confirm('Apakah anda ingin menghapus help ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>
    
        <?php include "../../includes/footer.php" ?>