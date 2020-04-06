
let refreshButton = document.getElementById('load');
let lastNews = document.getElementById('lastNews');
// Récupération de l'objet js pour faire des appels Ajax
let xhttp = new XMLHttpRequest;
// Lors d'un clique sur le bouton
// refreshButton.onclick = function() {};
refreshButton.onclick = () => {
    // Prépare la requête Ajax
    xhttp.open("GET", "lastNews.php");

    // Fonction qui sera appelée lors d'un changement d'état de la requête
    xhttp.onreadystatechange = function () {
        console.log(this.readyState);
        // Test si la serveur a fini d'éxécuter la requête ET s'il n'y a pas d'erreur (status 200)
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            lastNews.innerHTML = this.responseText;
        }
    };

    // envoie la requête au serveur
    xhttp.send();
};
