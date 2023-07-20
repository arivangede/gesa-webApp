<?php
require 'internal/functions/functions.php';
?>
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

    <title>GESA | Peta Bersama</title>
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
                <a class="petabersama active" href="<?php echo BASEURL; ?>/Internal/petaBersama">
                    <i class='bx bxs-map-alt'></i>
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



    <section class="petabersama-section">
        <div class="dark-screen"></div>
        <div class="petabersama-content">
            <div class="mapcontainer">
                <div class="map" id="map"></div>

                <div class="custom_controls">

                    <div class="custom_types_controls desktop">
                        <button class="map_type_button desktop">Map</button>
                        <button class="satellite_type_button desktop">Satellite</button>
                    </div>

                    <div class="zoom_controls desktop">
                        <button class="zoom_in_control desktop">
                            <i class='bx bx-plus'></i>
                        </button>
                        <button class="zoom_out_control desktop">
                            <i class='bx bx-minus'></i>
                        </button>
                    </div>

                    <div class="custom_types_controls hp">
                        <button class="map_type_button hp">Map</button>
                        <button class="satellite_type_button hp">Satellite</button>
                    </div>

                    <div class="zoom_controls hp">
                        <button class="zoom_in_control hp">
                            <i class='bx bx-plus'></i>
                        </button>
                        <button class="zoom_out_control hp">
                            <i class='bx bx-minus'></i>
                        </button>
                    </div>
                    <!-- sw ui -->
                    <div class="search_control">
                        <img src="../img/logo-red.png" alt="logo">
                        <input type="text" name="search" id="search" placeholder="Search" autocomplete="off">
                        <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                    </div>
                    <!-- sw ui end-->
                </div>


                <!-- sw ui -->

                <div class="map-filter hp">

                    <div class="icon_filter_hp">
                        <i class='bx bxs-layer'></i>
                        <span>filter</span>
                    </div>
                </div>
                <div class="menu-filter hp">
                    <div class="close-btn">
                        <i class='bx bx-x'></i>
                    </div>
                    <div class="filter">
                        <h4>Filter</h4>
                        <div class="filter-box">

                            <div class="filter-fungsiruas">
                                <p>Fungsi Ruas</p>
                                <label><input type="checkbox" name="jenis_jalan" value="Arteri" />Arteri</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor A" />Kolektor A</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor B" />Kolektor B</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor C" />Kolektor C</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Pariwisata" />Pariwisata</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Lingkungan" />Lingkungan</label>
                            </div>
                            <div class="filter-kecamatan">
                                <p>Kecamatan</p>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Utara" />Denpasar Utara</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Timur" />Denpasar Timur</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Selatan" />Denpasar Selatan</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Barat" />Denpasar Barat</label>
                            </div>
                            <div class="filter-kecamatan">
                                <p>Status</p>
                                <label><input type="checkbox" name="existing" value="Existing" />Existing</label>
                                <!-- <label><input type="checkbox" name="tiang" value="Tiang" />Tiang</label>
                                <label><input type="checkbox" name="propose" value="Propose Lingkungan" />Propose</label>
                                <label><input type="checkbox" name="fasosum" value="Fasosum" />Fasosum</label> -->
                            </div>
                        </div>
                        <div class="filter-apply-btn">
                            <button class="filter-btn" onclick="applyFilter()">Apply</button>
                        </div>
                    </div>
                </div>
                <!-- sw ui end -->
            </div>
            <div class="map-menu active">
                <div class="header-menu active">
                    <i class='bx bxs-chevron-left '></i>
                    <span>Map Menu</span>
                </div>
                <div class="menu-container active">

                    <div class="filter-wrapper">
                        <h4>Filter</h4>
                        <div class="filter-fungsiruas">
                            <div class="header-filter">
                                <p>Fungsi Ruas</p>
                                <i class='bx bx-chevron-down-circle'></i>
                            </div>
                            <div class="body-filter">
                                <label><input type="checkbox" name="jenis_jalan" value="Arteri" />Arteri</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor A" />Kolektor A</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor B" />Kolektor B</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Kolektor C" />Kolektor C</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Pariwisata" />Pariwisata</label>
                                <label><input type="checkbox" name="jenis_jalan" value="Lingkungan" />Lingkungan</label>
                            </div>
                        </div>
                        <div class="filter-fungsiruas">
                            <div class="header-filter">
                                <p>Kecamatan</p>
                                <i class='bx bx-chevron-down-circle'></i>
                            </div>
                            <div class="body-filter">
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Utara" />Denpasar Utara</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Timur" />Denpasar Timur</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Selatan" />Denpasar Selatan</label>
                                <label><input type="checkbox" name="kecamatan" value="Denpasar Barat" />Denpasar Barat</label>
                            </div>
                        </div>
                        <div class="filter-fungsiruas">
                            <div class="header-filter">
                                <p>Status</p>
                                <i class='bx bx-chevron-down-circle'></i>
                            </div>
                            <div class="body-filter">
                                <label><input type="checkbox" name="existing" value="Existing" />Existing</label>
                                <label><input type="checkbox" name="fasosum" value="Fasosum" />Fasosum</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-btn-wrapper">
                        <button class="filter-btn" onclick="applyFilter()"><i class='bx bxs-badge-check'></i>Apply Filter</button>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo BASEURL; ?>/internal/functions/main.js"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

</body>

</html>