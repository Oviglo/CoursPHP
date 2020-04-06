<?php
    require_once 'database.php';

    // Si la variable $_GET['id'] n'existe pas
    if (!isset($_GET['id'])) {
        header('Location: article_list.php');
    }

    // Chargement de l'article
    $pdo = getPDO();
    $article = getArticle($pdo, $_GET['id']);
    // Test si $article est un booléen égale à false, l'article n'existe pas
    if (false === $article) {
        header('Location: article_list.php');
    }

    // Si le formulaire a été envoyé
    if (isset($_POST['delete'])) {
        deleteArticle($pdo, $_GET['id']);

        header('Location: article_list.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Supprimer un article</title>
</head>
<body>
    <div class="container">
        <h1>Supprimer un article</h1>

        <form action="" method="post">
            <div class="alert alert-danger">Voulez-vous vraiment supprimer l'article "<?=$article['title']; ?>" ?</div>
            <a href="article_list.php" class="btn btn-secondary">Non</a> 
            <button type="submit" name="delete" class="btn btn-danger">Oui</button>
        </form>
    </div>
</body>
</html>