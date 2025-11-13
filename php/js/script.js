// On attend que tout le contenu de la page soit chargé avant d'exécuter le script.
document.addEventListener('DOMContentLoaded', function() {

    // 1. On sélectionne le lien "Nos Produits" grâce à son attribut href.
    const productsLink = document.querySelector('a[href="#featured-products"]');
    
    // 2. On sélectionne la section des produits grâce à son ID.
    const productsSection = document.getElementById('featured-products');

    // On vérifie que le lien et la section existent bien sur la page.
    if (productsLink && productsSection) {
        
        // 3. On ajoute un écouteur d'événement sur le clic.
        productsLink.addEventListener('click', function(event) {
            
            // 4. On empêche le comportement par défaut du lien (le saut brusque).
            event.preventDefault();
            
            // 5. On demande au navigateur de défiler en douceur jusqu'à la section.
            productsSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. SÉLECTION DU DOM
    const searchInput = document.getElementById('search-input');
    const productCards = document.querySelectorAll('.product-card');

    if (searchInput) {
        // 2. ÉCOUTE DE L'ÉVÉNEMENT (à chaque lettre tapée)
        searchInput.addEventListener('keyup', function(event) {
            
            // On récupère le texte tapé en minuscule
            const searchValue = event.target.value.toLowerCase();

            // 3. MANIPULATION DU DOM (Boucle sur chaque carte)
            productCards.forEach(function(card) {
                // On récupère le titre du produit (h4)
                const title = card.querySelector('h4').textContent.toLowerCase();

                // Si le titre contient la recherche, on affiche, sinon on cache
                if (title.includes(searchValue)) {
                    card.style.display = 'flex'; // On laisse visible
                } else {
                    card.style.display = 'none'; // On cache
                }
            });
        });
    }
});