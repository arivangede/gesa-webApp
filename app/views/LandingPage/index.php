<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- {{-- feather icons --}} -->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- {{-- style --}} -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- google maps api
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSgdAW3vVNsn80Z3nL-wQjsrLbhHlvevY&libraries=places"></script> -->
  <!-- aos cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <title>Gesaweb | Landing Page</title>
</head>

<body>
  <!-- header -->
  <header>
    <nav class="navbar">
      <a href="#beranda" class="navbar-logo"><img src="img/logo-red.png" alt="logo" />GESA
      </a>
      <div class="navbar-nav">
        <div class="nav-menu">
          <a href="#beranda">Beranda</a>
          <a href="#tentang">Tentang GESA</a>
          <a href="#fitur-gesa">Fitur GESA</a>
        </div>
        <div class="nav-login">
          <a id="login" href="#beranda">LOGIN</a>
        </div>
      </div>
      <div class="navbar-extra">
        <a href="#beranda" class="btnLogin-popup" id="login">LOGIN</a>
        <!-- <a id="profile"><i data-feather="user"></i></a> -->
        <a id="menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
  </header>
  <!-- header end -->

  <!-- main content -->
  <!-- hero section -->
  <section id="beranda" data-aos="fade" data-aos-duration="600" class="hero">
    <main class="content">
      <h1 data-aos="fade-right" data-aos-duration="700">
        Solusi manajemen Lampu<span> APJ</span>
      </h1>
      <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="700">
        aplikasi <span> GESA </span> sedang dalam tahap konstruksi, menunggu
        keputusan panitia KPBU kota Denpasar.
      </p>
      <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="700" class="under-construction">
        ------ <span> GESA </span> IS UNDER CONSTRUCTION ------
      </p>
      <div class="row">
        <button data-aos="zoom-in" data-aos-delay="500" data-aos-duration="800" class="cta">
          <h3>Klik Disini</h3>
        </button>

        <div class="fitur-gesa">
          <div class="umum">
            <a href="#tentang">+Tentang Gesa</a>
            <a href="<?php echo BASEURL; ?>/Internal/petaBersama">+Peta Bersama</a>
            <a href="#" id="pelaporan">+Pelaporan</a>
          </div>
          <div class="private">
            <a href="#" id="perawatan">+Perawatan</a>
            <a href="#" id="laporan">+Laporan</a>
          </div>
        </div>

        <div class="turunan">
          <div class="pelaporan">
            <a href="#">+Unduh Aplikasi GESA</a>
          </div>
          <div class="laporan">
            <a href="#">+Database</a>
            <a href="#">+Pemakaian Daya</a>
            <a href="#">+Korektif & Preventif</a>
          </div>
          <div class="perawatan">
            <a href="<?php echo BASEURL; ?>/Internal/perawatan">+Peta Maintenance</a>
            <a href="#">+Form Maintenance</a>
          </div>
        </div>

      </div>
    </main>

    <div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close"></ion-icon>
      </span>
      <div class="form-box login">
        <h2>Login</h2>
        <form action="#">
          <div class="input-box">
            <span class="icon">
              <ion-icon name="mail"></ion-icon>
            </span>
            <input type="email" required />
            <label for="">Email</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required />
            <label for="">Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" />Ingat Saya</label><a href="#">Lupa Sandi?</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>
              Belum punya akun?<a class="register-link"> Daftar sekarang</a>
            </p>
          </div>
        </form>
      </div>
      <div class="form-box register">
        <h2>Register</h2>
        <form action="#">
          <div class="input-box">
            <span class="icon">
              <ion-icon name="person"></ion-icon>
            </span>
            <input type="text" required />
            <label for="">Username</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="mail"></ion-icon>
            </span>
            <input type="email" required />
            <label for="">Email</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required />
            <label for="">Password</label>
          </div>
          <div class="remember-forgot">
            <label for=""><input type="checkbox" />Saya setuju dengan syarat & ketentuan
              yang berlaku</label>
          </div>
          <button type="submit" class="btn">Daftar</button>
          <div class="login-register">
            <p>Sudah punya akun?<a class="login-link"> Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- hero end -->
  <!-- about section -->
  <section class="tentang" id="tentang">
    <h2 data-aos="fade-down" data-aos-delay="100" data-aos-duration="700">
      Tentang <span>GESA</span>
    </h2>
    <div class="row">
      <div data-aos="fade-right" data-aos-delay="100" data-aos-duration="700" class="tentang-img">
        <div class="slider">
          <div class="slides">
            <div class="slide 1"><img src="img/2edited.jpeg" alt="" /></div>
            <div class="slide 2"><img src="img/1edited.jpeg" alt="" /></div>
            <div class="slide 3"><img src="img/4edited.jpeg" alt="" /></div>
          </div>
        </div>
      </div>
      <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="700" class="content">
        <h3>apa itu <span>GESA</span> ?</h3>
        <p>
          GESA adalah aplikasi web dan mobile inovatif yang memungkinkan Anda
          melaporkan lampu jalan atau APJ yang rusak dengan mudah dan cepat.
          Kami menawarkan layanan pelaporan 24/7 yang dirancang untuk
          memastikan bahwa masalah infrastruktur yang terkait dengan
          penerangan jalan dapat diatasi dengan segera.
        </p>
        <p>
          GESA singkatan dari Gerbang Sewaka, berasal dari bahasa Bali, yang
          berarti Gerbang Pelayanan. Ini mencerminkan tekad kami untuk
          memberikan pelayanan terbaik kepada masyarakat dalam memperbaiki
          infrastruktur jalan dan lingkungan.
        </p>
        <p>
          Selain layanan pelaporan infrastruktur yang cepat dan mudah, GESA
          juga menawarkan layanan assets management dan facility maintenance
          untuk klien kami. Dengan ini, kami memberikan kemudahan bagi klien
          untuk memantau proses kerja kami dan memastikan bahwa setiap tugas
          dikerjakan dengan baik dan sesuai dengan standar yang diinginkan.
        </p>
        <p>
          Dalam membangun aplikasi GESA, kami mengedepankan teknologi terbaru
          untuk memberikan pengalaman pelaporan yang lebih mudah dan intuitif.
          Aplikasi GESA dapat diakses melalui web atau perangkat mobile,
          sehingga memudahkan pelaporan di mana saja dan kapan saja.
        </p>
        <p>
          Kami berkomitmen untuk memberikan pelayanan dan solusi terbaik bagi
          masyarakat dalam memperbaiki infrastruktur jalan dan lingkungan.
          Bergabunglah dengan GESA hari ini dan berkontribusi dalam menjadikan
          lingkungan kita lebih baik dan maju!
        </p>
      </div>
    </div>
  </section>
  <!-- about end -->

  <!-- peta section -->
  <!-- <section class="peta" id="peta">
    <h2 data-aos="fade-down" data-aos-delay="100" data-aos-duration="700">
      Peta <span>titik APJ</span> Kota Denpasar
    </h2>
    <div data-aos="fade-right" data-aos-delay="100" data-aos-duration="700" class="row">
      <div class="panel">
        <span class="icon-panel">
          <ion-icon name="chevron-forward-circle-outline"></ion-icon>
        </span>
        <div class="content">
          <div class="search">
            <input class="search-input" id="search-input" type="text" placeholder="ex: Jalan Maruti" />
            <span>
              <ion-icon name="search"></ion-icon>
            </span>
          </div>
          <div class="filter">
            <p>Filter</p>
            <span class="filter-icon"><ion-icon name="chevron-down"></ion-icon></span>
          </div>
          <div class="filter-container">
            <div class="fungsi-ruas">
              <p>Fungsi Ruas</p>
              <label><input type="checkbox" name="jenis_jalan" value="arteri" onclick="updateMarkers()" />Arteri</label>
              <label><input type="checkbox" name="jenis_jalan" value="kolektor" onclick="updateMarkers()" />Kolektor</label>
              <label><input type="checkbox" name="jenis_jalan" value="pariwisata" onclick="updateMarkers()" />Pariwisata</label>
              <label><input type="checkbox" name="jenis_jalan" value="lingkungan" onclick="updateMarkers()" />Lingkungan</label>
            </div>
          </div>
        </div>
      </div>
      <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="700" class="map" id="map"></div>
    </div>
  </section> -->

  <!-- peta end -->


  <!-- Fitur GESA -->
  <section id="fitur-gesa">
    <div data-aos="fade-down" data-aos-delay="100" data-aos-duration="700" class="title">
      <h2><span>Fitur</span> GESA</h2>
    </div>

    <div class="fitur-wrapper">
      <!-- <div class="content-title">
        <h2>Fitur Aplikasi Gesa</h2>
      </div> -->
      <div class="content">
        <div class="main-circle">
          <div class="outer-circle"></div>
          <div class="circle">Aplikasi<span>GESA</span></div>
        </div>
        <div class="line-content">
          <div class="line-fitur pelaporan">
            <div class="line-bend-down-high"></div>
            <div class="line-straight"></div>
            <div class="circle-number">1</div>
            <h3>Pelaporan</h3>
          </div>
          <div class="line-fitur perawatan">
            <div class="line-straight"></div>
            <div class="circle-number">2</div>
            <h3>Perawatan</h3>
          </div>
          <div class="line-fitur petabersama">
            <div class="line-straight"></div>
            <div class="circle-number">3</div>
            <h3>Peta Bersama</h3>
          </div>
          <div class="line-fitur laporan">
            <div class="line-bend-up-high"></div>
            <div class="line-straight"></div>
            <div class="circle-number">4</div>
            <h3>Laporan</h3>
          </div>
        </div>

        <!-- <div class="content-desc">
          <div class="desc-pelaporan">
            <h3 class="card-title">Pelaporan</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus adipisci nemo dolore voluptates voluptatum non neque provident ut omnis sapiente?</p>
          </div>
        </div> -->

      </div>
    </div>
  </section>





  <!-- Fitur GESA -->

  <!-- main end -->
  <!-- footer -->
  <footer>
    <div class="socials">
      <a href=""><i data-feather="instagram"></i>gerbang.sewaka</a>
      <a href=""><i data-feather="twitter"></i>@gerbang.sewakaid</a>
      <a href=""><i data-feather="facebook"></i>Gerbang Sewaka</a>
    </div>

    <div class="links">
      <a href="#beranda">Beranda</a>
      <a href="#tentang">Tentang Kami</a>
      <a href="#peta">Peta</a>
    </div>

    <div class="credit">
      <p>Created By <a href="">Elan Negeri Gemilang</a> . | &copy; 2023.</p>
    </div>
  </footer>
  <!-- footer end -->
  <!-- {{-- script feathericons --}} -->
  <script>
    feather.replace();
  </script>
  <!-- script aos -->
  <script>
    AOS.init();
  </script>

  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      const slides = document.getElementsByClassName("slide");
      for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      slides[slideIndex - 1].classList.add("active");
      setTimeout(showSlides, 5000); // Change image every 4 seconds
    }
  </script>

  <script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>