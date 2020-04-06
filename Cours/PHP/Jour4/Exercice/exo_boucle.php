<?php

// Afficher avec une boucle while les 10 premiers nombres pairs
$nombre = 1;
while ($nombre <= 10) {
    echo $nombre.', ';
    ++$nombre; // Augmente de 1
    // $nombre = $nombre + 1;
    // $nombre += 1;
}

// Nombres pairs
echo '<br/>Nombres pairs<br/>';
$nombre = 2;
while ($nombre <= 20) {
    echo $nombre.', ';
    $nombre += 2;
}

// Afficher avec une boucle for les 10 premiers jours d'avril au format "d/m/Y" en utilisant les fonctions date et mktime
/*
01/04/2020, 02/04/2020 , ...
mktime(0,0,0,4, $i ,2020);
*/
echo "<br/>Jours d'avril<br/>";
for ($jour = 1; $jour <= 10; ++$jour) {
    $time = mktime(0, 0, 0, 4, $jour);
    echo date('d/m/Y', $time).', ';
}

// Afficher les éléments du tableau $jours avec une boucle for
echo '<br/>Jours<br/>';
$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
// $jours = [0 => 'Lundi', 1 => 'Mardi' ...]
// echo $jours[2]; // Affiche l'élément avec l'index 2 donc "Mercredi"
for ($j = 0; $j < count($jours); ++$j) {
    echo $jours[$j].', ';
}

// Faire la même chose avec un foreach
foreach ($jours as $jour) {
    echo $jour.', ';
}

foreach ($jours as $index => $jour) {
    echo $index.' '.$jour.', ';
}

/*
$user = [
    'username' => 'Loic',
    'password' => '123',
];
*/
// Faire une recherche dans $jours (avec foreach), quand la recherche est trouvé on affiche "Trouvé !" et on TERMINE la boucle
echo '<br/>Recherche<br/>';
$recherche = 'Mardi';
foreach ($jours as $jour) {
    echo $jour.', ';

    if ($jour == $recherche) {
        echo 'Trouvé ! ';
        break;
    }
}

$articles = [
    [
        'title' => "Doom Eternal : Un lancement record pour la franchise d'après Bethesda",
        'date' => '2020-03-25',
        'public' => true,
    ],
    [
        'title' => 'The Council : le premier épisode est disponible gratuitement sur PC, PS4 et Xbox One',
        'date' => '2020-03-25',
        'public' => false,
    ],
    [
        'title' => "Assassin's Creed Odyssey gratuit ce week-end : retrouvez notre soluce complète",
        'date' => '2020-03-20',
        'public' => true,
    ],
    [
        'title' => 'Octopath Traveler célèbre ses deux millions de copies écoulées',
        'date' => '2020-03-19',
        'public' => true,
    ],
    [
        'title' => 'Nintendo Direct Animal Crossing : Toutes les informations dévoilées sur New Horizons',
        'date' => '2020-02-20',
        'public' => false,
    ],
];

// Explorer le tableau dans un foreach et afficher le titre
// var_dump()
/*$article = $articles[1];
$article['title'];*/
//$articles[1]['title'];
echo '<hr>';
foreach ($articles as $article) {
    // var_dump($article);
    // element "title" de $article
    // echo $article['title'].'<br/>';
    // Explorer article pour afficher tous les éléments (title, date, public)
    foreach ($article as $index => $champ) {
        echo $index.' : '.$champ.'<br/>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jours</title>
</head>
<body>
    <ul>
        <!-- Jours de la semaine --> 
        <!-- explorer la variable $jours pour mettre les éléments dans une balise li -->
        <?php foreach ($jours as $jour): ?>
        <li><?=$jour; ?></li>    
        <?php endforeach; ?>
    </ul>
</body>
</html>