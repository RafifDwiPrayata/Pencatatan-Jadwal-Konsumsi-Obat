<?php
require 'db.php';

$query = "SELECT * FROM medications ORDER BY consumption_date DESC";
$result = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatat Jadwal Konsumsi Obat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Daftar Jadwal Konsumsi Obat</h1>
    </header>
    <section>
        <a href="add.php" class="btn">Tambahkan Catatan Baru</a>
        <table>
            <tr>
                <th>Nama / Jenis Obat</th>
                <th>Dosis Pakai</th>
                <th>Tanggal Konsumsi</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['medicine_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dosage']); ?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['consumption_date'])); ?></td>
                    <td>
    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
</td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>
</body>
</html>
