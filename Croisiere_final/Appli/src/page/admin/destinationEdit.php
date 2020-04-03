<?php 

$title = "WF3 Croisière - Administration";
$dest = getDestination($_GET['id']?? 0);

if (isset($_POST['id'])) {
    array_map('trim', array_map('strip_tags', $_POST));
    $result = editDestination($_POST['name'], $_POST['description'], $_FILES['photo'], $_POST['id']);
    addFlashMessage($result['status'], $result['message']);

    header('Location: index.php?p=admin_destinations');
}
ob_start(); ?>
<h1>Editer une destinations</h1>
<?php require('menu.php'); ?>
<form action="index.php?p=admin_destinationEdit" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" value="<?=$dest['name']?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo" data-browse="Parcourir">Choisir un fichier</label>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"><?=$dest['description']?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?=$dest['id']?>"/>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="index.php?p=admin_destinations" class="btn btn-secondary">Annuler</a>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>