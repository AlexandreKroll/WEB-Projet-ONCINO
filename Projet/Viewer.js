// Variables pour le carousel
let currentImageIndex = 0;
let images = [];

// Fonction pour charger les images depuis le fichier XML
async function loadImagesFromXML() {
    try {
        const response = await fetch('IMGViewer.xml');
        const xmlText = await response.text();
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlText, 'text/xml');
        
        // Récupère toutes les balises <image>
        const imageNodes = xmlDoc.getElementsByTagName('image');
        
        // Parcours chaque image et les ajoute au DOM
        for (let i = 0; i < imageNodes.length; i++) {
            const src = imageNodes[i].getAttribute('src');
            const alt = imageNodes[i].getAttribute('alt');
            
            // Crée l'élément d'image
            const img = document.createElement('img');
            img.src = src;
            img.alt = alt;
            img.classList.add('carousel-image');
            if (i === 0) img.classList.add('active'); // Affiche la première image

            // Ajoute l'image à l'élément #carousel-images
            document.getElementById('carousel-images').appendChild(img);
            images.push(img); // Ajoute l'image au tableau
        }
    } catch (error) {
        console.error("Erreur de chargement de l'XML :", error);
    }
}

// Fonction pour afficher l'image précédente
function previousImage() {
    images[currentImageIndex].classList.remove('active');
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    images[currentImageIndex].classList.add('active');
}

// Fonction pour afficher l'image suivante
function nextImage() {
    images[currentImageIndex].classList.remove('active');
    currentImageIndex = (currentImageIndex + 1) % images.length;
    images[currentImageIndex].classList.add('active');
}

// Charger les images lorsque la page est prête
window.onload = loadImagesFromXML;