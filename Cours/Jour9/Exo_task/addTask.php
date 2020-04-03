<?php

require_once 'database.php';

// Si le form a été envoyé
if (!empty($_POST)) { // if (!isset($_POST['content'])) {}
    // Traitement des données
    $_POST['content'] = trim(strip_tags($_POST['content'], '<a>'));

    if (strlen($_POST['content']) < 10) {
        $error = 'Le contenu est trop court';
    } else {
        $result = addTask($_POST['content']);
        /*if (!$result) {
            $error = 'Une erreur est survenue';
        } else {
            header('Location: index.php');
            exit();
        }*/
        if ($result) {
            header('Location: index.php');
            exit();
        }

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
        <h1>Ajouter une tâche</h1>
        <hr/>
        <form action="" method="post">
            <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="content">Tâche</label>
                <textarea id="content" name="content" class="form-control"><?=$_POST['content'] ?? ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>