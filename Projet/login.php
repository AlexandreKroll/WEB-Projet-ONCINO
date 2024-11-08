<?php
session_start();
include 'config.php'; // Fichier de connexion à la base de données

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Requête pour obtenir l'utilisateur
    $query = $pdo->prepare("SELECT * FROM admins WHERE login = :login");
    $query->execute(['login' => $login]);
    $admin = $query->fetch();

    // Vérification du mot de passe
    if ($admin && password_verify($password, $admin['password'])) {
        // Authentification réussie
        $_SESSION['admin_id'] = $admin['id'];
        
        header("Location: admin.php"); // Redirection vers la page d'administration
        exit;
    } else {
        // Erreur d'authentification
        echo "Login ou mot de passe incorrect.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}

