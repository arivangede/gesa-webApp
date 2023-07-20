const ddFungsiRuas = document.querySelector("#dd-fruas");
const menuDDFungsiRuas = document.querySelector("#menuDDfruas");
ddFungsiRuas.addEventListener("click", function () {
  ddFungsiRuas.classList.toggle("active");
  menuDDFungsiRuas.classList.toggle("active");
});

const ddKecamatan = document.querySelector("#dd-kecamatan");
const menuDDKecamatan = document.querySelector("#menuDDkecamatan");
ddKecamatan.addEventListener("click", function () {
  ddKecamatan.classList.toggle("active");
  menuDDKecamatan.classList.toggle("active");
});

const layoutBtn = document.querySelector("#btn-petam");
const layoutMn = document.querySelector("#layoutmn");
layoutBtn.addEventListener("click", function () {
  layoutBtn.classList.toggle("active");
  layoutMn.classList.toggle("active");
});

var map;
var markers = [];
var hiddenMarkers = [];
var selectedMarker = null;
var infowindow = new google.maps.InfoWindow();

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(-8.6807041, 115.2116887),
    zoom: 13,
    mapId: "c51a7de88f00d3e2",
    mapTypeControl: false,
    fullscreenControl: false,
  });
  loadMarkers();
}

function loadMarkers() {
  $.ajax({
    url: "functions/getDataPerawatan.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.length; i++) {
        var markerData = data[i];
        addMarker(
          markerData.id_tiang,
          markerData.nama_ruas,
          markerData.lat,
          markerData.lng,
          markerData.status_tiang,
          markerData.kecamatan,
          markerData.desa_kelurahan,
          markerData.tiang_arm,
          markerData.daya,
          markerData.kepemilikan,
          markerData.fungsi_ruas,
          markerData.jumlah_lampu
        );
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(textStatus + ": " + errorThrown);
    },
  });
}

function addMarker(
  id_tiang,
  nama_ruas,
  lat,
  lng,
  status_tiang,
  kecamatan,
  desa_kelurahan,
  tiang_arm,
  daya,
  kepemilikan,
  fungsi_ruas,
  jumlah_lampu
) {
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(lat, lng),
    map: null,
    visible: false,
    type: fungsi_ruas, // menyimpan jenis marker
    id_tiang: id_tiang,
    nama_ruas: nama_ruas,
    desa_kelurahan: desa_kelurahan,
    kecamatan: kecamatan,
    status_tiang: status_tiang,
    tiang: tiang_arm,
    lampu: jumlah_lampu,
    daya: daya,
  });

  hiddenMarkers.push(marker);

  var lampuValue = marker.lampu.trim();
  var statusValue = marker.status_tiang.trim();

  if (lampuValue === "1") {
    marker.setIcon("../img/icon/marker-circle-green.png");
  } else if (lampuValue === "2") {
    marker.setIcon("../img/icon/marker-circle-yellow.png");
  } else if (lampuValue === "3") {
    marker.setIcon("../img/icon/marker-circle-blue.png");
  } else if (lampuValue === "0") {
    marker.setIcon("../img/icon/marker-circle-red.png");
  }

  if (statusValue === "Propose Lingkungan") {
    marker.setIcon("../img/icon/marker-flags-red.png");
  } else if (statusValue === "Propose Kolektor B Sisip") {
    marker.setIcon("../img/icon/marker-icon-purple.png");
  }

  // menambahkan event listener untuk menampilkan infowindow saat marker di-klik
  marker.addListener("click", function () {
    if (selectedMarker !== null) {
      infowindow.close();
    }
    selectedMarker = marker;

    var content =
      "<div>" +
      "<h3>" +
      id_tiang +
      "</h3>" +
      "<div class='row'>" +
      "<div class='description'>" +
      "<p><span>Nama Ruas:</span>  " +
      nama_ruas +
      "</p>" +
      "<p><span>Status:</span>  " +
      status_tiang +
      "</p>" +
      "<p><span>Kecamatan:</span>  " +
      kecamatan +
      "</p>" +
      "<p><span>Desa/Kelurahan:</span>  " +
      desa_kelurahan +
      "</p>" +
      "<p><span>Tiang / Arm:</span>  " +
      tiang_arm +
      "</p>" +
      "<p><span>Daya:</span>  " +
      daya +
      "</p>" +
      "<p><span>Kepemilikan:</span>  " +
      kepemilikan +
      "</p>" +
      "<p><span>Fungsi Ruas:</span>  " +
      fungsi_ruas +
      "</p>" +
      "<p><span>Jumlah lampu:</span> " +
      jumlah_lampu +
      "</p>" +
      "</div>" +
      "</div>" +
      "<p class='gmaps-link-wrapper'><a class='gmaps-link' href='https://www.google.com/maps/search/?api=1&query=" +
      marker.getPosition().lat() +
      "," +
      marker.getPosition().lng() +
      "' target='_blank'>Buka di Google Maps</a></p>" +
      "</div>";

    infowindow.setContent(content);
    infowindow.open(map, marker);

    // menambahkan event listener pada info window agar selectedMarker diatur ke null saat info window ditutup
    infowindow.addListener("closeclick", function () {
      selectedMarker = null;
    });
  });
}

