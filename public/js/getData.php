<?php
require 'koneksi.php';

// mengambil data dari tabel data_tiang_apj
$sql = "SELECT * FROM data_landingPage";
$result = mysqli_query($conn, $sql);

// menyimpan hasil query ke dalam array
$data = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
}

// mengembalikan data dalam format JSON
echo json_encode($data);

// menutup koneksi ke database
mysqli_close($conn);
