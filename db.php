<?php
$db = new PDO('sqlite:db/obat.sqlite');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "
CREATE TABLE IF NOT EXISTS medications (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    medicine_name TEXT NOT NULL,
    dosage TEXT NOT NULL,
    consumption_date TEXT NOT NULL
)";
$db->exec($query);

?>
