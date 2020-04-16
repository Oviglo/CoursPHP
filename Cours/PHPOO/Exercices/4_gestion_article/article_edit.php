<?php

/*
- Ecrire une classe Form\Form avec les propriétés suivantes: $action (string), $name (string) avec les getter setter + un constructeur qui demande le nom et l'action (facultatif, par défaut une chaîne vide)


- Ecrire une méthode (dans Form) createView et qui va retourner de l'html : <form name="" action=""></form>

- Ecrire un code html de base dans index.php (html>body etc.) avec un bootstrap

- Ecrire une classe abstraite Form\Field\AbstractField avec les propriétés name, label, attr (array), value
- Constructeur demandera un name et le label et attr en facultatif

- Ecrire une classe Form\Field\Text qui hérite de AbstractField (tester en créant un objet Text et appele sa méthode createView)
*/

// Autoload sans fonction: on laisse PHP charger tout seul le fichier
spl_autoload_register();

// Test Article
use Manager\ArticleManager;
use Entity\Article;
use Form\Form;
use Form\Field\Text;
use Form\Field\Textarea;
use Form\Field\Select;
use Form\Field\Submit;

$article = new Article();
$article->setTitle('');
$article->setContent('');
$article->setCategory('');

$articleManager = new ArticleManager();

// Envoi du formulaire
if (!empty($_POST)) {
    $article->setTitle($_POST['title']);
    $article->setContent($_POST['content']);
    $article->setCategory($_POST['category']);
    // Enregistre dans la base de données
    $articleManager->save($article);

    header('Location: index.php');
    exit();
}

$categories = [
    'Programmation' => 'programmation',
    'Infographie' => 'infographie',
    'Hardware' => 'hardware',
];

$form = new Form('article');
// Les données de mon form proviennent de l'objet Article
$form->setData($article);

$form->addField(new Text('title', 'Titre'));
$form->addField(new Select('category', $categories, 'Categorie'));
$form->addField(new Textarea('content', 'Contenu'));
$form->addField(new Submit('submit', "Enregistrer l'article"));

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
        <h1>Gestion des articles</h1>
        <?=$form->createView(); ?>
    </div>
</body>
</html>