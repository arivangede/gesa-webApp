<?php
// informasi koneksi ke database
$host = "localhost"; // ganti dengan host Anda
$username = "root"; // ganti dengan username Anda
$password = "root"; // ganti dengan password Anda
$database_name = "data-gesa2"; // ganti dengan nama database Anda

// membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database_name);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
