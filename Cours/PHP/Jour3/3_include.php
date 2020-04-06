<?php
    $title = "Page d'accueil";
    // $title va être utilisé dans le fichier "3b_header.php"

    // include '3b_header.php';
    /*
    include affiche un warning si le fichier n'est pas trouvé mais continue d'interpréter le programme
    mettre un @ devant permet de ne pas afficher de warning
    */

    require '3b_header.php';
    /*
    Fait la même chose que include mais affiche une erreur fatale si le fichier n'existe pas qui met fin au programme
    remarque: les variables de ce script sont accessibles dans le fichier inclus
    */

    require_once '3b_header.php';
    /*
        require_once va charger un fichier et va ignorer les require_once suivants du même fichier
    */
?>
<section>
    <p>Contenu</p>
</section>
<?php
    include '3b_footer.php';
