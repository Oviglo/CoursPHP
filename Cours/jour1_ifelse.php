<?php

// Condition
$estAdmin = true;

if ($estAdmin) {
    echo 'Vous êtes admin !';
} elseif (!$estAdmin) {
    echo "Vous n'êtes pas admin !";
} else {
    echo "Ne s'affichera jamais";
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>2 - Les conditions</title>
    </head>
    <body>
        <!-- <?php if ($estAdmin) { ?>
            <a href="#" >Administration</a>
        <?php } ?>-->

        <?php if ($estAdmin) : ?>
            <a href="#" >Administration</a>
        <?php endif; ?>
        <hr/>
        <?php
            $a = 15;
            $b = 30;

            if ($a == $b) {
                echo 'ce sont les mêmes valeurs';
            }

            // yoda condition
            if (15 == $a) {
            }

            if ($a >= $b) {
                echo 'a est plus grand ou égal à b';
            } else {
                echo 'a est plus petit que b';
            }
        ?>
    </body>
</html>
