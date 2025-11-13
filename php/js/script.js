document.addEventListener('DOMContentLoaded', function() {
    
    console.log("Script JS chargé ✅");

    // ============================================================
    //  BARRE DE RECHERCHE (Filtrage dynamique)
    // ============================================================
    const searchInput = document.getElementById('search-input');
    const productCards = document.querySelectorAll('.product-card');

    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            const term = e.target.value.toLowerCase();

            productCards.forEach(function(card) {
                const title = card.querySelector('h4').textContent.toLowerCase();
                // Si le titre contient la recherche, on affiche (flex), sinon on cache (none)
                if (title.includes(term)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }


    // ============================================================
    //  SÉLECTEUR DE QUANTITÉ (+ / -)
    // ============================================================
    const minusBtns = document.querySelectorAll('.qty-btn.minus');
    const plusBtns = document.querySelectorAll('.qty-btn.plus');

    minusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = btn.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value);
            if (value > 1) {
                value--;
                input.value = value;
            }
        });
    });

    plusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = btn.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value);
            value++;
            input.value = value;
        });
    });

    // ============================================================
    // AJOUT PANIER SANS RECHARGEMENT (AJAX)
    // ============================================================
    const cartForms = document.querySelectorAll('.ajax-form');

    cartForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            
            // je blque le chargement
            event.preventDefault();

            // Recup les données 
            const formData = new FormData(form);
            const qtyAdded = parseInt(formData.get('quantity'));
            const btn = form.querySelector('.add-to-cart-button');
            const originalText = btn.textContent;

            // ça envoie les données en AJAX pour le serv
            fetch('ajout_panier.php', {
                method: 'POST',
                body: formData
            })
            .then(() => {
                //connfirmation avec le bouton vert pour un visuel
                btn.textContent = "Ajouté ! ✅";
                btn.style.backgroundColor = "#2E7D32"; 
                
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.style.backgroundColor = ""; 
                }, 2000);

                // Changement du nombre dans le badge du panier
                const cartLink = document.querySelector('a[href="panier.php"]');
                let badge = cartLink.querySelector('.cart-badge');

                if (badge) {
                    let currentVal = parseInt(badge.textContent);
                    badge.textContent = currentVal + qtyAdded;
                } else {
                    badge = document.createElement('span');
                    badge.classList.add('cart-badge');
                    badge.textContent = qtyAdded;
                    cartLink.appendChild(badge);
                }

                //Pour remettre la quantité à 1 apres le clique 
                const qtyInput = form.querySelector('.qty-input');
                if (qtyInput) {
                    qtyInput.value = 1;
                }

            })
            .catch(err => console.error('Erreur AJAX:', err));
        });
    });

});