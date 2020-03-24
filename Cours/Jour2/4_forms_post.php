<?php
    // Test si des données sont envoyées
    if (!empty($_POST)) {
        // formulaire envoyé
        //$sql = "SELECT * FROM user WHERE login='".$_POST['username']."' AND password='".$_POST['password']."'";
        //echo $sql;
        /* ATTENTION, injection SQL
        Si l'utilisateur entre dans le champ username "' OR TRUE --"
        La requete va retourner tout les utilisateurs sans tester le mot de passe qui devient un commantaire
        */
        //$username = addslashes($_POST['username']);
        //$sql = "SELECT * FROM user WHERE login='".$username."' AND password='".$_POST['password']."'";
        //echo '<br/>';
        //echo $sql;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire POST</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>