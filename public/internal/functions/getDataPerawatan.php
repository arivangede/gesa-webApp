<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'data_gesa0707';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM propose";
$result = mysqli_query($conn, $sql);

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
