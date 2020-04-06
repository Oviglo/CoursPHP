<?php
/*
- Charge toutes les destination et retourne le resultat dans un JSON
*/
require_once '../common.php';

header('Content-Type: application/json');
echo json_encode(getAllDestinations(), JSON_PRETTY_PRINT);
