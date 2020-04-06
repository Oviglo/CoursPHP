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

            jsonData.forEach(function (article) {
                console.log(article);
                // Crée un élément div
                let articleDiv = document.createElement('div');
                articleDiv.innerHTML = '<h2>' + article.title + '</h2>';
                lastNews.appendChild(articleDiv);

            });
        }
    };

    xhttp.send();
};

/*
avec jQuery

$.getJSON('lastNews.php', function(data){
    // data est automatiquement convertit en objet js
    data.forEach(function(article){

    });
});
*/
