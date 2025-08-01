<?php
include "db.php"; // koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ebooks");

echo "<h2>📖 Koleksi E-Book</h2>";

$query = "SELECT * FROM ebooks";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("<b>Query GAGAL</b>: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Judul</th>
                <th>Genre</th>
                <th>Cuplikan</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
        echo "<td>" . substr(strip_tags($row['content']), 0, 100) . "...</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "<td><a href='bacaEbook.php?id=" . $row['id'] . "'>📘 Baca</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Belum ada e-book yang tersedia.";
}

echo "<br><a href=''>⬅️ Kembali ke Beranda</a>";
?>