function applyFilter() {
  // Mendapatkan nilai checkbox yang dipilih
  var types = document.getElementsByName("fungsi_ruas");
  var kecamatanCheckboxes = document.getElementsByName("kecamatan");
  var selectedKecamatan = [];
  var selectedTypes = [];

  for (var i = 0; i < types.length; i++) {
    if (types[i].checked) {
      selectedTypes.push(types[i].value);
    }
  }

  for (var i = 0; i < kecamatanCheckboxes.length; i++) {
    if (kecamatanCheckboxes[i].checked) {
      selectedKecamatan.push(kecamatanCheckboxes[i].value);
    }
  }

  // Menampilkan atau menyembunyikan marker berdasarkan nilai checkbox yang dipilih
  if (selectedTypes.length === 0 && selectedKecamatan.length === 0) {
    // Jika tidak ada jenis jalan dan kecamatan yang dipilih, sembunyikan semua marker
    hideAllMarkers();
  } else {
    // Jika ada jenis jalan atau kecamatan yang dipilih, tampilkan marker yang sesuai
    for (var i = 0; i < hiddenMarkers.length; i++) {
      var marker = hiddenMarkers[i];
      if (
        selectedTypes.indexOf(marker.type) >= 0 ||
        selectedKecamatan.indexOf(marker.kecamatan) >= 0
      ) {
        // Pindahkan marker dari hiddenMarkers[] ke markers[] dan tampilkan di peta
        marker.setVisible(true);
        markers.push(marker);
        marker.setMap(map);
      }
    }

    // Sembunyikan marker yang tidak sesuai dengan filter dari markers[]
    for (var i = 0; i < markers.length; i++) {
      var marker = markers[i];
      if (
        selectedTypes.indexOf(marker.type) === -1 &&
        selectedKecamatan.indexOf(marker.kecamatan) === -1
      ) {
        // Sembunyikan marker dari peta dan pindahkan dari markers[] ke hiddenMarkers[]
        marker.setVisible(false);
        hiddenMarkers.push(marker);
        marker.setMap(null);
        markers.splice(i, 1);
        i--; // Kurangi variabel i untuk mengompensasi pergeseran indeks
      }
    }
  }
}

function hideAllMarkers() {
  for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
    marker.setVisible(false);
    hiddenMarkers.push(marker);
    marker.setMap(null);
  }
  markers = [];
}

// fungsi pencarian
var searchButton = document.querySelector(".search-wrapper button");
searchButton.addEventListener("click", function () {
  searchMarkers();
});

var searchInput = document.getElementById("search");
searchInput.addEventListener("keyup", function (event) {
  // Memeriksa apakah tombol yang ditekan adalah tombol "Enter"
  if (event.keyCode === 13) {
    event.preventDefault();
    searchMarkers();
  }
});

var searchControl = document.querySelector(".search-wrapper");
document.addEventListener("click", function (event) {
  var targetElement = event.target; // Element yang diklik

  // Periksa apakah element yang diklik ada di dalam search control
  var isClickInsideSearchControl = searchControl.contains(targetElement);

  // Jika element yang diklik tidak ada di dalam search control, keluar dari mode fokus
  if (!isClickInsideSearchControl) {
    searchInput.blur(); // Non-aktifkan mode fokus atau ketik
  }
});

function searchMarkers() {
  var searchInput = document
    .getElementById("search")
    .value.trim()
    .toLowerCase();

  var isMarkerVisible = false; // Variabel untuk melacak keberadaan marker yang tampil

  var types = document.getElementsByName("fungsi_ruas");
  var kecamatanCheckboxes = document.getElementsByName("kecamatan");
  var selectedTypes = [];
  var selectedKecamatan = [];
  for (var i = 0; i < types.length; i++) {
    if (types[i].checked) {
      selectedTypes.push(types[i].value);
    }
  }
  for (var i = 0; i < kecamatanCheckboxes.length; i++) {
    if (kecamatanCheckboxes[i].checked) {
      selectedKecamatan.push(kecamatanCheckboxes[i].value);
    }
  }

  for (var i = 0; i < hiddenMarkers.length; i++) {
    var marker = hiddenMarkers[i];
    var id_tiang = marker.id_tiang.toLowerCase();
    var nama_ruas = marker.nama_ruas.toLowerCase();
    var desa_kelurahan = marker.desa_kelurahan.toLowerCase();

    if (
      id_tiang === searchInput ||
      nama_ruas === searchInput ||
      desa_kelurahan === searchInput
    ) {
      marker.setVisible(true);
      marker.setMap(map);
      map.setZoom(16);
      map.panTo(marker.getPosition());
      isMarkerVisible = true; // Setel isMarkerVisible ke true jika ada marker yang tampil
    } else {
      marker.setVisible(false);
    }
  }

  // Jika tidak ada marker yang tampil, tampilkan pesan atau lakukan tindakan lain
  if (!isMarkerVisible) {
    // Tambahkan tindakan Anda di sini
    console.log("Tidak ada marker yang cocok dengan pencarian.");
    alert("data yang dicari tidak ditemukan (T^T)");
  }
}
