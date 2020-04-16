<?php

spl_autoload_register();

use Entity\Category;
use Form\Field\Submit;
use Form\Field\Text;
use Form\Form;
use Manager\CategoryManager;

$category = new Category();
$categoryManager = new CategoryManager();

$form = new Form('category');
$form->addField(new Text('name', 'Nom de la catégorie'));
$form->addField(new Submit('submit', 'Enregistrer la catégorie'));

$form->setData($category);

if (!empty($_POST)) {
    $category->setName($_POST['name']);
    $categoryManager->save($category);

    header('Location: category_list.php');
    exit();
}

require_once 'include/header.php';
?>

    <div class="container">
        <h1>Editer une catégorie</h1>
        <?=$form->createView(); ?>
    </div>
</body>
</html>
