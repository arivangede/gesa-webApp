// toggle class active
const navbarNav = document.querySelector(".navbar-nav");
const navbarExtra = document.querySelector(".navbar-extra");
// ketika menu di klik
document.querySelector("#menu").onclick = () => {
  navbarNav.classList.toggle("active") & navbarExtra.classList.toggle("active");
};

// klik diluar sidebar untuk menutup nav
const menu = document.querySelector("#menu");

document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active") &
      navbarExtra.classList.remove("active");
  }
});

// popup login-register form
const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const btnPopupLogin = document.querySelector(".btnLogin-popup");
const closeLogin = document.querySelector(".icon-close");
const login = document.querySelector("#login");

registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
});
loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});

btnPopupLogin.addEventListener("click", () => {
  wrapper.classList.add("active-popup");
  btnPopupLogin.classList.add("active");
});

closeLogin.addEventListener("click", () => {
  wrapper.classList.remove("active-popup");
  wrapper.classList.remove("active");
  btnPopupLogin.classList.remove("active");
});

document.addEventListener("click", function (e) {
  if (
    !wrapper.contains(e.target) &&
    !login.contains(e.target) &&
    !btnPopupLogin.contains(e.target)
  ) {
    wrapper.classList.remove("active-popup");
    wrapper.classList.remove("active");
    btnPopupLogin.classList.remove("active");
  }
});

document.querySelector("#login").onclick = () => {
  wrapper.classList.toggle("active-popup");
  navbarNav.classList.remove("active");
  navbarExtra.classList.remove("active");
  btnPopupLogin.classList.remove("active");
};

//klik cta untuk menampilkan fitur
const klikDisiniBtn = document.querySelector(".cta");
const pelaporanBtn = document.querySelector("#pelaporan");
const laporanBtn = document.querySelector("#laporan");
const perawatanBtn = document.querySelector("#perawatan");
const menuContainer = document.querySelector(".content .row");

const fiturGesa = document.querySelector(".fitur-gesa");
klikDisiniBtn.addEventListener("click", function () {
  fiturGesa.classList.toggle("active");
  menuContainer.classList.toggle("active");
  turunanLaporan.classList.remove("active");
  turunanPerawatan.classList.remove("active");
  turunanPelaporan.classList.remove("active");
});

const turunanPelaporan = document.querySelector(".turunan .pelaporan");
pelaporanBtn.addEventListener("click", function () {
  turunanPelaporan.classList.toggle("active");
  turunanLaporan.classList.remove("active");
  turunanPerawatan.classList.remove("active");
});

const turunanLaporan = document.querySelector(".turunan .laporan");
laporanBtn.addEventListener("click", function () {
  turunanLaporan.classList.toggle("active");
  turunanPerawatan.classList.remove("active");
  turunanPelaporan.classList.remove("active");
});

const turunanPerawatan = document.querySelector(".turunan .perawatan");
perawatanBtn.addEventListener("click", function () {
  turunanPerawatan.classList.toggle("active");
  turunanLaporan.classList.remove("active");
  turunanPelaporan.classList.remove("active");
});

// // slide panel
// const panelOpenIcon = document.querySelector(".icon-panel");
// const panel = document.querySelector(".panel");
// const search = document.querySelector(".search");
// const filter = document.querySelector(".filter");

// panelOpenIcon.addEventListener("click", function () {
//   panel.classList.toggle("active");
//   panelOpenIcon.classList.toggle("active");
//   search.classList.toggle("active");
//   filter.classList.toggle("active");
//   fungsiRuasDropdown.classList.remove("active");
// });

// // filter dropdown
// const filterDropdown = document.querySelector(".filter-icon");
// const fungsiRuasDropdown = document.querySelector(".fungsi-ruas");

// filterDropdown.addEventListener("click", function () {
//   filterDropdown.classList.toggle("active");
//   fungsiRuasDropdown.classList.toggle("active");
// });

// // membuat variabel global untuk peta dan semua marker
// var map;
// var markers = [];
// var selectedMarker = null;
// var infowindow = new google.maps.InfoWindow();

// // fungsi untuk menampilkan marker yang dipilih dan memindahkan peta ke marker tersebut
// function showMarkers(type) {
//   var bounds = new google.maps.LatLngBounds(); // membuat variabel bounds untuk menampung batas-batas peta
//   var visibleMarkers = [];

