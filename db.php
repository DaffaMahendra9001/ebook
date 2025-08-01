<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosongkan jika tidak ada password di XAMPP
$dbname = "user_login"; // HARUS sesuai dengan yang kamu buat di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
