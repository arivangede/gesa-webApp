<?php
require '../functions/functions.php';

$dataTiang = query("SELECT * FROM titik_tiang ORDER BY id DESC LIMIT 1000");

if (isset($_POST["search"])) {
    $dataTiang = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/internal.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSgdAW3vVNsn80Z3nL-wQjsrLbhHlvevY&libraries=places"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <title>GESA | Database</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="head">
                <div class="image-text">
                    <span class="image">
                        <img src="../../img/logo white.png" alt="logo">
                    </span>
                    <div class="text header-text">
                        <span class="name">GESA</span>
                        <span class="profession">Internal</span>
                    </div>
                </div>

                <button class="sidebar-btn">
                    <i class='bx bx-menu'></i>
                </button>
            </div>

            <div class="nav-link">

                <a class="dashboard" href="../dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span>Dashboard</span>
                </a>
                <a class="petabersama " href="../petaBersama.php">
                    <i class='bx bx-map-alt'></i>
                    <span>Peta Bersama</span>
                </a>
                <a class="database active" href="../database.php">
                    <i class='bx bxs-data'></i>
                    <span>Database</span>
                </a>
            </div>

            <div class="nav-profile">
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span>Logout</span>
                </a>
            </div>
        </header>
    </nav>

    <section class="datatiang-section">
        <div class="data-table-wrapper">
            <div class="upper-table">
                <div></div>
                <h2>Data Titik Tiang</h2>

                <form action="" method="post" class="search-table">
                    <?php if (isset($_POST["search"])) : ?>
                        <a class="kembali-btn" href="dataTiang.php">Reset Pencarian</a>
                    <?php endif; ?>
                    <input type="text" name="keyword" class="search-input" placeholder="Cari disini" autocomplete="off" required value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : ''; ?>">
                    <button type="submit" name="search" class="search-btn">
                        <i class='bx bx-search'></i>
                    </button>
                </form>
                <a class="tambah-data-btn" href="tambahDataTiang.php">
                    Tambah data tiang +
                </a>
            </div>
            <div class="table-container">
                <table class="tiang data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Tiang</th>
                            <th>Nama Ruas</th>
                            <th>Status</th>
                            <th>Kecamatan</th>
                            <th>Desa / Kelurahan</th>
                            <th>Fungsi Ruas</th>
                            <th>Kepemilikan</th>
                            <th>Tipe Arm</th>
                            <th>Daya</th>
                            <th>Jumlah Lampu</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th class="action-box">Aksi</th>
                        </tr>
                    </thead>

                    <?php $i = 1; ?>
                    <?php foreach ($dataTiang as $row) : ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row["id_tiang"] ?></td>
                            <td><?php echo $row["nama_ruas"] ?></td>
                            <td><?php echo $row["status_tiang"] ?></td>
                            <td><?php echo $row["kecamatan"] ?></td>
                            <td><?php echo $row["desa_kelurahan"] ?></td>
                            <td><?php echo $row["fungsi_ruas"] ?></td>
                            <td><?php echo $row["kepemilikan"] ?></td>
                            <td><?php echo $row["tipe_arm"] ?></td>
                            <td><?php echo $row["daya"] ?></td>
                            <td><?php echo $row["jumlah_lampu"] ?></td>
                            <td><?php echo $row["lat"] ?></td>
                            <td><?php echo $row["lng"] ?></td>
                            <td class="action-box">
                                <a class="ubah-btn" href="#">Ubah</a>
                                <!-- <a class="hapus-btn" href="#">Hapus</a> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </section>




    <script src="../functions/main.js"></script>
</body>

</html>