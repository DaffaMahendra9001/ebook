<?php
$koneksi = new mysqli("localhost", "root", "", "nama_database");

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$judul = $_POST['judul'];
$isi = $_POST['isi'];

$sql = "INSERT INTO diskusi (judul, isi) VALUES ('$judul', '$isi')";

if ($koneksi->query($sql) === TRUE) {
  header("Location: index.php"); // kembali ke halaman utama setelah kirim
  exit();
} else {
  echo "Gagal menyimpan: " . $koneksi->error;
}

$koneksi->close();
?>
