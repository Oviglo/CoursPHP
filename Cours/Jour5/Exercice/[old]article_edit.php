<?php

require_once 'database.php';

$errors = []; // Va contenir les erreurs de valaidation pour les afficher dans le formulaire

$pdo = getPDO();
// Si la variable get "id" n'existe pas
if (!isset($_GET['id'])) {
    // Nouvel article
    $id = 0;
} else {
    $id = $_GET['id']; // Récupére l'id dans le lien "article_show.php?id=1"
}

$article = getArticle($pdo, $id); // Récupérer $_GET['id'] pour afficher l'article en fonction du lien
// Soit $article sera un tableau, soit un booléen à "false" s'il n'a pas été trouvé

// Test si la formulaire à bien été envoyé (donc s'il y a des données dans $_POST)
if (!empty($_POST)) {
    $_POST['title'] = trim(strip_tags($_POST['title']));
    $_POST['content'] = trim(strip_tags($_POST['content'], '<p><a><img>')); // strip_tags($_POST['content'], '<p><a><strong>'); autorise seulement les balises entrées en paramètre
    array_map('trim', $_POST); // Execute la fonction "trim" pour tous les éléments d'un tableau

    if (strlen($_POST['title']) < 3) { // Génére une erreur si longueur de title < 3
        $errors['title'] = 'Le titre est trop court';
    }

    if (strlen($_POST['content']) < 10) {
        $errors['content'] = 'Le contenu est trop court';
    }

    // Test s'il n'y a pas d'erreur
    if (empty($errors)) {
        if (0 == $id) { // On ajoute
            // la fonction addArticle retourne un booléen, il est possible de l'appeler dans une condition
            if (addArticle($pdo, $_POST['title'], $_POST['content'])) {
                header('Location: article_list.php');
            }
        } else { // On modifie
            if (editArticle($pdo, $id, $_POST['title'], $_POST['content'])) {
                header('Location: article_list.php');
            }
        }

        $errors['global'] = "Un erreur est survenue, votre article n'a pas pu être enregistré";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Editer un article</title>
</head>
<body>
    <div class="container">
        <h1>Editer un article</h1>
        <!-- form:post>(div.form-group>label+input:text.form-control)+(div.form-group>label+textarea.form-control)+button:submit -->
        <form action="" method="post">
            <?php if (isset($errors['global'])): ?>
                <div class="alert alert-danger"><?=$errors['global']; ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control <?=isset($errors['title']) ? 'is-invalid' : ''; ?>" value="<?=$article['title']; ?>">
                <?php if (isset($errors['title'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['title']; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control <?=isset($errors['content']) ? 'is-invalid' : ''; ?>"><?=$article['content']; ?></textarea>
                <?php if (isset($errors['content'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['content']; ?>
                </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>
