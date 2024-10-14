<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST['medicine_name'];
    $dosage = $_POST['dosage'];

    $date = $_POST['consumption_date'];

    $consumption_date = date("d-m-Y", strtotime($date));

    $stmt = $db->prepare("INSERT INTO medications (medicine_name, dosage, consumption_date) VALUES (?, ?, ?)");
    $stmt->execute([$medicine_name, $dosage, $consumption_date]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan Catatan Baru</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Menambahkan Catatan Baru</h1>
    </header>
    <form action="add.php" method="POST">
        <label for="medicine_name">Nama / Jenis Obat:</label>
        <input type="text" name="medicine_name" id="medicine_name" required>

        <label for="dosage">Dosis Pakai:</label>
        <input type="text" name="dosage" id="dosage" required>

        <label for="consumption_date">Tanggal Konsumsi:</label>
        <input type="date" name="consumption_date" id="consumption_date" required>

        <button type="submit" class="btn">Tambahkan Obat</button>

        <a href="index.php" class="btn-back">Kembali ke Daftar</a>
    </form>
</body>
</html>
