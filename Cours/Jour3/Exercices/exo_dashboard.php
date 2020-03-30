<?php
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
// Source: jeuxvideo.com

// Titre du 3ème article
// $article3 = $articles[2]; // retourne un tableau avec les informations de l'article
// echo $article3['title'];
// echo ($articles[2])['title'];
// echo $articles[2]['title'];

// ETAPE 1: analyser et comprendre le tableau php et le code html

// ETAPE 2: explorer le tableau et afficher seulement les titres dans le tbody du tableau html
// Attention à bien regarder le code html qui doit être dans la boucle

// ETAPE 3: afficher les dates dans un format Français (j/m/a)

// ETAPE 4: afficher le statut (public) de manière explicite => quand il est à false on affiche "Non publié", quand il est à true on affiche "Publié"
// Utiliser la class badge de Bootstrap avec des couleurs, c'est plus sympas ;)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Admin dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Gestion des articles</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Liste des articles -->
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?=$article['title']; ?></td>
                        <td><?=date_format(date_create($article['date']), 'd/m/Y'); ?></td>
                        <td>
                            <?php if ($article['public']) : ?>
                                <span class="badge badge-success">Publié</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Non publié</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
