<?php
session_start();

// Cek apakah user sudah login dan berperan sebagai "user"
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php"); // redirect ke login kalau belum login
    exit;
}

// Langsung redirect ke homepage.html
header("Location: hompage.html");
exit;
