<?php

/*
    Créer un formulaire pour envoyer un ticket (signalement de bug) avec les champs suivants:
        - Nom et prénom (taille entre 3 et 50)
        - Description (plus grand que 5)
        - Priorité (select: faible, normale ou haute)

    Créer une fichier "envoi_ticket.php" pour traiter les information du formulaire (simulation base de données)
    Tester avant de faire l'ajax

    Traiter ce formulaire en Ajax et afficher le message de retour
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Ajout ticket</title>
</head>
<body>
    <div class="container">
        <h1>Envoyer un ticket</h1>
        <form action="envoi_ticket.php" method="post" id="ticket-form">
            <div class="alert" id="ajax-msg"></div>
            <div class="form-group">
                <label for="name">Nom et prénom</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="priority">Priorité</label>
                <select name="priority" id="priority" class="form-control">
                    <option value="faible">Faible</option>
                    <option value="normale">Normale</option>
                    <option value="haute">Haute</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>