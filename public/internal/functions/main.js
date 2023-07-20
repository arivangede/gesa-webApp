// ===tombol===
const sidebarBtn = document.querySelector(".sidebar-btn");
const sidebar = document.querySelector(".sidebar");
const petabersamaSection = document.querySelector(".petabersama-section");
const dashboardSection = document.querySelector(".dashboard-section");
const mapmenu = document.querySelector(".map-menu");
const headmenu = document.querySelector(".header-menu");
const mapmenuBtn = document.querySelector(".bx.bxs-chevron-left");
const headmenutext = document.querySelector(".header-menu span");
const maplook = document.querySelector(".map");
const menuContainer = document.querySelector(".menu-container");
const datatiangsection = document.querySelector(".datatiang-section");

// hp js
const filterBtnHp = document.querySelector(".filter-apply-btn .filter-btn");
if (filterBtnHp) {
  filterBtnHp.addEventListener("click", function () {
    filterBtnHp.classList.add("clicked");

    setTimeout(function () {
      filterBtnHp.classList.remove("clicked");
    }, 1000);
  });
}

const mapMenuFilterBtn = document.querySelector(".map-filter");
const mapMenu = document.querySelector(".menu-filter");
const closeMapMenu = document.querySelector(".menu-filter .close-btn i");
const darkScreen = document.querySelector(".dark-screen");
if (mapMenuFilterBtn) {
  mapMenuFilterBtn.addEventListener("click", function () {
    mapMenu.classList.toggle("active");
    darkScreen.classList.toggle("active");
  });

  closeMapMenu.addEventListener("click", function () {
    mapMenu.classList.remove("active");
    darkScreen.classList.remove("active");
  });

  document.addEventListener("click", function (e) {
    if (!mapMenu.contains(e.target) && !mapMenuFilterBtn.contains(e.target)) {
      mapMenu.classList.remove("active");
      darkScreen.classList.remove("active");
    }
  });
}

// end hp js
sidebarBtn.addEventListener("click", function () {
  sidebar.classList.toggle("active");

  if (petabersamaSection) {
    petabersamaSection.classList.toggle("active");
  }

  if (dashboardSection) {
    dashboardSection.classList.toggle("active");
  }

  if (datatiangsection) {
    datatiangsection.classList.toggle("active");
  }
});

if (mapmenuBtn) {
  mapmenuBtn.addEventListener("click", function () {
    mapmenuBtn.classList.toggle("active");
    mapmenu.classList.toggle("active");
    headmenu.classList.toggle("active");
    headmenutext.classList.toggle("active");
    maplook.classList.toggle("active");
    menuContainer.classList.toggle("active");
  });
}

// radio button
function displaySelectedValue() {
  var radios = document.getElementsByName("option");

  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      selectedValue = radios[i].value;
      break;
    }
  }

  // document.getElementById("selected-value").innerHTML =
  //   "Nilai yang dipilih: " + selectedValue;
}

// ====================== Dashboard Section =====================
if (dashboardSection) {
  var nextButton = document.querySelector(".next-btn");
  var prevButton = document.querySelector(".prev-btn");
  var cardChild = document.querySelector(".card-child");
  var contentCard = document.querySelector(".filter-card");

  nextButton.addEventListener("click", function () {
    var cardChildWidth = cardChild.offsetWidth;
    var cardChildScrollWidth = cardChild.scrollWidth;
    var scrollLeft = cardChild.scrollLeft;
    var remainingWidth = cardChildScrollWidth - cardChildWidth;

    if (scrollLeft < remainingWidth) {
      cardChild.scrollBy({ left: cardChildWidth, behavior: "smooth" });
    }
  });

  prevButton.addEventListener("click", function () {
    var cardChildWidth = cardChild.offsetWidth;
    var scrollLeft = cardChild.scrollLeft;

    if (scrollLeft > 0) {
      cardChild.scrollBy({ left: -cardChildWidth, behavior: "smooth" });
    }
  });

  cardChild.addEventListener("scroll", function () {
    updateButtonVisibility();
  });

  function updateButtonVisibility() {
    var cardChildWidth = cardChild.offsetWidth;
    var cardChildScrollWidth = cardChild.scrollWidth;
    var scrollLeft = cardChild.scrollLeft;
    var remainingWidth = cardChildScrollWidth - cardChildWidth;

    nextButton.style.visibility =
      scrollLeft < remainingWidth ? "visible" : "hidden";
    prevButton.style.visibility = scrollLeft > 0 ? "visible" : "hidden";
  }
}

