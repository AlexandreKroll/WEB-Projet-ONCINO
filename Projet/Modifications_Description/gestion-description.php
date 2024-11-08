<?php
include '../config.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: ../description.php');
    exit();
} else {
    echo "Action ou ID non spécifié.";
}
