<?php

/*
    1. Ecrire un tableau HTML contenant 20 lignes, à l'aide d'une boucle for.

    2. Dans chaque première case, écrire le numéro de la ligne : "Ligne 1", "Ligne 2", "Ligne 3..."

    3. Changer la couleur du texte à partir de la ligne 10
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo 2</title>
    <style>
        .color {
            color: #951212;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <?php for ($ligne = 1; $ligne <= 20; ++$ligne): ?>
            <tr>
                <!-- <?=$ligne; ?> affiche directement une variable (plutôt que d'écrire echo) -->
            <td <?php if ($ligne >= 10): ?> class="color"<?php endif; ?>>Ligne <?=$ligne; ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>