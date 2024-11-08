<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
    $stmt->execute([$id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $image_url = $_POST['image_url'];

        $stmt = $pdo->prepare("UPDATE produits SET nom = ?, description = ?, prix = ?, image_url = ? WHERE id = ?");
        $stmt->execute([$nom, $description, $prix, $image_url, $id]);

        header('Location: ../description.php');
        exit();
    }
} else {
    header('Location: ../description.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un produit</title>
</head>
<body>
    <h1>Modifier le produit</h1>
    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?php echo htmlspecialchars($produit['nom']); ?>" required>

        <label>Description :</label>
        <textarea name="description"><?php echo htmlspecialchars($produit['description']); ?></textarea>

        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" value="<?php echo htmlspecialchars($produit['prix']); ?>" required>

        <label>URL de l'image :</label>
        <input type="text" name="image_url" value="<?php echo htmlspecialchars($produit['image_url']); ?>">

        <button type="submit">Modifier</button>
    </form>
</body>
</html>
