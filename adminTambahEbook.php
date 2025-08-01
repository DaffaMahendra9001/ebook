<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ebooks"); // sesuaikan nama database-mu

// Cek jika form disubmit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $content = $_POST['content'];

    $query = "INSERT INTO ebooks (title, genre, content) VALUES ('$title', '$genre', '$content')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('E-Book berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan E-Book: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah E-Book - Admin</title>
</head>
<body>
    <h2>➕ Tambah E-Book</h2>
    <form method="POST">
        <label>Judul:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Genre:</label><br>
        <input type="text" name="genre" required><br><br>

        <label>Isi Buku:</label><br>
        <textarea name="content" rows="10" cols="50" required></textarea><br><br>

        <button type="submit" name="submit">Tambah E-Book</button>
    </form>
</body>
</html>
