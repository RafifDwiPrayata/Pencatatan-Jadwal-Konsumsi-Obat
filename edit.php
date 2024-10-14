<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM medications WHERE id = ?");
    $stmt->execute([$id]);
    $medication = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$medication) {
        header("Location: index.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST['medicine_name'];
    $dosage = $_POST['dosage'];
    $date = $_POST['consumption_date'];

    $consumption_date = date("d-m-Y", strtotime($date));

    $stmt = $db->prepare("UPDATE medications SET medicine_name = ?, dosage = ?, consumption_date = ? WHERE id = ?");
    $stmt->execute([$medicine_name, $dosage, $consumption_date, $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan Obat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Catatan Obat</h1>
    </header>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="medicine_name">Nama / Jenis Obat:</label>
        <input type="text" name="medicine_name" id="medicine_name" value="<?php echo htmlspecialchars($medication['medicine_name']); ?>" required>

        <label for="dosage">Dosis Pakai:</label>
        <input type="text" name="dosage" id="dosage" value="<?php echo htmlspecialchars($medication['dosage']); ?>" required>

        <label for="consumption_date">Tanggal Konsumsi:</label>
        <input type="date" name="consumption_date" id="consumption_date" value="<?php echo date("Y-m-d", strtotime($medication['consumption_date'])); ?>" required>

        <button type="submit" class="btn">Simpan Perubahan</button>

        <a href="index.php" class="btn-back">Kembali</a>
    </form>
</body>
</html>
