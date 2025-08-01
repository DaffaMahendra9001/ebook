<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<h2>Selamat datang, Admin <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a>
<ul>
    <li><a href="adminTambahEbook.php">➕ Tambah E-Book</a></li>
    <li><a href="adminListEbook.php">📚 Lihat Semua E-Book</a></li>
</ul>