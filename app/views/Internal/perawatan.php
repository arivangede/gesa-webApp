<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/internal-perawatan.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvQjGBul9U3rJiyV0rKGIhSkhIE-R4kP0&libraries=places"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>GESA | Perawatan</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../img/logo white.png" alt="logo">
                <div class="title">
                    <h1>GESA</h1>
                    <p>Teknisi</p>
                </div>
            </div>

            <div class="nav-link">
                <a href="#peta-maintenance" class="peta-maintenance  active">Peta Maintenance</a>
                <!-- <a href="#tiang" class="tiang">Tiang</a>
                <a href="#grup" class="grup">Grup</a> -->
            </div>
        </nav>
    </header>

    <section id="peta-maintenance" class="peta-section">
        <div class="content-wrapper">
            <h1 class="section-title">Peta Maintenance</h1>
            <div class="map-container">
                <div id="map">
                </div>
                <div class="petam-layout-container">
                    <div class="layout-title">
                        <i class='bx bx-caret-left-circle' id="btn-petam"></i>
                        <h1>Layout</h1>
                    </div>
                    <div class="layout-menu" id="layoutmn">
                        <label for="kabel">
                            <input type="checkbox" name="kabel" id="kabel">
                            Tampilkan Kabel
                        </label>
                    </div>
                </div>
            </div>
            <div class="map-filters">
                <div class="search-wrapper">
                    <input type="text" placeholder="Cari Jalan, Desa, & Grup" name="search" id="search" autocomplete="off">
                    <button>
                        <i class='bx bx-search'></i>
                    </button>
                    <datalist id="rekomendasi"></datalist>
                </div>
                <div class="filter-wrapper">

                    <div class="filter-existing">
                        <div class="title">
                            <h3>Propose</h3>
                        </div>
                        <div class="filter-option">
                            <div class="filter fungsi-ruas">
                                <div class="filter-head">
                                    <h3>Fungsi-Ruas</h3>
                                    <i class='bx bxs-chevron-down' id="dd-fruas"></i>
                                </div>
                                <div class="filter-body" id="menuDDfruas">
                                    <label for="arteri">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="arteri" value="Arteri" onclick="applyFilter()">
                                        Arteri
                                    </label>
                                    <label for="kolektora">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="kolektora" value="Kolektor A" onclick="applyFilter()">
                                        Kolektor A
                                    </label>
                                    <label for="kolektorb">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="kolektorb" value="Kolektor B" onclick="applyFilter()">
                                        Kolektor B
                                    </label>
                                    <label for="kolektorc">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="kolektorc" value="Kolektor C" onclick="applyFilter()">
                                        Kolektor C
                                    </label>
                                    <label for="wisata">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="wisata" value="Pariwisata" onclick="applyFilter()">
                                        Wisata
                                    </label>
                                    <label for="lingkungan">
                                        <input type="checkbox" class="checkbox" name="fungsi_ruas" id="lingkungan" value="Lingkungan" onclick="applyFilter()">
                                        Lingkungan
                                    </label>
                                </div>
                            </div>
                            <div class="filter kecamatan">
                                <div class="filter-head">
                                    <h3>Kecamatan</h3>
                                    <i class='bx bxs-chevron-down' id="dd-kecamatan"></i>
                                </div>
                                <div class="filter-body" id="menuDDkecamatan">
                                    <label for="denpasar-utara">
                                        <input type="checkbox" class="checkbox" name="kecamatan" id="denpasar-utara" value="Denpasar Utara" onclick="applyFilter()">
                                        Denpasar Utara
                                    </label>
                                    <label for="denpasar-timur">
                                        <input type="checkbox" class="checkbox" name="kecamatan" id="denpasar-timur" value="Denpasar Timur" onclick="applyFilter()">
                                        Denpasar Timur
                                    </label>
                                    <label for="denpasar-barat">
                                        <input type="checkbox" class="checkbox" name="kecamatan" id="denpasar-barat" value="Denpasar Barat" onclick="applyFilter()">
                                        Denpasar Barat
                                    </label>
                                    <label for="denpasar-selatan">
                                        <input type="checkbox" class="checkbox" name="kecamatan" id="denpasar-selatan" value="Denpasar Selatan" onclick="applyFilter()">
                                        Denpasar Selatan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <div class="unavailable">
        <div class="card">
            <div class="logo">
                <img src="../img/logo white.png" alt="logo">
                <h2>GESA | Teknisi</h2>
            </div>

            <div class="body">
                <h3>Mohon maaf fitur ini <span>BELUM</span> memiliki tampilan untuk smartphone </h3>
            </div>
        </div>
    </div>

    <!-- <section id="tiang">
        <h1>Tiang</h1>
    </section>
    <section id="grup">
        <h1>Grup</h1>
    </section> -->

    <script src="<?php echo BASEURL; ?>/internal/functions/perawatan.js"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</body>

</html>