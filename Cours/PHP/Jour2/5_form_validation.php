<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation formulaire</title>
</head>
<body>
    <!-- form>(div>label+input:text)*4 -->
    <form action="5b_validation.php" method="POST" novalidate>
        <div><label for="nom">Nom</label><input type="text" name="nom" id="nom"></div>
        <div><label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom"></div>
        <div>
            <label for="naissance">Date naissance</label>
            <input type="date" name="naissance" id="naissance" value="<?=date('Y-m-d', strtotime('20 years ago')); ?>">
        </div>
        <div><label for="email">Email</label><input type="email" name="email" id="email"></div>
        
        <button type="submit" name="envoi">Envoyer</button>
        <button type="submit" name="envoi_admin">Envoyer à l'admin</button>
    </form>
</body>
</html>