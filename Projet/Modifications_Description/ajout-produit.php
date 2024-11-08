<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image_url = $_POST['image_url'];

    $stmt = $pdo->prepare("INSERT INTO produits (nom, description, prix, image_url) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $description, $prix, $image_url]);

    header('Location: ../description.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un nouveau produit</h1>
    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" required>
        
        <label>Description :</label>
        <textarea name="description"></textarea>
        
        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" required>
        
        <label>URL de l'image :</label>
        <input type="text" name="image_url">

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
