let refreshButton = document.getElementById('load');
let lastNews = document.getElementById('lastNews');
let xhttp = new XMLHttpRequest;

refreshButton.onclick = function () {

    xhttp.open('GET', 'lastNews.php');
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            // Transforme la chaine contenant le JSON en objet js (facile à lire)
            let jsonData = JSON.parse(this.responseText);
            console.log(jsonData);
        }
    };

    xhttp.send();
};
