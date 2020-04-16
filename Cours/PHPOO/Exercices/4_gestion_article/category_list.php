<?php

/*
- Créer une table category (id, name)
- Ecrire la class Entity\Category
- Ecrire la classe Manager\CategoryManager avec les méthodes save et findAll
- Ajouter une fichier category_edit.php qui affiche le formulaire
- Afficher la liste dans category_list.php
*/

use Manager\CategoryManager;

spl_autoload_register();

$categoryManager = new CategoryManager();

$categories = $categoryManager->findAll();

require_once 'include/header.php';
?>
<div class="container">
    <h1>Gestion des catégories</h1>
    <a href="category_edit.php" class="btn btn-success mb-2">Ajouter une catégorie</a>
    <a href="index.php" class="btn btn-light mb-2">Gestion des articles</a>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($categories as $c): ?>
            <tr>
                <td><?=$c->getName(); ?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    
</body>
</html>
