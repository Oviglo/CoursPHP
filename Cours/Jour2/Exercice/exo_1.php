<?php
/*
 * Complétez le script PHP suivant de manière à afficher un tableau HTML composé de $nbLignes lignes
 * et de $nbColonnes colonnes.
 *
 * On affichera un indice dans chaque case, en commençant par 1.
 *
 * [Facultatif] Une case sur deux sera grisée.
 *
 * for (condition):
 * ...
 * endfor;
 */

$nbLignes = 4;
$nbColonnes = 12;
?>
<html lang="fr">
    <head>
        <title>Tableau Dynamique</title>
        <style>
            .color {
                background-color:darkgray;
            }
        </style>
    </head>
    <body>
        <table>
            <tbody>
                <?php for ($ligne = 1; $ligne <= $nbLignes; ++$ligne) : ?>
                <tr>
                    <?php for ($colonne = 1; $colonne <= $nbColonnes; ++$colonne) :
                        $index = $colonne + (($ligne - 1) * $nbColonnes);
                        // colonne courante + ( ligne courante moins 1 * nombre de colonne )
                    ?>
                    <td <?php if (0 == $index % 2) :?> class="color"<?php endif; ?>>
                        Item <?php echo $index; ?>
                    </td>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </body>
</html>