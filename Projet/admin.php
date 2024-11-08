<?php
session_start();

// Vérification de la session
if (!isset($_SESSION['admin_id'])) {
    header("Location: connexion.html");
    exit;
}

// Contenu de la page d'administration
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Apéro party</title> <!--Titre de la page-->
        <link rel="stylesheet" type="text/css" href="CSS/form.css">
        <link rel="stylesheet" type="text/css" href="CSS/mediaQueries.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <link rel="stylesheet" type="text/css" href="CSS/polices.css">
        <link rel="stylesheet" href="CSS/print.css" media="print">
        <link rel="icon" href="IMGViewer/logo_page.ico" type="image/x-icon" />

        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
        <header>
            <nav class ="menu">
                <input type="checkbox" id="burger-checkbox">
                <label for="burger-checkbox" class="burger">
                    <img src="IMGViewer/burger-solid.svg" alt="Erreur du chargement de l'image" loading="lazy"/>
                </label>
            
                <ul>
                    <li><a href="logout.php">Deconnexion</a></li>
                </ul>
            </nav>
        </header>


        <main>

            <section>
                <p>
                <?php include 'config.php'; ?>
                    <?php $query = $pdo->query("SELECT content FROM texte_de_presentation WHERE id = 1");
                    $texte = $query->fetch(PDO::FETCH_ASSOC);

                    if (!$texte) {
                        echo "Le texte de présentation n'a pas été trouvé.";
                        exit;
                    }
                    ?>
                    <!-- Formulaire pour modifier le texte de présentation -->
                    <form method="post" action="Modifications_Description/maj_presentation.php">
                        <h2>Texte de présentation</h2>
                        <textarea id="content" name="content" rows="5" cols="60"><?php echo htmlspecialchars($texte['content']); ?></textarea><br>
                        <input type="submit" value="Enregistrer">
                    </form>
                </p>
            </section>

            <h2>Gestion des Produits</h2>
            <section id="tab">
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Image URL</th>
            <th>Actions</th>
        </tr>

        <?php 
        $sql = "SELECT * FROM produits";
        $result = $pdo->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['prix']) ?></td>
                <td><?= htmlspecialchars($row['image_url']) ?></td>
                <td>
                    <a href="Modifications_Description/modifier-produit.php?id=<?= htmlspecialchars($row['id']) ?>">Modifier</a> |
                    <a href="Modifications_Description/gestion-description.php?action=delete&id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
</section>
<p><a href="Modifications_Description/ajout-produit.php">Ajouter un nouveau produit</a></p>

<h2>Avis des Clients</h2>
<section id="tab">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
                <?php 
                // Requête pour récupérer les avis
                $stmtAvis = $pdo->query("SELECT * FROM avis");
                while ($avis = $stmtAvis->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($avis['id']) ?></td>
                        <td><?= htmlspecialchars($avis['nom']) ?></td>
                        <td><?= htmlspecialchars($avis['prenom']) ?></td>
                        <td><?= htmlspecialchars($avis['message']) ?></td>
                        <td><?= htmlspecialchars($avis['date']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </section>

        </main>
        <br><br>
        <footer>
        © 2024 - Apéro party - Tous droits réservés <br> 
            <nav>
                <a href="mailto:Aperoparty02@gmail.com">krolla@3il.fr</a>
                | 
                <a href="tel:+33787293788">07.87.29.37.88</a>
                | 
                <a href="connexion.html">Connexion Administrateur</a>
            </nav>
        </footer>
    </body>

</html>
