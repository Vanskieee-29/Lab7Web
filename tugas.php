<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program PHP Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            margin-top: 15px;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #eaf6ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .result h3 {
            color: #007bff;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Data Diri</h2>

        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" required>

            <label>Pekerjaan:</label>
            <select name="pekerjaan" required>
                <option value="">-- Pilih Pekerjaan --</option>
                <option value="Guru">Guru</option>
                <option value="Dokter">Dokter</option>
                <option value="Programmer">Programmer</option>
                <option value="Desainer">Desainer</option>
                <option value="Mahasiswa">Mahasiswa</option>
            </select>

            <input type="submit" value="Kirim">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // Hitung umur
            $tanggal_lahir = new DateTime($tgl_lahir);
            $sekarang = new DateTime();
            $umur = $sekarang->diff($tanggal_lahir)->y;

            // Tentukan gaji berdasarkan pekerjaan
            switch ($pekerjaan) {
                case "Guru":
                    $gaji = 5000000;
                    break;
                case "Dokter":
                    $gaji = 12000000;
                    break;
                case "Programmer":
                    $gaji = 10000000;
                    break;
                case "Desainer":
                    $gaji = 8000000;
                    break;
                case "Mahasiswa":
                    $gaji = 0;
                    break;
                default:
                    $gaji = 0;
            }

            echo "<div class='result'>
                    <h3>Hasil:</h3>
                    <p><strong>Nama:</strong> $nama</p>
                    <p><strong>Tanggal Lahir:</strong> $tgl_lahir</p>
                    <p><strong>Umur:</strong> $umur tahun</p>
                    <p><strong>Pekerjaan:</strong> $pekerjaan</p>
                    <p><strong>Gaji:</strong> Rp " . number_format($gaji, 0, ',', '.') . "</p>
                  </div>";
        }
        ?>
    </div>
</body>
</html>
