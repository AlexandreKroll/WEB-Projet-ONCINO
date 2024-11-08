<?php
session_start();
include 'config.php'; // Fichier de configuration de la base de données

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM texte_de_presentation";
$stmt = $pdo->query($sql);
$contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="devanture">
    <?php foreach ($contents as $row): ?>   
            <?= htmlspecialchars($row["content"]) ?>
    <?php endforeach; ?>                
</section>