// ====================== END Dashboard Section =====================

// =================================================== PetaBersama JS =========================================================
if (petabersamaSection) {
  // membuat variabel global untuk peta dan semua marker
  var map;
  var markers = [];
  var hiddenMarkers = [];
  var markerCluster;
  var selectedMarker = null;
  var infowindow = new google.maps.InfoWindow();

  function applyFilter() {
    // Mendapatkan nilai checkbox yang dipilih
    var types = document.getElementsByName("jenis_jalan");
    var kecamatanCheckboxes = document.getElementsByName("kecamatan");
    var fasosumCheckbox = document.getElementsByName("fasosum");
    var proposeCheckbox = document.getElementsByName("propose");
    var tiangCheckbox = document.getElementsByName("tiang");
    var existingCheckbox = document.getElementsByName("existing");

    var selectedTiang = [];
    var selectedExisting = [];
    var selectedPropose = [];
    var selectedFasosum = [];
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

    for (var i = 0; i < fasosumCheckbox.length; i++) {
      if (fasosumCheckbox[i].checked) {
        selectedFasosum.push(fasosumCheckbox[i].value);
      }
    }

    for (var i = 0; i < proposeCheckbox.length; i++) {
      if (proposeCheckbox[i].checked) {
        selectedPropose.push(proposeCheckbox[i].value);
      }
    }

    for (var i = 0; i < tiangCheckbox.length; i++) {
      if (tiangCheckbox[i].checked) {
        selectedTiang.push(tiangCheckbox[i].value);
      }
    }

    for (var i = 0; i < existingCheckbox.length; i++) {
      if (existingCheckbox[i].checked) {
        selectedExisting.push(existingCheckbox[i].value);
      }
    }

    // Menampilkan atau menyembunyikan marker berdasarkan nilai checkbox yang dipilih
    if (
      selectedTypes.length === 0 &&
      selectedKecamatan.length === 0 &&
      selectedFasosum.length === 0 &&
      selectedPropose.length === 0 &&
      selectedExisting.length === 0 &&
      selectedTiang.length === 0
    ) {
      // Jika tidak ada jenis jalan dan kecamatan yang dipilih, sembunyikan semua marker
      hideAllMarkers();
    } else {
      // Jika ada jenis jalan atau kecamatan yang dipilih, tampilkan marker yang sesuai
      for (var i = 0; i < hiddenMarkers.length; i++) {
        var marker = hiddenMarkers[i];
        if (
          selectedTypes.indexOf(marker.type) >= 0 ||
          selectedKecamatan.indexOf(marker.kecamatan) >= 0 ||
          selectedFasosum.indexOf(marker.type) >= 0 ||
          selectedPropose.indexOf(marker.status_tiang) >= 0 ||
          selectedExisting.indexOf(marker.status_tiang) >= 0 ||
          selectedTiang.indexOf(marker.status_tiang) >= 0
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
          selectedKecamatan.indexOf(marker.kecamatan) === -1 &&
          selectedFasosum.indexOf(marker.type) === -1 &&
          selectedPropose.indexOf(marker.status_tiang) === -1 &&
          selectedExisting.indexOf(marker.status_tiang) === -1 &&
          selectedTiang.indexOf(marker.status_tiang) === -1
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

    // Cetak nilai dari selectedTypes dan selectedKecamatan ke konsol browser
    // console.log("Selected Types:", selectedTypes);
    // console.log("Selected Kecamatan:", selectedKecamatan);
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

  // Menambahkan event listener untuk tombol "Filter"
  var filterButton = document.querySelector(".filter-btn");
  if (filterButton) {
    filterButton.addEventListener("click", applyFilter);
  }

  function addMarker(
    id_tiang,
    nama_ruas,
    lat,
    lng,
    status_tiang,
    kecamatan,
    desa_kelurahan,
    tipe_arm,
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
      tiang: tipe_arm,
      lampu: jumlah_lampu,
      daya: daya,
    });

    hiddenMarkers.push(marker);

    var lampuValue = marker.lampu.trim();
    var fungsiValue = marker.type.trim();
    var dayaValue = marker.daya.trim();
    var statusValue = marker.status_tiang.trim();

    if (fungsiValue != "Fasosum" && lampuValue === "1") {
      marker.setIcon("../img/icon/marker-circle-green.png");
    } else if (fungsiValue != "Fasosum" && lampuValue === "2") {
      marker.setIcon("../img/icon/marker-circle-yellow.png");
    } else if (fungsiValue != "Fasosum" && lampuValue === "3") {
      marker.setIcon("../img/icon/marker-circle-blue.png");
    } else if (fungsiValue != "Fasosum" && lampuValue === "0") {
      marker.setIcon("../img/icon/marker-circle-red.png");
    }

    if (fungsiValue === "Fasosum" && dayaValue === "Pemko - APJ") {
      marker.setIcon("../img/icon/marker-star-green.png");
    } else if (fungsiValue === "Fasosum" && dayaValue === "Swadaya") {
      marker.setIcon("../img/icon/marker-star-red.png");
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
        "<p><span>Tipe Arm:</span>  " +
        tipe_arm +
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

  var marker;
  var markersLoaded = false;
  // inisialisasi peta dan marker
  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(-8.6807041, 115.2116887),
      zoom: 13,
      disableDefaultUI: true,
      streetViewControl: true,
      streetViewControlOptions: {
        position: google.maps.ControlPosition.RIGHT_CENTER,
      },
      styles: [
        {
          featureType: "administrative",
          elementType: "geometry",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
        {
          featureType: "poi",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
        {
          featureType: "road",
          elementType: "labels.icon",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
        {
          featureType: "transit",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
      ],
    });

    initZoomControl(map);
    initMapTypeControl(map);

    var streetView = map.getStreetView();

    // Event saat Street View berubah
    google.maps.event.addListener(streetView, "visible_changed", function () {
      if (streetView.getVisible()) {
        // Jika masuk ke tampilan Street View, sembunyikan kontrol UI di peta
        hideCustomControls();
      } else {
        // Jika keluar dari tampilan Street View, tampilkan kembali kontrol UI di peta
        showCustomControls();
      }
    });

    // // Tambahkan event listener untuk mengklik peta
    // map.addListener("click", function (event) {
    //   // Hapus marker sebelumnya jika ada
    //   if (marker) {
    //     marker.setMap(null);
    //   }

    //   // Mendapatkan koordinat latitude dan longitude dari titik yang diklik
    //   var latLng = event.latLng;
    //   var latitude = latLng.lat();
    //   var longitude = latLng.lng();

    //   // Tampilkan hasil latitude dan longitude pada input text
    //   document.getElementById("lat").value = latitude;
    //   document.getElementById("lng").value = longitude;

    //   // Tambahkan marker pada titik yang diklik
    //   marker = new google.maps.Marker({
    //     position: latLng,
    //     map: map,
    //   });
    // });
    loadMarkers();
  }

  function loadMarkers() {
    $.ajax({
      url: "functions/getData.php",
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
            markerData.tipe_arm,
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

  // Fungsi untuk menyembunyikan kontrol UI kustom
  function hideCustomControls() {
    var zoomInButton = document.querySelector(".zoom_in_control.hp");
    var zoomOutButton = document.querySelector(".zoom_out_control.hp");
    var mapTypeButton = document.querySelector(".map_type_button.hp");
    var satelliteTypeButton = document.querySelector(
      ".satellite_type_button.hp"
    );
    var searchControl = document.querySelector(".search_control");
    var filterMenu = document.querySelector(".map-filter.hp");

    zoomInButton.style.display = "none";
    zoomOutButton.style.display = "none";
    mapTypeButton.style.display = "none";
    satelliteTypeButton.style.display = "none";
    searchControl.style.display = "none";
    filterMenu.style.display = "none";
  }

  // Fungsi untuk menampilkan kembali kontrol UI kustom
  function showCustomControls() {
    var zoomInButton = document.querySelector(".zoom_in_control.hp");
    var zoomOutButton = document.querySelector(".zoom_out_control.hp");
    var mapTypeButton = document.querySelector(".map_type_button.hp");
    var satelliteTypeButton = document.querySelector(
      ".satellite_type_button.hp"
    );
    var searchControl = document.querySelector(".search_control");
    var filterMenu = document.querySelector(".map-filter.hp");

    zoomInButton.style.display = "block";
    zoomOutButton.style.display = "block";
    mapTypeButton.style.display = "block";
    satelliteTypeButton.style.display = "block";
    searchControl.style.display = "block";
    filterMenu.style.display = "block";
  }

  // custom controls google maps
  function initZoomControl(map) {
    document.querySelector(".zoom_in_control.hp").onclick = function () {
      map.setZoom(map.getZoom() + 1);
    };
    document.querySelector(".zoom_in_control.desktop").onclick = function () {
      map.setZoom(map.getZoom() + 1);
    };

    document.querySelector(".zoom_out_control.hp").onclick = function () {
      map.setZoom(map.getZoom() - 1);
    };
    document.querySelector(".zoom_out_control.desktop").onclick = function () {
      map.setZoom(map.getZoom() - 1);
    };
  }

  function initMapTypeControl(map) {
    const mapTypeControlDiv = document.querySelector(
      ".custom_types_controls.hp"
    );
    const mapTypeControlDiv2 = document.querySelector(
      ".custom_types_controls.desktop"
    );

    document.querySelector(".map_type_button.hp").onclick = function () {
      mapTypeControlDiv.classList.add("maptype-control-is-map");
      mapTypeControlDiv.classList.remove("maptype-control-is-satellite");
      map.setMapTypeId("roadmap");
    };
    document.querySelector(".map_type_button.desktop").onclick = function () {
      mapTypeControlDiv2.classList.add("maptype-control-is-map");
      mapTypeControlDiv2.classList.remove("maptype-control-is-satellite");
      map.setMapTypeId("roadmap");
    };

    document.querySelector(".satellite_type_button.hp").onclick = function () {
      mapTypeControlDiv.classList.remove("maptype-control-is-map");
      mapTypeControlDiv.classList.add("maptype-control-is-satellite");
      map.setMapTypeId("hybrid");
    };
    document.querySelector(".satellite_type_button.desktop").onclick =
      function () {
        mapTypeControlDiv2.classList.remove("maptype-control-is-map");
        mapTypeControlDiv2.classList.add("maptype-control-is-satellite");
        map.setMapTypeId("hybrid");
      };
  }

  // fungsi pencarian
  var searchButton = document.querySelector(".search_control button");
  searchButton.addEventListener("click", function () {
    searchMarkers();
    clearFilter();
  });

  var searchInput = document.getElementById("search");
  searchInput.addEventListener("keyup", function (event) {
    // Memeriksa apakah tombol yang ditekan adalah tombol "Enter"
    if (event.keyCode === 13) {
      event.preventDefault();
      searchMarkers();
      clearFilter();
    }
  });

  var searchControl = document.querySelector(".search_control");
  document.addEventListener("click", function (event) {
    var targetElement = event.target; // Element yang diklik

    // Periksa apakah element yang diklik ada di dalam search control
    var isClickInsideSearchControl = searchControl.contains(targetElement);

    // Jika element yang diklik tidak ada di dalam search control, keluar dari mode fokus
    if (!isClickInsideSearchControl) {
      searchInput.blur(); // Non-aktifkan mode fokus atau ketik
    }
  });

  function clearFilter() {
    var checkboxes = document.getElementsByName("jenis_jalan");
    var checkboxes2 = document.getElementsByName("kecamatan");
    var maxIndex = Math.max(checkboxes.length, checkboxes2.length);

    for (var i = 0; i < maxIndex; i++) {
      if (i < checkboxes.length) {
        checkboxes[i].checked = false;
      }
      if (i < checkboxes2.length) {
        checkboxes2[i].checked = false;
      }
    }
  }

  function searchMarkers() {
    var searchInput = document
      .getElementById("search")
      .value.trim()
      .toLowerCase();

    var isMarkerVisible = false; // Variabel untuk melacak keberadaan marker yang tampil

    var types = document.getElementsByName("jenis_jalan");
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
    }
  }

  // fungsi layout peta
  var layoutOptions = document.getElementsByName("-");
  var selectedLayout = "lampu"; // Default layout is "lampu"

  // Set radio button layout lampu as checked when the page is first loaded
  layoutOptions[1].checked = true;

  // Call applyLayout() function when the page is first loaded
  applyLayout();

  // Add event listener to layout options radio buttons
  for (var i = 0; i < layoutOptions.length; i++) {
    layoutOptions[i].addEventListener("click", function () {
      selectedLayout = this.value; // Update selectedLayout with the clicked radio button value
      // applyLayout();
    });
  }

  function applyLayout() {
    // Update marker icons based on the selected layout
    for (var i = 0; i < markers.length; i++) {
      var marker = markers[i];
      var tiangValue = marker.tiang.trim(); // Get the "tiang" value from the marker
      var lampuValue = marker.lampu.trim(); // Get the "lampu" value from the marker
      var dayaValue = marker.daya.trim(); // Get the "daya" value from the marker

      if (selectedLayout === "tiang") {
        // Show icons based on the "tiang" value
        if (tiangValue === "Arm1") {
          marker.setIcon("../img/icon/marker-arm-1.png");
        } else if (tiangValue === "Arm2") {
          marker.setIcon("../img/icon/marker-arm-2.png");
        } else if (tiangValue === "Arm3") {
          marker.setIcon("../img/icon/marker-arm-3.png");
        } else if (tiangValue === "Arm4") {
          marker.setIcon("../img/icon/marker-arm-4.png");
        } else if (tiangValue === "Arm5") {
          marker.setIcon("../img/icon/marker-arm-5.png");
        }
      }

      if (selectedLayout === "lampu") {
        // Show icons based on the "lampu" value
        if (lampuValue === "1") {
          marker.setIcon("../img/icon/marker-circle-green.png");
        } else if (lampuValue === "2") {
          marker.setIcon("../img/icon/marker-circle-yellow.png");
        } else if (lampuValue === "3") {
          marker.setIcon("../img/icon/marker-circle-blue.png");
        } else if (lampuValue === "0") {
          marker.setIcon("../img/icon/marker-circle-red.png");
        }
      }

      if (selectedLayout === "daya") {
        // Show icons based on the "daya" value
        if (dayaValue === "120w") {
          marker.setIcon("../img/icon/marker-daya-1.png");
        } else if (dayaValue === "90w") {
          marker.setIcon("../img/icon/marker-daya-2.png");
        } else if (dayaValue === "60w") {
          marker.setIcon("../img/icon/marker-daya-3.png");
        } else if (dayaValue === "40w") {
          marker.setIcon("../img/icon/marker-daya-4.png");
        }
      }
    }
  }
}
// =================================================== END PetaBersama JS =========================================================
