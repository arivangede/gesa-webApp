<?php

// ===Koneksi Database===
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'data-gesa2';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
// ===Koneksi Database End===

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function search($keyword)
{
    $query = "SELECT * FROM titik_tiang WHERE id_tiang LIKE '$keyword' OR nama_ruas LIKE '$keyword' OR status_tiang LIKE '$keyword' OR kecamatan LIKE '$keyword' OR desa_kelurahan LIKE '$keyword' OR fungsi_ruas LIKE '$keyword' OR kepemilikan LIKE '$keyword' OR tipe_arm LIKE '$keyword' OR daya LIKE '$keyword'";
    return query($query);
}

function create($data)
{
    global $conn;

    $id_tiang = htmlspecialchars($data["id_tiang"]);
    $nama_ruas = htmlspecialchars($data["nama_ruas"]);
    $status_tiang = htmlspecialchars($data["status_tiang"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $desa_kelurahan = htmlspecialchars($data["desa_kelurahan"]);
    $fungsi_ruas = htmlspecialchars($data["fungsi_ruas"]);
    $kepemilikan = htmlspecialchars($data["kepemilikan"]);
    $tipe_arm = htmlspecialchars($data["tipe_arm"]);
    $daya = htmlspecialchars($data["daya"]);
    $jumlah_lampu = htmlspecialchars($data["jumlah_lampu"]);
    $lat = htmlspecialchars($data["lat"]);
    $lng = htmlspecialchars($data["lng"]);

    $query = "INSERT INTO titik_tiang (
        id_tiang,
        nama_ruas,
        status_tiang,
        kecamatan,
        desa_kelurahan,
        fungsi_ruas,
        kepemilikan,
        tipe_arm,
        daya,
        jumlah_lampu,
        lat,
        lng
    ) VALUES (
        '$id_tiang',
        '$nama_ruas',
        '$status_tiang',
        '$kecamatan',
        '$desa_kelurahan',
        '$fungsi_ruas',
        '$kepemilikan',
        '$tipe_arm',
        '$daya',
        '$jumlah_lampu',
        '$lat',
        '$lng'
    )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