//   for (var i = 0; i < markers.length; i++) {
//     if (type === "all" || markers[i].type === type) {
//       // tampilkan marker jika jenisnya sama dengan jenis yang dipilih atau jenisnya adalah 'all'
//       markers[i].setVisible(true);
//       bounds.extend(markers[i].getPosition()); // menambahkan koordinat marker ke variabel bounds
//       visibleMarkers.push(markers[i]);
//     } else {
//       // sembunyikan marker jika jenisnya tidak dipilih
//       markers[i].setVisible(false);
//     }
//   }

//   if (visibleMarkers.length > 0) {
//     // pindahkan peta ke marker pertama yang muncul
//     map.setCenter(visibleMarkers[0].getPosition());
//     // map.setZoom(15);
//   } else {
//     // tampilkan peta keseluruhan jika tidak ada marker yang ditampilkan
//     map.fitBounds(bounds);
//   }
// }

// // fungsi untuk menyembunyikan marker yang dipilih
// function hideMarkers(type) {
//   for (var i = 0; i < markers.length; i++) {
//     if (markers[i].type === type) {
//       markers[i].setVisible(false);
//     }
//   }
// }

// // fungsi untuk memperbarui tampilan marker berdasarkan checkbox yang dipilih
// function updateMarkers() {
//   // mendapatkan nilai checkbox yang dipilih
//   var types = document.getElementsByName("jenis_jalan");
//   var selectedTypes = [];
//   for (var i = 0; i < types.length; i++) {
//     if (types[i].checked) {
//       selectedTypes.push(types[i].value);
//     }
//   }

//   // menampilkan atau menyembunyikan marker berdasarkan nilai checkbox yang dipilih
//   if (selectedTypes.length === 0) {
//     // jika tidak ada jenis jalan yang dipilih, sembunyikan semua marker
//     hideMarkers("all");
//   } else {
//     // jika ada jenis jalan yang dipilih, tampilkan marker yang sesuai
//     for (var i = 0; i < markers.length; i++) {
//       if (selectedTypes.indexOf(markers[i].type) >= 0) {
//         // tampilkan marker jika jenisnya dipilih
//         markers[i].setVisible(true);
//       } else {
//         // sembunyikan marker jika jenisnya tidak dipilih
//         markers[i].setVisible(false);
//       }
//     }
//   }
// }

// // menambahkan event listener untuk checkbox
// var types = document.getElementsByName("jenis_jalan");
// for (var i = 0; i < types.length; i++) {
//   types[i].addEventListener("click", function () {
//     if (this.checked) {
//       showMarkers(this.value);
//     } else {
//       hideMarkers(this.value);
//       infowindow.close();
//       selectedMarker = null;
//     }
//   });
// }

// function addMarker(
//   latitude,
//   longitude,
//   nama_ruas,
//   kepemilikan,
//   jenis_bahan,
//   jumlah_lampu,
//   jenis_lampu,
//   fungsi_ruas,
//   gambar_url
// ) {
//   var marker = new google.maps.Marker({
//     position: new google.maps.LatLng(latitude, longitude),
//     map: map,
//     visible: false, // awalnya marker disembunyikan
//     type: fungsi_ruas, // menyimpan jenis marker
//     icon: chooseIcon(jumlah_lampu),
//   });
//   markers.push(marker);

//   // menambahkan event listener untuk menampilkan infowindow saat marker di-klik
//   marker.addListener("click", function () {
//     if (selectedMarker !== null) {
//       infowindow.close();
//     }
//     selectedMarker = marker;
//     infowindow.setContent(
//       "<div>" +
//         "<h3>" +
//         nama_ruas +
//         "</h3>" +
//         "<div class='row'>" +
//         "<div class='description'>" +
//         "<p><span>Kepemilikan:</span>  " +
//         kepemilikan +
//         "</p>" +
//         "<p><span>Bahan Tiang:</span>  " +
//         jenis_bahan +
//         "</p>" +
//         "<p><span>Jumlah lampu:</span> " +
//         jumlah_lampu +
//         "</p>" +
//         "<p><span>Jenis Lampu:</span>  " +
//         jenis_lampu +
//         "</p>" +
//         "</div>" +
//         "<div class='image'>" +
//         "<img src='" +
//         gambar_url +
//         "' alt='foto tiang'>" +
//         "</div>" +
//         "</div>" +
//         "</div>"
//     );

//     infowindow.open(map, marker);

