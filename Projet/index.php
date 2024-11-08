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
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="description.php">Description</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>


        <main>

            <?php include 'presentation.php'; ?>  
            <hr class="horizontal-line">

            <section>
                <div class="carousel-container">
                    <span class="arrow left-arrow" onclick="previousImage()">&#10094;</span>
                    <span class="arrow right-arrow" onclick="nextImage()">&#10095;</span>
                    <div id="carousel-images"></div>
                </div>
                <script src="Viewer.js"></script>
            </section>

            <section>
                <p>
                    <a href="description.php" class="button">Découvrez nos offres traiteurs du moment</a>
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