var rubrique = document.querySelectorAll(".rubriqueRB");
var produit = document.querySelectorAll(".produitRB");
rubrique.forEach(e => {
    e.onclick =function () {
        var nom_rub = this.getAttribute("nom-rub");
        rubrique.forEach(rub => {
            rub.style.display = 'none';            
        })
        produit.forEach(prod => {
            var nom_prod = prod.getAttribute("prod-rub")
            if(nom_prod == nom_rub){
                prod.setAttribute("class","produitRB container");
            }
        })
    }
});

window.addEventListener('click', function (event) {
    var modal2 = document.getElementById('registrationModal2');
    var modal = document.getElementById('registrationModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
    if (event.target === modal2) {
        modal2.style.display = 'none';
    }
});

var loginButton= document.getElementById('btnLogin');
var logoutButton= document.getElementById('btnLogout');
var fermer = document.querySelectorAll('.closeModal')
if(loginButton !== null){
    loginButton.onclick = function(){
            document.getElementById('registrationModal').style.display = 'flex';
    }
}

if(logoutButton !== null){
    logoutButton.onclick = function(){
            document.getElementById('registrationModal2').style.display = 'flex';
    }
}
fermer.forEach(e => {
    e.onclick = function(){
        document.getElementById('registrationModal').style.display = 'none';
        document.getElementById('registrationModal2').style.display = 'none';
    }
})

function ajouter_panier(ref){
    var url_site = document.getElementById("urlsite");
    // Données à envoyer au serveur (peut être un objet JavaScript)
    var postData = {
        ref: ref,
    };

    // Configuration de la requête
    var url = url_site.value+"/GestionProd/panier.php";
    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Indique que le corps de la requête est au format JSON
        },
        body: JSON.stringify(postData) // Convertit l'objet en chaîne JSON
    };

    // Envoi de la requête Fetch
    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau ou HTTP, statut ' + response.status);
            }
            return response.text(); 
        })
        .then(data => {
            var nbrpanier = document.getElementById("nbrpanier");
            if(data != 0) nbrpanier.innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors de la requête Fetch:', error);
        });
}