<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Dasar</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="post">
        <label>Nama: </label>
        <input type="text" name="nama">
        <input type="submit" value="Kirim">
    </form>

    <?php
    // Jalankan jika form sudah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari input
        $nama = $_POST['nama'];
        echo "Selamat Datang " . htmlspecialchars($nama);
    }
    ?>
</body>
</html>
