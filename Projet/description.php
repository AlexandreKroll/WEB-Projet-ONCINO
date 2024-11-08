<!DOCTYPE html>
<html>

    <head>
        <title></title> <!--Titre de la page-->
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
            <nav class = "menu">
                <input type="checkbox" id="burger-checkbox">
                <label for="burger-checkbox" class="burger">
                    <img src="IMGViewer/burger-solid.svg" alt="Erreur du chargement de l'image" loading="lazy"/>
                </label>
            
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="description.php">Description</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>

        <main>
        <?php
            session_start();
            include 'config.php'; // Fichier de configuration de la base de données
            // Requête SQL pour récupérer les données
            $stmt = $pdo->query("SELECT * FROM produits");
            $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

            <section id="produit">
            <?php foreach ($produits as $produit): ?>
                <div class="produit-card">
                <img src="<?php echo htmlspecialchars($produit['image_url']); ?>" alt="Image de <?php echo htmlspecialchars($produit['nom']); ?>">
                <h2><?php echo htmlspecialchars($produit['nom']); ?></h2>
                <p><?php echo htmlspecialchars($produit['description']); ?></p>
                <div class="prix"><?php echo number_format($produit['prix'], 2); ?> €</div>
                </div>
            <?php endforeach; ?>
            </section>

            <section>
                <a href="contact.html" class="button">Cliquez ici pour une demande de renseignement</a>
            </section>
    
            <section class="musik">
                <p>
                    Pour une soirée encore plus fun, nous avons le plaisir de vous présenter la société de nos amies :
                </p>  
                <p>
                    <img src="IMGViewer/logo_musik.png">
                </p>
            </section>
        </main>
        
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