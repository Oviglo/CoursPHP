<?php

$title = 'Rechercher';

// Test si la variables GET pour la recherche existent
if (isset($_GET['destination']) && isset($_GET['date'])) {
    array_map('trim', $_GET); // retirer les espaces de tous les éléments du tableau

    $cruises = searchCruise($_GET['destination'], $_GET['date']);
    var_dump($cruises);
}

ob_start();
?>
<h1>Résultat de la recherche</h1>
<?php
$content = ob_get_clean();

require_once '../template.php';
