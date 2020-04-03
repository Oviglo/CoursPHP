<?php 

$title = "WF3 Croisière - Administration";
$cruise = getCruise($_GET['id']?? 0);

if (isset($_POST['id'])) {
    $result = deleteCruise($_POST['id']);
    addFlashMessage($result['status'], $result['message']);

    header('Location: index.php?p=admin_croisires');
}
ob_start(); ?>
<h1>Supprimer une croisire</h1>
<?php require('menu.php'); ?>
<form action="index.php?p=admin_cruiseDelete&id=<?=$cruise['id']?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-danger">Voulez-vous supprimer la croisière ?</div>
        </div>
        <input type="hidden" name="id" value="<?=$cruise['id']?>"/>

        <div class="card-footer">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="index.php?p=admin_croisieres" class="btn btn-secondary">Annuler</a>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>