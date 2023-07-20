<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/internal.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>GESA | Dashboard</title>
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

                <a class="dashboard active" href="<?php echo BASEURL; ?>/Internal/index">
                    <i class='bx bx-grid-alt'></i>
                    <span>Dashboard</span>
                </a>
                <a class="petabersama" href="<?php echo BASEURL; ?>/Internal/petaBersama">
                    <i class='bx bx-map-alt'></i>
                    <span>Peta Bersama</span>
                </a>
                <a class="database" href="<?php echo BASEURL; ?>/internal/database">
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


    <div class="dashboard-section">
        <div class="dash-title">
            <h2>Dashboard</h2>
        </div>

        <div class="card-filter">
            <div class="card-overview">
                <p>Overview</p>
            </div>
            <div class="childcard-wrapper">
                <div class="card-child">
                    <div class="filter-card fungsi-ruas">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <p>Fungsi Ruas <span>show</span> </p>
                        <h5>6</h5>
                    </div>
                    <div class="filter-card kecamatan">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <p>Kecamatan <span>show</span> </p>
                        <h5>4</h5>
                    </div>
                    <div class="filter-card fasosum">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <p>Fasosum <span>show</span> </p>
                        <h5>1</h5>
                    </div>
                    <div class="filter-card laporan">
                        <i class='bx bxs-objects-vertical-bottom'></i>
                        <p>Laporan <span>show</span> </p>
                        <h5>3</h5>
                    </div>

                    <div class="next-btn">
                        <img src="../img/icon/arrow-card-child.png" alt=">">
                    </div>
                    <div class="prev-btn">
                        <img src="../img/icon/arrow-card-child.png" alt=">">
                    </div>
                </div>
            </div>
        </div>
        <div class="dash-body overview">
            <div class="quick-count">
                <div class="count-card existing">
                    <div class="card-head">
                        <i class='bx bx-bar-chart'></i>
                        <p>Total Existing</p>
                    </div>
                    <h5>17.163 <span>Titik Tiang</span></h5>
                </div>
                <div class="count-card tiang">
                    <div class="card-head">
                        <i class='bx bx-bar-chart'></i>
                        <p>Total Tiang</p>
                    </div>
                    <h5>15.151 <span>Titik Tiang</span></h5>
                </div>
                <div class="count-card fasosum">
                    <div class="card-head">
                        <i class='bx bx-bar-chart'></i>
                        <p>Total Existing</p>
                    </div>
                    <h5>2.389 <span>Titik Tiang</span></h5>
                </div>
                <div class="count-card propose">
                    <div class="card-head">
                        <i class='bx bx-bar-chart'></i>
                        <p>Total Existing</p>
                    </div>
                    <h5>1.300 <span>Titik Tiang</span></h5>
                </div>
            </div>
        </div>
    </div>



    <script src="<?php echo BASEURL; ?>/internal/functions/main.js"></script>
</body>

</html>