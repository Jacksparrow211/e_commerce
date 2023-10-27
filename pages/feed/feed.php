        <?php
            $page = "Feed";
        ?>

        <?php include"../../includes/header.php" ?>
       <!-- bagian kepalanya -->
        <h1 class="mt-4"><?= $page ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?= $page ?></li>
        </ol>
        <a href="form_tambah.php" class="btn btn-primary">Tambah Data Feed</a>
        <br><br>

        <table class="table table-bordered">
            <tr>
                <th>id_feed</th>
                <th>title</th>
                <th>kategori</th>
                <th>descripsion</th>
                <th>Image</th>
                <th>Date</th>
                <th>Aksi</th>
            </tr>

            <?php
                // panggil file koneksi
                include "../../aksi/koneksi.php";
                // rancang querynya
                $querySelectFeed = "SELECT * FROM feed";
                // eksekusi querynya
                $selectFeed = mysqli_query($koneksi, $querySelectFeed) or die(mysqli_error($koneksi));
                $jmlDataFeed = mysqli_num_rows($selectFeed);
                if ($jmlDataFeed == 0) {
                    echo "
                    <tr>
                        <td colspan='8'>Data tidak ada</td>
                    </tr>
                    ";
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($selectFeed)):
            ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row['title_feed']?></td>
                    <td><?= $row['category_feed']?></td>
                    <td><?= $row['desc_feed']?></td>

                    <td>
                        <img src="<?= '../../images/' . $row['image_feed']?>" width="150" height="150">
                    
                    </td>
                    <td><?= $row['date_feed']?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= 'form_edit.php?id_feed='.$row['id_feed']?>">Edit</a> <br>
                        <a class="btn btn-danger" href="<?= '../../aksi/feed/hapus.php?id_feed=' . $row['id_feed']?>" onclick="return confirm('Apakah anda ingin menghapus feed ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
        </table>
    
        <?php include "../../includes/footer.php" ?>