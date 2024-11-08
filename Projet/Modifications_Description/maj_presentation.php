<?php
// Connexion à la base de donnée
include '../config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer le nouveau contenu du formulaire
    $nouveauTexte = $_POST['content'];

    // Mettre à jour le texte dans la base de données
    $stmt = $pdo->prepare("UPDATE texte_de_presentation SET content = :content WHERE id = 1");
    $stmt->bindParam(':content', $nouveauTexte, PDO::PARAM_STR);
    if ($stmt->execute()) {
        echo "Le texte de présentation a été mis à jour avec succès.";
        // Rediriger vers la page d'administration (optionnel)
        header("Location: ../admin.php"); // Remplacez par le nom de votre page d'administration
        exit;
    } else {
        echo "Erreur lors de la mise à jour du texte de présentation.";
    }
}