<?php 

$title = "WF3 Croisière - Administration";
$cruise = getCruise($_GET['id']?? 0);
$destinations = getAllDestinations();
$errors = [];

if (isset($_POST['id'])) {
    array_map('trim', array_map('strip_tags', $_POST));

    if (strlen($_POST['boat']) < 2) {
        $errors['boat'] = "Le nom du navire est trop court";
    }

    if (empty($errors)) {
        $result = editCruise($_POST['destination_id'], $_POST['date_departure'], $_POST['date_arrival'], $_POST['boat'], $_POST['id']);
        addFlashMessage($result['status'], $result['message']);
    
        header('Location: index.php?p=admin_croisieres');
    }
    
}
ob_start(); ?>
<h1>Editer une croisiére</h1>
<?php require('menu.php'); ?>
<form action="index.php?p=admin_croisiereEdit" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Destination</label>
                <select class="form-control">
                <?php foreach ($destinations as $dest) { ?>
                    <option value="<?=$dest['id']?>" <?php if ($dest['id'] == $cruise['destination_id']) { echo ' selected '; } ?> ><?=$dest['name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Départ</label>
                <input type="date" name="date_departure" class="form-control" value="<?=$cruise['date_departure']?>"/>
            </div>
            <div class="form-group">
                <label>Arrivé</label>
                <input type="date" name="date_arrival" class="form-control" value="<?=$cruise['date_arrival']?>"/>
            </div>
            <div class="form-group">
                <label>Navire</label>
                <input type="text" name="boat" class="form-control <?= isset($errors['boat'])? 'is-invalid':''; ?>" value="<?=$cruise['boat']?>"/>
                <?php if (isset($errors['boat'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['boat'];?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <input type="hidden" name="id" value="<?=$dest['id']?>"/>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="index.php?p=admin_croisieres" class="btn btn-secondary">Annuler</a>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>