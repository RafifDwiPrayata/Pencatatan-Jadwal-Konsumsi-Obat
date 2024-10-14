<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM medications WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
