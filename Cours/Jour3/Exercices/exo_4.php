<?php
    /*
        1. Dans le fichier `functions.php`, créez une nouvelle fonction :
        `getListMenu` qui renverra une liste ul > li, dont chacun des éléments
        sera contenu dans un tableau passé en paramètre.

        On appelera cette fonction ainsi :

        $myMenuArray = ['Homepage', 'Archives', 'Plan du site'];
        $myMenu = getListMenu($myMenuArray);
        echo $myMenu;

        2. Modifiez cette fonction pour qu'elle puisse également prendre
        en compte l'url de chacune de ces pages :
            - On modifiera le tableau passé en paramètre
            - Les éléments de liste <li> contiendront un <a> dirigeant
                vers chacune des pages
     */
    $items = [
        'Accueil',
        'Contact',
        'Portfolio',
    ];

    // $items ['Accueil' => '/accueil.php'] ...
?>
<nav>
    <?php echo getListMenu($items); ?>
    <!-- <ul>
        <li><a href="">Accueil</a></li>
        <li>Contact</li>

    </ul> -->
</nav>