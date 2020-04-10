<?php

/*
- Créer une table 'car' dans la db avec les champs suivants: id, model, brand, description (DEFAULT NULL)
- Créer un fichier add_car.php qui affiche un formulaire d'ajout ainsi que le traitement du formulaire varifier les données
- model et marque doivent être plus grand que 5 caractères
- Afficher la liste des voitures dans index
- Créer un fichier edit_car.php qui permet d'éditer une voiture
*/
require_once 'database.php';

$cars = getAllCars();

include 'head.php';
?>
<h1>Gestion des voitures</h1>
<a href="add_car.php" class="btn btn-success">Ajouter une voiture</a>
<hr/>
<table class="table table-striped">
    <thead>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Description</th>
    </thead>

    <tbody>
        <?php foreach ($cars as $car): ?>
        <tr>
            <td><?=$car['brand']; ?></td>
            <td><?=$car['model']; ?></td>
            <td><?=substr($car['description'], 0, 20); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
</html>