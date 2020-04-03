<?php

/*
 - Afficher le prix du troisième produit
 - Afficher le nom du premier produit
 - Afficher le nombre de tags du deuxième produit
 - Afficher le deuxième tag du deuxième produit
 - Créer un tableau html qui affiche tous les nom et prix des produits
 - Ajouter une colonne qui affiche chaques tags dans une balise span <span>tag1</span><span>tag 2</span>

*/
$products = [
    [
        'name' => 'Animal Crossing New Horizon',
        'price' => 44.99,
        'tags' => ['Jeux vidéo'],
    ],
    [
        'name' => 'Joker',
        'price' => 24.90,
        'tags' => ['Blu-Ray', 'Joaquin Phoenix', 'Robert De Niro'],
    ],
    [
        'name' => 'La Vie secrète des écrivains',
        'price' => 8.40,
        'tags' => ['Livre', 'Musso'],
    ],
];

echo $products[2]['price'];
echo '<br/>';
echo $products[0]['name'];
echo '<br/>';
echo count($products[1]['tags']);
echo '<br/>';
echo $products[1]['tags'][1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        td, th {
            border-bottom: 1px solid gray;
            padding: 4px 0;
        }
        .tag {
            background-color:darkslategray;
            color: white;
            display: inline-block;
            margin: 0 2px;
        }
    </style>
</head>
<body>
    <!-- tableau html de la liste des produits -->
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Mots clés</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?=$product['name']; ?></td>
                <td><?=$product['price']; ?></td>
                <td>
                    <?php foreach ($product['tags'] as $tag):?>
                        <span class="tag"><?=$tag; ?></span>
                    <?php endforeach; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>