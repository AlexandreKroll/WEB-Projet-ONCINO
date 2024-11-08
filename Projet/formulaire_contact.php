<?php
// Connexion à la base de données pour stocker les avis (ajuster les paramètres selon votre configuration)
$dsn = "mysql:host=mysql-alexandre-oncino.alwaysdata.net;dbname=alexandre-oncino_apero_party;charset=utf8";
$username = "381095_admin";  // Remplacer par votre nom d'utilisateur MySQL
$password = "motdepasse-xyz";  // Remplacer par votre mot de passe MySQL

try {
    // Crée une connexion PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}

// Vérification que les données du formulaire sont présentes
if (isset($_POST['requestType'], $_POST['nom'], $_POST['prenom'], $_POST['message'])) {
    $requestType = $_POST['requestType'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $message = $_POST['message'];

    if ($requestType == "Devis" || $requestType == "Informations") {
        // Redirection vers le client de messagerie avec l'objet et le message pré-remplis
        $email = 'krolla@3il.fr';
        $subject = ($requestType == "Devis") ? "Demande de devis" : "Demande d'informations";
        $body = urlencode($message); // Encoder le message pour l'URL
        $mailto = "mailto:$email?subject=" . urlencode($subject) . "&body=$body";

        // Redirection vers mailto
        header("Location: $mailto");
        exit;
    } elseif ($requestType == "Avis") {
        // Si "Avis" est sélectionné, on enregistre dans la base de données
        $stmt = $pdo->prepare("INSERT INTO avis (nom, prenom, message) VALUES (:nom, :prenom, :message)");

        // Liaison des paramètres à la requête
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':message', $message);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Votre avis a été enregistré avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement de l'avis.";
        }
    }
} else {
    echo "Erreur : tous les champs du formulaire doivent être remplis.";
}

// Fermer la connexion à la base de données
$pdo = null;
