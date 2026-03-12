<?php
require_once 'rumus.php';

$luasPersegi = null;
$luasLingkaran = null;
$luasSegitiga = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sisi = !empty($_POST['sisi']) ? $_POST['sisi'] : 0;
    $jari_jari = !empty($_POST['jari_jari']) ? $_POST['jari_jari'] : 0;
    $alas = !empty($_POST['alas']) ? $_POST['alas'] : 0;
    $tinggi = !empty($_POST['tinggi']) ? $_POST['tinggi'] : 0;

    if ($sisi > 0) {
        $persegi = new Persegi($sisi);
        $luasPersegi = $persegi->hitungLuas();
    }

    if ($jari_jari > 0) {
        $lingkaran = new Lingkaran($jari_jari);
        $luasLingkaran = $lingkaran->hitungLuas();
    }

    if ($alas > 0 && $tinggi > 0) {
        $segitiga = new Segitiga($alas, $tinggi);
        $luasSegitiga = $segitiga->hitungLuas();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator Bangun Datar</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #218838;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Hitung Luas</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Sisi Persegi</label>
                <input type="number" step="any" name="sisi" placeholder="Masukkan nilai sisi...">
            </div>

            <div class="form-group">
                <label>Jari-jari Lingkaran</label>
                <input type="number" step="any" name="jari_jari" placeholder="Masukkan nilai jari-jari...">
            </div>

            <div class="form-group">
                <label>Alas Segitiga</label>
                <input type="number" step="any" name="alas" placeholder="Masukkan nilai alas...">
            </div>

            <div class="form-group">
                <label>Tinggi Segitiga</label>
                <input type="number" step="any" name="tinggi" placeholder="Masukkan nilai tinggi...">
            </div>

            <button type="submit">Hitung Semua</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="hasil">
                <h3>Hasil:</h3>
                <ul>
                    <li>Luas Persegi: <b><?= $luasPersegi !== null ? $luasPersegi : '-' ?></b></li>
                    <li>Luas Lingkaran: <b><?= $luasLingkaran !== null ? number_format($luasLingkaran, 2) : '-' ?></b></li>
                    <li>Luas Segitiga: <b><?= $luasSegitiga !== null ? $luasSegitiga : '-' ?></b></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>