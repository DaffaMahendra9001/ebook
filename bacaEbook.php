<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ebooks");

// Cek koneksi
if (!$conn) {
    die("Koneksi GAGAL: " . mysqli_connect_error());
}

// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan ID adalah integer

    // Ambil data e-book berdasarkan ID
    $query = "SELECT * FROM ebooks WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query GAGAL: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $ebook = mysqli_fetch_assoc($result);

        echo "<h2>📖 " . htmlspecialchars($ebook['title']) . "</h2>";
        echo "<p><strong>Genre:</strong> " . htmlspecialchars($ebook['genre']) . "</p>";
        echo "<p><strong>Tanggal Dibuat:</strong> " . htmlspecialchars($ebook['created_at']) . "</p>";
        echo "<hr>";
        echo "<div style='text-align: justify; line-height: 1.6; font-family: serif;'>";
        echo nl2br($ebook['content']); // Tampilkan isi buku dengan newline yang rapi
        echo "</div>";
        echo "<br><br><a href=''>⬅️ Kembali ke Daftar Buku</a>";
    } else {
        echo "E-book tidak ditemukan.";
    }
} else {
    echo "ID e-book tidak ditemukan di URL.";
}
?>
