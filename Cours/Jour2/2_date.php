<?php

/*
    La function date($format, $timestamp) permet de formater l'affichage des dates
    - $format => format de la date sous forme de chaine
    - $timestamp => nombre de secondes écoulées depuis le 1/1/70

    http://php.net/manual/fr/function.date.php
*/
date_default_timezone_set('Europe/Paris'); // Modifie le fuseau horaire
echo 'Nous sommes le '.date('d/m/Y');
echo '<br/>';
echo 'Date avec heure '.date('d/m/Y H i s');
echo '<br/>';
echo "il s'est accoulé ".time().' secondes depuis le 1  janvier 1970';
// time() retourne le nombre de secondes depuis le 1/1/1970
