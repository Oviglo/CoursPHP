<?php 

$title = "WF3 Croisière - Administration";
$dest = getDestination($_GET['id']?? 0);

if (isset($_POST['id'])) {
    $result = deleteDestination($_POST['id']);
    addFlashMessage($result['status'], $result['message']);

    header('Location: index.php?p=admin_destinations');
}
ob_start(); ?>
<h1>Supprimer une destinations</h1>
<?php require('menu.php'); ?>
<form action="index.php?p=admin_destinationDelete&id=<?=$dest['id']?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-danger">Voulez-vous supprimer la destination "<?=$dest['name']?>" ? Cela supprimera aussi les croisière liées.</div>
        </div>
        <input type="hidden" name="id" value="<?=$dest['id']?>"/>

        <div class="card-footer">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="index.php?p=admin_destinations" class="btn btn-secondary">Annuler</a>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>