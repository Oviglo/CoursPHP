<?php
/*
  Quelques exercices pratiques sur les chaines de caractères :

  1. Créez un formulaire HTML comportant un champ de texte, dans un script PHP. Le formulaire pointera sur la même page.

  2. Créez un bouton `submit` qui envoie la chaine entrée, et qui affiche dans un <div> cette chaine en majuscules.

  3. Créez un deuxième bouton `submit`, qui permet d'afficher la chaine entrée en minuscules

  4. De meme, un submit pour ajouter une majuscule à chaque mot

  5. Et encore un submit pour ajouter une majuscule, mais seulement au début de la chaine.

  6. Créez maintenant un submit qui n'affichera la chaine que jusqu'au caractère '.' (point) non inclus
  - Utilisez pour cela la fonction `explode`.
  - Utilisez maintenant la fonction `strpos` et `substr` pour produire le même résultat.

  Bonus : Créez pour finir un submit qui affiche les deux premiers mots de la chaine entrée, séparés par un tiret ("-")
  S'il n'y a pas assez de mots, affichez le message "Entrez au moins deux mots"
 */
$newString = '';
// $_POST['chaine'] var contenir la chaine qui se trouve dans le champ name="chaine"
if (isset($_POST['upper'])) { // l'user a cliqué sur le submit avec le name="upper"
    $newString = strtoupper($_POST['chaine']); // Met tout en majuscule
    // strtoupper ne prend pas en compte les accents
    // utiliser la fonction mb_strtoupper pour prendre les accents en compte
} elseif (isset($_POST['lower'])) {
    $newString = strtolower($_POST['chaine']);
} elseif (isset($_POST['ucwords'])) {
    $newString = ucwords($_POST['chaine']);
} elseif (isset($_POST['ucfirst'])) {
    $newString = ucfirst($_POST['chaine']);
} elseif (isset($_POST['truncate'])) {
    $strArray = explode('.', $_POST['chaine']); // Découpe une chaine en délimitant les parties par les '.' trouvés et retourne un tableau
    /*
        "Ma chaine. séparée" explode va retourner le tableau [0 => "Ma chaine", 1 => " séparée"]
    */
    //$newString = $strArray[0]; // Affiche le premier élément du tableau

    // Méthode avec strpos
    $position = strpos($_POST['chaine'], '.'); // Retourne la position de '.' dans la chaine
    $newString = substr($_POST['chaine'], 0, $position);
} elseif (isset($_POST['twowords'])) {
    $strArray = explode(' ', $_POST['chaine']);
    if (count($strArray) > 1) { // count($array) retourne la taille d'un tableau
        // Si le nombre d'éléments dans le tableau est d'au moins 2
        $newString = $strArray[0].' - '.$strArray[1];
    } else {
        $newString = 'Entrez au moins deux mots';
    }
}

// Je veux garder la chaine original pour l'afficher dans le input=text
$string = '';
if (isset($_POST['chaine'])) { // Si le post "chaine" existe => le formulaire a été envoyé
    $string = $_POST['chaine']; // Mettre la valeur dans $string pour l'afficher dans le champ
    // On va donc garder l'historique de ce que l'utilisateur a entré
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo formulaire</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <!-- ne pas oublier l'attribut name car c'est ce qui va permettre de récupérer la valeur dans $_POST -->
            <input type="text" name="chaine" id="chaine" value="<?=htmlentities($string); ?>">
        </div>
        <!-- <select name="tranform"><option value="upper">Majuscule</option></select> -->
        <button type="submit" name="upper">Majuscule</button>
        <button type="submit" name="lower">Minuscule</button>
        <button type="submit" name="ucwords">Maj. à chaque mot</button>
        <button type="submit" name="ucfirst">Maj. au début de la phrase</button>
        <button type="submit" name="truncate">Tronquer</button>
        <button type="submit" name="twowords">Deux premiers mots</button>
    </form>
    <hr/>
    <strong>Résultat</strong>
    <div><?=htmlentities($newString); ?></div>
</body>
</html>