//     // menambahkan event listener pada info window agar selectedMarker diatur ke null saat info window ditutup
//     infowindow.addListener("closeclick", function () {
//       selectedMarker = null;
//     });
//   });
// }

// function chooseIcon(jumlah_lampu) {
//   if (jumlah_lampu == 1) {
//     return "img/icon/marker-icon-green.png";
//   } else if (jumlah_lampu == 2) {
//     return "img/icon/marker-icon-yellow.png";
//   } else if (jumlah_lampu == 3) {
//     return "img/icon/marker-icon-blue.png";
//   } else if (jumlah_lampu == 0) {
//     return "img/icon/marker-icon-red.png";
//   }
// }

// // inisialisasi peta dan marker
// function initMap() {
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: new google.maps.LatLng(-8.6730071, 115.2513387),
//     zoom: 15,
//     mapTypeControlOptions: {
//       mapTypeIds: [],
//     },
//     styles: [
//       {
//         featureType: "administrative",
//         elementType: "geometry",
//         stylers: [
//           {
//             visibility: "off",
//           },
//         ],
//       },
//       {
//         featureType: "poi",
//         stylers: [
//           {
//             visibility: "off",
//           },
//         ],
//       },
//       {
//         featureType: "road",
//         elementType: "labels.icon",
//         stylers: [
//           {
//             visibility: "off",
//           },
//         ],
//       },
//       {
//         featureType: "transit",
//         stylers: [
//           {
//             visibility: "off",
//           },
//         ],
//       },
//     ],
//   });

//   $.ajax({
//     url: "js/getData.php",
//     method: "GET",
//     dataType: "json",
//     success: function (data) {
//       for (var i = 0; i < data.length; i++) {
//         var markerData = data[i];
//         addMarker(
//           markerData.latitude,
//           markerData.longitude,
//           markerData.nama_ruas,
//           markerData.kepemilikan,
//           markerData.jenis_bahan,
//           markerData.jumlah_lampu,
//           markerData.jenis_lampu,
//           markerData.fungsi_ruas,
//           markerData.gambar_url
//         );
//       }
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//       console.log(textStatus + ": " + errorThrown);
//     },
//   });

//   // memperbarui tampilan marker saat checkbox diubah
//   var types = document.getElementsByName("jenis_jalan");
//   for (var i = 0; i < types.length; i++) {
//     types[i].addEventListener("change", updateMarkers);
//   }
// }

// function getDataFromDatabase() {
//   console.log("getDataFromDatabase() terpanggil");
// }

// =================== FITUR GESA ==================
var outerCircle = document.querySelector(".outer-circle");
var circle = document.querySelector(".main-circle");
var isAnimating = false;
var delay1 = 1000;
var delay2 = 2000;

function circleDelay() {
  setTimeout(circleActive, delay1);
}

function showLineFiturWithDelay() {
  setTimeout(showLineFitur, delay2);
}

function circleActive() {
  circle.classList.add("active");
}

function handleScroll() {
  var contentPosition = outerCircle.getBoundingClientRect().top;
  var circlePos = circle.getBoundingClientRect().top;
  var windowHeight = window.innerHeight;

  if (circlePos - windowHeight <= 0) {
    circleDelay();
  } else if (circlePos - windowHeight > 0) {
    circle.classList.remove("active");
  }

  if (contentPosition - windowHeight <= 0 && !isAnimating) {
    outerCircle.classList.add("animate");
    showLineFiturWithDelay();
    isAnimating = true;
  } else if (contentPosition - windowHeight > 0 && isAnimating) {
    outerCircle.classList.remove("animate");
    showLineFiturWithDelay();
    isAnimating = false;
  }
}

var lineFiturElements = document.querySelectorAll(".line-fitur");
function showLineFitur() {
  for (var i = 0; i < lineFiturElements.length; i++) {
    (function (index) {
      setTimeout(function () {
        lineFiturElements[index].classList.toggle("show");
      }, index * 400); // Mengatur interval antara munculnya setiap elemen (dalam milidetik)
    })(i);
  }
}

window.addEventListener("scroll", handleScroll);

var garisLurus = document.querySelector(".line-straight");
var garisMiringDown = document.querySelector(".line-bend-down-high");
var fiturPelaporan = document.querySelector(".line-fitur.pelaporan");

fiturPelaporan.addEventListener("click", function () {
  fiturPelaporan.classList.toggle("active");
});

// =================== END FITUR GESA ==================
