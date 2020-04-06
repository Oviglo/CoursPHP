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

// Indique au navigateur que ce script retourne un format json (et pas html)
header('Content-Type: application/json');
// Affiche les articles au format JSON
echo json_encode($articles, JSON_PRETTY_PRINT);
