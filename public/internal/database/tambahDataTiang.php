<?php
require '../functions/functions.php';

// tambah data
if (isset($_POST["tambah"])) {

    // cek apakah data berhasil ditambahkan & redirect ke halaman yg sama untuk mengatasi input berulang
    if (create($_POST) > 0) {
        echo "
      <script>
      alert('data berhasil ditambahkan!');
      window.location.href = 'dataTiang.php';
      </script>";
        exit;
    } else {
        echo "
      <script>
      alert('data gagal ditambahkan!');
      window.location.href = 'tambahDataTiang.php';
      </script>";
        exit;
    }
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

    <section class="tambahdatatiang-section">
        <div class="tambahdata-wrapper">
            <div class="tambahdata-header">
                <h2>tambah data</h2>
            </div>
            <div class="tambahdata-body">
                <form action="" class="tambahdata-form" method="post">
                    <ul>
                        <li>
                            <label for="id_tiang">ID Tiang :</label>
                            <input type="text" name="id_tiang" id="id_tiang" required>
                        </li>
                        <li>
                            <label for="nama_ruas">Nama Ruas :</label>
                            <input type="text" name="nama_ruas" id="nama_ruas" required>
                        </li>
                        <li>
                            <label for="status_tiang">Status :</label>
                            <input type="text" name="status_tiang" id="status_tiang" required>
                        </li>
                        <li>
                            <label for="kecamatan">Kecamatan :</label>
                            <input type="text" name="kecamatan" id="kecamatan" required>
                        </li>
                        <li>
                            <label for="desa_kelurahan">Desa / Kelurahan :</label>
                            <input type="text" name="desa_kelurahan" id="desa_kelurahan" required>
                        </li>
                        <li>
                            <label for="fungsi_ruas">Fungsi Ruas :</label>
                            <input type="text" name="fungsi_ruas" id="fungsi_ruas" required>
                        </li>
                        <li>
                            <label for="kepemilikan">Kepemilikan :</label>
                            <input type="text" name="kepemilikan" id="kepemilikan" required>
                        </li>
                        <li>
                            <label for="tipe_arm">Tipe Arm :</label>
                            <input type="text" name="tipe_arm" id="tipe_arm" required>
                        </li>
                        <li>
                            <label for="daya">Daya :</label>
                            <input type="text" name="daya" id="daya" required>
                        </li>
                        <li>
                            <label for="jumlah_lampu">Jumlah Lampu :</label>
                            <input type="number" name="jumlah_lampu" id="jumlah_lampu" value="0" required>
                        </li>
                        <li>
                            <label for="lat">Latitude :</label>
                            <input type="text" name="lat" id="lat" required>
                        </li>
                        <li>
                            <label for="lng">Longitude :</label>
                            <input type="text" name="lng" id="lng" required>
                        </li>
                        <div class="tambahdata-submit">
                            <button type="submit" name="tambah">Tambah</button>
                        </div>
                    </ul>
                </form>
            </div>
        </div>
        <div class="tambahdata-map" id="map"></div>
    </section>




    <script src="../functions/main.js"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</body>

</html>