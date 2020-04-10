<?php

require_once 'database.php';

$error = '';

if (!empty($_POST)) {
    array_map('trim', $_POST);
    array_map('strip_tags', $_POST);

    if (strlen($_POST['model']) < 5) {
        $error = 'Le nom du modèle est trop court';
    }

    if (empty($error) && addCar($_POST['brand'], $_POST['model'], $_POST['description'])) {
        header('Location: index.php');
        exit();
    } elseif (empty($error)) { // Condition pour ne pas écrasé l'erreur sur la taille des chaînes
        $error = 'Une erreur est survenue';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Ajouter une voiture</h1>
        <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?=$error; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="brand">Marque</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="Peugeot">Peugeot</option>
                    <option value="Renault">Renault</option>
                    <option value="Citroën">Citroën</option>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Modèle</label>
                <input type="text" name="model" id="model" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>