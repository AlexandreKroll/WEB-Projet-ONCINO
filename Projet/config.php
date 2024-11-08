<?php
// Informations de connexion à la base de données
$dsn = "mysql:host=mysql-alexandre-oncino.alwaysdata.net;dbname=alexandre-oncino_apero_party;charset=utf8"; // Nom de la base de données
$username = '381095_admin';  // Nom d'utilisateur de la base de données
$password = 'motdepasse-xyz'; // Mot de passe de la base de données

// Tentative de connexion à la base de données avec PDO
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base " . $th->getMessage());
}
