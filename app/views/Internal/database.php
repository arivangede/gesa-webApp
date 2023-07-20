<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/internal.css">
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
                        <img src="../img/logo white.png" alt="logo">
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

                <a class="dashboard" href="<?php echo BASEURL; ?>/Internal/index">
                    <i class='bx bx-grid-alt'></i>
                    <span>Dashboard</span>
                </a>
                <a class="petabersama" href="<?php echo BASEURL; ?>/Internal/petaBersama">
                    <i class='bx bx-map-alt'></i>
                    <span>Peta Bersama</span>
                </a>
                <a class="database active" href="<?php echo BASEURL; ?>/internal/database">
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

    <section class="card-selector-section">
        <div class="datacard-wrapper">
            <div class="datatiang data-card" onclick="window.location.href = 'database/dataTiang.php';">
                <div class=" datacard-head">
                    <h3>Data Titik Tiang</h3>
                    <i class='bx bx-map-pin'></i>
                </div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, dolorem?</p>
            </div>
            <div class="other-data-wrapper">
                <div class="datalapor data-card disable">
                    <div class="datacard-head">
                        <h3>Data Laporan</h3>
                        <i class='bx bxs-report'></i>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, doloribus!</p>
                </div>
                <div class="datamaint data-card disable">
                    <div class="datacard-head">
                        <h3>Data Maintenance</h3>
                        <i class='bx bxs-hard-hat'></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rem!</p>
                </div>
            </div>
        </div>
    </section>





    <script src="<?php echo BASEURL; ?>/internal/functions/main.js"></script>
</body>

</html>