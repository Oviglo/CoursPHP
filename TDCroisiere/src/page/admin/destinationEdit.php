<?php

$title = 'Modifier une destination';

$id = $_GET['id'] ?? 0;
$dest = getOneDestination($id);

if (!empty($_POST)) {
    $result = saveDestination($_POST['name'], $_POST['description'], [], $id, $dest['photo']);

    addFlashMessage($result['type'], $result['message']);

    if ('success' == $result['type']) {
        header('Location: index.php?p=admin_destinations');
        exit(); // Quitte ce script PHP
    }
}

ob_start();
?>
<h1><?=$title; ?></h1>

<?php require 'menu.php'; ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" class="form-control" name="name" value="<?=$dest['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?=$dest['description']; ?></textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo" data-browse="Parcourir">Photo</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();

require_once '../template.php';
?>